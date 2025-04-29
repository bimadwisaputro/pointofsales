<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Others;
use App\Models\OthersDetails;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Data Pos";
        // select * from product LEFT JOIN categories ON categories.id = products.category_id
        // ORM : Object Relation Mapp
        $datas = Others::OrderBy('id', 'desc')->get();
        return view('pos.index', compact('title', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['Products'] = Products::orderBy('id', 'desc')->get()->map(function ($res) {
            return [
                "id" => $res->id,
                "name" => $res->product_name,
                "price" => (int)$res->product_price,
                "image" => asset('storage/' . $res->product_photo),
                "option" => null,
            ];
        });

        // return $data['Products'];
        return view('kasir', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'status' => $request->status,
        ];
        // hasFile
        // !empty()
        // $_FILES, $request->file
        if ($request->hasFile('product_photo')) {
            $photo = $request->file('product_photo')->store('product', 'public');
            $data['product_photo'] = $photo;
        }

        Products::create($data);
        toast('Data Added Successfully', 'success');
        return redirect()->to('product');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data['title'] = 'Order Details';
        $data['data'] = Others::findOrFail($id);
        $data['dataDetail'] = OthersDetails::with('product')->where('order_id', $id)->get();
        return view('pos.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = Products::find($id);
        $categories = Categories::orderBy('id', 'desc')->get();
        return view('product.edit', compact('edit', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = [
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'status' => $request->status,
        ];

        $product = Products::find($id);
        if ($request->hasFile('product_photo')) {
            // jika gambar sudah ada dan mau diubah maka gambar lama kita hapus di ganti oleh gambar baru
            if ($product->product_photo) {
                File::delete(public_path('storage/' . $product->photo));
            }

            $photo = $request->file('product_photo')->store('product', 'public');
            $data['product_photo'] = $photo;
        }

        $product->update($data);
        // Alert::success('Success', 'Edit Succesfully');
        toast('Data Changed Successfully', 'success');
        return redirect()->to('product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Products::find($id);
        File::delete(public_path('storage/' . $product->product_photo));
        $product->delete();
        toast('Data Deleted Successfully', 'success');
        return redirect()->to('product');
    }
    public function insertTransaction(Request $request)
    {
        // return $request;
        //insert order
        $data = new Others;
        $getcode = Others::max('id');
        $getcode++;
        $data->order_code = 'ORD' . date('dmy') . sprintf("%03d", $getcode);
        $data->order_amount = $request->grandtotal;
        $data->order_date = date('Y-m-d');
        $data->order_change = 1;
        $data->order_status = 1;

        if ($data->save()) {

            //insert order detail
            $last_insert = $data->id;
            $detaillist = json_decode($request->listjson);
            if (count($detaillist) > 0) {
                $noc = 1;
                foreach ($detaillist as $indexname => $rows) {
                    $set[$noc] = array();
                    $no = 0;
                    foreach ($rows[1] as $index => $row) {
                        if ($no == 0) {
                            $set[$noc]['order_id'] = $last_insert;
                        }
                        $set[$noc][$index] = $row;
                        $no++;
                    }
                    OthersDetails::create($set[$noc]);
                    $noc++;
                }
            }
            $json['status'] = 1;
        } else {
            $json['status'] = 0;
        }
        return json_encode($json);
    }
    public function KasirProcess(Request $request)
    {
        // return $request;
        //insert order
        $data = new Others;
        $getcode = Others::max('id');
        $getcode++;
        $data->order_code = 'ORD' . date('dmy') . sprintf("%03d", $getcode);
        $data->order_amount = $request->total;
        $data->order_date = date('Y-m-d');
        $data->order_change = 1;
        $data->order_status = 1;

        if ($data->save()) {

            //insert order detail
            $last_insert = $data->id;
            $detaillist = json_decode($request->cart, true);
            // return $detaillist;
            if (count($detaillist) > 0) {
                $noc = 1;
                foreach ($detaillist as $indexname => $rows) {
                    $set[$noc] = array();
                    $no = 0;
                    $set[$noc]['order_id'] = $last_insert;
                    $set[$noc]['product_id'] = $rows['productId'];
                    $set[$noc]['order_price'] = $rows['price'];
                    $set[$noc]['order_subtotal'] = $rows['price'] * $rows['qty'];
                    $set[$noc]['qty'] = $rows['qty'];
                    $productId[] = $rows['productId'];
                    // foreach ($rows as $index => $row) {
                    //     if ($no == 0) {
                    //     }
                    //     $set[$noc][$index] = $row;
                    //     $no++;
                    // }
                    OthersDetails::create($set[$noc]);
                    $noc++;
                }
            }
            // return $listqty;
            $this->caculate_stok($productId);
            Alert::toast('Data Insert Successfully', 'success');
            return redirect()->to('kasir');
        } else {
            Alert::toast('Data Failed Insert', 'error');
        }
    }

    public function print(string $id)
    {
        $data['title'] = 'Order Details';
        $data['data'] = Others::findOrFail($id);
        $data['dataDetail'] = OthersDetails::with('product')->where('order_id', $id)->get();
        return view('pos.print', $data);
    }
    public function kasir(string $id)
    {
        $data['title'] = 'Kasir';
        return view('kasir', $data);
    }
    public function caculate_stok($arr)
    {
        // $inClause = implode(',', $arr);
        // return $inClause;
        // $update = DB::update("
        // UPDATE products a
        // LEFT JOIN (
        //     SELECT SUM(qty) AS totalqty, product_id
        //     FROM order_details
        //     GROUP BY product_id
        // ) b ON a.id = b.product_id
        // SET
        //     a.qty_keluar = IFNULL(b.totalqty, 0),
        //     a.qty_akhir  = a.qty_awal - IFNULL(b.totalqty, 0)
        // WHERE a.id IN ($inClause)
        // ");

        $results = DB::table('products as a')
            ->leftJoin(DB::raw('(SELECT SUM(qty) as totalqty, product_id FROM order_details GROUP BY product_id) b'), 'a.id', '=', 'b.product_id')
            ->select('a.id', 'a.qty_awal', DB::raw('IFNULL(b.totalqty, 0) as totalqty'))
            ->whereIn('a.id', $arr)
            ->get();

        // 2. Update per baris
        foreach ($results as $row) {
            DB::table('products')
                ->where('id', $row->id)
                ->update([
                    'qty_keluar' => $row->totalqty,
                    'qty_akhir'  => $row->qty_awal - $row->totalqty,
                ]);
        }
    }
}

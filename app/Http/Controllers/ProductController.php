<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\OthersDetails;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = Auth::user()->UserRoles;
        // return $user;
        $title = "Data Products";
        // select * from product LEFT JOIN categories ON categories.id = products.category_id
        // ORM : Object Relation Mapp
        $datas = Products::with('category')->get();
        return view('product.index', compact('title', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // select * from categories order by id desc
        $categories = Categories::orderBy('id', 'desc')->get();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request;
        $data = [
            'category_id' => $request->category_id,
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_description' => $request->product_description,
            'qty_awal' => $request->qty_awal,
            'qty_keluar' => $request->qty_keluar,
            'qty_akhir' => $request->qty_akhir,
            'is_active' => $request->is_active,
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
        //
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
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_description' => $request->product_description,
            'qty_awal' => $request->qty_awal,
            'qty_keluar' => $request->qty_keluar,
            'qty_akhir' => $request->qty_akhir,
            'is_active' => $request->is_active,
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
        $orderdetail = OthersDetails::where('product_id', $id)->delete();
        File::delete(public_path('storage/' . $product->product_photo));
        $product->delete();
        toast('Data Deleted Successfully', 'success');
        return redirect()->to('product');
    }

    public function getproduct(Request $request)
    {
        $json['data'] = Products::where('category_id', $request->category_id)->get();
        $json['status'] = '1';
        return json_encode($json, JSON_PRETTY_PRINT);
    }
}

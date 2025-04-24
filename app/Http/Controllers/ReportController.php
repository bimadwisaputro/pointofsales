<?php

namespace App\Http\Controllers;

use App\Models\OthersDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function laporan_penjualan()
    {
        // $data['data'] = Others::findOrFail($id);
        // $data['dataDetail'] = OthersDetails::with('product')->where('order_id', $id)->get();
        $data['data'] = 0;
        $data['datefrom'] = date('Y-m-d');
        $data['dateto'] = date('Y-m-d');
        $data['title'] = 'Laporan Penjualan';
        return view('laporan.penjualan', $data);
    }
    public function laporan_penjualan_load(Request $request)
    {
        // return $request;
        // $data['data'] = Others::findOrFail($id);
        // $data['dataDetail'] = OthersDetails::with('product')->where('order_id', $id)->get();
        $data['data'] = OthersDetails::with('product', 'order')->whereHas('order', function ($q) use ($request) {
            $q->where('order_date', '>=', $request->datefrom)->where('order_date', '<=', $request->dateto);
        })->get();
        // return $data['data'];
        $data['title'] = 'Laporan Penjualan';
        $data['datefrom'] = $request->datefrom;
        $data['dateto'] = $request->dateto;
        toast('Data Loaded Successfully', 'success');
        return view('laporan.penjualan', $data);
    }
    public function laporan_stokbarang()
    {
        //
        $data['data'] = 'data';
        $data['datefrom'] = date('Y-m-d');
        $data['dateto'] = date('Y-m-d');
        $data['title'] = 'Laporan Stok';
        return view('laporan.stok', $data);
    }
    public function laporan_stokbarang_load(Request $request)
    {

        $subquery = DB::table('others_details as a')
            ->selectRaw('
        SUM(qty) as totalqty,
        COUNT(a.id) as totalsell,
        SUM(order_subtotal) as totalrevenue,
        product_id
         ')
            ->leftJoin('others as b', 'a.order_id', '=', 'b.id')
            ->whereDate('b.order_date', '>=', $request->datefrom)
            ->whereDate('b.order_date', '<=', $request->dateto)
            ->groupBy('product_id');

        $data['data'] = DB::table('products as a')
            ->leftJoinSub($subquery, 'b', 'a.id', '=', 'b.product_id')
            ->selectRaw('
        a.*, 
        IFNULL(b.totalqty, 0) as totalqty,
        IFNULL(b.totalsell, 0) as totalsell,
        IFNULL(b.totalrevenue, 0) as totalrevenue
    ')->get();
        // return $data['data'];
        $data['title'] = 'Laporan Stok';
        $data['datefrom'] = $request->datefrom;
        $data['dateto'] = $request->dateto;
        toast('Data Loaded Successfully', 'success');
        return view('laporan.stok', $data);
    }
    public function laporan_summary()
    {
        //
        $data['data'] = 'data';
        $data['datefrom'] = date('Y-m-d');
        $data['dateto'] = date('Y-m-d');
        $data['title'] = 'Laporan Summary';
        return view('laporan.summary', $data);
    }

    public function laporan_summary_load(Request $request)
    {

        $subquery = DB::table('others_details as a')
            ->selectRaw('
        SUM(qty) as totalqty,
        COUNT(a.id) as totalsell,
        SUM(order_subtotal) as totalrevenue,
        product_id
         ')
            ->leftJoin('others as b', 'a.order_id', '=', 'b.id')
            ->whereDate('b.order_date', '>=', $request->datefrom)
            ->whereDate('b.order_date', '<=', $request->dateto)
            ->groupBy('product_id');

        $data['data'] = DB::table('products as a')
            ->leftJoinSub($subquery, 'b', 'a.id', '=', 'b.product_id')
            ->selectRaw('
        a.*, 
        IFNULL(b.totalqty, 0) as totalqty,
        IFNULL(b.totalsell, 0) as totalsell,
        IFNULL(b.totalrevenue, 0) as totalrevenue
    ')->get();
        // return $data['data'];
        $data['title'] = 'Laporan Summary';
        $data['datefrom'] = $request->datefrom;
        $data['dateto'] = $request->dateto;
        toast('Data Loaded Successfully', 'success');
        return view('laporan.summary', $data);
    }
}

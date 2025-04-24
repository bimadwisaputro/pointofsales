<?php

namespace App\Http\Controllers;

use App\Models\OthersDetails;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function laporan_penjualan()
    {
        // $data['data'] = Others::findOrFail($id);
        // $data['dataDetail'] = OthersDetails::with('product')->where('order_id', $id)->get();
        $data['data'] = 0;
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
        return view('laporan.penjualan', $data);
    }
    public function laporan_stokbarang()
    {
        //
        $data['data'] = 'data';
        return view('laporan.stok', $data);
    }
    public function laporan_summary()
    {
        //
        $data['data'] = 'data';
        return view('laporan.summary', $data);
    }
}

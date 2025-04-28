<?php

namespace App\Http\Controllers;

use App\Models\OthersDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function laporan_penjualan()
    {
        // $data['data'] = Others::findOrFail($id);
        // $data['dataDetail'] = OthersDetails::with('product')->where('order_id', $id)->get();
        $data['data'] = 0;
        $data['datefrom'] = date('Y-m-d');
        $data['dateto'] = date('Y-m-d');
        $data['date'] = date('Y-m-d');
        $data['week'] = date('Y') . '-W' . date('W');
        $data['month'] = date('Y-m');
        $data['typereport'] = 'custom';
        $data['title'] = 'Laporan Penjualan';
        return view('laporan.penjualan', $data);
    }
    public function laporan_penjualan_load(Request $request)
    {
        // return $request;
        // $data['data'] = Others::findOrFail($id);
        // $data['dataDetail'] = OthersDetails::with('product')->where('order_id', $id)->get();

        if ($request->typereport == 'week') {
            $weekInput = $request->week; // contoh '2025-W17'
            // Ubah ke tanggal awal dan akhir minggu
            [$year, $week] = explode('-W', $weekInput);
            $date['datefrom'] = Carbon::now()->setISODate($year, $week)->startOfWeek();
            $date['dateto'] = Carbon::now()->setISODate($year, $week)->endOfWeek();
            $data['week'] = $request->week;
            $data['datefrom'] = date('Y-m-d');
            $data['dateto'] = date('Y-m-d');
            $data['date'] = date('Y-m-d');
            // $data['week'] = date('Y') . '-W' . date('W');
            $data['month'] = date('Y-m');
        } else if ($request->typereport == 'month') {
            $monthInput = $request->month;
            // Ubah ke tanggal awal dan akhir bulan
            $date['datefrom'] = Carbon::createFromFormat('Y-m', $monthInput)->startOfMonth();
            $date['dateto'] = Carbon::createFromFormat('Y-m', $monthInput)->endOfMonth();
            $data['month'] = $request->month;
            $data['datefrom'] = date('Y-m-d');
            $data['dateto'] = date('Y-m-d');
            $data['date'] = date('Y-m-d');
            $data['week'] = date('Y') . '-W' . date('W');
            // $data['month'] = date('Y-m');
        } else if ($request->typereport == 'date') {
            $date['datefrom'] = $request->date;
            $date['dateto'] = $request->date;
            $data['date'] = $request->date;
            $data['datefrom'] = date('Y-m-d');
            $data['dateto'] = date('Y-m-d');
            // $data['date'] = date('Y-m-d');
            $data['week'] = date('Y') . '-W' . date('W');
            $data['month'] = date('Y-m');
        } else if ($request->typereport == 'custom') {
            $date['datefrom'] = $request->datefrom;
            $date['dateto'] = $request->dateto;
            $data['datefrom'] = $date['datefrom'];
            $data['dateto'] = $date['dateto'];
            $data['date'] = date('Y-m-d');
            $data['week'] = date('Y') . '-W' . date('W');
            $data['month'] = date('Y-m');
        }
        $data['data'] = OthersDetails::with('product', 'order')->whereHas('order', function ($q) use ($date) {
            $q->where('order_date', '>=', $date['datefrom'])->where('order_date', '<=', $date['dateto']);
        })->get();
        // return $data['data'];

        $data['summarylist'] = DB::select("
               SELECT b.order_date,count(a.id) totaltransaction,sum(a.qty) totalqty,sum(a.order_subtotal) totalpenjualan
               FROM `others_details` a
               left join others b on a.order_id=b.id
               where b.order_date >= '" . $date['datefrom'] . "' and b.order_date <= '" . $date['dateto'] . "'
               group by b.order_date ");

        $data['title'] = 'Laporan Penjualan';
        $data['typereport'] = $request->typereport;
        toast('Data Loaded Successfully', 'success');
        return view('laporan.penjualan', $data);
    }
    public function laporan_stokbarang()
    {
        //
        $data['data'] = 0;
        $data['datefrom'] = date('Y-m-d');
        $data['dateto'] = date('Y-m-d');
        $data['date'] = date('Y-m-d');
        $data['week'] = date('Y') . '-W' . date('W');
        $data['month'] = date('Y-m');
        $data['typereport'] = 'custom';
        $data['title'] = 'Laporan Stok';
        return view('laporan.stok', $data);
    }
    public function laporan_stokbarang_load(Request $request)
    {

        // return $request;
        if ($request->typereport == 'week') {
            $weekInput = $request->week; // contoh '2025-W17'
            // Ubah ke tanggal awal dan akhir minggu
            [$year, $week] = explode('-W', $weekInput);
            $datefrom = Carbon::now()->setISODate($year, $week)->startOfWeek();
            $dateto = Carbon::now()->setISODate($year, $week)->endOfWeek();
            $data['week'] = $request->week;
            $data['datefrom'] = date('Y-m-d');
            $data['dateto'] = date('Y-m-d');
            $data['date'] = date('Y-m-d');
            // $data['week'] = date('Y') . '-W' . date('W');
            $data['month'] = date('Y-m');
        } else if ($request->typereport == 'month') {
            $monthInput = $request->month;
            // Ubah ke tanggal awal dan akhir bulan
            $datefrom = Carbon::createFromFormat('Y-m', $monthInput)->startOfMonth();
            $dateto = Carbon::createFromFormat('Y-m', $monthInput)->endOfMonth();
            $data['month'] = $request->month;
            $data['datefrom'] = date('Y-m-d');
            $data['dateto'] = date('Y-m-d');
            $data['date'] = date('Y-m-d');
            $data['week'] = date('Y') . '-W' . date('W');
            // $data['month'] = date('Y-m');
        } else if ($request->typereport == 'date') {
            $datefrom = $request->date;
            $dateto = $request->date;
            $data['date'] = $request->date;
            $data['datefrom'] = date('Y-m-d');
            $data['dateto'] = date('Y-m-d');
            // $data['date'] = date('Y-m-d');
            $data['week'] = date('Y') . '-W' . date('W');
            $data['month'] = date('Y-m');
        } else if ($request->typereport == 'custom') {
            $datefrom = $request->datefrom;
            $dateto = $request->dateto;
            $data['datefrom'] = $datefrom;
            $data['dateto'] = $dateto;
            // $data['datefrom'] = date('Y-m-d');
            // $data['dateto'] = date('Y-m-d');
            $data['date'] = date('Y-m-d');
            $data['week'] = date('Y') . '-W' . date('W');
            $data['month'] = date('Y-m');
        }

        // Query
        $subquery = DB::table('others_details as a')
            ->selectRaw('
        SUM(qty) as totalqty,
        COUNT(a.id) as totalsell,
        SUM(order_subtotal) as totalrevenue,
        product_id
         ')
            ->leftJoin('others as b', 'a.order_id', '=', 'b.id')
            ->whereDate('b.order_date', '>=', $datefrom)
            ->whereDate('b.order_date', '<=', $dateto)
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
        $data['typereport'] = $request->typereport;
        toast('Data Loaded Successfully', 'success');
        return view('laporan.stok', $data);
    }
    public function laporan_summary()
    {
        //
        $data['data'] = 0;
        $data['datefrom'] = date('Y-m-d');
        $data['dateto'] = date('Y-m-d');
        $data['date'] = date('Y-m-d');
        $data['week'] = date('Y') . '-W' . date('W');
        $data['month'] = date('Y-m');
        $data['typereport'] = 'custom';
        $data['title'] = 'Laporan Summary';
        return view('laporan.summary', $data);
    }

    public function laporan_summary_load(Request $request)
    {

        if ($request->typereport == 'week') {
            $weekInput = $request->week; // contoh '2025-W17'
            // Ubah ke tanggal awal dan akhir minggu
            [$year, $week] = explode('-W', $weekInput);
            $datefrom = Carbon::now()->setISODate($year, $week)->startOfWeek();
            $dateto = Carbon::now()->setISODate($year, $week)->endOfWeek();
            $data['week'] = $request->week;
            $data['datefrom'] = date('Y-m-d');
            $data['dateto'] = date('Y-m-d');
            $data['date'] = date('Y-m-d');
            // $data['week'] = date('Y') . '-W' . date('W');
            $data['month'] = date('Y-m');
        } else if ($request->typereport == 'month') {
            $monthInput = $request->month;
            // Ubah ke tanggal awal dan akhir bulan
            $datefrom = Carbon::createFromFormat('Y-m', $monthInput)->startOfMonth();
            $dateto = Carbon::createFromFormat('Y-m', $monthInput)->endOfMonth();
            $data['month'] = $request->month;
            $data['datefrom'] = date('Y-m-d');
            $data['dateto'] = date('Y-m-d');
            $data['date'] = date('Y-m-d');
            $data['week'] = date('Y') . '-W' . date('W');
            // $data['month'] = date('Y-m');
        } else if ($request->typereport == 'date') {
            $datefrom = $request->date;
            $dateto = $request->date;
            $data['date'] = $request->date;
            $data['datefrom'] = date('Y-m-d');
            $data['dateto'] = date('Y-m-d');
            // $data['date'] = date('Y-m-d');
            $data['week'] = date('Y') . '-W' . date('W');
            $data['month'] = date('Y-m');
        } else if ($request->typereport == 'custom') {
            $datefrom = $request->datefrom;
            $dateto = $request->dateto;
            $data['datefrom'] = $datefrom;
            $data['dateto'] = $dateto;
            // $data['datefrom'] = date('Y-m-d');
            // $data['dateto'] = date('Y-m-d');
            $data['date'] = date('Y-m-d');
            $data['week'] = date('Y') . '-W' . date('W');
            $data['month'] = date('Y-m');
        }

        $subquery = DB::table('others_details as a')
            ->selectRaw('
        SUM(qty) as totalqty,
        COUNT(a.id) as totalsell,
        SUM(order_subtotal) as totalrevenue,
        product_id
         ')
            ->leftJoin('others as b', 'a.order_id', '=', 'b.id')
            ->whereDate('b.order_date', '>=', $datefrom)
            ->whereDate('b.order_date', '<=', $dateto)
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
        $data['typereport'] = $request->typereport;
        toast('Data Loaded Successfully', 'success');
        return view('laporan.summary', $data);
    }
}

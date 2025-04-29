<?php

namespace App\Http\Controllers;

use App\Models\OthersDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['total_sum'] = DB::select("
               select ifnull((select count(id) total from orders where order_date = current_date()) ,0)  totalorder,
             ifnull((select sum(order_subtotal) subtotal from order_details a left join orders b on a.order_id=b.id where b.order_date = current_date()) ,0) totalrevenue,
            ifnull((select count(id) total from products  ) ,0)  totalproduct
        ");

        $data['top5product'] = DB::select("
              SELECT a.*,ifnull(totalpenjualan,0) totalpenjualan,ifnull(totalsubtotal,0) totalsubtotal,ifnull(totalqty,0) totalqty FROM `products` a left join (select count(id) totalpenjualan, sum(order_subtotal) totalsubtotal, sum(qty) totalqty,product_id from order_details group by product_id) b on a.id=b.product_id order by b.totalqty desc limit 5;
        ");
        $data['top5category'] = DB::select("
           SELECT a.*,ifnull(totalpenjualan,0) totalpenjualan,ifnull(totalsubtotal,0) totalsubtotal,ifnull(totalqty,0) totalqty FROM `categories` a left join (select count(a.id) totalpenjualan, sum(order_subtotal) totalsubtotal, sum(qty) totalqty,b.category_id from order_details a left join products b on a.product_id=b.id group by category_id ) b on a.id=b.category_id order by b.totalqty desc limit 5; ");


        $data['last10order'] = DB::select("
            select a.*,ifnull(totalpenjualan,0) totalpenjualan,ifnull(totalsubtotal,0) totalsubtotal,ifnull(totalqty,0) totalqty from orders a left join  (select count(id) totalpenjualan, sum(order_subtotal) totalsubtotal, sum(qty) totalqty,order_id from order_details group by order_id)  b on a.id=b.order_id where a.order_date=current_date() order by a.created_at desc limit 10
        ");

        $subquery = DB::table('order_details as a')
            ->selectRaw('
        SUM(qty) as totalqty,
        COUNT(a.id) as totalsell,
        SUM(order_subtotal) as totalrevenue,
        product_id
         ')
            ->leftJoin('orders as b', 'a.order_id', '=', 'b.id')
            ->whereDate('b.order_date', '=', date('Y-m-d'))
            ->groupBy('product_id');

        $data['stokproduk'] = DB::table('products as a')
            ->leftJoinSub($subquery, 'b', 'a.id', '=', 'b.product_id')
            ->selectRaw('
        a.*,
        IFNULL(b.totalqty, 0) as totalqty,
        IFNULL(b.totalsell, 0) as totalsell,
        IFNULL(b.totalrevenue, 0) as totalrevenue
    ')->get();


        // return $data['total_sum'];
        return view('dashboard.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

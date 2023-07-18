<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dish;
use App\Models\Order;

class StatController extends Controller
{
      /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index()
      {
            $restaurantId = auth()->user()->restaurant->id;
            $dishes = Dish::where('restaurant_id', $restaurantId)->get();

            // recupera ordini e profitto divisi per anni
            $ordersYear = Order::whereHas('dishes', function ($query) use ($restaurantId) {
                  $query->where('restaurant_id', $restaurantId);
            })->selectRaw('count(*) as total_orders_year, YEAR(created_at) as year')->groupBy('year')
                  ->selectRaw('SUM(orders.total_price) as total_profit_year')->groupBy('year')
                  ->get();

            // recupera ordini e profitto divisi per mesi
            $ordersMonth = Order::whereHas('dishes', function ($query) use ($restaurantId) {
                  $query->where('restaurant_id', $restaurantId);
            })->selectRaw('count(*) as total_orders_month, DATE_FORMAT(created_at, "%m") as month')->groupBy('month')
                  ->selectRaw('SUM(orders.total_price) as total_profit_month, MONTHNAME(MIN(created_at)) as month_name')->orderBy('month')
                  ->get();

            $year = $ordersYear->pluck('year')->toArray();
            $month = $ordersMonth->pluck('month_name')->toArray();
            $total_orders_year = $ordersYear->pluck('total_orders_year')->toArray();
            $total_orders_month = $ordersMonth->pluck('total_orders_month')->toArray();
            $total_profit_year = $ordersYear->pluck('total_profit_year')->toArray();
            $total_profit_month = $ordersMonth->pluck('total_profit_month')->toArray();

            $chartData = [
                  'year' => $year,
                  'month' => $month,
                  'ordersYear' => $total_orders_year,
                  'ordersMonth' => $total_orders_month,
                  'profitYear' => $total_profit_year,
                  'profitMonth' => $total_profit_month,
            ];

            return view('admin.stats.index', compact('chartData'));
      }

      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
            //
      }

      /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */
      public function store(Request $request)
      {
            //
      }

      /**
       * Display the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function show($id)
      {
            //
      }

      /**
       * Show the form for editing the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function edit($id)
      {
            //
      }

      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request, $id)
      {
            //
      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
            //
      }
}

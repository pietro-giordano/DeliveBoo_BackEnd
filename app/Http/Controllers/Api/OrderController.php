<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Mail\NewOrderAdmin;
use App\Mail\NewOrderGuest;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
      /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index()
      {
            //
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
      public function store(StoreOrderRequest $request)
      {
            $data = $request->validated();

            // crea il nuovo ordine
            $newOrder = Order::create($data);

            // attach dei valori dish_id e quantity
            foreach ($data['cart'] as $cart) {
                  $dish_id = $cart['id'];
                  $quantity = $cart['qty'];
                  $newOrder->dishes()->attach($dish_id, ['quantity' => $quantity]);
            }

            // recupero email del ristorante/user
            $user = Restaurant::whereHas('dishes', function ($query) use ($data) {
                  $query->where('id', $data['cart'][0]['id']);
            })->first()->user;

            // invia mail contenente il nuovo ordine al ristoratore
            Mail::to([$user->email])->send(new NewOrderAdmin($newOrder));

            // invia mail contenente il nuovo ordine al cliente
            Mail::to([$newOrder->customer_email])->send(new NewOrderGuest($newOrder));

            // rimanda al frontend il json con i dati del nuovo ordine 
            return response()->json([
                  'success' => true,
                  'code' => 200,
                  'message' => 'Ok',
                  'order' => $newOrder
            ]);
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

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Exception;

class RestaurantController extends Controller
{
      /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index()
      {
            $restaurants = Restaurant::with('categories')->paginate(16);

            // se presente, aggiusta perscorso immagine
            foreach ($restaurants as $restaurant) {
                  if ($restaurant->image) {
                        $restaurant['image'] = asset('storage/' . $restaurant->image);
                  }
            }

            return response()->json([
                  'success' => true,
                  'code' => 200,
                  'message' => 'Ok',
                  'restaurants' => $restaurants
            ]);
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
      public function show($slug)
      {
            try {
                  $restaurant = Restaurant::where('slug', $slug)->with('dishes')->with('categories')->firstOrFail();

                  // se presente aggiusta percorso immagine ristorante
                  if ($restaurant->image) {
                        $restaurant->image = asset('storage/' . $restaurant->image);
                  }

                  // se presente aggiusta percorso immagine dei piatti associati al ristorante
                  foreach ($restaurant->dishes as $dish) {
                        if ($dish->image) {
                              $dish['image'] = asset('storage/' . $dish->image);
                        }
                  }

                  return response()->json([
                        'success' => true,
                        'code' => 200,
                        'message' => 'Ok',
                        'restaurants' => $restaurant
                  ]);
            } catch (Exception $e) {
                  return response()->json([
                        'success' => false,
                        'code' => $e->getCode(),
                        'message' => $e->getMessage()
                  ]);
            }
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

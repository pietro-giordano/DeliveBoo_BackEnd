<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateRestaurantRequest;

// Model
use App\Models\Restaurant;
use App\Models\Category;

// Helpers
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class RestaurantController extends Controller
{
      /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index()
      {
            $userId = auth()->user()->id;
            
            $restaurant = Restaurant::with('categories')->where('user_id', $userId)->first();

            return view('admin.restaurants.index', compact('restaurant'));
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
       * @param  \App\Models\Restaurant  $restaurant
       * @return \Illuminate\Http\Response
       */
      public function edit(Restaurant $restaurant)
      {
            if (auth()->user()->restaurant->id !== $restaurant->id) {
                  abort(403, 'Unauthorized action.');
            }

            $categories = Category::all();

            return view('admin.restaurants.edit', compact('restaurant','categories'));
      }

      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\UpdateRestaurantRequest  $request
       * @param  \App\Models\Restaurant  $restaurant
       * @return \Illuminate\Http\Response
       */
      public function update(UpdateRestaurantRequest $request,Restaurant $restaurant)
      {
            if (auth()->user()->restaurant->id !== $restaurant->id) {
                  abort(403, 'Unauthorized action.');
            }

            $data = $request->validated();

            if (array_key_exists('delete_check', $data)) {
                  if ($restaurant->image) {
                  Storage::delete($restaurant->image);

                  $restaurant->image = null;
                  $restaurant->save();
                  }
            }
            else if (array_key_exists('image', $data)) {
                  $imgPath = Storage::put('restaurants', $data['image']);
                  $data['image'] = $imgPath;
      
                  if ($restaurant->image) {
                      Storage::delete($restaurant->image);
                  }
            }

            $data['slug'] = Str::slug($data['restaurant_name']);

            $restaurant->update($data);

            if (array_key_exists('categories', $data)) 
            {
                  $restaurant->categories()->sync($data['categories']);
            }
            else 
            {
                  $restaurant->categories()->sync([]);
            }

            return redirect()->route('admin.restaurants.index')->with('success', 'Dati Ristorante Modificati Con Successo');

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

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
      /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index()
      {
            $categories = Category::with('restaurants')->get();

            // se presente, aggiusta perscorso immagine
            foreach ($categories as $category) {
                  if ($category->image) {
                        $category['image'] = asset('storage/' . $category->image);
                  }
            }

            // Aggiungi il percorso completo alle immagini dei ristoranti
            foreach ($categories as $category) {
                  foreach ($category->restaurants as $restaurant) {
                        if ($restaurant->image) {
                        $restaurant['image'] = asset('storage/' . $restaurant->image);
                        }
                        // Aggiungi le categorie a cui appartiene il ristorante
                        $restaurant['categories'] = $restaurant->categories->map(function ($category) {
                              return [
                              'id' => $category->id,
                              'name' => $category->name,
                              ];
                        });
                  }
            }

            return response()->json([
                  'success' => true,
                  'code' => 200,
                  'message' => 'Ok',
                  'categories' => $categories
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
      public function show($categories)
      {
            $selectedCategories = explode(',', $categories);

            $categories = Category::whereIn('id', $selectedCategories)->with('restaurants')->get();

            // se presente, aggiusta perscorso immagine
            foreach ($categories as $category) {
                  if ($category->image) {
                        $category['image'] = asset('storage/' . $category->image);
                  }
            }

            // Aggiungi il percorso completo alle immagini dei ristoranti
            foreach ($categories as $category) {
                  foreach ($category->restaurants as $restaurant) {
                        if ($restaurant->image) {
                        $restaurant['image'] = asset('storage/' . $restaurant->image);
                        }
                        // Aggiungi le categorie a cui appartiene il ristorante
                        $restaurant['categories'] = $restaurant->categories->map(function ($category) {
                              return [
                              'id' => $category->id,
                              'name' => $category->name,
                              ];
                        });
                  }
            }

            return response()->json([
                  'success' => true,
                  'code' => 200,
                  'message' => 'Ok',
                  'categories' => $categories
            ]);
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

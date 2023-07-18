<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreDishRequest;
use App\Http\Requests\UpdateDishRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

// Controllers
use App\Http\Controllers\Controller;

// Model
use App\Models\Dish;

class DishController extends Controller
{
      /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index()
      {     
            $restaurantId = auth()->user()->restaurant->id;
            $dishes = Dish::where('restaurant_id', $restaurantId)->orderBy('name')->get();

            return view('admin.dishes.index', compact('dishes'));
      }

      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
            return view('admin.dishes.create');
      }

      /**
       * Store a newly created resource in storage.
       *
       * @param  \App\Http\Requests\StoreDishRequest  $request
       * @return \Illuminate\Http\Response
       */
      public function store(StoreDishRequest $request)
      {
            $data = $request->validated();
            $data['slug'] = Str::slug($data['name']);

            // Otteniamo l'ID del ristorante dall'utente autenticato
            $restaurantId = auth()->user()->restaurant->id;
            // Aggiungiamo l'ID del ristorante ai dati del piatto
            $data['restaurant_id'] = $restaurantId;
            
            if (array_key_exists('image', $data)) {
                  $img_path = Storage::put('dishes', $data['image']);
                  $data['image'] = $img_path;
            }

            $newDish = Dish::create($data);
            return redirect()->route('admin.dishes.show', $newDish)->with('success', 'Piatto aggiunto correttamente');
      }

      /**
       * Display the specified resource.
       *
       * @param  \App\Models\Dish  $dish
       * @return \Illuminate\Http\Response
       */
      public function show(Dish $dish)
      {
            $restaurant_id = $dish->restaurant_id;
            if ($restaurant_id != auth()->user()->restaurant->id) {
                  abort(403, 'Unauthorized action.');
            }    
            
            return view('admin.dishes.show', compact('dish'));
      }

      /**
       * Show the form for editing the specified resource.
       *
       * @param  \App\Models\Dish  $dish
       * @return \Illuminate\Http\Response
       */
      public function edit(Dish $dish)
      {
            $restaurant_id = $dish->restaurant_id;
            if ($restaurant_id != auth()->user()->restaurant->id) {
                  abort(403, 'Unauthorized action.');
            }
            return view('admin.dishes.edit', compact('dish'));
      }

      /**
       * Update the specified resource in storage.
       *
       * @param  \App\Http\Requests\UpdateDishRequest  $request
       * @param  \App\Models\Dish  $dish
       * @return \Illuminate\Http\Response
       */
      public function update(UpdateDishRequest $request, Dish $dish)
      { 
            $restaurant_id = $dish->restaurant_id;
            if ($restaurant_id != auth()->user()->restaurant->id) {
                  abort(403, 'Unauthorized action.');
            }    

            $data = $request->validated();
            $data['slug'] = Str::slug($data['name']);

            if (array_key_exists('delete_check', $data)) {
                  // delete_check è il name della checkbox per eliminare immagine
                  if ($dish->image) {
                        Storage::delete($dish->image);
                        $dish->image = null;
                        $dish->save();
                  }
            } else if (array_key_exists('image', $data)) {
                  $img_path = Storage::put('dish', $data['image']);
                  $data['image'] = $img_path;

                  if ($dish->image) {
                        Storage::delete($dish->image);
                  }
            }

            // Aggiorna lo stato dello switch disponibile/nondisponibile
            $data['available'] = $request->has('available');

            $dish->update($data);
            return redirect()->route('admin.dishes.show', $dish->id)->with('success', 'Piatto aggiornato con successo');
      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  \App\Models\Dish  $dish
       * @return \Illuminate\Http\Response
       */
      public function destroy(Dish $dish)
      {
            if ($dish->image) {
                  Storage::delete($dish->image);
            }

            $dish->delete();
            return redirect()->route('admin.dishes.index')->with('success', 'Piatto eliminato correttamente');
      }
}

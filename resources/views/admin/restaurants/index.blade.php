@extends('layouts.admin')

@section('content')
<div class="container-fluid">
      <div class="row justify-content-center">
            <div class="col text-center leo">
                  @include('partials.success')

                  <h1 class="text-warning">{{ $restaurant->restaurant_name }}</h1>

                  @if ($restaurant->image)
                    <div>
                        <img src="{{ asset('storage/'.$restaurant->image) }}" style="height: 300px" alt="">
                    </div>
                  @endif

                  <div class="mt-2">
                        <strong>Descrizione:</strong> {{ $restaurant->description }}
                  </div>
                  
                  <div>
                        <strong>Tipo di cucina:</strong>
                        @foreach ($restaurant->categories as $category)
                              <div class="badge bg-warning text-black">
                                    {{ $category->name }}
                              </div>
                        @endforeach
                  </div>

                  <div>
                        <strong>Indirizzo:</strong> {{ $restaurant->address }}
                  </div>
                  <div>
                        <strong>Citta':</strong> {{ $restaurant->city }}
                  </div>
                  <div>
                        <strong>P.IVA:</strong> {{ $restaurant->vat }}
                  </div>
                  <div>
                        <strong>Telefono:</strong> {{ $restaurant->phone }}
                  </div>
                  <a href="{{ route('admin.restaurants.edit', $restaurant->id) }}" class="btn btn-dark mt-2">
                        Modifica Dati Ristorante
                  </a>
            </div>
      </div>
</div>

<style>
      ul{
            list-style: none;
            margin: 0;
      }
      .leo > *{
            margin: 10px 0px;
      }
</style>
@endsection



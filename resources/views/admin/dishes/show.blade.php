@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col text-center">
                @include('partials.success')
                <h2>
                    Nome Piatto: <span class="text-warning">{{ $dish->name }} </span> 
                </h2>
                @if ($dish->image)
                    <div>
                        <img src="{{ asset('storage/'.$dish->image) }}" style="height: 300px" alt="">
                    </div>
                @endif
                <div>
                    <strong>Descrizione:</strong> {{ $dish->description }}
                </div>
                <div>
                   <strong>Prezzo:</strong> {{ $dish->price }}
                </div>
                <div>
                   <strong>Disponibilità:</strong>
                   @if ($dish->available)
                       <p class="card-text text-success" >Disponibile</p>
                   @else
                       <p class="card-text" style="color: red">Non disponibile</p>
                   @endif
                </div>
                {{-- <div>
                    <strong>Categoria:</strong>
                    @if ($dish->category)
                        <a href="{{ route('admin.categories.show', $dish->category->id) }}">
                            {{ $dish->category->name }}
                        </a>
                    @endif
                </div> --}}
                <a href="{{ route('admin.dishes.index') }}" class="btn btn-dark mt-4">
                    Torna Indietro
                </a>
            </div>
        </div>
    </div>
@endsection
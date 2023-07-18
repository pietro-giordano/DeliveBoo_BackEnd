@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center mb-4">
        <div class="col">
            <h2>
                Modifica Dati Ristorante
            </h2>
        </div>
        @include('partials.errors')
        <div class="row my-4">
            <div class="col">
                <form action="{{ route('admin.restaurants.update', $restaurant->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <label for="restaurant_name" class="form-label">
                        <strong>Nome Ristorante</strong><span class="text-danger">*</span>  
                    </label>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text" id="addon-wrapping">
                            <i class="fa-solid fa-utensils fa-lg fa-fw"></i>
                        </span>
                        <input 
                            type="text"
                            id="restaurant_name" 
                            class="form-control" 
                            name="restaurant_name" 
                            required maxlength="128" 
                            value="{{ old('restaurant_name', $restaurant->restaurant_name) }}">

                            @error('restaurant_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <label for="description" class="form-label">
                        <strong>Descrizione</strong><span class="text-danger">*</span>  
                    </label>
                    <div class="input-group flex-nowrap mb-3">
                        <textarea type="text" id="description" class="form-control" name="description" required maxlength="2048" >{{ old('description', $restaurant->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <label for="address" class="form-label">
                        <strong>Indirizzo</strong><span class="text-danger">*</span>  
                    </label>
                    <div class="input-group flex-nowrap mb-3">
                        <input 
                            type="text"
                            id="address" 
                            class="form-control" 
                            name="address" 
                            required maxlength="255"
                            value= "{{ old('address', $restaurant->address) }}">

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <label for="city" class="form-label">
                        <strong>Citta'</strong><span class="text-danger">*</span>  
                    </label>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text" id="addon-wrapping">
                            <i class="fa-solid fa-city fa-lg fa-fw"></i>
                        </span>
                        <input 
                            type="text"
                            id="city" 
                            class="form-control" 
                            name="city"
                            maxlength="255" 
                            required
                            value="{{ old('city', $restaurant->city) }}">

                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <label for="vat" class="form-label">
                        <strong>P.IVA</strong><span class="text-danger">*</span>  
                    </label>
                    <div class="input-group flex-nowrap mb-3">
                        <input 
                            type="text"
                            id="vat" 
                            class="form-control" 
                            name="vat"
                            maxlength="255" 
                            required
                            value="{{ old('vat', $restaurant->vat) }}">

                            @error('vat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <label for="phone" class="form-label">
                        <strong>Telefono</strong><span class="text-danger">*</span>  
                    </label>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text" id="addon-wrapping">
                            <i class="fa-solid fa-phone fa-lg fa-fw"></i>
                        </span>
                        <input 
                            type="text"
                            id="phone" 
                            class="form-control" 
                            name="phone" 
                            pattern="[+]?[0-9]+[-\s\./0-9]*" required
                            value="{{ old('phone', $restaurant->phone) }}">

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">
                            <strong>Foto Ristorante</strong> 
                        </label>
                        @if ($restaurant->image)
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="" name="delete_check" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Elimina Immagine
                                    </label>
                                </div>
                                <div class="mb-3">
                                    <img src="{{ asset('storage/'.$restaurant->image) }}" style="height: 300px" alt="">
                                </div>
                            @endif
                        <input 
                            type="file"
                            accept="image/*"
                            id="image" 
                            class="form-control" 
                            placeholder="Inserisci immagine" 
                            name="image"> 
                    </div>
                    {{-- CATEGORIES --}}
                    <div class="mb-4">
                        <label class="form-label d-block mb-2">
                            Tipologia di Cucina
                        </label>
                        @foreach ($categories as $category)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="categories[]" type="checkbox"
                                    id="category-{{ $category->id }}" 
                                    @if (old('categories') && is_array(old('categories')) && count(old('categories')) > 0) {{ in_array($category->id, old('categories')) ? 'checked' : '' }} 
                                    @elseif ($restaurant->categories->contains($category))
                                        checked
                                    @endif
                                    value="{{ $category->id }}">

                                <label class="form-check-label" for="category-{{ $category->id }}">
                                    {{ $category->name }}
                                </label>

                            </div>
                        @endforeach

                        @error('categories')
                            <div class="alert alert-danger mt-3" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                        <button class="btn btn-dark my-3" type="submit">
                            Aggiorna
                        </button>
                        <div>
                            <a href="{{ route('admin.restaurants.index', $restaurant->id) }}" class="btn btn-dark">
                                Torna Indietro
                            </a>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center mb-4">
        <div class="col">
            <h2>
                Modifica Piatto
            </h2>
        </div>
        @include('partials.errors')
        <div class="row my-4">
            <div class="col">
                <form action="{{ route('admin.dishes.update', $dish->id) }}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <label for="name" class="form-label">
                        <strong>Nome del Piatto</strong><span class="text-danger">*</span>  
                    </label>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text" id="addon-wrapping">
                            <i class="fa-solid fa-utensils fa-lg fa-fw"></i>
                        </span>
                        <input 
                            type="text"
                            id="name" 
                            class="form-control" 
                            placeholder="Inserisci nome del piatto" 
                            name="name" 
                            required maxlength="128" 
                            value="{{ old('name', $dish->name) }}">
                    </div>
                    <label for="description" class="form-label">
                        <strong>Descrizione del Piatto</strong><span class="text-danger">*</span>  
                    </label>
                    <div class="input-group flex-nowrap mb-3">
                        <textarea 
                            type="text"
                            id="description" 
                            class="form-control" 
                            name="description" 
                            required maxlength="2048">{{ old('description', $dish->description) }}</textarea>
                    </div>
                    <label for="price" class="form-label">
                        <strong>Prezzo</strong><span class="text-danger">*</span>  
                    </label>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text" id="addon-wrapping">
                            <i class="fa-solid fa-euro-sign fa-lg fa-fw"></i>
                        </span>
                        <input 
                            type="number"
                            id="price" 
                            class="form-control" 
                            placeholder="Inserisci nome del piatto" 
                            name="price" 
                            pattern="^\d{1,2}(\.\d{1,2})?$" required
                            step="0.10"
                            min="0.10"
                            max="100"
                            value="{{ old('price', $dish->price) }}">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">
                            <strong>Foto Del Piatto</strong> 
                        </label>
                        @if ($dish->image)
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" value="" name="delete_check" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Elimina Immagine
                                    </label>
                                </div>
                                <div class="mb-3">
                                    <img src="{{ asset('storage/'.$dish->image) }}" style="height: 300px" alt="">
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
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" 
                        value="1" id="flexSwitchCheckChecked" 
                        name="available" {{ $dish->available ? 'checked' : '' }}>
                        <label class="form-check-label" for="flexSwitchCheckChecked">Disponibilita'</label>
                      </div>          
                    <div>
                        <button class="btn btn-dark my-3" type="submit">
                            Aggiorna
                        </button>
                    </div>
                    <div>
                        <a href="{{ route('admin.dishes.index', $dish->id) }}" class="btn btn-dark">
                            Torna Indietro
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
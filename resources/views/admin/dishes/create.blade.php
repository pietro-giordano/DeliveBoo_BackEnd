@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center mb-4">
        <div class="col">
            <h2>
                Nuovo Piatto
            </h2>
        </div>
        @include('partials.errors')
        <div class="row my-4">
            <div class="col">
                <form action="{{ route('admin.dishes.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label for="name" class="form-label">
                        <strong>Nome del Piatto</strong> <span class="text-danger">*</span>  
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
                            value="{{ old('name') }}">
                    </div>
                    <label for="description" class="form-label">
                        <strong>Descrizione del Piatto</strong> <span class="text-danger">*</span>  
                    </label>
                    <div class="input-group flex-nowrap mb-3">
                        <textarea 
                            type="text"
                            id="description" 
                            class="form-control" 
                            name="description" 
                            required maxlength="2048">{{ old('description') }}</textarea>
                    </div>
                    <label for="price" class="form-label">
                        <strong>Prezzo</strong> <span class="text-danger">*</span>  
                    </label>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text" id="addon-wrapping">
                            <i class="fa-solid fa-euro-sign fa-lg fa-fw"></i>
                        </span>
                        <input 
                            type="number"
                            id="price" 
                            class="form-control" 
                            placeholder="Inserisci prezzo del piatto (es. 10,00)" 
                            name="price"
                            min="0.10"
                            max="100"
                            step="0.10" 
                            pattern="^\d{1,2}(\.\d{1,2})?$" required
                            value="{{ old('price') }}">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">
                            <strong>Foto Del Piatto</strong> 
                        </label>
                        <input 
                            type="file"
                            accept="image/*"
                            id="image" 
                            class="form-control" 
                            placeholder="Inserisci immagine" 
                            name="image"> 
                    </div>
  
                    </div>          
                    <div> 
                        <button class="btn btn-dark my-3" type="submit">
                            Aggiungi
                        </button>
                    </div>
                    <div>
                        <a href="{{ route('admin.dishes.index') }}" class="btn btn-dark">
                            Torna Indietro
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
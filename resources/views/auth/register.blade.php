@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-12">
            <div class="card">
                <div class="card-header">{{ __('Registrazione') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome Utente*') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                name="name" value="{{ old('name') }}" required autocomplete="name" 
                                autofocus maxlength="64">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="restaurant_name" class="col-md-4 col-form-label text-md-right">{{ __('Nome Ristorante*') }}</label>

                            <div class="col-md-6">
                                <input id="restaurant_name" type="text" class="form-control @error('restaurant_name*') is-invalid @enderror" 
                                name="restaurant_name" value="{{ old('restaurant_name') }}" required autocomplete="restaurant_name" 
                                autofocus maxlength="255">

                                @error('restaurant_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descrizione*') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control @error('description*') is-invalid @enderror" 
                                name="description" required autocomplete="description" 
                                autofocus maxlength="2048">{{ old('description') }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo*') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" 
                                name="address" value="{{ old('address') }}" required autocomplete="address" 
                                autofocus maxlength="255">

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Città*') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" 
                                name="city" value="{{ old('city') }}" required autocomplete="city" 
                                autofocus maxlength="255">

                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="vat" class="col-md-4 col-form-label text-md-right">{{ __('P.IVA*') }}</label>

                            <div class="col-md-6">
                                <input id="vat" type="text" pattern="[0-9]{11}" class="form-control @error('vat') is-invalid @enderror" name="vat" value="{{ old('vat') }}" required autocomplete="vat" autofocus>

                                @error('vat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Telefono*') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text"  pattern="[+]?[0-9]+[-\s\./0-9]*" class="form-control @error('phone') is-invalid @enderror" 
                                name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Immagine Ristorante') }}</label>

                            <div class="col-md-6">
                                <input 
                                type="file"
                                accept="image/*"
                                id="image" 
                                class="form-control" 
                                placeholder="Inserisci immagine" 
                                name="image"> 

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail*') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        {{-- CATEGORIES --}}
                        <div class="mb-4 row">
                            <label class="col-md-4 col-form-label text-md-right">
                                {{ __('Tipologia Di Cucina*') }}
                            </label>
                            <div class="col-md-6">
                                @foreach ($categories as $category)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="categories[]" type="checkbox"
                                        id="category-{{ $category->id }}" 
                                        @if (old('categories') && is_array(old('categories')) && count(old('categories')) > 0) {{ in_array($category->id, old('categories')) ? 'checked' : '' }} 
                                        @endif
                                        value="{{ $category->id }}">

                                    <label class="form-check-label" for="category-{{ $category->id }}">
                                        {{ $category->name }}
                                    </label>

                                </div>
                            @endforeach
                            </div>
                            <div class="col-md-2 offset-md-4">
                                @error('categories')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                @enderror
                            </div>
                            </div>
                           
                            <script>
                                document.querySelector('form').addEventListener('submit', function(event) {
                                    const checkboxes = document.querySelectorAll('input[name="categories[]"]');
                                    const checked = Array.from(checkboxes).some((checkbox) => checkbox.checked);
                                    if (!checked) {
                                        event.preventDefault();
                                        alert('Seleziona almeno una categoria.');
                                    }
                                });
                            </script>

                            @error('categories')
                                <div class="alert alert-danger mt-3" role="alert">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>


                        <div class="text-center row pb-3">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-dark">
                                    {{ __('Registrati') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

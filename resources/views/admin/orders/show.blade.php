@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col">
                @include('partials.success')
                <h2>
                    Ordine nr: {{ $order->id}}
                </h2>
                <div>
                    <strong>Data e orario:</strong> {{ $order->created_at }}
                </div>
                <div>
                    <strong>Nome:</strong> {{ $order->customer_name }}
                </div>
                <div>
                   <strong>Cognome:</strong> {{ $order->customer_surname}}
                </div>
                <div>
                    <strong>Indirizzo:</strong> {{ $order->customer_address}}
                </div>
                <div>
                    <strong>Mail:</strong> {{ $order->customer_email}}
                </div>
                <div>
                    <strong>Telefono:</strong> {{ $order->phone_number}}
                </div>
                <div>
                    <strong>Prezzo:</strong> {{ $order->total_price}}
                </div>
                <div>
                    <strong>Contenuto ordine:</strong>
                    <ul>
                        @foreach ($order->dishes as $dish)
                            <li class="d-flex justify-content-between py-1 w-25">
                                {{ $dish->name }}
                                <span class="badge bg-primary">
                                    {{ $dish->pivot->quantity }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <a href="{{ route('admin.orders.index') }}" class="btn btn-dark mt-4">
                    Torna Indietro
                </a>
            </div>
        </div>
    </div>
@endsection
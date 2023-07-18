@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
      <div class="row justify-content-center mb-4">
            <div class="col">
                  <h1 class="mb-3 text-warning text-center">
                  Ordini
                  </h1>
            </div>
            @if (session('success'))
                  <div class="alert alert-success">
                  {{ session('success') }}
                  </div>
            @endif
      </div>

      <div class="row">
            <div class="col">
                  <table class="table align-middle">
                        <thead class="table-dark">
                              <tr>
                                    <th scope="col">Data e orario</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Contenuto</th>
                                    <th scope="col">Prezzo</th>
                                    <th scope="col">Azioni</th>
                              </tr>
                        </thead>
                        <tbody>
                              @foreach ($orders as $order)
                                    <tr>
                                          <td>{{ $order->created_at }}</td>
                                          <td>{{ $order->customer_name }} {{ $order->customer_surname }}</td>

                                          <td>
                                                <div class="accordion accordion-flush" id="accordionExample">
                                                      <div class="accordion-item">
                                                            <h2 class="accordion-header" id="heading{{ $order->id }}">
                                                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $order->id }}" aria-expanded="true" aria-controls="collapse{{ $order->id }}">
                                                                        Clicca per vedere contenuto ordine
                                                                  </button>
                                                            </h2>
                                                            <div id="collapse{{ $order->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $order->id }}" data-bs-parent="#accordionExample">
                                                                  <div class="accordion-body">
                                                                        <ul>
                                                                              @foreach ($order->dishes as $dish)
                                                                                    <li class="d-flex justify-content-between py-1">
                                                                                          {{ $dish->name }}
                                                                                          <span class="badge bg-primary">
                                                                                                {{ $dish->pivot->quantity }}
                                                                                          </span>
                                                                                    </li>
                                                                              @endforeach
                                                                        </ul>
                                                                  </div>
                                                            </div>
                                                      </div>
                                                </div>
                                          </td>

                                          <td>{{ $order->total_price }} €</td>
                                          
                                          <td>
                                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-primary">
                                                      <i class="fa-solid fa-magnifying-glass"></i>
                                                </a>                     
                                          </td>
                                    </tr>
                              @endforeach
                        </tbody>
                  </table>            
            </div>
      </div>
</div>
@endsection
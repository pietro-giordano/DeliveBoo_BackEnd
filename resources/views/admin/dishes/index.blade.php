@extends('layouts.admin')

@section('content')
<div class="container-fluid my-4 text-center">
      <div class="row justify-content-center mb-4">
            <div class="col">
                  <h1 class="mb-3 text-warning">
                  Piatti
                  </h1>
                  <a href="{{ route('admin.dishes.create') }}" class="btn btn-dark">
                  Aggiungi Piatto
                  </a>
            </div>
            @if (session('success'))
                  <div class="alert alert-success">
                  {{ session('success') }}
                  </div>
            @endif
      </div>
      <div class="row">
            @foreach ($dishes as $dish)
                  <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4">
                        <div class="card text-black text-center h-100">
                              @if ($dish->image)
                                          <div>
                                                <img class="card-img mb-3 img-top" src="{{ asset('storage/'.$dish->image) }}" alt="" style="height: 220px; object-fit:cover">
                                          </div>
                                    @endif
                              <div class="card-body">
                                    <h5 class="card-title text-warning">{{ $dish->name }}</h5>
                                    <p class="card-text">{{ $dish->description }}</p>

                                    

                                    <p class="card-text">Prezzo: {{ $dish->price }} €</p>

                                    @if ($dish->available == 1)
                                          <p class="card-text" style="color: green">Disponibile</p>
                                    @else
                                          <p class="card-text" style="color: red">Non disponibile</p>
                                    @endif

                                    <a href="{{ route('admin.dishes.show', $dish->id) }}" class="btn btn-primary">
                                          <i class="fa-solid fa-magnifying-glass"></i>
                                    </a>
                                    <a href="{{ route('admin.dishes.edit', $dish->id) }}" class="btn btn-warning">
                                          <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <form class="d-inline-block" action="{{  route('admin.dishes.destroy', $dish->id)  }}" method="POST">
                                          @csrf
                                          @method('DELETE')

                                          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$dish->id}}">
                                          <i class="fa-solid fa-trash"></i>
                                          </button>

                                           <!-- Modal -->
                                          <div class="modal fade" id="exampleModal-{{$dish->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                      <div class="modal-content">
                                                            <div class="modal-header">
                                                                  <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                  Elimina Piatto
                                                                  </h1>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                  Sei sicuro di voler eliminare questo piatto?
                                                            </div>
                                                            <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                                  Annulla
                                                                  </button>
                                                                  <button type="submit" class="btn btn-danger">
                                                                  Elimina
                                                                  </button>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>
                                    </form>                                      
                              </div>
                        </div>
                  </div>                           
            @endforeach
      </div>
</div>
@endsection
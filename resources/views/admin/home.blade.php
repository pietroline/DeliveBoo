@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">

                        <div class="my-4">Ciao, {{$user->name}} #{{$user->id}} </div>

                        @if($restaurant)
                            <ul class="px-0 pt-4 list-unstyled">
                                <li><strong>Nome Ristorante: </strong>{{$restaurant->name}}</li>

                                <li><strong>Tipologie ristorante: </strong>

                                    @foreach ($restaurant->typologies as $count => $typology)

                                        <span>{{$typology->name}}</span>

                                        {{-- inserisco la virgola, tranne nell'ultima tipologia del ristorante --}}
                                        {{-- $count inizia a contare da 0 --}}
                                        {{-- count(count($restaurant->typologies)) ritorna il numero di tipologie di un ristorante --}}
                                        @if($count != count($restaurant->typologies) -1)
                                            <span>,</span>
                                        @endif

                                    @endforeach

                                    
                                </li>

                                <li><strong>Indirizzo: </strong>{{$restaurant->address}}</li>
                                <li><strong>Numero di telefono: </strong>{{$restaurant->phone}}</li>
                                <li><strong>Email ristorante: </strong>{{$restaurant->email}}</li>
                                <li><strong>Partita IVA: </strong>{{$restaurant->vat}}</li>
                                <li><strong>Descrizione: </strong>{{$restaurant->description}}</li>
                            </ul>
                        @else

                            <form method="POST" action="{{route('admin.restaurants.store')}}">

                                @csrf
                
                                <div class="form-group">
                                    <label for="name">Nome ristorante *</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{old("name")}}" required>
                                </div>

                                <div class="form-group">
                                    <label for="address">Indirizzo ristorante *</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{old("address")}}" required>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Numero telefono ristorante *</label>
                                    <input type="number" class="form-control" id="phone" name="phone" value="{{old("phone")}}" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email ristorante *</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{old("email")}}" required>
                                </div>

                                <div class="form-group">
                                    <label for="vat">Partita IVA *</label>
                                    <input type="text" class="form-control" id="vat" name="vat" value="{{old("vat")}}" required>
                                </div>

                                <div class="my-4">
                                    <label class="mb-0">Tipologie ristorante *</label>
                                    <small id="mJS_displayRequired" class="ms_text-transparent font-italic d-block py-1">Seleziona almeno una tipologia ristorante</small>
                                    @foreach ($typologies as $typology)

                                        <div class="form-check">
                                            <input name="typologies[]" class="form-check-input mJS_checkbox" type="checkbox" value="{{$typology->id}}" id="typology_{{$typology->id}}" {{in_array($typology->id, old("typologies", [])) ? "checked" : ""}}>
                                            <label class="form-check-label" for="typology_{{$typology->id}}">{{$typology->name}}</label>
                                        </div>
                                    
                                    @endforeach

                                </div>
                              
                                <div class="form-group">
                                    <label for="content">Descrizione ristorante</label>
                                    <textarea class="form-control" name="content" id="content" rows="10">{{old("content")}}</textarea>
                                </div>
                
                                <button type="submit" class="btn btn-primary my-3">Salva</button>
                            </form>
                        @endif
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

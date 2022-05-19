
@extends('admin.layouts.base')

@section('scriptJS')
    @if (!$restaurant)
        <script src="{{ asset('js/functionsJS/validatorCheckbox.js') }}" defer></script>
    @endif
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <div class="card">
                    <div class="card-header ms_dashboard">{{ __('Dashboard') }}</div>

                    <div class="card-body">

                        <div class="my-4">Ciao, {{$user->name}}</div>

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

                                @if($restaurant->description)
                                    <li><strong>Descrizione: </strong>{{$restaurant->description}}</li>
                                @endif
                                
                            </ul>
                        @else

                            <form id="sectionForm" class="needs-validation" novalidate method="POST" action="{{route('admin.restaurants.store')}}" enctype="multipart/form-data">

                                @csrf
                
                                <div class="form-group">
                                    <label for="name">Nome ristorante *</label>
                                    <input type="text" class="form-control" id="name" name="name" minlength="3" value="{{old("name")}}" required>
                                    <div class="invalid-feedback">
                                        Nome non valido
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="img">Seleziona immagine</label>
                                    <input class="form-control" type="file" accept="image/png, image/gif, image/jpeg, image/jpg, imag/svg" name="img" id="img">
                                </div>

                                <div class="form-group">
                                    <label for="address">Indirizzo ristorante *</label>
                                    <input type="text" class="form-control" id="address" name="address" minlength="5" value="{{old("address")}}" required>
                                    <div class="invalid-feedback">
                                        Indirizzo non valido
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Numero telefono ristorante *</label>
                                    <input type="tel" pattern="[0-9]{6,15}" class="form-control" id="phone" name="phone" value="{{old("phone")}}" required>
                                    <div class="invalid-feedback">
                                        Numero non valido
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email ristorante *</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{old("email")}}" required>
                                    <div class="invalid-feedback">
                                        Email non valida
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="vat">Partita IVA *</label>
                                    <input type="text" class="form-control" id="vat" name="vat" minlength="11" maxlength="11" value="{{old("vat")}}" required>
                                    <div class="invalid-feedback">
                                        Partita IVA non valida
                                    </div>
                                </div>

                                <div class="my-4">
                                    <label class="mb-1">Tipologie ristorante *</label>
                                    <small id="mJS_displayRequired" class="ms_dysplay-none font-italic py-1">Seleziona almeno una tipologia ristorante</small>
                                    @foreach ($typologies as $typology)

                                        <div class="form-check">
                                            <input name="typologies[]" class="form-check-input mJS_checkbox" type="checkbox" value="{{$typology->id}}" id="typology_{{$typology->id}}" {{in_array($typology->id, old("typologies", [])) ? "checked" : ""}}>
                                            <label class="form-check-label" for="typology_{{$typology->id}}">{{$typology->name}}</label>
                                            
                                        </div>
                                    
                                    @endforeach
                                    {{-- <div class="invalid-feedback">
                                        You must agree before submitting.
                                    </div> --}}

                                </div>
                              
                                <div class="form-group">
                                    <label for="description">Descrizione ristorante</label>
                                    <textarea class="form-control" name="description" id="description" rows="10">{{old("description")}}</textarea>
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
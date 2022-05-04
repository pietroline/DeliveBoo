@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">

                        Ciao, {{$user->name}} #{{$user->id}} 

                        <ul class="px-0 pt-4 list-unstyled">
                            <li><strong>Nome Ristorante: </strong>{{$restaurant->name}}</li>
                            <li><strong>Indirizzo: </strong>{{$restaurant->address}}</li>
                            <li><strong>Numero di telefono: </strong>{{$restaurant->phone}}</li>
                            <li><strong>Email ristorante: </strong>{{$restaurant->email}}</li>
                            <li><strong>Partita IVA: </strong>{{$restaurant->vat}}</li>
                            <li><strong>Descrizione: </strong>{{$restaurant->description}}</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

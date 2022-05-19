@extends ("admin.layouts.base")

@section("content")
    <div class="container">

        <h1>Dettagli food</h1>

        <div class="roq d-flex justify-content-between">
            <div class="col d-flex justify-content-between align-items-center">
            
                <ul class="list-unstyled">
                    <li class="my-3">
                        <strong>Nome portata: </strong> {{$food->name}}
                    </li>
                    <li class="my-3">
                        <strong>Slug: </strong> {{$food->slug}}
                    </li>
                    <li class="my-3">
                        <strong>Categoria: </strong> {{isset($category) ? $category->name : "NULL"}}
                    </li>
                    <li class="my-3">
                        <strong>Prezzo: </strong> {{$food->price}} &euro;
                    </li>
    
                    @if($food->description)
                        <li class="my-3">
                            <strong>Descrizione: </strong> {{$food->description}}
                        </li>
                    @endif
    
                    @if($food->ingredients)
                        <li class="my-3">
                            <strong>Ingredienti: </strong> {{$food->ingredients}}
                        </li>
                    @endif
                  
                    <li class="my-3">
                        <strong>Visibilità: </strong>
                        @if ($food->visible)
                            <span>Cliente/Ristoratore</span>
                        @else
                            <span>Solo ristoratore</span>
                        @endif
                    </li>
                
                </ul>
            
    
            </div>
    
            <div class="col img_food">
                @if ($food->image)

                    @if($food->seed)
                        <img class="img-fluid" src="{{asset('img/foto-foods/' . $food->image)}}" alt="Img {{$food->name}}">
                    @else
                        <img class="img-fluid" src="{{asset('storage/' . $food->image)}}" alt="Img {{$food->name}}">
                    @endif
                   
                @else
                    <img class="img-fluid" src="{{asset('img/LogoDeliveboo640.png')}}" alt="Img default">
                @endif
            </div>
            
        </div>

        <a href="{{route('admin.foods.index')}}" class="btn btn-primary">Indietro</a>
        <a href="{{ route('admin.foods.edit', $food->slug)}}" class="btn btn-warning">Modifica</a>

        
    </div>
@endsection
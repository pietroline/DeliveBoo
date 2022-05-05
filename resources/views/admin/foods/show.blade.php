@extends ("admin.layouts.base")

@section("content")
    <div class="container">

        <h1>Dettagli food</h1>

        <div class="d-flex justify-content-between align-items-center">
            
            <ul class="list-unstyled">
                <li class="my-3">
                    <strong>Nome portata: </strong> {{$food->name}}
                </li>
                <li class="my-3">
                    <strong>Slug: </strong> {{$food->slug}}
                </li>
                <li class="my-3">
                    <strong>Category_id: </strong> {{isset($food->category) ? $food->category->name : "NULL"}}
                </li>
                <li class="my-3">
                    <strong>Price: </strong> {{$food->price}}
                </li>
                <li class="my-3">
                    <strong>Description: </strong> {{$food->description}}
                </li>
                <li class="my-3">
                    <strong>Ingredients: </strong> {{$food->ingredients}}
                </li>
                <li class="my-3">
                    <strong>Visible: </strong> {{$food->visible}}
                </li>
                <li class="my-3">
                    <strong>Resturants_id: </strong> {{$food->restaurant_id}}
                </li>
            
            </ul>
        

        </div>

        <a href="{{route('admin.foods.index')}}" class="btn btn-primary">Indietro</a>
        <a href="{{ route('admin.foods.edit', $food->id)}}" class="btn btn-warning">Modifica</a>

        
    </div>
@endsection
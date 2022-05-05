@extends("admin.layouts.base")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <a href="{{route('admin.foods.create')}}" class="btn btn-primary my-3">Aggiungi nuova portata</a>

                <table class="table">
                    <thead>
                      <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Nome portata</th>
                        <th scope="col">Ingredienti</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Visibilità</th>
                        <th scope="col">Azioni</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($foods as $food)
                            <tr>
                                <td>{{$food->id}}</td>
                                <td>{{$food->name}}</td>
                                <td>{{strlen($food->ingredients) > 30 ? mb_substr($food->ingredients, 0, 30) . "..." : $food->ingredients}}</td>
                                <td>{{$food->price}}</td>
                            
                                <td>{{$food->category_id}}</td>

                                <td>
                                    @if ($food->visible)
                                        <span>Cliente/Ristoratore</span>
                                    @else
                                        <span>Solo ristoratore</span>
                                    @endif
                                </td>
                                
                                <td class="d-flex justify-content-center">
                                    <a href="{{route('admin.foods.show', $food->id)}}" class="btn btn-primary">Vedi</a>
                                    <a href="{{route('admin.foods.edit', $food->id)}}" class="btn btn-warning mx-2">Modifica</a>

                                    <form method="POST" action="{{route('admin.foods.destroy', $food->id)}}" >

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">Elimina</button>

                                    </form>
                                </td>
                            </tr>                            
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    
@endsection
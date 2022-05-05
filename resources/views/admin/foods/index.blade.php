@extends("admin.layouts.base")

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <a href="{{route('admin.foods.create')}}" class="btn btn-primary my-3">Aggiungi nuova portata</a>

                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Price</th>
                        <th scope="col">Ingredients</th>
                        <th scope="col">Visible</th>
                        <th scope="col">Category_id</th>
                        <th scope="col">Azioni</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($foods as $food)
                            <tr>
                                <td>{{$food->id}}</td>
                                <td>{{$food->name}}</td>
                                <td>{{$food->slug}}</td>
                                <td>{{$food->price}}</td>
                                <td>{{$food->ingredients}}</td>
                                <td>{{$food->visible}}</td>
                                <td>{{$food->category_id}}</td>

                                <td class="d-flex">
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
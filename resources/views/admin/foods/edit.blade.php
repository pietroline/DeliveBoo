@extends ("admin.layouts.base")

@section("content")
    <div class="container">

        <h1>Modifica Food</h1>

        <form method="POST" action="{{route('admin.foods.update', $food->id)}}">

            @csrf
            @method("PUT")

            <div class="form-group">
                <label for="name">Nome portata</label>
                <input type="text" class="form-control" id="name" name="name" value="{{old("name", $food->name)}}">
            </div>

            <div class="form-group">

                <label for="category_id">Categoria</label>
                <select class="form-control" id="category_id" name="category_id">

                <option value="">Nessuna categoria</option>
                @foreach ($categories as $category )    
                    <option {{(old('category_id', $food->category_id) == $category->id) ? 'selected': ''}} value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            
                </select>

            </div>

            <div class="form-group">
                <label for="price">Prezzo</label>
                <input type="number" class="form-control" id="price" name="price" value="{{old("price", $food->price)}}">
            </div>

            <div class="form-group">
                <label for="content">Descrizione</label>
                <textarea class="form-control" name="content" id="content" rows="10">{{old("content", $food->content)}}</textarea>
            </div>

            <div class="form-group">
                <label for="ingredients">Ingredienti</label>
                <textarea class="form-control" name="ingredients" id="ingredients" rows="10">{{old("ingredients", $food->ingredients)}}</textarea>
            </div>

            <div class="form-group">
                <label for="visible">Disponibilità</label>
                <select class="form-control" id="visible" name="visible">

                    <option value="" selected>Seleziona disponibilità</option>
                    <option value="1">Si</option>
                    <option value="0">No</option>
            
                </select>
            </div>

          <button type="submit" class="btn btn-primary my-3">Salva</button>
        </form>

        </div>
        
    </div>
@endsection
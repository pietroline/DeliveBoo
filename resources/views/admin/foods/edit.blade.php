@extends ("admin.layouts.base")

@section("content")
    <div class="container">

        <h1>Modifica Food</h1>

        <form class="needs-validation" novalidate method="POST" action="{{route('admin.foods.update', $food->id)}}" enctype="multipart/form-data">

            @csrf
            @method("PUT")

            <div class="form-group">
                <label for="name">Nome portata *</label>
                <input type="text" class="form-control" id="name" name="name" minlength="3" value="{{old("name", $food->name)}}" required>
                <div class="invalid-feedback">
                    Nome portata non valido
                </div>
            </div>

            <div class="form-group">
                <label for="img">Seleziona immagine</label>
                <input class="form-control" type="file" accept="image/png, image/gif, image/jpeg, image/jpg, imag/svg" name="img" id="img">
            </div>

            <div class="form-group">

                <label for="category_id">Categoria *</label>
                <select class="form-control" id="category_id" name="category_id" required>

                <option value="">Nessuna categoria</option>
                @foreach ($categories as $category )    
                    <option {{(old('category_id', $food->category_id) == $category->id) ? 'selected': ''}} value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            
                </select>
                <div class="invalid-feedback">
                    Categoria non valida
                </div>
            </div>

            <div class="form-group">
                <label for="price">Prezzo (in €) *</label>
                <input type="number" class="form-control" id="price" name="price" min="0" max="1000" value="{{old("price", $food->price)}}" required>
                <div class="invalid-feedback">
                    Prezzo non valido
                </div>
            </div>

            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea class="form-control" name="description" id="description" rows="10">{{old("description", $food->content)}}</textarea>
            </div>

            <div class="form-group">
                <label for="ingredients">Ingredienti *</label>
                <textarea class="form-control" name="ingredients" minlength="5" id="ingredients" rows="10" required>{{old("ingredients", $food->ingredients)}}</textarea>
                <div class="invalid-feedback">
                    Ingredienti non validi
                </div>
            </div>

            <div class="form-group">
                <label for="visible">Disponibilità *</label>
                <select class="form-control" id="visible" name="visible" required>
                    
                    <option value="1" {{$food->visible ? "selected" : ""}}>Si</option>
                    <option value="0" {{$food->visible ? "" : "selected"}}>No</option>
                    
                </select>
            </div>
            
            <a href="{{ url()->previous()}}" class="btn btn-primary">Indietro</a>
            <button type="submit" class="btn btn-success my-3">Salva</button>

        </form>

        </div>
        
    </div>
@endsection
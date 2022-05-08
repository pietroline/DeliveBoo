@extends ("admin.layouts.base")

@section("content")
    <div class="container">

            <h1>Crea nuova portata</h1>

            <form method="POST" action="{{route('admin.foods.store')}}">

                @csrf

                <div class="form-group">
                    <label for="name">Nome portata *</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{old("name")}}" required>
                </div>

                <div class="form-group">

                  <label for="category_id">Categoria *</label>
                  <select class="form-control" id="category_id" name="category_id" required>

                    <option value="">Nessuna categoria</option>
                    @foreach ($categories as $category )    
                      <option {{old("category_id") == $category->id ? "selected" : ""}} value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
               
                  </select>

                </div>

                <div class="form-group">
                    <label for="price">Prezzo *</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{old("price")}}" required>
                </div>

                <div class="form-group">
                  <label for="content">Descrizione</label>
                  <textarea class="form-control" name="content" id="content" rows="10">{{old("content")}}</textarea>
                </div>
                
                <div class="form-group">
                  <label for="ingredients">Ingredienti *</label>
                  <textarea class="form-control" name="ingredients" id="ingredients" rows="10" required>{{old("ingredients")}}</textarea>
                </div>

                <div class="form-group">
                    <label for="visible">Disponibilità</label>
                    <select class="form-control" id="visible" name="visible">

                      <option value="1" selected>Si</option>
                      <option value="0">No</option>
                   
                    </select>
                </div>
                
                <a href="{{route('admin.foods.index')}}" class="btn btn-primary">Indietro</a>
                <button type="submit" class="btn btn-success my-3">Salva</button>
                      
            </form>

        </div>
        
    </div>
@endsection
@extends("admin.layouts.base")

@section("content")
    <div class="container">

        <div class="row">
            <div class="col d-flex justify-content-end">

                <form method="GET" action="{{route('admin.orders')}}">

                    @csrf

                    <div class="form-group">
                        <label for="filter">Filtro</label>
                        <select class="form-control" id="filter" name="filter" onchange="this.form.submit()">
                            
                            <option value="1" {{$selected == 1 ? "selected" : ""}}>Data conferma ordine decrescente</option>
                            <option value="2" {{$selected == 2 ? "selected" : ""}}>Data conferma ordine crescente</option>
                            <option value="3" {{$selected == 3 ? "selected" : ""}}>Nome ordine decrescente</option>
                            <option value="4" {{$selected == 4 ? "selected" : ""}}>Nome ordine crescente</option>
                            <option value="5" {{$selected == 5 ? "selected" : ""}}>Totale ordine decrescente</option>
                            <option value="6" {{$selected == 6 ? "selected" : ""}}>Totale ordine crescente</option>
                            
                        </select>
                        
                    </div>

                </form>

            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="table table-striped">
                    <thead class="text-center">
                      <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Recapito</th>
                        <th scope="col">Indirizzo</th>
                        <th scope="col">Totale</th>
                        <th scope="col">Data conferma ordine</th>
                      </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->name}}</td>
                                <td>{{$order->phone}}</td>
                                <td>{{$order->address}}</td>
                                <td>{{$order->total}} &euro;</td>
                                <td>{{$order->order_confirmed_date}}</td> 
                            </tr>                            
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection
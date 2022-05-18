@extends("admin.layouts.base")

@section("scriptJS")
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/functionsJS/chartJS.js') }}" defer></script>
@endsection

@section("content")
    <div class="container">

       
            <div class="row align-items-center">

                <div class="col">
                    <div class="ms_fs1 text-center d-flex justify-content-center align-items-center">
    
                        <div class="mr-3">Statistiche degli ordini anno</div>
    
                        <form method="GET" action="{{route('admin.charts')}}">
    
                            @csrf
        
                            <div class="form-group m-0">
                                <select class="form-control" id="year" name="year" onchange="this.form.submit()">
                                
                                    @if(is_array($arrayYear))
                                        @foreach ($arrayYear as $year)
                                            <option :value="$year" {{$yearSelected == $year ? "selected" : ""}}>{{$year}}</option>
                                        @endforeach
                                    @else
                                        <option :value="$arrayYear" selected>{{$arrayYear}}</option>
                                    @endif
                                    
                                </select>
                                
                            </div>
        
                        </form>
                    </div>
                    <canvas id="myChart"></canvas>
                    <small class="d-block my-2 text-muted">Su asse y valori in €; su asse x i mesi dell'anno</small>
                </div>   
    
            </div>
    
            <div class="row my-5">
                <div class="col">
    
    
                    <table class="table text-center">
                        <tbody>
                          <tr>
                            @for($i=0; $i<12; $i++)
                                <th scope="row">{{$month[$i]}}</th>
                            @endfor
                          </tr>
                          <tr>
                            @for($i=0; $i<12; $i++)
                            <td>
                                <span class="mJS_moneyMonth">{{$money[$i]}}</span>
                                <span>€</span>
                            </td>
                            @endfor
                          </tr>
                      </table>
                </div>
            </div>

    </div>
@endsection
@extends('layouts.app')

@section('content')

    <h1 class="text-center">Cidades</h1>
    <table id="table" class="table table-condensed table-hover table-striped" data-toggle="bootgrid">
        <thead>
        <tr>
            <th data-column-id="id" data-type="numeric">#</th>
            <th data-column-id="state">Estado</th>
            <th data-column-id="city" data-order="asc">Cidade</th>
            <th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cities as $city)
            <tr>
                <td>{{$city->id}}</td>
                <td>{{$city->state->state}}</td>
                <td>{{$city->city}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready(function(){
            $("#table").bootgrid({
                
            });            
        });
        @if($errors->any())
            alert("Não foi possivel excluir. Existe {{$errors->first('records')}} registro(s) relacionado(s)!");
        @endif
    </script>
@stop
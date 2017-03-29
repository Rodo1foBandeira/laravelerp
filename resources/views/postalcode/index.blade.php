@extends('layouts.app')

@section('content')

    <h1 class="text-center">CEPs</h1>    

    <table id="table" class="table table-condensed table-hover" data-toggle="bootgrid">
        <thead>
        <tr>
            <th data-column-id="id" data-type="numeric">#</th>
            <th data-column-id="state">Estado</th>
            <th data-column-id="city">Cidade</th>
            <th data-column-id="code" data-order="asc">CEP</th>
            <th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($postalCodes as $postalCode)
            <tr>
                <td>{{$postalCode->id}}</td>
                <td>{{$postalCode->city->state->state}}</td>
                <td>{{$postalCode->city->city}}</td>
                <td>{{$postalCode->code}}</td>
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
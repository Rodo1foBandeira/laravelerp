@extends('layouts.app')

@section('content')

    <h1 class="text-center">Estados</h1>

    <table id="table" class="table table-condensed table-hover" data-toggle="bootgrid">
        <thead>
        <tr>
            <th data-column-id="id" data-type="numeric">#</th>
            <th data-column-id="country">País</th>
            <th data-column-id="state" data-order="asc">Estado</th>
            <th data-column-id="iso_code_2">Sigla(2)</th>
            <th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($states as $state)
            <tr>
                <td>{{$state->id}}</td>
                <td>{{$state->country->country}}</td>
                <td>{{$state->state}}</td>
                <td>{{$state->iso_code_2}}</td>             
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
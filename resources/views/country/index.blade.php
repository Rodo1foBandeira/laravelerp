@extends('layouts.app')

@section('content')

    <h1 class="text-center">Países</h1>

    <table id="table" class="table table-condensed table-hover" data-toggle="bootgrid">
        <thead>
        <tr>
            <th data-column-id="id" data-type="numeric">#</th>
            <th data-column-id="country" data-order="asc">País</th>
            <th data-column-id="iso_code_2">Sigla(2)</th>
            <th data-column-id="iso_code_3">Sigla(3)</th>
            <th data-column-id="ddi">Código</th>
            <th data-width="80px" data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($countries as $country)
            <tr id="rows">
                <td>{{$country->id}}</td>
                <td>{{$country->country}}</td>
                <td>{{$country->iso_code_2}}</td>
                <td>{{$country->iso_code_3}}</td>
                <td>{{$country->ddi}}</td>
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
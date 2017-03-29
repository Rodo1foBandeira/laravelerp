@extends('layouts.app')

@section('content')

    <h1 class="text-center">Bairros</h1>

    <table id="table" class="table table-condensed table-hover" data-toggle="bootgrid">
        <thead>
        <tr>
            <th data-column-id="id" data-type="numeric">#</th>
            <th data-column-id="neighborhood" data-order="asc">Bairro</th>
            <th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($neighborhoods as $neighborhood)
            <tr>
                <td>{{$neighborhood->id}}</td>
                <td>{{$neighborhood->neighborhood}}</td>              
            </tr>
        @endforeach
        </tbody>
    </table>
	<script>
        $(document).ready(function(){
            $("#table").bootgrid({
                
            });            
        });
    </script>
@stop
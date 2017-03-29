@extends('layouts.app')

@section('content')

    <h1 class="text-center">Marcas</h1>

    <table id="table" class="table table-condensed table-hover" data-toggle="bootgrid">
        <thead>
        <tr>
            <th data-column-id="id" data-type="numeric">#</th>
            <th data-column-id="brname" data-order="asc">Marca</th>
            <th data-width="80px" data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($brands as $brand)
            <tr>
                <td>{{$brand->id}}</td>
                <td>{{$brand->brname}}</td>
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
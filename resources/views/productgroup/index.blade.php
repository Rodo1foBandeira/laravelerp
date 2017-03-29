@extends('layouts.app')

@section('content')
    <h1 class="text-center">Grupos de produtos</h1>

    <table id="table" class="table table-condensed table-hover" data-toggle="bootgrid">
        <thead>
        <tr>
            <th data-column-id="id" data-type="numeric">#</th>
            <th data-column-id="pgname" data-order="asc">Grupo</th>
            <th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productGroups as $productGroup)
            <tr>
                <td>{{$productGroup->id}}</td>
                <td>{{$productGroup->pgname}}</td>
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
@extends('layouts.app')

@section('content')

    <h1 class="text-center">SubGrupos de produtos</h1>

    <table id="table" class="table table-condensed table-hover" data-toggle="bootgrid">
        <thead>
        <tr>
            <th data-column-id="id" data-type="numeric">#</th>
            <th data-column-id="pgname">Grupo</th>
            <th data-column-id="psname" data-order="asc">SubGrupo</th>
            <th data-width="80px" data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productSubGroups as $productSubGroup)
            <tr>
                <td>{{$productSubGroup->id}}</td>
                <td>{{$productSubGroup->group->pgname}}</td>
                <td>{{$productSubGroup->psname}}</td>
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
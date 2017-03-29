@extends('layouts.app')

@section('content')

    <h1 class="text-center">Sistemas de unidades de medida</h1>

    <table id="table" class="table table-condensed table-hover" data-toggle="bootgrid">
        <thead>
        <tr>
            <th data-column-id="id" data-type="numeric">#</th>
            <th data-column-id="unit" data-order="asc">Unidade</th>
            <th data-column-id="iso_code">Sigla</th>
            <th data-column-id="measure" data-type="decimal">Medida</th>
            <th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($mUnitSystems as $mUnitSystem)
            <tr>
                <td>{{$mUnitSystem->id}}</td>
                <td>{{$mUnitSystem->unit}}</td>
                <td>{{$mUnitSystem->iso_code}}</td>
                <td>{{$mUnitSystem->measure}}</td>
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
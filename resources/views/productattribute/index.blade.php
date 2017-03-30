@extends('layouts.app')

@section('content')

    <h1 class="text-center">Atributos de Produto</h1>    

    <table id="table" class="table table-condensed table-hover" data-toggle="bootgrid">
        <thead>
        <tr>
            <th data-column-id="id" data-type="numeric">#</th>
            <th data-column-id="pa_attribute" data-order="asc">Atributo</th>
            <th data-column-id="pa_key">Chave</th>
            <th data-column-id="pa_value">Valor</th>
            <th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productAttributes as $productAttribute)
            <tr>
                <td>{{$productAttribute->id}}</td>
                <td>{{$productAttribute->pa_attribute}}</td>
                <td>{{$productAttribute->pa_key}}</td>
                <td>
                    @if (($productAttribute->pa_key=='color')||($productAttribute->pa_key=='cor'))
                        @if (($productAttribute->pa_value=='white')||($productAttribute->pa_value=='FFFFFF'))
                            {{'<span style="background-color:#'.$productAttribute->pa_value.';color:black;" class="badge">'.$productAttribute->pa_attribute.'</span>'}}
                        @else
                            {{'<span style="background-color:#'.$productAttribute->pa_value.';" class="badge">'.$productAttribute->pa_attribute.'</span>'}}
                        @endif
                    @else
                        {{$productAttribute->pa_value}}
                    @endif
                </td>
                
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
@extends('layouts.app')

@section('content')
    <ul class="nav nav-tabs">
        <li role="productVariations"><a href="{{route('product.index')}}">Produtos</a></li>
        <li role="productVariations" class="active"><a href="{{route('productvariation.index')}}">Variações</a></li>
    </ul>
    <h1 class="text-center">Variações de Produtos</h1>
    <table id="table" class="table table-condensed table-hover" data-toggle="bootgrid">
        <thead>
        <tr>
            <th data-column-id="id" data-type="numeric">#</th>
            <th data-column-id="product" data-order="asc">Nome</th>
            <th data-column-id="quantity">Quantidade</th>
            <th data-column-id="mus">Unidade</th>
            <th data-column-id="percaddit">Acrescimo %</th>
            <th data-column-id="valaddit">Acrescimo $</th>
            <th data-column-id="multiplier">Multiplicador</th>
            <th data-column-id="attributes">Atributos</th>
            <th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productVariations as $productVariation)
            <tr>
                <td>{{$productVariation->id}}</td>
                <td>{{$productVariation->product->prname}}</td>
                <td>{{$productVariation->quantity}}</td>
                <td>{{$productVariation->mUnitSystem->unit}}</td>
                <td>{{$productVariation->percaddit}}</td>
                <td>{{$productVariation->valaddit}}</td>
                <td>{{$productVariation->unitMultiplier->um_iso_code.' | '.$productVariation->unitMultiplier->um_multiplier}}</td>
                <td>
                    @foreach($productVariation->attributesProducts as $attributesProducts)
                        @if (($attributesProducts->attribute->pa_key=='color')||($attributesProducts->attribute->pa_key=='cor'))
                            @if (($attributesProducts->attribute->pa_value=='white')||($attributesProducts->attribute->pa_value=='FFFFFF'))
                                {{'<span style="background-color:#'.$attributesProducts->attribute->pa_value.';color:black;" class="badge">'.$attributesProducts->attribute->pa_attribute.'</span>'}}
                            @else
                                {{'<span style="background-color:#'.$attributesProducts->attribute->pa_value.';" class="badge">'.$attributesProducts->attribute->pa_attribute.'</span>'}}
                            @endif
                        @else
                            {{'<span class="badge">'.$attributesProducts->attribute->pa_attribute.'</span>'}}
                        @endif
                    @endforeach
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
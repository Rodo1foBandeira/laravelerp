@extends('layouts.app')

@section('content')
    <ul class="nav nav-tabs">
        <li role="products" class="active"><a href="{{route('product.index')}}">Produtos</a></li>
        <li role="products"><a href="{{route('productvariation.index')}}">Variações</a></li>
    </ul>
    <h1 class="text-center">Cadastro de Produtos</h1>
    <table id="table" class="table table-condensed table-hover" data-toggle="bootgrid">
        <thead>
        <tr>
            <th data-column-id="id" data-type="numeric">#</th>
            <th data-column-id="prname" data-order="asc">Nome</th>
            <th data-column-id="prdescription">Descrição</th>
            <th data-column-id="brand">Marca</th>
            <th data-column-id="group">Grupo</th>
            <th data-column-id="subgroup">Subgrupo</th>
            <th data-column-id="category">Categoria</th>
            <th data-column-id="prcostprice">Custo</th>
            <th data-column-id="prsaleprice">Preço Venda</th>
            <th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->prname}}</td>
                <td>{{$product->prdescription}}</td>
                <td>{{$product->brand->brname}}</td>
                <td>{{$product->group->pgname}}</td>
                <td>{{$product->subGroup->psname}}</td>
                <td>{{$product->category->pcname}}</td>
                <td>{{$product->prcostprice}}</td>
                <td>{{$product->prsaleprice}}</td>
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
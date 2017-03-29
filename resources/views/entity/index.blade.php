@extends('layouts.app')

@section('content')

    <h1 class="text-center">Entidades</h1>    

    <table id="table" class="table table-condensed table-hover" data-toggle="bootgrid">
        <thead>
        <tr>
            <th data-width="50px" data-column-id="id" data-type="numeric">#</th>
            <th data-column-id="name" data-order="asc">Nome</th>
            <th  data-column-id="cnpj_cpf">Cnpj/CPf</th>
            <th  data-column-id="ie_rg">IE/RG</th>
            <th  data-column-id="phones">Telefone</th>
            <th data-column-id="category">Categoria</th>
            <th data-column-id="active">Ativo</th>
            <th data-column-id="commands" data-formatter="commands" data-sortable="false">Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($entities as $entity)
            <tr>
                <td>{{$entity->id}}</td>
                <td>{{$entity->name}}</td>
                <td>{{$entity->cnpj_cpf}}</td>
                <td>{{$entity->ie_rg}}</td>
                <td>{{isset($entity->phones[0]) ? $entity->phones[0]->number : ''}}</td>
                <td>
					@foreach($entity->categoriesEntities as $entityCategory)
							{{'<span class="badge">'.$entityCategory->entityCategory->category.'</span>'}}
					@endforeach
				</td>
                <td>{{$entity->active ? 'Sim' : 'Não'}}</td>
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
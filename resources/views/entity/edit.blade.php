@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Editar Entidade</h1>
        {!! Form::model($entity,['route'=>['entity.update',$entity->id],'method'=>'PUT']) !!}
        @include('entity._form')
        {!! Form::close() !!}
    </div>

@stop
@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Editar Variação</h1>
        {!! Form::model($productVariation,['route'=>['productvariation.update',$productVariation->id],'method'=>'PUT']) !!}
        @include('productvariation._form')
        {!! Form::close() !!}
    </div>

@stop
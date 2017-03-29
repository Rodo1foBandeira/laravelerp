@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Editar Atributo</h1>
        {!! Form::model($productAttribute,['route'=>['productAttribute.update',$attributeProduct->id],'method'=>'PUT']) !!}
        @include('productAttribute._form')
        {!! Form::close() !!}
    </div>

@stop
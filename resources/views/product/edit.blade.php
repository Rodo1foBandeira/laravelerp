@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Editar Produto</h1>
        {!! Form::model($product,['route'=>['product',$product->id],'method'=>'PUT']) !!}
        @include('product._form')
        {!! Form::close() !!}
    </div>

@stop
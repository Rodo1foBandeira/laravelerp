@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Cadastrar Produto</h1>
        {!! Form::open(['route'=>'product.store','method'=>'POST']) !!}
        @include('product._form')
        {!! Form::close() !!}
    </div>

@stop
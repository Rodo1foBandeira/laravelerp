@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Cadastrar Categoria</h1>
        {!! Form::open(['route'=>'productcategory.store','method'=>'POST']) !!}
        @include('productcategory._form')
        {!! Form::close() !!}
    </div>

@stop
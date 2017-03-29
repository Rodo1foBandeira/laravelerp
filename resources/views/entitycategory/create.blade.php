@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Cadastrar Categoria</h1>
        {!! Form::open(['route'=>'entitycategory.store','method'=>'POST']) !!}
        @include('entitycategory._form')
        {!! Form::close() !!}
    </div>

@stop
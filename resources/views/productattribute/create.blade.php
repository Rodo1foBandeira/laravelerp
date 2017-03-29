@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Cadastrar Atributo</h1>
        {!! Form::open(['route'=>'productattribute.store','method'=>'POST']) !!}
        @include('productattribute._form')
        {!! Form::close() !!}
    </div>

@stop
@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Cadastrar Marca</h1>
        {!! Form::open(['route'=>'brand.store','method'=>'POST']) !!}
        @include('brand._form')
        {!! Form::close() !!}
    </div>

@stop
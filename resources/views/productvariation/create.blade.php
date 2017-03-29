@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Cadastrar Variação</h1>
        {!! Form::open(['route'=>'productvariation.store','method'=>'POST']) !!}
        @include('productvariation._form')
        {!! Form::close() !!}
    </div>

@stop
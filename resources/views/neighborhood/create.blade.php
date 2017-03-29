@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Cadastrar Bairro</h1>
        {!! Form::open(['route'=>'neighborhood.store','method'=>'POST']) !!}
        @include('neighborhood._form')
        {!! Form::close() !!}
    </div>

@stop
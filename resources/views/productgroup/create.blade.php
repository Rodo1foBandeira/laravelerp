@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Cadastrar Grupo</h1>
        {!! Form::open(['route'=>'productgroup.store','method'=>'POST']) !!}
        @include('productgroup._form')
        {!! Form::close() !!}
    </div>

@stop
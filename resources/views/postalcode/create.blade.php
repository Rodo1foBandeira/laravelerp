@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Cadastrar CEP</h1>
        {!! Form::open(['route'=>'postalcode.store','method'=>'POST']) !!}
        @include('postalcode._form')
        {!! Form::close() !!}
    </div>

@stop
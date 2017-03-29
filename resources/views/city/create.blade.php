@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Cadastrar Cidade</h1>
        {!! Form::open(['route'=>'city.store','method'=>'POST']) !!}
        @include('city._form')
        {!! Form::close() !!}
    </div>

@stop
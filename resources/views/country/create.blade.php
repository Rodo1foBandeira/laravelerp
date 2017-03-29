@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Cadastrar País</h1>
        {!! Form::open(['route'=>'country.store','method'=>'POST']) !!}
        @include('country._form')
        {!! Form::close() !!}
    </div>

@stop
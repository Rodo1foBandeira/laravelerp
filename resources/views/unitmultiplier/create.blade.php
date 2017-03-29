@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Cadastrar Multiplicador</h1>
        {!! Form::open(['route'=>'unitmultiplier.store','method'=>'POST']) !!}
        @include('unitmultiplier._form')
        {!! Form::close() !!}
    </div>

@stop
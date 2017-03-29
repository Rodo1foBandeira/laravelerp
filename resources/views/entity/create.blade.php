@extends('layouts.app')

@section('content')

    <div class="container">
    <h1>Cadastrar Entidade</h1>
    {!! Form::open(['route'=>'entity.store','method'=>'POST']) !!}
    @include('entity._form')
    {!! Form::close() !!}
    </div>

@stop
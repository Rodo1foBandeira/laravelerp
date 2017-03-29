@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Cadastrar SubGrupo</h1>
        {!! Form::open(['route'=>'productsubgroup.store','method'=>'POST']) !!}
        @include('productsubgroup._form')
        {!! Form::close() !!}
    </div>

@stop
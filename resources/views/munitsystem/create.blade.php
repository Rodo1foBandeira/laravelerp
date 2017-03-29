@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Cadastrar Unidade de Medida</h1>
        {!! Form::open(['route'=>'munitsystem.store','method'=>'POST']) !!}
        @include('munitsystem._form')
        {!! Form::close() !!}
    </div>

@stop
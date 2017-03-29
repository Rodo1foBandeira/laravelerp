@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Cadastrar Estado</h1>
        {!! Form::open(['route'=>'state.store','method'=>'POST']) !!}
        @include('state._form')
        {!! Form::close() !!}
    </div>

@stop
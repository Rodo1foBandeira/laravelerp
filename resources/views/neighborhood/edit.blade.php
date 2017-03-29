@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Editar Bairro</h1>
        {!! Form::model($neighborhood,['route'=>['neighborhood.update',$neighborhood->id],'method'=>'PUT']) !!}
        @include('neighborhood._form')
        {!! Form::close() !!}
    </div>

@stop
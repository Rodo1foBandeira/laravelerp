@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Editar Cidade</h1>
        {!! Form::model($city,['route'=>['city.update',$city->id],'method'=>'PUT']) !!}
        @include('city._form')
        {!! Form::close() !!}
    </div>

@stop
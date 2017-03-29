@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Editar País</h1>
        {!! Form::model($country,['route'=>['country.update',$country->id],'method'=>'PUT']) !!}
        @include('country._form')
        {!! Form::close() !!}
    </div>

@stop
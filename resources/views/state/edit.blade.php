@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Editar Estado</h1>
        {!! Form::model($state,['route'=>['state.update',$state->id],'method'=>'PUT']) !!}
        @include('state._form')
        {!! Form::close() !!}
    </div>

@stop
@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Editar CEP</h1>
        {!! Form::model($postalCode,['route'=>['postalcode.update',$postalCode->id],'method'=>'PUT']) !!}
        @include('postalcode._form')
        {!! Form::close() !!}
    </div>

@stop
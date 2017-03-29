@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Editar Unidade de Medida</h1>
        {!! Form::model($mUnitSystem,['route'=>['munitsystem.update',$mUnitSystem->id],'method'=>'PUT']) !!}
        @include('munitsystem._form')
        {!! Form::close() !!}
    </div>

@stop
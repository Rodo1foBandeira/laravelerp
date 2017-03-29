@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Editar Multiplicador</h1>
        {!! Form::model($unitMultiplier,['route'=>['unitmultiplier.update',$unitMultiplier->id],'method'=>'PUT']) !!}
        @include('unitmultiplier._form')
        {!! Form::close() !!}
    </div>

@stop
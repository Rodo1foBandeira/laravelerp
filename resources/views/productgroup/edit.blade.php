@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Editar Grupo</h1>
        {!! Form::model($productGroup,['route'=>['productgroup.update',$productGroup->id],'method'=>'PUT']) !!}
        @include('productgroup._form')
        {!! Form::close() !!}
    </div>

@stop
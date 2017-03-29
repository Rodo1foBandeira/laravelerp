@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Editar SubGrupo</h1>
        {!! Form::model($productSubGroup,['route'=>['productsubgroup.update',$productSubGroup->id],'method'=>'PUT']) !!}
        @include('productsubgroup._form')
        {!! Form::close() !!}
    </div>

@stop
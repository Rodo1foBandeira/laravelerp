@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Editar Categoria</h1>
        {!! Form::model($entityCategory,['route'=>['entitycategory.update',$entityCategory->id],'method'=>'PUT']) !!}
        @include('entitycategory._form')
        {!! Form::close() !!}
    </div>

@stop
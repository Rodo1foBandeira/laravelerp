@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Editar Categoria</h1>
        {!! Form::model($productCategory,['route'=>['productcategory.update',$productCategory->id],'method'=>'PUT']) !!}
        @include('productcategory._form')
        {!! Form::close() !!}
    </div>

@stop
@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Editar Marca</h1>
        {!! Form::model($brand,['route'=>['brand.update',$brand->id],'method'=>'PUT']) !!}
        @include('brand._form')
        {!! Form::close() !!}
    </div>

@stop
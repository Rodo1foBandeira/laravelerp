@if (isset($productCategory))
    <div class="form-group">
        {!! Form::label('id','ID',['class'=>'control-label']) !!}
        {!! Form::text('id', null, ['class'=>'form-control']) !!}
    </div>
@endif
<div class="form-group">
    {!! Form::label('pcname','Categoria',['class'=>'control-label']) !!}
    {!! Form::text('pcname', null, ['class'=>'form-control','placeholder'=>'Categoria']) !!}
</div>
<div class="form-group">
    {!! Form::label('pckey','Chave',['class'=>'control-label']) !!}
    {!! Form::text('pckey', null, ['class'=>'form-control','placeholder'=>'Chave']) !!}
</div>
{!! Form::submit('Gravar',['class'=>'btn btn-primary']) !!}
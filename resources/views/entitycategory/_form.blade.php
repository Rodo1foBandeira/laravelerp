@if (isset($entityCategory))
    <div class="form-group">
        {!! Form::label('id','ID',['class'=>'control-label']) !!}
        {!! Form::text('id', null, ['class'=>'form-control']) !!}
    </div>
@endif
<div class="form-group">
    {!! Form::label('category','Categoria',['class'=>'control-label']) !!}
    {!! Form::text('category', null, ['class'=>'form-control','placeholder'=>'Categoria']) !!}
</div>
<div class="form-group">
    {!! Form::label('eckey','Chave',['class'=>'control-label']) !!}
    {!! Form::text('eckey', null, ['class'=>'form-control','placeholder'=>'chave','onkeyup'=>'mask(this,mlower)']) !!}
</div>
{!! Form::submit('Gravar',['class'=>'btn btn-primary']) !!}
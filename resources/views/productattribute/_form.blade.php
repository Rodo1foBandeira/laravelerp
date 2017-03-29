<div class="form-group">
    {!! Form::label('pa_attribute','Atributo',['class'=>'control-label']) !!}
    {!! Form::text('pa_attribute', null, ['class'=>'form-control','placeholder'=>'Atributo']) !!}
</div>
<div class="form-group">
    {!! Form::label('pa_key','Chave',['class'=>'control-label']) !!}
    {!! Form::text('pa_key', null, ['class'=>'form-control','placeholder'=>'chave']) !!}
</div>
<div class="form-group">
    {!! Form::label('pa_value','Valor',['class'=>'control-label']) !!}
    {!! Form::text('pa_value', null, ['class'=>'form-control','placeholder'=>'Valor']) !!}
</div>
{!! Form::submit('Gravar',['class'=>'btn btn-primary']) !!}
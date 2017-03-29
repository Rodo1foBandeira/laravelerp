@if (isset($unitMultiplier))
    <div class="form-group">
        {!! Form::label('id','ID',['class'=>'control-label']) !!}
        {!! Form::text('id', null, ['class'=>'form-control']) !!}
    </div>
@endif
<div class="form-group">
    {!! Form::label('um_name','Nome',['class'=>'control-label']) !!}
    {!! Form::text('um_name', null, ['class'=>'form-control','placeholder'=>'Nome','required'=>'true']) !!}
    @if ($errors->has('um_name'))
        <span class="help-block">
            <strong>Tamanho minimo: 1 caracter</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('um_iso_code','Sigla',['class'=>'control-label']) !!}
    {!! Form::text('um_iso_code', null, ['class'=>'form-control','placeholder'=>'Sigla','maxlength'=>'5','required'=>'true']) !!}
    @if ($errors->has('um_iso_code'))
        <span class="help-block">
            <strong>Tamanho minimo: 1 caracter</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('um_multiplier','Multiplicador',['class'=>'control-label']) !!}
    {!! Form::number('um_multiplier', null, ['class'=>'form-control','placeholder'=>'Multiplicador','required'=>'true']) !!}
    @if ($errors->has('um_multiplier'))
        <span class="help-block">
            <strong>Tamanho minimo: 1 caracter</strong>
        </span>
    @endif
</div>
{!! Form::submit('Gravar',['class'=>'btn btn-primary']) !!}
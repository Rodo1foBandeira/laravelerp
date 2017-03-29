@if (isset($mUnitSystem))
    <div class="form-group">
        {!! Form::label('id','ID',['class'=>'control-label']) !!}
        {!! Form::text('id', null, ['class'=>'form-control']) !!}
    </div>
@endif
<div class="form-group">
    {!! Form::label('unit','Unidade',['class'=>'control-label']) !!}
    {!! Form::text('unit', null, ['class'=>'form-control','placeholder'=>'Unidade','required'=>'true']) !!}
    @if ($errors->has('unit'))
        <span class="help-block">
            <strong>Tamanho minimo: 1 caracter</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('iso_code','Sigla',['class'=>'control-label']) !!}
    {!! Form::text('iso_code', null, ['class'=>'form-control','placeholder'=>'Sigla','maxlength'=>'3','required'=>'true']) !!}
    @if ($errors->has('iso_code'))
        <span class="help-block">
            <strong>Tamanho minimo: 1 caracter</strong>
        </span>
    @endif
</div>
<div class="form-group">
    {!! Form::label('measure','Medida',['class'=>'control-label']) !!}
    {!! Form::number('measure', null, ['class'=>'form-control','placeholder'=>'Medida','required'=>'true']) !!}
    @if ($errors->has('measure'))
        <span class="help-block">
            <strong>Tamanho minimo: 1 caracter</strong>
        </span>
    @endif
</div>
{!! Form::submit('Gravar',['class'=>'btn btn-primary']) !!}
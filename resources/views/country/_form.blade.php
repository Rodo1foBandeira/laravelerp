@if (isset($country))
    <div class="form-group">
        {!! Form::label('id','ID',['class'=>'control-label']) !!}
        {!! Form::text('id', null, ['class'=>'form-control']) !!}
    </div>
@endif
<div class="form-group">
    {!! Form::label('country','País',['class'=>'control-label']) !!}
    {!! Form::text('country', null, ['class'=>'form-control','placeholder'=>'País']) !!}
</div>
<div class="form-group" >
    {!! Form::label('iso_code_2','Sigla(2)',['class'=>'control-label']) !!}
    {!! Form::text('iso_code_2', null, ['class'=>'form-control','placeholder'=>'__','maxlength'=>'2','onkeyup'=>'mask(this,mupper)']) !!}
</div>
<div class="form-group">
    {!! Form::label('iso_code_3','Sigla(3)',['class'=>'control-label']) !!}
    {!! Form::text('iso_code_3', null, ['class'=>'form-control','placeholder'=>'___','maxlength'=>'3','onkeyup'=>'mask(this,mupper)']) !!}
</div>
<div class="form-group">
    {!! Form::label('ddi','Código',['class'=>'control-label']) !!}
    {!! Form::number('ddi', null, ['class'=>'form-control','placeholder'=>'Código país','maxlength'=>'3','onkeyup'=>'mask(this,mnumber)']) !!}
</div>
{!! Form::submit('Gravar',['class'=>'btn btn-primary']) !!}
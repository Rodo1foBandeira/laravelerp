@if (isset($state))
    <div class="form-group">
        {!! Form::label('id','ID',['class'=>'control-label']) !!}
        {!! Form::text('id', null, ['class'=>'form-control']) !!}
    </div>
@endif
<div class="form-group">
    {!! Form::label('country_id','País',['class'=>'control-label']) !!}
    {!! Form::select('country_id', $countries, null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('state','Estado',['class'=>'control-label']) !!}
    {!! Form::text('state', null, ['class'=>'form-control','placeholder'=>'Estado']) !!}
</div>
<div class="form-group">
    {!! Form::label('iso_code_2','Sigla(2)',['class'=>'control-label']) !!}
    {!! Form::text('iso_code_2', null, ['class'=>'form-control','placeholder'=>'__','onkeyup'=>'mask(this,mupper)']) !!}
</div>
{!! Form::submit('Gravar',['class'=>'btn btn-primary']) !!}
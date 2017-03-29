@if (isset($city))
    <div class="form-group">
        {!! Form::label('id','ID',['class'=>'control-label']) !!}
        {!! Form::text('id', null, ['class'=>'form-control']) !!}
    </div>
@endif
<div class="form-group">
    {!! Form::label('country_id','País',['class'=>'control-label']) !!}
    {!! Form::select('country_id', $countries, isset($city) ? $city->state->country->id : 1, ['class'=>'form-control', 'onchange'=>'getStates(this.value)']) !!}
</div>
<div class="form-group">
    {!! Form::label('state_id','Estado',['class'=>'control-label']) !!}
    {!! Form::select('state_id', $states, null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('city','Cidade',['class'=>'control-label']) !!}
    {!! Form::text('city', null, ['class'=>'form-control','placeholder'=>'Cidade']) !!}
</div>
<div class="form-group">
    {!! Form::label('code','Código municipio',['class'=>'control-label']) !!}
    {!! Form::text('code', null, ['class'=>'form-control','placeholder'=>'Código municipio']) !!}
</div>
{!! Form::submit('Gravar',['class'=>'btn btn-primary']) !!}

<script>
    function getStates(id) {
        $.get('{{ asset('/') }}state/getStates/'+id, function (data) {
            $('#state_id').empty();
            for (i=0; i<data.length; i++)
                $('#state_id').append('<option value="'+data[i]['id']+'">'+data[i]['state']+'</option>');
        });
    }
</script>
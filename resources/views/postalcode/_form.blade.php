<div class="form-group">
    {!! Form::label('country_id','País',['class'=>'control-label']) !!}
    {!! Form::select('country_id', $countries, isset($postalCode) ? $postalCode->city->state->country->id : 1, ['class'=>'form-control','onchange'=>'getStates(this.value)']) !!}
</div>
<div class="form-group">
    {!! Form::label('state_id','Estado',['class'=>'control-label']) !!}
    {!! Form::select('state_id', $states, isset($postalCode) ? $postalCode->city->state->id : 1, ['class'=>'form-control','onchange'=>'getCities(this.value)']) !!}
</div>
<div class="form-group">
    {!! Form::label('city_id','Cidade',['class'=>'control-label']) !!}
    {!! Form::select('city_id', $cities, isset($postalCode) ? $postalCode->city->id : 1, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('code','Cep',['class'=>'control-label']) !!}
    {!! Form::text('code', null, ['class'=>'form-control','placeholder'=>'Cep','onkeyup'=>'mask(this, mcep)','maxlength'=>'9']) !!}
</div>
{!! Form::submit('Gravar',['class'=>'btn btn-primary']) !!}

<script>
    function getStates(id) {
        $.get('{{ asset('/') }}state/getStates/'+id, function (data) {
            $('#state_id').empty();
            for (i=0; i<data.length; i++)
                $('#state_id').append('<option value="'+data[i]['id']+'">'+data[i]['state']+'</option>');
            getCities(data[0]['id']);
        });
    }
    function getCities(id) {
        $.get('{{ asset('/') }}city/getCities/'+id, function (data) {
            $('#city_id').empty();
            for (i=0; i<data.length; i++)
                $('#city_id').append('<option value="'+data[i]['id']+'">'+data[i]['city']+'</option>');
        });
    }
</script>
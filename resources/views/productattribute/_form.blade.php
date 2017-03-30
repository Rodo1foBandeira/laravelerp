<script src="{{asset('js/jscolor.min.js')}}" type="text/javascript"></script>
<script>
    function addjscolor() {
        /*document.getElementById('pa_value').className = 'form-control jscolor';
        document.getElementById('pa_value').value = 'FFFFFF';
        document.getElementById('pa_value').jscolor.show();*/
        document.getElementById('pa_value').remove();
        var input = document.createElement('INPUT');
        input.className = 'form-control';
        input.name = 'pa_value';
        input.id = 'pa_value';
        var picker = new jscolor(input);
        picker.fromString('FFFFFF');
        document.getElementById('pavalue').appendChild(input);
    }
</script>
<div class="form-group">
    {!! Form::label('pa_attribute','Atributo',['class'=>'control-label']) !!}
    {!! Form::text('pa_attribute', null, ['class'=>'form-control','placeholder'=>'Atributo']) !!}
</div>
<div class="form-group">
    {!! Form::label('pa_key','Chave',['class'=>'control-label']) !!}
    {!! Form::text('pa_key', null, ['class'=>'form-control','placeholder'=>'chave','onkeyup'=>'mask(this,mlower)','onblur'=>'if ((this.value=="cor")||(this.value=="color")) addjscolor();']) !!}
</div>
<div class="form-group" id="pavalue">
    {!! Form::label('pa_value','Valor',['class'=>'control-label']) !!}
    {!! Form::text('pa_value', null, ['class'=>'form-control','placeholder'=>'Valor']) !!}
</div>
{!! Form::submit('Gravar',['class'=>'btn btn-primary']) !!}
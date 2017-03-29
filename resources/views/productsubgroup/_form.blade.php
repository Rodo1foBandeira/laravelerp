<div class="form-group">
    {!! Form::label('group_id','Grupo',['class'=>'control-label']) !!}
    {!! Form::select('group_id', $productGroups, null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('psname','SubGrupo',['class'=>'control-label']) !!}
    {!! Form::text('psname', null, ['class'=>'form-control','placeholder'=>'SubGrupo']) !!}
</div>
{!! Form::submit('Gravar',['class'=>'btn btn-primary']) !!}
<div class="form-group">
    {!! Form::label('prname','Nome',['class'=>'control-label']) !!}
    {!! Form::text('prname', null, ['class'=>'form-control','placeholder'=>'Nome','required'=>'true']) !!}
</div>
<div class="form-group">
    {!! Form::label('prdescription','Descrição',['class'=>'control-label']) !!}
    {!! Form::text('prdescription', null, ['class'=>'form-control','placeholder'=>'Descrição']) !!}
</div>
<div class="form-group">
    {!! Form::label('brand_id','Marca',['class'=>'control-label']) !!}
    {!! Form::select('brand_id', $brands, null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('group_id','Grupo',['class'=>'control-label']) !!}
    {!! Form::select('group_id', $groups, null, ['class'=>'form-control','onchange'=>'getSubGroups(this.value)']) !!}
</div>
<div class="form-group">
    {!! Form::label('subgroup_id','Subgrupo',['class'=>'control-label']) !!}
    {!! Form::select('subgroup_id', $subGroups, null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('category_id','Grupo',['class'=>'control-label']) !!}
    {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('prcostprice','Preço Custo',['class'=>'control-label']) !!}
    {!! Form::number('prcostprice', null, ['class'=>'form-control','placeholder'=>'Preço Custo']) !!}
</div>
<div class="form-group">
    {!! Form::label('prcostmed','Custo Médio',['class'=>'control-label']) !!}
    {!! Form::number('prcostmed', null, ['class'=>'form-control','placeholder'=>'Custo Médio']) !!}
</div>
<div class="form-group">
    {!! Form::label('prsalemed','Preço Médio',['class'=>'control-label']) !!}
    {!! Form::number('prsalemed', null, ['class'=>'form-control','placeholder'=>'Preço Médio']) !!}
</div>
<div class="form-group">
    {!! Form::label('prsaleprice','Preço Venda',['class'=>'control-label']) !!}
    {!! Form::number('prsaleprice', null, ['class'=>'form-control','placeholder'=>'Preço Venda']) !!}
</div>
{!! Form::submit('Gravar',['class'=>'btn btn-primary']) !!}

<script>
    function getSubGroups(id) {
        $.get('{{ asset('/') }}productsubgroup/getSubGroups/'+id, function (data) {
            $('#subgroup_id').empty();
            for (i=0; i<data.length; i++)
                $('#subgroup_id').append('<option value="'+data[i]['id']+'">'+data[i]['psname']+'</option>');
        });
    }
</script>
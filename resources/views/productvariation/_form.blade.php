<div class="form-group">
    {!! Form::label('product_id','Produto',['class'=>'control-label']) !!}
    {!! Form::select('product_id', $products, null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('mus_id','Unidade de padrão',['class'=>'control-label']) !!}
    {!! Form::select('mus_id', $mUnitSystems, null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('um_id','Multiplicador',['class'=>'control-label']) !!}
    {!! Form::select('um_id', $unitMultipliers, null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('quantity','Quantidade',['class'=>'control-label']) !!}
    {!! Form::number('quantity', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('percaddit','Acrescimo %',['class'=>'control-label']) !!}
    {!! Form::number('percaddit', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('valaddit','Acrescimo $',['class'=>'control-label']) !!}
    {!! Form::number('valaddit', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('maxqtity','Estoque máximo',['class'=>'control-label']) !!}
    {!! Form::number('maxqtity', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('minqtity','Estoque minimo',['class'=>'control-label']) !!}
    {!! Form::number('minqtity', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('dmus_id','Unidade de dimensão',['class'=>'control-label']) !!}
    {!! Form::select('dmus_id', $mUnitSystems, null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('length','Comprimento',['class'=>'control-label']) !!}
    {!! Form::number('length', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('width','Largura',['class'=>'control-label']) !!}
    {!! Form::number('width', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('height','Altura',['class'=>'control-label']) !!}
    {!! Form::number('height', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('wmus_id','Unidade de peso',['class'=>'control-label']) !!}
    {!! Form::select('wmus_id', $mUnitSystems, null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('weight','Peso',['class'=>'control-label']) !!}
    {!! Form::number('weight', null, ['class'=>'form-control']) !!}
</div>
{!! Form::submit('Gravar',['class'=>'btn btn-primary']) !!}
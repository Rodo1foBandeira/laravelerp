<div class="form-group">
    {!! Form::label('product_id','Produto',['class'=>'control-label']) !!}
    {!! Form::select('product_id', $products, null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('mus_id','Unidade padrão',['class'=>'control-label']) !!}
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
{!! Form::label('attributes','Atributo(s)',['class'=>'control-label']) !!}
<a class="btn btn-primary btn-xs" style="margin-left: 3px;" onclick="addAttributesSelect()"><span class="glyphicon glyphicon-plus"></span></a>
<div class="form-inline" id="attributes">
    @if (isset($productVariation))
        @foreach($productVariation->attributesProducts as $attribute)
            <div class="form-inline" id="attribute{!! $attribute->id !!}" style="margin-bottom: 5px">
                {!! Form::select('attr'.$attribute->id, $productAttributes, $attribute->attribute_id, ['class'=>'form-control']) !!}
                <a class="btn btn-primary btn-xs" style="margin-left: 3px;" onclick="destroyRow('attribute{!! $attribute->id !!}')"><span class="glyphicon glyphicon-minus"></span></a>
            </div>
        @endforeach
    @endif
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

<script>
    var inc = 0;
    function addAttributesSelect() {
        $.get('{{ asset('/') }}productattribute/getAttributes/0', function (data) {
            var addList = document.getElementById('attributes');

            var div = document.createElement('div');
            div.style = 'margin-bottom: 5px;';
            div.className = 'form-inline';
            div.id = 'attribute'+inc;

            var options = '';
            for (i=0; i<data.length; i++){
                options += '<option value="'+data[i]['id']+'">'+data[i]['pa_attribute']+'</option>';
            }

            div.innerHTML = '<select id="attr'+inc+'" name="attr'+inc+'" class="form-control">'+options;

            div.innerHTML += '<a class="btn btn-primary btn-xs" style="margin-left: 3px;" onclick="destroyRow('+"'attribute"+inc+"')"+'"><span class="glyphicon glyphicon-minus"></span></a>';
            addList.appendChild(div);
            inc++;
        });
    }
</script>
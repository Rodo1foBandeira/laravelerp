    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        {{ Form::label('name','Nome',['class'=>'control-label']) }}
        {{ Form::text('name', null,['class' => 'form-control','placeholder'=>'Nome ou Fantasia']) }}
        @if ($errors->has('name'))
            <span class="help-block">
                    <strong>Tamanho minimo: 5 caracteres</strong>
                </span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('company','Razão',['class'=>'control-label']) !!}
        {!! Form::text('company', null, ['class'=>'form-control','placeholder'=>'Razão']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('birth_date','Nascimento',['class'=>'control-label']) !!}
        {!! Form::text('birth_date', isset($entity) ? date("d/m/Y", strtotime($entity->birth_date)) : date("d/m/Y", strtotime(\Carbon\Carbon::now())), ['class'=>'form-control','onkeyup'=>'mask(this, mdate)','maxlength'=>'10']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category','Categoria(s)',['class'=>'control-label']) !!}
        <div class="form-inline">
            @foreach($categories as $category)
            <label class="checkbox-inline">
                @if (isset($entity))
                    {!! Form::checkbox($category->eckey,$category->id,in_array($category->id,$categoriesEntity),['style'=>'vertical-align:text-bottom;']) !!}
                @else
                    {!! Form::checkbox($category->eckey,$category->id,false,['style'=>'vertical-align:text-bottom;']) !!}
                @endif
                {{ $category->category }}
            </label>
            @endforeach
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('type','Pessoa',['class'=>'control-label']) !!}
        {!! Form::select('type', ['F'=>'Fisica','J'=>'Juridica'],'F',['class'=>'form-control','onchange'=>'setType()']) !!}
    </div>

    <div class="form-group {{ $errors->has('cnpj_cpf') ? 'has-error' : '' }}" id="form-cnpjcpf">
        {!! Form::label('cnpj_cpf','CPF',['class'=>'control-label','id'=>'lbl-cnpjcpf']) !!}
        {!! Form::text('cnpj_cpf', null, ['onkeyup'=>"maskCnpjCpf(this)",'onblur'=>"maskCnpjCpf(this)",'class'=>'form-control','placeholder'=>'CPF','maxlength'=>'14']) !!}
        @if ($errors->has('cnpj_cpf'))
            <span class="help-block">
                    <strong>Tamanho minimo: 11 caracteres</strong>
                </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('ie_rg') ? 'has-error' : '' }}" id="form-ierg">
        {!! Form::label('ie_rg','RG',['class'=>'control-label','id'=>'lbl-ierg']) !!}
        {!! Form::text('ie_rg', null, ['onkeyup'=>'maskIERG(this)','onblur'=>'maskIERG(this)','class'=>'form-control','placeholder'=>'RG','maxlength'=>'12']) !!}
        @if ($errors->has('ie_rg'))
            <span class="help-block">
                    <strong>Tamanho minimo: 9 caracteres</strong>
                </span>
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('country_id','País',['class'=>'control-label']) !!}
        {!! Form::select('country_id', $countries, isset($entity) ? $postalCode->city->state->country->id : 1, ['class'=>'form-control', 'onchange'=>'getStates(this.value)']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('state_id','Estado',['class'=>'control-label']) !!}
        {!! Form::select('state_id', $states, isset($entity) ? $postalCode->city->state->id : 1, ['class'=>'form-control', 'onchange'=>'getCities(this.value)','id'=>'states']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('city_id','Cidade',['class'=>'control-label']) !!}
        {!! Form::select('city_id', $cities, isset($entity) ? $postalCode->city->id : 1, ['class'=>'form-control', 'onchange'=>'getPostalCodes(this.value)','id'=>'cities']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('postal_code_id','Cep',['class'=>'control-label']) !!}
        {!! Form::select('postal_code_id', $postalCodes, null, ['class'=>'form-control','id'=>'postalcodes']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('neighborhood_id','Bairro',['class'=>'control-label']) !!}
        {!! Form::select('neighborhood_id', $neighborhoods, null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('address','Endereço',['class'=>'control-label']) !!}
        {!! Form::text('address', null, ['class'=>'form-control','placeholder'=>'Endereço']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('address_number','Numero',['class'=>'control-label']) !!}
        {!! Form::text('address_number', null, ['class'=>'form-control','placeholder'=>'Numero']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('address_complement','Complemento',['class'=>'control-label']) !!}
        {!! Form::text('address_complement', null, ['class'=>'form-control','placeholder'=>'Complemento']) !!}
    </div>

    {!! Form::label('phones','Telefone(s)',['class'=>'control-label']) !!}
    {!! Form::text('countPhones', isset($entity) ? count($entity->phones) : 0, ['style'=>'display:none;']) !!}
    <a class="btn btn-primary btn-xs" style="margin-left: 3px;" onclick="addPhone()"><span class="glyphicon glyphicon-plus"></span></a>
    <div class="form-inline" id="phones">
        @if (isset($entity))
            @foreach($entity->phones as $key => $phone)
                <?php $id = $key+1; ?>
                <div class="form-inline" id="phone{!! $id !!}" style="margin-bottom: 5px">
                    {!! Form::text('phid'.$id, $phone->id, ['style'=>'display:none;']) !!}
                    {!! Form::text('phone'.$id, $phone->number, ['class'=>'form-control','placeholder'=>'Contato','onkeyup'=>' mask( this, mtel )', 'maxlegth'=>'15']) !!}
                    {!! Form::text('pnotes'.$id, $phone->pnotes, ['class'=>'form-control','placeholder'=>'Observações']) !!}
                    <a class="btn btn-primary btn-xs" style="margin-left: 3px;" onclick="delRow('phone{!! $id !!}')"><span class="glyphicon glyphicon-minus"></span></a>
                </div>
            @endforeach
        @endif
    </div>

    {!! Form::label('emails','E-mail(s)',['class'=>'control-label']) !!}
    {!! Form::text('countEmails', isset($entity) ? count($entity->emails) : 0, ['style'=>'display:none;']) !!}
    <a class="btn btn-primary btn-xs" style="margin-left: 3px;" onclick="addEmail()"><span class="glyphicon glyphicon-plus"></span></a>
    <div class="form-inline" id="emails">
        @if (isset($entity))
            @foreach($entity->emails as $key => $email)
                <?php $id = $key+1; ?>
                <div class="form-inline" id="email{!! $id !!}" style="margin-bottom: 5px">
                    {!! Form::text('emid'.$id, $email->id, ['style'=>'display:none;']) !!}
                    {!! Form::email('email'.$id, $email->email, ['class'=>'form-control','placeholder'=>'E-mail']) !!}
                    {!! Form::text('enotes'.$id, $email->enotes, ['class'=>'form-control','placeholder'=>'Observações']) !!}
                    <a class="btn btn-primary btn-xs" style="margin-left: 3px;" onclick="delRow('email{!! $id !!}')"><span class="glyphicon glyphicon-minus"></span></a>
                </div>
            @endforeach
        @endif
    </div>

    <div class="form-group">
        {!! Form::label('notes','Observações',['class'=>'control-label']) !!}
        {!! Form::textarea('notes', null, ['class'=>'form-control','placeholder'=>'Observações...']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('active','Ativo',['class'=>'control-label']) !!}
        {!! Form::select('active', ['1'=>'Sim','0'=>'Não'],null,['class'=>'form-control']) !!}
    </div>
    {!! Form::submit('Gravar',['class'=>'btn btn-primary']) !!}

    
<script src="{{asset('js/Entity.js')}}" type="text/javascript"></script>
<script>
    function getStates(id) {
        $.get('{{ asset('/') }}state/getStates/'+id, function (data) {
            $('#states').empty();
            for (i=0; i<data.length; i++)
                $('#states').append('<option value="'+data[i]['id']+'">'+data[i]['state']+'</option>');
            getCities(data[0]['id']);
        });
    }

    function getCities(id) {
        $.get('{{ asset('/') }}city/getCities/'+id, function (data) {
            $('#cities').empty();
            for (i=0; i<data.length; i++)
                $('#cities').append('<option value="'+data[i]['id']+'">'+data[i]['city']+'</option>');
            getPostalCodes(data[0]['id']);
        });
    }

    function getPostalCodes(id) {
        $.get('{{ asset('/') }}postalcode/getPostalCodes/'+id, function (data) {
            $('#postalcodes').empty();
            for (i=0; i<data.length; i++)
                $('#postalcodes').append('<option value="'+data[i]['id']+'">'+data[i]['code']+'</option>');
        });
    }
    @if (isset($entity))
        document.getElementsByName('countPhones')[0].value = {!! count($entity->phones) !!};
        document.getElementsByName('countEmails')[0].value = {!! count($entity->emails) !!};
    @else
        document.getElementsByName('countPhones')[0].value = 0;
        document.getElementsByName('countEmails')[0].value = 0;
    @endif
</script>
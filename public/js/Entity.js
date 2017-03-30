function mcnpj(v){
    v=v.replace(/\D/g,"")                           //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/,"$1.$2")             //Coloca ponto entre o segundo e o terceiro dígitos
    v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3") //Coloca ponto entre o quinto e o sexto dígitos
    v=v.replace(/\.(\d{3})(\d)/,".$1/$2")           //Coloca uma barra entre o oitavo e o nono dígitos
    v=v.replace(/(\d{4})(\d)/,"$1-$2")              //Coloca um hífen depois do bloco de quatro dígitos
    return v
}
function mcpf(v){
    v=v.replace(/\D/g,"")                    //Remove tudo o que não é dígito
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos
                                             //de novo (para o segundo bloco de números)
    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2") //Coloca um hífen entre o terceiro e o quarto dígitos
    return v
}
function mie(v){
    v=v.replace(/\D/g,"")                    //Remove tudo o que não é dígito
    v=v.replace(/(\d{3})(\d)/,"$1.$2")
    v=v.replace(/(\d{3})(\d)/,"$1.$2")
    v=v.replace(/(\d{3})(\d)/,"$1.$2")
    v=v.replace(/(\d{3})(\d)/,"$1.$2")
    return v
}
function mrg(v){
    v=v.replace(/\D/g,"");                                      //Remove tudo o que não é dígito
    v=v.replace(/(\d)(\d{7})$/,"$1.$2");    //Coloca o . antes dos últimos 3 dígitos, e antes do verificador
    v=v.replace(/(\d)(\d{4})$/,"$1.$2");    //Coloca o . antes dos últimos 3 dígitos, e antes do verificador
    v=v.replace(/(\d)(\d)$/,"$1-$2");               //Coloca o - antes do último dígito
    return v;
}

// delRow use in edit for updates
function delRow(id) {
    if (confirm('Deseja realmente excluir?')){
        document.getElementsByName(id)[0].value = 'null';
        document.getElementsByName(id)[0].type = 'text';
        document.getElementById(id).style.display = 'none';
    }
}

// addContact use in create for store
function addPhone() {
    var inc = document.getElementsByName('countPhones')[0].value;

    inc++;

    document.getElementsByName('countPhones')[0].value = inc;

    var addList = document.getElementById('phones');

    var div = document.createElement('div');
    div.style = 'margin-bottom: 5px;';
    div.className = 'form-inline';
    div.id = 'phone'+inc;

    div.innerHTML = '<input placeholder="Contato" name="phone'+inc+'" type="text" class="form-control" onkeyup="mask(this,mtel)" maxlength="15" /> ';
    div.innerHTML += '<input placeholder="Observações" name="pnotes'+inc+'" type="text" class="form-control" /> ';
    div.innerHTML += '<a class="btn btn-primary btn-xs" style="margin-left: 3px;" onclick="destroyRow('+"'phone"+inc+"')"+'"><span class="glyphicon glyphicon-minus"></span></a>';
    addList.appendChild(div);
}

// addContact use in create for store
function addEmail() {
    var inc = document.getElementsByName('countEmails')[0].value;

    inc++;

    document.getElementsByName('countEmails')[0].value = inc;

    var addList = document.getElementById('emails');

    var div = document.createElement('div');
    div.style = 'margin-bottom: 5px;';
    div.className = 'form-inline';
    div.id = 'email'+inc;

    div.innerHTML = '<input placeholder="E-mail" name="email'+inc+'" type="email" class="form-control" /> ';
    div.innerHTML += '<input placeholder="Observações" name="enotes'+inc+'" type="text" class="form-control" /> ';
    div.innerHTML += '<a class="btn btn-primary btn-xs" style="margin-left: 3px;" onclick="destroyRow('+"'email"+inc+"')"+'"><span class="glyphicon glyphicon-minus"></span></a>';
    addList.appendChild(div);
}

function setActive(o) {
    if (o.checked){
        o.value = true;
    }else{
        o.value = false;
    }
}

function setType() {
    if (document.getElementById("type").value == 'F'){
        document.getElementById("lbl-cnpjcpf").innerHTML = 'CPF';
        document.getElementById("lbl-ierg").innerHTML = 'RG';
        document.getElementById("cnpj_cpf").placeholder = 'CPF';
        document.getElementById("cnpj_cpf").maxLength = 14;
        document.getElementById("ie_rg").placeholder = 'RG';
        document.getElementById("ie_rg").maxLength = 12;
    }else{
        document.getElementById("lbl-cnpjcpf").innerHTML = 'CNPJ';
        document.getElementById("lbl-ierg").innerHTML = 'Inscrição Estadual';
        document.getElementById("cnpj_cpf").placeholder = 'CNPJ';
        document.getElementById("cnpj_cpf").maxLength = 18;
        document.getElementById("ie_rg").placeholder = 'Inscrição Estadual';
        document.getElementById("ie_rg").maxLength = 15;
    }
}

function maskCnpjCpf(o)
{
    if (document.getElementById("type").value == 'F'){
        mask(o,mcpf);
    }else{
        mask(o,mcnpj);
    }
}

function maskIERG(o) {
    if (document.getElementById("type").value == 'F'){
        mask(o,mrg);
    }else{
        mask(o,mie);
    }
}
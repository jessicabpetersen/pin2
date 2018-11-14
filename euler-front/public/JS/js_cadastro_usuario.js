$(document).ready(function() {
   $('#cep').attr('title', 'Campo destinado ao CEP EX: 00000-000');
   $('#rg').attr('title', 'Campo destinado ao RG EX: 00 000 000-0');
   $('#data_nascimento').attr('title', 'Campo destinado a data do seu nascimento EX: 00/00/0000');
   $('#cpf').attr('title', 'Campo destinado ao CPF EX: 000.000.000-00');
   $('#logradouro').attr('title', 'Campo destinado ao seu endereço EX: Rua exemplo ');
   $('#numero').attr('title', 'Campo endereço, destinado ao numero da sua residencia EX: 000 ');
   $('#bairro').attr('title', 'Campo endereço, destinado ao nome do seu bairro');
   $('#cidade').attr('title', 'Campo endereço,destinado ao nome da sua cidade');
   $('#uf').attr('title', 'Campo endereço, destinado a sigla do seu estado');
   $('#email').attr('title', 'Campo destinado ao seu correio eletrônico');
   $('#telefone').attr('title', 'Campo destinado ao seu telefone EX: (00) 0000-0000');
   $('#celular').attr('title', 'Campo destinado ao seu telefone EX: (00) 0000-0000');
   $('#matricula').attr('title', 'Campo destinado ao seu telefone EX: 0000000000');
});

function validaCadatro(data)
{
    let sNome = $('#nome').val();
    let sCpf = $('#cpf').val();
    let iRg = $('#rg').val();
    let dDataNasc = $('#data-nascimento').val();
    let sLograd = $('#logradouro').val();
    let iNumero = $('#numero').val();
    let sBairro = $('#bairro').val();
    let sCep = $('#cep').val();
    let sCidade = $('#cidade').val();
    let sUf = $('#uf').val();
    let sEmail = $('#email').val();
    let sFone = $('#telefone').val();
    let sCelular = $('#celular').val();
    let sMatricula = $('#matricula').val();
    
//    let data = new Date();
    console.log(data);
//    if(dDataNasc > )
//    {
//        
//    }
    
}
//$("input").keydown(function(event){ 
//    $("div").html("Key: " + event.which);
//});


function provarProFarahQueEuSeiUsarMetodo(msg)
{
    let sCpf = $('#cpf').val();
    $.ajax(
    {
        url : "/pin2-master/euler-front/model/ModelCadastroUsuario.php",
        type : 'POST',
        dataType: 'html', // json
        data : 
        {
             req : 'getCpf',
             cpf : sCpf
        }
    })
    .done(function(aRes)
    {
        if(aRes == 0) {
            alert('Ele ta preso, Babaca');
//            location.href='/pin2-master/euler-front/login?cpf='+sCpf;
            $('#cpf').val('');
        }
    });
}
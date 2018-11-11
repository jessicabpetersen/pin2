$(document).ready(function(){
   $('#cep').attr('title', 'Campo destinado ao CEP EX: 00000-000');
});

function validaCadatro(data)
{
    let sNome = $('#nome').val();
    let sCpf = $('#cpf').val();
    let iRg = $('#rg').val();
    let dDataNasc = $('#data-nascimento').val();
    let sLograd = $('#logradouro').val();
    let iNumero = $('#numero').val();
    let sBairro = $('#biarro').val();
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
        type : 'GET',
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
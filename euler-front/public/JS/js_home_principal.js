$(document).ready(function(){
   preencheCampo(); 
});

function preencheCampo()
{
    $.ajax({
        url : "/pin2-master/euler-front/model/ModelHomePrincipal.php",
        type : 'POST',
        dataType: 'html', // json
        data : 
        {
             req : 'preencheCampos'
        }
    })
    .done(function(aRes)
    {
        if(aRes) {
            aRes = JSON.parse(aRes);
            document.getElementById('labelnome').innerHTML = aRes.nome;
            document.getElementById('labelcpf').innerHTML = aRes.cpf;
            document.getElementById('labelrg').innerHTML = aRes.rg;
            document.getElementById('labeldatanascimento').innerHTML = aRes.datanascimento;
            document.getElementById('labalogradouro').innerHTML = aRes.logradouro;
            document.getElementById('labelnumero').innerHTML = aRes.numero;
            document.getElementById('labelbairro').innerHTML = aRes.bairro;
            document.getElementById('labelcep').innerHTML = aRes.cep;
            document.getElementById('labelcidade').innerHTML = aRes.cidade;
            document.getElementById('labeluf').innerHTML = aRes.uf;
            document.getElementById('labelemail').innerHTML = aRes.email;
            document.getElementById('labeltelefone').innerHTML = aRes.telefone;
            document.getElementById('labelcelular').innerHTML = aRes.celular;
        }
    });
}
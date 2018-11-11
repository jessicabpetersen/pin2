//$(document).ready(function(){
//   let sCpf = '<?= $_GET["cpf"]; ?>';
//   $('#login').val(sCpf); 
//});

function validaLogin()
{
    let sLogin = $('#login').val();
    let sSenha = $('#senha').val();
    
    $.ajax(
    {
        url : "/pin2-master/euler-front/controller/ControllerLogin.php",
        type : 'get',
        dataType: 'html', // json
        data : 
        {
             req : 'getLoginUsuario',
             login: sLogin,
             senha: sSenha
        }
    })
    .done(function(aRes)
    {
        if(aRes.sucesso === 1)
        {
            location.href='';
        }
        else
        {
            $('#login').val('');
            $('#senha').val('');
            alert('Login e Senha incorretos');
        }
    });
}


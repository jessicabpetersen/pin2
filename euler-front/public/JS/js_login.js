
function validaLogin()
{
    let sLogin = $('#login').val();
    let sSenha = $('#senha').val();
    
    $.ajax(
    {
        url : "/pin2-master/euler-front/model/ModelLogin.php",
        type : 'POST',
        assync: false,
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
        if(aRes == 1)
        {
            location.href='http://localhost/pin2-master/euler-front/home';
        }
        else
        {
            
            $('#login').val('');
            $('#senha').val('');
            alert('Login e Senha incorretos');
        }
    });
    
}


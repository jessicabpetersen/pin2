
$(document).ready(function() {
   $('#ano').attr('title', 'Campo destinado ao ano de exercicio do estagio');
   $('#semestre').attr('title', 'Campo destinado ao semestre de inicio do estagio');
   $('#curso').attr('title', 'Campo destinado ao curso ');
   $('#local').attr('title', 'Nome da empresa  ');
   $('#horario-inicial').attr('title', 'Inicio do expediente  ');
   $('#horario-final').attr('title', 'Termino do expediente ');
   $('#supervisor').attr('title', 'Nome do avaliador de estagio');
   $('#cargo-supervisor').attr('title', 'Cargo do avaliador de estagio ');
   $('#objetivos').attr('title', 'O que se pretende com a realização desse estágio: incluir quantas linhas forem necessárias ');
   $('#atividades').attr('title', 'Relacionar as atividades /tarefas a serem desenvolvidas durante o estágio, para atingir os objetivos propostos: incluir quantas linhas forem necessárias ');
   $('#numero').attr('title', 'numero da ápolice de seguro');
   $('#valor').attr('title', 'Valor da Apolice de seguro ');
   $('#valor-bolsa').attr('title', 'Salario que o estagiario ira receber');
   $('#vale-transporte').attr('title', 'Valor do vale transporte ');
   $('#check-nao-obrigatorio').attr('title', ' ');
   $('#check-obrigatorio').attr('title', ' ');
   $('#seguradora').attr('title', 'Nome da empresa seguradora ');
    checarEstagio();
});


function desabilitapolice() {
        $.ajax({
            url: "/pin2-master/euler-front/model/ModelCadastroEstagio.php",
            type: 'POST',
            dataType: 'JSON', // json
            data:
                {
                    req: 'getApolice'
                }
        })
            .done(function (aRes) {
                console.log(aRes);
                if (aRes) {
                    $('#numero').val(aRes.numero);
                    $('#valor').val(aRes.val);
                    $('#seguradora').val(aRes.seg);
                }
            });

        var numero = document.getElementById('numero'),
            valor = document.getElementById('valor'),
            seguradora = document.getElementById('seguradora');

        numero.disabled = true;
        valor.disabled = true;
        seguradora.disabled = true;
}

function habilitapolice(){
     var numero          = document.getElementById('numero'),
        valor           = document.getElementById('valor'),
        seguradora      = document.getElementById('seguradora');

    numero.disabled = false;
    valor.disabled = false;
    seguradora.disabled = false;

    numero.value = '';
    valor.value = '';
    seguradora.value = '';
}
function checarEstagio(){

    $.ajax({
        url : "/pin2-master/euler-front/model/ModelCadastroEstagio.php",
        type : 'POST',
        dataType: 'html', // json
        data :
            {
                req : 'checarEstagio'
            }
    })
        .done(function(aRes)
        {
            if (aRes== 0) {
                alert("Ja existe um estagio cadastrado nao finalizado ");
                location.href = 'http://localhost/pin2-master/euler-front/home';

            }
        });
}
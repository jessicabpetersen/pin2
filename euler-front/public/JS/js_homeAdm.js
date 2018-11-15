$(document).ready(function() {
   $('#seguradora').attr('title', 'Nome da empresa seguradora ');
   $('#Curso').attr('title', 'Campo destinado ao curso ');
   $('#Atividade').attr('title', 'Relacionar as atividades /tarefas a serem desenvolvidas durante o estágio, para atingir os objetivos propostos: incluir quantas linhas forem necessárias ');
   $('#nApolice').attr('title', 'Numero da ápolice de seguro');
   $('#professorOrientador').attr('title', 'Nome do professor que ira auxiliar o estagiario');
   
   carregaEstagios();
});

function Mudarestado(el) {
  var display = document.getElementById(el).style.display;
  if (display === "none")
    document.getElementById(el).style.display = 'block';
  else
    document.getElementById(el).style.display = 'none';
}

function carregaEstagios()
{
    $.ajax({
        url : "/pin2-master/euler-front/model/ModelCadastroHomeAdm.php",
        type : 'POST',
        dataType: 'html', // json
        data : 
        {
             req : 'selectEstagio'
        }
    })
    .done(function(aRes)
    {
        if(aRes) {
            document.getElementById('teste').innerHTML = aRes;
        }
    });
}

function salvaEstagios() {
    let linhas = [];
    $('#finalizado').each(function () {
        if($(this).prop('disabled') == false && $(this).prop('checked') == true) {
            linhas.push(this.value);
        }        
    });
    
    $.ajax({
        url : "/pin2-master/euler-front/model/ModelCadastroHomeAdm.php",
        type : 'POST',
        dataType: 'html', // json
        data : 
        {
            req : 'finalizados',
            linhas : linhas
        }
    });
}

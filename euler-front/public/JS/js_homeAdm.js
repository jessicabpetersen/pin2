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

function salvarApoplice()
{
    let iApolice = $('#nApolice').val();
    let xValor   = $('#valorApolice').val();
    let sSegura  = $('#seguradora').val();
    
    $.ajax({
        url : "/pin2-master/euler-front/model/ModelCadastroHomeAdm.php",
        type : 'POST',
        dataType: 'html', // json
        data : 
        {
            req : 'insertApolice',
            nApolice: iApolice,
            valorApolice : xValor,
            seguradora : sSegura
        }
    })
    .done(function(aRes)
    {
        if(aRes == 1) {
            $('#nApolice').val('');
            $('#valorApolice').val('');
            $('#seguradora').val('');
            $('#divCadastroApolice').hide();
        }
    });
}

function salvarArea()
{
    let iCurso = $('#curso').val();
    let sArea  = $('#Area').val();
    let sAtiv  = $('#Atividade').val();

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

            req : 'insertArea',
            Area: sArea,
            Atividade : sAtiv,
            curso : iCurso
        }
    })
    .done(function(aRes)
    {
        if(aRes == 1) {
            $('#curso').val('0');
            $('#Area').val('');
            $('#Atividade').val('');
        }
    });
}

function salvarOrientador()
{
    let sSupervisor = $('#professorOrientador').val();
    
    $.ajax({
        url : "/pin2-master/euler-front/model/ModelCadastroHomeAdm.php",
        type : 'POST',
        dataType: 'html', // json
        data : 
        {
            req : 'updateOrientador',
            supervisor: sSupervisor
        }
    })
    .done(function(aRes)
    {
        if(aRes == 1) {
            $('#professorOrientador').val('');
            $('#divCadastroOrientador').hide();
        }
    });
}

            req : 'finalizados',
            linhas : linhas
        }
    });
}


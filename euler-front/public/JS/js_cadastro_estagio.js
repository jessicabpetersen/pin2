
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
});

let bParada = 0;

function adicionaCampos()
{
    if(bParada < 2) {
        let hidden = document.createElement('input');
        hidden.setAttribute('type', 'hidden');
        hidden.setAttribute('id', 'turno_' + bParada);
        
        let clone = document.getElementById('tobecloned').cloneNode(true),
        destino = document.getElementById('destino');
        
        destino.appendChild(clone);
        
        let campos = clone.getElementsByTagName('input');
        for(let i in campos) {
            campos[i].value = '';
        }
        destino.appendChild(hidden);
//        let teste = $('[id=turno_]');
////        console.log(teste);
//        for(let y in teste) {
//            $('[id=turno_]').prop('id', 'turno_' + bParada);
//        } 
//        let x = $('#turno').val();;
//        alert(x);
        bParada++;
     }
}

function removeCampos()
{
    let destino = document.getElementById('destino');
    destino.removeChild(destino.childNodes[bParada - 1]);
    bParada--;
}


function desabilitapolice(){
    var numero          = document.getElementById('numero'),
        valor           = document.getElementById('valor'),
        seguradora      = document.getElementById('seguradora');

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
}
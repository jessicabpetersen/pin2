 
 $(document).ready(function(){
    $('.cpf').mask('000.000.000-00'); 
    $('.number').mask('00000000');
    $('.matricula').mask('0000000000');
     $('.cep').mask('00000-000');
     $('.uf').mask('SS');
     $('.telefone').mask('(00) 0000-0000');
     $('.celular').mask('(00) 00000-0000');
     $('.rg').mask('');
 });
 
 function so_numero(num , er)
 {
    er.lastIndex = 0;
    let campo = num;
    if(er.test(campo.value))
    {
      campo.value = "";
    }
}

function mascara(t, mask)
{
    let i = t.value.length;
    let saida = mask.substring(1,0);
    let texto = mask.substring(i)
    if (texto.substring(0,1) != saida)
    {
       t.value += texto.substring(0,1);
    }
 }
 
 function so_letras(campo)
 {
    let filter = /^([a-zA-Zà-úÀ-Ú]|\s+)+$/;
//    let cant = /[^0-9]/;
    let valor = campo;
    let size = valor.value.length;
    let aux = '';
    for (var i in valor.value) {
        if(filter.test(i))
        {
            aux += i;
        }
    }
    valor.value = aux;
//    if(!filter.test(valor.value)) {
//        let aux = valor.value;
//        valor.value = valor.value.replace(aux.substring(size - 1, 1), "");
//          
//        return false;
//    } else {
//        return true;
//    }
    
}


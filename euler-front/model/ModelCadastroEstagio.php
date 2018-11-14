<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once 'conectar.php';

$conexao = Conectar();

                            




//$insertCurso = "INSERT INTO curso (
//                            nome
//                            ) VALUES (
//                            '{$sNome}' );";
//                            
//exec_sql($bErro, $insertCurso, $conexao);
//
//$insertInst = "INSERT INTO instituicao (
//                           nome_supervisor,
//                           id_coordenador,
//                           id_apolice
//                           ) VALUES (
//                           '{$sNome_super}',
//                           {$iCoordenador},
//                           {$iApolice} );";
//                            
//exec_sql($bErro, $insertInst, $conexao);
//
///* insert periodo precisa repetir o mesmo id para o número de periodos que forem informados a pk é composta
// * apesar de ñ constar na tabela
//*/
$sql = "SELECT MAX(id_periodo) FROM periodo";

$ret = pg_query($conexao, $sql);

while($row = pg_fetch_row($ret)) {
    $iCodPeriodo = $row;
}
$iCodPeriodo = $iCodPeriodo[0] + 1;

$aTurno = $_POST['turno'];
//fim new cod, P.S. usar o mesmo o num de vezes max(3) q forem informados periodos
foreach($aTurno as $value => $key) {
    echo $key;
//    $insertPeri = "INSERT INTO periodo (
//                               id_periodo
//                               turno,
//                               inicio,
//                               termino
//                               ) VALUES (
//                               {$iCodPeriodo},
//                               {$iTipoTurno},
//                               '{$sInicio}',
//                               '{$sFim}' );";
//
//    exec_sql($bErro, $insertPeri, $conexao);
}

//$bObrigatorio = ($_POST['check-obrigatorio']) ? 1 : 2;
//$sObjetivo = ($_POST['objetivos']);
//$sDescricao = ($_POST['descricao']);
//$sLocal_est = ($_POST['local']);
//$sSupervisor = ($_POST['supervisor']);
//$sCargo_supervisor = ($_POST['cargo-supervisor']);
//$iAno = ($_POST['ano']);
//$iSemestre = ($_POST['semestre']);
//$sValor_bolsa = ($_POST['valor-bolsa']);
//$sValor_vale = ($_POST['vale-transporte']);
//$iArea = ($_POST['area']);
//
//
//$insertEsta = "INSERT INTO estagio (
//                           obrigatorio
//                           objetivo,
//                           descricao,
//                           local_estagio,
//                           supervisor,
//                           cargo_supervisor,
//                           nome_coordenador,
//                           ano,
//                           semestre,
//                           valor_bolsa,
//                           valor_vale,
//                           id_area,
//                           id_apolice,
//                           id_periodo,
//                           id_aluno,
//                           id_instituicao,
//                           id_concendente,
//                           id_curso
//                           ) VALUES (
//                           {$bObrigatorio},
//                           '{$sObjetivo}',
//                           '{$sDescricao}',
//                           '{$sLocal_est}',
//                           '{$sSupervisor}',
//                           '{$sCargo_supervisor}',
//                           '{$sNome_coordenador}',
//                           {$iAno},
//                           {$iSemestre},
//                           '{$sValor_bolsa}',
//                           '{$sValor_vale}',
//                           {$iArea},
//                           {$iApolice},
//                           {$iCodPeriodo},
//                           {$iAluno},
//                           {$iInstituicao},
//                           {$iConcedente},
//                           {$iCurso} ); ";
//  
//exec_sql($bErro, $insertEsta, $conexao);
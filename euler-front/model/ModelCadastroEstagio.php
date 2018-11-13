<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once 'conectar.php';

 $conexao = Conectar();
$iNumApoli = $_POST[''];
$insertApoli = "INSERT INTO apolice (
                            numero,
                            seguradora,
                            valor
                            ) VALUES (
                            {$iNumApoli},
                            '{$sSeguradora}',
                            '{$sValor}' ); ";
                            
exec_sql($bErro, $insertApoli, $conexao);

$insertArea = "INSERT INTO area (
                           nome,
                           atividade,
                           id_curso
                           ) VALUES (
                           '{$sNome}',
                           '{$sAtividade}',
                           {$iCurso} );";
                            
exec_sql($bErro, $insertArea, $conexao);

$insertCurso = "INSERT INTO curso (
                            nome
                            ) VALUES (
                            '{$sNome}' );";
                            
exec_sql($bErro, $insertCurso, $conexao);

$insertInst = "INSERT INTO instituicao (
                           nome_supervisor,
                           id_coordenador,
                           id_apolice
                           ) VALUES (
                           '{$sNome_super}',
                           {$iCoordenador},
                           {$iApolice} );";
                            
exec_sql($bErro, $insertInst, $conexao);
/* insert periodo precisa repetir o mesmo id para o número de periodos que forem informados a pk é composta
 * apesar de ñ constar na tabela
*/
$sql = "SELECT MAX(id_periodo) FROM periodo";

$ret = pg_query($conexao, $sql);

while($row = pg_fetch_row($ret)) {
    $iCodPeriodo = $row;
}
$iCodPeriodo = $iCodPeriodo[0] + 1;
//fim new cod, P.S. usar o mesmo o num de vezes max(3) q forem informados periodos
$insertPeri = "INSERT INTO periodo (
                           id_periodo
                           turno,
                           inicio,
                           termino
                           ) VALUES (
                           {$iCodPeriodo},
                           {$iTipoTurno},
                           '{$sInicio}',
                           '{$sFim}' );";
                            
exec_sql($bErro, $insertPeri, $conexao);

$insertEsta = "INSERT INTO estagio (
                           obrigatorio
                           objetivo,
                           descricao,
                           local_estagio,
                           supervisor,
                           cargo_supervisor,
                           nome_coordenador,
                           ano,
                           semestre,
                           valor_bolsa,
                           valor_vale,
                           id_area,
                           id_apolice,
                           id_periodo,
                           id_aluno,
                           id_instituicao,
                           id_concendente,
                           id_curso
                           ) VALUES (
                           {$bObrigatorio},
                           '{$sObjetivo}',
                           '{$sDescricao}',
                           '{$sLocal_est}',
                           '{$sSupervisor}',
                           '{$sCargo_supervisor}',
                           '{$sNome_coordenador}',
                           {$iAno},
                           {$iSemestre},
                           '{$sValor_bolsa}',
                           '{$sValor_vale}',
                           {$iArea},
                           {$iApolice},
                           {$iPeriodo},
                           {$iAluno},
                           {$iInstituicao},
                           {$iConcedente},
                           {$iCurso} ); ";
  
exec_sql($bErro, $insertEsta, $conexao);
<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once 'conectar.php';

$conexao = Conectar();

$sql = "SELECT MAX(id_periodo) FROM periodo";

//$ret = pg_query($conexao, $sql);;
//
//while($row = pg_fetch_row($ret)) {
//    $iCodPeriodo = $row;
//}
//$iCodPeriodo = $iCodPeriodo[0] + 1;
//
//$aTurno = $_POST['turno'];
////fim new cod, P.S. usar o mesmo o num de vezes max(3) q forem informados periodos
//foreach($aTurno as $value => $key) {
//    echo $key;
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
//}

$bObrigatorio = isset($_POST['check-obrigatorio']) ? 1 : 2;
$sObjetivo = isset($_POST['objetivos']) ? $_POST['objetivos'] : null;
$sDescricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
$sLocal_est = isset($_POST['local']) ? $_POST['local'] : null;
$sSupervisor = isset($_POST['supervisor']) ? $_POST['supervisor'] : null;
$sCargo_supervisor = isset($_POST['cargo-supervisor']) ? $_POST['cargo-supervisor'] : null;
$iAno = isset($_POST['ano']) ? $_POST['ano'] : null;
$iSemestre = isset($_POST['semestre']) ? $_POST['semestre'] : null;
$sValor_bolsa = isset($_POST['valor-bolsa']) ? $_POST['valor-bolsa'] : null;
$sValor_vale = isset($_POST['vale-transporte']) ? $_POST['vale-transporte'] : null;
$iArea = isset($_POST['area']) ? $_POST['area'] : null;
$iCurso = isset($_POST['curso']) ? $_POST['curso'] : null;

$iApolice = getIDApolice($bObrigatorio);

$SQL = "SELECT nome_supervisor FROM instituicao limit 1";
$query = pg_query($conexao, $SQL);
$oRes = pg_fetch_row($query);
$sNome_coordenador = $oRes[0];

$SQL = "SELECT id_instituicao FROM instituicao limit 1";
$query = pg_query($conexao, $SQL);
$oRes = pg_fetch_row($query);
$iInstituicao = $oRes[0];

$iAluno = isset($_SESSION["codusuario"]) ? $_SESSION["codusuario"] : 1;


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
                           {$iAluno},
                           {$iInstituicao},
                           {$iConcedente},
                           {$iCurso} ); ";
  
exec_sql($bErro, $insertEsta, $conexao);

function getIDApolice($bObrigatorio) {
    global $conexao;
    if($bObrigatorio == 1) {
        $sql = "SELECT id_apolice FROM instituicao limit 1";
        $query = pg_query($conexao, $sql);
        $oRes = pg_fetch_row($query);
        return $oRes[0];
    }else {
        $numero = isset($_POST["numero"]) ? $_POST["numero"] : null;
        $valor = isset($_POST["valor"]) ? $_POST["valor"] : null;
        $seguradora = isset($_POST["seguradora"]) ? $_POST["seguradora"] : null;
        $sqlid = "select coalesce(max(id_apolice),0)+1 from apolice";
        $query = pg_query($conexao, $sqlid);
        $id = pg_fetch_row($query)[0];
        $sql = "insert into apolice values($1,$2,$3,$4)";
        $query = pg_query_params($conexao, $sql, [$id,$numero, $seguradora, $valor]);
        pg_fetch_row($query);
        return $id;
    }
}
//header("location: http://localhost/pin2-master/euler-front/home");;
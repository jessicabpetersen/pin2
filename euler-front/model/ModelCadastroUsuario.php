<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once 'conectar.php';

 $conexao = Conectar();

if(isset($_POST['req']) && $_POST['req'] == 'getCpf') {
    $sCpf = $_GET['cpf'];
    $ret = "";

    $select = "SELECT cpf FROM pessoa where cpf = '{$sCpf}' ";
    
    $qry = pg_query($conexao, $select);
    
    if(pg_num_rows($qry) == 1) {
       $ret = 0;
    }
    else {
        $ret = 1;
    }
    echo $ret;
    exit;
}

$bErro = false;

$sLograd = $_POST['logradouro'];
$iNumero = $_POST['numero'];
$sBairro = $_POST['bairro'];
$sCep = $_POST['cep'];
$sCidade = $_POST['cidade'];
$sUf = $_POST['uf'];

$sNome = $_POST['nome'];
$sCpf = $_POST['cpf'];
$iRg = $_POST['rg'];
$dDataNasc = $_POST['data_nascimento'];
$sEmail = $_POST['email'];
$sTelefone = $_POST['telefone'];
$sCelular = $_POST['celular'];
$iMatricula = $_POST['matricula'];

$sSenha = md5($_POST['senha']);
//$iTipoUsu = $_POST['tipo_usu'];

$insert = "INSERT INTO endereco (
                       logradouro,
                       numero,
                       bairro,
                       cidade,
                       cep,
                       uf
                       ) VALUES (
                       '{$sLograd}',
                       {$iNumero},
                       '{$sBairro}',
                       '{$sCidade}',
                       '{$sCep}',
                       '{$sUf}'); ";

exec_sql($bErro, $insert, $conexao);

$sql = "SELECT MAX(id_endereco) FROM endereco";

$ret = pg_query($conexao, $sql);
$iCodEnd;

while($row = pg_fetch_row($ret)) {
    $iCodEnd = $row;
}
$iCodEnd = $iCodEnd[0];

$ins = "INSERT INTO pessoa (
                    nome,
                    cpf,
                    rg,
                    datanascimento,
                    email,
                    telefone,
                    celular,
                    matricula,
                    id_endereco
                    ) VALUES (
                    '{$sNome}',
                    '{$sCpf}',
                    '{$iRg}',
                    '{$dDataNasc}',
                    '{$sEmail}',
                    '{$sTelefone}',
                    '{$sCelular}',
                    '{$iMatricula}',
                    {$iCodEnd} ); ";

exec_sql($bErro, $ins, $conexao);

$sql = "SELECT MAX(id_pessoa) FROM pessoa";

$ret = pg_query($conexao, $sql);
$iCodPes;

while($row = pg_fetch_row($ret)) {
    $iCodPes = $row;
}
$iCodPes = $iCodPes[0];

$insert = "INSERT INTO usuario(
                       senha,
                       id_pessoa,
                       tipo_usuario 
                       ) VALUES (
                       '{$sSenha}',
                       {$iCodPes},
                       0 ); ";

exec_sql($bErro, $insert, $conexao);

if(!$bErro) {
    commit($conexao);
    $_SESSION['codusuario'] = $iCodPes;
    header("location: http://localhost/pin2-master/euler-front/home");
}
else {
    rollback($conexao);
}

Desconectar($conexao);

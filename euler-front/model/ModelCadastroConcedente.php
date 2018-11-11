<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once 'conectar.php';

$sLograd = $_POST['logradouro'];
$iNumero = $_POST['numero'];
$sBairro = $_POST['bairro'];
$sCep = $_POST['cep'];
$sCidade = $_POST['cidade'];
$sUf = $_POST['uf'];

$sNomeRazao = $_POST['razao'];
$sCnpj = $_POST['cnpj'];
$sEmail = $_POST['email'];
$sTelefone = $_POST['telefone'];
$sRepresentante = $_POST['representante'];
$sCargo = $_POST['cargo_representante'];

$conexao = Conectar();

$insert = "INSERT INTO endereco (
                       logradouro,
                       numero,
                       bairro,
                       cidade,
                       cep,
                       uf
                       ) VALUES (
                       '{$sLograd}',
                       $iNumero,
                       '$sBairro',
                       '$sCep',
                       '$sCidade',
                       '$sUf'); ";
                       
$qry = pg_query($conexao, $insert);

$sql = "SELECT MAX(id_endereco) FROM endereco";

$ret = pg_query($conexao, $sql);
$iCodEnd;

while($row = pg_fetch_row($ret)) {
    $iCodEnd = $row;
}

$insertConc = "INSERT INTO concedente (
                           razao_social,
                           cnpj,
                           email,
                           telefone,
                           nome_representante,
                           cargo_representante,
                           id_endereco
                           ) VALUES (
                           '$sNomeRazao',
                           '$sCnpj',
                           '$sEmail',
                           '$sTelefone',
                           '$sRepresentante',
                           '$sCargo',
                           {$iCodEnd[0]} );";

$qry = pg_query($conexao, $insertConc);

Desconectar($conexao);
<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once 'conectar.php';

 $conexao = Conectar();

if($_GET['req'] == 'getCpf') {
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
}
else {
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

    $sql = "SELECT MAX(id_endereco) FROM endereco";

    $ret = pg_query($conexao, $sql);
    $iCodEnd;

    while($row = pg_fetch_row($ret)) {
        $iCodEnd = $row;
    }
    $iCodEnd = $iCodEnd[0] + 1;
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
                           '{$sCep}',
                           '{$sCidade}',
                           '{$sUf}'); 

                INSERT INTO pessoa (
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
                            {$iCodEnd} );";

    $qry = pg_query($conexao, $insert);


    if(!$qry){
        header('Location: http://localhost/pin2-master/euler-front/login');
    }

    Desconectar($conexao);
}
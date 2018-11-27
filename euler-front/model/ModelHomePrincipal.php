<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once 'conectar.php';

$conexao = Conectar();
if(isset($_POST['req']) && $_POST['req'] == 'preencheCampos') {
    
    $sql = " select nome,
                    cpf,
                    rg,
                    datanascimento,
                    email,
                    telefone,
                    celular,
                    matricula,
                    logradouro,
                    numero,
                    bairro,
                    cep,
                    cidade,
                    uf
             from pessoa
             join endereco using(id_endereco)
              
            where id_pessoa = {$_SESSION['codusuario']} ";

    $ret = pg_query($conexao, $sql);
    $aInfos = null;

    while($row = pg_fetch_row($ret)) {
        $aInfos['nome']           = $row[0];
        $aInfos['cpf']            = $row[1];
        $aInfos['rg']             = $row[2];
        $aInfos['datanascimento'] = $row[3];
        $aInfos['email']          = $row[4];
        $aInfos['telefone']       = $row[5];
        $aInfos['celular']        = $row[6];
        $aInfos['matricula']      = $row[7];
        $aInfos['logradouro']     = $row[8];
        $aInfos['numero']         = $row[9];
        $aInfos['bairro']         = $row[10];
        $aInfos['cep']            = $row[11];
        $aInfos['cidade']         = $row[12];
        $aInfos['uf']             = $row[13];
    }

    echo json_encode($aInfos);
}
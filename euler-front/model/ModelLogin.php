<?php

if (!isset($_SESSION)) {
    session_start();
}
require_once 'conectar.php';

$conexao = Conectar();

//if(isset($_POST['req']) && $_POST['req'] == 'getLoginUsuario') {
//    echo 'teste';
//    $ret['sucesso'] = 0;
    $sSenha = md5($_POST['senha']);
    
    $sql = " select senha,
                    cpf,
                    id_pessoa
               from usuario
               join pessoa using (id_pessoa)
              where cpf = '{$_POST['login']}'
                and senha = '{$sSenha}' ";

    $ret = pg_query($conexao, $sql);
    
    if(pg_num_rows($ret) > 0) {
        while($row = pg_fetch_row($ret)) {
            $iCod = $row[2];
        }
        
        $_SESSION['codusuario'] = $iCod;
        $ret['sucesso'] = 1;
        header("location:http://localhost/pin2-master/euler-front/home");
    }
    else {
        header("location:http://localhost/pin2-master/euler-front/login?errodelogin");

    }
//    echo json_encode($ret['sucesso']);
//    exit;
//}
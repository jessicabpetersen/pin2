<?php

if (!isset($_SESSION)) {
    session_start();
}
require_once 'conectar.php';

$conexao = Conectar();

if(isset($_POST['req']) && $_POST['req'] == 'getLoginUsuario') {
    
    $existe = 0;
    $sSenha = ($_POST['senha']);
    
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
        $existe = 1;
    }
    else {
        $existe = 0;
    }
    echo $existe;
}
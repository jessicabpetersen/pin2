<?php

function Conectar() {

    $str = "host=localhost port=5432 dbname=Heroku user=kamui password=qwe123";
    $conection = pg_connect($str);

    if (!$conection) {
        die('Erro de Conexão');
    } 
    else {
        return $conection;
    }
}

function Desconectar($Conn) {
    pg_close($Conn);
}

/**
 * 
 * @param Boolean $bErro sql executado com sucesso
 * @param String $sql string sql a ser executada
 * @param String $conexao pg_connect
 */
function exec_sql(&$bErro, $sql, $conexao) {
    $qry = pg_query($conexao, $sql);
    
    return $bErro = ($qry) ? false : true;
}

function commit($conexao){
    pg_query($conexao, 'commit');
}

function rollback($conexao){
    pg_query($conexao, 'rollback');
}
<?php

function Conectar() {

    $str = "host=ec2-107-20-227-192.compute-1.amazonaws.com port=5432 dbname=d9mk8p58k739ut user=xhjuhlktzhabez
            password=083e54a5ac006efa54ef70d1d8d194adab0328391929ffebe926e718ec1b9ad5";
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

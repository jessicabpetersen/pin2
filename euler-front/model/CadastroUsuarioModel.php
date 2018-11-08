<?php

include_once 'conectar.php';

$usu = $_POST['nome'];
$senha = md5($_POST['senha']);
$email = $_POST['email'];
$cidade = $_POST['cidade'];

$conection = Conectar();

if (!Conectar()) {
    die("Coneção falhou" . pg_errormessage($connection));
} else {
    echo "Conexão bem sucedida";
}
$query = "INSERT INTO site.tbusuario (usunome, ususenha, usuemail, usucidade) VALUES ('$usu', '$senha', '$email', '$cidade')";
$res = pg_query($conection, $query);

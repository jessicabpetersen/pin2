<?php
/**
 * Created by PhpStorm.
 * User: aparicio da silva
 * Date: 15/11/2018
 * Time: 16:06
 */
require_once('.\util\LatexTemplate.php');

try {
    LatexTemplate::download('.\Arquivos/','anexo4.tex', 'requerimento_de_orientacao.pdf');
} catch(Exception $e) {
    echo $e -> getMessage();
}

?>
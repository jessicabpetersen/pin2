<?php
/**
 * Created by PhpStorm.
 * User: aparicio da silva
 * Date: 15/11/2018
 * Time: 16:04
 */
require_once('.\util\LatexTemplate.php');

try {
LatexTemplate::download('.\Arquivos/','anexo3.tex', 'plano_de_atividades.pdf');
} catch(Exception $e) {
echo $e -> getMessage();
}

?>
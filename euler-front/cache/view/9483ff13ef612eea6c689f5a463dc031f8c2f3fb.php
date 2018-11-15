<?php
/**
 * Created by PhpStorm.
 * User: aparicio da silva
 * Date: 15/11/2018
 * Time: 16:02
 */

require_once('.\util\LatexTemplate.php');



try {
    LatexTemplate::download('.\Arquivos/','anexo2.tex', 'termo_de_compromisso.pdf');
} catch(Exception $e) {
    echo $e -> getMessage();
}

?>

<?php
use App\BaseController;
require_once(__DIR__.'/../app/BaseController.php');

class CadastroEstagioController extends BaseController{
    private $res;
    
    public function index(){
        $this->res = $this->buscaArea();
        echo $this->view->render('cadastro-estagio', ['areas' => $this->res]);
    }
    
    public function buscaArea() {
        require_once 'model/conectar.php';
        $aArea = null;
        $conexao = Conectar();
        
        $sql = "SELECT id_area, nome FROM area";

        $ret = pg_query($conexao, $sql);
        $i = 0;
        while($row = pg_fetch_row($ret)) {
            $aArea[$i]['id'] = $row[0];
            $aArea[$i]['nome'] = $row[1];
            $i++;
        }
        return $aArea;
    }
}
<?php
use App\BaseController;
require_once(__DIR__.'/../app/BaseController.php');

class CadastroEstagioController extends BaseController{
    private $res;
    private $curso;
    
    public function index(){
        $this->res = $this->buscaArea();
        $this->curso = $this->buscaCurso();
        echo $this->view->render('cadastro-estagio', ['areas' => $this->res, 'cursos' => $this->curso]);
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
    
    public function buscaCurso() {
        require_once 'model/conectar.php';
        $aCurso = null;
        $conexao = Conectar();
        
        $sql = "SELECT id_curso, nome FROM curso";

        $ret = pg_query($conexao, $sql);
        $i = 0;
        while($row = pg_fetch_row($ret)) {
            $aCurso[$i]['id'] = $row[0];
            $aCurso[$i]['nome'] = $row[1];
            $i++;
        }
        return $aCurso;
    }
}
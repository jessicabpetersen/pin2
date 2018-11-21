<?php
use App\BaseController;
require_once(__DIR__.'/../app/BaseController.php');

class CadastroEstagioController extends BaseController{
    private $res;
    private $curso;
    private $concedente;
    
    public function index(){
        $this->res = $this->buscaArea();
        $this->curso = $this->buscaCurso();
        $this->concedente = $this->buscaConcedente();
        echo $this->view->render('cadastro-estagio', ['areas' => $this->res, 'cursos' => $this->curso, 'concedente' => $this->concedente]);
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
    
    public function buscaConcedente() {
        require_once 'model/conectar.php';
        $aConcedente = null;
        $conexao = Conectar();
        
        $sql = "SELECT id_concedente, razao_social FROM concedente";

        $ret = pg_query($conexao, $sql);
        $i = 0;
        while($row = pg_fetch_row($ret)) {
            $aConcedente[$i]['id'] = $row[0];
            $aConcedente[$i]['nome'] = $row[1];
            $i++;
        }
        return $aConcedente;
    }
}
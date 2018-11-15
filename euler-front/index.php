<?php
require_once(__DIR__.'/vendor/autoload.php');
//require_once('app/App.php');
require_once('app/Router.php');

use App\Router;

//$app = new App();
$router = new Router();

$router
    ->get('/home', function () {
        require_once('controller/HomeController.php');

        $oController = new HomeController();
        $oController->index();
    })
    ->get('/homeAdm', function () {
        require_once('controller/HomeAdmController.php');

        $oController = new HomeAdmController();
        $oController->index();
    })
    ->get('/login', function () {
        require_once('controller/LoginController.php');

        $oController = new LoginController();
        $oController->index();
    })
    ->get('/cadastro-usuario', function () {
        require_once('controller/CadastroUsuarioController.php');

        $oController = new CadastroUsuarioController();
        $oController->index();
    })
    ->get('/cadastro-coordenador', function () {
        require_once('controller/CadastroCoordenadorController.php');

        $oController = new CadastroCoordenadorController();
        $oController->index();
    })
    ->get('/cadastro-concedente', function () {
        require_once('controller/CadastroConcedenteController.php');

        $oController = new CadastroConcedenteController();
        $oController->index();
    })
    ->get('/cadastro-estagio', function () {
        require_once('controller/CadastroEstagioController.php');

        $oController = new CadastroEstagioController();
        $oController->index();
    })
    ->get('/gerar-relatorios', function () {
        require_once('controller/GerarRelatoriosController.php');

        $oController = new GerarRelatoriosController();
        $oController->index();
    })
    ->get('/termo-de-compromisso', function () {
        require_once('controller/termodeCompromissoController.php');

        $oController = new termodeCompromissoControll();
        $oController->index();
    })
    ->get('/plano_de_atividades', function () {
        require_once('controller/planodeAtividadesController.php');

        $oController = new planodeAtividadesController();
        $oController->index();
    })
    ->get('/requerimento_de_orientacao', function () {
        require_once('controller/requerimentodeOrientacaoController.php');

        $oController = new requerimentodeOrientacaoController();
        $oController->index();
    })
    /*->on('GET', 'path/to/action', function () {
        return 'this is a hero return';
    })
    ->post('/(\w+)/(\w+)/(\w+)', function ($module, $class, $method) {
        var_dump([$module, $class, $method]);
    })
    ->get('/view/(\w+)', function ($view) {
        ob_start();
        require dirname(__DIR__) . "/view/{$view}.php";
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    })
    ->get('/(.*)', function ($uri) {
        var_dump($uri);
    })*/;
echo $router($router->method(), $router->uri());
?>

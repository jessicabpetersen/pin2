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
    ->get('/cadastro-concedente', function () {
        require_once('controller/CadastroConcedenteController.php');

        $oController = new CadastroConcedenteController();
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

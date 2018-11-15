
<?php
/**
 * Created by PhpStorm.
 * User: aparicio da silva
 * Date: 14/11/2018
 * Time: 16:27
 */

use App\BaseController;

require_once(__DIR__.'/../app/BaseController.php');

class termodeCompromissoControll extends BaseController{
    public function index(){
        echo $this->view->render('termo-de-compromisso');
    }
}
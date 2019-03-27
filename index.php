<?php

use App\Controllers\Errors\E404;
use App\Controllers\Errors\EDb;
use App\Errors\Exception404;
use App\Errors\ExceptionDb;
use App\Router;

require __DIR__ . '/config/lib.php';
require __DIR__ . '/App/autoload.php';

$controllerName = '\\' .  Router::processRoute( parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) );
$controller = new $controllerName;

if($controller){

    try{

        $controller();

    }catch(ExceptionDb $e){
        $erController = new EDb();
        $erController();
    }catch(Exception404 $er){
        $erController = new E404();
        $erController();
    }

}else{
    die('Не найден контроллер');
}

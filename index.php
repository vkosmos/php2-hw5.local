<?php

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
        echo $e->getLine();
        echo $e->getMessage();
    }catch(\App\Errors\Exception404 $er){
        echo $er->getLine();
        echo $er->getMessage();
    }

}else{
    die('Не найден контроллер');
}

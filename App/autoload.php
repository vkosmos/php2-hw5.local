<?php

function __autoload($class)
{
    $file = str_replace('\\', '/', $class) . '.php';

    $file = __DIR__ . '/../' .$file;

    if (is_file($file)){
        require $file;
    }else{
        $e = new \App\Errors\Exception404('Запрашивая страница не существует.');
        $e->time = time();
        throw $e;
    }


}

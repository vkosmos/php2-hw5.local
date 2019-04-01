<?php

function __autoload($class)
{
    $file = str_replace('\\', '/', $class) . '.php';
    $file = __DIR__ . '/../' .$file;

    if (file_exists($file)){
        include $file;
    }

}

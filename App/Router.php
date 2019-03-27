<?php

namespace App;

class Router
{
    /**
     * Вычисляет имя контроллера, исходя из запрошенного адреса (без GET-параметров)
     * @param $route string
     * @return string
     */
    public static function processRoute($route)
    {
        $route = mb_strtolower($route);
        $routeAr = explode('/', $route);

        $controllerAr = [];
        foreach ($routeAr as $item){
            if ('' != $item){
                $controllerAr[] = $item;
            }
        }

        //Проверка для главной страницы пользовательской части
        if (0 == count($controllerAr)){
            $controllerAr[] = 'Index';
        }

        //Проверка для главной страницы админки
        if ('admin' == $controllerAr[count($controllerAr) - 1]){
            $controllerAr[] = 'Index';
        }

        $controllerName = 'App\\Controllers';
        foreach ($controllerAr as $item){
            $controllerName .= '\\' . ucfirst($item);
        }

        return $controllerName;
    }
}
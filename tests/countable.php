<?php

include __DIR__ . '/../App/autoload.php';

use App\View;

$view = new View();

$view->users = \App\Models\User::findAll();
$view->number = 15;
$view->title = 'Нечто считаемое';
$view->abort = 'Да хватит уже!';
$view->news = \App\Models\Article::findN(4);

echo 'Считаем объект <b>view</b>: <b>' . count($view) . '</b>';


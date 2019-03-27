<?php

include __DIR__ . '/../App/autoload.php';

use App\View;

$view = new View();

$view->users = \App\Models\User::findAll();
$view->number = 15;
$view->title = 'Нечто считаемое';
$view->abort = 'Да хватит уже!';
$view->news = \App\Models\Article::findN(4);
$view->real = 15.668;

?>
<h3>Вот, что у нас лежит в объекте класса View:</h3>
<?php


foreach ($view as $key => $value) {

    echo $key . ', ' . gettype($value) . ': ' . $value;
    echo "<br>";

}

<?php

use App\Models\Article;
use App\View;

require __DIR__ . '/../App/autoload.php';

$view = new View();
$view->news = Article::findAll();
$view->display( __DIR__ . '/../templates/admin/index.php' );
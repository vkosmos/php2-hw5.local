<?php

use App\Models\Author;

include __DIR__ . '/../App/autoload.php';

if ('POST' === $_SERVER['REQUEST_METHOD']){

    $article = new \App\Models\Article();
    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->author_id = (0 === (int)$_POST['author']) ? null : $_POST['author'];
    $article->save();

    header('Location: ' . '/admin/');
}

$view = new \App\View();
$view->authors = Author::findAll();
$view->display( __DIR__ . '/../templates/admin/add.php' );

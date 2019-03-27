<?php

include __DIR__ . '/../App/autoload.php';

use App\Models\Article;
use App\Models\Author;

if ('POST' === $_SERVER['REQUEST_METHOD']){

    $article = Article::findById($_POST['id']);
    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->author_id = (0 === (int)$_POST['author']) ? null : $_POST['author'];
    $article->save();

    header('Location: ' . '/admin/');
}

$id = (int)$_GET['id'];
$view = new \App\View();
$view->article = Article::findById($id);
$view->authors = Author::findAll();
$view->display( __DIR__ . '/../templates/admin/edit.php' );

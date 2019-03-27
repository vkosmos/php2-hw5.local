<?php

namespace App\Controllers\Admin;

use App\ControllerAdmin;

class Edit extends ControllerAdmin
{

    protected function handle()
    {
        if ('POST' === $_SERVER['REQUEST_METHOD']){
            $params = $_POST;

            $article = \App\Models\Article::findById($params['id']);
            $article->title = $params['title'];
            $article->content = $params['content'];
            $article->author_id = (0 === (int)$params['author']) ? null : $params['author'];
            $article->save();
            header('Location: ' . '/admin/');

        }

        $params = $_GET;
        $id = (int)$params['id'];
        $view = new \App\View();
        $view->article = \App\Models\Article::findById($id);
        $view->authors = \App\Models\Author::findAll();
        $view->display( TEMPLATES . '/admin/edit.php' );
    }
}
<?php

namespace App\Controllers\Admin;

use App\ControllerAdmin;
use App\Errors\Exception404;

class Edit extends ControllerAdmin
{

    protected function handle()
    {
        if ('POST' === $_SERVER['REQUEST_METHOD']){
            $params = $_POST;

            $article = \App\Models\Article::findById($params['id']);
            if (!$article){
                throw new Exception404('Нет такой новости.');
            }

            $data = [];
            $data['title'] = $params['title'];
            $data['content'] = $params['content'];
            $data['author_id'] = (0 === (int)$params['author']) ? null : (int)$params['author'];
            $article->fill($data);
            $article->save();
            header('Location: ' . '/admin/');
        }

        $params = $_GET;
        $id = (int)$params['id'];
        $view = new \App\View();
        $view->article = \App\Models\Article::findById($id);
        if (!$view->article){
            throw new Exception404('Нет такой новости.');
        }

        $view->authors = \App\Models\Author::findAll();
        $view->display( TEMPLATES . '/admin/edit.php' );
    }
}
<?php

namespace App\Controllers\Admin;

use App\ControllerAdmin;

class Add extends ControllerAdmin
{

    protected function handle($method = 'GET', $params = [])
    {
        if ('POST' === $_SERVER['REQUEST_METHOD']){

            $params = $_POST;

            $article = new \App\Models\Article();
            $article->title = $params['title'];
            $article->content = $params['content'];
            $article->author_id = (0 === (int)$params['author']) ? null : (int)$params['author'];
            $article->save();
            header('Location: ' . '/admin/');

        }

        $this->view->authors = \App\Models\Author::findAll();
        $this->view->display( TEMPLATES . '/admin/add.php' );
    }

}
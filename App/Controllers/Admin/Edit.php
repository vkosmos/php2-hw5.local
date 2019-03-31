<?php

namespace App\Controllers\Admin;

use App\ControllerAdmin;
use App\Errors\Exception404;
use App\Errors\ExceptionMulti;
use App\Models\Author;

class Edit extends ControllerAdmin
{

    protected function handle()
    {
        if ('POST' === $_SERVER['REQUEST_METHOD']){

            $params = $_POST;

            $article = \App\Models\Article::findById($params['id']);
            if (!$article){
                $e = new Exception404('Запрошена несуществующая страница.');
                $e->time = time();
                throw $e;
            }

            $data = [];
            $data['title'] = $params['title'];
            $data['content'] = $params['content'];
            $data['author_id'] = (0 === (int)$params['author']) ? null : (int)$params['author'];

            try {
                $article->fill($data);
            }catch(ExceptionMulti $e){
                $this->view->errors = $e->getAll();
                $this->view->article = $article;
                $this->view->authors = Author::findAll();
                $this->view->display( TEMPLATES . '/admin/edit.php' );
                die;
            }

            $article->save();
            header('Location: ' . '/admin/');
        }

        $params = $_GET;
        $id = (int)$params['id'];

        $this->view->article = \App\Models\Article::findById($id);
        if (!$this->view->article){
            $e = new Exception404('Запрошена несуществующая страница.');
            $e->time = time();
            throw $e;
        }

        $this->view->authors = \App\Models\Author::findAll();
        $this->view->display( TEMPLATES . '/admin/edit.php' );
    }
}
<?php

namespace App\Controllers\Admin;

use App\ControllerAdmin;
use App\Errors\ExceptionMulti;
use App\Models\Author;

class Add extends ControllerAdmin
{

    protected function handle($method = 'GET', $params = [])
    {
        if ('POST' === $_SERVER['REQUEST_METHOD']){

            $params = $_POST;

            $article = new \App\Models\Article();

            $data = [];
            $data['title'] = $params['title'];
            $data['content'] = $params['content'];
            $data['author_id'] = (0 === (int)$params['author']) ? null : (int)$params['author'];

            try{
                $article->fill($data);
            }catch(ExceptionMulti $e){
                $this->view->errors = $e->getAll();
                $this->view->authors = Author::findAll();
                $this->view->display( TEMPLATES . '/admin/add.php' );
                die;
            }

            $article->save();
            header('Location: ' . '/admin/');
            die;

        }

        $this->view->authors = Author::findAll();
        $this->view->display( TEMPLATES . '/admin/add.php' );
    }

}
<?php

namespace App\Controllers;

use App\Controller;
use App\Errors\Exception404;

class Article extends Controller
{
    protected function handle()
    {
        $params = $_GET;

        if (!empty($params)){
            $id = (int)$params['id'];

            $this->view->article = \App\Models\Article::findById($id);
            if (!$this->view->article){
                $e = new Exception404('Запрошенная новость не существует.');
                $e->time = time();
                throw $e;
            }

            $this->view->display( TEMPLATES . '/article.php' );
        }else{
            die('Не были переданы необходимые параметры');
        }

    }
}

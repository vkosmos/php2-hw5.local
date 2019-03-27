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
                throw new Exception404('Такой статьи нет');
            }

            $this->view->display( TEMPLATES . '/article.php' );
        }else{
            die('Не были переданы необходимые параметры');
        }

    }
}

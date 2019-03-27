<?php

namespace App\Controllers;

use App\Controller;

class Article extends Controller
{
    protected function handle()
    {
        $params = $_GET;

        if (!empty($params)){
            $id = (int)$params['id'];
            $this->view->article = \App\Models\Article::findById($id);
            $this->view->display( TEMPLATES . '/article.php' );
        }else{
            die('Не были переданы необходимые параметры');
        }

    }
}

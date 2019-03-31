<?php

namespace App\Controllers\Admin;

use App\ControllerAdmin;
use App\Errors\Exception404;

class Delete extends ControllerAdmin
{

    protected function handle()
    {
        $params = $_GET;
        if (!empty($params['id'])){
            $article = \App\Models\Article::findById($params['id']);
            if (!$article){
                $e = new Exception404('Запрошенная новость не существует.');
                $e->time = time();
                $e->params = $_GET;
                throw $e;
            }

            $article->delete();
            header('Location: /admin/');
        }
    }
}
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
                throw new Exception404('Нет такой новости.');
            }

            $article->delete();
            header('Location: /admin/');
        }
    }
}
<?php

namespace App\Controllers\Admin;

use App\ControllerAdmin;

class Delete extends ControllerAdmin
{

    protected function handle()
    {
        $params = $_GET;
        if (!empty($params['id'])){
            $article = \App\Models\Article::findById($params['id']);
            $article->delete();
            header('Location: /admin/');
        }
    }
}
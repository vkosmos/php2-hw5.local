<?php

namespace App\Controllers\Admin;

use App\ControllerAdmin;

class Index extends ControllerAdmin
{

    protected function handle()
    {
        $this->view->news = \App\Models\Article::findAll();
        $this->view->display( TEMPLATES . '/admin/index.php' );
    }
}

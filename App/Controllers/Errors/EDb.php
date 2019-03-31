<?php

namespace App\Controllers\Errors;

use App\Controller;

class EDb extends Controller
{
    protected function handle()
    {
//        include TEMPLATES . '/errors/db.php';
        $this->view->display(TEMPLATES . '/errors/db.php');
    }
}
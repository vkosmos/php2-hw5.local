<?php

namespace App\Controllers\Errors;

use App\Controller;

class E404 extends Controller
{
    protected function handle()
    {
        $this->view->display(TEMPLATES . '/errors/404.php');
    }
}
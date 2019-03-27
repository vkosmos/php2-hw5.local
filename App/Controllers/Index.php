<?php

namespace App\Controllers;

use App\Controller;

class Index extends Controller
{
    function handle()
    {
        $this->view->news = \App\Models\Article::findN(5);
        $this->view->display(TEMPLATES . '/index.php');
    }

}

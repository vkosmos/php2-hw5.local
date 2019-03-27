<?php

namespace App\Controllers\Errors;

use App\Controller;

class EDb extends Controller
{
    protected function handle()
    {
        include TEMPLATES . '/errors/db.php';
    }
}
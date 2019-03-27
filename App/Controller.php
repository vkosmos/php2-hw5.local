<?php

namespace App;

abstract class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    protected function access()
    {
        return true;
    }

    public function __invoke()
    {
        if ($this->access()){
            return $this->handle();
        }
        return false;
    }

    abstract protected function handle();

}
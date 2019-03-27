<?php

namespace App\Errors;

class ExceptionMulti extends \Exception
{
    protected $errors = [];

    public function add(\Exception $e)
    {
        $this->errors[] = $e;
    }

    public function getAll()
    {
        return $this->errors;
    }

    public function isEmpty()
    {
        return empty($this->errors);
    }
}
<?php

namespace App;

trait TSingletone
{
    private static $instance = null;

    public static function getInstance()
    {
        if (null === self::$instance){
            self::$instance = new self;
        }
        return self::$instance;
    }

    protected function __construct()
    {
    }
}
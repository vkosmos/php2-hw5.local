<?php

namespace App;
use App\TSingletone;

/**
 * Class Config
 * @package App
 */
class Config
{
    use TSingletone;

    protected const CONFIGPATH = __DIR__ . '/../config/config_data.php';
    public $data = [];

    protected function __construct()
    {
        $this->data = require self::CONFIGPATH;
    }

}

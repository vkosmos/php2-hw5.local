<?php

namespace App;

trait SetGet
{
    protected $data = [];

    /**
     * @param string $name
     * @param $data
     */
    public function __set(string $name, $data)
    {
        $this->data[$name] = $data;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function __get(string $name)
    {
        return $this->data[$name] ?? null;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function __isset(string $name)
    {
        return isset($this->data[$name]);
    }

}
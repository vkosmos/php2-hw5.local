<?php

namespace App;

/**
 * Class View
 * @package App
 */
class View
    implements \Countable, \Iterator
{
    use SetGet;

    /**
     * Отображает переданный шаблон
     * @param $template string
     */
    public function display($template)
    {
        echo $this->render($template);
    }

    /**
     * Возвращает переданный шаблон
     * @param $template string
     * @return string
     */
    public function render($template)
    {
        ob_start();
        include $template;
        $out = ob_get_contents();
        ob_end_clean();
        return $out;
    }

    /**
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     *
     * The return value is cast to an integer.
     */
    public function count()
    {
        return count($this->data);
    }

    /**
     * Return the current element
     * @return mixed Can return any type.
     */
    public function current()
    {
        return current($this->data);
    }

    /**
     * Move forward to next element
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        next($this->data);
    }

    /**
     * Return the key of the current element
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        return key($this->data);
    }

    /**
     * Checks if current position is valid
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid()
    {
        $key = key($this->data);
        return ($key !== NULL && $key !== FALSE);
    }

    /**
     * Rewind the Iterator to the first element
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        reset($this->data);
    }

}
<?php

namespace App;

class Logger
{
    protected const LOGFILE = __DIR__ . '/Logs/errors.txt';

    public static function logError(\Exception $e)
    {
        file_put_contents(self::LOGFILE, 'Файл: ' . $e->getFile() . ' | Строка: ' . $e->getLine() .
                                    ' | Время: ' . date('d.m.Y H:i:s', $e->time) .
                                    ' | Сообщение: ' .  $e->getMessage() . PHP_EOL, FILE_APPEND);
    }
}
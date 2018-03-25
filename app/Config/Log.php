<?php
/**
 * Created by PhpStorm.
 * User: EMANUELLE
 * Date: 24/03/2018
 * Time: 09:26
 */

namespace App\Config;


use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Log extends Logger
{
    protected $log;
    public function __construct(string $name)
    {
        $this->pushHandler(new StreamHandler("log.log", Logger::WARNING));
        parent::__construct($name);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: EMANUELLE
 * Date: 20/03/2018
 * Time: 21:32
 */

namespace App\Config;


class Config
{
    public $driver = "sqlite";
    public $database ;
    public $username = "";
    public $password = "";
    public $directoryImages;
    public $directoryDatabaseCreate = __DIR__."/../../db/db.sqlite3";

    public function __construct()
    {
        $this->directoryImages = $_SERVER['DOCUMENT_ROOT']."/Images";
        $this->database = $_SERVER['DOCUMENT_ROOT']."/../db/db.sqlite3";
    }
}
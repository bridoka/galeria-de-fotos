<?php
/**
 * Created by PhpStorm.
 * User: EMANUELLE
 * Date: 20/03/2018
 * Time: 22:15
 *
 * Classe de conexão com o banco de dados
 */

namespace App\Database;


use App\Config\Config;
use App\Config\Log;
class DatabaseConnect
{
    protected $driver;
    protected $database;
    protected $username;
    protected $password;
    protected $connection;

    public function __construct()
    {
        $config = new Config();
        $this->setDriver($config->driver);
        $this->setDatabase($config->database);
        $this->setPassword($config->password);
        $this->setUsername($config->username);
    }

    /**
     * @return mixed
     */
    public function getDriver()
    {
        return $this->driver;
    }

    /**
     * @param mixed $driver
     */
    public function setDriver($driver)
    {
        $this->driver = $driver;
    }

    /**
     * @return mixed
     */
    public function getDatabase()
    {
        return $this->database;
    }

    /**
     * @param mixed $database
     */
    public function setDatabase($database)
    {
        $this->database = $database;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    protected function connect()
    {
        try {
            $this->connection = new \PDO("$this->driver:$this->database", $this->username, $this->password);
        } catch (\PDOException $e) {
            $logger = new Log("DatabaseConnectLog");
            $logger->addError("Erro com a conexão com o banco de dados. Erro:".$e->getMessage());
        }
    }

    public function getConnection()
    {
        try {
            if(empty($this->connection)) {
                $this->connect();
            }
            return $this->connection;
        } catch (\Exception $e) {
            $logger = new Log("DatabaseConnectLog");
            $logger->addError("Erro com a conexão com o banco de dados. Erro:".$e->getMessage());
        }
    }
}
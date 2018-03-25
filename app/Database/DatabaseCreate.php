<?php
/**
 * Created by PhpStorm.
 * User: EMANUELLE
 * Date: 20/03/2018
 * Time: 20:52
 *
 * Classe para criação de estrutura do banco de dados
 */

namespace App\Database;


use App\Config\Config;

class DatabaseCreate
{
    public static function createTablesDatabase()
    {
        $config = new Config();
        $databaseConnect = new DatabaseConnect();
        $databaseConnect->setDatabase($config->directoryDatabaseCreate);
        $connection = $databaseConnect->getConnection();
        $connection->exec("CREATE TABLE IF NOT EXISTS photos (
                                            id INTEGER PRIMARY KEY, 
                                            nome_arquivo VARCHAR(100))");
    }
}
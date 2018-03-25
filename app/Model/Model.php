<?php
/**
 * Created by PhpStorm.
 * User: EMANUELLE
 * Date: 20/03/2018
 * Time: 22:44
 */

namespace App\Model;


use App\Database\DatabaseConnect;
use Monolog\Logger;

class Model extends DatabaseConnect
{
    protected $table;
    protected $primaryKey;
    protected $data;
    protected $fields;
    protected $values;
    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->getConnection();
    }


    public function fill(array $values)
    {
        $this->data = $values;
    }

    /*
     * validateParams
     * Função para validar se os parâmetros obrigatórios estão preenchidos para executar ação
     */
    private function validateParams ($param)
    {
        switch ($param){
            case 1:
                return $this->validateParamsInsert();
                break;
            case 2:
                return $this->validateParamsDelete();
                break;
        }
    }

    /*
     * validateParamsInsert
     * Função para validar se os parâmetros obrigatórios estão preenchidos para executar ação inserir
     */
    private function validateParamsInsert ()
    {
        if(empty($this->table)){
            throw new \Exception("Parâmetro table não informado");
            return false;
        }
        if(empty($this->data)){
            throw new \Exception("Parâmetros de inserção vazios");
            return false;
        }
        return true;
    }

    /*
     * validateParamsInsert
     * Função para validar se os parâmetros obrigatórios estão preenchidos para executar ação delete
     */
    private function validateParamsDelete ()
    {
        if(empty($this->table)){
            throw new \Exception("Parâmetro table não informado");
            return false;
        }
        if(empty($this->data)){
            throw new \Exception("Parâmetros de remoção vazios");
            return false;
        }
        if(empty($this->primaryKey)){
            throw new \Exception("Parâmetro primaryKey não informado");
            return false;
        }
        return true;
    }

    /**
     * extractFieldsValues
     *
     * Extrai os campos e os valores enviados para preparar o insert/update
     */
    private function extractFieldsValues()
    {
        $this->fields = array();
        $this->values = array();
        foreach ($this->data as $field => $value) {
            $this->fields[] = $field;
            $this->values[] = $value;
        }
    }

    /*
     * insert
     *
     * Insere os dados na tabela do database
     */
    public function insert()
    {
        try {
            if ($this->validateParams(1)) {
                $this->extractFieldsValues();
                $query = $this->db;
                $query->beginTransaction();
                $insert = "INSERT INTO $this->table (" . implode(",", $this->fields) . ")
			            VALUES ('" .implode("','", $this->values) . "')";
                $retorno = $query->exec($insert);
                $query->commit();
                if($retorno){
                    return true;
                }
                return false;
            }
            return false;
        } catch (\Exception $e) {
            $query->rollback();
            $logger = new Logger();
            $logger->addError("Não foi possível inserir devido ao erro: ". $e->getMessage());
        }
    }

    /*
     * delete
     *
     * Remove o registro da base de dados
     */
    public function delete()
    {
        try {
            if ($this->validateParams(2)) {
                $delete = "DELETE FROM $this->table WHERE $this->primaryKey = '".$this->data[$this->primaryKey]."'";
                $query = $this->db->prepare($delete);
                return $query->execute();
            }
            return false;
        } catch (\Exception $e) {
            $logger = new Logger();
            $logger->addError("Não foi possível inserir devido ao erro: ". $e->getMessage());
        }
    }

    /*
     * delete
     *
     * Remove todos registros da tabela na base de dados
     */
    public function deleteAll()
    {
        try {
            $delete = "DELETE FROM $this->table";
            $query = $this->db->prepare($delete);
            return $query->execute();

        } catch (\Exception $e) {
            $logger = new Logger('deleteAll');
            $logger->addError("Não foi possível inserir devido ao erro: ". $e->getMessage());
            return false;
        }
    }

    public function queryExecute($query)
    {
        if(empty($query)){
            throw new \Exception("Não foi possível selecionar os dados: Parâmetro query vazio.");
        }
        $result = $this->db->query($query);
        $result = $result->fetchAll();
        return $result;
    }
}
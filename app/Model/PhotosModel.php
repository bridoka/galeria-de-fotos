<?php
/**
 * Created by PhpStorm.
 * User: EMANUELLE
 * Date: 19/03/2018
 * Time: 21:40
 */
namespace App\Model;

class PhotosModel extends Model
{
    public function __construct()
    {
        $this->table = "photos";
        $this->primaryKey = "id";
        parent::__construct();
    }

    public function selectAll()
    {
        return $this->queryExecute("SELECT * FROM photos");
    }

    public function getNameImageId($id)
    {
        return $this->queryExecute("SELECT nome_arquivo FROM photos where id=$id");
    }

}
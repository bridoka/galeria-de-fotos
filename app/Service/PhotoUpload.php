<?php
/**
 * Created by PhpStorm.
 * User: EMANUELLE
 * Date: 24/03/2018
 * Time: 20:12
 */

namespace App\Service;


use App\Config\Config;
use App\Model\PhotosModel;
use Monolog\Logger;

class PhotoUpload
{
    private $extValid = array('png','jpeg','jpg','gif');
    private $directoryImage ;
    private $imageName;
    private $log;

    public function __construct()
    {
        $config = new Config();
        $this->setImageName("");
        $this->directoryImage = $config->directoryImages;
        $this->log = new Logger('PhotoUpload');
    }

    private function setImageName($value)
    {
        $this->imageName = $value;
    }

    private function getImageName()
    {
        return $this->imageName;
    }

    /**
     * saveImageDirectory
     *
     * Faz o upload da imagem salvando no diretório de destino.
     * @return bool
     * @throws \Exception
     */
    private function saveImageDirectory()
    {
        $this->log->addError("saveImageDirectory: Inicio ");
        if(!empty($_FILES['image'])){
            if($this->isExtValid() && $this->isUploadedFile()) {
                if(!file_exists($this->directoryImage)) {
                    mkdir($this->directoryImage, 0755, true);
                }
                $this->setImageName(date('Ydmisu').$_FILES['image']['name']);
                // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino
                if (!move_uploaded_file($_FILES['image']['tmp_name'], $this->directoryImage ."/". $this->getImageName())) {
                    throw new \Exception("Não foi possível salvar a imagem na pasta de destino.");
                    return false;
                }
                $this->log->addDebug("saveImageDirectory: Fim ");
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * Verifica se a extensão do arquivo é válida
     * @return bool
     */
    private function isExtValid()
    {
        $this->log->addDebug("isExtValid: Inicio ");
        $arrayExt = explode('.', $_FILES['image']['name']);

        $ext = strtolower(end($arrayExt));

        if(!in_array($ext,$this->extValid)){
            throw new \Exception("Extensão de arquivo inválida.");
            return false;
        }
        $this->log->addDebug("isExtValid: Fim ");
        return true;
    }

    /**
     * Verifica se o arquivo foi enviado via post por segurança
     * @return bool
     */
    private function isUploadedFile()
    {
        if(is_uploaded_file($_FILES['image']['tmp_name'])) {
            return true;
        }
        return false;
    }


    /**
     * saveImageBD
     *
     * Salva a referencia da imagem no banco de dados
     * @return bool
     */
    private function saveImageBD()
    {
        $photosModel = new PhotosModel();
        $photosModel->fill(array("nome_arquivo"=>$this->getImageName()));
        return $photosModel->insert();
    }


    /**
     * Upload
     * @return bool
     * @throws \Exception
     */
    private function upload()
    {
        $saveImageDirectory = $this->saveImageDirectory();
        if($saveImageDirectory) {
            return $this->saveImageBD();
        }
        return false;
    }

    /**
     * Executa o upload do arquivo.
     * @throws \Exception
     */
    public function execute(): bool
    {
        try {
            return $this->upload();
        } catch (\Exception $e) {
            $this->log->addError("Não foi possível realizar o upload corretamente: ".$e->getMessage());
            return false;
        }
    }

}
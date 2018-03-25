<?php
/**
 * Created by PhpStorm.
 * User: EMANUELLE
 * Date: 19/03/2018
 * Time: 21:39
 */
namespace App\Controller;

use App\Config\Config;
use App\Model\PhotosModel;
use App\Controller\IController;
use App\Service\PhotoUpload;
use App\View\View;

class PhotosController implements IController
{
    /**
     * PhotosController constructor.
     */
    public function __construct()
    {


    }

    public function index()
    {
        $view = new View();
        $view->showTemplate('photos','index');
    }

    public function create()
    {
        $view = new View();
        $view->showTemplate('photos','create');
    }

    /**
     * upload
     *
     * Faz o upload da imagem
     * @throws \Exception
     */
    public function upload()
    {
        $photoUpload = new PhotoUpload();
        $return = array("success",false);
        if($photoUpload->execute()){
            $return['success'] = true;
        }
        echo json_encode($return);
        exit();
    }


    public function list()
    {
        $view = new View();
        $photosModel = new PhotosModel();
        $data = $photosModel->selectAll();
        $view->showTemplate('photos','list');
    }

    public function getImages()
    {
        $photosModel = new PhotosModel();
        $config = new Config();
        $data = $photosModel->selectAll();
        $retorno = array();
        $retorno['data'] = $data;
        $retorno['directoryImages'] = $config->directoryImages;
        echo json_encode($retorno);
        exit();
    }


    public function remove()
    {
        $config = new Config();
        $id = filter_input(INPUT_POST,"id");
        $photosModel = new PhotosModel();
        $getNameImage = $photosModel->getNameImageId($id);
        $nomeArquivo = ($getNameImage[0]['nome_arquivo']);
        $photosModel->fill(array("id"=>$id));
        $delete = $photosModel->delete();
        $retorno = array("success",false);
        if($delete){
            unlink($config->directoryImages."/".$nomeArquivo);
            $retorno['success'] = true;
        }
        echo json_encode($retorno);
        exit();
    }
}
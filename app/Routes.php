<?php
/**
 * Created by PhpStorm.
 * User: EMANUELLE
 * Date: 24/03/2018
 * Time: 13:39
 */

namespace App;


use App\Controller\PhotosController;

class Routes
{
    const OPTION_PARAM = 1;
    const ACTION_PARAM = 2;
    private $uri;
    private $validActions = array('create','remove','list','upload','getImages');

    public function __construct()
    {
        $this->uri = ($_SERVER['REQUEST_URI']);
        if(substr($this->uri,-1) == "/"){
            $this->uri = substr($this->uri, 0, -1);
            header('Location: '.$this->uri);
        }
        $this->fireActionController();
    }

    public function fireActionController()
    {
        $uriArray = explode("/",$this->uri);
        $option = $uriArray[self::OPTION_PARAM];
        $action = $uriArray[self::ACTION_PARAM];
        if(!empty($action) && !empty($option) && in_array($action,$this->validActions)){
            $controller = "App\Controller\\".ucfirst($option)."Controller";
            $controller = new $controller();
            $controller->$action();
        } else if(!empty($option) && $option) {
            $controller = "App\Controller\\".ucfirst($option)."Controller";
            $controller = new $controller();
            $controller->index();
        } else {
            $controller = new PhotosController();
            $controller->index();
        }
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: EMANUELLE
 * Date: 19/03/2018
 * Time: 21:39
 */
namespace App\Controller;

interface IController
{
    public function index();
    public function create();
    public function remove();
}
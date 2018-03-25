<?php
/**
 * Created by PhpStorm.
 * User: EMANUELLE
 * Date: 24/03/2018
 * Time: 14:51
 */

namespace App\View;


class View
{
    public function __construct()
    {
    }

    public function showTemplate($view,$action,$data = null)
    {
        include_once ($view."/view_$action.php");
    }
}
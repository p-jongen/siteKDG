<?php
require_once("controller/MainController.php");
require_once("controller/InitiationController.php");
require_once("view/View.php");
require_once("model/Initiation.php");


function start($string,$start)
{
    return substr($string, 0, strlen($start)) === $start;
}
function routing()
{
    $base_url = $_SERVER['REQUEST_URI'];
    if($base_url == "/" || $base_url == "" || $base_url == "/home" || $base_url == "/index.php")MainController::home();
    else if(start($base_url,"/initiations"))InitiationController::initiations();
    else if(start($base_url,"/public/"))return false;
    else MainController::error404();
    return true;
}

if(routing() == false)return false;
?>

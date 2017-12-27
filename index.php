<?php
require_once("controller/MainController.php");
require_once("view/View.php");


function routing()
{
    $base_url = $_SERVER['REQUEST_URI'];
    if($base_url == "/" || $base_url == "" || $base_url == "/home" || $base_url == "/index.php")MainController::home();
    else if(substr($base_url, 0, strlen("/public/")) === "/public/")return false;
    else MainController::error404();
    return true;
}

if(routing() == false)return false;
?>

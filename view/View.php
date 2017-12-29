<?php


class View
{

    public static function home()
    {
        include("home.php");
    }

    public static function error404()
    {
        include("404.php");
    }


    public static function initiations($initiation,$registered)
    {
        $inscription_validated = $registered; 
        include("initiations.php");
    }
}



?>

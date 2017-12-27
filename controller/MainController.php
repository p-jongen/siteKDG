<?php


class MainController
{

    public static function home()
    {
        return View::home();
    }

    public static function error404()
    {
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
        return View::error404();
    }
}



?>

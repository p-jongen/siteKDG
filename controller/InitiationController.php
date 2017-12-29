<?php


class InitiationController
{

    public static function initiations()
    {
        $init = new Initiation("2017-02-25");
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return InitiationController::registerInitiations($init);
        }
        return View::initiations($init,false);
    }

    public static function white($text)
    {
        $text = preg_replace("/[\r\n]+/", "\n", $text);
        $text = preg_replace("/\s+/", ' ', $text);
        $text = str_replace(" ", '_', $text);
        return $text;
    }
    public static function registerInitiations()
    {
        $data = array();

        $mandatory = [$_POST["game"],$_POST["name"],$_POST["firstname"]];
        $optionnal = [$_POST["email"],$_POST["phone"]];

        $entry = "\n\r";

        for($i = 0;$i < count($mandatory);$i++)
        {
            if(isset($mandatory[$i])){
                $entry = $entry.InitiationController::white($mandatory[$i])." ";
            }
            else return View::initiations($init,"error");
        }

        for($i = 0;$i < count($optionnal);$i++)
        {
            if(isset($optionnal[$i]))
            {
                $entry = $entry.InitiationController::white($optionnal[$i])." ";
            }
        }


        //fi\le_put_contents("inscriptions/"..".txt", $entry, FILE_APPEND);
        return View::initiations($init,true);
    }

}

?>

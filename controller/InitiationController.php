<?php


class InitiationController
{

    public static function initiations()
    {
        $initiations = array();
        $files = scandir($_SERVER['DOCUMENT_ROOT']."/inscriptions/data/");
        for($i = 2;$i<count($files);$i++)
        {
            $initiations[$i-2] = new Initiation($files[$i]);
        } 
        $best = null;
        for($i = 0;$i<count($initiations);$i++)
        {
            if($initiations[$i]->isComing())
            {
                if($best == null)$best = $initiations[$i];
                else if($best->getDate() > $initiations[$i]->getDate())$best = $initiations[$i];
            }
        }
        $init = $best;
        
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return InitiationController::registerInitiations($init,$initiations);
        }
        return View::initiations($init,false,$initiations);
    }

    public static function white($text)
    {
        $text = preg_replace("/[\r\n]+/", "\n", $text);
        $text = preg_replace("/\s+/", ' ', $text);
        $text = str_replace(" ", '_', $text);
        return $text;
    }
    
    
    
    public static function registerInitiations($initiation,$initiations)
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
            else return View::initiations($init,"error",$initiations);
        }

        for($i = 0;$i < count($optionnal);$i++)
        {
            if(isset($optionnal[$i]))
            {
                $entry = $entry.InitiationController::white($optionnal[$i])." ";
            }
        }

        $initiation->addEntry($entry);

        //fi\le_put_contents("inscriptions/"..".txt", $entry, FILE_APPEND);
        return View::initiations($initiation,true,$initiations);
    }

}

?>

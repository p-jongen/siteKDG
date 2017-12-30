
<?php

class Initiation
{
    private $registered = array();
    private $tables = array();
    private $start = null;
    private $registerOpen = null;
    private $id = "";

    function __construct($id)
    {
        $this->id = $id;
        $filename = $_SERVER['DOCUMENT_ROOT']."/inscriptions/data/".$id;
        $file = fopen($filename, "r") or die("Unable to open file!");
        $i = 0;
        
        
        $temp = trim(fgets($file));
        $this->start = DateTime::createFromFormat ('d/m/Y',$temp);
            
        $temp = trim(fgets($file));
        $this->registerOpen = DateTime::createFromFormat ('d/m/Y',$temp);
        while(!feof($file)) {
            $temp = fgets($file);
            $this->tables[$i] = array();
            $this->tables[$i][0] = substr($temp,2);
            $this->tables[$i][1] = substr($temp,0,1);
            $i++;
        }
        fclose($file);

    }


    public function isRegisterOpen()
    {
        $date1 = new DateTime("now");
        return $this->isComing() && $this->registerOpen<=$date1;
    }
    
    public function isComing()
    {
        $date1 = new DateTime("now");
        return $this->start>=$date1;
    }
    
    public function getHumanDate()
    {
        return $this->start->format("d/m");
    }
    
    public function getDate()
    {
        return $this->start;
    }

    public function getHumanRegisterDate()
    {
        return $this->registerOpen->format("d/m");
    }

    public function getTableAvailable()
    {
        $available = array();
        
        
        $available[] = array("Peut me chaut, je veux juste jouer !",-1);
        return $available;

    }

    public function addEntry($entry)
    {
        file_put_contents("inscriptions/answers/".$this->id, $entry, FILE_APPEND);
    }

    public function getTables()
    {
        return $this->tables;
    }
}


 ?>

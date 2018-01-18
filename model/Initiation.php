
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
        
        
        
        $filename = $_SERVER['DOCUMENT_ROOT']."/inscriptions/answers/".$id;
        $file = fopen($filename, "r");
        
        if($file)
        {
            while(!feof($file)) {
                $temp = trim(fgets($file));
                if($temp != "" && $temp != " " && $temp != "\n" && $temp != "\n\r")
                {
                    $this->registered[] = $temp;
                }
            }
            fclose($file);
        }

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
    
    
    public function getNumberAvailableSeat()
    {
        $sum = 0;
        foreach($this->tables as $value=>$t)
        {
            $sum+= $this->getNumberAvailableAtTable($value);
        }
        
        return $sum;
    }
    
    public function getNumberAvailableAtTable($which)
    {
        $total = $this->tables[$which][1];
        
        foreach ($this->registered as $key => $value) {
            if($value[0] == $which)$total--;
        }
        
        return $total;
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
        
        
        
        for($i = 0;$i<count($this->tables);$i++)
        {
            if($this->getNumberAvailableAtTable($i) > 0)
            {
            
            $available[] = array($this->tables[$i][0]." (".$this->getNumberAvailableAtTable($i)." places restantes)",$i);
                
            }
        }
        
        $available[] = array("Peut me chaut, je veux juste jouer ! (".$this->getNumberAvailableSeat()." places restantes)",-1);
        
        return $available;

    }

    public function addEntry($entry)
    {
        $this->registered[] = $entry;
        $this->saveEntries();
    }

    public function getTables()
    {
        return $this->tables;
    }
    
    public function saveEntries()
    {
        error_log($this->id);
        unlink("inscriptions/answers/".$this->id);
        fopen("inscriptions/answers/".$this->id);
        foreach ($this->registered as $key => $value) {
            file_put_contents("inscriptions/answers/".$this->id, $value, FILE_APPEND);
            file_put_contents("inscriptions/answers/".$this->id, "\n\r", FILE_APPEND);
        }
    }
}


 ?>

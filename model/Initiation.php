
<?php

class Initiation
{
    private $registered = array();
    private $tables = array();

    function __construct($id)
    {
        $filename = $_SERVER['DOCUMENT_ROOT']."/inscriptions/data/".$id.".txt";
        $file = fopen($filename, "r") or die("Unable to open file!");
        $i = 0;
        while(!feof($file)) {
            $temp = fgets($file);
            $this->tables[$i] = array();
            $this->tables[$i][0] = substr($temp,2);
            $this->tables[$i][1] = substr($temp,0,1);
            $i++;
        }
        fclose($file);

    }

    public function getHumanDate()
    {

    }


    public function getHumanRegisterDate()
    {

    }

    public function getTableAvailable()
    {

    }

    public function addEntry()
    {

    }

    public function getTables()
    {
        return $this->tables;
    }
}


 ?>

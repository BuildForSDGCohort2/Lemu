<?php

// fetch daily data
class Daily
{
    public $database = null;

    public function __construct(DBController $database)
    {
        if(!isset($database->con)) return null;
        $this->database =$database;
    }

    // getData Method
    public function getData($table = 'Daily'){
        $result = $this->database->con->query("SELECT * FROM ($table)");

        $resultArray = array();

        // fetch productdata one by one
        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }
}

?>
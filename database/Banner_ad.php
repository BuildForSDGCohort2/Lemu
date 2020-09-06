<?php

// fetch banner_ad data
class Banner_ad
{
    public $database = null;

    public function __construct(DBController $database)
    {
        if(!isset($database->con)) return null;
        $this->database =$database;
    }

    // getData Method
    public function getData($table = 'Banner_ad'){
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
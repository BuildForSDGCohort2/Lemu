<?php

// fetch banner_ad1 data
class Banner_ad1
{
    public $database = null;

    public function __construct(DBController $database)
    {
        if(!isset($database->con)) return null;
        $this->database =$database;
    }

    // getData Method
    public function getData($table = 'Banner_ad1'){
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
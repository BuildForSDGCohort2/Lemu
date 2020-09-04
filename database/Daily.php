<?php

// fetch daily data
class Daily
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if(!isset($db->con)) return null;
        $this->db =$db;
    }

    // getData Method
    public function getData($table = 'Daily'){
        $result = $this->db->con->query("SELECT * FROM ($table)");

        $resultArray = array();

        // fetch productdata one by one
        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }
}

?>
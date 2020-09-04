<?php

// fetch banner_ad1 data
class Banner_ad1
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if(!isset($db->con)) return null;
        $this->db =$db;
    }

    // getData Method
    public function getData($table = 'Banner_ad1'){
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
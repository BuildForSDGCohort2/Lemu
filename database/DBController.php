<?php

class DBController
{
    // DB Connection
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $database = 'lemu';
    //Connection
    public $con = null;

    //constructor
    public function __construct()
    {
        $this->con = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        if($this->con->connect_error){
            echo "Failed" .$this->con->connect_error;
        }
    }
    public function __destruct()
    {
        $this->closeConnection();
    }

    // Connection closing
    protected function closeConnection(){
    if($this->con != null){
        $this->con->close();
        $this->con = null;
    }
    }
}

?>
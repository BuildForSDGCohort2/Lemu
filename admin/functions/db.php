<?php 

    $con = mysqli_connect('localhost','root','','lemu');

    // function 
    function escape($string)
    {
        global $con;
        return mysqli_real_escape_string($con,$string);
    }

    // Query Function
    function Query($query)
    {
        global $con;
        return mysqli_query($con,$query);
    }

    function Query1($query)
    {
        global $con;
        return multi_query($con,$query);
    }

    // confirmatiom function
    function confirm($results)
    {
        global $con;
        if(!$results)
        {
           die('Query Failed'.mysqli_error($con)); 
        }
    }

    // fatch data
    function fatech_data($results)
    {
        return mysqli_fetch_assoc($results);
    }

    // row values
    function row_count($count)
    {
        return mysqli_num_rows($count);
    }
?>

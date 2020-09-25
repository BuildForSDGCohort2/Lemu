<?php

// clean string
function clean ($string)
{
    return htmlentities($string);
}

// redirection
function redirect($location)
{
    return header("location:{$location}");
}

// set session message
function set_message($msg)
{
    if(!empty($msg))
    {
        $_SESSION['Message']=$msg;
    }
    else
    {
        $msg="";
    }
}

// display message function
function display_message()
{
    if(isset($_SESSION['Message']))
    {
    echo $_SESSION['Message'];
    unset($_SESSION['Message']);
    }
}

?>
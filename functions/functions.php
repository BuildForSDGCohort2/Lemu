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

// Generate Token
function Token_Generator()
{
    $token = $_SESSION['token']=md5(uniqid(mt_rand(),true));
    return $token;
}

// Send Email Function
function send_email($email,$sub,$msg,$header)
{
    return mail($email,$sub,$msg,$header);
}

function Error_validation($Error)
{
    return '<div class="alert alert-danger">'.$Error.'</div>';
}


// User Validation
function user_validation()
    {
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $Firstname = clean($_POST['Firstname']);
            $Lastname = clean($_POST['Lastname']);
            $Username = clean($_POST['Username']);
            $Email = clean($_POST['Email']);
            $pass = clean($_POST['pass']);
            $cpass = clean($_POST['cpass']);

            $Errors = [];
            $Max = 20;
            $Min = 02;

            if(strlen($Firstname)<$Min)
            {
                $Errors[]= " First Name Cannot Be Less Than {$Min} Characters";
            }

            if(strlen($Firstname)>$Max)
            {
                $Errors[]= " First Name Cannot Be More Than {$Max} Characters";
            }

            if(strlen($Lastname)<$Min)
            {
                $Errors[]= " Last Name Cannot Be Less Than {$Min} Characters";
            }

            if(strlen($Lastname)>$Max)
            {
                $Errors[]= " Last Name Cannot Be More Than {$Max} Characters";
            }

            if(!preg_match("/^[a-zA-Z,0-9]*$/",$Username))
            {
                $Errors[]= " User Name Cannot  Accept Those Characters";
            }

            if(Email_Exists($Email))
            {
                $Errors[]= " Email Already Registered !";
            }

            if(User_Exists($Username))
            {
                $Errors[]= " User Name Already Registered !";
            }

            if($pass!=$cpass)
            {
                $Errors[]= " Password Not Matched !";
            }


            if(!empty($Errors))
            {
                foreach($Errors as $Error)
                {
                    echo Error_validation($Error);
                }
            }
            else
            {
                if(user_registration($Firstname,$Lastname,$Username,$Email,$pass))
                {
                    set_message('<p class="bg-success text-center lend">You Have Successfully Registered Please Check Your Activation Link</p>');
                    redirect("index.php");
                }
                else
                {
                    set_message('<p class="bg-danger text-center lend">Your account was not registered, please try again later. </p>');
                    redirect("index.php");
                }
            }
        }
    }

    // email exist
    function Email_Exists($email)
    {
        $sql = " select * from user where Email='$email'";
        $result = Query($sql);
        if(fatech_data($result))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // user exists

    function User_Exists($username)
    {
        $sql = " select * from user where Username='$username'";
        $result = Query($sql);
        if(fatech_data($result))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

// user registration function
    function user_registration($Fname,$Lname,$Uname,$Email,$Pass)
    {
        $Firstname = escape($Fname);
        $Lastname = escape($Lname);
        $Username = escape($Uname);
        $Email = escape($Email);
        $pass = escape($Pass);

        if(Email_Exists($Email))
        {
            return true;
        }
        else if(User_Exists($Username))
        {
            return true;
        }
        else
        {
            $Password = md5($pass);
            $Validation_code = md5($Username + microtime());

            $sql = "insert into user (FirstName,LastName,Username,Email,Password,Validation_Code,Active) values ('$Firstname','$Lastname','$Username','$Email','$Password','$Validation_code','0')";

            $result = Query($sql);
            confirm($result);

            $subject = "Activate Your Lemu Account";
            $msg = "Please click on the link belowto activate your account http://localhost/lemu/activate.php?Email=$Email&Code=$Validation_code";
            $header = " From No-Reply admin@lemu.com";

            send_email($Email,$subject,$msg,$header);

            return true;
        }
    }

    // Activation Function
    function activation()
    {
        if($_SERVER['REQUEST_METHOD']=="GET")
        {
            $Email = $_GET['Email'];
            $Code = $_GET['Code'];

            $sql ="select * from user where Email='$Email' AND Validation_Code='$Code'";
            $result = Query($sql);
            confirm($result);

            if(fatech_data($result))
            {
                $sqlquery = "update user set Active='1', Validation_Code='0' where Email='$Email' AND Validation_Code='$Code'";
                $result2 = Query($sqlquery);
                confirm($result2);
                set_message('<p class="bg-success text-center lead"> Your account has successfully been activated</p>');
                redirect('login.php');
            }
            else
            {
                echo '<p class="bg-danger text-center lead"> Your account was not activated, please try again later </p>';
            }
        }
    }

    // User login
    function login_validation()
    {
        $Errors = [];

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $Username = clean($_POST['UEmail']);
            $Userpass = clean($_POST['pass']);
            $Remember = isset($_POST['remeber']);

            if(empty($Username))
            {
                $Errors[] = "Please enter your email";
            }

            if(empty($Userpass))
            {
                $Errors[] = " Please enter your password";
            }

            if(!empty($Errors))
            {
                foreach($Errors as $Error)
                {
                    echo Error_validation($Error);
                }
            }
            else
            {
                if(user_login($Username,$Userpass,$Remember))
                {
                    redirect("index.php");
                }
                else
                {
                    echo Error_validation("Please enter correct email or password");
                }
            }
        }
    }

    // User Login Function
    function user_login($Username,$Userpass,$Remember)
    {
         $query = "select * from user where Username='$Username' and Active='1'" ;
         $result = Query($query);

         if($row=fatech_data($result))
         {
             $db_pass = $row['Password'];
             if(md5($Userpass) == $db_pass)
             {
                 if($Remember == true)
                 {
                     setcookie('email',$Username, time() + 86400);
                 }
                 $_SESSION['Username']=$Username;
                 return true;
             }
             else
             {
                 return false;
             }
         }
    }

    // Logged in
    function logged_in()
    {
        if(isset($_SESSION['Username']) || isset($_COOKIE['email']))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // Recover Password
    function recover_password()
    {
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            if(isset($_SESSION['token']) && $_POST['token'] == $_SESSION['token'])
            {
                $Email = $_POST['UEmail'];
                if(Email_Exists($Email))
                {
                    $code = md5($Email+microtime());
                    setcookie('temp_code',$code,time()+360);

                    $sql = "update user set Validation_Code='$code' where Email='$Email'";
                    Query($sql);
                    $subject = "Please Reset the Password";
                    $message = "Your code is: {$code}. Please follow the link below to rest your password http://localhost/lemu/code.php?Email=$Email&Code=$code";
                    $header = "noreply@lemu.com";

                    if(send_email($Email,$subject,$message,$header))
                    {
                        echo '<div class="alert alert-success"> Please check your email</div>';
                    }
                    else
                    {
                        echo Error_validation("We coudn't send an email");
                    }
                }
                else
                {
                    echo Error_validation(" Email not found ...");
                }
            }
            else
            {
                redirect("login.php");
            }
        }
    }

    // validation code
    function validation_code()
    {
        if(isset($_COOKIE['temp_code']))
        {
            if(!isset($_GET['Email']) && !isset($_GET['Code']))
            {
                redirect("index.php");
            }
            else if(empty($_GET['Email']) && empty($_GET['Code']))
            {
                redirect("index.php");
            }
            else
            {
                if(isset($_POST['recover-code']))
                {
                    $code = $_POST['recover-code'];
                    $Email = $_GET['Email'];

                    $query = "select * from user where Validation_Code='$code' and Email='$Email'";
                    $result = Query($query);
                    
                    if(fatech_data($result))
                    {  
                        setcookie('temp_code',$code, time()+360);
                        redirect("reset.php?Email=$Email&Code='$code'");
                    }
                    else
                    {
                        echo Error_validation("Query Failed");
                    }
                }
            }
        }
        else
        {
            set_message('<div class="alert alert-danger"> Your code has expired</div>');
            redirect("recover.php");
        }
    }

    // Reset Password
    function reset_password()
    {
        if(isset($_COOKIE['temp_code']))
        {
            if(isset($_GET['Email']) && isset($_GET['Code']))
            {
                if($_SESSION['token'] && isset($_POST['token']))
                {
                    if($_SESSION['token'] == $_POST['token'])
                    {
                        if($_POST['reset-pass'] === $_POST['reset-c-pass'])
                        {
                            $Password = md5($_POST['reset-pass']);
                            $Email = $_GET['Email'];
                            $query2 = "update user set Password='".$Password."', Validation_Code=0 where Email='".$_GET['Email']."'";
                            $result = Query($query2);

                            if($result)
                            {
                                set_message('<div class="alert alert-success"> Your password has been reset successfully </div>');
                                redirect('login.php');
                            }
                            else
                            {
                                set_message('<div class="alert alert-danger"> Something went wrong </div>');
                            }
                        }
                        else
                        {
                            set_message('<div class="alert alert-danger"> Password not matched </div>');
                        }
                    }
                }
            }
            else
            {
                set_message('<div class="alert alert-danger"> Your Email or Code has not matched </div>');
            }
        }
        else
        {
            set_message('<div class="alert alert-danger"> Your Reset Password time has expired </div>');
        }
    }

    // Popular
    function getData($table = 'Popular')
    {
        $sql= "SELECT * FROM ($table)";
        $result = Query($sql);
        $resultArray = array();

        // fetch productdata one by one
        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
        $result = Query($sql);
    }

    // Daily
    function getDataD($table = 'Daily')
    {
        $sql= "SELECT * FROM ($table)";
        $result = Query($sql);
        $resultArray = array();

        // fetch productdata one by one
        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
        $result = Query($sql);
    }

    // Daily
    function getDataL($table = 'Latest')
    {
        $sql= "SELECT * FROM ($table)";
        $result = Query($sql);
        $resultArray = array();

        // fetch productdata one by one
        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
        $result = Query($sql);
    }

    // Banner Ad
    function getDataB($table = 'Banner_ad')
    {
        $sql= "SELECT * FROM ($table)";
        $result = Query($sql);
        $resultArray = array();

        // fetch productdata one by one
        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
        $result = Query($sql);
    }

    // Banner Ad1
    function getDataB1($table = 'Banner_ad1')
    {
        $sql= "SELECT * FROM ($table)";
        $result = Query($sql);
        $resultArray = array();

        // fetch productdata one by one
        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
        $result = Query($sql);
    }

    // Banner Ad2
    function getDataB2($table = 'Banner_ad2')
    {
        $sql= "SELECT * FROM ($table)";
        $result = Query($sql);
        $resultArray = array();

        // fetch productdata one by one
        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
        $result = Query($sql);
    }

    // User data
    function getDatauser($table = 'user')
    {
        $sql= "SELECT * FROM ($table)";
        $result = Query($sql);
        $resultArray = array();

        // fetch user one by one
        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
        $result = Query($sql);
    }

    // Add to cart
    function addToCart($username, $itemid){
        $Username = $_SESSION['Username'];
        if(isset($Username) && isset($itemid)){
            $params = array(
                'user_id' => $username,
                'item_id' => $itemid
            );
            $result = Query($params);
        if($result)
        {
            redirect("index.php");
        }
        }
    }

    // Delete from cart
    function deleteCart($item_id =null, $table = 'Cart'){
        if($item_id != null){
        $result = Query("DELETE FROM {$table} WHERE  item_id={$item_id}");
        if($result){
            header("Location:" . $_SERVER['PHP_SELF']);
        }
        return $result;
        }
    }

    

    // Calculate subtotal
    function getSum($arr){
        if(isset($arr)){
            $sum = 0;
            foreach ($arr as $item){
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f' , $sum);
        }
    }

    // Get Cart ID
    function getCartid($cartArray = null, $key = "item_id"){
        if($cartArray != null){
            $cart_id = array_map(function ($value) use($key){
                return $value[$key];
            },$cartArray);
            return $cart_id;
        }
    }

    ///Delete from wihlist

    function deleteWishlist($item_id =null, $table = 'Wishlist'){
        if($item_id != null){
        $result = Query("DELETE FROM {$table} WHERE  item_id={$item_id}");
        if($result){
            header("Location:" . $_SERVER['PHP_SELF']);
        }
        return $result;
        }
    }

    // get wishlist ID
    function getWishlistid($wishlistArray = null, $key = "item_id"){
        if($wishlistArray != null){
            $wishlist_id = array_map(function ($value) use($key){
                return $value[$key];
            },$wishlistArray);
            return $wishlist_id;
        }
    }
    

    // Get product by id
    function getProduct($item_id = null, $table = 'Popular'){
        if(isset($item_id)){
            $sql =  "SELECT * FROM ($table) WHERE item_id=($item_id)";
            $result = Query($sql);
            $resultArray = array();

            // fetch productdata one by one
            while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }
            return $resultArray;
        }
    }

    // Get user by id
    function getuserid($user_id = null, $table = 'user'){
        if(isset($user_id)){
            $sql =  "SELECT * FROM ($table) WHERE User_Id=($user_id)";
            $result = Query($sql);
            $resultArray = array();

            // fetch userid one by one
            while($user = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $user;
            }
            return $resultArray;
        }
    }

    




?>

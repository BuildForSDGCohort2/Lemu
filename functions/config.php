<?php

ob_start();
session_start();

require_once('functions/db.php');
require_once('functions/functions.php');
include('templates/_report.php');
include('authentication/sign-up.php');
include('authentication/login.php');
include('templates/_checkout.php');

?>
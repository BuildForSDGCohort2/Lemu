<?php
require('database/DBController.php');
require('database/Cart.php');
// DB
$database = new DBController();
$cart = new Cart($database);

?> 
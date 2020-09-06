<?php

require('database/DBController.php');
require('database/Popular.php');
require('database/Banner_ad.php');
require('database/Banner_ad1.php');
require('database/Banner_ad2.php');
require('database/Daily.php');
require('database/Latest.php');
// require('database/Banner_ad2.php');

// DB
$database = new DBController();

$popular = new Popular($database);
$banner_ad = new Banner_ad($database);
$banner_ad1 = new Banner_ad1($database);
$banner_ad2 = new Banner_ad2($database);
$daily= new Daily($database);
$latest = new Latest($database);

// print_r($popular->getData());

?> 
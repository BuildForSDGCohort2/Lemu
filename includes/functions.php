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
$db = new DBController();

$popular = new Popular($db);
$banner_ad = new Banner_ad($db);
$banner_ad1 = new Banner_ad1($db);
$banner_ad2 = new Banner_ad2($db);
$daily= new Daily($db);
$latest = new Latest($db);

// print_r($popular->getData());

?> 
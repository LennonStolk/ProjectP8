<?php

$host = "localhost";
$dbname = "nftshop";
$dbusername = "admin";
$dbpassword = "admin5";
$connectStr = "mysql:host=" . $host . ";dbname=" . $dbname . ";charset=utf8";
$db = new PDO($connectStr, $dbusername, $dbpassword);
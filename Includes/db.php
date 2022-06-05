<?php

$host = "localhost";
$dbname = "nftshop";
$username = "admin";
$password = "admin5";
$connectStr = "mysql:host=" . $host . ";dbname=" . $dbname . ";charset=utf8";
$db = new PDO($connectStr, $username, $password);
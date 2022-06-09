<?php
session_start();

// Get announcement values
$content = (isset($_POST["content"]))
    ? $_POST["content"]
    : "";
$role = (isset($_SESSION["role"]))
    ? $_SESSION["role"]
    : "";
$username = (isset($_SESSION["username"]))
    ? $_SESSION["username"]
    : "";
$date = time();

// Error checking
if ($content == "" || $username == "") {
    header("Location: announcements.php");
    exit;
}
if ($role !== "ADMIN" && $role !== "SUPERUSER") {
    header("Location: announcements.php");
    exit;
}

// Insert new announcement into database
include_once "../Includes/db.php";
$sql = "INSERT INTO `nftshop_announcements` (`id`, `author`, `content`, `date`) 
        VALUES (null, :username, :content, :date)";
$vars = [
    "username" => $username,
    "content" => $content,
    "date" => $date,
];
$stmt = $db->prepare($sql);
$stmt->execute($vars);
$products = $stmt->fetchAll();

header("Location: announcements.php");
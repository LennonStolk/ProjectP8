<?php
$target_file = "../Documents/" . basename($_FILES["file"]["name"]);
$file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
    header("Location: documents.php");
    exit;
}

// Check if file size is bounds
if ($_FILES["file"]["size"] > 500000) {
    header("Location: documents.php");
    exit;
}

// Allow certain file formats
if ($file_type != "docx" && $file_type != "pdf") {
    header("Location: documents.php");
    exit;
}

// Upload file
move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
header("Location: documents.php");
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documents</title>
    <link rel="stylesheet" href="../Styling/main.css">
</head>
<body>
    <?php include "../Includes/navbar.php" ?>
    <style>
        .navbar > #nav-documents > a {
            color: #69c2b6;
            border-bottom: solid #69c2b6 2px;
            padding-bottom: 8px;
        }
        .navbar > #nav-documents:hover > a {
            color: rgb(27, 90, 86);
            border-bottom: solid rgb(27, 90, 86) 2px;
        }
    </style>
    <?php 
        // Get filename for download
        $download_filename = (isset($_GET["filename"]))
            ? basename($_GET["filename"])
            : "";
        $download_path = "../Documents/$download_filename";
        
        // Download file (Disables output buffer) then die
        if (file_exists($download_path) && $download_filename !== "") {
            if (ob_get_level()) ob_end_clean();
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($download_path).'"');
            header('Content-Length: ' . filesize($download_path));
            header('Pragma: public');
            readfile($download_path, true);
            exit;
        }
    ?>
    <section class="main">
        <form action="uploaddocument.php" method="post" enctype="multipart/form-data" class="file-form">
            <h3 class='title'>Upload file (docx, pdf)</h3>
            <input type="file" name="file">
            <input type="submit" value="Upload" name="submit">
        </form>
        <h3 class='title'>Files</h3>
        <section class="files">
            <?php 
                // Get role
                $role = (isset($_SESSION["role"]))
                    ? $_SESSION["role"]
                    : "";

                // Get document filenames
                $filenames = scandir("../Documents");
                $filenames = array_slice($filenames, 2);
                
                // Display files as html elements
                foreach ($filenames as $filename) {
                    $filename = htmlspecialchars($filename);
                    if ($role == "ADMIN") {
                        echo "
                            <article class='file'>
                                <img src='../Assets/document.png' class='file-img'>
                                <p>{$filename}</p>
                                <a href='documents.php?filename={$filename}'>
                                    <img src='../Assets/download.png' class='download'>
                                </a>
                            </article>";
                    }
                    else {
                        echo "
                            <article class='file'>
                                <img src='../Assets/document.png' class='file-img'>
                                <p>{$filename}</p>
                            </article>";
                    }
                }
            ?>
        </section>
    </section>
</body>
</html>
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
    <section class="main">
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
                
                foreach ($filenames as $filename) {
                    if ($role == "ADMIN") {
                        echo "
                            <article class='file'>
                                <img src='../Assets/document.png' class='file-img'>
                                <p>{$filename}</p>
                                <a href='documents.php?download=Bestandje.pdf'>
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
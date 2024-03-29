<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
    <link rel="stylesheet" href="../Styling/main.css">
</head>
<body>
    <?php include "../Includes/navbar.php" ?>
    <style>
        .navbar > #nav-announcements > a {
            color: #69c2b6;
            border-bottom: solid #69c2b6 2px;
            padding-bottom: 8px;
        }
        .navbar > #nav-announcements:hover > a {
            color: rgb(27, 90, 86);
            border-bottom: solid rgb(27, 90, 86) 2px;
        }
    </style>
    <section class="main">
        <section class="announcements">
            <?php
                // Get role
                $role = (isset($_SESSION["role"]))
                ? $_SESSION["role"]
                : "";

                // Get announcements
                include_once "../Includes/db.php";
                $sql = 'SELECT * FROM nftshop_announcements';
                $stmt = $db->prepare($sql);
                $stmt->execute();
                $announcements = $stmt->fetchAll();

                // Sort newest first
                function date_sort($a, $b) {
                    return ($b["date"]) - ($a["date"]);
                }
                usort($announcements, "date_sort");

                // Show create announcement menu if user is authorized
                if ($role == "ADMIN" || $role == "SUPERUSER") {
                    echo '<form action="createannouncement.php" method="POST" class="announcement-form">
                            <h3 class="title"> New announcement</h3>
                            <input type="text" class="text-input" placeholder="Message" name="content"></div>
                            <input type="submit" value="Post" class="button">
                        </form>';
                }

                // Display announcements
                foreach ($announcements as $announcement) {
                    $author = $announcement["author"];
                    $content = htmlspecialchars($announcement["content"]);
                    $date = date("d M Y", $announcement["date"]);

                    echo "<div class='announcement'>
                            <p class='announcement-meta'>
                                <span class='announcement-author'>$author</span> on $date
                            </p>
                            <p>$content</p>
                        </div>";
                }
            ?>
        </section>
    </section>
</body>
</html>
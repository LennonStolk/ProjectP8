<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="../Styling/main.css">
</head>
<body>
    <?php include "../Includes/navbar.php" ?>
    <section class="main">
        <?php 
            // Get user login inputs
            $username = (isset($_GET["username"]))
                ? $_GET["username"]
                : "";
            $password = (isset($_GET["password"]))
                ? $_GET["password"]
                : "";

            // Get products based on parameter
            include_once "../Includes/db.php";
            $sql = 'SELECT * FROM nftshop_users WHERE `name` = :name';
            $vars = ["name" => $username];
            $stmt = $db->prepare($sql);
            $stmt->execute($vars);
            $user = $stmt->fetch();

            if ($user !== false) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["username"] = $user["name"];
                    $_SESSION["role"] = $user["role"];
                    header("Location: products.php");
                }
            }

        ?>
        <form action="login.php" method="GET" class="log-in-form">
            <h3 class="title">Log in</h3>
            <input type="text" name="username" class="text-input" placeholder="Username">
            <input type="password" name="password" class="text-input" placeholder="Password">
            <input type="submit" value="Submit" class="button">
        </form>
    </section>
</body>
</html>
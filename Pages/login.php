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
            $username = (isset($_POST["username"]))
                ? $_POST["username"]
                : "";
            $password = (isset($_POST["password"]))
                ? $_POST["password"]
                : "";
        ?>
        <form action="login.php" method="POST" autocomplete="off" class="log-in-form">
            <h3 class="title">Log in</h3>
            <input type="text" name="username" class="text-input" placeholder="Username">
            <input type="password" name="username" class="text-input" placeholder="Password">
            <input type="submit" value="Submit" class="button">
        </form>
    </section>
</body>
</html>
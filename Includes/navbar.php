<style>
    <?php include '../Styling/navbar.css'; ?>
</style>

<ul class="navbar">
    <img src="../Assets/logo.png">
    <li id="nav-products">
        <a href="products.php">
            Products
        </a>
    </li>
    <li id="nav-announcements">
        <a href="announcements.php">
            Announcements
        </a>
    </li>
    <li id="nav-documents">
        <a href="documents.php">
            Documents
        </a>
    </li>
    <li id="nav-login">
        <a href="login.php">
            <?php
                session_start();
                if (isset($_SESSION["username"])) {
                    echo "<a href='logout.php'>Log out ({$_SESSION['username']})</a>";
                }
                else {
                    echo "Log in";
                }
            ?>
        </a>
    </li>
</ul>
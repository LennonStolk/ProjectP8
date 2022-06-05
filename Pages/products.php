<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="../Styling/main.css">
    
</head>
<body>
    <?php include "../Includes/navbar.php" ?>
    <style>
        .navbar > #nav-products > a {
            color: #69c2b6;
            border-bottom: solid #69c2b6 2px;
            padding-bottom: 8px;
        }
        .navbar > #nav-products:hover > a {
            color: rgb(27, 90, 86);
            border-bottom: solid rgb(27, 90, 86) 2px;
        }
    </style>
    <section class="main">
        <form action="products.php" method="GET">
            <input type="text" name="search" class="product-search" placeholder="Search by name">
        </form>
        <?php
            // Get search parameter
            $search = (isset($_GET["search"]))
            ? $_GET["search"]
            : "";

            if ($search == "") {
                echo "<h3 class='product-search-result'> Products</h3>";
            }
            else {
                echo "<h3 class='product-search-result'> Products containing '$search' </h3>";
            }
        ?>
        <section class="products">
            <?php 
                // Get products based on parameter
                include_once "../Includes/db.php";
                $sql = 'SELECT * FROM nftshop_products WHERE `name` LIKE CONCAT("%", :search, "%")';
                $vars = ["search" => $search];
                $stmt = $db->prepare($sql);
                $stmt->execute($vars);
                $products = $stmt->fetchAll();

                // Display products
                foreach ($products as $product) {
                    echo "<div class='product'>
                            <img src='../Assets/{$product["img_src"]}' class='product-image'>
                            <section class='product-description'>
                                <p class='product-label'>Name</p>
                                <p class='product-label'>Price</p>
                                <p>{$product["name"]}</p>
                                <p>€{$product["price"]}</p>
                            </section>
                        </div>";
                }
            ?>
        </section>
    </section>
</body>
</html>
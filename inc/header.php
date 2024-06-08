<?php
session_start();

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

$loggedIn = isset($_SESSION['user_id']) === true;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="/assets/images/kalsado-icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<nav>
        <div class="container mt-4">
            <div class="navbar">
                <div class="nav1">
                    <img src="./assets/images/kalsado-icon.png" alt="Logo of Kalsado" width="80" height="80" title="Kalsado">
                    <span class="logo-text" title="Kalsado">KALSADO</span>
                    <input type="text" class="search_input" placeholder="Search...">

                    <a href="index.php" class="nav_link" title="Home">Home</a>
                    <a href="collection.php" class="nav_link" title="Collection">Collection</a>
                    <a href="orders.php" class="nav_link" title="About">Orders</a>
                    <a href="cart.php" class="nav_link" title="Cart"><img src="./assets/images/cart-icon.png" width="40"></a>
                    <?php if (!$loggedIn): ?>
                        <a href="login.php" class="nav_link" title="Login">Login</a>
                    <?php else: ?>
                        <form method="post" action="" class="logout_form">
                            <input type="hidden" name="logout" value="true" >
                            <button type="submit" class="nav_link logout_btn" style="{text-decoration: none;
                                                                                    color: white;
                                                                                    margin-left: 20px;
                                                                                    padding: 3px 10px;
                                                                                    border-radius: 10px;
                                                                                    }
                                                                                    
                                                                                    :hover{background-color: white;
                                                                                        color: #f1d0b4;
                                                                                        border-radius: 10px;
                                                                                        transition: ease-in 0.3s;}"title="Logout">Logout</button>
                        </form>
                    <?php endif; ?>
            </div>
        </div>
    </nav>
<?php
session_start();

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<nav>
    <div class="container">
        <div class="navbar">
            <div class="nav1">
                <img src="./assets/images/kalsado-icon.png" alt="Logo of Kalsado" width="80" height="80" title="Kalsado">
                <span title="Kalsado" style="font-size: 200%; font-style: italic;">KALSADO</span>
                <input type="text" class="search_input" placeholder="Search...">
            </div>
            <div class="nav2">
                <a href="" class="nav_link" title="Home">Home</a>
                <a href="" class="nav_link" title="Collection">Collection</a>
                <a href="" class="nav_link" title="About">About</a>
                <a href="" class="nav_link_1" title="Cart"><img src="./assets/images/cart-icon.png" width="40"></a>
                <?php if (!$loggedIn): ?>
                    <a href="login.php" class="nav_link" title="Login">Login</a>
                <?php else: ?>
                    <form method="post" action="" style="display:inline;">
                        <input type="hidden" name="logout" value="true">
                        <button type="submit" class="btn btn-link nav_link" style="display:inline; padding: 0; margin: 0;" title="Logout">Logout</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
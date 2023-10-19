<?php

    if(!isset($_SESSION)) {
        session_start();
    };

    $auth = $_SESSION["login"] ?? false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real State</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <header class="header <?php echo $index ? "start" : ""; ?>">
    <!-- (Condition) ? (Statement1) : (Statement2);
    Condition: It is the expression to be evaluated which returns a boolean value.
    Statement 1: it is the statement to be executed if the condition results in a true state.
    Statement 2: It is the statement to be executed if the condition results in a false state. -->
        <div class="container header-content">
            <div class="bar">
                <a href="index.php">
                    <img src="/build/img/logo.svg" alt="Real State Logo">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="Responsive Menu Icon">
                </div>

                <div class="right">
                    <img class="dark-mode-button" src="/build/img/dark-mode.svg">

                    <nav class="navigation">
                        <a href="aboutus.php">About Us</a>
                        <a href="ads.php">Advertisements</a>
                        <a href="blog.php">Blog</a>
                        <a href="contact.php">Contact</a>
                        <?php if($auth): ?>
                            <a href="logout.php">Log Out</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div> <!--.bar-->

            <?php
                if($index) {
                    echo "<h1>Luxury Real Estate - Homes for Sale</h1>";
                };
            ?>
        </div>
    </header>
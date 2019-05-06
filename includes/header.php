<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/carousel.min.css">
    <link rel="stylesheet" href="styles/theme.default.min.css">
    <link rel="stylesheet" href="styles/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">

    <title>Podeman</title>
</head>
<body>
<div class="container">
    <header class="header-section-g">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logo-section" href="index.php">
                <img src="images/irani-shop-logo.png" alt="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                    aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">خانه<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">درباره ما</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ارتباط با ما</a>
                    </li>
                </ul>
                <div class="auth-btn">
                    <?php if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) {
                        ?>
                        <a href="logout.php">
                            <button class="btn btn-danger my-2 my-sm-0 ml-2 " type="submit">خروج</button>
                        </a>

                        <?php
                        if ((isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) && $_SESSION["user_type"] != "admin") { ?>
                            <a href="orders_tracking.php">
                                <button class="btn btn-info my-2 my-sm-0 ml-2 " type="submit">پیگیری</button>
                            </a>
                            <?php
                        }
                        ?>
                        <?php
                        if ((isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) && $_SESSION["user_type"] == "admin") { ?>
                            <a href="admin_products.php">
                                <button class="btn btn-info my-2 my-sm-0 ml-2 " type="submit">محصولات</button>
                            </a>
                            <a href="admin_orders_manage.php">
                                <button class="btn btn-info my-2 my-sm-0 ml-2 " type="submit">سفارشات</button>
                            </a>
                            <?php
                        }
                    } else {
                        ?>

                        <a href="register.php">
                            <button class="btn btn-success my-2 my-sm-0 ml-2 " type="submit">عضویت</button>
                        </a>
                        <a href="login.php">
                            <button class="btn btn-info my-2 my-sm-0" type="submit">ورود</button>
                        </a>

                        <?php
                    }
                    ?>
                </div>
            </div>
        </nav>
    </header>
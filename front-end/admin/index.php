<?php
require_once("../database/db_config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>SU30 | PDA+</title>
    <?php require_once('layout/style.php') ?>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>

    <div class="main-wrapper">
        <?php require_once('layout/header.php') ?>

        <?php require_once('layout/sidebar.php') ?>

        <div class="page-wrapper">
            <!-- Dynamic Content -->
            <?php
            if (isset($_GET['doctors'])) {

                require_once('pages/doctors/' . $_GET['doctors'] . '.php');

            } elseif (isset($_GET['doctors'])) {
                // 
            } else {
                # code...
                require_once('layout/main.php');
            }
            ?>
            <!-- Dynamic Content -->
            <div class="notification-box">
                <?php require_once('pages/message/notification.php') ?>
            </div>
        </div>
    </div>

    <div class="sidebar-overlay" data-reff=""></div>
    <?php require_once('layout/script.php') ?>

</body>



</html>
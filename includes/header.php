<?php
include_once '../config.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal Application</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= BASE_PATH?>/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="" class="navbar-brand" href="#">Journal App</a>

        <!-- Toggler/collapsible Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <?php if(isset($_SESSION['user_id'])) { ?>
                    <li class="nav-item"><a href="<?=BASE_PATH?>/pages/home.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="<?=BASE_PATH?>/pages/journal.php" class="nav-link">Journal</a></li>
                    <li class="nav-item"><a href="<?=BASE_PATH?>/pages/logout.php" class="nav-link">Logout</a></li>
                <?php } else { ?>
                    <li class="nav-item"><a href="<?=BASE_PATH?>/pages/login.php" class="nav-link">Login</a></li>
                    <li class="nav-item"><a href="<?=BASE_PATH?>/pages/register.php" class="nav-link">Register</a></li>
                <?php } ?>
            </ul>
        </div>
    </nav>

    <div class="container mt-4"> 

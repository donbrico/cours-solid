<?php
$route = $_SERVER['REQUEST_URI'] ?? '/';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report Builder | POO Lessons</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/lumen/bootstrap.min.css">
    <style>
        a.active {
            border-bottom: 3px solid darkgrey;
        }

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor03">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link<?= $route === '/report-creator' ? ' active':''?>" href="/report-creator">Créer un rapport</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?= $route === '/bulk-report' ? ' active':''?>" href="/bulk-report">Rapport en masse</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link<?= $route === '/poo-home' ? ' active':''?>" href="/poo-home">POO en PHP</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container pt-3">
        <?php require_once "../src/app.php" ?>
    </div>
</body>

</html>

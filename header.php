<?php
include_once "core/db.php"
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- <link href="style.css" rel="stylesheet"> -->
    <link href="sidebars.css" rel="stylesheet">
    <link href="bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <title>Document</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-xxl">
                <a class="navbar-brand" href="main.php">
                    <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                    Musicality
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="create_track.php">Загрузить песню</a>
                        </li>
                    </ul>
                    <form class="d-flex" method="get" action="search.php">
                        <input name="search_string" class="form-control mr-2" type="search" placeholder="Исполнитель или трек" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Найти</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>



    <div class="container-sm my-4 bd-layout">
        <div class="row">
            <div class="bg-white col-sm-3" style="width: 280px;">
                <ul class="list-unstyled ps-0">
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                            Жанры
                        </button>
                        <div class="collapse show" id="home-collapse" style>
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <?php
                                $genres = getAllGenre();
                                foreach ($genres as $key => $genre) { ?>
                                    <li><a href="" class="link-dark rounded"><?php echo $genre["name"] ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                            Треки
                        </button>
                        <div class="collapse" id="dashboard-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li><a href="#" class="link-dark rounded">ТОП 100</a></li>
                                <li><a href="#" class="link-dark rounded">ТОП недели</a></li>
                                <li><a href="#" class="link-dark rounded">Новинки недели</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                            Исполнители
                        </button>
                        <div class="collapse" id="orders-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <?php
                                $composers = getAllComposers();
                                foreach ($composers as $key => $composer) { ?>
                                    <li><a href="" class="link-dark rounded"><?php echo $composer["alias"] ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
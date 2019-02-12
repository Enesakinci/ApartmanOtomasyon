<?php
/**
 * Created by PhpStorm.
 * User: Enes
 * Date: 26.11.2018
 * Time: 20:38
 */
?>

<html>
<head>

    <meta charset="utf-8">
    <title>Apartman Gelir-Gider Aidat Takip Sistemi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style4.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>
<body>
<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Apartman Kullanici Sistemi</h3>
            <strong>AS</strong>
        </div>

        <ul class="list-unstyled components">
            <li class="active">
                <a href="../project/kullanici.php" >
                    <i class="fas fa-home"></i>
                    Anasayfa
                </a>
            </li>
            <li>
                <a href="../project/kDuyuru.php">
                    <i class="fas fa-bullhorn"></i>
                    Duyurular
                </a>
            </li>
            <li>
                <a href="../project/kBorc.php">
                    <i class="fas fa-bullhorn"></i>
                    Borç Görüntüle
                </a>
            </li>

        </ul>

    </nav>

    <!-- Page Content  -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                            <form action="" method="post">
                                <button type="submit" class="close"name="cikis" value="çıkış yap">Çıkış Yap</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

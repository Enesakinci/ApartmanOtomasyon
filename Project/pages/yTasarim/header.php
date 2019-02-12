<?php
/**
 * Created by PhpStorm.
 * User: Enes
 * Date: 26.11.2018
 * Time: 20:32
 */
?>
<html>
<head>

    <meta charset="utf-8">
    <title>Apartman Gelir-Gider Aidat Takip Sistemi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style4.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <!-- Font Awesome JS -->
    <script src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>
<body>
<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Apartman Yönetim Sistemi</h3>
            <strong>AS</strong>
        </div>

        <ul class="list-unstyled components">
            <li class="active">
                <a href="../project/index.php" >
                    <i class="fas fa-home"></i>
                    Anasayfa
                </a>
            </li>
            <li>
                <a href="../project/yDuyuru.php">
                    <i class="fas fa-bullhorn"></i>
                    Duyuru Ekle
                </a>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-hand-holding-usd"></i>
                    Borçlandır
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="../project/yAidat.php">Aidat</a>
                    </li>
                    <li>
                        <a href="../project/yKomur.php">Kömür</a>
                    </li>
                    <li>
                        <a href="../project/yAsansor.php">Asansör</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="../project/yGelirSec.php">
                    <i class="fas fa-plus"></i>
                    Gelir Ekle
                </a>
            </li>
            <li>
                <a href="../project/yListele.php">
                    <i class="fas fa-address-book"></i>
                    Kullanıcı Listele
                </a>
            </li>
            <li>
                <a href="yKasa.php">
                    <i class="fas fa-piggy-bank"></i>
                    Kasa
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
                    <i class="fas fa-sign-out-alt"></i>
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

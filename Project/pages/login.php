<?php
session_start();
if(isset($_SESSION['username'])){
    header("Location:../index.php");
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Apartman Gelir-Gider Aidat Takip Sistemi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
</head>
<body>

<form class="box" action="giris.php" method="post">
    <div class="login-box">
        <h1>Giriş</h1>
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Kullanıcı Adı" name="kullanici">
        </div>

        <div class="textbox">
            <i class="fas fa-unlock"></i>
            <input type="password" placeholder="Şifre" name="sifre">
        </div>
        <select  class="form-control" name="secim">
                <option value="1">Kullanıcı </option>

                <option value="2">Yönetici</option>
        </select>
        <input class="btn" name="giris_buton" type="submit" value="Giriş Yap">
        <input class="btn2"  type="button" onClick="parent.location='register.php'" value="Kayıt Ol">
    </div>

</form>


</body>
</html>

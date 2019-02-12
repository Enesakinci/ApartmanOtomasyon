<?php
/**
 * Created by PhpStorm.
 * User: Enes
 * Date: 28.12.2018
 * Time: 00:51
 */
include "../classes/DataBase.php";

if(isset($_POST["kayit"])){

    $db = new DataBase;
    $table = "kullanici";

    $kullanici=$_POST["kullanici"];
    $k_sifre=$_POST["sifre"];
    $adi=$_POST["ad"];
    $a_id=$_POST["apartman"];
    $tel=$_POST["telefon"];
    $mail=$_POST["email"];
        $userArray = array(
            'K_adi' => $kullanici,
            'sifre' => $k_sifre,
            'ad' => $adi,
            'apartman_id' => $a_id,
            'telefon' => $tel,
            'email' => $mail,
            'borc'=> 0
        );
    $db->insert($table, $userArray);
    ob_start();
    header("Location: login.php");

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

<form class="box" action="" method="post">
    <div class="login-box">
        <h1>Kayıt Ol</h1>
        <div class="textbox">
            <i class="fas fa-user"></i>
            <input type="text" class="form-control" placeholder="Kullanıcı Adı" name="kullanici">
        </div>
        <div class="textbox">
            <i class="fas fa-unlock"></i>
            <input type="password" class="form-control" placeholder="Şifre" name="sifre">
        </div>
        <div class="textbox">
            <i class="fas fa-signature"></i>
            <input type="text" class="form-control" placeholder="Ad" name="ad">
        </div>
        <div class="textbox">
            <i class="fas fa-building"></i>
            Apartman Adı
            <?php
            $db=new DataBase;
            $table="apartman";

            $yetkili = null;
            $yetkili = $db->selectOr($table, $yetkili);
            echo "<select  class=\"form-control\" name='apartman'>";

            foreach($yetkili as $kisi)
            {

                echo "<option  value=".$kisi["id"].">".$kisi["apartman_adi"]."</option>";

            }
            echo "</select>";
            ?>
        </div>
        <div class="textbox">
            <i class="fas fa-phone"></i>
            <input type="text" class="form-control" placeholder="Telefon" name="telefon">
        </div>
        <div class="textbox">
            <i class="fas fa-at"></i>
            <input type="text" class="form-control" placeholder="Email" name="email">
        </div>



        <input class="btn" name="kayit" type="submit" value="Kayıt Ol">

    </div>

</form>


</body>
</html>


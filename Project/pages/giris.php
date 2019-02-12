<?php
/**
 * Created by PhpStorm.
 * User: Enes
 * Date: 3.01.2019
 * Time: 20:17
 */session_start();
if(isset($_SESSION['username'])){
    header("Location:../index.php");
}
$host = "localhost";
$username = "root";
$password = "";
$database = "apartman";
$message = "";


if(isset($_POST["giris_buton"]))
{
    $kim= $_POST["secim"];
    $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($kim==2) {
        try {

            if (empty($_POST["kullanici"]) || empty($_POST["sifre"])) {
                echo '<script type="text/javascript">alert("Boş alanları doldurunuz.");</script>';
            } else {
                $query = "SELECT * FROM yonetici WHERE Kullanici_Adi = :kullanici AND Sifre = :sifre";
                $statement = $connect->prepare($query);
                $statement->execute(
                    array(
                        'kullanici' => $_POST["kullanici"],
                        'sifre' => $_POST["sifre"]
                    )
                );
                $count = $statement->rowCount();
                if ($count > 0) {
                    $_SESSION["username"] = $_POST["kullanici"];
                    header("location: ../index.php");
                } else {
                    echo '<script type="text/javascript">alert("Kullanıcı adı veya şifre yanlış");</script>';
                }
            }
        } catch (PDOException $error) {
            echo '<script type="text/javascript">window.alert("Kullanıcı Bulunamadı.");</script>';
        }
    }
    if ($kim==1) {
        try {
            if (empty($_POST["kullanici"]) || empty($_POST["sifre"])) {
                echo '<script type="text/javascript">alert("Boş alanları doldurunuz.");</script>';
            }
            else {
                $query = "SELECT * FROM kullanici WHERE K_Adi = :kullanici AND sifre = :sifre";
                $statement = $connect->prepare($query);
                $statement->execute(
                    array(
                        'kullanici' => $_POST["kullanici"],
                        'sifre' => $_POST["sifre"]
                    )
                );
                $count = $statement->rowCount();
                if ($count > 0) {
                    $_SESSION["username"] = $_POST["kullanici"];
                    header("location: ../kullanici.php");
                } else {
                    echo '<script type="text/javascript">alert("Kullanıcı adı veya şifre yanlış");</script>';
                }
            }
        } catch (PDOException $error) {
            echo '<script type="text/javascript">window.alert("Kullanıcı Bulunamadı.");</script>';
        }
    }

}
?>
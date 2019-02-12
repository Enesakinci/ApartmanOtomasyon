<?php
/**
 * Created by PhpStorm.
 * User: Enes
 * Date: 3.01.2019
 * Time: 21:53
 */
session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:pages/login.php");

}
if(isset($_POST["cikis"]))
{

    unset($_SESSION["username"]);
    header("Location:pages/login.php");

}
include "classes/DataBase.php";
include "pages/kTasarim/header.php";
?>

<?php
$dblist=new DataBase;
$db = new DataBase;
$dbduyuru = new DataBase;
$table="kullanici";
$table2 ="apartman";
$table3="duyurular";
$yetkili = null;
echo $yetkili;
$yetkili = $dblist->selectOr($table, $yetkili);
//eğer kayıt varsa herzaman iki boyutlu bir dizi döner yoksa boş döner
foreach ($yetkili as $kisi) {
    if ($_SESSION["username"] == $kisi["K_adi"]) {
        $apartman_adi = $db->selectwhere($table2, $kisi["apartman_id"]);
        foreach ($apartman_adi as $yazdir) {
            echo '<h1 style="text-align: center">'.$yazdir["apartman_adi"].'</h1>';
            $apt=$yazdir["apartman_adi"];
            //echo $apt;
        }
        $duyurular = $dbduyuru->selectwhereDuyuru($table3, $apt);

        foreach ($duyurular as $duyuru) {
            echo '<h2>'.$duyuru["duyuru_baslik"].'</h2>';
            echo '<h5>'.$duyuru["duyuru"].'</h5>';
        }

    }
}
?>

<?php
include "pages/kTasarim/footer.php";
?>
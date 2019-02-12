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
<h1>Borcunuz :</h1>
<?php
$db = new DataBase;

$table="kullanici";
$yetkili = null;
$yetkili = $db->selectOr($table, $yetkili);
//eğer kayıt varsa herzaman iki boyutlu bir dizi döner yoksa boş döner
foreach ($yetkili as $kisi) {

    if ($_SESSION["username"] == $kisi["K_adi"]) {
        echo '<h3>' . $kisi["borc"].'</h3>';

    }
}
?>

<?php
include "pages/kTasarim/footer.php";
?>
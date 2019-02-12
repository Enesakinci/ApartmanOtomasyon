<?php
include "classes/DataBase.php";
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
?>
<?php
include "pages/yTasarim/header.php";
?>

<?php

                        $db1 = new Database;
                        $table = "kasa";
                        $yetkili = null;
                        $yetkili = $db1->selectOr($table, $yetkili);
                        $toplam=0;

                        foreach($yetkili as $kisi)
                        {
                            $toplam= $toplam+$kisi["Nakit"];

                        }
                        echo "<h1>Toplam Gelir Miktarı : ".$toplam."</h1>";

?>

<?php
include "pages/yTasarim/footer.php";
?>


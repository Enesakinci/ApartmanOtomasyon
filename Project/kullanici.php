<?php
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
    include "pages/kTasarim/header.php";
    include "classes/DataBase.php";
?>




<h1 style="	text-align: center;">
<?php
$dblist=new DataBase;
$db = new DataBase;
$table="kullanici";
$table2 ="apartman";
$yetkili = null;
echo $yetkili;
$yetkili = $dblist->selectOr($table, $yetkili);
//eğer kayıt varsa herzaman iki boyutlu bir dizi döner yoksa boş döner
foreach ($yetkili as $kisi){
    if ($_SESSION["username"]== $kisi["K_adi"]){
         $apartman_adi = $db->selectwhere($table2,$kisi["apartman_id"]);
         foreach ($apartman_adi as $yazdir){
             echo $yazdir["apartman_adi"];
        }

    }

}
?>
</h1>
    <div class="line"></div>
<h2>Hoşgeldiniz <?php echo $_SESSION["username"]; ?> !</h2>
<?php
    include "pages/kTasarim/footer.php";

?>
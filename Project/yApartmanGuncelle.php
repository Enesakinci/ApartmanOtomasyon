<?php
/**
 * Created by PhpStorm.
 * User: Enes
 * Date: 27.12.2018
 * Time: 22:22
 */
include "classes/DataBase.php";
ob_start();
$db=new DataBase();
$table="apartman";
$id=$_GET["guncelle"];

$kayit=$db->selectwhere($table,$id);

if(isset($_POST["guncelle"])) {
    $apartman_adi = $_POST["apartman_adi"];
    $adres = $_POST["adres"];
    $daire_sayisi = $_POST["daire_sayisi"];
    $yonetici = $_POST["yonetici"];
    $telefon = $_POST["telefon"];
    $uretim_yili = $_POST["uretim_yili"];

    $userArray = array(
        'apartman_adi' => $apartman_adi,
        'adres' => $adres,
        'daire_sayisi' => $daire_sayisi,
        'yonetici' => $yonetici,
        'telefon' => $telefon,
        'uretim_yili' => $uretim_yili
    );
    $db->update($table,$id,$userArray);
    header("Location: index.php");


}

?>

<?php
include "pages/yTasarim/header.php";

?>

<h2>Apartman Bilgileri Güncelle</h2>

<div class="line"></div>
<div class="form-group row">
    <div class="col-sm-10">
        <?php
        echo "<table class='table'>";
        echo "<form name='frm' action='' method='post'>";
        foreach($kayit as $kisi)
        {

            echo "<tr>";
            echo "<td hidden='hidden'>".$kisi["id"]."</td><td hidden='hidden'></td><tr>"
                ."<td>Apartman Adı</td><td><input type='text' class=\"form-control\"  name='apartman_adi' id='apartman_adi' value='".$kisi["apartman_adi"]."'></td></tr><tr>"
                ."<td>Adres</td><td><input type='text' name=\"adres\" class=\"form-control\" id=\"adres\" value='".$kisi["adres"]."'></td></tr><tr>"
                ."<td>Daire Sayısı</td><td> <input type='text' name=\"daire_sayisi\" class=\"form-control\" id=\"daire_sayisi\" value='".$kisi["daire_sayisi"]."'></td></tr><tr>";
    echo "<tr><td>Yönetici İsmi</td><td>";

            $table = "yonetici";
            $yetkili = null;
            $yetkili = $db->selectOr($table, $yetkili);
            echo "<select  class=\"form-control\" name='yonetici'>";

            foreach($yetkili as $yonetici)
            {

                echo "<option >".$yonetici["Kullanici_adi"]."</option>";

            }
            echo "</select></td></tr>";


                echo "<td>Telefon</td><td> <input type='text' class=\"form-control\"  name='telefon' value='".$kisi["telefon"]."'></td></tr><tr>"
                ."<td>Yapım Tarihi</td><td> <input type='text' class=\"form-control\"  name='uretim_yili' value='".$kisi["uretim_yili"]."'></td></tr><tr>"
                ."<td></td><td> <button class='btn btn-primary '  value='".$kisi["id"]."'  name='guncelle' id='guncelle'>Güncelle</button></td>";
            echo "</tr>";

        }
        echo " </table>
    </form> ";
        ?>

        </div>
    </div>



<?php
include "pages/yTasarim/footer.php";
?>

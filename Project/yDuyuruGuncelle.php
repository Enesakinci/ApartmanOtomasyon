<?php
/**
 * Created by PhpStorm.
 * User: Enes
 * Date: 27.12.2018
 * Time: 23:23
 */
include "classes/DataBase.php";
ob_start();
$db=new DataBase();
$table="duyurular";
$id=$_GET["guncelle"];


$kayit=$db->selectwhere($table,$id);




if(isset($_POST["guncelle"])) {
    $apartman_adi =$_POST["apartman_adi"];
    $duyuru_baslik= $_POST["duyuru_baslik"];
    $duyuru= $_POST["duyuru"];

    $userArray = array(
        'apartman_adi' => $apartman_adi,
        'duyuru_baslik' => $duyuru_baslik,
        'duyuru' => $duyuru
    );
    $db->update($table,$id,$userArray);
    header("Location: yDuyuru.php");


}
?>
<?php
include "pages/yTasarim/header.php";
?>
<h2>Duyuruları Güncelle</h2>

<div class="line"></div>
<div class="form-group row">
    <div class="col-sm-10">
        <?php
        echo "<table class='table'>";
        echo "<form name='frm' action='' method='post'>";
        foreach($kayit as $kisi)
        {

            echo "<tr>";
            echo "<td hidden='hidden'>".$kisi["id"]."</td>"
            ."<tr><td>Apartman Adı</td><td>";
            $table1 = "apartman";
            $yetkili = null;
            $yetkili = $db->selectOr($table1, $yetkili);
            echo "<select  class=\"form-control\" name='apartman_adi'>";

            foreach($yetkili as $kisi1)
            {

                echo "<option >".$kisi1["apartman_adi"]."</option>";

            }
            echo "</select></td></tr>";
            echo "<td>Başlık</td><td><input type='text' class=\"form-control\"  name=\"duyuru_baslik\" id='duyuru_baslik' value='".$kisi["duyuru_baslik"]."'></td></tr><tr>"
                ."<td>Duyuru</td><td><input type='text' name='duyuru' class=\"form-control\" value='".$kisi["duyuru"]."' id=\"duyuru\"></input></td></tr><tr>"
                ."<td> <button class='btn btn-primary '  value='".$kisi["id"]."'  name='guncelle' id='guncelle'>Güncelle</button></td>";
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


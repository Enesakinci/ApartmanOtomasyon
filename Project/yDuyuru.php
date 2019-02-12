<?php
/**
 * Created by PhpStorm.
 * User: Enes
 * Date: 26.11.2018
 * Time: 21:37
 */
include 'classes/DataBase.php';
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
     $dbsil= new database();
if (isset($_POST["sil"])){

    $table = "duyurular";
    $dbsil->delete($table,$_POST['sil']);


}

?>
    <h2>Duyurular</h2>

    <div class="line"></div>
    <form method="post" action="" name="frm1">
        <div class="form-group row">
            <label for="input" class="col-sm-2 col-form-label">Apartman İsmi</label>
            <div class="col-sm-10">
                <?php
                $db1 = new Database;
                $table = "apartman";
                $yetkili = null;
                $yetkili = $db1->selectOr($table, $yetkili);
                echo "<select  class=\"form-control\" name='apartman_adi'>";

                foreach($yetkili as $kisi)
                {

                    echo "<option >".$kisi["apartman_adi"]."</option>";

                }
                echo "</select>";
                ?>
            </div>
        </div>
        <input type="text" hidden="hidden" name="id" class="form-control"  id="id">
        <div class="form-group row">
            <label for="input" class="col-sm-2 col-form-label">Başlık</label>
            <div class="col-sm-10">
                <input type="text" name="duyuru_baslik" class="form-control"  id="duyuru_baslik" placeholder="Duyuru Başlığı">
            </div>
        </div>

        <div class="form-group row">
            <label for="input" class="col-sm-2 col-form-label">Duyuru</label>
            <div class="col-sm-10">
                <textarea type="text" name="duyuru" class="form-control" id="duyuru" placeholder="Duyuru"></textarea>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" name="ekle" class="btn btn-primary">Ekle</button>

                <button type="submit" name="listele" class="btn btn-success">Listele</button>
            </div>
        </div>

    </form>
<?php

if(isset($_POST["listele"])){
    $dblist=new DataBase;
    $table="duyurular";

    $yetkili = null;
    $yetkili = $dblist->selectOr($table, $yetkili);
    //eğer kayıt varsa herzaman iki boyutlu bir dizi döner yoksa boş döner
        echo "<table  class='table table-striped'>
      <thead>
        <tr>
          <th >Apartman Adı</th>
          <th >Duyuru Başlık</th>
          <th >Duyuru</th>
          <th >İşlem</th>
        </tr>
      </thead>";
    foreach($yetkili as $kisi)
    {
        echo "<tr>";
        echo "<td hidden='hidden'>".$kisi["id"]."</td>"."
              <td>".$kisi["apartman_adi"]."</td>"."
             <td>".$kisi["duyuru_baslik"]."</td>"."
             <td>".$kisi["duyuru"]."</td>";
        echo "<td><form action='' method='post' ><button name='sil' id='sil' class='btn btn-danger'  value='".$kisi["id"]."'>Sil</button></form>
         <form action='yDuyuruGuncelle.php' method='get'><button name=\"guncelle\" id='guncelle' value='".$kisi["id"]."' class=\"btn btn-info\">Güncelle</button>

</form></td>";
        echo "</tr>";
    }
    echo "</table>";

}
if(isset($_POST["ekle"])) {
    $apartman_adi=$_POST["apartman_adi"];
    $duyuru_baslik=$_POST["duyuru_baslik"];
    $duyuru=$_POST["duyuru"];

    $db = new DataBase;
    $table = "duyurular";

    $userArray = array(
        'apartman_adi' => $apartman_adi,
        'duyuru_baslik' => $duyuru_baslik,
        'duyuru' => $duyuru
    );
    $db->insert($table, $userArray);
}

?>



<?php
    include "pages/yTasarim/footer.php";
?>
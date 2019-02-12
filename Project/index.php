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

    $dbsil= new database();

    if (isset($_POST["sil"])) {

        $table = "apartman";
        $dbsil->delete($table, $_POST['sil']);
    }

    ?>


        <h2>Apartman Bilgileri</h2>

        <div class="line"></div>

    <form method="post" action="" name="frm1">

        <div class="form-group row">
            <label for="input" class="col-sm-2 col-form-label">Apartman Adı</label>
            <div class="col-sm-10">
                <input type="text" name="apartman_adi" class="form-control" id="apartman_adi" placeholder="Apartman Adı">
            </div>
        </div>

        <div class="form-group row">
            <label for="input" class="col-sm-2 col-form-label">Adres</label>
            <div class="col-sm-10">
                <input type="text" name="adres" class="form-control" id="adres" placeholder="Adres">
            </div>
        </div>

        <div class="form-group row">
            <label for="input" class="col-sm-2 col-form-label">Daire Sayısı</label>
            <div class="col-sm-10">
                <input type="text" name="daire_sayisi" class="form-control" id="daire_sayisi" placeholder="Daire Sayısı">
            </div>
        </div>
        <div class="form-group row">
            <label for="input" class="col-sm-2 col-form-label">Yönetici İsmi</label>
            <div class="col-sm-10">
                <?php
                $db1 = new Database;
                $table = "yonetici";
                $yetkili = null;
                $yetkili = $db1->selectOr($table, $yetkili);
                echo "<select  class=\"form-control\" name='yonetici'>";

                foreach($yetkili as $kisi)
                {

                    echo "<option >".$kisi["Kullanici_adi"]."</option>";

                }
                echo "</select>";
                ?>
            </div>
        </div>
        <div class="form-group row">
            <label for="input" class="col-sm-2 col-form-label">Telefon</label>
            <div class="col-sm-10">
                <input type="text" name="telefon" class="form-control" id="telefon" placeholder="Telefon">
            </div>
        </div>
        <div class="form-group row">
            <label for="input" class="col-sm-2 col-form-label">Yapım Tarihi</label>
            <div class="col-sm-10">
                <input type="text" name="uretim_yili" class="form-control" id="uretim_yili" placeholder="Yapım Tarihi">
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
    $table="apartman";

    $yetkili = null;
    $yetkili = $dblist->selectOr($table, $yetkili);
//eğer kayıt varsa herzaman iki boyutlu bir dizi döner yoksa boş döner
    echo "<table  class='table table-striped'>
  <thead>
    <tr>
      
      <th >Apartman Adı</th>
      <th >Adres</th>
      <th >Daire Sayısı</th>
      <th >Yönetici</th>
      <th >Telefon</th>
      <th >Üretim Yılı</th>
      <th >İşlem</th>
    </tr>
  </thead>";
    foreach($yetkili as $kisi)
    {
        echo "<tr>";
        echo "<td>".$kisi["apartman_adi"]."</td>"."<td>".$kisi["adres"]."</td>"."<td>".$kisi["daire_sayisi"]."</td>"."<td>".$kisi["yonetici"]."</td>"."<td>".$kisi["telefon"]."</td>"."<td>".$kisi["uretim_yili"]."</td>";
        echo "<td>
        <form action='' method='post' ><button name='sil' id='sil' class='btn btn-danger'  value='".$kisi["id"]."'>Sil</button></form>
       <form action='yApartmanGuncelle.php' method='get'><button name=\"guncelle\" id='guncelle' value='".$kisi["id"]."' class=\"btn btn-info\">Güncelle</button>
            </form></td>";
        echo "</tr>";
    }
    echo "</table>";

}
if(isset($_POST["ekle"])) {
    $apartman_adi=$_POST["apartman_adi"];
    $adres=$_POST["adres"];
    $daire_sayisi=$_POST["daire_sayisi"];
    $yonetici =$_POST["yonetici"];
    $telefon=$_POST["telefon"];
    $uretim_yili =$_POST["uretim_yili"];


    $db = new DataBase;
    $table = "apartman";

    $userArray = array(
        'apartman_adi' => $apartman_adi,
        'adres' => $adres,
        'daire_sayisi' => $daire_sayisi,
        'yonetici' => $yonetici,
        'telefon' => $telefon,
        'uretim_yili' => $uretim_yili
    );
    $db->insert($table, $userArray);
}

?>

<?php
    include "pages/yTasarim/footer.php";
?>
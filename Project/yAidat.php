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
?>


<?php
$db = new DataBase;
$db2 = new DataBase;
if(isset($_GET["ekle"])) {
    $apartman_id= $_GET["apartman_id"];

    $ucret = $_GET["aidatUcret"];
    $yorum = $_GET["yorum"];
    $aylar = $_GET["aylarCmb"];


    $table = "aidat";

    $userArray = array(
        'apartman_id' => $apartman_id,
        'ucret' => $ucret,
        'yorum' => $yorum,
        'aylar' => $aylar
    );
    $db->insert($table, $userArray);

    $table2="kullanici";
    $kayit=null;
    $kayit=$db2->selectwhereucret($table2,$apartman_id);
    if($kayit!=null){
        foreach($kayit as $kisi1)
        {
            $borcpara = $kisi1["borc"];

            $borcpara= $ucret + $borcpara;

            $userArray1=array(
                'borc' => $borcpara
            );
            $db2->update($table2,$kisi1['id'],$userArray1);

        }

    }
    else{
    }

}
?>

<h2>Aidat Ücreti Ekle</h2>

<div class="line"></div>
<div class="row ekran" >
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Aidat Kaydet</div>
            </div>
            <form action="" method="get" name="frm1">
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Apartman İsmi</label>

                        <?php
                        $db1 = new Database;
                        $table = "apartman";
                        $yetkili = null;
                        $yetkili = $db1->selectOr($table, $yetkili);
                        echo "<select  class=\"form-control\" name='apartman_id'>";

                        foreach($yetkili as $kisi)
                        {

                            echo "<option value='".$kisi["id"]."' >".$kisi["apartman_adi"]."</option>";

                        }
                        echo "</select>";
                        ?>

                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Aidat Ayı</label>
                    <select class="form-control" name="aylarCmb">
                        <option value="1"> Ocak</option>
                        <option value="2"> Şubat</option>
                        <option value="3"> Mart</option>
                        <option value="4"> Nisan </option>
                        <option value="5"> Mayıs</option>
                        <option value="6"> Haziran</option>
                        <option value="7"> Temmuz</option>
                        <option value="8"> Ağustos</option>
                        <option value="9"> Eylül</option>
                        <option value="10"> Ekim</option>
                        <option value="11"> Kasım</option>
                        <option value="12"> Aralık</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="aidatUcret">Aidat Ücreti</label>
                    <input type="text" class="form-control" name="aidatUcret" placeholder="Ücret">

                </div>

                <div class="form-group">
                    <label for="comment">Yorum</label>
                    <textarea class="form-control" name="yorum" id="comment" rows="5"></textarea>
                </div>

            </div>
            <div class="card-action">
                <button class="btn btn-success" type="submit" name="ekle" ">Kaydet</button>
            </div>
        </div>
        </form>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Kayıtlı Kullanicilar</div>
            </div>
            <div class="card-body">

                <div class="form-group">

                    <?php
                    $dblist=new DataBase;
                    $db = new DataBase;
                    $table="kullanici";
                    $table2 ="apartman";
                    $yetkili = null;
                    $yetkili = $dblist->selectOr($table, $yetkili);
                    //eğer kayıt varsa herzaman iki boyutlu bir dizi döner yoksa boş döner
                    echo "<table  class='table table-striped'>
                      <thead>
                        <tr>
                          
                          <th >Adı</th>
                          <th >Apartman Adı</th>
                          <th >Borç</th>

                        </tr>
                      </thead>";
                    foreach($yetkili as $kisi)
                    {
                        echo "<tr>";
                        echo "<td>".$kisi["ad"]."</td>"
                            ."<td>";

                            $kayit=$db->selectwhere($table2,$kisi["apartman_id"]);

                            foreach($kayit as $kisi1)
                            {
                                 echo $kisi1["apartman_adi"];
                            }
                            echo "</td>"
                            ."<td>".$kisi["borc"]."</td>";

                        echo "</tr>";
                    }
                    echo "</table>";

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="line"></div>

<?php
    include "pages/yTasarim/footer.php";
?>

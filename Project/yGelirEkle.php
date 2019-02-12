<?php

include "classes/DataBase.php";
ob_start();
session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:pages/login.php");
    ob_end_flush();
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
$db= new DataBase();
$table="kullanici";
$id=$_GET["sec"];
$kayit=$db->selectwhere($table,$id);

if (isset($_POST["odemeyap"]))
{
    $tutar = $_POST["tutar"];
    $table2="gelir";
    $userArray1 = array(
        'k_id' => $id,
        'GelirTL' => $tutar
    );
    $db->insert($table2, $userArray1);

    $kasarrray = array(
        'Nakit' => $tutar
    );
    $db->insert("kasa",$kasarrray);
    $borc =$_POST["borc"];
    $tutar = $borc-$tutar;

    $userArray = array(
        'borc' => $tutar
    );
    //echo $userArray[1];
    $db->update($table,$id,$userArray);





    ob_start();
    header("Location:yGelirSec.php");

}

?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Ödeme</h4>
                        <p class="category"></p>
                    </div>
                    <div class="content table-responsive table-full-width">


                        <?php
                        echo "<table class='table'>";
                        echo "<form name='frm' action='' method='post'>";
                        foreach($kayit as $kisi)
                        {
                            echo "<tr>";
                            echo "<td hidden='hidden'><input type='text' class=\"form-control\"  name='borc' id='borc' value='".$kisi["borc"]."'></td><tr>"
                                ."<td>Ödeme Yapılan Tutar</td><td><input type='text' class=\"form-control\"  name='tutar' id='tutar' value='".$kisi["borc"]."'></td></tr><tr>"

                                ."<td></td><td> <button class='btn btn-primary '  value='".$kisi["id"]."'  name='odemeyap' id='odemeyap'>Ödeme Yap</button></td>";
                            echo "</tr>";

                        }
                        echo " </table>
                        </form> ";
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "pages/yTasarim/footer.php";
?>
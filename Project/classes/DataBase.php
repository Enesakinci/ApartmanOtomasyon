<?php
/**
 * Created by PhpStorm.
 * User: AHMETGÜRKANYÜKSEK
 * Date: 27.10.2018
 * Time: 16:11
 */
include "dbConfig.php";

class DataBase extends dbConfig
{
    protected $connection;

    function __construct() {

        parent::createConfig();
        try{
            $dsn = 'mysql:host=' . $this->dbConfig['host'] . ';dbname=' . $this->dbConfig['dbname'];
            $this->connection = new PDO($dsn, $this->dbConfig['username'], $this->dbConfig['password']);
            $this->connection->query("SET NAMES utf8");
            $this->connection->query("SET CHARACTER SET utf8");
            $this->connection->query("SET COLLATION_CONNECTION = 'utf8_general_ci");
            return true;
        }catch(PDOException $error){
            $errorMesage = 'Hata : Veritabanı bağlantısı kurulamadı !<br>Hata Mesajı =>'.$error->getMessage();
            return $errorMesage;
        }
    }

    public function selectOr($table, $array = null) {
        if($array == null){
            $sql = "SELECT * FROM ".$table;
        }else{
            $columns = array_keys($array);
            $values = array_values($array);
            $sqlString = "";
            for($i=0;$i<count($columns);$i++){
                if($i==count($columns)-1){
                    $sqlString .= $columns[$i]." = '".$values[$i]."' ";
                }else{
                    $sqlString .= $columns[$i]." = '".$values[$i]."' or ";
                }
            }
            $sql = "SELECT * FROM ".$table." WHERE ".$sqlString;
        }
        $select = $this->connection->query($sql);
        if ($select) {
            $row = $select->fetchAll();
            return $row;
        } else {
            return false;
        }
    }
    public function selectwhere($table, $id){
        $sql = "SELECT * FROM ".$table." WHERE id=".$id;
        $select = $this->connection->query($sql);
        if ($select) {
            $row = $select->fetchAll();
            return $row;
        } else {
            return false;
        }

    }
    public function selectwhereDuyuru($table, $apartman_adi){
        $sql = "SELECT * FROM ".$table." WHERE apartman_adi='$apartman_adi'";
        //echo $sql;
        $select = $this->connection->query($sql);
        if ($select) {
            $row = $select->fetchAll();
            return $row;
        } else {
            return false;
        }

    }
    public function ara($table, $key){
        $sql = "SELECT * FROM ".$table." WHERE ad LIKE '%".$key."%';";
        $select = $this->connection->query($sql);
        if ($select) {
            $row = $select->fetchAll();
            return $row;
        } else {
            return false;
        }

    }
    public function selectwhereucret($table, $apartman_id){
        $sql = "SELECT * FROM ".$table." WHERE apartman_id= '".$apartman_id."';";
        $select = $this->connection->query($sql);
        if ($select) {
            $row = $select->fetchAll();
            return $row;
        } else {
            return false;
        }

    }

    public function selectAnd($table, $array = null) {

        if($array == null){
            $sql = "SELECT * FROM ".$table;
        }else{
            $columns = array_keys($array);
            $values = array_values($array);
            $sqlString = "";
            for($i=0;$i<count($columns);$i++){
                if($i==count($columns)-1){
                    $sqlString .= $columns[$i]." = '".$values[$i]."' ";
                }else{
                    $sqlString .= $columns[$i]." = '".$values[$i]."' and ";
                }
            }
            $sql = "SELECT * FROM ".$table." WHERE ".$sqlString;
        }
        $select = $this->connection->query($sql);
        if ($select) {
            $row = $select->fetchAll();
            return $row;
        } else {
            return false;
        }
    }

    public function selectOrLimit($table, $array = null, $limit, $start = null) {
        if($start == null){
            $limitStr = "LIMIT ".$limit;
        }else{
            $limitStr = "LIMIT ".$start.", ".$limit;
        }
        if($array == null){
            $sql = "SELECT * FROM ".$table." ".$limitStr;
        }else{
            $columns = array_keys($array);
            $values = array_values($array);
            $sqlString = "";
            for($i=0;$i<count($columns);$i++){
                if($i==count($columns)-1){
                    $sqlString .= $columns[$i]." = '".$values[$i]."' ";
                }else{
                    $sqlString .= $columns[$i]." = '".$values[$i]."' or ";
                }
            }
            $sql = "SELECT * FROM ".$table." WHERE ".$sqlString." ".$limitStr;
        }
        $select = $this->connection->query($sql);
        if ($select) {
            $row = $select->fetchAll();
            return $row;
        } else {
            return false;
        }
    }

    public function selectAndLimit($table, $array = null, $limit, $start = null) {
        if($start == null){
            $limitStr = "LIMIT ".$limit;
        }else{
            $limitStr = "LIMIT ".$start.", ".$limit;
        }
        if($array == null){
            $sql = "SELECT * FROM ".$table." ".$limitStr;
        }else{
            $columns = array_keys($array);
            $values = array_values($array);
            $sqlString = "";
            for($i=0;$i<count($columns);$i++){
                if($i==count($columns)-1){
                    $sqlString .= $columns[$i]." = '".$values[$i]."' ";
                }else{
                    $sqlString .= $columns[$i]." = '".$values[$i]."' and ";
                }
            }
            $sql = "SELECT * FROM ".$table." WHERE ".$sqlString." ".$limitStr;
        }
        $select = $this->connection->query($sql);
        if ($select) {
            $row = $select->fetchAll();
            return $row;
        } else {
            return false;
        }
    }

    public function insert($table, $array) {

        $columns = implode(", ", array_keys($array));
        $values  = implode("','", array_values($array));

        $sql = "INSERT INTO ".$table."(".$columns.") VALUES ('".$values."')";
        $insert = $this->connection->query($sql);
        //echo $sql;
        if ($insert) {
            return $this->connection->lastInsertId($table);
            echo "eklendi";
        } else {
            return false;
            echo "eklenemedi";
        }
    }

    public function update($table, $id, $array) {

        $columns = array_keys($array);
        $values = array_values($array);
        $sqlString = "";
        for($i=0;$i<count($columns);$i++){
            if($i==count($columns)-1){
                $sqlString .= $columns[$i]." = '".$values[$i]."' ";
            }else{
                $sqlString .= $columns[$i]." = '".$values[$i]."', ";
            }
        }
        $sql = "UPDATE ".$table." SET ".$sqlString." WHERE id=" . $id;

        $update = $this->connection->query($sql);

        if ($update) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($table, $id) {

        $sql = 'DELETE FROM ' . $table . ' WHERE id=' . $id;

        $delete = $this->connection->exec($sql);

        if ($delete) {
            return true;
        } else {
            return false;
        }
    }

    public function query($sql) {

        $query = $this->connection->query($sql);

        if ($query) {
            return $query;
        } else {
            return false;
        }
    }

    public function count($table, $array = null) {
        if($array == null){
            $sql = "SELECT count(*) from " . $table;
        }else{

            $columns = array_keys($array);
            $values = array_values($array);
            $sqlString = "";
            for($i=0;$i<count($columns);$i++){
                if($i==count($columns)-1){
                    $sqlString .= $columns[$i]." = '".$values[$i]."' ";
                }else{
                    $sqlString .= $columns[$i]." = '".$values[$i]."' and ";
                }
            }

            $sql = "SELECT count(*) from " . $table. " WHERE ". $sqlString;
        }
        $count = $this->connection->prepare($sql);
        $count->execute();
        return $count->fetchColumn();
    }

    function __destruct() {

        $this->connection = null;
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////
///
/*
$db = new Database;
//Insert Sorgusu
$userArray = array(
    'username' => 'deneme',
    'password' => md5('123456'),
    'full_name' => 'Deneme DENEME',
    'email' => 'deneme@deneme.com',
    'auth' => 'user',
    'lang' => 'tr'
);
$table = "users";
$db->insert($table, $userArray);


//Update Sorgusu
$userArray = array(
    'username' => 'deneme1',
    'password' => md5('1234'),
    'lang' => 'en'
);
$id=3;
$table = "users";
$db->update($table,$id, $userArray);

//Delete Sorgusu
$id=3;
$table = "users";
$db->delete($table,$id);
//Count Sorgusu Tüm Tablo
$table = "users";
$db->count($table);

//Count Sorgusu Sütun
$sayılacak = array(
    'lang' => 'tr',
    'auth' => 'admin'
);
$table = "users";
$db->count($table,$sayılacak);

//Select and Sorgusu
$login = array(
    'username' => 'username',
    'password' => md5('password');
$user = $db->selectAnd("users", $login);
print_r($user);

//Select or Sorgusu
$yetkili = array(
    'username' => 'username',
    'auth' => 'admin');
$yetkili = $db->selectOr("users", $yetkili);
//eğer kayıt varsa herzaman iki boyutlu bir dizi döner yoksa boş döner
print_r($yetkili);

//Select or Limit Sorgusu
$yetkili = array(


    'username' => 'username',
    'auth' => 'admin');
$yetkili = $db->selectOrLimit("users", $yetkili,5);
//eğer kayıt varsa herzaman iki boyutlu bir dizi döner yoksa boş döner ve limit kadar veri getirir
print_r($yetkili);

//Limitte başlangıç değeri
$yetkili = array(
    'username' => 'username',
    'auth' => 'admin');
$başlangıc= 4;
$limit=7;
$yetkili = $db->selectOrLimit("users", $yetkili, $limit, $başlangıc);
//eğer kayıt varsa herzaman iki boyutlu bir dizi döner yoksa boş döner ve limit kadar veri getirir
print_r($yetkili);
/*Eğer paremetre göndermek istemiyorsak şu şekilde işlem ysparız selectOrLimit("users", null, $limit, $başlangıc)*/

//Select and Limit Sorgusu
/*
$user= array(
    'username' => 'username',
    'password' => md5('password'));
$user = $db->selectAndLimit("users", $user,1);
print_r($yetkili);
//Manuel Sorgu
$sql = "SELECT (ad,soyad) FROM user ad='fatih' and soyad='göl'";
$gelen = $db->query($sql);
$gelen = $gelen->fetchAll();
print_r($gelen);
?>

}
*/
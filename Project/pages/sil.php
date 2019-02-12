<?php
/**
 * Created by PhpStorm.
 * User: Enes
 * Date: 14.12.2018
 * Time: 00:18
 */
include 'classes/DataBase.php';
$dbsil=new DataBase;
$table="duyurular";

$yetkili = null;
$ID = $_GET["id"];
$db->delete($table,$id);
//Count Sorgusu Tüm Tablo
$db->count($table);
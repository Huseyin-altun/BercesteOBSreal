<?php 
ob_start();
session_start();
require_once "../db/database.class.php";
$nesne = new bercesteobs\db\Database();
 $vize=$_POST["vize"];
 $finals=$_POST["finals"];
 $donem=$_POST["dönem"];
 $ogrno=$_POST["ogrno"];
 $derskod=$_POST["derskod"];
 
if(!empty( $vize) && !empty( $finals) &&  !empty( $derskod)){
    $or3 = $nesne->Insert("INSERT INTO ogrenci_sınav_notu (ogrenci_id,ders_kodu_id, vize,final,donem_id)
    VALUES (?,?,?,?,?)",array($ogrno,$derskod,$vize,$finals,$donem));

    $data['message']="Başarılı Bir Şekilde Eklendi. ";
    
    echo  json_encode($data); 


}else{

    $data['message']="Hatalı İşlemler boş. ";
    
    echo  json_encode($data); 

}

// idsinide alacam 


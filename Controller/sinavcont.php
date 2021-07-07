<?php 
ob_start();
session_start();
require_once "../db/database.class.php";
$nesne = new bercesteobs\db\Database();
 $sinifkd=$_POST["sinifkod"];
 $derskd=$_POST["derskod"];
 $trh=$_POST["tarih"];
if(!empty( $sinifkd) && !empty( $derskd) ){
    $or3 = $nesne->Insert("INSERT INTO sinav_takvimi (sınıf_kodu_id,tarih, ders_kodu_id) VALUES (?,?,?)",array($sinifkd,$trh,$derskd));

    $data['message']="Başarılı Bir Şekilde Eklendi. ";
    
    echo  json_encode($data); 


}else{

    $data['message']="Hatalı İşlemler boş. ";
    
    echo  json_encode($data); 

}

// idsinide alacam 


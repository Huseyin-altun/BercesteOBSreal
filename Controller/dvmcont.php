<?php 
ob_start();
session_start();
require_once "../db/database.class.php";
$nesne = new bercesteobs\db\Database();
 
 $ders=$_POST["ders"];
 $dvm=$_POST["dvm"];
 $ogrno=$_POST["ogrno"];
 
 
if(!empty( $ders) && !empty( $dvm) &&  !empty( $ogrno)){
    $or3 = $nesne->Insert("INSERT INTO devamsizlik (ogrenci_id,ders_kodu_id, devamsizlik)
    VALUES (?,?,?)",array($ogrno,$ders,$dvm));

    $data['message']="Başarılı Bir Şekilde Eklendi. ";
    
    echo  json_encode($data); 


}else{

    $data['message']="Hatalı İşlemler boş. ";
    
    echo  json_encode($data); 

}

// idsinide alacam 


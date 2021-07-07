<?php 
ob_start();
session_start();
require_once "../db/database.class.php";
$nesne = new bercesteobs\db\Database();
$myo=$_POST["myos"];

if(!empty($myo)){
    $or3 = $nesne->Insert("INSERT INTO myo (myo_adi) VALUES (?)",array($myo));

    $data['message']="Başarılı Bir Şekilde Eklendi. ";
    
    echo  json_encode($data); 


}else{

    $data['message']="Hatalı İşlemler boş. ";
    
    echo  json_encode($data); 

}

// idsinide alacam 


  ?>

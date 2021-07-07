<?php 
ob_start();
session_start();
require_once "../db/database.class.php";
$nesne = new bercesteobs\db\Database();
$bolum=$_POST["bolums"];

if(!empty($bolum)  ){
    $or3 = $nesne->Insert("INSERT INTO bolum (bolum_adi) VALUES (?)",array($bolum));

    $data['message']="Başarılı Bir Şekilde Eklendi. ";
    
    echo  json_encode($data); 


}else{

    $data['message']="Hatalı İşlemler boş. ";
    
    echo  json_encode($data); 

}

// idsinide alacam 


  ?>

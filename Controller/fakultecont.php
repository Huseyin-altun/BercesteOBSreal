<?php 
ob_start();
session_start();
require_once "../db/database.class.php";
$nesne = new bercesteobs\db\Database();
$fakulte=$_POST["fakultes"];

if(!empty($fakulte)  ){
    $or3 = $nesne->Insert("INSERT INTO fakulte (fakulte_adi) VALUES (?)",array($fakulte));

    $data['message']="Başarılı Bir Şekilde Eklendi. ";
    
    echo  json_encode($data); 


}else{

    $data['message']="Hatalı İşlemler boş. ";
    
    echo  json_encode($data); 

}

// idsinide alacam 


  ?>

<?php 
ob_start();
session_start();
require_once "../db/database.class.php";
$nesne = new bercesteobs\db\Database();
$baslık=$_POST["baslik"];
$baslık2=$_POST["icerik"];
if(!empty($baslık) && !empty($baslık2) ){
    $or3 = $nesne->Insert("INSERT INTO duyuru (baslik, icerik) VALUES (?,?)",array($baslık,$baslık2));

    $data['message']="Başarılı Bir Şekilde Eklendi. ";
    
    echo  json_encode($data); 


}else{

    $data['message']="Hatalı İşlemler boş. ";
    
    echo  json_encode($data); 

}

// idsinide alacam 


  ?>

<?php 
ob_start();
session_start();
require_once "../db/database.class.php";
$nesne = new bercesteobs\db\Database();
$Table= $_SESSION["Table2"];
$id=$_SESSION["id"];
$sfr=$_POST["sfr"];
$ysfr=$_POST["ysfr"];
if(!empty($sfr) && !empty($ysfr) ){
    if($sfr == $ysfr){

    $or4 = $nesne->Insert("UPDATE $Table
    SET sifre = ?
    WHERE id = $id;",array($sfr));
    $data['message']="Başarılı Bir Şekilde Değiştirildi ";
   
      }
      else{  $data['message']="Uyuşmamakta ".$id;
      
      }

      echo  json_encode($data);


}else{

    $data['message']="Hatalı İşlemler boş. ";
    
    echo  json_encode($data); 

}


//UPDATE 

  ?>

<?php require_once "../db/database.class.php";
$nesne = new bercesteobs\db\Database();
// idsinide alacam 
$or3 = $nesne->getRows("SELECT *
FROM ogrenci
INNER JOIN ogrenci_sınav_notu
ON ogrenci.id = ogrenci_sınav_notu.ogrenci_id");

 

  $myJSON = json_encode($or3); 
  echo  $myJSON;
  ?>

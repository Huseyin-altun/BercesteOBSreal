<?php 
ob_start();
session_start();
require_once "../db/database.class.php";



$nesne=new bercesteobs\db\Database();
$a=$nesne->getRows("SELECT * FROM ogrenci INNER JOIN
ogrenci_ozluk ON ogrenci.ogrenci_ozluk_id = ogrenci_ozluk.id");
foreach($a as $k){
  $_POST['sifre'];
  $id=$k->id;
  $no=$k->okul_no;
  $sfr=$k->sifre;
 
  $data['value']=0;

  if($_POST['sifre']==$sfr && $_POST['kno']==$no){
    $AdSoyad=$k->ad." ".$k->soyad;
    $_SESSION["ad"]=$AdSoyad;
    $yetki=$k->yetki_id;
    $_SESSION["yetki"]=$yetki;
    $_SESSION["Table"]="ogrenci_ozluk";
    $_SESSION["Table2"]="ogrenci";
    $_SESSION["id"]= $id;
    break; 
  
  }

}

if(!empty($_POST['sifre']) || !empty($_POST['kno'])){

    if($_POST['sifre']==$sfr && $_POST['kno']==$no){
        $_SESSION["oturum"]=$_POST['kno'];
       
        $data['status']="success";
        $data['message']="Başarılı Bir Şekilde giriş yaptınız";
        $data['value']=1;
        echo json_encode($data);
       
      }


      else if($_POST['sifre']==$sfr){
        $data['status']="info";
        $data['message']="Kullanıcı adı  Hatalı";
    
        echo json_encode($data);
        
      }  


      
      else if($_POST['kno']==$no){
        $data['status']="info";
        $data['message']="Sifre    Hatalı";
    
        echo json_encode($data);
     
      }  
 
    else{
    $data['status']="error";
    $data['message']="Kullanıcı Adınız Ve sifre Hatalı";
    $data['value']=2;
    echo json_encode($data);
   
    }




}
else{
    $data['status']="info";
    $data['message']="Kullanıcı Adınız Ve sifre Bos";
   
    echo json_encode($data);
   
}


// Genel Kontrol ılk et daha sonra adım adım ılerle ... Sorun cozulecek Not tuttum sahurdayım





  








?>

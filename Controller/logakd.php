<?php 
ob_start();
session_start();
require_once "../db/database.class.php";


// Kodun oldugu e
$nesne=new bercesteobs\db\Database();
$a=$nesne->getRows("SELECT * FROM akademisyen INNER JOIN
akademisyen_ozluk ON akademisyen.akademisyen_ozluk_id = akademisyen_ozluk.id");
foreach($a as $k){
  $no=$k->kullanici_adi;
  $sfr=$k->sifre;
  $id=$k->id;
  $data['value']=0;

  if($_POST['password']==$sfr && $_POST['kno']==$no){
    $AdSoyad=$k->ad." ".$k->soyad;
    $_SESSION["ad"]=$AdSoyad;
    $yetki=$k->yetki_id;
    $_SESSION["yetki"]=$yetki;
    $_SESSION["Table"]="akademisyen_ozluk";
    $_SESSION["id"]= $id;
    break; 
  
  }
}

if(!empty($_POST['password']) || !empty($_POST['kno'])){

    if($_POST['password']==$sfr && $_POST['kno']==$no){
        $_SESSION["oturum"]=$_POST['kno'];
        $_SESSION["tarayici"]=1;
        $data['status']="success";
        $data['message']="Başarılı Bir Şekilde giriş yaptınız";
        $data['value']=1;
        echo json_encode($data);
      }


      else if($_POST['password']==$sfr){
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

<?php 
ob_start();
session_start();
require_once "../db/database.class.php";
$nesne = new bercesteobs\db\Database();

$sayi = $nesne->getRows("SELECT * FROM ogrenci_ozluk") ;

$sayi=count($sayi)+1;

 $okulno=$_POST["okulno"];
 $sifre=$_POST["sifre"];
 $ad=$_POST["ad"];
 $soyad=$_POST["soyad"];
 $tel=$_POST["tel"];
 $adres=$_POST["adres"];
 $eposta=$_POST["eposta"];
 $babaad=$_POST["babaad"];
 $tcno=$_POST["tcno"];

if(!empty( $okulno) && !empty( $adres) &&  !empty( $babaad)){
    $or3 = $nesne->Insert("INSERT INTO ogrenci (okul_no,sifre, ogrenci_ozluk_id)
    VALUES (?,?,?)",array($okulno,$sifre,$sayi));
$or4 = $nesne->Insert("INSERT INTO ogrenci_ozluk (id,ad,soyad,tel_no,adres,eposta,baba_adi,tc_no)
 VALUES (?,?,?,?,?,?,?,?)",array($sayi,$ad,$soyad,$tel,$adres, $eposta, $babaad, $tcno));

    $data['message']="Başarılı Bir Şekilde Eklendi. ";
    
    echo  json_encode($data); 


}else{

    $data['message']="Hatalı İşlemler boş. ";
    
    echo  json_encode($data); 

}

// idsinide alacam 


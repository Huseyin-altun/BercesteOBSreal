<?php
ob_start();
session_start();
if (!isset($_SESSION["oturum"])) {
  header("Location: http://localhost/ProjectObs/index.php");
}
require_once "../db/database.class.php";
$nesne = new bercesteobs\db\Database();
// idsinide alacam 
$id= $_SESSION["id"];
$or3 = $nesne->getRows("SELECT *
FROM ogrenci
INNER JOIN ogrenci_sınav_notu
ON ogrenci.id = ogrenci_sınav_notu.ogrenci_id where ogrenci.id=$id");
$or3 = $nesne->getRows("SELECT *
FROM ders
INNER JOIN ogrenci_sınav_notu
ON ders.id = ogrenci_sınav_notu.ders_kodu_id where ogrenci_sınav_notu.ogrenci_id=$id");

?>



<?php require_once "navbar.php"; ?>
<main>
  <div class="container-fluid">
    <h1 class="mt-4">
    <?= $pr->getNameUrl();?>
</h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="index.html"> Doldurulacak</a></li>
      <li class="breadcrumb-item active"> Doldurulacak</li>
    </ol>
    <div class="card mb-4">
      <div class="card-body">
        <p class="mb-0">
        <form method="post" action="#" id="printJS-form">
        <table class="table table-striped table-dark table-hover">
        Güz Dönemi
          <thead>
            <tr>

            
              <th scope="col">Ders kodu</th>
              <th scope="col">Ders adi</th>
              <th scope="col">Kredi</th>
              <th scope="col">Başarı Puanı</th>
      
            </tr>
          </thead>
          <tbody>
          
              
             
              <?php  foreach($or3 as $item){   if($item->donem_id==1){ $snc=($item->vize+$item->final)/2; ?>
                <tr>

             
                <td><?=$item->ders_kodu_id?></td>
       
                <td><?=$item->ders_adi?></td>
                <td><?=$item->kredisi?></td>
                <td><?=$snc?></td>
         
               
            
                </tr>  
                   
                   <?php } } ?>
          
          </tbody>

        </table>
        <table class="table table-striped table-dark table-hover">
        Bahar Dönemi
          <thead>
            <tr>

            
              <th scope="col">Ders Kodu</th>
              <th scope="col">Ders Adı</th>
              <th scope="col">Kredi</th>
              <th scope="col">Başarı Puanı</th>
         
            </tr>
          </thead>
          <tbody>
          
              
             
              <?php  foreach($or3 as $item){   if($item->donem_id==2){ $snc=($item->vize+$item->final)/2; ?>
                <tr>

             
                <td><?=$item->ders_kodu_id?></td>
                <td><?=$item->ders_adi?></td>
                <td><?=$item->kredisi?></td>
                <td><?=$snc?></td>
            
                </tr>  
                   
                   <?php } } ?>
          
          </tbody>

        </table>
    

        </p>
     </form>
        <button type="button"  class="btn btn-dark" onclick="printJS('printJS-form', 'html')">
        <i class="fas fa-print"></i> FORMU YAZDIR
      </div>
    </div>
    <div style="height: 100vh"></div>
    <div class="card mb-4">
      <div class="card-body"> Doldurulacak</div>
    </div>
  </div>
</main>
<?php require_once "footer.php"; ?>
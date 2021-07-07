<?php
ob_start();
session_start();
if (!isset($_SESSION["oturum"])) {
  header("Location: http://localhost/ProjectObs/index.php");
}
require_once "../db/database.class.php";
$nesne = new bercesteobs\db\Database();
$or3 = $nesne->getRow("SELECT *
FROM ogrenci
INNER JOIN devamsizlik
ON ogrenci.id = devamsizlik.ogrenci_id");
?>
<?php require_once "navbar.php"; ?>
<main>
  <div class="container-fluid">
    <h1 class="mt-4"> <?= $pr->getNameUrl();?></h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="index.html"> Doldurulacak</a></li>
      <li class="breadcrumb-item active"> Doldurulacak</li>
    </ol>
    <div class="card mb-4">
      <div class="card-body">
        <p class="mb-0">
        <table class="table table-striped table-dark table-hover">
          <thead>
            <tr>

            <th scope="col">Ders Kodu</th>
              <th scope="col">Devamsızlık Sayısı</th>
            
              
            </tr>
          </thead>
          <tbody>     
             <tr>
                <td><?=$or3->ders_kodu_id?></td>
                <td>Devamsızlık Gün Sayınız <?=$or3->devamsizlik?></td>
               
               
                </tr>  
          </tbody>

        </table>
        </p>
      </div>
    </div>
    <div style="height: 100vh"></div>
    <div class="card mb-4">
      <div class="card-body"> Doldurulacak</div>
    </div>
  </div>
</main>
<?php require_once "footer.php"; ?>
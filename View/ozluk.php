<?php
ob_start();
session_start();
if (!isset($_SESSION["oturum"])) {
  header("Location: http://localhost/ProjectObs/View/index.php");
}
require_once "../db/database.class.php";
$nesne = new bercesteobs\db\Database();
$tad=$_SESSION["Table"];
$id= $_SESSION["id"];
$or3=$nesne->getRow("SELECT * FROM $tad WHERE id=$id")
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
        <form method="post" action="#" id="printJS-form">
        <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-4 col-form-label" readonly>Adı Ve Soyadı</label>
    <div class="col-sm-8 mb-3">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $or3->ad." ".$or3->soyad;?>">
    </div>
  </div>
        <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-4 col-form-label" readonly>E posta</label>
    <div class="col-sm-8 mb-3">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?=  $or3->eposta?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-4 col-form-label" readonly>Telefon Numarası</label>
    <div class="col-sm-8 mb-3">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?=  $or3->tel_no?>">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-4 col-form-label" readonly>Adres</label>
    <div class="col-sm-8 mb-3">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?=   $or3->adres;?>">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-4 col-form-label" readonly>Baba Adı</label>
    <div class="col-sm-8 mb-3">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?=   $or3->baba_adi;?>">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="staticEmail" class="col-sm-4 col-form-label" readonly>Tc Kimlik Numarası</label>
    <div class="col-sm-8 mb-3">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?=   $or3->tc_no;?>">
    </div>
  </div>
        </form>
  <button type="button"  class="btn btn-dark" onclick="printJS('printJS-form', 'html')">
  <i class="fas fa-print"></i> FORMU YAZDIR
 </button>


        </p>
      </div>
    </div>
    <div style="height: 100vh"></div>
    <div class="card mb-4">
      <div class="card-body"> Doldurulacak</div>
    </div>
  </div>
</main>
<style>label{
  color:black;
  font-size: large !important;
} </style>
<?php require_once "footer.php"; ?>
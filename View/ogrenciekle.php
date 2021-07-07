<?php
ob_start();
session_start();
if (!isset($_SESSION["oturum"])) {
  header("Location: http://localhost/ProjectObs/index.php");
}
?>

<?php require_once "navbar.php";

?>

<main>
  <div class="container-fluid">
    <h1 class="mt-4"><?= $pr->getNameUrl();?></h1>
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="index.html"> Doldurulacak</a></li>
      <li class="breadcrumb-item active"> Doldurulacak</li>
    </ol>
    <div class="card mb-4">
      <div class="card-body">
        <p class="mb-0">
        
  <form class="row g-3" id="ogrekle">

 
<div class="col-4 mb-3 ml-5">
  <label for="inputAddress" class="form-label">Okul Numarası </label>
  <input type="text" name="okulno" class="form-control" id="inputAddress" placeholder="Okul Numarası Giriniz">
</div>
<div class="col-4 mb-3 ml-5">
  <label for="inputAddress" class="form-label">Sifre Giriniz</label>
  <input type="text" name="sifre" class="form-control" id="inputAddress" placeholder="Sifre Giriniz">
</div>
<div class="col-4 mb-3 ml-5">
<label for="inputAddress" class="form-label">Ad </label>
  <input type="text" name="ad" class="form-control" id="inputAddress" placeholder="Ad Giriniz">
</div>
<div class="col-4 mb-3 ml-5">
<label for="inputAddress" class="form-label">SoyAd </label>
  <input type="text" name="soyad" class="form-control" id="inputAddress" placeholder="SoyAd Giriniz">
</div>
<div class="col-4 mb-3 ml-5">
<label for="inputAddress" class="form-label">Telefon </label>
  <input type="text" name="tel" class="form-control" id="inputAddress" placeholder="Telefon Giriniz">
</div>
<div class="col-4 mb-3 ml-5">
<label for="inputAddress" class="form-label">adres </label>
  <input type="text" name="adres" class="form-control" id="inputAddress" placeholder="adres   Giriniz">
</div>
<div class="col-4 mb-3 ml-5">
<label for="inputAddress" class="form-label">e posta </label>
  <input type="text" name="eposta" class="form-control" id="inputAddress" placeholder="e posta  Giriniz">
</div>
<div class="col-4 mb-3 ml-5">
<label for="inputAddress" class="form-label">baba Adı </label>
  <input type="text" name="babaad" class="form-control" id="inputAddress" placeholder="Baba Adı Giriniz">
</div>
<div class="col-6 mb-3 ml-5">
<label for="inputAddress" class="form-label">Tc No </label>
  <input type="text" name="tcno" class="form-control" id="inputAddress" placeholder="Tc No  Giriniz">
</div>



<div class="col-12 mt-5 ml-5" >
  <button type="submit" class="btn btn-dark">Kaydet</button>
</div>
      </form>     
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

<script>


  $("#ogrekle").submit(function() {

 
  formId=$(this).attr('id');
  formDetails=$('#'+formId);


  swal({
  title: "Emınmısınız ?",
  text: "Duyurunun  EKlenmesıne Eminmisin",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    
    $.ajax({
    type:"POST",
    url:'../Controller/ogreklecont.php',
    data:formDetails.serialize(),

    success:function(data){
    veri=JSON.parse(data);
      swal("İslem Basarıyla Gerceklesti",veri.message);
      $("form").trigger("reset");
     
    }

  });

  
  } else {
    swal("Islem dogrulanmadı");
  }
});



return false;

});







</script>
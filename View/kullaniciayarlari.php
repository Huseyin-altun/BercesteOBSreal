<?php
ob_start();
session_start();
if (!isset($_SESSION["oturum"])) {
  header("Location: http://localhost/ProjectObs/index.php");
}
?>

<?php require_once "navbar.php"; ?>
<main>
  <div class="container-fluid">
    <h1 class="mt-4"><?= $pr->getNameUrl();?></h1>

    <div class="card mb-4">
      <div class="card-body">
        <p class="mb-0">


        <form class="row g-3" id="sfre">

 
  <div class="col-6 mb-3 ml-5">
    <label for="inputAddress" class="form-label">Yeni Şifre </label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Yeni Şifre " name="sfr">
  </div>
  <div class="col-8 ml-5">
  <label for="inputAddressA" class="form-label">Yeni Şifre Tekrar</label>
    <input type="text" class="form-control" id="inputAddressA" placeholder="Yeni Şifre Tekrar" name="ysfr">
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


  $("#sfre").submit(function() {

 
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
    url:'../Controller/kullanicicont.php',
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
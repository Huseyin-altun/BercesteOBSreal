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
    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="index.html"> Doldurulacak</a></li>
      <li class="breadcrumb-item active"> Doldurulacak</li>
    </ol>
    <div class="card mb-4">
      <div class="card-body">
        <p class="mb-0">
        <form class="row g-3" id="sinav">

 
<div class="col-6 mb-3 ml-5">
  <label for="inputAddress" class="form-label">Sınıf  Kodu </label>
  <input type="text" name="sinifkod" class="form-control" id="inputAddress" placeholder="Sınıf  Kodu Giriniz">
</div>
<div class="col-6 mb-3 ml-5">
  <label for="inputAddress" class="form-label">Ders Kodu</label>
  <input type="text" name="derskod" class="form-control" id="inputAddress" placeholder="Ders   Kodu Giriniz">
</div>


  <div class="col-10 ml-5">
  <label for="example-datetime-local-input">Tarih</label>
    <input class="form-control" type="datetime-local" value="2021-08-19T13:45:00" name="tarih" id="example-datetime-local-input">
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


  $("#sinav").submit(function() {

 
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
    url:'../Controller/sinavcont.php',
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
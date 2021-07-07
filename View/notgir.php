<?php
ob_start();
session_start();
if (!isset($_SESSION["oturum"])) {
  header("Location: http://localhost/ProjectObs/index.php");
}
require_once "../db/database.class.php";
$nesne = new bercesteobs\db\Database();
$ogr=$nesne->getRows("SELECT * FROM ogrenci");
$donem=$nesne->getRows("SELECT * FROM donem");
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

        <form class="row g-3" id="nots">

 
  <div class="col-6">
    <label for="inputAddress" class="form-label">Vize</label>
    <input type="text" class="form-control" id="inputAddress" name="vize" placeholder="Vize Notunu Giriniz">
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Final</label>
    <input type="text" class="form-control"  name="finals" id="inputAddress2" placeholder="Final Notunu Giriniz">
  </div>

  <div class="col-md-6 mt-3">
    <label for="inputState" class="form-label">Öğrenci Numarası</label>
    <select id="inputState" class="form-control" name="ogrno">
   <?php  foreach($ogr as $item) {?>
      <option value="<?= $item->id?>"><?=$item->okul_no?></option>
      <?php }?>
    
    </select>
  </div>

  <div class="col-md-6 mt-3">
    <label for="inputAddress2" class="form-label">Ders Kodu</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Ders Kodunu Giriniz" name="derskod">
  </div>
  <div class="col-md-8 mt-3">
    <label for="inputState" class="form-label">Dönem</label>
    <select id="inputState" class="form-control" name="dönem">

    <?php  foreach($donem as $item) {?>
      <option value="<?= $item->id?>"><?= $item->donem_adi?></option>
      <?php }?>
    </select>
  </div>
 
  <div class="col-12 mt-5">
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


  $("#nots").submit(function() {

 
  formId=$(this).attr('id');
  formDetails=$('#'+formId);


  swal({
  title: "Emınmısınız ?",
  text: "Notun  EKlenmesıne Eminmisin",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    
    $.ajax({
    type:"POST",
    url:'../Controller/notcont.php',
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
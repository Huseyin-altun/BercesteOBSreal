<?php
ob_start();
session_start();
if (!isset($_SESSION["oturum"])) {
  header("Location: http://localhost/ProjectObs/index.php");
}
require_once "../db/database.class.php";
$nesne = new bercesteobs\db\Database();
$id= $_SESSION["id"];
$ogr=$nesne->getRows("SELECT * FROM ogrenci");
$akd=$nesne->getRows("SELECT * FROM akademisyen_ders WHERE akademisyen_id=$id ");
foreach($akd as $items){
   $dizi[]=$items->ders_kodu_id;

}
$ders=$nesne->getRows("SELECT * FROM ders");
?>

<?php require_once "navbar.php"; ?>

<main>
  <div class="container-fluid">
    <h1 class="mt-4"><?= $pr->getNameUrl();?></h1>

    <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item"><a href="menu.php"> Ana sayfa</a></li>
      <li class="breadcrumb-item active"><?= $pr->getNameUrl2();?></li>
    </ol>
    <div class="card mb-4">
      <div class="card-body">
        <p class="mb-0">

        <form class="row g-3" id="nots">

 


  <div class="col-md-6 mt-3">
    <label for="inputState" class="form-label">Öğrenci Numarası</label>
    <select id="inputState" class="form-control" name="ogrno">
   <?php  foreach($ogr as $item) {?>
      <option value="<?= $item->id?>"><?=$item->okul_no?></option>
      <?php }?>
    
    </select>
  </div>

  <div class="col-md-6 mt-3">
    <label for="inputState2" class="form-label">Dersler</label>
    <select id="inputState2" class="form-control" name="ders">
   <?php  foreach($ders as $item) {if(in_array($item->id, $dizi)){ //dizide eleman varmı ? ?>
      <option value="<?= $item->id?>"><?=$item->ders_adi?></option>
      <?php }}?>
    
    </select>
  </div>

  <div class="col-md-6 mt-3">
    <label for="inputAddress2" class="form-label">Devamsızlık Gün</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Devamsızlık Giriniz" name="dvm">
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
    url:'../Controller/dvmcont.php',
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
<?php  
ob_start();
session_start();
if(isset($_SESSION["oturum"])){
  header("Location: http://localhost/ProjectObs/View/menu.php");
}
require_once "../db/database.class.php"; ?><!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>OBS Akademisyen</title>

  <?php require "LayoutGiris.php";

  ?>
  <script>
hak=3;

  $("#forms").submit(function() {

 
  formId=$(this).attr('id');
  formDetails=$('#'+formId);

  $.ajax({
    type:"POST",
    url:'../Controller/logakd.php',
    data:formDetails.serialize(),
    success:function(data){
      veri=JSON.parse(data);
      swal("Girisiniz Tamamen hatalı  İse  hak Azaltılacaktır",veri.message+" Kalan hakkınız "+hak,veri.status)
      .then((value) => {
        if(veri.value==1){
          window.location.href= "http://localhost/ProjectObs/View/menu.php";
        }
        else if(veri.value==2){
          hak--;
          if(hak==-1){
            $('input[type="submit"]').attr('disabled', 'disabled'); 
          }
        }

});
      
    

    
    }

  });

return false;

});







</script>
</body>
</html>
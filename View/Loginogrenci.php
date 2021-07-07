<?php  
ob_start();
session_start();
if(isset($_SESSION["oturum"])){
  header("Location: http://localhost/ProjectObs/View/menu.php");
}
require_once "../db/database.class.php";

?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>OBS Ogrenci</title>

<link rel="stylesheet" href="../Public/css/bootstrap.min.css">
<link rel="stylesheet" href="../Public/css/login.css">
<link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@500&display=swap" rel="stylesheet">


<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
</head>
<body>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6    col-md-6 login-section-wrapper" >
          <div>
        
            <img src="../Public/images/logo1.png" alt="logo" class="logo mb-3">
            <span style="font-size: 19px;"> Berceste Universitesi</span>
          </div>
          <div class="login-wrapper">
            <center><h4 class="login-title" id="dte"></h4></center>
            <center><h4 class="login-title" id="dte2"></h4></center>
            <form method="POST" id="forms" action="">
              <div class="input-group mb-4">
                <span class="input-group-text spanw" ><i class="fas fa-user-alt"></i></span>
                <input type="text" class="form-control" name="kno" id="ogrNumarası" placeholder="Öğrenci Numarası">
              </div>


              <div class="form-group mb-4">
           
                <div class="input-group mb-4">
                  <span class="input-group-text spanw" ><i class="fas fa-key"></i></span>
                  <input type="password" class="form-control" id="key" name="sifre"placeholder="Şifre">
                  <span class="input-group-text spanw2" ><i id="a" class="fas fa-eye"></i></span>
                </div>
              </div>
              
              <input name="login" id="login" class="btn btn-block btn-aqua" type="submit" value="Giriş Yap">
              <input name="login" id="elogin" class="btn btn-block btn-sweetred mb-3" type="submit" value="E devlet">
            </form>
            <a href="#!" class="link" data-toggle="modal" data-target="#forgot">Şifremi Unuttum</a>
            <div class="" role="alert" id="alert">
   
  </div>
          </div>
          
        </div>
        <!-- Yan Resim -->

        <div class="col-sm-6  col-md-6 px-0 d-none d-sm-block" style="background-color:black">
             
        <video class="videos" controls autoplay loop >
    <source src="../Public/images/d.mp4" type="video/mp4" />

</video>
   
        </div>
      </div>
    </div>

    
    <!-- Modal -->
    <div class="modal fade" id="forgot" aria-hidden="true">
      <div class="modal-dialog" >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="forgotModalLabel">Şifremi  unuttum</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="#!">
              <div class="form-group">
                <label for="email">T.C. Kimlik No</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="T.C. Kimlik No">
              </div>
              <div class="form-group mb-4">
                <label for="password">Öğrenci No</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Öğrenci No">
              </div>
          
              <div class="form-group mb-4">
                <label for="password">Baba Adı</label>
                <input type="password" name="password" id="password" class="form-control mb-3" placeholder="Baba Adı">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                <button type="button" class="btn btn-primary">Gönder</button>
              </div>
            </form>
            
            
       
          </div>
          <div class="modal-footer">
            Deneme Aşamasındayız
          </div>
        </div>
      </div>
    </div>
  </main> 
 
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="../Public/js/jquery-3.6.0.min.js"></script>
  <script src="../Public/js/popper.min.js" ></script>
  <script src="../Public/js/bootstrap.min.js" ></script>
  <script src="../Public/js/scripts.js" ></script>


<script>
hak=3;

  $("#forms").submit(function() {

 
  formId=$(this).attr('id');
  formDetails=$('#'+formId);

  $.ajax({
    type:"POST",
    url:'../Controller/loginvalidation.php',
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
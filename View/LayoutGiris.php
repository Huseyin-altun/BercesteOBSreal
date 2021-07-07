<link rel="stylesheet" href="../Public/css/bootstrap.min.css">
<link rel="stylesheet" href="../Public/css/login.css">
<link href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
</head>
<body>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-7    col-md-6 login-section-wrapper">
          <div>
        
            <img src="../Public/images/logo1.png" alt="logo" class="logo mb-3">
            <span style="font-size: 19px;"> Dicle Üniversitesi</span>
          </div>
          <div class="login-wrapper">
          <center><h4 class="login-title" id="dte"></h4></center>
            <center><h4 class="login-title" id="dte2"></h4></center>
         
            <form method="POST"  id="forms">
              <div class="input-group mb-4">
                <span class="input-group-text spanw" ><i class="fas fa-user-alt"></i></span>
                <input type="text" name="kno" class="form-control" placeholder="Kullanıcı Adı">
              </div>


              <div class="form-group mb-4">
           
                <div class="input-group mb-4">
                  <span class="input-group-text spanw" ><i class="fas fa-key"></i></span>
                  <input type="password" name="password"class="form-control" placeholder="Şifre">
                  <span class="input-group-text spanw2" ><i id="a" class="fas fa-eye"></i></span>
                </div>
              </div>
              
              <input name="login" id="login" class="btn btn-block btn-aqua" type="submit" value="Giriş Yap">
              <input name="login" id="elogin" class="btn btn-block btn-sweetred mb-3" type="submit" value="E devlet">
            </form>
            <a href="#!" class="link" data-toggle="modal" data-target="#forgot">Şifremi Unuttum</a>
            
          </div>
          
        </div>
        <div class="col-sm-5  col-md-6 px-0 d-none d-sm-block">
          <img src="../Public/images/3.jpg" alt="login image" class="login-img">
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
                <label for="password">Kullanıcı Adı</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Kulanıcı Adı">
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
  <script src="../Public/js/scripts.js"></script>
  

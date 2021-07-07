<?php
ob_start();
session_start();
if(!isset($_SESSION["oturum"])){
  header("Location: http://localhost/ProjectObs/View/Loginogrenci.php");
}


?>
<?php require_once "navbar.php";?>

<main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Ana Menu</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="menu.php">  Ana Menu</a></li>
              
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <p class="mb-0">
    
                                <?php 
$url=file_get_contents("http://www.dicle.edu.tr/");
$exp=explode('<li class="nav-item">',$url);

echo "<h3 class='mb-4'>Dicle Üniversitesi Duyurular</h3>";   

echo $exp[8]."<br/>";
echo $exp[9]."<br/>"; 
echo $exp[10]."<br/>";
echo $exp[11]."<br/>";
echo $exp[12]."<br/>";
echo $exp[13]."<br/>";

?>
        
                               
                                </p>
                            </div>
                        </div>
                        <div style="height: 100vh"></div>
                        <div class="card mb-4"><div class="card-body">  Doldurulacak</div></div>
                    </div>
                </main>
<?php require_once "footer.php";?>

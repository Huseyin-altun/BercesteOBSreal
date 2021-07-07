<?php 
require_once "../db/database.class.php";
require_once "../db/Util.php";
$nesne=new bercesteobs\db\Database();
$pr=new bercesteobs\util\Util();
$or=$nesne->getRow("SELECT *
FROM idare_sorumlusu
INNER JOIN idare_özlük
ON idare_sorumlusu.idare_ozluk_id = idare_özlük.id;");
$ad=$or->ad;
$soyad=$or->soyad;
$genelad=$ad." ".$soyad;

$or2=$nesne->getRows("SELECT * FROM duyuru ORDER BY id DESC LIMIT 5")
?>
<!DOCTYPE html>
<html lang="tr">
    <head>
        <meta charset="utf-8" />

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>OBS-SİSTEMİ</title>
        <link href="../Public/css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/print-js/1.6.0/print.js"></script>

    </head>
<body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="menu.php">Berceste Üniversitesi</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
        
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0" style="position: absolute;  right:0px;">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    
                        <a class="dropdown-item" href="#">  <?=     $_SESSION["ad"] ?></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../Controller/logout.php">Güvenli Çıkış</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto ml-md-0" style="position: absolute;  right:60px;">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bullhorn"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                   <?php  foreach($or2 as $item){ ?>
                        <a class="dropdown-item" href="duyuru.php"><?= $item->baslik ?></a>
                        
                   <?php } ?>
                        
                    </div>
                </li>
            </ul>   
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                           
                            <div class="sb-sidenav-menu-heading">  Genel İşlemler</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Genel İşlemler
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                               
                                    <a class="nav-link" href="duyuru.php">Duyurular</a>
                                    <a class="nav-link" href="ozluk.php">Ozlük Bilgileri</a>
                                    <a class="nav-link" href="akademik.php">Akademik Takvim</a>
                                    <?php   if( $_SESSION["yetki"]==2) {?>
                                    <a class="nav-link" href="derstablosu.php">Ders Tablosu</a>
                                    <a class="nav-link" href="tranksript.php">Tranksript Senaryosu</a>
                                    <a class="nav-link" href="sinavtakvimi.php">Sınav Tablosu</a>
                                    <?php   }?>
                          
                                </nav>
                            </div>
                            <?php   if( $_SESSION["yetki"]==2) {?>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                         Ders Ve Dönem
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="dersortalama.php">Ders Ortalamaları</a>
                                    <a class="nav-link" href="notlistesi.php">Not Listesi</a>
                                    <a class="nav-link" href="devamsizlik.php">Devamsızlık</a>
                                  
                                </nav>
                           
                            </div>
                            <?php   }?>





                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                   Kullanıcı İşlemleri
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts3" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="kullaniciayarlari.php">Şifre Değiştir</a>
  
                                  
                                </nav>
                           
                            </div>
                         











                            <?php   if( $_SESSION["yetki"]==1) {?>
                            <div class="sb-sidenav-menu-heading">  Akademik İşlemler</div>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Akademik İşlemler
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="sinavekle.php">Sınav Ekle</a>
                                    <a class="nav-link" href="duyuruekle.php">Duyuru Ekle</a>
                                    <a class="nav-link" href="notgir.php">Not Gir</a>
                                    <a class="nav-link" href=" devamsizlikekle.php">Devamsızlık Gir</a>
                                   
                                </nav>

                           
                            </div>
                            <?php   }?>


                            <?php   if( $_SESSION["yetki"]==3) {?>
                            <div class="sb-sidenav-menu-heading">  İdari İşlemler</div>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                İdari İşlemler
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="duyuruekle.php">Duyuru Ekle</a>
                                    <a class="nav-link" href="bolumekle.php">Bolüm Ekle</a>
                                 
                                    <a class="nav-link" href="fakulteekle.php">Fakülte Ekle</a>
                                    <a class="nav-link" href="myoekle.php">MYO Ekle</a>
                                    <a class="nav-link" href="ogrenciekle.php">Öğrenci Ekle</a>
                                    <a class="nav-link" href="ogretmenekle.php">Öğretmen Ekle </a>
                              
                                   
                                </nav>

                           
                            </div>
                            <?php   }?>
                         
                          
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">  Doldurulacak</div>
                      Doldurulacak
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
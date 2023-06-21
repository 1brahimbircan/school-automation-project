<?php 
session_start();


if (basename($_SERVER['PHP_SELF'])==basename(__FILE__)) {

    header("Location:404.php");
    exit("Bu sayfaya erişim yasak");
}


require_once 'nedmin/baglanti.php';


  $kullanicisor=$baglanti->prepare("SELECT * from kullanicilar where kullanici_no=:kullanici_no ");
  $kullanicisor->execute(array(
    'kullanici_no'=>$_SESSION['girisbelgesi']
    
  ));
  
  $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
  $var=$kullanicisor->rowCount();

  if ($var==0) {
    header("Location:kullanici/giris?durum=izinsizgiris");
  }



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>NOHU Otomasyon</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="images/nohu.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <nav class="navbar p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
         
          <a class="sidebar-brand brand-logo" href="index"><img style="width:100px ; margin: 38%;" src="images/logo.png" alt="logo" /></a>
         
        </div>
        <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>



          <ul class="navbar-nav navbar-nav-right">
         

            <li  class="nav-item dropdown border-left">
              <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-email"></i>
                <span class="count bg-success"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <h6 class="p-3 mb-0">Mesajlar</h6>
                <div class="dropdown-divider"></div>

                   <?php

                     $mesajsor=$baglanti->prepare("SELECT * from mesajlar limit 4 ");
                     $mesajsor->execute(array());
                     
                     while($mesajcek=$mesajsor->fetch(PDO::FETCH_ASSOC)){ ?>
                    <a href="mesaj_detay?mesajid=<?php echo $mesajcek['mesaj_id'] ?>" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="images/profil.jpg" alt="image" class="rounded-circle profile-pic">
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1"><?php echo $mesajcek['mesaj_gonderen'] ?></p>
                    <p class="text-muted mb-0"> <?php echo $mesajcek['mesaj_konu'] ?> </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                     <?php } ?> 
                
                
                <div class="dropdown-divider"></div>
                <p class="p-3 mb-0 text-center"></p>
              </div>
            </li>
            <li class="nav-item dropdown border-left">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-bell"></i>
                <span class="count bg-danger"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <h6 class="p-3 mb-0">Bildirimler</h6>
                <div class="dropdown-divider"></div>
                <?php 
                  $duyurusor=$baglanti->prepare("SELECT * from duyurular order by duyuru_tarih DESC limit 3");
                  $duyurusor->execute(array());

                  while($duyurucek=$duyurusor->fetch(PDO::FETCH_ASSOC)){ ?>
                <a style="width: 250px;" class="dropdown-item preview-item"> 
                <div  class="preview-thumbnail">
                      <div style="border-radius: 50%;" class="preview-icon bg-primary">
                        <i class="mdi mdi-file-document"></i>
                      </div>
                    </div>  
                  <div  class="preview-item-content">
                    <p class="preview-subject mb-1"><?php echo $duyurucek['duyuru_baslik'] ?></p>
                    <p class="text-muted ellipsis mb-0"><?php echo $duyurucek['duyuru_tarih'] ?> </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
               <?php } ?>
                
                <div class="dropdown-divider"></div>
                <p class="p-3 mb-0 text-center">Tüm Bildirimleri Gör</p>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                <div class="navbar-profile">
                  <img class="img-xs rounded-circle" src="images/profil.jpg" alt="">
                  <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $kullanicicek['kullanici_ad']?> <?php echo $kullanicicek['kullanici_soyad'] ?></p>
                  <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                <h6 class="p-3 mb-0">Profile</h6>
                <div class="dropdown-divider"></div>
              
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item" href="kullanicicikis">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-logout text-danger"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject mb-1">Çıkış Yap</p>
                  </div>
                </a>               
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
          </button>
        </div>
      </nav>
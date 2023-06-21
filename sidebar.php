  <?php 

if (basename($_SERVER['PHP_SELF'])==basename(__FILE__)) {

    header("Location:404.php");
    exit("Bu sayfaya erişim yasak");
}




?>

  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" href="index"><img style=";width:190px;height: 40px;" src="images/logo.png" alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini" href="index"><img  style="width:45px;height: 40px; margin:-15%" src="images/nohu.png" alt="logo" /></a>
    </div>
    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">

            <div class="count-indicator">

              <!-- <h3 class="text-center" style="font-size: 18PX;position: absolute; margin-left: 15%;margin-right: 25%;margin-top: 25%;">MA</h3> -->

              <img class="img-xs rounded-circle " src="images/profil.jpg" alt="" >



              <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
              <h5 class="mb-0 font-weight-normal"><?php echo $kullanicicek['kullanici_ad']?> <?php echo $kullanicicek['kullanici_soyad'] ?></h5>

              <?php 
              if ($kullanicicek['kullanici_yetki']==0) { ?>
                <span>Oğrenci</span>
              <?php } elseif ($kullanicicek['kullanici_yetki']==1) { ?>
                <span>Öğretim Görevlisi</span>
              <?php } elseif ($kullanicicek['kullanici_yetki']==2) { ?>
                <span>Yönetici</span>
              <?php } ?>


              

            </div>
          </div>


        </div>
      </li>
      <li class="nav-item nav-category">

      </li>


      <?php 
      if ($kullanicicek['kullanici_yetki']==0) { ?>

        <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
              <i class="mdi mdi-account"></i>
            </span>
            <span class="menu-title">Öğrenci bilgileri</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="kisisel-bilgiler">Kişisel Bilgiler</a></li>

            </ul>
          </div>
        </li>

        <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
              <i class="mdi mdi-equal-box"></i>
            </span>
            <span class="menu-title">Ders işlemleri</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic2">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">Yarıyıl Dersleri *</a></li>
              <li class="nav-item"> <a class="nav-link" href="">Ders Kayıt *</a></li>
              <li class="nav-item"> <a class="nav-link" href="ders-programi-listele">Ders Programı</a></li>
              <li class="nav-item"> <a class="nav-link" href="not-durum">Not Durum</a></li>
            </ul>
          </div>
        </li>

      <?php } elseif ($kullanicicek['kullanici_yetki']==1) { ?>

        <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
              <i class="mdi mdi-account"></i>
            </span>
            <span class="menu-title">Öğretmen</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic3">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="notlar-ekle">Not Ekle</a></li>
              <li class="nav-item"> <a class="nav-link" href="ogrenci-kayit">Ögrenci Ekle</a></li>
              <li class="nav-item"> <a class="nav-link" href="mesaj_gonder">Mesaj Gönder</a></li>

            </ul>
          </div>
        </li>

      <?php   } elseif ($kullanicicek['kullanici_yetki']==2) { ?>

        <li class="nav-item menu-items">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic4" aria-expanded="false" aria-controls="ui-basic">
            <span class="menu-icon">
              <i class="mdi mdi-account"></i>
            </span>
            <span class="menu-title">Yönetici</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic4">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="ders-listele">Ders işlemleri</a></li>
              <li class="nav-item"> <a class="nav-link" href="bolum-listele">Bölüm işlemleri</a></li>
              <li class="nav-item"> <a class="nav-link" href="duyuru-ekle">Duyuru Ekle</a></li>
               <li class="nav-item"> <a class="nav-link" href="akademik-takvim-giris">Akademik Takvim Ekle</a></li>
              <li class="nav-item"> <a class="nav-link" href="ders-programi-ekle">Ders Programı Ekle</a></li>
              <li class="nav-item"> <a class="nav-link" href="ogretimgrvlisi-kayit">Öğretmen Kayıt</a></li>


            </ul>
          </div>
        </li>

      <?php   }  ?>


      <li class="nav-item menu-items">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
          <span class="menu-icon">
            <i class="mdi mdi-settings text-success"></i>
          </span>
          <span class="menu-title">Ayarlar</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">


          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="kimlik-bilgileri"> Kimlik Bilgileri </a></li>
            <li class="nav-item"> <a class="nav-link" href="iletisim-bilgileri"> İletişim Bilgileri </a></li>
            <li class="nav-item"> <a class="nav-link" href="sifre-islemleri-duzenleme"> Şifre İşlemleri </a></li>
          </ul>

        </div>
      </li>
       <li class="nav-item menu-items">
          <a class="nav-link" href="kullanicicikis">
            <span class="menu-icon">
              <i class="mdi mdi-logout text-danger"></i>
            </span>
            <span class="menu-title">Çıkış Yap</span>
          </a>
        </li>

    </ul>
  </nav>
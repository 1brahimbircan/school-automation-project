
<!-- HEADER -->
<?php require_once'header.php'; ?>
<!-- /HEADER -->


<!-- sidebar -->
<?php require_once'sidebar.php'; ?>
<!-- /sidebar -->


<!-- partial -->
<div class="container-fluid page-body-wrapper">

 <!-- partial -->
 <div class="main-panel">
  <div class="content-wrapper">

    <!-- Siyah alan başlangıç -->

    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            
            <h4 class="card-title">Sifre İslemleri</h4>
            <p class="card-description">  
              <?php 

            if (@$_GET['durum']=="hata") { ?>
                <div class="alert alert-danger">
                <strong>Hata!</strong> İşlem Başarısız
                </div>
          <?php } elseif (@$_GET['durum']=="ok") {?>
             <div class="alert alert-success">
                <strong>Bilgi!</strong> Güncelleme Başarılı
                </div>
                 <?php } elseif (@$_GET['durum']=="eskisifrehata") {?>
             <div class="alert alert-danger">
                <strong>Bilgi!</strong> Eski Şifreniz Hatalı
                </div>
                 <?php } elseif (@$_GET['durum']=="sifreleruyusmuyor") {?>
             <div class="alert alert-danger">
                <strong>Bilgi!</strong> Şifreler Uyuşmuyor
                </div>
                 <?php } elseif (@$_GET['durum']=="eksiksifre") {?>
             <div class="alert alert-danger">
                <strong>Bilgi!</strong> Şifreniz en az 8 karakter olmalı
                </div>
        <?php }else{
          echo "Burası şifre işlemleri alanıdır.";
        } ?> </p>
            <form action="nedmin/islem.php" method="POST" class="forms-sample">
              <div class="form-group">
                <label for="exampleInputUsername1">Mevcut şifre</label>
                <input required name="kullanici_eskipassword" type="text" class="form-control" id="exampleInputUsername1" placeholder="Mevcut Şifrenizi giriniz">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Yeni Şifre</label>
                <input required name="kullanici_passwordone"  type="password" class="form-control" id="exampleInputEmail1" placeholder="Yeni şifre giriniz">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Yeni Şifre (tekrar)</label>
                <input required name="kullanici_passwordtwo"  type="password" class="form-control" id="exampleInputPassword1" placeholder="Yeni şifre Tekrar">
              </div>
              
              <div class="form-check form-check-flat form-check-primary">
                <label class="form-check-label">
                  <input required type="checkbox" class="form-check-input"> Yaptığım değişiklikleri onaylıyorum </label>
                </div>
                <button style="background-color: #008FA2;" name="sifreguncelle" type="submit" class="btn  mr-2">Güncelle</button>
              </form>
            </div>
          </div>
        </div>


        <!-- Siyah alan bitiş -->

      </div>
    </div>

    <!-- footer -->
    <?php require_once'footer.php'; ?>
    <!-- /footer -->


<!-- HEADER -->
<?php require_once'header.php'; ?>
<!-- /HEADER -->

<!-- sidebar -->
<?php require_once'sidebar.php'; ?>
<!-- /sidebar -->

    <?php require_once 'izinsiz/ogrenciizinsiz.php'; ?>
    <?php require_once 'izinsiz/yoneticiizinsiz.php'; ?>

<!-- partial -->
<div class="container-fluid page-body-wrapper">

 

 <!-- partial -->
 <div class="main-panel">
  <div class="content-wrapper">

    <!-- Siyah alan başlangıç -->
    <div class="row">
      <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Öğrenci Bilgilerini Giriniz</h4>
            <?php 

            if (@$_GET['yuklenme']=="basarili") { ?>
              <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong style="font-size:15px">Öğrenci Başarıyla Eklendi!</strong>
                
              </div>
            <?php } elseif(@$_GET['yuklenme']=="basarisiz") { ?>
              <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong style="font-size:15px">Öğrenci Eklenirken Bir Hata Oluştu!</strong>

              </div>
            <?php } elseif(@$_GET['yuklenme']=="sifreeksik") { ?>
              <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong style="font-size:15px">Eksik Şifre!(8 veya daha fazla haneli şifre giriniz.)</strong>

              </div>
            <?php } elseif(@$_GET['yuklenme']=="sifrehata") { ?>
              <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong style="font-size:15px">Hatalı şifre girdiniz!</strong>

              </div>
            <?php }else{ ?>
              <p class="card-description"> Burası öğrenci kayıt alanıdır. </p>
            <?php } ?>
            
            <form  action="nedmin/islem.php" method="POST" class="forms-sample">
              <div class="form-group">
                <label for="exampleInputUsername1">Öğrencinin Adı </label>
                <input required name="kullaniciAd" type="text" class="form-control" id="exampleInputUsername1" placeholder="Ad giriniz">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Öğrencinin Soyadı</label>
                <input required  name="kullaniciSoyad" type="text" class="form-control" id="exampleInputUsername1" placeholder="Soyad giriniz">
              </div>                
              <div class="form-group">
                <label for="exampleInputPassword1">Öğrencinin Numarasını Giriniz</label>
                <input required name="kullaniciNo" type="text" class="form-control" id="exampleInputPassword1" placeholder="Okul numarasını giriniz">
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect2">Sınıf :</label>
                <select name="derssinif" class="form-control" id="exampleFormControlSelect2" >
                  <option value="">SINIF SEÇ</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputConfirmPassword1">Şifre</label>
                <input required name="kullaniciSifre" type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Şifre giriniz">
              </div>
              <div class="form-group">
                <label for="exampleInputConfirmPassword1">Şifre Tekrar</label>
                <input required name="sifreTekrar" type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Şifre Tekrar">
                <input type="hidden" name="kullaniciYetki" value="0">
                <input type="hidden" name="kullaniciYetkiGiren" value="<?php echo $kullanicicek['kullanici_yetki']; ?>">
                <input type="hidden" name="kullaniciBolum" value="<?php echo $kullanicicek['kullanici_bolum']; ?>">
              </div>
              
              <button style="float: right;background-color:#008FA2" name="uyelerkaydet" type="submit" class="btn btn-primary mr-2">Kaydet</button>
              
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


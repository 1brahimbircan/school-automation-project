
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
      <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <button style="float: right;background-color: #008FA2" type="submit" class="btn mr-1" onclick="window.location.href = 'iletisim-bilgileri-duzenleme';">düzenle</button>
            <h4 class="card-title">İletişim Bilgileri</h4>
            <p class="card-description">
             <?php 

            if (@$_GET['yuklenme']=="basarisiz") { ?>
              <div class="alert alert-danger">
                <strong>Hata!</strong> İşlem Başarısız
              </div>
            <?php } elseif (@$_GET['yuklenme']=="basarili") {?>
             <div class="alert alert-success">
              <strong>Bilgi!</strong> Güncelleme Başarılı
            </div>
          <?php } else{
            echo "Burası iletişim bilgilerinin kayıt alanıdır.";
          } ?> </p>
          <form class="forms-sample">
            <div class="form-group">
              <label for="exampleInputUsername1">Adres</label>
              <input disabled type="text" class="form-control" id="exampleInputUsername1" placeholder="<?php echo $kullanicicek['kullanici_adres'] ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">İl</label>
              <input disabled type="text" class="form-control" id="exampleInputPassword1" placeholder="<?php echo $kullanicicek['kullanici_il'] ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputConfirmPassword1">İlçe</label>
              <input disabled type="text" class="form-control" id="exampleInputConfirmPassword1" placeholder="<?php echo $kullanicicek['kullanici_ilce'] ?>">
            </div>
                <div class="form-group">
              <label for="exampleInputConfirmPassword1">Posta Kodu</label>
              <input disabled type="text" class="form-control" id="exampleInputConfirmPassword1" placeholder="<?php echo $kullanicicek['kullanici_postkod'] ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Cep Telefonu</label>
              <input disabled type="text" class="form-control" id="exampleInputEmail1" placeholder="<?php echo $kullanicicek['kullanici_ceptel'] ?>">
            </div>
            <div class="form-group">
              <label for="exampleInputConfirmPassword1">Ev Telefonu</label>
              <input disabled type="text" class="form-control" id="exampleInputConfirmPassword1" placeholder="<?php echo $kullanicicek['kullanici_evtel'] ?>">
            </div>
           
            <div class="form-check form-check-flat form-check-primary">



            </form>
          </div>
        </div>
      </div>
    </div>


    <!-- Siyah alan bitiş -->

  </div>
</div>

<!-- footer -->
<?php require_once'footer.php'; ?>
<!-- /footer -->


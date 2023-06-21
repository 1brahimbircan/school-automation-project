
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
            <h4 class="card-title">Mesajınızı Giriniz</h4>
            <?php 

            if (@$_GET['yuklenme']=="basarili") { ?>
              <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong style="font-size:15px">Mesaj Başarıyla Eklendi!</strong>

              </div>
            <?php } elseif(@$_GET['yuklenme']=="basarisiz") { ?>
              <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong style="font-size:15px">Mesaj Eklenirken Bir Hata Oluştu!</strong>

              </div>
            <?php } ?>

            <form action="nedmin/islem.php" method="POST" class="forms-sample">
              <div class="form-group">
                <label for="exampleInputUsername1">Konu Başlığı</label>
                <input required name="konubasligi" type="text" class="form-control" id="exampleInputUsername1" placeholder="">
              </div>
              <div class="form-group">
                <label for="exampleInputConfirmPassword1">Mesajınızın İçeriği</label>
                <textarea required name="mesaj" style="height: 300px;" type="text" class="form-control" id="exampleInputConfirmPassword1" placeholder="" ></textarea>
              </div>
              <input type="hidden" name="gonderen" value="<?php echo $kullanicicek['kullanici_ad'] ?>  <?php echo $kullanicicek['kullanici_soyad'] ?> ">

              <button style="float: right;background-color:#008FA2" name="mesajgonder" type="submit" class="btn btn-primary mr-2">Gönder</button>

            </form>
          </div>
        </div>
      </div>


    </div>
    <!-- Siyah alan bitiş -->


  </div>

  <!-- footer -->
  <?php require_once'footer.php'; ?>
  <!-- /footer -->


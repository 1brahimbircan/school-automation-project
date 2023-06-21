
<!-- HEADER -->
<?php require_once'header.php'; ?>
<!-- /HEADER -->

<!-- sidebar -->
<?php require_once'sidebar.php'; ?>
<!-- /sidebar -->
<?php

$mesajdetaysor=$baglanti->prepare("SELECT * from mesajlar where mesaj_id=:id");
$mesajdetaysor->execute(array(
 'id'=>$_GET['mesajid']
));

$mesajcek=$mesajdetaysor->fetch(PDO::FETCH_ASSOC) ?>

<!-- partial -->
<div class="container-fluid page-body-wrapper">

 

 <!-- partial -->
 <div class="main-panel">
  <div class="content-wrapper">

    <!-- Siyah alan başlangıç -->
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><?php echo $kullanicicek['kullanici_ad'] ?>  <?php echo $kullanicicek['kullanici_soyad'] ?></h4>
            
            <form  class="forms-sample">
              <div class="form-group">
                <label for="exampleInputUsername1">Konu Başlığı</label>
                <input disabled  type="text" class="form-control" id="exampleInputUsername1" placeholder="<?php echo $mesajcek['mesaj_konu'] ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputConfirmPassword1">Mesaj içeriği</label>
                <textarea disabled  style="height: 300px;" type="text" class="form-control" id="exampleInputConfirmPassword1" placeholder="<?php echo $mesajcek['mesaj_icerik'] ?>" ></textarea>
              </div>
              
              
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


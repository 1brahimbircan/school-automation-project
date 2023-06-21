
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
                    <h4 class="card-title">İletişim Bilgileri</h4>
                    <p class="card-description"> Burası iletişim bilgilerinin kayıt alanıdır. </p>
                    <form action="nedmin/islem.php" method="POST" class="forms-sample">
                      <div  class="form-group">
                        <label for="exampleInputUsername1">Adres</label>
                        <input name="adres" type="text" class="form-control" id="exampleInputUsername1" value="<?php echo $kullanicicek['kullanici_adres'] ?>">
                      </div>                     
                      <div class="form-group">
                        <label for="exampleInputPassword1">İl</label>
                        <input name="il" type="text" class="form-control" id="exampleInputPassword1"  value="<?php echo $kullanicicek['kullanici_il'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">İlçe</label>
                        <input name="ilce" type="text" class="form-control" id="exampleInputConfirmPassword1"  value="<?php echo $kullanicicek['kullanici_ilce'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Posta Kodu</label>
                        <input name="postkod" type="text" class="form-control" id="exampleInputConfirmPassword1"  value="<?php echo $kullanicicek['kullanici_postkod'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Cep Telefonu</label>
                        <input name="ceptel" type="text" class="form-control" id="exampleInputEmail1"  value="<?php echo $kullanicicek['kullanici_ceptel'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Ev Telefonu</label>
                        <input name="evtel" type="text" class="form-control" id="exampleInputConfirmPassword1"  value="<?php echo $kullanicicek['kullanici_evtel'] ?>">
                      </div>
                     
                      <div class="form-check form-check-flat form-check-primary">
                        
                          <input  type="hidden" name="kuladi" value="<?php echo $kullanicicek['kullanici_id'] ?>">
                             
                        </div>
                      <button style="background-color: #008FA2;" name="adreskaydet" type="submit" class="btn mr-2">Güncelle</button>
                      <a type="button" class="btn btn-dark mr-2"  href="iletisim-bilgileri">İptal</a>
                     
                    </form>
                 </div>
                </div>
              </div>


        <!-- Siyah alan bitiş -->


      </div>


      <!-- footer -->
      <?php require_once'footer.php'; ?>
      <!-- /footer -->


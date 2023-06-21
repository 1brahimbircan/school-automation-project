


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
                    
                    
   </body>
</html>
 

                    <h4 class="card-title">Kimlik Bilgileri</h4> 

                    <p class="card-description"> Burası Kimlik bilgilerinin kayıt alanıdır. </p>

                    <form action="nedmin/islem.php" method="POST" class="forms-sample">
                      <div class="form-group">
                        <label for="exampleInputUsername1">TC Kimlik NO</label>
                        <input name="tcno" type="text" class="form-control" id="exampleInputUsername1" value="<?php echo $kullanicicek['kullanici_tc'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">İsim</label>
                        <input name="isim"  type="text" class="form-control" id="exampleInputEmail1"  value="<?php echo $kullanicicek['kullanici_ad'] ?>">
                      </div>
                       <div class="form-group">
                        <label for="exampleInputEmail1">Soyisim</label>
                        <input name="soyisim"  type="text" class="form-control" id="exampleInputEmail1"  value="<?php echo $kullanicicek['kullanici_soyad'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Doğum Tarihi</label>
                        <input name="dote"  type="text" class="form-control" id="exampleInputPassword1"  value="<?php echo $kullanicicek['kullanici_dogumt'] ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Doğum Yeri</label>
                        <input name="doye" type="text" class="form-control" id="exampleInputConfirmPassword1"  value="<?php echo $kullanicicek['kullanici_dogumy'] ?>">
                      </div>
                      <div class="form-check form-check-flat form-check-primary">
                       
                          <input type="hidden" name="kuladi" value="<?php echo $kullanicicek['kullanici_id'] ?>">
                      </div>
                      <button style="background-color:#008FA2" name="kimlikkaydet" type="submit" class="btn  mr-2">Kabul et</button>
                      <button class="btn btn-dark">İptal et</button>
                    </form>

                  </div>
                </div>
              </div>


        <!-- Siyah alan bitiş -->


      </div>

      <!-- footer -->
      <?php require_once'footer.php'; ?>
      <!-- /footer -->


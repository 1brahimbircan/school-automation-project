
   <!-- HEADER -->
   <?php require_once'header.php'; ?>
   <!-- /HEADER -->


   <!-- sidebar -->
   <?php require_once'sidebar.php'; ?>
   <!-- /sidebar -->

    <?php require_once 'izinsiz/ogrenciizinsiz.php'; ?>
    <?php require_once 'izinsiz/ogretmenizinsiz.php'; ?>


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
                <h4 class="card-title">Bölüm Kayıt</h4>
               
                <?php 

            if (@$_GET['yuklenme']=="basarili") { ?>
              <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong style="font-size:15px">Bölüm Başarıyla Eklendi!</strong>
                
              </div>
            <?php } elseif(@$_GET['yuklenme']=="basarisiz") { ?>
              <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong style="font-size:15px">Bölüm Eklenirken Bir Hata Oluştu!</strong>
               
              </div>
            <?php }else{ ?>
               <p class="card-description"> Burası Bölüm kayıt alanıdır. </p>
           <?php } ?>
                <form action="nedmin/islem.php" method="POST" class="forms-sample">
                  <div class="form-group">
                    <label for="exampleInputUsername1">Bolum Adı :</label>
                    <input required name="bolumadi"  type="text" class="form-control" id="exampleInputUsername1" placeholder="Bölüm Adı giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputUsername1">Bolum Kodu :</label>
                    <input required name="bolumkodu"  type="text" class="form-control" id="exampleInputUsername1" placeholder="Bölüm Kodu giriniz">
                  </div>                            
                  <div  class="form-check form-check-flat form-check-light">
                    <label class="form-check-label">
                      <input required type="checkbox" class="form-check-input"> Yaptığım değişiklikleri onaylıyorum  </label>
                    </div>

                    <button name="bolumkaydet" style="background-color:#008FA2;float: right;" type="submit" class="btn">Kaydet</button>
                    
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


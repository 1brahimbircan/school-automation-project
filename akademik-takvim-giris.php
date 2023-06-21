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
          <div class="col-md-10 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Akademik Takvim Kayıt</h4>
                <p class="card-description"> Burası Akademik Takvim kayıt alanıdır. </p>
                 <?php 

            if (@$_GET['yuklenme']=="basarili") { ?>
              <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong style="font-size:15px">Akademik Takvim Başarıyla Eklendi!</strong>
                
              </div>
            <?php } elseif(@$_GET['yuklenme']=="basarisiz") { ?>
              <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong style="font-size:15px">Akademik Takvim Eklenirken Bir Hata Oluştu!</strong>

              </div> <?php } ?>
                <form action="nedmin/islem.php" method="POST" class="forms-sample">
                  <div class="form-group">
                    <label for="exampleInputUsername1">Akademik Takvim URL'si:</label>
                    <input name="akur"  type="text" class="form-control" id="exampleInputUsername1" placeholder="Akademik takvim URL'si giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputUsername1">Ogretim Yili:</label>
                    <input name="ogryil"  type="text" class="form-control" id="exampleInputUsername1" placeholder="Ogretim yilini giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputUsername1">Yariyil Baslangic Tarihi</label>
                    <input name="yarbas"  type="text" class="form-control" id="exampleInputUsername1" placeholder="Yariyil baslangic tarihini giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputUsername1">Yariyil Bitis Tarihi</label>
                    <input name="yarbit"  type="text" class="form-control" id="exampleInputUsername1" placeholder="Yariyil bitis tarihini giriniz">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputUsername1">Donem adi:</label>
                    <input name="donemadi"  type="text" class="form-control" id="exampleInputUsername1" placeholder="Donem adi giriniz">
                  </div>                            
                  <div  class="form-check form-check-flat form-check-light">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input"> Yaptığım değişiklikleri onaylıyorum  </label>
                    </div>

                    <button name="takvimkaydet" style="background-color:#2ca399;float: right;" type="submit" class="btn">Kaydet</button>
                    
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
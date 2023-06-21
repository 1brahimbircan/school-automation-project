
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
            <h4 class="card-title">Ders Kayıt</h4>
            
            <?php 

            if (@$_GET['yuklenme']=="basarili") { ?>
              <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong style="font-size:15px">Ders Başarıyla Eklendi!</strong>
                
              </div>
            <?php } elseif(@$_GET['yuklenme']=="basarisiz") { ?>
              <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong style="font-size:15px">Ders Eklenirken Bir Hata Oluştu!</strong>
               
              </div>
            <?php }else{ ?>
              <p class="card-description"> Burası ders bilgilerinin kayıt alanıdır. </p>
           <?php } ?>
            <form action="nedmin/islem.php" method="POST" class="forms-sample">
              <div class="form-group">
                <label for="exampleInputUsername1">Ders Adı :</label>
                <input required name="dersadi"  type="text" class="form-control" id="exampleInputUsername1" placeholder="Ders Adı giriniz">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Ders Kodu :</label>
                <input required name="derskodu" type="text" class="form-control" id="exampleInputEmail1" placeholder="Ders Kodunu giriniz">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">AKTS :</label>
                <input required name="dersakts" type="text" class="form-control" id="exampleInputPassword1" placeholder="Ders AKTS giriniz">
              </div>

              <div class="form-group">
                <label for="exampleFormControlSelect2">Bölüm :</label>
                <select required name="dersbolum" class="form-control" id="exampleFormControlSelect2" >
                  <option value="0">BÖLÜM SEÇ</option>
                  <?php 
                  $bolumsor=$baglanti->prepare("SELECT * from bolumler");
                  $bolumsor->execute(array( ));

                  while($bolumcek=$bolumsor->fetch(PDO::FETCH_ASSOC)){ ?>

                    <option value="<?php echo $bolumcek['bolum_kodu'] ?>"><?php echo $bolumcek['bolum_adi'] ?></option>
                  <?php } ?>
                  
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect2">Sınıf :</label>
                <select required name="derssinif" class="form-control" id="exampleFormControlSelect2" >
                  <option value="">SINIF SEÇ</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect2">Eğitmen :</label>
                <select required name="dersegitmenkodu" class="form-control" id="exampleFormControlSelect2" >
                  <option value="">EĞİTMEN SEÇ</option>

                  <?php 
                  $egitmensor=$baglanti->prepare("SELECT * from kullanicilar where kullanici_yetki=:yetki ");
                  $egitmensor->execute(array(

                    'yetki'=>1

                  ));
                 

                  while($egitmencek=$egitmensor->fetch(PDO::FETCH_ASSOC)){ ?>

                    <option value="<?php echo $egitmencek['kullanici_id'] ?>"><?php echo $egitmencek['kullanici_ad'] ?> <?php echo $egitmencek['kullanici_soyad'] ?></option>
                    

                  <?php } ?> 


                </select>
               
              </div>

              <div  class="form-check form-check-flat form-check-light">
                <label class="form-check-label">
                  <input required type="checkbox" class="form-check-input"> Yaptığım değişiklikleri onaylıyorum  </label>
                </div>

                <button name="derskaydet" style="background-color:#008FA2;float: right;" type="submit" class="btn">Kaydet</button>

              </form>
            </div>
          </div>
        </div>


        <!-- Siyah alan bitiş -->


      </div>

      <!-- footer -->
      <?php require_once'footer.php'; ?>
      <!-- /footer -->


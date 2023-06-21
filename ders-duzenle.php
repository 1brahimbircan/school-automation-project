
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
    <?php 
    $derssor=$baglanti->prepare("SELECT * from dersler where id=:id");
    $derssor->execute(array(
      'id'=>$_GET['dersid']
    ));

    $derscek=$derssor->fetch(PDO::FETCH_ASSOC)?>
    <div class="row">
      <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Ders Düzenle</h4>

            <?php 

            if (@$_GET['yuklenme']=="basarili") { ?>
              <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong style="font-size:15px">Ders Başarıyla Güncellendi!</strong>

              </div>
            <?php } elseif(@$_GET['yuklenme']=="basarisiz") { ?>
              <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong style="font-size:15px">Ders Güncellenirken Bir Hata Oluştu!</strong>

              </div>
            <?php }else{ ?>
              <p class="card-description"> Burası ders bilgilerinin kayıt alanıdır. </p>
            <?php } ?>
            <form action="nedmin/islem.php" method="POST" class="forms-sample">
              <div class="form-group">
                <label for="exampleInputUsername1">Ders Adı :</label>
                <input required name="dersadi"  type="text" class="form-control" id="exampleInputUsername1" value="<?php echo $derscek['ders_adi']; ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Ders Kodu :</label>
                <input required name="derskodu" type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $derscek['ders_kodu']; ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">AKTS :</label>
                <input required name="dersakts" type="text" class="form-control" id="exampleInputPassword1" value="<?php echo $derscek['ders_akts']; ?>">
              </div>

              <div class="form-group">
                <label for="exampleFormControlSelect2">Bölüm :</label>
                <select required name="dersbolum" class="form-control" id="exampleFormControlSelect2" >
                  <option value="0">BÖLÜM SEÇ</option>
                  <?php 
                  $bolumsor=$baglanti->prepare("SELECT * from bolumler");
                  $bolumsor->execute(array( ));

                  while($bolumcek=$bolumsor->fetch(PDO::FETCH_ASSOC)){ ?>

                    <option <?php if($derscek['ders_bolum']==$bolumcek['bolum_kodu']){ echo "selected"; } ?> value="<?php echo $bolumcek['bolum_kodu'] ?>"> <?php echo $bolumcek['bolum_adi'] ?></option>
                      



                    <?php } ?>

                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlSelect2">Sınıf :</label>
                  <select required name="derssinif" class="form-control" id="exampleFormControlSelect2" >
                    <option value="">SINIF SEÇ</option>
                    <option <?php if($derscek['ders_sinif']==1){ echo "selected"; } ?> value="1">1</option>
                    <option <?php if($derscek['ders_sinif']==2){ echo "selected"; } ?> value="2">2</option>
                    <option <?php if($derscek['ders_sinif']==3){ echo "selected"; } ?> value="3">3</option>
                    <option <?php if($derscek['ders_sinif']==4){ echo "selected"; } ?> value="4">4</option>
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

                      <option <?php if($derscek['egitmen_kodu']==$egitmencek['kullanici_id']){ echo "selected"; } ?> value="<?php echo $egitmencek['kullanici_id'] ?>"><?php echo $egitmencek['kullanici_ad'] ?> <?php echo $egitmencek['kullanici_soyad'] ?></option>


                    <?php } ?> 


                  </select>

                </div>

                <div  class="form-check form-check-flat form-check-light">
                  <label class="form-check-label">
                    <input required type="checkbox" class="form-check-input"> Yaptığım değişiklikleri onaylıyorum  </label>
                    <input type="hidden" name="dersidd" value="<?php echo $derscek['id'] ?>">
                  </div>

                  <button name="dersduzenle" style="background-color:#008FA2;float: right;" type="submit" class="btn">Kaydet</button>

                </form>
              </div>
            </div>
          </div>


          <!-- Siyah alan bitiş -->


        </div>

        <!-- footer -->
        <?php require_once'footer.php'; ?>
        <!-- /footer -->


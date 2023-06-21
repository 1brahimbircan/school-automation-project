
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
            <h4 class="card-title">Ders Programı Kayıt</h4>
            
            <?php 

            if (@$_GET['yuklenme']=="basarili") { ?>
              <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong style="font-size:15px">Ders Programı Başarıyla Eklendi!</strong>
                
              </div>
            <?php } elseif(@$_GET['yuklenme']=="basarisiz") { ?>
              <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <strong style="font-size:15px">Ders Programı Eklenirken Bir Hata Oluştu!</strong>
               
              </div>
            <?php }else{ ?>
              <p class="card-description"> Burası ders programı kayıt alanıdır. </p>
           <?php } ?>
            <form action="nedmin/islem.php" method="POST" class="forms-sample">
              <div class="form-group">
                <label for="exampleInputUsername1">Başlık giriniz :</label>
                <input required name="baslik"  type="text" class="form-control" id="exampleInputUsername1" placeholder="Başlık giriniz">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">URL giriniz :</label>
                <input required name="url"  type="text" class="form-control" id="exampleInputUsername1" placeholder="URL giriniz">
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



              <div  class="form-check form-check-flat form-check-light">
                <label class="form-check-label">
                  <input required type="checkbox" class="form-check-input"> Yaptığım değişiklikleri onaylıyorum  </label>
                </div>

                <button name="dersprogramikaydet" style="background-color:#008FA2;float: right;" type="submit" class="btn">Kaydet</button>

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


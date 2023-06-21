




<!-- HEADER -->
<?php require_once'header.php'; ?>
<!-- /HEADER -->

<!-- sidebar -->
<?php require_once'sidebar.php'; ?>
<!-- /sidebar -->

    <?php require_once 'izinsiz/yoneticiizinsiz.php'; ?>
    <?php require_once 'izinsiz/ogretmenizinsiz.php'; ?>


<!-- partial -->
<div class="container-fluid page-body-wrapper">



 <!-- partial -->
 <div class="main-panel">
  <div class="content-wrapper">

    <!-- Siyah alan başlangıç -->

    <div class="col-md-12 col-xl-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex flex-row justify-content-between">
            <h4 class="card-title">Ders Programı</h4>
          </div>
          <div class="preview-list">
           
            <?php
            $dersprogramisor=$baglanti->prepare("SELECT * from dersprogrami where bolum=:bolum ");
            $dersprogramisor->execute(array(
              'bolum'=>$kullanicicek['kullanici_bolum']
            ));
            while($dersprogramicek=$dersprogramisor->fetch(PDO::FETCH_ASSOC)) { ?>

              <div class="preview-item border-bottom"> 
                <div class="preview-item-content d-flex flex-grow">
                  <div class="flex-grow">
                    <div class="d-flex d-md-block d-xl-flex justify-content-between">
                      <h6 class="preview-subject"><?php echo $dersprogramicek['baslik'] ?> Ogretim Yili Akademik Takvimi</h6>
                    </div>
                    <a target="_blank" href=<?php echo $dersprogramicek['url'] ?>><p class="text-muted">Buraya tiklayiniz</p></a>
                  </div>
                </div>
              </div>
        
              
            <?php  }    ?> 


          </div>
        </div>
      </div>
    </div>
    <!-- Siyah alan bitiş -->


  </div>

  <!-- footer -->
  <?php require_once'footer.php'; ?>
  <!-- /footer -->


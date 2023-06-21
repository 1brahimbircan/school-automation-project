



<!-- HEADER -->
<?php require_once'header.php'; ?>
<!-- /HEADER -->


<?php require_once'sidebar.php'; ?>



<!-- partial -->
<div class="container-fluid page-body-wrapper">


 <!-- partial -->
 <div class="main-panel">
  <div class="content-wrapper">


    <div class="row">

      <div class="col-md-12 grid-margin stretch-card">
        <div style="background-color:darkblue ;" class="card">

          <div class="card-body">
            <div class="d-flex flex-row justify-content-between">
              <h4 class="card-title mb-1">Duyurular</h4>
              <p class="text-muted mb-1">Duyuru Limiti 4</p>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="preview-list">

                  <?php 
                  $duyurusor=$baglanti->prepare("SELECT * from duyurular order by duyuru_tarih DESC limit 4");
                  $duyurusor->execute(array());

                  while($duyurucek=$duyurusor->fetch(PDO::FETCH_ASSOC)){ ?>
                   <div class="preview-item border-bottom">
                    <div  class="preview-thumbnail">
                      <div style="border-radius: 50%;" class="preview-icon bg-primary">
                        <i class="mdi mdi-file-document"></i>
                      </div>
                    </div>
                    <div class="preview-item-content d-sm-flex flex-grow">
                      <div class="flex-grow"><h5 style="font-size:18px" class="preview-subject"><?php echo $duyurucek['duyuru_baslik'] ?></h5>

                        <p style="font-size: 17px;" class="text-muted mb-0"><?php echo $duyurucek['duyuru_aciklama'] ?></p>
                        <p style="float:left; padding-top: 5px;" class="text-muted mb-0 pb-1" ><?php echo $duyurucek['duyuru_tarih'] ?></p>
                        
                      </div>

                    </div>
                  </div>

                <?php  }   ?>

                





              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>





  <div class="row">
    <div class="col-md-6 col-xl-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex flex-row justify-content-between">
            <h4 class="card-title">Akademik Takvim</h4>
          </div>
          <div class="preview-list">
            <?php
            $takvimsor=$baglanti->prepare("SELECT * from akademik_takvim order by eklenme_tarih DESC limit 1  ");
            $takvimsor->execute(array());
            while($takvimcek=$takvimsor->fetch(PDO::FETCH_ASSOC)) { ?>

              <div class="preview-item border-bottom"> 
                <div class="preview-item-content d-flex flex-grow">
                  <div class="flex-grow">
                    <div class="d-flex d-md-block d-xl-flex justify-content-between">
                      <h6 class="preview-subject"><?php echo $takvimcek['ogretim_yili'] ?> Ogretim Yili Akademik Takvimi</h6>
                    </div>
                    <a target="_blank" href=<?php echo $takvimcek['akademik_takvim_url'] ?>><p class="text-muted">Buraya tiklayiniz</p></a>
                  </div>
                </div>
              </div>
              <div class="preview-item border-bottom"> 
                <div class="preview-item-content d-flex flex-grow">
                  <div class="flex-grow">
                    <div class="d-flex d-md-block d-xl-flex justify-content-between">
                      <h6 class="preview-subject"><?php echo $takvimcek['ogretim_yili'] ?> Ogretim Yili <?php echo $takvimcek['donem_adi'] ?> Yariyili Baslangici</h6>
                    </div>
                    <p class="text-muted"><?php echo $takvimcek['yariyil_baslangic_tarihi'] ?></p>
                  </div>
                </div>
              </div>
              <div class="preview-item border-bottom"> 
                <div class="preview-item-content d-flex flex-grow">
                  <div class="flex-grow">
                    <div class="d-flex d-md-block d-xl-flex justify-content-between">
                      <h6 class="preview-subject"><?php echo $takvimcek['ogretim_yili'] ?> Ogretim Yili <?php echo $takvimcek['donem_adi'] ?> Yariyili Bitisi</h6>
                    </div>
                    <p class="text-muted"><?php echo $takvimcek['yariyil_bitis_tarihi'] ?></p> 
                  </div>
                </div>
              </div>
            <?php  }    ?> 


          </div>
        </div>
      </div>
    </div>


    <div class="col-md-6 col-xl-4 grid-margin stretch-card">
      <div class="card">
        <div  class="card-body">
          <h4 class="card-title">Slaytlar</h4>
          <div class="owl-carousel owl-theme full-width owl-carousel-dash portfolio-carousel" id="owl-carousel-basic">
             <div style="margin-top: 20% ;"  class="item">
              <img src="images/slider/1.jpg" alt="">
            </div>
            <div   class="item">

              <img src="images/slider/1.jfif" alt="">
            </div>

            <div   class="item">
              <img src="images/slider/3.jpeg" alt="">
            </div>
          </div>


        </div>
      </div>
    </div>
    <div class="col-md-6 col-xl-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex flex-row justify-content-between">
            <h4 class="card-title">Mesajlar</h4>
                   </div>
          <div class="preview-list">
           <?php

           $mesajsor=$baglanti->prepare("SELECT * from mesajlar  ");
           $mesajsor->execute(array());

           while($mesajcek=$mesajsor->fetch(PDO::FETCH_ASSOC)){ ?>


            <div class="preview-item border-bottom">
              <div class="preview-thumbnail">
                <img src="images/profil.jpg" alt="image" class="rounded-circle" />
              </div>
              <div class="preview-item-content d-flex flex-grow">
                <div class="flex-grow">
                  <div class="d-flex d-md-block d-xl-flex justify-content-between">
                    <h6 class="preview-subject"><?php echo $mesajcek['mesaj_gonderen'] ?></h6>
                    <p class="text-muted text-small"></p>
                  </div>
                  <p class="text-muted"><?php echo $mesajcek['mesaj_icerik'] ?></p>
                </div>
              </div>
            </div>
          <?php } ?>  

        </div>
      </div>

    </div>
  </div>
</div>
</div>

<!-- footer -->
<?php require_once'footer.php'; ?>
<!-- /footer -->


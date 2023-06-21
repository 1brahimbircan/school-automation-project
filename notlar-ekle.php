




<!-- HEADER -->
<?php require_once'header.php'; ?>
<!-- /HEADER -->

<!-- sidebar -->
<?php require_once'sidebar.php'; ?>
<!-- /sidebar -->

    <?php require_once 'izinsiz/ogrenciizinsiz.php'; ?>
    <?php require_once 'izinsiz/yoneticiizinsiz.php'; ?>

<!-- partial -->
<div class="container-fluid page-body-wrapper">



 <!-- partial -->
 <div class="main-panel">
  <div class="content-wrapper">

    <!-- Siyah alan başlangıç -->

    <?php
    $egitmen=$kullanicicek['kullanici_id'];
    $derslersor=$baglanti->prepare("SELECT * from dersler where egitmen_kodu=:egitmen  ");
    $derslersor->execute(array(
      'egitmen'=>$kullanicicek['kullanici_id']

    ));
    while($derslercek=$derslersor->fetch(PDO::FETCH_ASSOC)){ ?> 
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title"><?php echo $derslercek['ders_adi'] ?></h4>
          
            <p class="card-description"> Öğrenci Notlarını giriniz
            </p>
            <div class="table-responsive">
              <table style="color:white ;" class="table table-striped">
                <thead>
                  <tr >
                    <th class=""> Ogrenci ismi </th>
                    <th class=""> Numarasi </th>
                    <th class="col-2"> Vize notu </th>
                    <th class="col-2"   > Final notu </th>
                    <th class=""> İşlem </th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                  
                  $bolum=$kullanicicek['kullanici_bolum'];
                  $kullanicinotsor=$baglanti->prepare("SELECT * from kullanicilar where kullanici_bolum=:bolum and kullanici_yetki=:yetki ");
                  $kullanicinotsor->execute(array(
                    'bolum'=>$bolum,
                    'yetki'=>0
                  ));
                  $sayi=0;
                  while($kullanicinotcek=$kullanicinotsor->fetch(PDO::FETCH_ASSOC)){ 


                    $sinavsor=$baglanti->prepare("SELECT * from sinavlar where sinav_ogrenci=:ogrenci and sinav_adi=:sinav ");
                    $sinavsor->execute(array(
                      'ogrenci'=>$kullanicinotcek['kullanici_no'],
                      'sinav'=>$derslercek['ders_adi']

                    ));
                    $sinavcek=$sinavsor->fetch(PDO::FETCH_ASSOC); 


                    ?>
                    <form action="nedmin/islem.php" method="POST">
                      <div class="form-group">
                        <input type="hidden" name="ogrenci" value="<?php echo $kullanicinotcek['kullanici_no'] ?>">
                        <input type="hidden" name="sinavid" value="<?php echo $sinavcek['id'] ?>">
                        <tr>
                          <td class="py-1"><?php echo $kullanicinotcek['kullanici_ad'] ?> <?php echo $kullanicinotcek['kullanici_soyad'] ?></td>
                          <td><?php echo $kullanicinotcek['kullanici_no'] ?></td>
                          <td> 
                            <?php

                            if (@$sinavcek['sinav_durum']==1) { 
                              echo $sinavcek['vize_notu'];

                            }else { ?>

                              <div>
                                <input type="text" name="vizenotu" value="<?php echo @$sinavcek['vize_notu'] ?>">
                              </div>

                            <?php } ?>

                          </td>

                          <td>
                           <?php

                           if (@$sinavcek['sinav_durum']==1) { 
                            echo $sinavcek['final_notu'];

                          }else { ?>

                           <div>
                            <input type="text" name="finalnotu" value="<?php echo @$sinavcek['final_notu'] ?>">
                          </div>


                        <?php } ?>


                      </td>
                      <td>
                        <?php

                        if (@$sinavcek['sinav_durum']==1) { ?>
                         <button onclick="return confirm('Düzenlemek istediğinizden emin misiniz?')" name="sinavduzenle" type="submit" class="btn btn-outline-secondary btn-md">Düzenle</button>
                       <?php } elseif(@$sinavcek['sinav_durum']==0) { ?> 
                        <button name="sinavkaydet" type="submit" class="btn btn-outline-secondary btn-md">Kaydet</button>
                      <?php }else{ ?>
                        <button name="sinavguncelle" type="submit" class="btn btn-outline-secondary btn-md">Kaydet</button>
                      <?php }  ?>


                    </td>
                  </tr>
                  <input type="hidden" name="kuladi" value="<?php echo $kullanicinotcek['kullanici_ad'] ?> <?php echo $kullanicinotcek['kullanici_soyad'] ?>">
                  <input type="hidden" name="sinavadi" value="<?php echo $derslercek['ders_adi'] ?>">
                  <input type="hidden" name="egitmen" value="<?php echo $derslercek['egitmen_kodu'] ?>">
                  <input type="hidden" name="durum" value="1">
                </div>
              </form>

            <?php } ?> 

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>  


<?php } ?>


<!-- Siyah alan bitiş -->


</div>

<!-- footer -->
<?php require_once'footer.php'; ?>
<!-- /footer -->


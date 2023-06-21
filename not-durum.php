

<!-- HEADER -->
<?php require_once'header.php'; ?>
<!-- /HEADER -->

<!-- sidebar -->
<?php require_once'sidebar.php'; ?>
<!-- /sidebar -->

    <?php require_once 'izinsiz/ogretmenizinsiz.php'; ?>
    <?php require_once 'izinsiz/yoneticiizinsiz.php'; ?>

<!-- partial -->
<div class="container-fluid page-body-wrapper">



 <!-- partial -->
 <div class="main-panel">
  <div class="content-wrapper">


    <!-- Siyah alan başlangıç -->
    <?php
    $bolum=$kullanicicek['kullanici_bolum'];
    $sinif=$kullanicicek['kullanici_sinif'];
    $derslersor=$baglanti->prepare("SELECT dersler.*,kullanicilar.* FROM dersler INNER JOIN kullanicilar ON dersler.egitmen_kodu=kullanicilar.kullanici_id  where dersler.ders_bolum=:bolum and dersler.ders_sinif=:sinif ");
    $derslersor->execute(array(
      'bolum'=>$bolum,
      'sinif'=>$sinif
    ));
    while($derslercek=$derslersor->fetch(PDO::FETCH_ASSOC)){ ?> 
      <!-- ders -->
      <div style="padding-bottom: 50px;" class="col-lg-12 stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 style="background-color:#008FA2;" type="text" class="btn btn-lg btn-block"><?php echo $derslercek['ders_kodu']; ?> <?php echo $derslercek['ders_adi'];  ?> <?php echo $derslercek['ders_akts']; ?> AKTS</h4>
            <p class="card-description">
              Eğitmen : <?php echo $derslercek['kullanici_ad'].' ' .$derslercek['kullanici_soyad'] ?> 
              

            </p>
            <div class="table-responsive">
              <table class="table table-bordered table-contextual">
                <thead>

                </thead>
                <tbody>
                  <tr style="background-color:#423d3d; color: white;" class="table">

                    <td> </td>
                    <td> Vize </td>
                    <td> Final </td>
                    <td> Genel Ortalama</td>
                  </tr>
                  <tr style="color:black;" class="table-light">
                    <?php 
                    $ogrenciadi=$kullanicicek['kullanici_no'];
                    $dersadi=$derslercek['ders_adi'];
                    $sinavsor=$baglanti->prepare("SELECT * from sinavlar where sinav_ogrenci=:ogrenci and sinav_adi=:adi ");
                    $sinavsor->execute(array(

                      'ogrenci'=>$ogrenciadi,
                      'adi'=>$dersadi

                    ));

                    $sinavcek=$sinavsor->fetch(PDO::FETCH_ASSOC);

                    $vize=@(double)$sinavcek['vize_notu']*0.4;
                    $final=@(double)$sinavcek['final_notu']*0.6;
                    $genelort=$vize+$final;

                    ?>

                    <td>Sınav Notu  </td>
                    <td> 
                     <?php 
                     if (!isset($sinavcek['vize_notu'])) {
                       echo "-";
                     }else{ echo @$sinavcek['vize_notu']; } ?> 




                   </td>
                   <td> 
                    <?php 
                    if (@$sinavcek['final_notu'] == null) {
                     echo "-";
                   }else{ echo @$sinavcek['final_notu'];  } ?> 


                 </td>
                 <td> <?php 

                 if (@$sinavcek['final_notu'] == null) {
                    echo "-";
                 }else{
                 
                  echo @$genelort;
                 } ?>


                 </td>
               </tr>


             </tbody>
           </table>
         </div>
       </div>
     </div>  

   </div>


   <!-- /ders -->
 <?php }  ?>




</div>
<!-- Siyah alan bitiş -->


</div>

<!-- footer -->
<?php require_once'footer.php'; ?>
<!-- /footer -->



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
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <a href="ders-ekle">
             <button style="float:right;" type="submit" class="btn btn-outline-success">Ders Ekle</button>
           </a>
           <h4 class="card-title">Ders listele</h4>

           <p class="card-description">Dersleri düzenlemek için (<code><i  class="mdi mdi-pencil"></i></code>) butona basın.
           </p>
           <div class="table-responsive">
            <table style="color: white;" class="table table-striped">
              <thead>
                <tr>
                  <th> # </th>
                  <th> Ders Kodu </th>
                  <th> Ders Adı </th>
                  <th> Eğitmen </th>
                  <th> AKTS </th>
                  <th >  </th>
                </tr>
              </thead>
              <tbody>
               <?php

               $bolumderssor=$baglanti->prepare("SELECT bolumler.*,dersler.*,kullanicilar.* FROM bolumler INNER JOIN dersler ON bolumler.bolum_kodu=dersler.ders_bolum INNER JOIN kullanicilar ON dersler.egitmen_kodu=kullanicilar.kullanici_id where bolumler.id=:id order by ders_kodu ASC");
               $bolumderssor->execute(array(

                'id'=>$_GET['bolum_id']

              ));
               $sayi=0;


               while($bolumderscek=$bolumderssor->fetch(PDO::FETCH_ASSOC)) { $sayi++; ?> 
                 <tr>
                   <td class="py-1">
                     <?php echo $sayi; ?>
                   </td>
                   <td> <?php echo $bolumderscek['ders_kodu']; ?> </td>
                   <td> <?php echo $bolumderscek['ders_adi']; ?> </td>
                   <td> <?php echo $bolumderscek['kullanici_ad'].' '.$bolumderscek['kullanici_soyad']?> </td>
                   <td> <?php echo $bolumderscek['ders_akts']; ?> </td>
                   <td>
                    <a href="ders-duzenle?dersid=<?php echo $bolumderscek['id']; ?>" type="button" class="btn btn-light btn-icon-text">
                      <i style="color:black;font-size: 18px;" class="mdi mdi-pencil"></i></a>


                    </td>
                  </tr>

                <?php } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>



    <!-- Siyah alan bitiş -->

  </div>
</div>

<!-- footer -->
<?php require_once'footer.php'; ?>
<!-- /footer -->


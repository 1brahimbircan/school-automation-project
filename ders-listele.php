
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
                <p class="card-description">Bölüm derslerini  incelemek veya düzenlemek için  (<code><i  class="mdi mdi-export"></i></code>) butona basın.
                </p>
                <div class="table-responsive">
                  <table style="color: white;" class="table table-striped">
                    <thead>
                      <tr>
                        <th> # </th>
                        <th> Bölüm Kodu </th>
                        <th> Bölüm Adı </th>
                        <th> Ders Sayısı </th>
                        <th> Kontenjan </th>
                        <th >  </th>
                      </tr>
                    </thead>
                    <tbody>

                     <?php

                     $bolumsor=$baglanti->prepare("SELECT * from bolumler ");
                     $bolumsor->execute(array());
                     $sayi=0;
                     while($bolumcek=$bolumsor->fetch(PDO::FETCH_ASSOC)){ $sayi++;
                      $bolum=$bolumcek['bolum_kodu'];
                      $yorumsay=$baglanti->prepare("SELECT COUNT(id) as say FROM dersler where ders_bolum=:bolum ");
                      $yorumsay->execute(array(
                        'bolum'=> $bolum
                     ));
                      $saycek=$yorumsay->fetch(PDO::FETCH_ASSOC);


                      ?> 
                      <tr>
                        <td class="py-1">
                         <?php echo $sayi; ?>
                       </td>
                       <td> <?php echo $bolumcek['bolum_kodu']; ?> </td>
                       <td> <?php echo $bolumcek['bolum_adi']; ?> </td>
                       <td> <?php echo $saycek['say']; ?></td>
                       <td> 60 </td>
                       <td>
                        <a href="ders-listele-detay?bolum_id=<?php echo $bolumcek['id'] ?>">
                          <button type="button" class="btn btn-warning btn-icon-text">
                            <i style="color:black;font-size: 18px;" class="mdi mdi-export"></i></button>
                          </a>
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


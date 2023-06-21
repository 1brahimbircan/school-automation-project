

     <!-- HEADER -->
     <?php require_once'header.php'; ?>
     <!-- /HEADER -->
 

    <!-- sidebar -->
    <?php require_once'sidebar.php'; ?>
    <!-- /sidebar -->


    <!-- partial -->
    <div class="container-fluid page-body-wrapper">


     <!-- partial -->
     <div class="main-panel">
      <div class="content-wrapper">

        <!-- Siyah alan başlangıç -->


 <div class="row">
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Kimlk Bilgileri</h4>
                    <p class="card-description"> Bu kısımda kimlik bilgileri yer almaktadır.
                    </p>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          
                        </thead>
                        <tbody>
                          <tr>
                            <td>TC Kimlik No:</td>
                            <td><?php echo $kullanicicek['kullanici_tc'] ?></td>
                            
                          </tr>
                          <tr>
                            <td>İsim:</td>
                            <td><?php echo $kullanicicek['kullanici_ad'] ?></td>
                            
                            
                          </tr>
                          <tr>
                            <td>Soyisim:</td>
                            <td><?php echo $kullanicicek['kullanici_soyad'] ?></td>
                            
                            
                          </tr>
                          <tr>
                            <td>Doğum Yeri:</td>
                            <td><?php echo $kullanicicek['kullanici_dogumy'] ?></td>
                            
                            
                          </tr>
                           <tr>
                            <td>Doğum Tarihi:</td>
                            <td><?php echo $kullanicicek['kullanici_dogumt'] ?></td>
                            
                            
                          </tr>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
 <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">İletişim Bilgileri</h4>
                    <p class="card-description"> Bu kısımda iletişim bilgileri yer almaktadır.
                    </p>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          
                        </thead>
                        <tbody>
                          <tr>
                            <td>Adres:</td>
                            <td><?php echo $kullanicicek['kullanici_adres'] ?></td>
                            
                          </tr>
                          <tr>
                            <td>Cep Telefon:</td>
                            <td><?php echo $kullanicicek['kullanici_ceptel'] ?></td>
                            
                            
                          </tr>
                             <tr>
                            <td>İlçe:</td>
                            <td><?php echo $kullanicicek['kullanici_ilce'] ?></td>
                            
                            
                          </tr>
                          <tr>
                            <td>İl:</td>
                            <td><?php echo $kullanicicek['kullanici_il'] ?></td>
                            
                            
                          </tr>
                          <tr>
                            <td>Ev Telefon:</td>
                            <td><?php echo $kullanicicek['kullanici_evtel'] ?></td>
                            
                            
                          </tr>
                           <tr>
                            <td>Posta Kodu:</td>
                            <td><?php echo $kullanicicek['kullanici_postkod'] ?></td>
                            
                            
                          </tr>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
               <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Öğrenci Bilgileri</h4>
                    <p class="card-description"> Bu kısımda öğrenci bilgileri yer almaktadır.
                    </p>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          
                        </thead>
                        <tbody>
                          <tr>
                            <td>Öğrenci No:</td>
                            <td><?php echo $kullanicicek['kullanici_no']; ?></td>
                            
                          </tr>
                          <tr>
                            <td>Kayıt Tipi:</td>
                            <td>ÖSYM/YKS</td>
                            
                            
                          </tr>
                          <tr>
                            <td>Akademik Birim:</td>
                            <td>MÜHENDİSLİK FAKÜLTESİ</td>
                            
                            
                          </tr>
                          <tr>
                            <td>Bölüm Adı:</td>
                            <td>BİLGİSAYAR MÜHENDİSLİĞİ</td>
                            
                            
                          </tr>
                          <tr>
                            <td>Danışman:</td>
                            <td>Arş.Gör. AHMET ŞAKİR DOKUZ</td>
                            
                            
                          </tr>
                          <tr>
                            <td>Kayıt Tarihi:</td>
                            <td>04.09.2021</td>
                            
                            
                          </tr>
                          <tr>
                            <td>Şube:</td>
                            <td>  A Şubesi</td>
                            
                            
                         
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
        <!-- Siyah alan bitiş -->


      </div>

      <!-- footer -->
      <?php require_once'footer.php'; ?>
      <!-- /footer -->


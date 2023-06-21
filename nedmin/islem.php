 <?php

 ob_start();
 session_start();
 include 'baglanti.php';
 date_default_timezone_set('Europe/Istanbul');

//giriş işlemi
 if (isset($_POST['girisyap'])) {

  $kulno=htmlspecialchars($_POST['kulno']);
  $sifre=htmlspecialchars($_POST['sifre']);
  $sifreguclu=md5($sifre);


  $kullanicisor=$baglanti->prepare("SELECT * from kullanicilar where kullanici_no=:kullanici_no and kullanici_sifre=:kullanici_sifre ");
  $kullanicisor->execute(array(
    'kullanici_no'=>$kulno,
    'kullanici_sifre'=>$sifreguclu


  ));
  
  $var=$kullanicisor->rowCount();

  if ($var > 0) {

    $_SESSION['girisbelgesi']=$kulno;

    header("Location:../index?yuklenme=hosgeldin");
  }
  else{
   header("Location:../kullanici/giris?yuklenme=hata");
 }

}

// üyeler kaydet 
if (isset($_POST['uyelerkaydet'])) {
  $kullanici=htmlspecialchars($_POST['kullaniciYetkiGiren']);

  $ad=htmlspecialchars($_POST['kullaniciAd']);
  $soyad=htmlspecialchars($_POST['kullaniciSoyad']);
  $bolum=htmlspecialchars($_POST['kullaniciBolum']);
  $sinif=htmlspecialchars($_POST['derssinif']);
  $yetki=htmlspecialchars($_POST['kullaniciYetki']);
  $kulno=htmlspecialchars($_POST['kullaniciNo']);
  $sifre=htmlspecialchars($_POST['kullaniciSifre']);
  $sifreiki=htmlspecialchars($_POST['sifreTekrar']);
  $sifreguclu=md5($sifre);

  $kullanicisor=$baglanti->prepare("SELECT * from kullanicilar where kullanici_no=:kullanici_no");
  $kullanicisor->execute(array(

    'kullanici_no'=>$kulno,

  ));

  $var=$kullanicisor->rowCount();

  if ($var > 0) {
    header("Location:../kullanici/giris?yuklenme=kullanicivar");
  }
  else{

    if ($sifre==$sifreiki) {

      if (strlen($sifre)>=8) {

        $kullanicikaydet=$baglanti->prepare("INSERT into kullanicilar SET 

          kullanici_ad=:kullanici_ad,
          kullanici_soyad=:kullanici_soyad,
          kullanici_bolum=:kullanici_bolum,
          kullanici_sinif=:kullanici_sinif,
          kullanici_yetki=:kullanici_yetki,
          kullanici_no=:kullanici_no,
          kullanici_sifre=:kullanici_sifre

          ");

        $insert=$kullanicikaydet->execute(array(

         'kullanici_ad'=>$ad,
         'kullanici_soyad'=>$soyad,
         'kullanici_bolum'=>$bolum,
         'kullanici_sinif'=>$sinif,
         'kullanici_yetki'=>$yetki,
         'kullanici_no'=>$kulno,
         'kullanici_sifre'=>$sifreguclu

       ));
        if ($insert)
        {
          if ($kullanici == 2)
          {
            header("Location:../ogretimgrvlisi-kayit?yuklenme=basarili");
          }
          elseif ($kullanici == 1)
          {
            header("Location:../ogrenci-kayit?yuklenme=basarili");
          }
          
        }
        else{

         if ($kullanici == 2) 
         {
           header("Location:../ogretimgrvlisi-kayit?yuklenme=basarisiz");
         }
         elseif ($kullanici == 1)
         {
          header("Location:../ogrenci-kayit?yuklenme=basarisiz");
        }


      }


    }
    else{
     if ($kullanici == 2) 
     {
       header("Location:../ogretimgrvlisi-kayit?yuklenme=sifreeksik");
     }
     elseif ($kullanici == 1)
     {
      header("Location:../ogrenci-kayit?yuklenme=sifreeksik");
    }
    
  }

}
else{
 if ($kullanici == 2) 
 {
   header("Location:../ogretimgrvlisi-kayit?yuklenme=sifrehata");
 }
 elseif ($kullanici == 1)
 {
  header("Location:../ogrenci-kayit?yuklenme=sifrehata");
}

}

}

}

//ders kaydı

if (isset($_POST['derskaydet'])) {
  $derslerkaydet=$baglanti->prepare("INSERT into dersler SET 




    ders_adi=:ders_adi,
    ders_kodu=:ders_kodu,
    ders_akts=:ders_akts,
    ders_bolum=:ders_bolum,
    ders_sinif=:ders_sinif,
    egitmen_kodu=:egitmen_kodu


    ");

  $insert=$derslerkaydet->execute(array(


    'ders_adi'=>$_POST['dersadi'],
    'ders_kodu'=>$_POST['derskodu'],
    'ders_akts'=>$_POST['dersakts'],
    'ders_bolum'=>$_POST['dersbolum'],
    'ders_sinif'=>$_POST['derssinif'],
    'egitmen_kodu'=>$_POST['dersegitmenkodu']




  ));
  if ($insert) {

    header("Location:../ders-ekle?yuklenme=basarili");
  }
  else{
    header("Location:../ders-ekle?yuklenme=basarisiz");
  }

}

//ders duzenle

if (isset($_POST['dersduzenle'])) {
  $dersid=$_POST['dersidd'];
  $derslerkaydet=$baglanti->prepare("UPDATE dersler SET 




    ders_adi=:ders_adi,
    ders_kodu=:ders_kodu,
    ders_akts=:ders_akts,
    ders_bolum=:ders_bolum,
    ders_sinif=:ders_sinif,
    egitmen_kodu=:egitmen_kodu

  WHERE id = $dersid
    ");

  $insert=$derslerkaydet->execute(array(


    'ders_adi'=>$_POST['dersadi'],
    'ders_kodu'=>$_POST['derskodu'],
    'ders_akts'=>$_POST['dersakts'],
    'ders_bolum'=>$_POST['dersbolum'],
    'ders_sinif'=>$_POST['derssinif'],
    'egitmen_kodu'=>$_POST['dersegitmenkodu']




  ));
  if ($insert) {

    header("Location:../ders-duzenle?dersid=$dersid&yuklenme=basarili");
  }
  else{
    header("Location:../ders-duzenle?dersid=$dersid&yuklenme=basarisiz");
  }

}

if (isset($_POST['bolumkaydet'])) {
  $bolumlerkaydet=$baglanti->prepare("INSERT into bolumler SET 

    bolum_adi=:bolum_adi,
    bolum_kodu=:bolum_kodu

    ");

  $insert=$bolumlerkaydet->execute(array(

    'bolum_adi'=>$_POST['bolumadi'],
    'bolum_kodu'=>$_POST['bolumkodu']

  ));
  if ($insert) {

    header("Location:../bolum-ekle?yuklenme=basarili");
  }
  else{
    header("Location:../bolum-ekle?yuklenme=basarisiz");
  }

}

  //kimlik bilgileri kaydet

if (isset($_POST['kimlikkaydet'])) {
  $kullaniciid=$_POST['kuladi'];

  $bolumlerkaydet=$baglanti->prepare("UPDATE kullanicilar SET 

    kullanici_tc=:kullanici_tc,
    kullanici_ad=:kullanici_ad,
    kullanici_soyad=:kullanici_soyad,
    kullanici_dogumt=:kullanici_dogumt,
    kullanici_dogumy=:kullanici_dogumy

    WHERE kullanici_id = $kullaniciid

    ");

  $insert=$bolumlerkaydet->execute(array(

    'kullanici_tc'=>$_POST['tcno'],
    'kullanici_ad'=>$_POST['isim'],
    'kullanici_soyad'=>$_POST['soyisim'],
    'kullanici_dogumt'=>$_POST['dote'],
    'kullanici_dogumy'=>$_POST['doye']



  ));
  if ($insert) {

    header("Location:../kimlik-bilgileri?yuklenme=basarili");
  }
  else{
    header("Location:../kimlik-bilgileri?yuklenme=basarisiz");
  }

}


//adres bilgileri kaydet

if (isset($_POST['adreskaydet'])) {
  $kullaniciid=$_POST['kuladi'];

  $bolumlerkaydet=$baglanti->prepare("UPDATE kullanicilar SET 

    kullanici_adres=:kullanici_adres,
    kullanici_il=:kullanici_il,
    kullanici_ilce=:kullanici_ilce,
    kullanici_evtel=:kullanici_evtel,
    kullanici_ceptel=:kullanici_ceptel,
    kullanici_postkod=:kullanici_postkod


    WHERE kullanici_id = $kullaniciid

    ");

  $insert=$bolumlerkaydet->execute(array(

    'kullanici_adres'=>$_POST['adres'],
    'kullanici_il'=>$_POST['il'],
    'kullanici_ilce'=>$_POST['ilce'],
    'kullanici_evtel'=>$_POST['evtel'],
    'kullanici_ceptel'=>$_POST['ceptel'],
    'kullanici_postkod'=>$_POST['postkod']



  ));
  if ($insert) {

    header("Location:../iletisim-bilgileri?yuklenme=basarili");
  }
  else{
    header("Location:../iletisim-bilgileri?yuklenme=basarisiz");
  }

}

//sınav kaydı

if (isset($_POST['sinavkaydet'])) {
  $sinavkaydet=$baglanti->prepare("INSERT into sinavlar SET 

    sinav_adi=:sinav_adi,
    sinav_egitmen=:sinav_egitmen,
    sinav_ogrenci=:sinav_ogrenci,
    vize_notu=:vize_notu,
    final_notu=:final_notu,
    sinav_durum=:sinav_durum



    ");

  $insert=$sinavkaydet->execute(array(


    'sinav_adi'=>$_POST['sinavadi'],
    'sinav_egitmen'=>$_POST['egitmen'],
    'sinav_ogrenci'=>$_POST['ogrenci'],
    'vize_notu'=>$_POST['vizenotu'],
    'final_notu'=>$_POST['finalnotu'],
    'sinav_durum'=>$_POST['durum']


  ));
  if ($insert) {

    header("Location:../notlar-ekle?yuklenme=basarili");
  }
  else{
    header("Location:../notlar-ekle?yuklenme=basarisiz");
  }

}
//sınav duzenle

if (isset($_POST['sinavduzenle'])) {
  $sinavid=$_POST['sinavid'];

  $sinavkaydet=$baglanti->prepare("UPDATE sinavlar SET 

    sinav_durum=:sinav_durum

    WHERE id=$sinavid
    ");

  $insert=$sinavkaydet->execute(array(

    'sinav_durum'=>2

  ));
  if ($insert) {

    header("Location:../notlar-ekle?yuklenme=basarili");
  }
  else{
    header("Location:../notlar-ekle?yuklenme=basarisiz");
  }

}
//sınav duzenle

if (isset($_POST['sinavguncelle'])) {

  $sinavid=$_POST['sinavid'];

  $sinavkaydet=$baglanti->prepare("UPDATE sinavlar SET 

   vize_notu=:vize_notu,
   final_notu=:final_notu,
   sinav_durum=:sinav_durum

   WHERE id=$sinavid
   ");

  $insert=$sinavkaydet->execute(array(
    'vize_notu'=>$_POST['vizenotu'],
    'final_notu'=>$_POST['finalnotu'],
    'sinav_durum'=>1

  ));
  if ($insert) {

    header("Location:../notlar-ekle?yuklenme=basarili");
  }
  else{
    header("Location:../notlar-ekle?yuklenme=basarisiz");
  }

}
//mesaj gönder
if (isset($_POST['mesajgonder'])) {
  $mesajkaydet=$baglanti->prepare("INSERT into mesajlar SET 

    mesaj_gonderen=:mesaj_gonderen,
    mesaj_konu=:mesaj_konu,
    mesaj_icerik=:mesaj_icerik
    
    ");

  $insert=$mesajkaydet->execute(array(

    'mesaj_gonderen'=>$_POST['gonderen'],
    'mesaj_konu'=>$_POST['konubasligi'],
    'mesaj_icerik'=>$_POST['mesaj']
    

  ));
  if ($insert) {

    header("Location:../mesaj_gonder?yuklenme=basarili");
  }
  else{
    header("Location:../mesaj_gonder?yuklenme=basarisiz");
  }

}

 //duyuru kayıt

if (isset($_POST['duyurukaydet'])) {
  $duyurukaydet=$baglanti->prepare("INSERT into duyurular SET 

    duyuru_baslik=:duyuru_baslik,
    duyuru_aciklama=:duyuru_aciklama

    ");

  $insert=$duyurukaydet->execute(array(

    'duyuru_baslik'=>$_POST['duyurubaslik'],
    'duyuru_aciklama'=>$_POST['duyuruaciklama']

  ));
  if ($insert) {

    header("Location:../bolum-ekle?yuklenme=basarili");
  }
  else{
    header("Location:../bolum-ekle?yuklenme=basarisiz");
  }

}


//şifre güncelleme
if (isset($_POST['sifreguncelle'])) {
  
  $kullanici_eskipassword=htmlspecialchars($_POST['kullanici_eskipassword']);
  $kullanici_passwordone=htmlspecialchars($_POST['kullanici_passwordone']);
  $kullanici_passwordtwo=htmlspecialchars($_POST['kullanici_passwordtwo']);

  $kullanici_sifre=md5($kullanici_eskipassword);

  $kullanicisor=$baglanti->prepare("SELECT * from kullanicilar where kullanici_sifre=:password");
  $kullanicisor->execute(array(

    'password'=>$kullanici_sifre

  ));

  $say=$kullanicisor->rowCount();

  if ($say==0) {
    header("Location:../sifre-islemleri-duzenleme?yuklenme=eskisifrehata");
    exit;
  }

  if ($kullanici_passwordone==$kullanici_passwordtwo) {

    if (strlen($kullanici_passwordone)>=8) {

      $sifre=md5($kullanici_passwordone);

      $kullaniciguncelle=$baglanti->prepare("UPDATE kullanicilar SET

        kullanici_sifre=:kullanici_sifre
        
        WHERE kullanici_no={$_SESSION['girisbelgesi']} ");

      $update=$kullaniciguncelle->execute(array(

        'kullanici_sifre'=> $sifre


      ));

      if ($update) {
        Header("Location:../sifre-islemleri-duzenleme?yuklenme=ok");
      } else{

        Header("Location:../sifre-islemleri-duzenleme?yuklenme=hata");
      }


    } else{
      header("Location:../sifre-islemleri-duzenleme?yuklenme=eksiksifre");
      exit;

    }


  }else{

    header("Location:../sifre-islemleri-duzenleme?yuklenme=sifreleruyusmuyor");
    exit;
  }


}
if (isset($_POST['takvimkaydet'])) {
  
  $atkaydet=$baglanti->prepare("INSERT into akademik_takvim SET 

    akademik_takvim_url=:akademik_takvim_url,
    ogretim_yili =:ogretim_yili,
    yariyil_baslangic_tarihi=:yariyil_baslangic_tarihi,  
    yariyil_bitis_tarihi=:yariyil_bitis_tarihi,
    donem_adi=:donem_adi

    ");

  $insert=$atkaydet->execute(array(

    'akademik_takvim_url'=>$_POST['akur'],
    'ogretim_yili'=>$_POST['ogryil'],
    'yariyil_baslangic_tarihi'=>$_POST['yarbas'],
    'yariyil_bitis_tarihi'=>$_POST['yarbit'],
    'donem_adi'=>$_POST['donemadi']
  
  ));
if ($insert) {

    header("Location:../akademik-takvim-giris?yuklenme=basarili");
  }
  else{
    header("Location:../akademik-takvim-giris?yuklenme=basarisiz");
  }

}

//ders programı kaydı

if (isset($_POST['dersprogramikaydet'])) {
  $dersprogkaydet=$baglanti->prepare("INSERT into dersprogrami SET 

    baslik=:baslik,
    bolum=:bolum,
    url=:url
  

    ");

  $insert=$dersprogkaydet->execute(array(


    'baslik'=>$_POST['baslik'],
    'bolum'=>$_POST['dersbolum'],
    'url'=>$_POST['url']
  

  ));
  if ($insert) {

    header("Location:../ders-programi-ekle?yuklenme=basarili");
  }
  else{
    header("Location:../ders-programi-ekle?yuklenme=basarisiz");
  }

}

 


?>






<?php 

require_once 'nedmin/baglanti.php';



$kullanicisor=$baglanti->prepare("SELECT * from kullanicilar where kullanici_no=:kullanici_no ");
$kullanicisor->execute(array(
    'kullanici_no'=>$_SESSION['girisbelgesi']
    
));
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);


if ($kullanicicek['kullanici_yetki']==1) {

    Header("Location:404.php");
    exit;
    
}


?>
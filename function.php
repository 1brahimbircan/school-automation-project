<?php

if (basename($_SERVER['PHP_SELF'])==basename(__FILE__)) {

    header("Location:404.php");
    exit("Bu sayfaya erişim yasak");
}




error_reporting(0);









function seolink($s) {
	$tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',' ',',','?');
	$eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','','');
	$s = str_replace($tr,$eng,$s);
	$s = strtolower($s);
	$s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
	$s = preg_replace('/\s+/', '-', $s);
	$s = preg_replace('|-+|', '-', $s);
	$s = preg_replace('/#/', '', $s);
	$s = str_replace('.', '', $s);
	$s = trim($s, '-');
	return $s;
}


function islemkontrol (){

	if (empty($_SESSION['kullanicigiris'])) {
		Header("Location:404.php");
		exit;
	}



}









function kisalt($kelime, $uzunluk="14",$uzunluk2="10",$son="..."){
$say = strlen($kelime); //harfleri saydık
if ($say > $uzunluk) {  //uzunluk değişkenden uzun ise;
	$yeni = substr($kelime,0,$uzunluk2); //büyük oldugunda parçaladık
	$yeni .= $son; //kelimenin sonuna ekledik.
}elseif(($say == $uzunluk) or ($say < $uzunluk)){ //küçük yada eşit ise; 
  $yeni = $kelime; //değişiklik yapma
}
return $yeni;

}

function mesajkisalt($kelime, $uzunluk="40",$son="..."){
$say = strlen($kelime); //harfleri saydık
if ($say > $uzunluk) {  //uzunluk değişkenden uzun ise;
	$yeni = substr($kelime,0,$uzunluk); //büyük oldugunda parçaladık
	$yeni .= $son; //kelimenin sonuna ekledik.
}elseif(($say == $uzunluk) or ($say < $uzunluk)){ //küçük yada eşit ise; 
  $yeni = $kelime; //değişiklik yapma
}
return $yeni;

}



?>

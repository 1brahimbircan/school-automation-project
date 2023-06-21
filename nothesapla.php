<?php

$cal1 = 65;
$bmg1 = 70;
$algoritma1 = 80;
$fizik1 = 50;
$linceb1 = 60;
$turkce1 = 90;
$inkilap1 = 80;

$vize = $cal1 * 0.3+ $bmg1 * 0.2 + $algoritma1 * 0.15 + $fizik1 * 0.15 + $linceb1 * 0.1 + $turkce1 * 0.05 + $inkilap1 * 0.05;

$cal2 = 65;
$bmg2 = 55;
$algoritma2 = 70;
$fizik2 = 5;
$linceb2 = 60;
$turkce2 = 65;
$inkilap2 = 70;
 
$final = $cal2 * 0.3+ $bmg2 * 0.2 + $algoritma2 * 0.15 + $fizik2 * 0.15 + $linceb2 * 0.1 + $turkce2 * 0.05 + $inkilap2 * 0.05;

$ort = $vize * 0.4 + $final * 0.6;
$calort = $cal1 * 0.4 + $cal2 * 0.6;
$bmgort = $bmg1 * 0.4 + $bmg2 * 0.6;
$algoritmaort = $algoritma1 * 0.4 + $algoritma2 * 0.6;
$fizikort = $fizik1 * 0.4 + $fizik2 * 0.6;
$lincebort = $linceb1 * 0.4 + $linceb2 * 0.6;
$turkceort = $turkce1 * 0.4 + $turkce2 * 0.6;
$inkilaport = $inkilap1 * 0.4 + $inkilap2 * 0.6;


echo("Not ortalamanız: " .$ort);
echo "<br>";
echo("Kalkulus dersi not ortalamanız: " .$calort );
echo "<br>";
echo("Bilgisayar Muhendisligine Giris dersi not ortalamanız: " .$bmgort);
echo "<br>";
echo("Algoritma dersi not ortalamanız: " .$algoritmaort);
echo "<br>";
echo("Fizik dersi not ortalamanız: " .$fizikort);
echo "<br>";
echo("Lineer Cebir dersi not ortalamanız: " .$lincebort);
echo "<br>";
echo("Turkce dersi not ortalamanız: " .$turkceort);
echo "<br>";
echo("Inkilap Tarihi dersi not ortalamanız: " .$inkilaport);




?>

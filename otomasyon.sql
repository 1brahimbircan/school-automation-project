-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 22 Mar 2023, 12:09:46
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `otomasyon`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `akademik_takvim`
--

CREATE TABLE `akademik_takvim` (
  `id` int(11) NOT NULL,
  `akademik_takvim_url` text NOT NULL,
  `ogretim_yili` text NOT NULL,
  `yariyil_baslangic_tarihi` text NOT NULL,
  `yariyil_bitis_tarihi` text NOT NULL,
  `donem_adi` text NOT NULL,
  `eklenme_tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `akademik_takvim`
--

INSERT INTO `akademik_takvim` (`id`, `akademik_takvim_url`, `ogretim_yili`, `yariyil_baslangic_tarihi`, `yariyil_bitis_tarihi`, `donem_adi`, `eklenme_tarih`) VALUES
(2, 'https://www.youtube.com/', '2022-2023', '29 haziran 1987', '18 eylul 2023', 'Guz', '2022-12-21 09:49:52'),
(3, 'https://static.ohu.edu.tr/uniweb/media/portallar/oidb//sayfalar/2974/cupaq0nt.pdf', '2022-2023', '26 Eylül 2022', '30 Aralık 2022', 'Bahar', '2022-12-21 09:56:05');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bolumler`
--

CREATE TABLE `bolumler` (
  `id` int(11) NOT NULL,
  `bolum_adi` text NOT NULL,
  `bolum_kodu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `bolumler`
--

INSERT INTO `bolumler` (`id`, `bolum_adi`, `bolum_kodu`) VALUES
(1, 'Bilgisayar Mühendisliği', 'BLM'),
(2, 'Makine Mühendisliği', 'MKM'),
(3, 'Elektrik-Elektronik Mühendisliği', 'EEM');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dersler`
--

CREATE TABLE `dersler` (
  `id` int(11) NOT NULL,
  `ders_adi` text NOT NULL,
  `ders_kodu` text NOT NULL,
  `ders_akts` int(11) NOT NULL,
  `ders_egitmen` text NOT NULL,
  `egitmen_kodu` int(11) NOT NULL,
  `ders_bolum` text NOT NULL,
  `ders_sinif` int(11) NOT NULL,
  `zaman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `dersler`
--

INSERT INTO `dersler` (`id`, `ders_adi`, `ders_kodu`, `ders_akts`, `ders_egitmen`, `egitmen_kodu`, `ders_bolum`, `ders_sinif`, `zaman`) VALUES
(20, 'DİFERANSİYEL DENKLEMLER', 'BLM2011', 4, '', 9, 'BLM', 2, '2022-12-29 07:57:03'),
(21, 'NESNEYE YÖNELİK PROGRAMLAMA', 'BLM2003', 6, '', 4, 'BLM', 2, '2022-12-29 07:58:00'),
(22, 'ELEKTRİK DEVRE TEMELLERİ', 'BLM2005', 5, '', 10, 'BLM', 2, '2022-12-29 08:05:00'),
(23, 'İSTATİSTİK VE OLASILIK', 'BLM2007', 5, '', 11, 'BLM', 2, '2022-12-29 08:05:55'),
(24, 'İŞLETİM SİSTEMLERİ', 'BLM2009', 4, '', 7, 'BLM', 2, '2022-12-29 08:06:44'),
(25, 'VERİ YAPILARI VE ALGORİTMA', 'BLM2001', 4, '', 4, 'BLM', 2, '2022-12-29 10:43:04');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dersprogrami`
--

CREATE TABLE `dersprogrami` (
  `id` int(11) NOT NULL,
  `baslik` text NOT NULL,
  `bolum` text NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `dersprogrami`
--

INSERT INTO `dersprogrami` (`id`, `baslik`, `bolum`, `url`) VALUES
(1, '2022-2023 Güz Yarıyılı Ders Programları Yayımlandı. (Güncellendi-03.10.2022)', 'BLM', 'https://static.ohu.edu.tr/uniweb/media/portallar/muhendislikfakultesi//sayfalar/4546/jmhgtdom.pdf');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyurular`
--

CREATE TABLE `duyurular` (
  `id` int(11) NOT NULL,
  `duyuru_baslik` text NOT NULL,
  `duyuru_aciklama` text NOT NULL,
  `duyuru_tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `duyurular`
--

INSERT INTO `duyurular` (`id`, `duyuru_baslik`, `duyuru_aciklama`, `duyuru_tarih`) VALUES
(2, 'kaydedilmiş duyuru', 'bu kısım duyurunun kaydedilmiş kısmıdır', '2022-12-16 11:10:22'),
(3, 'kaydedilmiş duyuru2', 'bu kısım duyurunun kaydedilmiş kısmıdır2', '2022-12-16 11:12:02'),
(4, 'kaydedilmiş duyuru3', 'bu kısım duyurunun kaydedilmiş kısmıdır3', '2022-12-16 11:12:33');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_ad` varchar(200) NOT NULL,
  `kullanici_soyad` varchar(200) NOT NULL,
  `kullanici_no` int(20) NOT NULL,
  `kullanici_sifre` varchar(300) NOT NULL,
  `kullanici_bolum` text NOT NULL,
  `kullanici_sinif` int(11) NOT NULL,
  `kullanici_yetki` int(11) NOT NULL DEFAULT 0,
  `kullanici_sonzaman` datetime NOT NULL,
  `kullanici_tc` text NOT NULL,
  `kullanici_dogumt` text NOT NULL,
  `kullanici_dogumy` text NOT NULL,
  `kullanici_adres` text NOT NULL,
  `kullanici_il` text NOT NULL,
  `kullanici_ilce` text NOT NULL,
  `kullanici_evtel` text NOT NULL,
  `kullanici_postkod` text NOT NULL,
  `kullanici_ceptel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`kullanici_id`, `kullanici_ad`, `kullanici_soyad`, `kullanici_no`, `kullanici_sifre`, `kullanici_bolum`, `kullanici_sinif`, `kullanici_yetki`, `kullanici_sonzaman`, `kullanici_tc`, `kullanici_dogumt`, `kullanici_dogumy`, `kullanici_adres`, `kullanici_il`, `kullanici_ilce`, `kullanici_evtel`, `kullanici_postkod`, `kullanici_ceptel`) VALUES
(2, 'Mehmet Enes', 'Aydın', 210610027, '92babf9469a5cf3d46b689930c715d76', 'BLM', 2, 0, '0000-00-00 00:00:00', 'qqqq', '21012002', 'konak', 'aaaaaaaaaaaaa', 'niğde', 'merkez', '55555555', 'qqqq', '5465'),
(4, 'Ahmet Şakir', 'DOKUZ', 202020201, '25d55ad283aa400af464c76d713c07ad', 'BLM', 0, 1, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', ''),
(5, 'Otomasyon', 'Admin', 202020200, '0192023a7bbd73250516f069df18b500', '0', 0, 2, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', ''),
(6, 'İbrahim', 'Bircan', 210610014, '25d55ad283aa400af464c76d713c07ad', 'BLM', 2, 0, '0000-00-00 00:00:00', '234356761564', '12.01.2002', 'Bergama', 'izmir, dikili', 'İzmir', 'Dikili', '', '35000', ''),
(7, 'Yeşim', 'DOKUZ', 202020202, '25d55ad283aa400af464c76d713c07ad', 'BLM', 0, 1, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', ''),
(8, 'Yaşar', 'Issı', 210610023, '25d55ad283aa400af464c76d713c07ad', 'BLM', 2, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', ''),
(9, 'Mustafa', 'BAYRAK', 202020203, '25d55ad283aa400af464c76d713c07ad', 'BLM', 0, 1, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', ''),
(10, 'Hakan', 'AKTAŞ', 202020204, '25d55ad283aa400af464c76d713c07ad', 'BLM', 0, 1, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', ''),
(11, 'Yusuf Kağan', 'DEMİR', 202020205, '25d55ad283aa400af464c76d713c07ad', 'BLM', 0, 1, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', ''),
(12, 'Çağatay Nazım', 'AKÇAY', 202020210, '25d55ad283aa400af464c76d713c07ad', 'BLM', 2, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', ''),
(13, 'Mert', 'Demir', 202020211, '25d55ad283aa400af464c76d713c07ad', 'BLM', 2, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', ''),
(14, 'Oğuzhan', 'Yıldırır', 202020212, '25d55ad283aa400af464c76d713c07ad', 'BLM', 2, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', ''),
(15, 'Furkan Yüksel', 'TEMELCİ', 202020213, '25d55ad283aa400af464c76d713c07ad', 'BLM', 2, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', ''),
(16, 'Sebahattin Efe', 'GÖKBAŞ', 202020222, '25d55ad283aa400af464c76d713c07ad', 'BLM', 2, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', ''),
(17, 'ÜmmüGülsüm', 'Sima', 202020214, '25d55ad283aa400af464c76d713c07ad', 'BLM', 2, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', ''),
(18, 'Alper', 'Doğan', 202020216, '25d55ad283aa400af464c76d713c07ad', 'BLM', 2, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', ''),
(19, 'Esma', 'Özkul', 202020217, '25d55ad283aa400af464c76d713c07ad', 'BLM', 2, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', ''),
(20, 'Dilan', 'Kılıç', 202020218, '25d55ad283aa400af464c76d713c07ad', 'BLM', 2, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', ''),
(21, 'Emir', 'Çelik', 202020219, '25d55ad283aa400af464c76d713c07ad', 'BLM', 2, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', ''),
(22, 'Beyza', 'Özkan', 202020220, '25d55ad283aa400af464c76d713c07ad', 'BLM', 2, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', ''),
(23, 'Gülseher', 'Yıldırım', 202020221, '25d55ad283aa400af464c76d713c07ad', 'BLM', 2, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', ''),
(30, 'Ayşe Sevde', 'GARİP', 202020215, '25d55ad283aa400af464c76d713c07ad', 'BLM', 2, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', ''),
(42, 'Adem', 'Yıldız', 202020223, '25d55ad283aa400af464c76d713c07ad', 'BLM', 2, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', ''),
(43, 'İrem', 'Acıkan', 202020224, '25d55ad283aa400af464c76d713c07ad', 'BLM', 2, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', ''),
(44, 'Özge', 'Siyavuş', 202020225, '25d55ad283aa400af464c76d713c07ad', 'BLM', 2, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', ''),
(45, 'Furkan', 'Boyun', 202020226, '25d55ad283aa400af464c76d713c07ad', 'BLM', 2, 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesajlar`
--

CREATE TABLE `mesajlar` (
  `mesaj_id` int(11) NOT NULL,
  `mesaj_gonderen` text NOT NULL,
  `mesaj_konu` text NOT NULL,
  `mesaj_icerik` text NOT NULL,
  `mesaj_tarih` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `mesajlar`
--

INSERT INTO `mesajlar` (`mesaj_id`, `mesaj_gonderen`, `mesaj_konu`, `mesaj_icerik`, `mesaj_tarih`) VALUES
(5, 'Ahmet Şakir  DOKUZ ', 'sınav', 'pazartesi java sınavı var', '0000-00-00 00:00:00'),
(6, 'Yeşim  Dokuz ', 'Proje Ödevleri', 'Arkadaşlar Proje ödevlerini haftaya Perşembe istiyorum.', '0000-00-00 00:00:00'),
(13, 'Ahmet Şakir  DOKUZ ', 'deneme', 'denme meseajı', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sinavlar`
--

CREATE TABLE `sinavlar` (
  `id` int(11) NOT NULL,
  `sinav_adi` text NOT NULL,
  `sinav_egitmen` varchar(300) NOT NULL,
  `sinav_ogrenci` text NOT NULL,
  `sinav_durum` int(11) NOT NULL,
  `vize_notu` varchar(3) NOT NULL,
  `final_notu` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `sinavlar`
--

INSERT INTO `sinavlar` (`id`, `sinav_adi`, `sinav_egitmen`, `sinav_ogrenci`, `sinav_durum`, `vize_notu`, `final_notu`) VALUES
(25, 'NESNEYE YÖNELİK PROGRAMLAMA', '4', '210610027', 1, '50', '46'),
(26, 'NESNEYE YÖNELİK PROGRAMLAMA', '4', '210610014', 2, '', '');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `akademik_takvim`
--
ALTER TABLE `akademik_takvim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `bolumler`
--
ALTER TABLE `bolumler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `dersler`
--
ALTER TABLE `dersler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `dersprogrami`
--
ALTER TABLE `dersprogrami`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `duyurular`
--
ALTER TABLE `duyurular`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `mesajlar`
--
ALTER TABLE `mesajlar`
  ADD PRIMARY KEY (`mesaj_id`);

--
-- Tablo için indeksler `sinavlar`
--
ALTER TABLE `sinavlar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `akademik_takvim`
--
ALTER TABLE `akademik_takvim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `bolumler`
--
ALTER TABLE `bolumler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `dersler`
--
ALTER TABLE `dersler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Tablo için AUTO_INCREMENT değeri `dersprogrami`
--
ALTER TABLE `dersprogrami`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `duyurular`
--
ALTER TABLE `duyurular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Tablo için AUTO_INCREMENT değeri `mesajlar`
--
ALTER TABLE `mesajlar`
  MODIFY `mesaj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `sinavlar`
--
ALTER TABLE `sinavlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

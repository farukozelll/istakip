-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 19 Nis 2020, 15:12:46
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `growdome`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `site_baslik` varchar(300) NOT NULL,
  `site_aciklama` varchar(500) NOT NULL,
  `site_sahibi` varchar(200) NOT NULL,
  `mail_onayi` int(11) NOT NULL,
  `duyuru_onayi` int(11) NOT NULL,
  `site_logo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `site_baslik`, `site_aciklama`, `site_sahibi`, `mail_onayi`, `duyuru_onayi`, `site_logo`) VALUES
(1, 'Growdome', 'OZel', 'FarukOzel', 0, 0, 'img/227137245522664Sensors.png'),
(1, 'Growdome', 'OZel', 'FarukOzel', 0, 0, 'img/227137245522664Sensors.png'),
(0, '', '', '', 0, 0, ''),
(0, 'Growdome', 'Silifkeye Hoşgeldin', 'Faruk Özel', 0, 0, ''),
(1, 'Growdome', 'OZel', 'FarukOzel', 0, 0, 'img/227137245522664Sensors.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kul_id` int(11) NOT NULL,
  `kul_isim` varchar(300) NOT NULL,
  `kul_mail` varchar(500) NOT NULL,
  `kul_sifre` varchar(200) NOT NULL,
  `kul_telefon` varchar(50) NOT NULL,
  `kul_unvan` varchar(250) NOT NULL,
  `kul_yetki` int(11) NOT NULL,
  `kul_logo` varchar(250) NOT NULL,
  `ip_adresi` varchar(300) NOT NULL,
  `session_mail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kul_id`, `kul_isim`, `kul_mail`, `kul_sifre`, `kul_telefon`, `kul_unvan`, `kul_yetki`, `kul_logo`, `ip_adresi`, `session_mail`) VALUES
(1, 'Faruk', 'faruk@outlook.com', '1234', '5007', 'Doktor', 1, 'ast', '::1', 'faruk@outlook.com'),
(2, 'Farukas', 'farukas@outlook.com', '1234as', '5007', 'Doktora', 1, 'asta', '::1', 'farukas@outlook.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `proje`
--

CREATE TABLE `proje` (
  `proje_id` int(11) NOT NULL,
  `proje_baslik` varchar(250) NOT NULL,
  `proje_teslim_tarihi` date NOT NULL,
  `proje_aciliyet` varchar(50) NOT NULL,
  `proje_durum` varchar(50) NOT NULL,
  `proje_detay` text NOT NULL,
  `proje_baslama_tarihi` datetime NOT NULL DEFAULT current_timestamp(),
  `dosya_yolu` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `proje`
--

INSERT INTO `proje` (`proje_id`, `proje_baslik`, `proje_teslim_tarihi`, `proje_aciliyet`, `proje_durum`, `proje_detay`, `proje_baslama_tarihi`, `dosya_yolu`) VALUES
(6, 'ssdasdasd', '0545-05-04', 'Normal', 'Yeni Başladı', '', '2020-04-18 19:45:05', ''),
(12, 'fhjbnk', '0066-05-05', 'Acil', 'Devam Ediyor', '<p>öxö</p>\r\n', '2020-04-19 12:37:35', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
--

CREATE TABLE `siparis` (
  `sip_id` int(11) NOT NULL,
  `musteri_isim` varchar(200) NOT NULL,
  `musteri_mail` varchar(300) NOT NULL,
  `musteri_telefon` bigint(20) NOT NULL,
  `sip_baslik` varchar(400) NOT NULL,
  `sip_teslim_tarihi` date NOT NULL,
  `sip_aciliyet` varchar(50) NOT NULL,
  `sip_durum` varchar(50) NOT NULL,
  `sip_ucret` bigint(25) NOT NULL,
  `sip_detay` text NOT NULL,
  `sip_baslama_tarih` datetime NOT NULL DEFAULT current_timestamp(),
  `dosya_yolu` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `siparis`
--

INSERT INTO `siparis` (`sip_id`, `musteri_isim`, `musteri_mail`, `musteri_telefon`, `sip_baslik`, `sip_teslim_tarihi`, `sip_aciliyet`, `sip_durum`, `sip_ucret`, `sip_detay`, `sip_baslama_tarih`, `dosya_yolu`) VALUES
(5, 'd21212aaaaaaaaaaaas', 'asqas@as', 54125421887, 'as', '0078-07-07', 'Acil', 'Bitti', 878, '', '2020-04-18 19:45:48', '');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kul_id`),
  ADD UNIQUE KEY `kul_mail` (`kul_mail`);

--
-- Tablo için indeksler `proje`
--
ALTER TABLE `proje`
  ADD PRIMARY KEY (`proje_id`);

--
-- Tablo için indeksler `siparis`
--
ALTER TABLE `siparis`
  ADD PRIMARY KEY (`sip_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kul_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `proje`
--
ALTER TABLE `proje`
  MODIFY `proje_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `siparis`
--
ALTER TABLE `siparis`
  MODIFY `sip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

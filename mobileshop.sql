-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2021 at 08:23 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobileshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(25) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'tracy', 'e99a18c428cb38d5f260853678922e03', 'tracy@gmail.com'),
(2, 'jasontan', '72d396e6a898ee3f57ab166e867b7e9d', 'jasontan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `imageUrl` varchar(80) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `imageUrl`) VALUES
(1, 'Apple', 'BrandsPictures/Apple.jpg'),
(2, 'Xiaomi', 'BrandsPictures/Xiaomi.jpg'),
(3, 'Samsung', 'BrandsPictures/Samsung.jpg'),
(4, 'OnePlus', 'BrandsPictures/OnePlus.jpg'),
(5, 'Huawei', 'BrandsPictures/Huawei.jpg'),
(6, 'Vivo', 'BrandsPictures/Vivo.jpg'),
(7, 'Oppo', 'BrandsPictures/Oppo.jpg'),
(8, 'ROG', 'BrandsPictures/ROG.jpg'),
(9, 'Black Shark', 'BrandsPictures/BlackShark.jpg'),
(10, 'Nubia', 'BrandsPictures/Nubia.jpg'),
(11, 'POCO', 'BrandsPictures/Poco.jpg'),
(12, 'Lenovo', 'BrandsPictures/Lenovo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `Id` int(11) NOT NULL,
  `FromUser` int(100) NOT NULL,
  `ToUser` int(100) NOT NULL,
  `Message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`Id`, `FromUser`, `ToUser`, `Message`) VALUES
(1, 2, 2, 'hello'),
(2, 2, 3, 'hello\n'),
(3, 3, 2, 'hello\n'),
(4, 2, 4, 'hello\n:333\n'),
(5, 4, 2, 'hello\n:333'),
(6, 2, 6, 'hello'),
(7, 6, 2, 'hello\n'),
(8, 2, 4, 'hi'),
(9, 4, 2, 'hi'),
(10, 1, 2, 'efge'),
(11, 0, 1, 'hi\n'),
(12, 2, 1, 'hi\n'),
(13, 2, 1, 'hello'),
(14, 1, 2, 'hi\n'),
(15, 2, 1, 'morning\n'),
(16, 7, 1, 'hi'),
(17, 1, 7, 'hello\n'),
(18, 1, 7, 'hi'),
(19, 1, 7, 'nice to meet u'),
(20, 7, 1, 'hi\n'),
(21, 1, 2, 'hi'),
(22, 1, 2, ''),
(23, 1, 2, 'hi\n'),
(24, 1, 2, 'hi\n'),
(25, 1, 7, 'hi'),
(26, 1, 7, 'hi'),
(27, 7, 1, 'Today is a sunny day'),
(28, 1, 7, 'Hi'),
(29, 6, 1, 'feugfuwegfiweguig'),
(30, 1, 6, 'hi\n'),
(31, 1, 6, 'https://meet.jit.si/JitsiMeetAPI'),
(32, 2, 1, 'hi\n'),
(33, 1, 2, 'https://meet.jit.si/JitsiMeetAPI\n'),
(34, 19, 1, 'hello\n'),
(35, 19, 1, 'hello\n\n'),
(36, 19, 1, 'gud morning\n'),
(37, 1, 19, 'hi\nmay i help u'),
(38, 1, 19, 'https://meet.jit.si/JitsiMeetAPI'),
(39, 24, 1, 'hello\n');

-- --------------------------------------------------------

--
-- Table structure for table `mobile`
--

CREATE TABLE `mobile` (
  `id` int(11) NOT NULL,
  `model` varchar(100) CHARACTER SET utf8 NOT NULL,
  `brandID` int(11) NOT NULL,
  `price` double NOT NULL,
  `releaseDate` varchar(100) CHARACTER SET utf8 NOT NULL,
  `discountRate` double NOT NULL,
  `mobileUrl` varchar(100) CHARACTER SET utf8 NOT NULL,
  `mainCameraSpecs` varchar(500) CHARACTER SET utf8 NOT NULL,
  `memorySpecs` varchar(100) CHARACTER SET utf8 NOT NULL,
  `networkSpecs` varchar(100) CHARACTER SET utf8 NOT NULL,
  `platformID` int(11) NOT NULL,
  `cpu` varchar(250) CHARACTER SET utf8 NOT NULL,
  `features` varchar(300) CHARACTER SET utf8 NOT NULL,
  `storageID` int(11) DEFAULT NULL,
  `mainCameraFeatures` varchar(250) DEFAULT NULL,
  `frontCameraSpecs` varchar(250) DEFAULT NULL,
  `frontCameraFeatures` varchar(250) DEFAULT NULL,
  `displaySpecs` varchar(250) DEFAULT NULL,
  `batterySpecs` varchar(250) DEFAULT NULL,
  `performanceScore` int(11) DEFAULT NULL,
  `mainCameraScore` int(11) DEFAULT NULL,
  `frontCameraScore` int(11) DEFAULT NULL,
  `displayScore` int(11) DEFAULT NULL,
  `batteryLifeScore` int(11) DEFAULT NULL,
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobile`
--

INSERT INTO `mobile` (`id`, `model`, `brandID`, `price`, `releaseDate`, `discountRate`, `mobileUrl`, `mainCameraSpecs`, `memorySpecs`, `networkSpecs`, `platformID`, `cpu`, `features`, `storageID`, `mainCameraFeatures`, `frontCameraSpecs`, `frontCameraFeatures`, `displaySpecs`, `batterySpecs`, `performanceScore`, `mainCameraScore`, `frontCameraScore`, `displayScore`, `batteryLifeScore`, `status`) VALUES
(1, 'Iphone 12 Pro Max', 1, 5799, '2020-11-13', 0, 'MobilesPictures/12promax.jpg', '12 MP, f/1.6, 26mm (wide), 1.7µm, dual pixel PDAF, sensor-shift stabilization (IBIS)\r\n | 12 MP, f/2.2, 65mm (telephoto), 1/3.4\", 1.0µm, PDAF, OIS, 2.5x optical zoom\r\n | 12 MP, f/2.4, 120˚, 13mm (ultrawide), 1/3.6\"\r\n', '6GB RAM | Storage 256GB', '5G', 1, 'Apple A14 Bionic (5 nm)\r\n| Hexa-core (2x3.1 GHz Firestorm + 4x1.8 GHz Icestorm)', 'Dimensions: 160.8 x 78.1 x 7.4 mm \r\nWeight: 228g\r\nBuild: Glass front (Gorilla Glass), glass back (Gorilla Glass), stainless steel frame, IP68 dust/water resistant (up to 6m for 30 mins)\r\nAudio: stereo speakers', 2, 'Dual-LED dual-tone flash, HDR (photo/panorama)\r\nVideo Quality: 4K@24/30/60fps, 1080p@30/60/120/240fps, 10?bit HDR, Dolby Vision HDR (up to 60fps), stereo sound rec.', '12 MP, f/2.2, 23mm (wide), 1/3.6\", SL 3D, (depth/biometrics sensor)', 'HDR\r\nVideo Quality: 4K@24/30/60fps, 1080p@30/60/120fps, gyro-EIS', 'Super Retina XDR OLED, HDR10, Dolby Vision, 800 nits (typ), 1200 nits (peak)\r\n| 6.7 inches, 109.8 cm2 (~87.4% screen-to-body ratio)\r\n| Resolution 1284 x 2778 pixels, 19.5:9 ratio (~458 ppi density)', 'Type: Li-Ion 3687 mAh, non-removable (14.13 Wh)\r\nCharging: Fast charging 20W, 50% in 30 min, USB Power Delivery 2.0, Qi magnetic fast wireless charging 15W', 638584, 130, 98, 88, 78, '1'),
(2, '\r\nMi 11 Ultra', 2, 4299, '2021-04-02', 0, 'MobilesPictures/mi11ultra.jpg', '50 MP, f/2.0, 24mm (wide), 1/1.12\", 1.4µm, Dual Pixel PDAF, Laser AF, OIS\r\n| 48 MP, f/4.1, 120mm (periscope telephoto), 1/2.0\", 0.8µm, PDAF, OIS, 5x optical zoom\r\n| 48 MP, f/2.2, 12mm, 128˚ (ultrawide), 1/2.0\", 0.8µm, PDAF', '12GB RAM | Storage 256GB', '5G', 1, 'Qualcomm SM8350 Snapdragon 888 5G (5 nm)\r\n| Octa-core (1x2.84 GHz Kryo 680 & 3x2.42 GHz Kryo 680 & 4x1.80 GHz Kryo 680)', 'Dimensions: 164.3 x 74.6 x 8.4 mm\r\nWeight: 234g\r\nBuild: Glass front (Gorilla Glass Victus), ceramic back, aluminum frame, IP68 dust/water resistant (up to 1.5m for 30 mins)\r\nAudio: stereo speakers Tuned by Harman Kardon', 2, 'Dual-LED flash, HDR, panorama, 1.1” AMOLED selfie display\r\nVideo Quality: 8K@24fps, 4K@30/60fps, 1080p@30/60/120/240/960/1920fps, gyro-EIS, HDR10+ rec.', '20 MP, f/2.2, 27mm (wide), 1/3.4\", 0.8µm', 'HDR, panorama\r\nVideo Quality: 1080p@30/60fps, 720p@120fps, gyro-EIS', 'AMOLED, 1B colors, 120Hz, HDR10+, Dolby Vision, 900 nits (HBM), 1700 nits (peak)\r\n| 6.81 inches, 112.0 cm2 (~91.4% screen-to-body ratio)\r\n| Resolution 1440 x 3200 pixels, 20:9 ratio (~515 ppi density)', 'Type: Li-Po 5000 mAh, non-removable\r\nCharging: Fast charging 67W, 100% in 36 min, Fast wireless charging 67W, 100% in 39 min, Reverse wireless charging 10W, Quick Charge 4+, Power Delivery 3.0', 688720, 143, 94, 87, 70, '1'),
(3, 'Galaxy S21 Ultra', 3, 5399, '2021-01-14', 0, 'MobilesPictures/galaxys21ultra.jpg', '108 MP, f/1.8, 24mm (wide), 1/1.33\", 0.8µm, PDAF, Laser AF, OIS\r\n| 10 MP, f/4.9, 240mm (periscope telephoto), 1/3.24\", 1.22µm, dual pixel PDAF, OIS, 10x optical zoom\r\n| 10 MP, f/2.4, 72mm (telephoto), 1/3.24\", 1.22µm, dual pixel PDAF, OIS, 3x optical zoom\r\n| 12 MP, f/2.2, 13mm (ultrawide), 1/2.55\", 1.4µm, dual pixel PDAF, Super Steady video', '12GB RAM | Storage 512GB', '5G', 1, 'Exynos 2100 (5 nm)\r\n| Octa-core (1x2.9 GHz Cortex-X1 & 3x2.80 GHz Cortex-A78 & 4x2.2 GHz Cortex-A55)', 'Dimensions: 165.1 x 75.6 x 8.9 mm \r\nWeight: 227g\r\nBuild: Glass front (Gorilla Glass Victus), glass back (Gorilla Glass Victus), aluminum frame, IP68 dust/water resistant (up to 1.5m for 30 mins), Stylus support\r\nAudio: stereo speakers Tuned by AKG', 1, 'LED flash, auto-HDR, panorama\r\nVideo Quality: 8K@24fps, 4K@30/60fps, 1080p@30/60/240fps, 720p@960fps, HDR10+, stereo sound rec., gyro-EIS', '40 MP, f/2.2, 26mm (wide), 1/2.8\", 0.7µm, PDAF', 'Dual video call, Auto-HDR\r\nVideo Quality: 4K@30/60fps, 1080p@30fps', 'Dynamic AMOLED 2X, 120Hz, HDR10+, 1500 nits (peak)\r\n| 6.8 inches, 112.1 cm2 (~89.8% screen-to-body ratio)\r\n| Resolution 1440 x 3200 pixels, 20:9 ratio (~515 ppi density)', 'Type: Li-Ion 5000 mAh, non-removable\r\nCharging: Fast charging 25W, USB Power Delivery 3.0, Fast Qi/PMA wireless charging 15W, Reverse wireless charging 4.5W', 657150, 121, 100, 91, 64, '1'),
(4, 'P50 Pro', 5, 5199, '2021-07-29', 0, 'MobilesPictures/p50pro.jpg', '50 MP, f/1.8, 23mm (wide), PDAF, Laser AF, OIS\r\n| 64 MP, f/3.5, 90mm (periscope telephoto), PDAF, OIS, 3.5x optical zoom\r\n| 13 MP, f/2.2, 13mm (ultrawide)\r\n| 40 MP, f/1.6, 23mm (B/W)', '8GB RAM | Storage 512GB', '5G', 1, 'Kirin 9000 (5 nm)\r\n| Octa-core (1x3.13 GHz Cortex-A77 & 3x2.54 GHz Cortex-A77 & 4x2.05 GHz Cortex-A55)', 'Dimensions: 158.8 x 72.8 x 8.5 mm \r\nWeight: 195g\r\nBuild: IP68 dust/water resistant (up to 1.5m for 30 min)\r\nAudio: stereo speakers', 1, 'Leica optics, dual-LED flash, panorama, HDR\r\nVideo Quality: 4K@30/60fps, 1080p@30/60fps, 1080p@960fps; gyro-EIS', '13 MP, f/2.4, (wide)', 'Panorama, HDR\r\nVideo Quality: 4K@30fps, 1080p@30/60/240fps', 'OLED, 1B colors, 120Hz\r\n| 6.6 inches, 105.4 cm2 (~91.2% screen-to-body ratio)\r\n| Resolution 1228 x 2700 pixels (~450 ppi density)', 'Type: Li-Po 4360 mAh, non-removable\r\nCharging: Fast charging 66W, Fast wireless charging 50W', 739447, 144, 106, 93, 58, '1'),
(5, 'Find X3 Pro', 7, 4299, '2021-03-11', 0, 'MobilesPictures/findx3pro.jpg', '50 MP, f/1.8, 26mm (wide), 1/1.56\", 1.0µm, omnidirectional PDAF, OIS\r\n| 13 MP, f/2.4, 52mm (telephoto), 2x optical zoom, PDAF\r\n| 50 MP, f/2.2, 16mm, 110˚ (ultrawide), 1/1.56\", 1.0µm, omnidirectional PDAF\r\n| 3 MP, f/3.0, (microscope), AF, ring flash, 60x magnification', '12GB RAM | Storage 256GB', '5G', 1, 'Qualcomm SM8350 Snapdragon 888 5G (5 nm)\r\n| Octa-core (1x2.84 GHz Kryo 680 & 3x2.42 GHz Kryo 680 & 4x1.80 GHz Kryo 680)', 'Dimensions: 163.6 x 74 x 8.3 mm \r\nWeight: 193g \r\nBuild: Glass front (Gorilla Glass 5), glass back (Gorilla Glass 5), aluminum frame, IP68 dust/water resistant (up to 1.5m for 30 mins)\r\nAudio: stereo speakers', 2, 'LED flash, HDR, panorama\r\nVideo Quality: 4K@30/60fps, 1080p@30/60/240fps; gyro-EIS; HDR, 10?bit video', '32 MP, f/2.4, 26mm (wide), 1/2.8\", 0.8µm', 'Panorama\r\nVideo Quality: 1080p@30fps', 'LTPO AMOLED, 1B colors, 120Hz, HDR10+, BT.2020, 500 nits (typ), 1300 nits (peak)\r\n| 6.7 inches, 108.4 cm2 (~89.6% screen-to-body ratio)\r\n| Resolution 1440 x 3216 pixels, 20:9 ratio (~525 ppi density)', 'Type:	Li-Po 4500 mAh, non-removable\r\nCharging: Fast charging 65W, 40% in 10 min, Fast wireless charging 30W, 100% in 80 min, Reverse wireless charging 10W, SuperVOOC 2.0, USB Power Delivery', 656467, 131, 90, 88, 66, '1'),
(6, 'X60 Pro +', 6, 3799, '2021-01-30', 0, 'MobilesPictures/x60pro+.jpg', '50 MP, f/1.6, (wide), 1/1.31\", 1.2µm, dual pixel PDAF, Laser AF, OIS\r\n| 8 MP, f/3.4, 125mm (periscope telephoto), 1/4.0\", PDAF, OIS, 5x optical zoom\r\n| 32 MP, f/2.1, 50mm (telephoto), 1/2.8\", 0.8µm, PDAF, 2x optical zoom\r\n| 48 MP, 114˚ (ultrawide), 1/2.0\", 0.8µm, gimbal stabilization, PDAF', '12GB RAM | Storage 256GB', '5G', 1, 'Qualcomm SM8350 Snapdragon 888 5G (5 nm) \r\n| Octa-core (1x2.84 GHz Kryo 680 & 3x2.42 GHz Kryo 680 & 4x1.80 GHz Kryo 680)', 'Dimensions: 158.6 x 73.4 x 9.1 mm\r\nWeight: 191g\r\nBuild: Glass front, eco leather back, aluminum frame\r\nAudio: stereo speakers', 2, 'Zeiss optics, Zeiss T* lens coating, Pixel Shift, dual-LED dual-tone flash, HDR, panorama\r\nVideo Quality: 8K@30fps, 4K@30/60fps, 1080p@30/60fps, gyro-EIS, HDR10+', '32 MP, f/2.5, 26mm (wide), 1/2.8\", 0.8µm', 'HDR\r\nVideo Quality: 4K@30fps, 1080p@30fps', 'Super AMOLED, 120Hz, HDR10+, 1300 nits (peak)\r\n| 6.56 inches, 104.6 cm2 (~89.8% screen-to-body ratio)\r\n| Resolution 1080 x 2376 pixels (~398 ppi density)', 'Type: Li-Po 4200 mAh, non-removable\r\nCharging: Fast charging 55W', 734811, 128, 86, 89, 62, '1'),
(7, '9 Pro', 4, 3699, '2021-03-30', 0, 'MobilesPictures/oneplus9pro.jpg', '48 MP, f/1.8, 23mm (wide), 1/1.43\", 1.12µm, omnidirectional PDAF, Laser AF, OIS\r\n8 MP, f/2.4, 77mm (telephoto), 1.0µm, PDAF, OIS, 3.3x optical zoom\r\n50 MP, f/2.2, 14mm (ultrawide), 1/1.56\", 1.0µm, AF\r\n2 MP, f/2.4, (monochrome)', '12GB RAM | Storage 256GB', '5G', 1, 'Qualcomm SM8350 Snapdragon 888 5G (5 nm) \r\n| Octa-core (1x2.84 GHz Kryo 680 & 3x2.42 GHz Kryo 680 & 4x1.80 GHz Kryo 680)', 'Dimensions: 163.2 x 73.6 x 8.7 mm\r\nWeight: 197g\r\nBuild: Glass front (Gorilla Glass 5), glass back (Gorilla Glass 5), aluminum frame, IP68 dust/water resistant (up to 1.5m for 30 mins)\r\nAudio: stereo speakers', 2, 'Hasselblad Color Calibration, dual-LED flash, HDR, panorama\r\nVideo Quality: 8K@30fps, 4K@30/60/120fps, 1080p@30/60/240fps, Auto HDR, gyro-EIS', '16 MP, f/2.4, (wide), 1/3.06\", 1.0µm', 'Auto-HDR\r\nVideo Quality: 1080p@30fps, gyro-EIS', 'LTPO Fluid2 AMOLED, 1B colors, 120Hz, HDR10+, 1300 nits (peak)\r\n| 6.7 inches, 108.4 cm2 (~90.3% screen-to-body ratio)\r\n| Resolution 1440 x 3216 pixels, 20:9 ratio (~525 ppi density)', 'Type: Li-Po 4500 mAh, non-removable\r\nCharging: Fast charging 65W, 1-100% in 29 min, Fast wireless charging 50W, 1-100% in 43 min, USB Power Delivery', 743665, 124, 93, 89, 69, '1'),
(8, 'Mi 11 Pro', 2, 2999, '2021-04-02', 0, 'MobilesPictures/mi11pro.jpg', '50 MP, f/2.0, 24mm (wide), 1/1.12\", 1.4µm, Dual Pixel PDAF, OIS\r\n8 MP, 120mm (periscope telephoto), PDAF, OIS, 5x optical zoom\r\n13 MP, f/2.4, 16mm, 123˚ (ultrawide)', '8GB RAM | Storage 256GB', '5G', 1, 'Qualcomm SM8350 Snapdragon 888 5G (5 nm) \r\n| Octa-core (1x2.84 GHz Kryo 680 & 3x2.42 GHz Kryo 680 & 4x1.80 GHz Kryo 680)', 'Dimensions: 164.3 x 74.6 x 8.5 mm\r\nWeight: 208g\r\nBuild: IP68 dust/water resistant (up to 1.5m for 30 mins)\r\nAudio: stereo speakers', 2, 'LED flash, HDR, panorama\r\nVideo Quality: 8K@24fps, 4K@30/60fps, 1080p@30/60fps, gyro-EIS, HDR10+ rec.', '20 MP, f/2.2, 27mm (wide), 1/3.4\", 0.8µm', 'HDR, panorama\r\nVideo Quality: 1080p@30/60fps, 720p@120fps, gyro-EIS', 'AMOLED, 1B colors, 120Hz, HDR10+, Dolby Vision, 1500 nits (peak)\r\n| 6.81 inches, 112.0 cm2 (~91.4% screen-to-body ratio)\r\n| Resolution 1440 x 3200 pixels, 20:9 ratio (~515 ppi density)', 'Type: Li-Po 5000 mAh, non-removable\r\nCharging: Fast charging 67W, 100% in 36 min, Fast wireless charging 67W, 100% in 39 min, Reverse wireless charging 10W, Quick Charge 4+, Power Delivery 3.0', 802412, 130, 85, 87, 65, '1'),
(9, 'Phone 5', 8, 3799, '2021-04-26', 0, 'MobilesPictures/phone5.jpg', '64 MP, f/1.8, 26mm (wide), 1/1.73\", 0.8µm, PDAF\r\n| 13 MP, f/2.4, 11mm, 125˚ (ultrawide)\r\n| 5 MP, f/2.0, (macro)', '16GB RAM | Storage 256GB', '5G', 2, 'Qualcomm SM8350 Snapdragon 888 5G (5 nm) \r\n| Octa-core (1x2.84 GHz Kryo 680 & 3x2.42 GHz Kryo 680 & 4x1.80 GHz Kryo 680)', 'Dimensions: 172.8 x 77.3 x 10.3 mm \r\nWeight: 238g\r\nBuild: Glass front (Gorilla Glass Victus), glass back (Gorilla Glass 3), aluminum frame, RGB light panel on the back, Pressure sensitive zones (Gaming triggers)\r\nAudio: with DTS:X stereo speakers (2 dedicated amplifiers)', 2, 'LED flash, HDR, panorama\r\nVideo Quality: 8K@30fps, 4K@30/60/120fps, 1080p@30/60/120/240fps, 720p@480fps; gyro-EIS', '24 MP, f/2.5, 27mm (wide), 0.9µm', 'Panorama, HDR\r\nVideo Quality: 1080p@30fps', 'AMOLED, 1B colors, 144Hz, HDR10+, 800 nits (typ), 1200 nits (peak)\r\n| 6.78 inches, 109.5 cm2 (~82.0% screen-to-body ratio)\r\n| Resolution 1080 x 2448 pixels (~395 ppi density)', 'Type: Li-Po 6000 mAh, non-removable\r\nCharging: Fast charging 65W, 70% in 30 min, 100% in 52 min, Reverse charging 10W, Power Delivery 3.0, Quick Charge 5', 718864, 108, 77, 82, 70, '1'),
(10, '4 Pro', 9, 2999, '2021-03-23', 0, 'MobilesPictures/blackshark4pro.jpg', '64 MP, f/1.8, (wide), 1/1.97\", 0.7µm, PDAF\r\n8 MP, f/2.2, 120˚ (ultrawide), 1/4.0\", 1.12µm\r\n5 MP, f/2.4, (macro), AF', '8GB RAM | Storage 256GB', '5G', 2, 'Qualcomm SM8350 Snapdragon 888 5G (5 nm) \r\n| Octa-core (1x2.84 GHz Kryo 680 & 3x2.42 GHz Kryo 680 & 4x1.80 GHz Kryo 680)', 'Dimensions: 163.8 x 76.4 x 9.9 mm\r\nWeight: 220g \r\nBuild: Physical pop-up gaming triggers\r\nAudio: stereo speakers', 2, 'LED flash, HDR, panorama\r\nVideo Quality: 4K@30/60fps, 1080p@30/60/240fps, 1080p@960fps; HDR10+', '20 MP, f/2.5, (wide), 0.8µm', 'HDR\r\nVideo Quality: 1080p@30fps', 'Super AMOLED, 144Hz, HDR10+, 1300 nits (peak)\r\n| 6.67 inches, 107.4 cm2 (~85.8% screen-to-body ratio)\r\n| Resolution 1080 x 2400 pixels, 20:9 ratio (~395 ppi density)', 'Type: Li-Po 4500 mAh, non-removable\r\nCharging: Fast charging 120W, 50% in 5 min, 100% in 15 min ', 786443, 111, 88, 87, 62, '1'),
(11, 'F3 GT', 11, 1899, '2021- 07-26', 0, 'MobilesPictures/pocof3gt.jpg', '64 MP, f/1.7, 26mm (wide), 1/2.0\", 0.7µm, PDAF\r\n| 8 MP, f/2.2, 120˚ (ultrawide)\r\n| 2 MP, f/2.4, (macro)', '8GB RAM | Storage 256GB', '5G', 2, 'MediaTek MT6893 Dimensity 1200 5G (6 nm) \r\n| Octa-core (1x3.0 GHz Cortex-A78 & 3x2.6 GHz Cortex-A78 & 4x2.0 GHz Cortex-A55) ', 'Dimensions: 161.9 x 76.9 x 8.3 mm \r\nWeight: 205g\r\nBuild: Glass front (Gorilla Glass 5), glass back (Gorilla Glass 5), IP53, dust and splash protection\r\nAudio: stereo speakers', 2, 'Dual-LED flash, HDR, panorama\r\nVideo Quality: 4K@30fps, 1080p@30/60/120fps, 720p@960fps, HDR', '16 MP', 'HDR, panorama\r\nVideo Quality: 1080p@30fps, HDR', 'AMOLED, 1B colors, 120Hz, HDR10+, 500 nits (typ)\r\n| 6.67 inches, 107.4 cm2 (~86.3% screen-to-body ratio)\r\n| Resolution 1080 x 2400 pixels, 20:9 ratio (~395 ppi density)', 'Type: Li-Po 5065 mAh, non-removable\r\nCharging: Fast charging 67W, 100% in 42 min, Power Delivery 3.0, Quick Charge 3+', 672559, 111, 88, 86, 65, '1'),
(12, 'Legion Phone Duel 2', 12, 3199, '2021-05-10', 0, 'MobilesPictures/legionphoneduel2.jpg', '64 MP, f/1.9, 25mm (wide), 1/1.32\", 1.0µm, PDAF\r\n16 MP, f/2.2, 123˚, 16mm (ultrawide), 1.0µm', '12GB RAM | Storage 128GB', '5G', 2, 'Qualcomm SM8350 Snapdragon 888 5G (5 nm)  \r\n| Octa-core (1x2.84 GHz Kryo 680 & 3x2.42 GHz Kryo 680 & 4x1.80 GHz Kryo 680)', 'Dimensions: 176 x 78.5 x 9.9 mm\r\nWeight: 259g\r\nBuild: Glass front (Gorilla Glass 5), glass back, aluminum frame, Built-in two cooling fans\r\nRGB light panel on the back, 6 pressure sensitive zones gaming triggers, 4 ultrasonic buttons (top), 2 capacitive sliding buttons \r\nAudio: stereo speakers', 3, 'Dual-LED flash, panorama, HDR\r\nVideo Quality: 8K@24fps, 4K@30/60fps, 1080p@30/60/240fps, gyro-EIS, HDR10+ rec.', 'Motorized pop-up 44 MP, f/2.0, 24mm (wide), 1/2.65\", 1.0µm, AF', 'HDR\r\nVideo Quality: 4K@30/60fps, 1080p@30/60/120fps', 'AMOLED, 144Hz, HDR10+, 1300 nits (peak)\r\n| 6.92 inches, 113.7 cm2 (~82.3% screen-to-body ratio)\r\n| Resolution 1080 x 2460 pixels (~388 ppi density)', 'Type: Li-Po 5500 mAh, non-removable\r\nCharging: Fast charging 65W (single USB-C port), Fast charging 90W (dual USB-C ports), 50% in 12 min, 100% in 30 min ', 830674, 90, 88, 53, 65, '1'),
(13, 'Red Magic 6', 10, 2999, '2021-03-11', 0, 'MobilesPictures/redmagic6.jpg', '64 MP, f/1.8, 26mm (wide), 1/1.97\", 0.7µm, PDAF\r\n| 8 MP, f/2.0, 120˚, 13mm (ultrawide), 1/4.0\", 1.12µm\r\n| 2 MP, (macro)', '12GB RAM | Storage 128 GB', '5G', 2, 'Qualcomm SM8350 Snapdragon 888 5G (5 nm) \r\n| Octa-core (1x2.84 GHz Kryo 680 & 3x2.42 GHz Kryo 680 & 4x1.80 GHz Kryo 680)', 'Dimensions: 169.9 x 77.2 x 9.7 mm\r\nWeight: 220g\r\nBuild: Glass front, glass back, aluminum frame, Pressure sensitive zones(400Hz touch-sensing), Built-in cooling fan\r\nAudio: stereo speakers', 3, 'LED flash, HDR, panorama\r\nVideo Quality: 8K@30fps, 4K@30/60fps, 1080p@30/60/120/240fps', '8 MP, f/2.0, (wide), 1/4.0\", 1.12µm', 'HDR\r\nVideo Quality: 1080p@30fps', 'AMOLED, 1B colors, 165Hz, 630 nits (typ)\r\n| 6.8 inches, 111.6 cm2 (~85.1% screen-to-body ratio)\r\n| Resolution 1080 x 2400 pixels, 20:9 ratio (~387 ppi density)', 'Type: Li-Po 5050 mAh, non-removable\r\nCharging: Fast charging 66W, 100% in 38 min, Fast charging 66W - International model, Power Delivery 3.0, Quick Charge 4', 708853, 95, 70, 77, 66, '1'),
(14, 'Galaxy Z Fold 3', 3, 7099, '2021-08-27', 0, 'MobilesPictures/galaxyzfold3.jpg', '12 MP, f/1.8, 26mm (wide), 1/1.76\", 1.8µm, Dual Pixel PDAF, OIS\r\n| 12 MP, f/2.4, 52mm (telephoto), 1/3.6\", 1.0µm, PDAF, OIS, 2x optical zoom\r\n| 12 MP, f/2.2, 123˚, 12mm (ultrawide), 1.12µm', '12GB RAM | Storage 512GB', '5G', 3, 'Qualcomm SM8350 Snapdragon 888 5G (5 nm) \r\n| Octa-core (1x2.84 GHz Kryo 680 & 3x2.42 GHz Kryo 680 & 4x1.80 GHz Kryo 680)', 'Dimensions: Unfolded (158.2 x 128.1 x 6.4 mm), Folded (158.2 x 67.1 x 14.4-16 mm)\r\nWeight: 271g \r\nBuild: Glass front (Gorilla Glass Victus) (folded), plastic front (unfolded), glass back (Gorilla Glass Victus), aluminum frame, IPX8 water resistant (up to 1.5m for 30 mins)\r\nAudio: stereo speakers ', 1, 'LED flash, HDR, panorama\r\nVideo Quality: 4K@60fps, 1080p@60/240fps (gyro-EIS), 720p@960fps (gyro-EIS), HDR10+', 'Under display: 4 MP, f/1.8, 2.0µm\r\n| Cover camera: 10 MP, f/2.2, 26mm (wide), 1/3\", 1.22µm', 'HDR\r\nVideo Quality: 4K@30fps, 1080p@30fps, gyro-EIS', 'Foldable Dynamic AMOLED 2X, 120Hz, HDR10+, 1200 nits (peak)\r\n| 7.6 inches, 179.9 cm2 (~88.8% screen-to-body ratio)\r\n| Resolution 1768 x 2208 pixels (~374 ppi density)\r\n| Cover display: Dynamic AMOLED 2X, 120Hz, Corning Gorilla Glass Victus, 6.2 inche', 'Type: Li-Po 4400 mAh, non-removable\r\nCharging: Fast charging 25W, Fast wireless charging 11W, Reverse wireless charging 4.5W', 752218, 115, 90, 80, 64, '1'),
(15, 'Galaxy Flip 3', 3, 4199, '2021-08-27', 0, 'MobilesPictures/galaxyflip3.jpg', '12 MP, f/1.8, 27mm (wide), 1/2.55\", 1.4µm, Dual Pixel PDAF, OIS\r\n12 MP, f/2.2, 123˚ (ultrawide), 1.12µm', '8GB RAM | Storage 256GB', '5G', 3, 'Qualcomm SM8350 Snapdragon 888 5G (5 nm) \r\n| Octa-core (1x2.84 GHz Kryo 680 & 3x2.42 GHz Kryo 680 & 4x1.80 GHz Kryo 680)', 'Dimensions: Unfolded (166 x 72.2 x 6.9 mm), Folded (86.4 x 72.2 x 15.9-17.1 mm)\r\nWeight: 183g\r\nBuild: Plastic front, glass back (Gorilla Glass Victus), aluminum frame, IPX8 water resistant (up to 1.5m for 30 mins)\r\nAudio: stereo speakers', 2, 'LED flash, HDR, panorama\r\nVideo Quality: 4K@30/60fps, 1080p@60/240fps, 720p@960fps, HDR10+', '10 MP, f/2.4, 26mm (wide), 1.22µm', 'HDR\r\nVideo Quality: 4K@30fps', 'Foldable Dynamic AMOLED 2X, 120Hz, HDR10+, 1200 nits (peak)\r\n| 6.7 inches, 101.5 cm2 (~84.7% screen-to-body ratio)\r\n| Resolution 1080 x 2640 pixels (~426 ppi density)\r\n| Cover display: Super AMOLED, 1.9 inches, 260 x 512 pixels', 'Type: Li-Po 3300 mAh, non-removable\r\nCharging: Fast charging 15W, Fast wireless charging 10W, Reverse wireless charging 4.5W', 682223, 105, 90, 75, 58, '1'),
(16, 'Mi Mix Fold', 2, 6299, '2021-04-16', 0, 'MobilesPictures/mimixfold.jpg', '108 MP, f/1.8, (wide), 1/1.52\", 0.7µm, dual pixel PDAF\r\n| 8 MP, 80mm (telephoto/macro), liquid lens, PDAF, 3x optical zoom\r\n| 13 MP, f/2.4, 123˚ (ultrawide), 1.12µm', '12GB RAM | Storage 256GB', '5G', 3, 'Qualcomm SM8350 Snapdragon 888 5G (5 nm) \r\n| Octa-core (1x2.84 GHz Kryo 680 & 3x2.42 GHz Kryo 680 & 4x1.80 GHz Kryo 680)', 'Dimensions: Unfolded (173.3 x 133.4 x 7.6 mm), Folded (173.3 x 69.8 x 17.2 mm)\r\nWeight: 317g\r\nBuild: Glass front (folded), plastic front (unfolded), glass back (Gorilla Glass 5) or ceramic back, aluminum frame\r\nAudio: stereo speakers', 2, 'Dual LED flash, HDR, panorama\r\nVideo Quality: 8K@24/30fps, 4K@30/60fps, 1080p@30/60fps, gyro-EIS', '20 MP, 27mm (wide), 1/3.4\", 0.8µm', 'HDR, panorama\r\nVideo Quality: 1080p@30/60fps, 720p@120fps', 'Foldable AMOLED, 1B colors, HDR10+, Dolby Vision, 600 nits (typ), 900 nits (peak)\r\n| 8.01 inches, 198.7 cm2 (~85.9% screen-to-body ratio)\r\n| Resolution 1860 x 2480 pixels, 4:3 ratio (~387 ppi density)\r\n| Cover display: AMOLED, 90Hz, HDR10+, Dolby Vis', 'Type: Li-Po 5020 mAh, non-removable\r\nCharging: Fast charging 67W, 100% in 37 min, Power Delivery 3.0, Quick Charge 4+', 815000, 120, 85, 87, 68, '1'),
(17, 'Mate X2', 5, 11999, '2021-02-22', 0, 'MobilesPictures/matex2.jpg', '50 MP, f/1.9, 23mm (wide), 1/1.28\", 1.22µm, omnidirectional PDAF, Laser AF, OIS\r\n| 12 MP, f/2.4, 70mm (telephoto), PDAF, OIS, 3x optical zoom\r\n| 8 MP, f/4.4, 240mm (periscope telephoto), PDAF, OIS, 10x optical zoom\r\n| 16 MP, f/2.2, 17mm (ultrawide), AF', '8GB RAM | Storage 256GB', '5G', 3, 'Kirin 9000 5G (5 nm)\r\n| Octa-core (1x3.13 GHz Cortex-A77 & 3x2.54 GHz Cortex-A77 & 4x2.05 GHz Cortex-A55)', 'Dimensions: Unfolded (161.8 x 145.8 x 8.2 mm), Folded (161.8 x 74.6 x 14.7 mm)\r\nWeight: 295g\r\nBuild: Glass front, glass back, aluminum frame\r\nAudio: stereo speakers', 2, 'Leica optics, LED flash, panorama, HDR\r\nVideo Quality: 4K@30/60fps, 1080p@30/60fps, gyro-EIS', '16 MP, f/2.2, (wide)', 'HDR, panorama\r\nVideo Quality: 1080p@30fps', 'Foldable OLED, 90Hz\r\n| 8.0 inches, 206.0 cm2 (~87.3% screen-to-body ratio)\r\n| Resolution 2200 x 2480 pixels (~413 ppi density)\r\n| Cover display: OLED, 90Hz, 6.45 inches, 1160 x 2700 pixels', 'Type: Li-Po 4500 mAh, non-removable\r\nCharging: Fast charging 55W, Huawei SuperCharge', 632818, 120, 100, 87, 52, '1'),
(18, 'Nord 2', 4, 1399, '2021-07-28', 0, 'MobilesPictures/nord2.jpg', '50 MP, f/1.9, 24mm (wide), 1/1.56\", 1.0µm, PDAF, OIS\r\n| 8 MP, f/2.3, 119˚ (ultrawide)\r\n| 2 MP, f/2.4, (monochrome)', '8GB RAM | Storage 128GB', '5G', 4, 'MediaTek MT6893 Dimensity 1200 5G (6 nm)\r\n| Octa-core (1x3.0 GHz Cortex-A78 & 3x2.6 GHz Cortex-A78 & 4x2.0 GHz Cortex-A55)', 'Dimensions: 158.9 x 73.2 x 8.3 mm\r\nWeight: 189g\r\nBuild: Glass front (Gorilla Glass 5), glass back (Gorilla Glass 5), plastic frame\r\nAudio: stereo speakers', 3, 'Dual-LED flash, HDR, panorama\r\nVideo Quality: 4K@30fps, 1080p@30/60/240fps, gyro-EIS', '32 MP, f/2.5, (wide), 1/2.8\", 0.8µm', 'Auto HDR\r\nVideo Quality: 1080p@30fps, gyro-EIS', 'Fluid AMOLED, 90Hz, HDR10+\r\n| 6.43 inches, 99.8 cm2 (~85.8% screen-to-body ratio)\r\n| Resolution 1080 x 2400 pixels, 20:9 ratio (~409 ppi density)', 'Type: Li-Po 4500 mAh, non-removable\r\nCharging: Fast charging 65W, 1-100% in 30 min, USB Power Delivery', 598022, 116, 72, 62, 65, '1'),
(19, 'Galaxy A72', 3, 1899, '2021-03-26', 0, 'MobilesPictures/galaxya72.jpg', '64 MP, f/1.8, 26mm (wide), 1/1.7X\", 0.8µm, PDAF, OIS\r\n| 8 MP, f/2.4, (telephoto), 1.0µm, PDAF, OIS, 3x optical zoom\r\n| 12 MP, f/2.2, 123˚ (ultrawide), 1.12µm\r\n| 5 MP, f/2.4, (macro)', '8GB RAM | Storage 256GB', '5G', 4, 'Qualcomm SM7125 Snapdragon 720G (8 nm)\r\n| Octa-core (2x2.3 GHz Kryo 465 Gold & 6x1.8 GHz Kryo 465 Silver)', 'Dimensions: 165 x 77.4 x 8.4 mm\r\nWeight: 203g\r\nAudio: stereo speakers', 2, 'LED flash, panorama, HDR\r\nVideo Quality: 4K@30fps, 1080p@30/120fps; gyro-EIS', '32 MP, f/2.2, 26mm (wide), 1/2.8\", 0.8µm', 'HDR\r\nVideo Quality: 4K@30fps, 1080p@30fps', 'Super AMOLED, 120Hz, 800 nits (HBM)\r\n| 6.7 inches, 108.4 cm2 (~84.9% screen-to-body ratio)\r\n| Resolution 1080 x 2400 pixels, 20:9 ratio (~393 ppi density)', 'Type: Li-Ion 5000 mAh, non-removable\r\nCharging: Fast charging 25W', 321755, 105, 72, 70, 54, '1'),
(20, 'Mi 11 Lite', 2, 1199, '2021-04-16', 0, 'MobilesPictures/mi11lite.jpg', '64 MP, f/1.8, 26mm (wide), 1/1.97\", 0.7µm, PDAF\r\n| 8 MP, f/2.2, 119˚ (ultrawide), 1/4.0\", 1.12µm\r\n| 5 MP, f/2.4, (macro), AF', '8GB RAM | Storage 128GB', '4G+', 4, 'Qualcomm SM7150 Snapdragon 732G (8 nm)\r\n| Octa-core (2x2.3 GHz Kryo 470 Gold & 6x1.8 GHz Kryo 470 Silver)', 'Dimensions: 160.5 x 75.7 x 6.8 mm\r\nWeight: 157g\r\nBuild: 	IP53, dust and splash protection\r\nAudio: stereo speakers', 3, 'Dual-LED dual-tone flash, HDR, panorama\r\nVideo Quality: 4K@30fps, 1080p@30/60/120fps; gyro-EIS', '16 MP, f/2.5, 25mm (wide), 1/3.06\" 1.0µm', 'HDR, panorama\r\nVideo Quality: 1080p@30fps, 720p@120fps', 'AMOLED, 1B colors, HDR10, 90Hz, 500 nits (typ), 800 nits\r\n| 6.55 inches, 103.6 cm2 (~85.3% screen-to-body ratio)\r\n| Resolution 1080 x 2400 pixels, 20:9 ratio (~402 ppi density)', 'Type: Li-Po 4250 mAh, non-removable\r\nCharging: Fast charging 33W', 294251, 111, 88, 60, 50, '1'),
(21, 'Nova 8', 5, 1899, '2021-08-05', 0, 'MobilesPictures/nova8pro.jpg', '64 MP, f/1.9, 26mm (wide), PDAF\r\n| 8 MP, f/2.4, 120˚, 17mm (ultrawide)\r\n| 2 MP, f/2.4, (depth)\r\n| 2 MP, f/2.4, (macro)', '8GB RAM | Storage 128GB', '4G+', 4, 'Kirin 820E (7nm)\r\n| Hexa-core (3x2.22 GHz Cortex-A76 & 3x1.84 GHz Cortex-A55)', 'Dimensions: 160.1 x 74.1 x 7.6 mm\r\nWeight: 169g\r\nAudio: normal speaker', 3, 'LED flash, panorama, HDR\r\nVideo Quality: 4K, 1080p, 720p@960fps, gyro-EIS', '32 MP, f/2.0, 26mm (wide)', 'HDR\r\nVideo Quality: 4K', 'OLED, 1B colors, HDR10, 90Hz\r\n| 6.57 inches, 106.0 cm2 (~89.3% screen-to-body ratio)\r\n| Resolution 1080 x 2340 pixels, 19.5:9 ratio (~392 ppi density)', 'Type: Li-Po 3800 mAh, non-removable\r\nCharging: Fast charging 66W, 60% in 15 min, 100% in 35 min, Reverse charging 5W', 467000, 105, 70, 65, 48, '1'),
(22, 'Reno 6Z', 7, 1699, '2021-08-14', 0, 'MobilesPictures/reno6z.jpg', '64 MP, f/1.7, 25mm (wide), PDAF\r\n| 8 MP, f/2.2, 16mm, 119˚ (ultrawide), 1/4.0\", 1.12µm\r\n| 2 MP, f/2.4, (macro)', '8GB RAM | Storage 128GB', '5G', 4, 'MediaTek MT6853 Dimensity 800U 5G (7 nm)\r\n| Octa-core (2x2.4 GHz Cortex-A76 & 6x2.0 GHz Cortex-A55)', 'Dimensions: 160.2 x 73.4 x 7.9 mm\r\nWeight: 173g \r\nAudio: normal speaker', 3, 'LED flash, HDR, panorama\r\nVideo Quality: 4K@30fps, 1080p@30/120fps, gyro-EIS', '32 MP, f/2.4, 24mm (wide)', 'HDR\r\nVideo Quality: 1080p@30fps', 'AMOLED, 430 nits (typ), 600 nits (HDM), 800 nits (peak)\r\n| 6.4 inches, 98.9 cm2 (~84.1% screen-to-body ratio)\r\n| Resolution 1080 x 2400 pixels, 20:9 ratio (~411 ppi density)', 'Type: Li-Po 4310 mAh, non-removable\r\nCharging: Fast charging 30W, Reverse charging', 330000, 110, 72, 65, 51, '1'),
(23, 'V21', 6, 1599, '2021-05-05', 0, 'MobilesPictures/v21.jpg', '64 MP, f/1.8, 26mm (wide), 1/1.72\", 0.8µm, PDAF, OIS\r\n| 8 MP, f/2.2, 120˚, 16mm (ultrawide), 1/4.0\", 1.12µm\r\n| 2 MP, f/2.4, (macro)', '8GB RAM | Storage 128GB', '5G', 4, 'MediaTek MT6853 Dimensity 800U 5G (7 nm)\r\n| Octa-core (2x2.4 GHz Cortex-A76 & 6x2.0 GHz Cortex-A55)', 'Dimensions: 159.7 x 73.9 x 7.3 mm\r\nWeight: 176g\r\nBuild: Glass front, plastic frame, plastic back\r\nAudio: normal speaker', 3, 'LED flash, HDR, panorama\r\nVideo Quality: 4K@30fps (no OIS), 1080p@30/60fps', '44 MP, f/2.0, (wide), AF, OIS', 'Dual-LED flash, HDR\r\nVideo Quality: 4K@30fps (no OIS), 1080p@30fps', 'AMOLED, 90Hz, HDR10+, 500 nits (typ)\r\n| 6.44 inches, 100.1 cm2 (~84.8% screen-to-body ratio)\r\n| Resolution 1080 x 2400 pixels, 20:9 ratio (~409 ppi density)', 'Type: Li-Po 4000 mAh, non-removable\r\nCharging: Fast charging 33W, 63% in 30 min', 365055, 108, 90, 60, 38, '1'),
(24, 'Redmi 10', 2, 649, '2021-08-20', 0, 'MobilesPictures/redmi10.jpg', '50 MP, f/1.8, (wide), PDAF\r\n| 8 MP, f/2.2, 120˚ (ultrawide)\r\n| 2 MP, f/2.4, (macro)\r\n| 2 MP, f/2.4 (depth)', '6GB RAM | Storage 128GB', '4G+', 5, 'MediaTek Helio G88 (12nm)\r\n| Octa-core (2x2.0 GHz Cortex-A75 & 6x1.8 GHz Cortex-A55)', 'Dimensions: 162 x 75.5 x 8.9 mm\r\nWeight: 181g\r\nAudio: stereo speakers', 3, 'LED flash, HDR, panorama\r\nVideo Quality: 1080p@30fps', '8 MP, f/2.0, (wide)', 'Video Quality: 1080p@30fps', 'LCD, 90Hz\r\n| 6.5 inches, 102.0 cm2 (~83.4% screen-to-body ratio)\r\n| Resolution 1080 x 2400 pixels, 20:9 ratio (~405 ppi density)', 'Type: Li-Po 5000 mAh, non-removable\r\nCharging: Fast charging 18W, Reverse charging 9W', 195294, 95, 60, 50, 40, '1'),
(25, 'Redmi Note 10S', 2, 899, '2021-04-28', 0, 'MobilesPictures/redminote10s.jpg', '64 MP, f/1.8, 26mm (wide), 1/1.97\", 0.7µm, PDAF\r\n| 8 MP, f/2.2, 118˚ (ultrawide), 1/4.0\", 1.12µm\r\n| 2 MP, f/2.4, (macro)\r\n| 2 MP, f/2.4, (depth)', '8GB RAM | Storage 128GB', '4G+', 5, 'Mediatek Helio G95 (12 nm)\r\n| Octa-core (2x2.05 GHz Cortex-A76 & 6x2.0 GHz Cortex-A55)', 'Dimensions: 160.5 x 74.5 x 8.3 mm\r\nWeight: 178.8g\r\nBuild: IP53, dust and splash protection\r\nAudio: stereo speakers', 3, 'LED flash, HDR, panorama\r\nVideo Quality: 4K@30fps, 1080p@30/60/120fps, 720p@960fps', '13 MP, f/2.5, (wide), 1/3.06\", 1.12µm', 'HDR\r\nVideo Quality: 1080p@30fps', 'AMOLED, 450 nits (typ), 1100 nits (peak)\r\n| 6.43 inches, 99.8 cm2 (~83.5% screen-to-body ratio)\r\n| Resolution 1080 x 2400 pixels, 20:9 ratio (~409 ppi density)', 'Type: Li-Po 5000 mAh, non-removable\r\nCharging: Fast charging 33W', 324498, 92, 62, 60, 43, '1'),
(26, 'Galaxy M32', 3, 1099, '2021-06-28', 0, 'MobilesPictures/galaxym32.jpg', '64 MP, f/1.8, 26mm (wide), 1/1.97\", 0.7µm, PDAF\r\n| 8 MP, f/2.2, 123˚, (ultrawide), 1/4.0\", 1.12µm\r\n| 2 MP, f/2.4, (macro)\r\n| 2 MP, f/2.4, (depth)', '8GB RAM | Storage 128GB', '4G', 5, 'Mediatek Helio G80 (12 nm)\r\n| Octa-core (2x2.0 GHz Cortex-A75 & 6x1.8 GHz Cortex-A55)', 'Dimensions: 159.3 x 74 x 8.4 mm\r\nWeight: 180g\r\nBuild: Glass front, plastic frame, plastic back\r\nAudio: normal speaker', 3, 'LED flash, panorama, HDR\r\nVideo Quality: 1080p@30fps', '20 MP, f/2.2, (wide)', 'Video Quality: 1080p@30fps', 'Super AMOLED, 90Hz, 800 nits (HBM)\r\n| 6.4 inches, 98.9 cm2 (~83.9% screen-to-body ratio)\r\n| Resolution 1080 x 2400 pixels, 20:9 ratio (~411 ppi density)', 'Type: Li-Ion 5000 mAh, non-removable\r\nCharging: Fast charging 25W\r\n', 193288, 82, 65, 62, 42, '1'),
(27, 'Galaxy M12', 3, 799, '2021-04-30', 0, 'MobilesPictures/galaxym12.jpg', '48 MP, f/2.0, (wide), 1/2.0\", 0.8µm, PDAF\r\n| 5 MP, f/2.2, 123˚ (ultrawide)\r\n| 2 MP, f/2.4, (macro)\r\n| 2 MP, f/2.4, (depth)', '4GB RAM | Storage 64GB', '4G', 5, 'Exynos 850 (8nm)\r\n| Octa-core (4x2.0 GHz Cortex-A55 & 4x2.0 GHz Cortex-A55)', 'Dimensions: 164 x 75.9 x 9.7 mm\r\nWeight: 212g\r\nBuild: Glass front, plastic back, plastic frame\r\nAudio: Normal Speaker', 4, 'LED flash, panorama, HDR\r\nVideo Quality: 1080p@30fps', '8 MP, f/2.2, (wide)', 'HDR\r\nVideo Quality: 1080p@30fps', 'PLS IPS, 90Hz\r\n| 6.5 inches, 102.0 cm2 (~81.9% screen-to-body ratio)\r\n| Resolution 720 x 1600 pixels, 20:9 ratio (~270 ppi density)', 'Type: Li-Po 5000 mAh, non-removable\r\nCharging: Fast charging 15W', 127746, 75, 55, 48, 39, '1'),
(28, 'A74 5G', 7, 959, '2021-04-13', 0, 'MobilesPictures/a745g.jpg', '48 MP, f/1.7, 26mm (wide), 1/2.0\", 0.8µm, PDAF\r\n| 8 MP, f/2.2, 119˚ (ultrawide), 1/4.0\", 1.12µm\r\n| 2 MP, f/2.4, (macro)\r\n| 2 MP, f/2.4, (depth)', '6GB RAM | Storage 128GB', '4G', 5, 'Qualcomm SM4350 Snapdragon 480 5G (8 nm)\r\n| Octa-core (2x2.0 GHz Kryo 460 & 6x1.8 GHz Kryo 460)', 'Dimensions: 162.9 x 74.7 x 8.4 mm\r\nWeight:	190g \r\nAudio: normal speaker', 3, 'LED flash, panorama\r\nVideo Quality: 1080p@30fps, gyro-EIS', '16 MP, f/2.0, 26mm (wide)', 'Panorama\r\nVideo Quality: 1080p@30fps', 'LTPS IPS LCD, 90Hz, 480 nits (typ)\r\n| 6.5 inches, 102.0 cm2 (~83.8% screen-to-body ratio)\r\n| Resolution 1080 x 2400 pixels, 20:9 ratio (~405 ppi density)', 'Type: Li-Po 5000 mAh, non-removable\r\nCharging: Fast charging 18W', 320000, 78, 65, 50, 45, '1'),
(29, 'Y20S', 6, 799, '2020-10-19', 0, 'MobilesPictures/y20s.jpg', '13 MP, f/2.2, (wide), PDAF\r\n| 2 MP, f/2.4, (macro)\r\n| 2 MP, f/2.4, (depth)', '8GB RAM | Storage 128GB', '4G', 5, 'Qualcomm SM4250 Snapdragon 460 (11 nm)\r\n| Octa-core (4x1.8 GHz Kryo 240 & 4x1.6 GHz Kryo 240)', 'Dimensions: 164.4 x 76.3 x 8.4 mm\r\nWeight: 192.3g\r\nBuild: Glass front, plastic back, plastic frame\r\nAudio: normal speaker', 3, 'LED flash, HDR\r\nVideo Quality: 1080p@30fps', '8 MP, f/1.8, (wide)', 'Video Quality: 1080p@30fps', 'IPS LCD\r\n| 6.51 inches, 102.3 cm2 (~81.6% screen-to-body ratio)\r\n| 720 x 1600 pixels, 20:9 ratio (~270 ppi density)', 'Type: Li-Po 5000 mAh, non-removable\r\nCharging: Fast charging 18W', 142156, 66, 58, 42, 38, '1'),
(30, 'Y7a', 5, 699, '2020-10-30', 0, 'MobilesPictures/y7a.jpg', '48 MP, f/1.8, 26mm (wide), 1/2.0\", 0.8µm, PDAF\r\n| 8 MP, f/2.4, 120˚ (ultrawide), 1/4.0\", 1.12µm\r\n| 2 MP, f/2.4, (macro)\r\n| 2 MP, f/2.4, (depth)', '4GB RAM | Storage 128GB', '4G', 5, 'Kirin 710A (14 nm)\r\n| Octa-core (4x2.0 GHz Cortex-A73 & 4x1.7 GHz Cortex-A53)', 'Dimensions: 165.7 x 76.9 x 9.3 mm\r\nWeight: 206g\r\nAudio: normal  speaker', 3, 'LED flash, HDR, panorama\r\nVideo Quality: 1080p@30/60fps', '8 MP, f/2.0, (wide)', 'HDR\r\nVideo Quality: 1080p@30fps', 'IPS LCD\r\n| 6.67 inches, 107.4 cm2 (~84.3% screen-to-body ratio)\r\n| Resolution 1080 x 2400 pixels, 20:9 ratio (~395 ppi density)', 'Type: Li-Po 5000 mAh, non-removable\r\nCharging: Fast charging 22.5W, 46% in 30 min ', 128900, 76, 56, 45, 36, '1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `grand_total` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `status` enum('Pending','Delivered','Cancelled') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `grand_total`, `created`, `status`) VALUES
(9, 19, 6798.00, '2021-10-17 13:45:39', 'Delivered'),
(44, 19, 9598.00, '2021-10-23 21:47:36', 'Delivered'),
(46, 24, 5799.00, '2021-10-29 21:28:01', 'Delivered'),
(47, 24, 3799.00, '2021-10-30 17:31:29', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `mobile_id` int(11) DEFAULT NULL,
  `quantity` int(5) NOT NULL,
  `tablet_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `mobile_id`, `quantity`, `tablet_id`) VALUES
(13, 9, 0, 1, 3),
(14, 9, 1, 1, 0),
(52, 44, 0, 2, 1),
(55, 46, 1, 1, 0),
(56, 47, 6, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `platform`
--

CREATE TABLE `platform` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `platform`
--

INSERT INTO `platform` (`id`, `name`) VALUES
(1, 'High End Range'),
(2, 'Gaming Range'),
(3, 'Innovative Range'),
(4, 'Middle Range'),
(5, 'Budget Range');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `username` varchar(25) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `username`, `password`, `email`) VALUES
(1, 'weijiantan', 'f78d123808d5f8a4f7ff43a0b038f45c ', 'weijian@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`id`, `name`) VALUES
(1, '512 GB'),
(2, '256 GB'),
(3, '128 GB'),
(4, '64 GB');

-- --------------------------------------------------------

--
-- Table structure for table `tablet`
--

CREATE TABLE `tablet` (
  `id` int(11) NOT NULL,
  `model` varchar(100) CHARACTER SET utf8 NOT NULL,
  `brandID` int(11) NOT NULL,
  `price` double NOT NULL,
  `releaseDate` varchar(100) CHARACTER SET utf8 NOT NULL,
  `discountRate` double NOT NULL,
  `tabletUrl` varchar(100) CHARACTER SET utf8 NOT NULL,
  `mainCameraSpecs` varchar(500) CHARACTER SET utf8 NOT NULL,
  `memorySpecs` varchar(100) CHARACTER SET utf8 NOT NULL,
  `networkSpecs` varchar(100) CHARACTER SET utf8 NOT NULL,
  `platformID` int(11) NOT NULL,
  `cpu` varchar(250) CHARACTER SET utf8 NOT NULL,
  `features` varchar(300) CHARACTER SET utf8 NOT NULL,
  `storageID` int(11) DEFAULT NULL,
  `mainCameraFeatures` varchar(250) DEFAULT NULL,
  `frontCameraSpecs` varchar(250) DEFAULT NULL,
  `frontCameraFeatures` varchar(250) DEFAULT NULL,
  `displaySpecs` varchar(250) DEFAULT NULL,
  `batterySpecs` varchar(250) DEFAULT NULL,
  `performanceScore` int(11) DEFAULT NULL,
  `mainCameraScore` int(11) DEFAULT NULL,
  `frontCameraScore` int(11) DEFAULT NULL,
  `displayScore` int(11) DEFAULT NULL,
  `batteryLifeScore` int(11) DEFAULT NULL,
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tablet`
--

INSERT INTO `tablet` (`id`, `model`, `brandID`, `price`, `releaseDate`, `discountRate`, `tabletUrl`, `mainCameraSpecs`, `memorySpecs`, `networkSpecs`, `platformID`, `cpu`, `features`, `storageID`, `mainCameraFeatures`, `frontCameraSpecs`, `frontCameraFeatures`, `displaySpecs`, `batterySpecs`, `performanceScore`, `mainCameraScore`, `frontCameraScore`, `displayScore`, `batteryLifeScore`, `status`) VALUES
(1, 'Ipad Pro 12.9 (2021)', 1, 4799, '2021-05-21', 0, 'TabletsPictures/ipadpro129.jpg', '12 MP, f/1.8, (wide), 1/3\", 1.22µm, dual pixel PDAF\r\n| 10 MP, f/2.4, 125˚ (ultrawide)\r\n| TOF 3D LiDAR scanner (depth)', '8GB RAM | Storage 128GB', 'Wi-Fi', 1, 'Apple M1', 'Dimensions: 280.6 x 214.9 x 6.4 mm (11.05 x 8.46 x 0.25 in)\r\nWeight: 682 g (Wi-Fi), 685 g (5G) (1.50 lb)\r\nBuild: Glass front, aluminum back, aluminum frame, Stylus support (Bluetooth integration, magnetic)\r\nAudio: stereo speakers (4 speakers)', 3, 'Quad-LED dual-tone flash, HDR\r\nVideo Quality: 4K@24/25/30/60fps, 1080p@25/30/60/120/240fps; gyro-EIS', '12 MP, f/2.4, 122? (ultrawide)', 'Face detection, HDR, panorama\r\nVideo Quality: 1080p@25/30/60fps, gyro-EIS', 'Liquid Retina XDR mini-LED LCD, 120Hz, HDR10, Dolby Vision, 1000 nits (typ), 1600 nits (peak)\r\n| 12.9 inches, 515.3 cm2 (~85.4% screen-to-body ratio)\r\n| Resolution 2048 x 2732 pixels, 4:3 ratio (~265 ppi density)', 'Type: Li-Po (40.88 Wh), non-removable\r\nCharging: Fast charging 18W', 1214051, 115, 85, 95, 80, '1'),
(2, 'Ipad Pro 11 (2021)', 1, 3499, '2021-05-21', 0, 'TabletsPictures/ipadpro11.jpg', '12 MP, f/1.8, (wide), 1/3\", 1.22µm, dual pixel PDAF\r\n| 10 MP, f/2.4, 125˚ (ultrawide)\r\n| TOF 3D LiDAR scanner (depth)', '8GB RAM | Storage 128GB', 'Wi-Fi', 1, 'Apple M1', 'Dimensions: 247.6 x 178.5 x 5.9 mm (9.75 x 7.03 x 0.23 in)\r\nWeight: 466 g (Wi-Fi), 470 g (5G) (1.03 lb)\r\nBuild: Glass front, aluminum back, aluminum frame\r\nAudio: stereo speakers (4 speakers)', 3, 'Quad-LED dual-tone flash, HDR\r\nVideo Quality: 4K@24/25/30/60fps, 1080p@25/30/60/120/240fps; gyro-EIS', '12 MP, f/2.4, 122? (ultrawide)', 'Face detection, HDR, panorama\r\nVideo Quality: 1080p@25/30/60fps, gyro-EIS', 'Liquid Retina IPS LCD, 120Hz, HDR10, Dolby Vision, 600 nits (typ)\r\n| 11.0 inches, 366.5 cm2 (~82.9% screen-to-body ratio)\r\n| Resolution 1668 x 2388 pixels (~265 ppi density)', 'Type: Li-Po 7538 mAh (28.65 Wh), non-removable\r\nCharging: Fast charging 18W', 1140837, 115, 85, 90, 77, '1'),
(3, 'Galaxy Tab S7+', 3, 4599, '2020-08-21', 0, 'TabletsPictures/galaxytabs7+.jpg', '13 MP, f/2.0, 26mm (wide), 1/3.4\", 1.0µm, AF\r\n| 5 MP, f/2.2, 12mm (ultrawide), 1.12µm', '8GB RAM | Storage 256GB', 'Wi-Fi', 1, 'Qualcomm SM8250 Snapdragon 865 5G+ (7 nm+)', 'Dimensions: 285 x 185 x 5.7 mm\r\nWeight: 575g\r\nBuild: Glass front, aluminum back, aluminum frame, Stylus support, 9ms latency(Bluetooth integration, accelerometer, gyro)\r\nAudio: stereo speakers Tuned by AKG', 2, 'HDR, panorama\r\nVideo Quality: 4K@30fps', '8 MP, f/2.0, 26mm (wide), 1/4\", 1.12µm', 'Video Quality: 1080p@30fps', 'Super AMOLED, 120Hz, HDR10+\r\n| 12.4 inches, 446.1 cm2 (~84.6% screen-to-body ratio)\r\n| Resolution 1752 x 2800 pixels, 16:10 ratio (~266 ppi density)', 'Type: Li-Po 10090 mAh, non-removable\r\nCharging: Fast charging 45W', 605000, 105, 80, 95, 78, '1'),
(4, 'Ipad Air 2020', 1, 2599, '2020-10-23', 0, 'TabletsPictures/ipadair2020.jpg', '12 MP, f/1.8, (wide), 1/3\", 1.22µm, dual pixel PDAF', '4GB RAM | Storage 64GB', 'Wi-Fi', 4, 'Apple A14 Bionic (5 nm)', 'Dimensions: 247.6 x 178.5 x 6.1 mm \r\nWeight: 458g\r\nBuild: Glass front, aluminum back, aluminum frame, Stylus support\r\nAudio: stereo speakers', 4, 'HDR\r\nVideo Quality: 4K@24/30/60fps, 1080p@30/60/120/240fps; gyro-EIS', '7 MP, f/2.0, 31mm (standard)', 'HDR\r\nVideo Quality: 1080p@30/60fps', 'Liquid Retina IPS LCD, 500 nits (typ)\r\n| 10.9 inches, 359.2 cm2 (~81.3% screen-to-body ratio)\r\n| Resolution 1640 x 2360 pixels (~264 ppi density)', 'Type: Li-Ion 7606 mAh (28.93 Wh), non-removable', 754796, 101, 71, 82, 75, '1'),
(5, 'Ipad Mini 2021', 1, 2299, '2021-09-14', 0, 'TabletsPictures/ipadmini2021.jpg', '12 MP, f/1.8, (wide), AF', '4GB RAM | Storage 64GB', 'Wi-Fi', 4, 'Apple A15 Bionic (5 nm)', 'Dimensions: 195.4 x 134.8 x 6.3 mm\r\nWeight: 293g\r\nBuild: Glass front, aluminum back, aluminum frame, Stylus support\r\nAudio: stereo speakers', 4, 'Quad-LED dual-tone flash, HDR, panorama\r\nVideo Quality: 4K@24/25/30/60fps, 1080p@25/30/60/120/240fps; gyro-EIS', '12 MP, f/2.4, 122? (ultrawide)', 'HDR\r\nVideo Quality: 1080p@25/30/60fps, gyro-EIS', 'Liquid Retina IPS LCD, 500 nits (typ)\r\n| 8.3 inches, 203.9 cm2 (~77.4% screen-to-body ratio)\r\n| Resolution 1488 x 2266 pixels, 3:2 ratio (~327 ppi density)', 'Type: Li-Ion, non-removable (19.3 Wh)', 760000, 100, 85, 85, 76, '1'),
(6, 'MatePad Pro 10.8', 5, 2399, '2021-06-25', 0, 'TabletsPictures/matepadpro108.jpg', '13 MP, f/1.8, PDAF', '8GB RAM | Storage 256GB', 'Wi-Fi', 4, 'Qualcomm SM8250-AC Snapdragon 870 5G (7 nm)', 'Dimensions: 246 x 159 x 7.2 mm\r\nWeight: 460g\r\nBuild: Glass front, aluminum back, aluminum frame, Stylus support (magnetic)\r\nAudio: stereo speakers Tuned by Harman Kardon', 2, 'LED flash, HDR, panorama\r\nVideo Quality: 4K@30fps, 1080p@30fps', '8 MP, f/2.0', 'Video Quality: 1080p@30fps', 'IPS LCD, 540 nits (typ)\r\n| 10.8 inches, 338.2 cm2 (~86.5% screen-to-body ratio)\r\n| Resolution 2560 x 1600 pixels, 16:10 ratio (~280 ppi density)', 'Type: Li-Po 7250 mAh, non-removable\r\nCharging: Fast charging 40W, Reverse charging 5W, Wireless charging 27W, Wireless reverse charging 10W', 448187, 76, 56, 80, 74, '1'),
(7, 'Ipad 10.2 (2021)', 1, 1499, '2021-09-14', 0, 'TabletsPictures/ipad102.jpg', '8 MP, f/2.4, 31mm (standard), 1.12µm, AF', '4GB RAM | Storage 64GB', 'Wi-Fi', 5, 'Apple A13 Bionic (7 nm+)', 'Dimensions: 250.6 x 174.1 x 7.5 mm\r\nWeight:	487g\r\nBuild: Glass front, aluminum back, aluminum frame, Stylus support\r\nAudio: stereo speakers ', 4, 'HDR, panorama\r\nVideo Quality: 1080p@25/30fps, 720p@120fps; gyro-EIS', '12 MP, f/2.4, 122? (ultrawide)', 'HDR\r\nVideo Quality: 1080p@25/30/60fps, gyro-EIS', 'Retina IPS LCD, 500 nits (typ)\r\n| 10.2 inches, 322.2 cm2 (~73.8% screen-to-body ratio)\r\n| Resolution 1620 x 2160 pixels, 4:3 ratio (~265 ppi density)', 'Type: Li-Ion, non-removable (32.4 Wh)', 536432, 75, 85, 78, 72, '1'),
(8, 'Galaxy Tab A7', 3, 999, '2020-11-11', 0, 'TabletsPictures/galaxytaba7.jpg', '8 MP, AF', '3GB RAM | Storage 64GB', 'Wi-Fi', 5, 'Qualcomm SM6115 Snapdragon 662 (11 nm)', 'Dimensions: 247.6 x 157.4 x 7 mm\r\nWeight: 476g\r\nAudio: stereo speakers ', 4, 'Video Quality: 1080p@30fps', '5 MP', 'Video Quality: 1080p@30fps', 'TFT\r\n| 10.4 inches, 307.9 cm2 (~79.0% screen-to-body ratio)\r\n| Resolution 1200 x 2000 pixels, 5:3 ratio (~224 ppi density)', 'Type: Li-Po 7040 mAh, non-removable\r\nCharging: Fast charging 15W', 141000, 70, 52, 70, 70, '1'),
(9, 'Matepad 10.4', 5, 1399, '2020-04-28', 0, 'TabletsPictures/matepad104.jpg', '8 MP, AF', '4GB RAM | Storage 64GB', 'Wi-Fi', 5, 'Kirin 810 (7 nm)', 'Dimensions: 245.2 x 155 x 7.4 mm\r\nWeight: 450g\r\nBuild: Glass front, aluminum back, aluminum frame, Stylus support\r\nAudio: stereo speakers Tuned by Harman Kardon', 4, 'LED flash, HDR, panorama\r\nVideo Quality: 1080p@30fps', '8 MP', 'HDR\r\nVideo Quality: 1080p@30fps', 'IPS LCD\r\n| 10.4 inches, 307.9 cm2 (~81.0% screen-to-body ratio)\r\n| Resolution 1200 x 2000 pixels, 5:3 ratio (~224 ppi density)', 'Type: Li-Po 7250 mAh, non-removable\r\nCharging: Fast charging 18W', 361056, 72, 55, 72, 69, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstName` varchar(20) CHARACTER SET utf8 NOT NULL,
  `lastName` varchar(20) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `username` varchar(25) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `email`, `username`, `password`, `phone`, `address`, `status`) VALUES
(19, 'Bryan', 'Tan', 'bryantan@gmail.com', 'bryantan', '9a1bbf93fc44b6ebdb08af4fd31ad753', '0123456780', '1-4, Sungai Ara, Georgetown, Penang', '1'),
(24, 'Alvin', 'Lim', 'lim@gmail.com', 'lim', '1087aa217f9e9c16d94bb3a97786942d', '0127891234', '2-1, Taman Indah, Bayan Lepas, Penang', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FromUser` (`FromUser`),
  ADD KEY `ToUser` (`ToUser`);

--
-- Indexes for table `mobile`
--
ALTER TABLE `mobile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `platform`
--
ALTER TABLE `platform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tablet`
--
ALTER TABLE `tablet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `mobile`
--
ALTER TABLE `mobile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `platform`
--
ALTER TABLE `platform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tablet`
--
ALTER TABLE `tablet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

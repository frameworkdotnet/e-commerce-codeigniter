-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2015 at 03:19 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_toko_online`
--
CREATE DATABASE IF NOT EXISTS `db_toko_online` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_toko_online`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `nama`, `username`, `password`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(10) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  `kode_parent` int(5) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `kode_parent`) VALUES
(1, 'Notebook', 0),
(2, 'Smartphone', 0),
(3, 'Tablet', 0),
(4, 'Acer', 1),
(5, 'Asus', 1),
(6, 'Dell', 1),
(7, 'Lenovo', 1),
(8, 'Toshiba', 1),
(9, 'OPPO', 2),
(10, 'Samsung', 2),
(11, 'Smartfren', 2),
(12, 'Sony Ericsson', 2),
(19, 'HTC', 2),
(18, 'Blackberry', 2),
(20, 'Nokia', 2),
(21, 'Apple', 1),
(22, 'Axioo', 1),
(23, 'HP', 1),
(24, 'Advan', 2),
(25, 'a', 0),
(26, 'd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE IF NOT EXISTS `konfirmasi` (
  `id_konfirmasi` bigint(150) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telepon` int(20) NOT NULL,
  `jumlah_pembayaran` int(10) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `no_rekening` int(45) NOT NULL,
  `nama_rekening` varchar(45) NOT NULL,
  `bank_tujuan` varchar(45) NOT NULL,
  `metode_pembayaran` varchar(45) NOT NULL,
  PRIMARY KEY (`id_konfirmasi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konfirmasi`, `nama`, `email`, `telepon`, `jumlah_pembayaran`, `tgl_pembayaran`, `no_rekening`, `nama_rekening`, `bank_tujuan`, `metode_pembayaran`) VALUES
(20140516001, 'dsa', 'ronny@gmail.com', 0, 3000000, '2013-08-09', 3, 'sd', 'Bank Central Asia - No. Rek 1800658299', 'Setoran Tunai, Transfer Bank'),
(20140516002, 'dsa', 'ronny@gmail.com', 0, 3000000, '2013-08-09', 3, 'sd', 'Bank Central Asia - No. Rek 1800658299', 'Setoran Tunai, Transfer Bank'),
(20140516003, 'a', 'future.fernando13@gmail.com', 4342323, 32423, '2013-08-09', 342, 'sd', 'Bank Central Asia - No. Rek 1800658299', 'Setoran Tunai, Transfer Bank'),
(20140519001, 'Amanda Putri', 'amanda@yahoo.com', 12345, 3000000, '2013-08-09', 342, 'BCA', 'Bank Central Asia - No. Rek 1800658299', 'ATM');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `nama_produk` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `harga` int(10) NOT NULL,
  `stok` int(5) NOT NULL,
  `dibeli` int(5) NOT NULL,
  `gbr_kecil` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `gbr_besar` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `deskripsi` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga`, `stok`, `dibeli`, `gbr_kecil`, `gbr_besar`, `deskripsi`) VALUES
('GDT100001', 5, 'Asus A450CC-WX151D', 2147483647, 29, 2, 'asus-5254-73379-1-product.jpg', 'asus-5254-73379-1-product.jpg', 'Asus A450CC-WX151D - DOS - 14" - 500 GB - Merah hadir dengan desain yang kompak dan dikemas dengan layar berukuran 14". Dengan bobot dibawah 3 kg, Asus menyertakan berbagai teknologi yang hanya terdapat pada produknya seperti SonicMaster, Instan On, juga Ice Cool.'),
('GDT100002', 5, 'Asus A450CC-WX152D', 4772900, 30, 1, 'asus-5269-83379-1-product.jpg', 'asus-5269-83379-1-product.jpg', 'Asus A450CC-WX152D - DOS - 14" - 500 GB - Putih hadir dengan desain yang kompak dan dikemas dengan layar berukuran 14". Dengan bobot dibawah 3 kg, Asus menyertakan berbagai teknologi yang hanya terdapat pada produknya seperti SonicMaster, Instan On, juga Ice Cool.'),
('GDT100003', 5, 'ASUS A450LC-WX052D', 8445000, 29, 2, 'asus-4372-630521-1-product.jpg', 'asus-4372-630521-1-product.jpg', 'ASUS A450LC merupakan sebuah laptop yang memiliki ukuran layar sebesar 14 inci. Hadir dengan desain kokoh membuat laptop ini terlihat lebih elegan. Dilengkapi dengan fitur teknologi lain seperti IceCool dan Sonic Master serta didukung dengan kinerja mesin yang optimal membuat laptop ini mampu mengerjakan segala pekerjaan komputasi Anda dengan mudah.'),
('GDT100004', 5, 'Asus A451LB-WX077D', 7249000, 30, 1, 'asus-2889-473421-1-product.jpg', 'asus-2889-473421-1-product.jpg', 'Notebook ASUS A451LB ini memang menjadi penerus ASUS A46CB yang laris manis di pasaran. Dengan sedikit sentuhan baru pada casing, seperti sudut-sudut yang sekarang lebih membulat, juga bottom case yang lebih cembung, membuat ASUS A451LB lebih nyaman di tenteng dengan tangan.'),
('GDT100005', 5, 'ASUS G750JX-CV025H', 29799000, 29, 2, 'asus-7559-413811-1-product.jpg', 'asus-7559-413811-1-product.jpg', 'Asus G750JV merupakan sebuah laptop yang memiliki ukuran layar sebesar 17.3 inci. Hadir dengan desain kokoh membuat laptop ini terlihat lebih elegan. Dilengkapi dengan fitur teknologi lain seperti IceCool dan Sonic Master serta didukung dengan kinerja mesin yang optimal membuat laptop ini mampu mengerjakan segala pekerjaan komputasi Anda dengan mudah.'),
('GDT100006', 5, 'ASUS N550JV-CN300D', 12825000, 30, 1, 'asus-7040-930521-1-product.jpg', 'asus-7040-930521-1-product.jpg', 'ASUS N550JV, merupakan sebuah laptop yang memiliki ukuran layar sebesar 14 inci. Hadir dengan desain kokoh membuat laptop ini terlihat lebih elegan. Dilengkapi dengan fitur teknologi lain seperti IceCool dan Sonic Master serta didukung dengan kinerja mesin yang optimal membuat laptop ini mampu mengerjakan segala pekerjaan komputasi Anda dengan mudah.'),
('GDT100007', 5, 'Asus S46CM-WX148H Slim series', 12100000, 30, 1, 'asus-3991-523431-1-product.jpg', 'asus-3991-523431-1-product.jpg', 'Desain estetika Sleek Selain menjadi ekstra tipis dan ringan, ASUS S46 ultrabooks pak fitur full set hanya 21mm. Desain garis rambut abu-abu keren mengungkapkan pendekatan profesional pribadi. One-piece molded casing atas memperkuat kekuatan notebook dan kekakuan, dan seluruh gaya mewujudkan kehalusan yang memenuhi semua kebutuhan portabilitas kinerja Anda.'),
('GDT100008', 5, 'ASUS S551LB-CJ131H', 9850000, 29, 2, 'asus-4690-677821-1-product.jpg', 'asus-4690-677821-1-product.jpg', 'Permukaan dengan pola garis melingkar dan tekstur metal membuat ASUS VivoBook S551LB tampak elegan dibandingkan dengan notebook lainnya.Dengan bentuknya yang tipis serta fitur-fitur yang lengkap dan istimewa, ASUS VivoBook S551LB menjadi laptop yang sangat portable dan dapat memberikan pengalaman komputasi yang intuitif. Dengan desain yang tipis, mudah dibawa kemana saja serta terlihat sangat ekslusif.'),
('GDT100009', 5, 'ASUS Transformer Book i5', 16799000, 29, 2, 'asus-3387-376411-1-product.jpg', 'asus-3387-376411-1-product.jpg', 'Sebuah notebook yang bisa menjadi tablet dan kapanpun juga bisa dilepas sebagai tablet dengan display layar sentuh dari IPS Full HD (1920 x 1080) yang akan memberikan tampilan visual dan warna terbaik,\r\nLayar IPS ini memberikan sudut pandang hingga 178 derajat sehingga tampilan visual selalu jernih dan tajam.\r\nAsus Transformer book memiliki performa yang tinggi karena ditunjang processor Intel Core i5 dan Core i7 generasi terbaru sebagai notebook dan tablet ditunjang sebuah casing Ultra book yang sangat menawan'),
('GDT100010', 5, 'Asus Vivo Book X200CA-KX186D', 3245000, 30, 1, 'asus-5328-96609-1-product.jpg', 'asus-5328-96609-1-product.jpg', 'Asus Vivo Book X200CA hadir dengan desain yang kompak dan dikemas dengan layar berukuran 11.6". Dengan bobot dibawah 3 kg, Asus menyertakan berbagai teknologi yang hanya terdapat pada produknya seperti SonicMaster, Instan On, juga Ice Cool.'),
('GDT100011', 5, 'ASUS VIVOBOOK S400CA-CA094H', 6125000, 30, 1, 'asus-8257-901611-1-product.jpg', 'asus-8257-901611-1-product.jpg', 'Didesain dengan konsep untuk membuat laptop lebih personal, Asus VivoBook Touch S400CA hadir dengan teknologi layar sentuh dan Windows 8. Asus VivoBook memungkinkan Ada untuk merasakan teknologi melalui panel layar sentuh yang responsif dan intuitif serta laptopp yang begitu ringan dan slim membuatnya mudah untuk Anda bawa. Dengan Windows 8, prosesor bertenaga dan Asus SonicMaster, kini teknologi berada di sentuhan Anda.'),
('GDT100012', 5, 'Asus Vivobook S551LB (131H)', 9949000, 30, 1, 'asus-5827-27929-1-product.jpg', 'asus-5827-27929-1-product.jpg', 'Didesain dengan konsep untuk membuat laptop lebih personal, Asus VivoBook hadir dengan teknologi layar sentuh dan Windows 8. Asus VivoBook memungkinkan Ada untuk merasakan teknologi melalui panel layar sentuh yang responsif dan intuitif serta laptopp yang begitu ringan dan slim membuatnya mudah untuk Anda bawa. Dengan Windows 8, prosesor bertenaga dan Asus SonicMaster, kini teknologi berada di sentuhan Anda.'),
('GDT100013', 5, 'ASUS VIVOBOOK S551LB-CJ207H', 11350000, 30, 1, 'asus-8308-011611-1-product.jpg', 'asus-8308-011611-1-product.jpg', 'Permukaan dengan pola garis melingkar dan tekstur metal membuat ASUS VivoBook S551LB tampak elegan dibandingkan dengan notebook lainnya.Dengan bentuknya yang tipis serta fitur-fitur yang lengkap dan istimewa, ASUS VivoBook S551LB menjadi laptop yang sangat portable dan dapat memberikan pengalaman komputasi yang intuitif. Dengan desain yang tipis, mudah dibawa kemana saja serta terlihat sangat ekslusif.'),
('GDT100014', 5, 'Asus X200CA', 3249000, 30, 1, 'asus-5760-36929-1-product.jpg', 'asus-5760-36929-1-product.jpg', 'Asus X200CA merupakan sebuah notebook yang hadir dengan layar sebesar 11.6". Ukurannya yang kompak membuat notebook ini menjadi lebih ringan dengan bobot 1.2 kg. Tampil dengan desain yang modern serta dinamis, notebook ini sangat cocok untuk menemani kegiatan Anda bersama pekerjaan sehari-hari.'),
('GDT100015', 5, 'Asus X200CA (KX188D)', 3579000, 30, 1, 'asus-5570-75729-1-product.jpg', 'asus-5570-75729-1-product.jpg', 'Asus X200CA (KX188D) hadir dengan desain yang kompak dan dikemas dengan layar berukuran 11.6". Dengan bobot dibawah 3 kg, Asus menyertakan berbagai teknologi yang hanya terdapat pada produknya seperti SonicMaster, Instan On, juga Ice Cool.'),
('GDT100016', 5, 'ASUS X200CA-KX184D', 3299000, 30, 1, 'asus-9605-88418-1-product.jpg', 'asus-9605-88418-1-product.jpg', 'ASUS X200CA-KX184D hadir dengan desain yang kompak dan dikemas dengan layar berukuran 11.6". Dengan bobot dibawah 3 kg, Asus menyertakan berbagai teknologi yang hanya terdapat pada produknya seperti SonicMaster, Instan On, juga Ice Cool.'),
('GDT100017', 5, 'ASUS X200CA-KX185', 4400000, 30, 1, 'asus-9379-710131-1-product.jpg', 'asus-9379-710131-1-product.jpg', 'ASUS X200CA-KX185 hadir dengan desain yang kompak dan dikemas dengan layar berukuran 11.6". Dengan bobot dibawah 3 kg, Asus menyertakan berbagai teknologi yang hanya terdapat pada produknya seperti SonicMaster, Instan On, juga Ice Cool.'),
('GDT100018', 5, 'Asus X450CA-WX243D', 4899000, 20, 10, 'asus-0718-46559-1-product.jpg', 'asus-0718-46559-1-product.jpg', 'Asus X450CA-WX243D hadir dengan desain yang kompak dan dikemas dengan layar berukuran 14". Dengan bobot di bawah 3 kg, Asus menyertakan berbagai teknologi yang hanya terdapat pada produknya seperti SonicMaster, Instan On, juga Ice Cool.'),
('GDT100019', 5, 'Asus X451CA-VX065D', 3499000, 26, 8, 'asus-4815-36459-1-product.jpg', 'asus-4815-36459-1-product.jpg', 'Desain yang tipis dan ramping membuat Asus X451CA-VX037D terlihat elegan dan juga tahan lama kapan pun dan dimana pun. Dilengkapi dengan fitur-fitur canggih dalam sebuah desain yang tipis, menjadi sangat cocok untuk kehidupan mobilitas yang tinggi, dan sangat mudah dibawa dengan desain yang terlihat premium.'),
('GDT100020', 5, 'Asus X451CA-VX067D', 4699000, 27, 6, 'asus-0725-56559-1-product.jpg', 'asus-0725-56559-1-product.jpg', 'Desain yang tipis dan ramping membuat Asus X451CA-VX067D terlihat elegan dan juga tahan lama kapan pun dan dimana pun. Dilengkapi dengan fitur-fitur canggih dalam sebuah desain yang tipis, menjadi sangat cocok untuk kehidupan mobilitas yang tinggi, dan sangat mudah dibawa dengan desain yang terlihat premium.'),
('GDT100021', 5, 'Asus X451CA-VX126D', 3999000, 22, 10, 'SPP.jpg', 'SPP.jpg', 'Desain yang tipis dan ramping membuat Asus X451CA-VX067D terlihat elegan dan juga tahan lama kapan pun dan dimana pun. Dilengkapi dengan fitur-fitur canggih dalam sebuah desain yang tipis, menjadi sangat cocok untuk kehidupan mobilitas yang tinggi, dan sangat mudah dibawa dengan desain yang terlihat premium.'),
('GDT100022', 10, 'Samsung Ativ 11" T1c 500', 8999000, 29, 2, 'samsung-1409-71378-1-product.jpg', 'samsung-1409-71378-1-product.jpg', 'Anda kini tak perlu lagi membawa laptop dan tablet Anda sekaligus karena Samsung menghadirkan produk dengan inovasi terbarunya, Samsung ATIV Smart PC yang mengakomodir kebutuhan dua perangkat tersebut. Produk yang berbasis sistem operasi Windows 8 ini menggabungkan kecanggihan dari laptop dan kenyamanan dari tablet. Anda kini dapat mengerjakan pekerjaan komputasi yang berat seperti membuat dokumen atau presentasi dengan fungsi laptopnya, atau menggunakan tablet untuk mendengarkan lagu, browsing internet ataupun menonton video. Samsung ATIV XE500T1C-H01ID Smart PC terdiri dari dua bagian yaitu tablet yang berfungsi juga sebagai layarnya berukuran 11.6" dan dock keyboard yang dapat dengan mudah dihubungkan oleh magnetik. Dengan Samsung ATIV Smart PC, mobilitas Anda tak akan terganggu dengan kinerja yang tetap optimal.'),
('GDT100023', 10, 'Samsung Galaxy Core', 2449000, 25, 8, 'samsung-7993-425431-1-product.jpg', 'samsung-7993-425431-1-product.jpg', 'Samsung kembali memberikan pilihan bagi Anda yang menginginkan smartphone Android dengan kinerja maksimal namun harga yang terjangkau. Samsung Galaxy Core mengusung sistem Dual SIM serta didukung sistem operasi Android terbaru Jelly Bean dan prosesor Dual Core. Dengan desain khas Samsung yang melengkung di sisi sampingnya dan dinamis, Samsung Galaxy Core dapat menjadi jawaban yang tepat atas kebutuhan komunikasi Anda.'),
('GDT100024', 10, 'Samsung Galaxy Fame GT-S6810', 1729000, 24, 7, 'samsung-5581-571921-1-product.jpg', 'samsung-5581-571921-1-product.jpg', 'Samsung Galaxy Fame S6810, smartphone mid-end dari Samsung memberikan Anda kemudahakan untuk tetap berkomunikasi dan eksis dengan keluarga dan teman. Didukung dengan layar berukuran 3.5", kamera 5 MP serta sistem Android 4.1 Jelly Bean, nikmati kemudahan berkomunikasi dengan Samsung Galaxy Fame S6810.'),
('GDT100025', 10, 'Samsung Galaxy Grand 2 Duos G7102', 4149000, 25, 6, 'samsung-1076-488031-1-product.jpg', 'samsung-1076-488031-1-product.jpg', 'Samsung memperkenalkan smartphone terbarunya Samsung Galaxy Grand 2 Duos yang hadir dengan layar sentuh berukuran 5.25 inci dengan resolusi HD 1280 x 720. \r\n\r\nDibekali dengan prosesor Quadcore 1.2 GHz Snapdragon serta memori RAM 1.5 GB untuk kemudahan melakukan berbagai pekerjaan dan hiburan multimedia. \r\n\r\nSamsung Galaxy Grand 2 Duos mendukung jaringan HSDPA 21 Mbps dan Wi-Fi untuk berinternet dengan cepat, serta Bluetooth v4.0 untuk terhubung dengan berbagai perangkat Bluetooth. Samsung Galaxy Grand 2 Duos dibekali dengan Dual SIM (Dual GSM ON) memudahkan anda dalam berkomunikasi.'),
('GDT100026', 10, 'Samsung Galaxy Grand 2 G7102', 3999000, 29, 2, 'samsung-0245-70679-1-product.jpg', 'samsung-0245-70679-1-product.jpg', 'Samsung memperkenalkan smartphone terbarunya Samsung Galaxy Grand 2 yang hadir dengan layar sentuh berukuran 5.25 inci. Dibekali dengan prosesor Quad-core 1.2 GHz serta memori RAM 1.5 GB untuk kemudahan melakukan berbagai pekerjaan dan hiburan multimedia. Samsung Galaxy Grand 2 mendukung jaringan HSDPA 21 Mbps dan Wi-Fi untuk berinternet dengan cepat, serta Bluetooth v4.0 dengan A2DP untuk terhubung dengan berbagai perangkat Bluetooth.'),
('GDT100027', 10, 'Samsung Galaxy Note 3', 7625000, 30, 1, 'samsung-8406-38357-1-product.jpg', 'samsung-8406-38357-1-product.jpg', 'Setelah lama ditunggu-tunggu, Samsung akhirnya merilis phablet andalah mereka, Samsung Galaxy Note 3. Nikmati multitasking lebih pintar dengan layar lebih besar dan lebih mudah dengan S Pen. Tampil dengan peningkatan yang siginifikan dari seri sebelumnya serta desain yang lebih slim dan elegan, lakukan lebih banyak dengan multasking bersama Samsung Galaxy Note 3.'),
('GDT100028', 10, 'Samsung Galaxy Note Pro 12.2', 10999000, 29, 2, 'samsung-2620-666221-1-product.jpg', 'samsung-2620-666221-1-product.jpg', 'Samsung GALAXY NotePro SM-P901 dengan layar mempesona berukuran 12.2" WQXGA TFT LCD dan fitur terkini seperti Enhanced Multi Window, e-Meeting, Air Command, Action Memo dan Pen Window akan melengkapi kebutuhan Anda akan multitasking yang cepat, mudah dan nyaman.'),
('GDT100029', 10, 'Samsung Galaxy S III Mini I8190', 2597900, 24, 7, 'samsung-8255-11705-1-product.jpg', 'samsung-8255-11705-1-product.jpg', 'Samsung kembali meluncurkan serian Mini dari jajaran smartphonenya. Kali ini, Samsung Galaxy S III memiliki versi mini dimana semua fitur yang sama terdapat dalam Samsung Galaxy SIII hanya ukuran layarnya yang berbeda. Samsung Galaxy S III Mini hadir dengan ukuran layar 4". Samsung Galaxy S III Mini dibekali prosesor Dual Core Cortex-A9 berkecepatan 1 GHz serta memori RAM 1 GB memberikan kemudahan bagi Anda dalam melakukan berbagai pekerjaan dan hiburan multimedia. Untuk urusan konektivitas, samrtphone ini didukung jaringan HSDPA 14.4 Mbps dan WiFi untuk berinternet dengan cepat, serta Bluetooth v4.0 dan DLNA untuk berbagi dengan perangkat lain. Smartphone bahkan juga tampil dengan fitur premium di Samsung Galaxy SIII yaitu fitur Pop-Up Play menjamin kelancaran multitasking sehingga memungkinkan Anda melakukan berbagai aktivitas secara bersamaan. Kini Anda dapat mendapatkan kehebatan yang sama pada Samsung Galaxy S III dengan harga yang lebih terjangkau dengan Samsung Galaxy S III Mini.'),
('GDT100030', 10, 'Samsung Galaxy S III Mini I8190', 2598900, 30, 1, 'samsung-4298-15515-1-product.jpg', 'samsung-4298-15515-1-product.jpg', 'Samsung kembali meluncurkan serian Mini dari jajaran smartphonenya. Kali ini, Samsung Galaxy S III memiliki versi mini dimana semua fitur yang sama terdapat dalam Samsung Galaxy SIII hanya ukuran layarnya yang berbeda. Samsung Galaxy S III Mini hadir dengan ukuran layar 4". Samsung Galaxy S III Mini dibekali prosesor Dual Core Cortex-A9 berkecepatan 1 GHz serta memori RAM 1 GB memberikan kemudahan bagi Anda dalam melakukan berbagai pekerjaan dan hiburan multimedia. Untuk urusan konektivitas, samrtphone ini didukung jaringan HSDPA 14.4 Mbps dan WiFi untuk berinternet dengan cepat, serta Bluetooth v4.0 dan DLNA untuk berbagi dengan perangkat lain. Smartphone bahkan juga tampil dengan fitur premium di Samsung Galaxy SIII yaitu fitur Pop-Up Play menjamin kelancaran multitasking sehingga memungkinkan Anda melakukan berbagai aktivitas secara bersamaan. Kini Anda dapat mendapatkan kehebatan yang sama pada Samsung Galaxy S III dengan harga yang lebih terjangkau dengan Samsung Galaxy S III Mini.'),
('GDT100031', 10, 'Samsung Galaxy S4 Zoom', 4999000, 28, 3, 'samsung-6031-532631-1-product.jpg', 'samsung-6031-532631-1-product.jpg', 'Samsung kembali mengumumkan varian lain dari keluarga Galaxy S4. Samsung Galaxy S4 Zoom jika dilihat seperti Galaxy S4 yang digabungkan dengan Galaxy Camera. Smartphone kamera ini memiliki fungsi seperti kamera digital pada umumnya namun selain berfungsi untuk membidik gambar juga dibekali dengan sistem Android terbaru Jelly Bean serta memiliki jaringan 3G dan Wi-Fi sehingga ketika Anda selesai mengambil gambar dengan kualitas tinggi, Anda dapat langsung mengedit di berbagai aplikasi fotografi di Android kemudian mempost-nya di berbagai situs sosial media.'),
('GDT100032', 10, 'Samsung Galaxy S4 Zoom C 101', 5499000, 30, 1, 'samsung-0891-10378-1-product.jpg', 'samsung-0891-10378-1-product.jpg', 'Samsung kembali mengumumkan varian lain dari keluarga Galaxy S4. Samsung Galaxy S4 Zoom jika dilihat seperti Galaxy S4 yang digabungkan dengan Galaxy Camera. Smartphone kamera ini memiliki fungsi seperti kamera digital pada umumnya namun selain berfungsi untuk membidik gambar juga dibekali dengan sistem Android terbaru Jelly Bean serta memiliki jaringan 3G dan Wi-Fi sehingga ketika Anda selesai mengambil gambar dengan kualitas tinggi, Anda dapat langsung mengedit di berbagai aplikasi fotografi di Android kemudian mempost-nya di berbagai situs sosial media.'),
('GDT100033', 10, 'Samsung Galaxy S5', 8199000, 29, 2, 'samsung-2934-469011-1-product.jpg', 'samsung-2934-469011-1-product.jpg', 'Sebagai perangkat Android besutan Korea yang paling ditunggu, Samsung Galaxy S5 tampil untuk memenuhi harapan Anda akan sebuah smartphone. Ponsel pintar Samsung Galaxy S5 akan membantu Anda untuk lebih dekat dan membidik momen menyenangkan dan favorit ketika bersama orang-orang tersayang. Samsung Galaxy S5 juga siap sebagai asisten pribadi Anda, tiap fitur didesain untuk memudahkan hidup Anda.'),
('GDT100034', 10, 'Samsung Galaxy Tab 3 10.1" P5200', 4669000, 30, 1, 'samsung-0436-17486-1-product.jpg', 'samsung-0436-17486-1-product.jpg', 'Jajaran Galaxy Tab kembali hadir dengan serian terbarunya, Samsung Galaxy Tab 3 10.1" P5200. Tablet ini tetap mengusung jaringan HSDPA sehingga memungkinkan Anda untuk melakukan panggilan telepon dan SMS. Mengusung sistem operasi 4.2 Jelly Bean dan prosesor Intel Dual Core, memudahkan Anda dalam menjalankan multitasking. Tampilan layar berkualitas HD dan kamera utama beresolusi 3 MP dan beberapa fitur terbaru seperti Samsung WatchOn semakin menambah daya tarik dari Samsung Galaxy Tab 3 10.1" P5200.'),
('GDT100035', 10, 'Samsung Galaxy Tab 3 Lite', 2385000, 30, 1, 'samsung-6901-331711-1-product.jpg', 'samsung-6901-331711-1-product.jpg', 'Jajaran Galaxy Tab kembali hadir dengan seri terbarunya, Samsung Galaxy Tab 3 Lite Wifi + 3G 7.0. Mengusung sistem operasi 4.2 Jelly Bean dan prosesor Dual Core, memudahkan Anda dalam menjalankan multitasking. Dengan beberapa fitur terbaru seperti Samsung WatchOn dan Multi window, semakin menambah daya tarik dari tablet Samsung ini.'),
('GDT100036', 10, 'Samsung Galaxy Y S5360', 841900, 24, 7, 'samsung-7377-82412-1-product.jpg', 'samsung-7377-82412-1-product.jpg', 'Samsung Galaxy Y, Android smartphone bagi Anda yang muda dan dinamis dengan fungsi yang menakjubkan namun tetap ringan, kompak dan stylish. Dilengkapi dengan fitur Social Hub, Quickoffice, Wi-Fi dan tampilan antar muka yang menarik, handphone ini lengkap akan fitur yang mendukung mobilitas Anda.'),
('GDT100037', 10, 'Samsung I9082 Galaxy Grand', 3399000, 30, 1, 'samsung-2156-931811-1-product.jpg', 'samsung-2156-931811-1-product.jpg', 'Samsung memperkenalkan smartphone terbarunya Samsung Galaxy Grand yang hadir dengan layar sentuh berukuran 5 inci. Dibekali dengan prosesor Dual-core 1.2 GHz serta memori RAM 1 GB untuk kemudahan melakukan berbagai pekerjaan dan hiburan multimedia. Samsung Galaxy Grand mendukung jaringan HSDPA 21 Mbps dan Wi-Fi untuk berinternet dengan cepat, serta Bluetooth v4.0 untuk terhubung dengan berbagai perangkat Bluetooth.'),
('GDT100038', 10, 'Samsung N900 Galaxy Note 3', 8499000, 30, 1, 'samsung-3191-689311-1-product.jpg', 'samsung-3191-689311-1-product.jpg', 'Setelah lama ditunggu-tunggu, Samsung akhirnya merilis phablet andalah mereka, Samsung Galaxy Note 3. Nikmati multitasking lebih pintar dengan layar lebih besar dan lebih mudah dengan S Pen. Tampil dengan peningkatan yang siginifikan dari seri sebelumnya serta desain yang lebih slim dan elegan, lakukan lebih banyak dengan multasking bersama Samsung Galaxy Note 3.'),
('GDT100039', 10, 'Samsung Note 8 N5100', 4875000, 29, 3, 'samsung-8680-415601-1-product.jpg', 'samsung-8680-415601-1-product.jpg', 'Samsung menghadirkan Samsung Galaxy Note 8.0 yang dirancang untuk menemani keseharian Anda. Melengkapi jajaran Samsung Galaxy Note, seri kali ini hadir dengan ukuran layar 8". Atur rencana ataupun jadwal Anda, tuangkan ide kreatif Anda melalui sketch dengan S Pen, ataupun lakukan berbagai aplikasi lainnya pada Galaxy Note 8.0. Dengan desain yang slim dan S Pen yang multifungsi, Samsung Galaxy Note 8.0, begitu tepat untuk menemani Anda.'),
('GDT100040', 10, 'Samsung P5100 Galaxy Tab II', 4999000, 29, 2, 'samsung-8998-42549-1-product.jpg', 'samsung-8998-42549-1-product.jpg', 'Samsung Galaxy Tab 2 10.1 memberikan pengalaman yang untuk tetap produktif namun juga kaya akan fitur multimedia. Kualitas layar HD yang lebih tajam, browsing web dengan flash dan multitasking yang lebih baik dan bahkan kecepatan yang lebih baik dengan HSPA+. Tablet ini menjadi pilihan yang ideal bagi para profesional!'),
('GDT100041', 10, 'Samsung Star Pro Duos S7262', 1224000, 16, 15, 'samsung-6320-889531-1-product.jpg', 'samsung-6320-889531-1-product.jpg', 'Samsung Galaxy Star Pro adalah penerus galaxy star yang berdimensi lebih besar dan spesifikasi lebih baik luar dalam dari pendahulunya. Smartphone android samsung GT-S7262 mengunakan dua slot untuk simcard.'),
('GDT100042', 10, 'Samsung P5200 Galaxy Tab 3', 4998000, 29, 2, 'samsung-6562-25087-1-product.jpg', 'samsung-6562-25087-1-product.jpg', 'Samsung Galaxy Tab 2 10.1 memberikan pengalaman yang untuk tetap produktif namun juga kaya akan fitur multimedia. Kualitas layar HD yang lebih tajam, browsing web dengan flash dan multitasking yang lebih baik dan bahkan kecepatan yang lebih baik dengan HSPA+. Tablet ini menjadi pilihan yang ideal bagi para profesional!');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_transaksi_detail` (
  `kode_transaksi_detail` int(50) NOT NULL AUTO_INCREMENT,
  `kode_transaksi` bigint(150) NOT NULL,
  `id_produk` varchar(50) NOT NULL,
  `nama_produk` varchar(150) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `jumlah` int(10) NOT NULL,
  PRIMARY KEY (`kode_transaksi_detail`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbl_transaksi_detail`
--

INSERT INTO `tbl_transaksi_detail` (`kode_transaksi_detail`, `kode_transaksi`, `id_produk`, `nama_produk`, `harga`, `jumlah`) VALUES
(1, 20140520001, 'GDT100018', 'Asus X450CA-WX243D', '4899000', 1),
(2, 20140522001, 'GDT100029', 'Samsung Galaxy S III Mini I8190', '2597900', 5),
(3, 20140525001, 'GDT100018', 'Asus X450CA-WX243D', '4899000', 1),
(4, 20140525002, 'GDT100026', 'Samsung Galaxy Grand 2 G7102', '3999000', 1),
(5, 20140526001, 'GDT100041', 'Samsung Star Pro Duos S7262', '1224000', 5),
(6, 20140605001, 'GDT100020', 'Asus X451CA-VX067D', '4699000', 1),
(7, 20140605003, 'GDT100009', 'ASUS Transformer Book i5', '16799000', 1),
(8, 20140605004, 'GDT100003', 'ASUS A450LC-WX052D', '8445000', 1),
(9, 20140605149, 'GDT100008', 'ASUS S551LB-CJ131H', '9850000', 1),
(10, 20140605150, 'GDT100018', 'Asus X450CA-WX243D', '4899000', 1),
(11, 20140605151, 'GDT100018', 'Asus X450CA-WX243D', '4899000', 1),
(12, 20140605152, 'GDT100040', 'Samsung P5100 Galaxy Tab II', '4999000', 1),
(13, 20140605153, 'GDT100022', 'Samsung Ativ 11', '8999000', 1),
(14, 20140605154, 'GDT100033', 'Samsung Galaxy S5', '8199000', 1),
(15, 20140605155, 'GDT100029', 'Samsung Galaxy S III Mini I8190', '2597900', 1),
(16, 20140605156, 'GDT100042', 'Samsung P5200 Galaxy Tab 3', '4998000', 1),
(17, 20140605158, 'GDT100041', 'Samsung Star Pro Duos S7262', '1224000', 1),
(18, 20140605159, 'GDT100041', 'Samsung Star Pro Duos S7262', '1224000', 1),
(19, 20140605160, 'GDT100041', 'Samsung Star Pro Duos S7262', '1224000', 1),
(20, 20140730001, 'GDT100018', 'Asus X450CA-WX243D', '4899000', 1),
(21, 20150217001, 'GDT100031', 'Samsung Galaxy S4 Zoom', '4999000', 1),
(22, 20150217002, 'GDT100031', 'Samsung Galaxy S4 Zoom', '4999000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi_header`
--

CREATE TABLE IF NOT EXISTS `tbl_transaksi_header` (
  `kode_transaksi` bigint(150) NOT NULL,
  `kode_user` int(20) NOT NULL,
  `nama_penerima` varchar(150) NOT NULL,
  `email_penerima` varchar(150) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `propinsi` varchar(150) NOT NULL,
  `kota` varchar(150) NOT NULL,
  `kodepos` varchar(100) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `metode` varchar(50) NOT NULL,
  `paket_kirim` varchar(10) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  PRIMARY KEY (`kode_transaksi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaksi_header`
--

INSERT INTO `tbl_transaksi_header` (`kode_transaksi`, `kode_user`, `nama_penerima`, `email_penerima`, `alamat_penerima`, `propinsi`, `kota`, `kodepos`, `telepon`, `metode`, `paket_kirim`, `bank`, `pesan`) VALUES
(20140520001, 11, 'amanda', 'amanda@yahoo.com', 'Jember', 'Jawa Timur', 'Jember', '68172', '12345', 'Setoran Tunai, Transfer Bank', 'TIKI', 'Bank Central Asia - No. Rek 1800658299', '-'),
(20140522001, 11, 'amanda', 'amanda@yahoo.com', 'Jember', 'Jawa Timur', 'Jember', '68172', '12345', 'Setoran Tunai, Transfer Bank', 'TIKI', 'Bank Central Asia - No. Rek 1800658299', '-'),
(20140525001, 11, 'amanda', 'amanda@yahoo.com', 'Jember', 'Jawa Timur', 'Jember', '68172', '12345', 'Setoran Tunai, Transfer Bank', 'TIKI', 'Bank Central Asia - No. Rek 1800658299', '-'),
(20140525002, 11, 'amanda', 'amanda@yahoo.com', 'Jember', 'Jawa Timur', 'Jember', '68172', '12345', 'Setoran Tunai, Transfer Bank', 'TIKI', 'Bank Central Asia - No. Rek 1800658299', '-'),
(20140526001, 11, 'amanda', 'amanda@yahoo.com', 'Jember', 'Jawa Timur', 'Jember', '68172', '12345', 'Setoran Tunai, Transfer Bank', 'TIKI', 'Bank Central Asia - No. Rek 1800658299', '-'),
(20140605001, 5, 'Ronny Fernando', 'ronny@gmail.com', 'Ambulu', 'Jawa Timur', 'Jember', '68172', '12345', 'Setoran Tunai, Transfer Bank', 'TIKI', 'Bank Central Asia - No. Rek 1800658299', 'Thanks !'),
(20140605002, 5, 'Ronny Fernando', 'ronny@gmail.com', 'Ambulu', 'Jawa Timur', 'Jember', '68172', '12345', 'Setoran Tunai, Transfer Bank', 'TIKI', 'Bank Central Asia - No. Rek 1800658299', 'Thanks !'),
(20140605003, 5, 'Ronny Fernando', 'ronny@gmail.com', 'Ambulu', 'Jawa Timur', 'Jember', '68172', '12345', 'Setoran Tunai, Transfer Bank', 'TIKI', 'Bank Central Asia - No. Rek 1800658299', '-'),
(20140605004, 5, 'Ronny Fernando', 'ronny@gmail.com', 'Ambulu', 'Jawa Timur', 'Jember', '68172', '12345', 'Setoran Tunai, Transfer Bank', 'TIKI', 'Bank Central Asia - No. Rek 1800658299', '-'),
(20140605005, 5, 'Ronny Fernando', 'ronny@gmail.com', 'Ambulu', 'Jawa Timur', 'Jember', '68172', '12345', 'Setoran Tunai, Transfer Bank', 'TIKI', 'Bank Central Asia - No. Rek 1800658299', '-'),
(20140605006, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605007, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605008, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605009, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605010, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605011, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605012, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605013, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605014, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605015, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605016, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605017, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605018, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605019, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605020, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605021, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605022, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605023, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605024, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605025, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605026, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605027, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605028, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605029, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605030, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605031, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605032, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605033, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605034, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605035, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605036, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605037, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605038, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605039, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605040, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605041, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605042, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605043, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605044, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605045, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605046, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605047, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605048, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605049, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605050, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605051, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605052, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605053, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605054, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605055, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605056, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605057, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605058, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605059, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605060, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605061, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605062, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605063, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605064, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605065, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605066, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605067, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605068, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605069, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605070, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605071, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605072, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605073, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605074, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605075, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605076, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605077, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605078, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605079, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605080, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605081, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605082, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605083, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605084, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605085, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605086, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605087, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605088, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605089, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605090, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605091, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605092, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605093, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605094, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605095, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605096, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605097, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605098, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605099, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605100, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605101, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605102, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605103, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605104, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605105, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605106, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605107, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605108, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605109, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605110, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605111, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605112, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605113, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605114, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605115, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605116, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605117, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605118, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605119, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605120, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605121, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605122, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605123, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605124, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605125, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605126, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605127, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605128, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605129, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605130, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605131, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605132, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605133, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605134, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605135, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605136, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605137, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605138, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605139, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605140, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605141, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605142, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605143, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605144, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605145, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605146, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605147, 5, '', '', '', '', '', '', '', '', '', '', '-'),
(20140605148, 5, 'Ronny Fernando', 'ronny@gmail.com', 'Ambulu', 'Jawa Timur', 'Jember', '68172', '12345', 'Setoran Tunai, Transfer Bank', 'TIKI', 'Bank Central Asia - No. Rek 1800658299', '-'),
(20140605149, 5, 'Ronny Fernando', 'ronny@gmail.com', 'Ambulu', 'Jawa Timur', 'Jember', '68172', '12345', 'Setoran Tunai, Transfer Bank', 'TIKI', 'Bank Central Asia - No. Rek 1800658299', '-'),
(20140605150, 5, 'Ronny Fernando', 'ronny@gmail.com', 'Ambulu', 'Jawa Timur', 'Jember', '68172', '12345', 'Setoran Tunai, Transfer Bank', 'TIKI', 'Bank Central Asia - No. Rek 1800658299', '-'),
(20140605151, 5, 'Ronny Fernando', 'ronny@gmail.com', 'Ambulu', 'Jawa Timur', 'Jember', '68172', '12345', 'Setoran Tunai, Transfer Bank', 'TIKI', 'Bank Central Asia - No. Rek 1800658299', '-'),
(20140605152, 5, 'Ronny Fernando', 'ronny@gmail.com', 'Ambulu', 'Jawa Timur', 'Jember', '68172', '12345', 'Setoran Tunai, Transfer Bank', 'TIKI', 'Bank Central Asia - No. Rek 1800658299', '-'),
(20140605153, 5, 'Ronny Fernando', 'ronny@gmail.com', 'Ambulu', 'Jawa Timur', 'Jember', '68172', '12345', 'Setoran Tunai, Transfer Bank', 'TIKI', 'Bank Central Asia - No. Rek 1800658299', '-'),
(20140605154, 5, 'Ronny Fernando', 'ronny@gmail.com', 'Ambulu', 'Jawa Timur', 'Jember', '68172', '12345', 'Setoran Tunai, Transfer Bank', 'TIKI', 'Bank Central Asia - No. Rek 1800658299', '-'),
(20140605155, 5, 'Ronny Fernando', 'ronny@gmail.com', 'Ambulu', 'Jawa Timur', 'Jember', '68172', '12345', 'Setoran Tunai, Transfer Bank', 'TIKI', 'Bank Central Asia - No. Rek 1800658299', '-'),
(20140605156, 5, 'Ronny Fernando', 'ronny@gmail.com', 'Ambulu', 'Jawa Timur', 'Jember', '68172', '12345', 'Setoran Tunai, Transfer Bank', 'TIKI', 'Bank Central Asia - No. Rek 1800658299', '-'),
(20140605157, 5, 'Ronny Fernando', 'ronny@gmail.com', 'Ambulu', 'Jawa Timur', 'Jember', '68172', '12345', 'Setoran Tunai, Transfer Bank', 'TIKI', 'Bank Central Asia - No. Rek 1800658299', '-'),
(20140605158, 5, 'Ronny Fernando', 'ronny@gmail.com', 'Ambulu', 'Jawa Timur', 'Jember', '68172', '12345', 'Setoran Tunai, Transfer Bank', 'TIKI', 'Bank Central Asia - No. Rek 1800658299', '-'),
(20140605159, 5, 'Ronny Fernando', 'ronny@gmail.com', 'Ambulu', 'Jawa Timur', 'Jember', '68172', '12345', 'Setoran Tunai, Transfer Bank', 'TIKI', 'Bank Central Asia - No. Rek 1800658299', '-'),
(20140605160, 5, 'Ronny Fernando', 'ronny@gmail.com', 'Ambulu', 'Jawa Timur', 'Jember', '68172', '12345', 'Setoran Tunai, Transfer Bank', 'TIKI', 'Bank Central Asia - No. Rek 1800658299', '-'),
(20140730001, 5, 'Ronny Fernando', 'ronny@gmail.com', 'Ambulu', 'Jawa Timur', 'Jember', '68172', '12345', 'Setoran Tunai, Transfer Bank', 'TIKI', 'Bank Central Asia - No. Rek 1800658299', '-'),
(20150217001, 5, 'Ronny Fernando', 'ronny@gmail.com', 'Ambulu', 'Jawa Timur', 'Jember', '68172', '12345', 'Setoran Tunai, Transfer Bank', 'TIKI', 'Bank Central Asia - No. Rek 1800658299', '-'),
(20150217002, 5, 'Ronny Fernando', 'ronny@gmail.com', 'Ambulu', 'Jawa Timur', 'Jember', '68172', '12345', 'Setoran Tunai, Transfer Bank', 'TIKI', 'Bank Central Asia - No. Rek 1800658299', '-');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_nama` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `propinsi` varchar(200) NOT NULL,
  `kota` varchar(200) NOT NULL,
  `kode_pos` varchar(30) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `user_username`, `user_password`, `email`, `alamat`, `telepon`, `propinsi`, `kota`, `kode_pos`, `tgl_lahir`, `status`) VALUES
(5, 'Ronny Fernando', 'ronny', 'fbd1e8ec877eab04ff4f3395d5fb2372', 'ronny@gmail.com', 'Ambulu', '12345', 'Jawa Timur', 'Jember', '68172', '26-7-1994', '1'),
(6, 'Richy Kusuma Midiarso', 'richy', '18b76913adb62216df0e7a66f3295663', 'richy@live.com', 'Silir', '12345', 'Jawa Timur', 'Jember', '68172', '7-8-1993', '1'),
(7, 'Alfian Bagus Aristiawan', 'alfian', '64fc0802fbae681ee55a9a4b87f0aec7', 'alfian@yahoo.co.id', 'Wuluhan', '12345', 'Jawa Timur', 'Jember', '68172', '1-7-1994', '1'),
(8, 'Desy Nofitasari', 'desy', '77f12c3dfcc7ed31b914b58f3ba8fcea', 'desy@yahoo.co.id', 'Banyuwangi', '12345', 'Jawa Timur', 'Jember', '68172', '17-12-1993', '1'),
(9, 'Dwi Arga Praditya', 'arga', 'c28147ca62523c7582790a7d64ee311c', 'arga@yahoo.com', 'Jember', '12345', 'Jawa Timur', 'Jember', '68172', '25-6-1993', '1'),
(11, 'amanda', 'amanda', '6209804952225ab3d14348307b5a4a27', 'amanda@yahoo.com', 'Jember', '12345', 'Jawa Timur', 'Jember', '68172', '16-8-1990', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jul 2022 pada 23.44
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dealermobil-v1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bank`
--

CREATE TABLE `tbl_bank` (
  `bank_id` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_bank`
--

INSERT INTO `tbl_bank` (`bank_id`, `nama_bank`) VALUES
(1, 'BCA'),
(2, 'BRI'),
(3, 'BNI'),
(4, 'MANDIRI'),
(5, 'BSI'),
(6, 'PERMATA'),
(7, 'BUKOPIN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_body_type`
--

CREATE TABLE `tbl_body_type` (
  `body_type_id` int(11) NOT NULL,
  `body_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_body_type`
--

INSERT INTO `tbl_body_type` (`body_type_id`, `body_type_name`) VALUES
(1, 'Convertible'),
(2, 'Coupe'),
(3, 'Crossover'),
(4, 'Hatchback'),
(5, 'Minivan'),
(6, 'Passenger/Cargo Vans'),
(7, 'Sedan'),
(8, 'SUV'),
(9, 'Truck'),
(10, 'Wagon');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id_booking` int(11) NOT NULL,
  `pembeli_id` varchar(20) NOT NULL,
  `pembooking` varchar(200) NOT NULL,
  `nope` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `penjual` varchar(200) NOT NULL,
  `pembayaran` varchar(200) NOT NULL,
  `car_id` int(11) NOT NULL,
  `mobil` varchar(200) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `lama_cicil` varchar(20) NOT NULL,
  `lama_book` varchar(20) NOT NULL,
  `bukti_pembayaran` text DEFAULT NULL,
  `status` varchar(200) DEFAULT 'Menunggu Konfirmasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_booking`
--

INSERT INTO `tbl_booking` (`id_booking`, `pembeli_id`, `pembooking`, `nope`, `email`, `penjual`, `pembayaran`, `car_id`, `mobil`, `nama_bank`, `lama_cicil`, `lama_book`, `bukti_pembayaran`, `status`) VALUES
(26, '55767', 'pembeli', '081357849637', 'pembeli@gmail.com', '61893', 'Manual', 25, 'Honda Brio', 'BCA', '-', '3 Hari', 'uploads/bukti_pembayaran/1658950021_ktp.jpg', 'Terverifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`) VALUES
(1, 'Mitsubishi'),
(2, 'Nissan'),
(3, 'Datsun'),
(4, 'Suzuki'),
(5, 'Mazda'),
(6, 'Daihatsu'),
(8, 'Honda'),
(10, 'Toyota'),
(13, 'Isuzu'),
(14, 'KIA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_car`
--

CREATE TABLE `tbl_car` (
  `car_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  `country` varchar(255) NOT NULL,
  `map` text NOT NULL,
  `car_category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `body_type_id` int(11) NOT NULL,
  `fuel_type_id` int(11) NOT NULL,
  `transmission_type_id` int(11) NOT NULL,
  `vin` varchar(255) NOT NULL,
  `car_condition` varchar(10) NOT NULL,
  `engine` varchar(100) NOT NULL,
  `engine_size` varchar(100) NOT NULL,
  `exterior_color` varchar(100) NOT NULL,
  `interior_color` varchar(100) NOT NULL,
  `seat` varchar(100) NOT NULL,
  `door` varchar(100) NOT NULL,
  `top_speed` varchar(100) NOT NULL,
  `kilometer` varchar(100) NOT NULL,
  `mileage` varchar(100) NOT NULL,
  `year` int(4) NOT NULL,
  `warranty` varchar(100) NOT NULL,
  `featured_photo` varchar(255) NOT NULL,
  `regular_price` varchar(20) NOT NULL,
  `sale_price` varchar(20) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `availability_status` varchar(100) DEFAULT 'Tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_car`
--

INSERT INTO `tbl_car` (`car_id`, `title`, `description`, `address`, `city`, `state`, `zip_code`, `country`, `map`, `car_category_id`, `brand_id`, `model_id`, `body_type_id`, `fuel_type_id`, `transmission_type_id`, `vin`, `car_condition`, `engine`, `engine_size`, `exterior_color`, `interior_color`, `seat`, `door`, `top_speed`, `kilometer`, `mileage`, `year`, `warranty`, `featured_photo`, `regular_price`, `sale_price`, `seller_id`, `status`, `availability_status`) VALUES
(24, 'Honda Jazz', 'Plat Nomor : Genap\r\nKondisi : Terawat', 'Pare', 'Kediri', 'Jawa Timur', '445555', 'Indonesia', '<div style=\"width: 100%\"><iframe width=\"100%\" height=\"600\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" src=\"https://maps.google.com/maps?width=100%25&height=600&hl=en&q=Pare%20Kediri+(Map)&t=&z=14&ie=UTF8&iwloc=B&output=embed\"><a href=\"https://www.maps.ie/distance-area-calculator.html\">measure distance on map</a></iframe></div>', 2, 8, 1, 4, 2, 2, '8000', 'Old Car', 'Mesin W', '1500', 'Abu-abu', 'Hitam', '4', '5', '1500', '160000', '10km/liter', 2017, '1', '24.jpg', '90', '80', 61893, 1, 'Tersedia'),
(25, 'Honda Brio', 'Plat Nomor : Ganjil\r\nKondisi : Terawat', 'Pare', 'Kediri', 'Jatim', '44444', 'Indonesia', '', 0, 8, 17, 4, 2, 2, '8001', 'Old Car', 'Mesin V', '1200', 'Jingga Metalik', 'Hitam', '4', '4', '1200', '34551', '10km/liter', 2018, '2', '25.jpg', '180', '171', 61893, 1, 'Tersedia'),
(26, 'Toyota Yaris', 'Plat Nomor : Genap\r\nKondisi : Terawat', 'Pare', 'Kediri', 'Jatim', '44444', 'Indonesia', '', 2, 10, 18, 4, 2, 2, '8002', 'Old Car', 'Mesin W', '1500', 'Merah Metalik', 'Hitam', '4', '4', '1500', '57016', '12km/liter', 2017, '2', '26.jpg', '198', '190', 61893, 1, 'Tersedia'),
(27, 'Mitsubishi XPANDER', 'Plat Nomor : Ganjil\r\nKondisi : Terawat', 'Pare', 'Kediri', 'Jatim', '44444', 'Indonesia', '', 1, 1, 15, 1, 2, 2, '8003', 'Old Car', 'Mesin W', '1500', 'Merah', 'Hitam', '6', '4', '1500', '42028', '15km/liter', 2019, '1', '27.jpg', '236', '230', 61893, 1, 'Tersedia'),
(28, 'Toyota Avanza G', '\r\nPlat Nomor : Genap\r\nKondisi : Terawat', 'Pare', 'Kediri', 'Jatim', '44444', 'Indonesia', '', 1, 10, 2, 3, 2, 2, '8004', 'Old Car', 'Mesin V', '1500', 'Silver Metalik', 'Coklat', '6', '5', '1500', '8379', '15km/liter', 2021, '2', '28.jpg', '246', '239', 61893, 1, 'Tersedia'),
(29, 'Daihatsu SIGRA R', '\r\nPlat Nomor : Genap\r\nKondisi : Terawat', 'Pare', 'Kediri', 'Jatim', '44444', 'Indonesia', '', 4, 6, 5, 3, 2, 2, '8005', 'Old Car', 'Mesin S', '1200', 'Hitam Metalik', 'Hitam', '6', '4', '1200', '19062', '16km/liter', 2020, '3', '29.jpg', '135', '130', 61893, 1, 'Tersedia'),
(30, 'Mitsubishi PAJERO SPORT', 'Plat Nomor : Ganjil\r\nKondisi : Terawat\r\n', 'Pare', 'Kediri', 'Jawa Timur', '', 'Indonesia', '', 5, 1, 8, 1, 2, 2, '8006', 'Old Car', 'Mesin V', '2500', 'Abu Metalik', 'Coklat', '6', '4', '2500', '53983', '12km/liter', 2018, '2', '30.jpg', '469', '450', 61893, 1, 'Tersedia'),
(31, 'Honda CR-V TURBO', 'Plat Nomor : Ganjil\r\nKondisi : Terawat', 'Pare', 'Kediri', 'Jawa Timur', '44444', 'Indonesia', '', 1, 8, 9, 3, 2, 2, '8007', 'Old Car', 'Mesin Q', '1500', 'Abu Metalik', 'Hitam', '4', '4', '1500', '61120', '14km/liter', 2018, '1', '31.jpg', '453', '445', 61893, 1, 'Tersedia'),
(32, 'Toyota FORTUNER VRZ', 'Plat Nomor : Ganjil\r\nKondisi : Terawat\r\n', 'Pare', 'Kediri', 'Jatim', '44444', 'Indonesia', '', 13, 10, 7, 1, 2, 2, '8008', 'Old Car', 'Mesin B', '2400', 'Hitam', 'Hitam', '4', '4', '2400', '38481', '17km/liter', 2019, '2', '32.jpg', '506', '498', 61893, 1, 'Tersedia'),
(33, 'Daihatsu TERIOS R', 'Plat Nomor : Ganjil\r\nKondisi : Terawat\r\n', 'Pare', 'Kediri', 'Jatim', '44444', 'Indonesia', '', 1, 6, 16, 1, 2, 1, '8009', 'Old Car', 'Mesin X', '1500', 'Silver Metalik', 'Putih', '56', '4', '1500', '44653', '10km/liter', 2019, '1', '33.jpg', '215', '209', 61893, 1, 'Tersedia'),
(34, 'Toyota FORTUNER VRZ', 'Plat Nomor : Ganjil\r\nKondisi : Terawat\r\n', 'Pare', 'Kediri', 'Jatim', '44444', 'Indonesia', '', 13, 10, 7, 1, 2, 2, '8008', 'Old Car', 'Mesin B', '2400', 'Hitam', 'Hitam', '4', '4', '2400', '38481', '17km/liter', 2019, '2', '34.jpg', '506', '498', 61893, 1, 'Tersedia'),
(35, 'Kia SPORTAGE SE', 'Plat Nomor : Ganjil\r\nKondisi : Terawat', 'Pare', 'Kediri', 'Jatim', '44444', 'Indonesia', '', 13, 14, 14, 1, 2, 1, '8010', 'Old Car', 'Mesin E', '2000', 'Silver Metalik', 'Coklat', '4', '5', '2000', '43737', '14km/liter', 2012, '', '35.jpg', '123', '117', 61893, 1, 'Tersedia'),
(36, 'Honda HR-V E PRESTIGE', 'Plat Nomor : Ganjil\r\nKondisi : Terawat', 'Pare', 'Kediri', 'Jatim', '44444', 'Indonesia', '', 1, 8, 10, 3, 2, 2, '', 'Old Car', 'Mesin S', '1800', 'Hitam Metalik', 'Hitam', '4', '5', '1800', '22587', '14km/liter', 2021, '2', '36.jpg', '395', '388', 61893, 1, 'Tersedia'),
(37, 'Honda ACCORD TURBO', 'Plat Nomor : Genap\r\nKondisi : Terawat', 'Pare', 'Kediri', 'Jatim', '44444', 'Indonesia', '', 7, 8, 36, 7, 2, 2, '8011', 'Old Car', 'Mesin SS', '1500', 'Hitam Metalik', 'Silver', '4', '4', '1500', '45599', '11km/liter', 2019, '1', '37.jpg', '586', '580', 61893, 1, 'Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_car_category`
--

CREATE TABLE `tbl_car_category` (
  `car_category_id` int(11) NOT NULL,
  `car_category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_car_category`
--

INSERT INTO `tbl_car_category` (`car_category_id`, `car_category_name`) VALUES
(1, 'Crossover'),
(2, 'Hatchback'),
(3, 'Electric'),
(4, 'Family'),
(5, 'Jeep'),
(6, 'Hybrid'),
(7, 'Sedan'),
(8, 'MPV'),
(9, 'SUV'),
(10, 'Off Road'),
(12, 'Sport'),
(13, 'LCGC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_car_photo`
--

CREATE TABLE `tbl_car_photo` (
  `car_photo_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_car_photo`
--

INSERT INTO `tbl_car_photo` (`car_photo_id`, `photo`, `car_id`) VALUES
(51, '51.jpg', 24),
(52, '52.jpg', 25),
(53, '53.jpg', 26),
(54, '54.jpg', 27),
(55, '55.jpg', 28),
(56, '56.jpg', 29),
(57, '57.jpg', 30),
(58, '58.jpg', 31),
(59, '59.jpg', 32),
(60, '60.jpg', 33),
(61, '61.jpg', 34),
(62, '62.jpg', 35),
(63, '63.jpg', 36),
(64, '64.jpg', 37);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_slug`, `meta_title`, `meta_keyword`, `meta_description`) VALUES
(1, 'Mobil Bekas', 'komersil', 'Komersil', '', ''),
(2, 'Mobil Bekas', 'perumahan', 'Perumahan', '', ''),
(3, 'Ekonomi', 'ekonomi', 'Ekonomi', '', ''),
(4, 'Mobil Bekas', 'spare-part-dan-alat', 'Spare Part Dan Alat', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL,
  `code_body` text NOT NULL,
  `code_main` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `code_body`, `code_main`) VALUES
(1, '<div id=\"fb-root\"></div>\r\n<script>(function(d, s, id) {\r\n  var js, fjs = d.getElementsByTagName(s)[0];\r\n  if (d.getElementById(id)) return;\r\n  js = d.createElement(s); js.id = id;\r\n  js.src = \"//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=323620764400430\";\r\n  fjs.parentNode.insertBefore(js, fjs);\r\n}(document, \'script\', \'facebook-jssdk\'));</script>', '<div class=\"fb-comments\" data-href=\"https://developers.facebook.com/docs/plugins/comments#configurator\" data-numposts=\"5\"></div>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_credit`
--

CREATE TABLE `tbl_credit` (
  `id` int(255) NOT NULL,
  `pembelian_id` int(11) DEFAULT NULL,
  `nama_mobil` text NOT NULL,
  `harga_mobil` varchar(255) NOT NULL,
  `cicilan` varchar(255) NOT NULL,
  `bunga` varchar(255) NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  `lama_cicilan` varchar(255) NOT NULL,
  `pembeli_id` varchar(255) NOT NULL,
  `down_payment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_credit_items`
--

CREATE TABLE `tbl_credit_items` (
  `id` int(11) NOT NULL,
  `credit_id` int(11) DEFAULT NULL,
  `pembelian_id` int(11) DEFAULT NULL,
  `nominal` int(11) DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `bukti_pembayaran` text DEFAULT NULL,
  `status` varchar(100) DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `faq_id` int(11) NOT NULL,
  `faq_title` varchar(255) NOT NULL,
  `faq_content` text NOT NULL,
  `faq_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_faq`
--

INSERT INTO `tbl_faq` (`faq_id`, `faq_title`, `faq_content`, `faq_category_id`) VALUES
(1, 'Question Title 1', '<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n', 1),
(2, 'Question Title 2', '<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n', 1),
(3, 'Question Title 3', '<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n', 2),
(4, 'Question Title 4', '<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n', 2),
(5, 'Question Title 5', '<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n', 2),
(6, 'Question Title 6', '<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n', 3),
(7, 'Question Title 7', '<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n', 3),
(8, 'Question Title 8', '<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_faq_category`
--

CREATE TABLE `tbl_faq_category` (
  `faq_category_id` int(11) NOT NULL,
  `faq_category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_faq_category`
--

INSERT INTO `tbl_faq_category` (`faq_category_id`, `faq_category_name`) VALUES
(1, 'Pertanyaan Umum'),
(2, 'Tanggapan Pembeli'),
(3, 'Pertanyaan Teknis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_file`
--

CREATE TABLE `tbl_file` (
  `file_id` int(11) NOT NULL,
  `file_title` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_file`
--

INSERT INTO `tbl_file` (`file_id`, `file_title`, `file_name`) VALUES
(2, 'search', 'file-2.jpg'),
(3, 'testimonial', 'file-3.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_fuel_type`
--

CREATE TABLE `tbl_fuel_type` (
  `fuel_type_id` int(11) NOT NULL,
  `fuel_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_fuel_type`
--

INSERT INTO `tbl_fuel_type` (`fuel_type_id`, `fuel_type_name`) VALUES
(1, 'Solar'),
(2, 'Bensin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `menu_id` int(11) NOT NULL,
  `menu_type` varchar(255) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `category_or_page_slug` varchar(255) NOT NULL,
  `menu_order` int(11) NOT NULL,
  `menu_parent` int(11) NOT NULL,
  `menu_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`menu_id`, `menu_type`, `menu_name`, `category_or_page_slug`, `menu_order`, `menu_parent`, `menu_url`) VALUES
(46, 'Page', 'Mobil', 'mobil-lama', 2, 0, '#'),
(48, 'PageOld', 'Mobil Bekas', 'mobil-lama', 44, 0, ''),
(49, 'Page', 'Berita\r\n', 'blog', 3, 0, ''),
(51, 'PageOld', 'Harga', 'harga', 6, 0, ''),
(54, 'Other', 'Beranda', '', 1, 0, 'index.php');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_metode`
--

CREATE TABLE `tbl_metode` (
  `id` int(11) NOT NULL,
  `me_pembayaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_metode`
--

INSERT INTO `tbl_metode` (`id`, `me_pembayaran`) VALUES
(1, 'Manual'),
(3, 'Midtrans');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_model`
--

CREATE TABLE `tbl_model` (
  `model_id` int(11) NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_model`
--

INSERT INTO `tbl_model` (`model_id`, `model_name`, `brand_id`) VALUES
(1, 'Jazz', 8),
(2, 'Avanza', 10),
(3, 'Xpander', 1),
(4, 'Kijang Innova', 10),
(5, 'Sigra', 6),
(6, 'Calya', 10),
(7, 'Fortuner', 10),
(8, 'New Pajero Sport', 1),
(9, 'CRV', 8),
(10, 'HRV', 8),
(11, 'Rush', 10),
(12, 'Seltos', 14),
(13, 'XL7', 4),
(14, 'Sportage', 14),
(15, 'Xpander Cross', 1),
(16, 'Terios', 6),
(17, 'Brio', 8),
(18, 'Yaris', 10),
(19, 'Guilia', 2),
(20, 'GTV6', 2),
(21, 'Milano', 2),
(22, 'Spider', 2),
(23, 'Hummer', 3),
(24, 'DB11', 4),
(25, 'DB7', 4),
(26, 'DB9', 4),
(27, 'DBS', 4),
(28, 'Rapide', 4),
(29, 'Rapide S', 4),
(30, 'V12 Vanquish', 4),
(31, 'V12 Vantage', 4),
(32, 'V12 Vantage S', 4),
(33, 'V8 Vantage', 4),
(34, 'Vanquish', 4),
(35, 'Virage', 4),
(36, '100', 5),
(37, '200', 5),
(38, '4000', 5),
(39, '5000', 5),
(40, '80', 5),
(41, '90', 5),
(42, 'A3', 5),
(43, 'A3 Sportback e-tron', 5),
(44, 'A4', 5),
(45, 'A4 Allroad', 5),
(46, 'A5', 5),
(47, 'A5 Sportback', 5),
(48, 'A6', 5),
(49, 'A7', 5),
(50, 'A8', 5),
(51, 'A8 L', 5),
(52, 'Allroad Quattro', 5),
(53, 'Cabriolet', 5),
(54, 'Coupe', 5),
(55, 'Q3', 5),
(56, 'Q5', 5),
(57, 'Q5 Hybrid', 5),
(58, 'Q7', 5),
(59, 'R8', 5),
(60, 'RS 3', 5),
(61, 'RS 4', 5),
(62, 'RS 5', 5),
(63, 'RS 6', 5),
(64, 'RS 7', 5),
(65, 'S3', 5),
(66, 'S4', 5),
(67, 'S5', 5),
(68, 'S5 Sportback', 5),
(69, 'S6', 5),
(70, 'S7', 5),
(71, 'S8', 5),
(72, 'SQ5', 5),
(73, 'TT', 5),
(74, 'TT RS', 5),
(75, 'TTS', 5),
(76, 'V8', 5),
(77, '1 Series', 6),
(78, '2 Series', 6),
(79, '3 Series', 6),
(80, '4 Series', 6),
(81, '5 Series', 6),
(82, '6 Series', 6),
(83, '7 Series', 6),
(84, '8 Series', 6),
(85, 'ActiveE', 6),
(86, 'i3', 6),
(87, 'i8', 6),
(88, 'M', 6),
(89, 'M2', 6),
(90, 'M3', 6),
(91, 'M4', 6),
(92, 'M5', 6),
(93, 'M6', 6),
(94, 'X1', 6),
(95, 'X3', 6),
(96, 'X4', 6),
(97, 'X5', 6),
(98, 'X5 M', 6),
(99, 'X6', 6),
(100, 'X6 M', 6),
(101, 'Z3', 6),
(102, 'Z4', 5),
(103, 'Z4 M', 6),
(104, 'Z8', 6),
(105, 'G80', 7),
(106, 'G90', 7),
(107, 'Accord', 8),
(108, 'Accord Hybrid', 8),
(109, 'Accord Plug-in', 8),
(110, 'Civic', 8),
(111, 'Civic CRX', 8),
(112, 'Civic Del sol', 8),
(113, 'Clarity Fuel Cell', 8),
(114, 'CR-V', 8),
(115, 'CR-Z', 8),
(116, 'Crosstour', 8),
(117, 'Element', 8),
(118, 'FCX Clarity', 8),
(119, 'Fit Fit EV', 8),
(120, 'HR-V', 8),
(121, 'Insight', 8),
(122, 'Odyssey', 8),
(123, 'Passport', 8),
(124, 'Pilot', 8),
(125, 'Prelude', 8),
(126, 'Ridgeline', 8),
(127, 'S2000', 8),
(128, 'Aventador', 9),
(129, 'Diablo', 9),
(130, 'Gallardo', 9),
(131, 'Huracan', 9),
(132, 'Murcielago', 9),
(133, 'RAV4', 10),
(134, 'Camry', 10),
(135, 'Corolla Altis', 10),
(136, 'w1w1w1', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_news`
--

CREATE TABLE `tbl_news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `news_slug` varchar(255) NOT NULL,
  `news_content` text NOT NULL,
  `news_date` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT 1,
  `publisher` varchar(255) NOT NULL,
  `total_view` int(11) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `news_title`, `news_slug`, `news_content`, `news_date`, `photo`, `category_id`, `publisher`, `total_view`, `meta_title`, `meta_keyword`, `meta_description`) VALUES
(4, 'Kian Murah, Cek Harga Mobil Toyota Kijang Innova Bekas Maret 2022 MOBIL BEKAS', 'mobil-bekas-1-1', '<p>Toyota Kijang Innova&nbsp;dijual dengan harga yang cukup terjangkau dan menggoda. Termurah dibanderol cuma Rp87 juta, cocok bagi Anda yang tengah mencari mobil keluarga dengan kabin luas.&nbsp;</p>\r\n\r\n<p>Toyota Kijang Innova&nbsp;<a href=\"https://www.mobil123.com/mobil-baru-dijual/toyota/kijang-innova/indonesia\">&nbsp;</a>hadir di Indonesia melalui PT Toyota Astra Motor (TAM). Mobil keluarga ini meluncur perdana pada 2004 menggantikan generasi sebelumnya yang dikenal dengan sebutan Kijang kapsul.&nbsp;</p>\r\n\r\n<p>Sampai sekarang mobil ini tetap menjadi pilihan masyarakat Indonesia.&nbsp;</p>\r\n\r\n<p>TAM terakhir kali menyegarkan tampilan eksterior dan interior Kijang Innova pada 2020. Penyegaran yang dilakukan oleh TAM terhadap salah satu produk unggulannya itu menyesuaikan dengan kebutuhan konsumen masa kini.</p>\r\n', '26-07-2022', 'news-4.png', 4, 'Jony', 10, 'Id pro unum pertinax oportere vel', '', ''),
(6, 'All New HR-V Meluncur, Simak Harga Bekasnya', 'mobil-bekas-1-1', '<p>Honda HR-V generasi pertama dijual di Jepang dan beberapa negara di Asia Pasifik mulai 1998 hingga 2006. Lalu generasi keduanya mulai di jual di Amerika, Brasil, Australia, dan beberapa negara di Asia sejak 2015.</p>\r\n\r\n<p>Generasi kedua HR-V mulai diperkenalkan di Indonesia dalam pameran otomotif IIMS 2014, dan mulai dipasarkan secara resmi di Indonesia oleh PT Honda Prospect Motor (HPM) pada 24 Januari 2015.</p>\r\n\r\n<p>Saat itu HR-V tersedia dalam dua pilihan mesin, yaitu 1.5L dan 1.8L, yang masing-masing mampu menghasilkan tenaga sebesar 118-137 hp, cukup lumayan untuk mobil jenis SUV.&nbsp;</p>\r\n\r\n<p>Hadir dengan 4 pilihan tipe, yaitu A, S, E dan Prestige, versi facelift dari HR-V diluncurkan di Indonesia dalam acara GIIAS 2018.</p>\r\n\r\n<p>Nah, jika Anda mengincar unit bekas produksi tahun 2015-2018, itu&nbsp;bisa menjadi pilihan untuk memiliki mobil seken keren.</p>\r\n\r\n<p>Harga bekasnya cukup menggiurkan, berdasarkan penelusuran, harga termurah dari Honda HR-V ada di angka Rp 174 jutaan. Harga tersebut adalah untuk HR-V tipe 1.5 S lansiran 2017.</p>\r\n', '11-07-2022', 'news-6.png', 4, 'Wisnu', 10, 'Omnes ornatus qui et te aeterno', '', ''),
(8, 'Honda Brio Bekas Mulai Rp 90 Jutaan, Cocok Buat Mudik Lebaran Nanti', 'mobil-bekas-1-1', '<p>Ya, Honda Brio&nbsp;merupakan mobil hatchback yang populer di kalangan keluarga baru. Walaupun berdimensi kecil, mobil ini mampu dimasuki 5 orang dan ruang bagasinya luas, cocok untuk liburan keluarga atau mudik.</p>\r\n\r\n<p>Untuk harganya juga sangat bersahabat. Dengan adanya program diskon PPnBM untuk mobil LCGC dari pemerintah, banderol harga yang disematkan pada mobil Brio juga semakin murah.</p>\r\n\r\n<p>Contohnya saja untuk Brio Satya varian terendah memiliki harga&nbsp;<em>on the road</em>&nbsp;(OTR) Jakarta mulai dari Rp153,7 juta, dan Brio RS bernilai mulai dari Rp196,4 juta.</p>\r\n\r\n<p>Jika melihat harga Brio terbaru yang sangat terjangkau, tentunya varian bekasnya akan semakin murah lagi.</p>\r\n\r\n<p>Berdasarkan pantauan pada listing mobil bekas.&nbsp;terdapat iklan-iklan yang menjual Brio bekas dengan harga 40-50% lebih murah dari harga varian terbarunya.</p>\r\n\r\n<p>Sangat menarik bukan, memiliki mobil dengan harga terjangkau dan menunjukkannya kepada keluarga di kampung halaman saat mudik?</p>\r\n', '25-07-2022', 'news-8.png', 2, 'Dony', 10, 'Liber utroque vim an ne his brute', '', ''),
(9, 'Sudah Pensiun, Harga Honda Jazz Bekas mulai Rp80 Jutaan', 'mobil-bekas-1', '<p>Meskipun Honda Jazz sudah berhenti diproduksi sejak Februari 2021 lalu, namun harga bekas mobil yang bermain di segmen hatchback ini masih terpantau stabil. Bahkan menurut banyak diler mobil bekas, unit Honda Jazz tak sedikit jadi incaran masyarakat.</p>\r\n\r\n<p>Honda Jazz di Indonesia sendiri telah hadir selama 18 tahun sebelum kiprahnya berhenti dan digantikan oleh suksesornya, City Hatchback yang dianggap lebih sporty.&nbsp;</p>\r\n\r\n<p>Namun, harga baru City Hatchback yang masih dianggap kurang terjangkau oleh banyak orang menjadi alasan mengapa masyarakat banyak yang belum bisa &quot;move on&quot; dari Jazz.</p>\r\n\r\n<p>Memang Jazz bisa dibilang cukup sering tampak berseliweran di jalan raya, namun beberapa diler menyatakan sulit mencari unit&nbsp;yang kondisinya masih segar dan orisinal. Hal ini karena&nbsp; kebanyakan pemilik Honda Jazz adalah anak muda yang&nbsp;gemar memodifikasi mobilnya.</p>\r\n\r\n<p>Tak heran, sejak peluncurannya di Indonesia pada 2003, Honda Jazz jadi mobil idaman anak muda dan berhasil merebut hati masyarakat. Selain bodinya yang stylish, mobil yang juga bernama Fit ini juga dipersenjatai dengan mesin dan interior yang apik.</p>\r\n\r\n<p>Honda Jazz pertama kali masuk Indonesia dengan status impor&nbsp;utuh atau CBU&nbsp;dari&nbsp;Thailand.</p>\r\n', '27-07-2022', 'news-9.png', 1, 'Dony', 12, 'Nostrum copiosae argumentum has', '', ''),
(10, 'Daihatsu Sirion Facelift sudah Meluncur, Intip Harga Versi Bekasnya', 'mobil-bekas-1-1', '<p>PT Astra Daihatsu Motor&nbsp;(ADM) baru saja meluncurkan Sirion facelift&nbsp;Harga jualnya berada di angka Rp200 juta-an. Tetapi,&nbsp;jika melirik Sirion versi bekas harganya sangat menggoda, ada yang dibanderol jauh di bawah Rp200 juta.&nbsp;</p>\r\n\r\n<p>Daihatsu Sirion facelift resmi diluncurkan pada Kamis&nbsp;(3/6/2022) kemarin di salah satu mal ternama&nbsp;di Serpong, Tangerang.</p>\r\n\r\n<p>Terdapat dua varian Sirion facelift yang diniagakan, yaitu 1.3 X CVT dan 1.3 R CVT.</p>\r\n\r\n<p>Kendaraan yang bermain di segmen city car ini&nbsp;mengalami pembaruan di beberapa bagian, seperti tampilan luar, interior, sistem transmisi hingga penambahan&nbsp;fitur.</p>\r\n\r\n<p>Oleh karena beberapa pembaruan ini, harga yang disematkan pada Sirion teranyar&nbsp;jadi meningkat. Berikut&nbsp;banderol&nbsp;on the road Jakarta Daihatsu Sirion facelift.</p>\r\n\r\n<ul>\r\n	<li>New Sirion R CVT Rp236,8 juta</li>\r\n	<li>New Sirion X CVT Rp227,6 juta.</li>\r\n</ul>\r\n', '23-07-2022', 'news-10.png', 1, 'Tony', 10, 'An labores explicari qui eu', '', ''),
(11, 'Model Baru Meluncur, Harga Suzuki Ertiga Bekas Lebih Terjangkau', 'mobil-bekas', '<p>Model terbaru dari Suzuki Ertiga baru saja meluncur, banderolnya mulai&nbsp;Rp220&nbsp;juta-an sampai Rp290&nbsp;juta-an. Lantas berapa harga Ertiga versi bekas? Pastinya jauh lebih terjangkau.</p>\r\n\r\n<p>Total ada tujuh varian yang diniagakan, tiga di antaranya non-hybrid yaitu&nbsp;GA-MT, GL-MT, dan GL-AT. Sedangkan sisanya, seperti GX Hybrid-MT, GX Hybrid-AT, Suzuki Sport (SS) Hybrid-MT, dan SS Hybrid-AT, sudah dibekali teknologi&nbsp;mild hybrid atau Suzuki menyebutnya&nbsp;Smart Hybrid Vehicle by Suzuki (SHVS).</p>\r\n\r\n<p>Berikut rincian harga on the road (OTR) Jakarta&nbsp;dari masing-masing varian Ertiga facelift.</p>\r\n\r\n<ul>\r\n	<li>GA MT Rp224,1 juta</li>\r\n	<li>GL MT&nbsp;Rp244,5 juta</li>\r\n	<li>GL AT&nbsp;Rp255,1 juta</li>\r\n	<li>GX Hybrid MT&nbsp;Rp270,3 juta</li>\r\n	<li>GX Hybrid AT&nbsp;Rp281,3 juta</li>\r\n	<li>SS Hybrid MT&nbsp;Rp281,3 juta</li>\r\n	<li>SS&nbsp;Hybrid AT Rp292,3 juta.</li>\r\n</ul>\r\n', '13-07-2022', 'news-11.png', 1, 'Tony', 22, 'Lorem ipsum dolor sit amet', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_page`
--

CREATE TABLE `tbl_page` (
  `page_id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `page_slug` varchar(255) NOT NULL,
  `page_content` text NOT NULL,
  `page_layout` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_page`
--

INSERT INTO `tbl_page` (`page_id`, `page_name`, `page_slug`, `page_content`, `page_layout`, `banner`, `status`, `meta_title`, `meta_keyword`, `meta_description`) VALUES
(1, 'Tentang Kami', 'tentang-kami', '<p>Ini adalah sistem penjualan mobil berbasis web yang menyajikan berbagai macam mobil pilihan dari para penjual mobil di seluruh Indonesia.&nbsp;</p>\r\n', 'Full Width Page Layout', 'page-banner-1.jpg', 'Active', 'Tentang Kami - Dealer Mobil', '', ''),
(2, 'Hubungi Kami', 'hubungi-kami', '', 'Contact Us Page Layout', 'page-banner-2.jpg', 'Active', 'Hubungi Kami - Dealer Mobil', '', ''),
(9, 'Berita', 'blog', '', 'Blog Page Layout', 'page-banner-9.png', 'Active', 'Berita - Dealer Mobil', '', ''),
(13, 'Mobil Bekas', 'mobil-lama', '', 'Old Car Page Layout', 'page-banner-13.png', 'Active', 'Mobil Bekas - Dealer Mobil', '', ''),
(15, 'Harga Paket', 'harga', '', 'Pricing Page Layout', 'page-banner-15.jpg', 'Active', 'Harga - Dealer Mobil', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `payment_date` varchar(20) NOT NULL,
  `expire_date` varchar(20) NOT NULL,
  `txnid` varchar(255) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `pricing_plan_id` int(11) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `bukti_pembayaran` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `seller_id`, `payment_date`, `expire_date`, `txnid`, `paid_amount`, `pricing_plan_id`, `payment_status`, `payment_id`, `bukti_pembayaran`) VALUES
(1, 10, '2017-12-17', '2022-12-27', '3VW96364K6934123M', 10, 1, 'Completed', '1513472506', NULL),
(2, 10, '2017-12-30', '2018-01-09', '74G405774B946000A', 10, 1, 'Completed', '1513476596', NULL),
(3, 10, '2017-12-01', '2017-12-11', '', 10, 1, 'Pending', '1513478974', NULL),
(6, 6, '2017-12-17', '2022-12-27', '1G785796W6728403S', 10, 1, 'Completed', '1513487537', NULL),
(16, 61893, '2022-07-27', '2022-08-06', '', 100000, 1, 'Completed', '1658933594', 'uploads/bukti_pembayaran/1658933594_Feedback-PNG-Picture.png'),
(15, 71213, '2022-07-24', '2022-08-13', '', 20, 2, 'Completed', '1658627527', 'uploads/bukti_pembayaran/1658627527_bukti-tf2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_payment_pembeli`
--

CREATE TABLE `tbl_payment_pembeli` (
  `id` int(11) NOT NULL,
  `pembeli_id` int(11) NOT NULL,
  `payment_date` varchar(20) NOT NULL,
  `expire_date` varchar(20) NOT NULL,
  `txnid` varchar(255) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `pricing_plan_id` int(11) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `payment_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_payment_pembeli`
--

INSERT INTO `tbl_payment_pembeli` (`id`, `pembeli_id`, `payment_date`, `expire_date`, `txnid`, `paid_amount`, `pricing_plan_id`, `payment_status`, `payment_id`) VALUES
(1, 0, '2017-12-17', '2022-12-27', '3VW96364K6934123M', 10, 1, 'Completed', '1513472506'),
(2, 10, '2017-12-30', '2018-01-09', '74G405774B946000A', 10, 1, 'Completed', '1513476596'),
(3, 10, '2017-12-01', '2017-12-11', '', 10, 1, 'Pending', '1513478974'),
(4, 6, '2017-12-17', '2017-12-27', '', 10, 1, 'Pending', '1513483925'),
(5, 6, '2017-12-17', '2017-12-27', '', 10, 1, 'Pending', '1513487335'),
(6, 6, '2017-12-17', '2017-12-27', '1G785796W6728403S', 10, 1, 'Completed', '1513487537'),
(7, 6, '2018-02-01', '2018-02-11', '', 10, 1, 'Pending', '1513679014'),
(8, 0, '2022-06-27', '2022-07-07', '', 10, 1, 'Pending', '1656336339'),
(9, 0, '2022-06-27', '2022-07-17', '', 20, 2, 'Pending', '1656336498'),
(10, 0, '2022-06-27', '2022-07-07', '', 10, 1, 'Pending', '1656336532');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembeli`
--

CREATE TABLE `tbl_pembeli` (
  `pembeli_id` int(11) NOT NULL,
  `pembeli_name` varchar(100) NOT NULL,
  `pembeli_email` varchar(100) NOT NULL,
  `pembeli_phone` varchar(100) NOT NULL,
  `pembeli_address` text NOT NULL,
  `pembeli_city` varchar(255) NOT NULL,
  `pembeli_state` varchar(255) NOT NULL,
  `pembeli_country` varchar(255) NOT NULL,
  `pembeli_ktp` text DEFAULT NULL,
  `pembeli_password` varchar(255) NOT NULL,
  `pembeli_token` varchar(255) NOT NULL,
  `pembeli_time` varchar(255) NOT NULL,
  `pembeli_access` int(11) NOT NULL,
  `pembeli_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pembeli`
--

INSERT INTO `tbl_pembeli` (`pembeli_id`, `pembeli_name`, `pembeli_email`, `pembeli_phone`, `pembeli_address`, `pembeli_city`, `pembeli_state`, `pembeli_country`, `pembeli_ktp`, `pembeli_password`, `pembeli_token`, `pembeli_time`, `pembeli_access`, `pembeli_status`) VALUES
(55767, 'pembeli', 'pembeli@gmail.com', '081357849637', 'Pare', 'Kediri', 'Jatim', 'Indonesia', 'uploads/data_ktp/1658949244_ktp.jpg', '81dc9bdb52d04dc20036dbd8313ed055', 'ffa06554332663305d00b9882828068d', '1658949244', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id_booking` int(11) NOT NULL,
  `pembeli_id` varchar(20) NOT NULL,
  `pembooking` varchar(200) NOT NULL,
  `nope` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `penjual` varchar(200) NOT NULL,
  `pembayaran` varchar(200) NOT NULL,
  `car_id` int(11) DEFAULT NULL,
  `mobil` varchar(200) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `lama_cicil` varchar(20) NOT NULL,
  `bukti_pembayaran` text DEFAULT NULL,
  `status` varchar(200) DEFAULT 'Menunggu Konfirmasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`id_booking`, `pembeli_id`, `pembooking`, `nope`, `email`, `penjual`, `pembayaran`, `car_id`, `mobil`, `nama_bank`, `lama_cicil`, `bukti_pembayaran`, `status`) VALUES
(23, '55767', 'pembeli', '081357849637', 'pembeli@gmail.com', '61893', 'Tunai', 25, 'Honda Brio', 'BCA', '0 Tahun', 'uploads/bukti_pembayaran/1658950064_bg zoom.jpg', 'Terverifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pricing_plan`
--

CREATE TABLE `tbl_pricing_plan` (
  `pricing_plan_id` int(11) NOT NULL,
  `pricing_plan_name` varchar(255) NOT NULL,
  `pricing_plan_price` varchar(20) NOT NULL,
  `pricing_plan_day` varchar(100) NOT NULL,
  `pricing_plan_item_allow` varchar(10) NOT NULL,
  `pricing_plan_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pricing_plan`
--

INSERT INTO `tbl_pricing_plan` (`pricing_plan_id`, `pricing_plan_name`, `pricing_plan_price`, `pricing_plan_day`, `pricing_plan_item_allow`, `pricing_plan_description`) VALUES
(1, 'Basic', '100000', '10', '20', '<p>Lama Sewa 10 Hari</p>\r\n\r\n<p>Jumlah Maksimal Upload 20 Mobil</p>\r\n'),
(2, 'Gold', '200000', '20', '40', '<p>Lama Sewa 20 Hari</p>\r\n\r\n<p>Jumlah Maksimal Upload 40 Mobil</p>\r\n'),
(3, 'Platinum', '300000', '30', '60', '<p>Lama Sewa 30 Hari</p>\r\n\r\n<p>Jumlah Maksimal Upload 60 Mobil</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_seller`
--

CREATE TABLE `tbl_seller` (
  `seller_id` int(11) NOT NULL,
  `seller_name` varchar(100) NOT NULL,
  `seller_email` varchar(100) NOT NULL,
  `seller_phone` varchar(100) NOT NULL,
  `seller_address` text NOT NULL,
  `seller_city` varchar(255) NOT NULL,
  `seller_state` varchar(255) NOT NULL,
  `seller_country` varchar(255) NOT NULL,
  `seller_ktp` text DEFAULT NULL,
  `seller_password` varchar(255) NOT NULL,
  `seller_token` varchar(255) NOT NULL,
  `seller_time` varchar(255) NOT NULL,
  `seller_access` int(11) NOT NULL,
  `seller_status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_seller`
--

INSERT INTO `tbl_seller` (`seller_id`, `seller_name`, `seller_email`, `seller_phone`, `seller_address`, `seller_city`, `seller_state`, `seller_country`, `seller_ktp`, `seller_password`, `seller_token`, `seller_time`, `seller_access`, `seller_status`) VALUES
(61893, 'penjual', 'penjual@gmail.com', '085233794526', 'Pare Kediri', 'Kediri', 'Jawa Timur', 'Indonesia', 'uploads/data_ktp/1658931569_bg zoom.jpg', '81dc9bdb52d04dc20036dbd8313ed055', '05eac6603c2c8b0d133d6417ad1b97a6', '1658931569', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `footer_about` text NOT NULL,
  `footer_copyright` text NOT NULL,
  `contact_address` text NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `contact_fax` varchar(255) NOT NULL,
  `contact_map_iframe` text NOT NULL,
  `receive_email` varchar(255) NOT NULL,
  `receive_email_subject` varchar(255) NOT NULL,
  `receive_email_thank_you_message` text NOT NULL,
  `seller_email_subject` varchar(255) NOT NULL,
  `seller_email_thank_you_message` text NOT NULL,
  `forget_password_message` text NOT NULL,
  `total_recent_news_footer` int(10) NOT NULL,
  `total_popular_news_footer` int(10) NOT NULL,
  `total_recent_news_sidebar` int(11) NOT NULL,
  `total_popular_news_sidebar` int(11) NOT NULL,
  `total_recent_news_home_page` int(11) NOT NULL,
  `meta_title_home` text NOT NULL,
  `meta_keyword_home` text NOT NULL,
  `meta_description_home` text NOT NULL,
  `banner_login` varchar(255) NOT NULL,
  `banner_registration` varchar(255) NOT NULL,
  `banner_forget_password` varchar(255) NOT NULL,
  `banner_blog` varchar(255) NOT NULL,
  `banner_car` varchar(255) NOT NULL,
  `banner_search` varchar(255) NOT NULL,
  `search_title` varchar(255) NOT NULL,
  `search_photo` varchar(255) NOT NULL,
  `testimonial_photo` varchar(255) NOT NULL,
  `newsletter_text` text NOT NULL,
  `mod_rewrite` varchar(10) NOT NULL,
  `paypal_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `logo`, `favicon`, `footer_about`, `footer_copyright`, `contact_address`, `contact_email`, `contact_phone`, `contact_fax`, `contact_map_iframe`, `receive_email`, `receive_email_subject`, `receive_email_thank_you_message`, `seller_email_subject`, `seller_email_thank_you_message`, `forget_password_message`, `total_recent_news_footer`, `total_popular_news_footer`, `total_recent_news_sidebar`, `total_popular_news_sidebar`, `total_recent_news_home_page`, `meta_title_home`, `meta_keyword_home`, `meta_description_home`, `banner_login`, `banner_registration`, `banner_forget_password`, `banner_blog`, `banner_car`, `banner_search`, `search_title`, `search_photo`, `testimonial_photo`, `newsletter_text`, `mod_rewrite`, `paypal_email`) VALUES
(1, 'logo3.png', 'favicon.png', '<p>Marketplace Jual Beli Mobil Bekas Termurah Dan Terpercaya Se-Indonesia</p>\r\n', 'Copyright DT Auto Cars © 2022. All Rights Reserved.', 'Dsn Sumbersari, Jl. Patimura Desa Jabang, Kec Kras, Kab Kediri, 64172', 'dtautocars@gmail.com', '6285233794526', '6285233794526', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387142.84040262736!2d-74.25819605476612!3d40.70583158628177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbd!4v1485712851643\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'dtautocars@gmail.com', 'Pesan Email Pengunjung', 'Terimakasih Sudah Mengirim Pesan Kepada Kami.', 'DT Auto Cars - Bagian Pesan Penjual', 'Emailmu berhasil terkirim !', 'Link konfirmasi sudah dikirim ke email anda. Kamu akan mendapatkan password untuk setel ulang kata sandi.', 3, 3, 4, 4, 7, 'DT Auto Cars - Marketplace Mobil Bekas Terpercaya', 'auto, automotive, car, cab, truck, car listing, car directory, car selling, finance, car business, inventory, car rent, old car, used car, new car', 'DT Auto Cars - Marketplace Mobil Bekas Terpercaya', 'banner_login.jpg', 'banner_registration.jpg', 'banner_forget_password.jpg', 'banner_blog.jpg', 'banner_car.jpg', 'banner_search.jpg', 'DT Auto Cars - Marketplace Mobil Bekas Terpercaya', 'search.jpg', 'testimonial.png', 'Silahkan Masukkan Email Anda Untuk Mendapatkan Kabar Terbaru Dari Kami Ya', 'Off', 'tony@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_social`
--

CREATE TABLE `tbl_social` (
  `social_id` int(11) NOT NULL,
  `social_name` varchar(30) NOT NULL,
  `social_url` varchar(255) NOT NULL,
  `social_icon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_social`
--

INSERT INTO `tbl_social` (`social_id`, `social_name`, `social_url`, `social_icon`) VALUES
(1, 'Facebook', '#', 'fa fa-facebook'),
(2, 'Twitter', '#', 'fa fa-twitter'),
(3, 'LinkedIn', '#', 'fa fa-linkedin'),
(4, 'Google Plus', '#', 'fa fa-google-plus'),
(5, 'Pinterest', '#', 'fa fa-pinterest'),
(6, 'YouTube', '', 'fa fa-youtube'),
(7, 'Instagram', '', 'fa fa-instagram'),
(8, 'Tumblr', '', 'fa fa-tumblr'),
(9, 'Flickr', '', 'fa fa-flickr'),
(10, 'Reddit', '', 'fa fa-reddit'),
(11, 'Snapchat', '', 'fa fa-snapchat'),
(12, 'WhatsApp', '', 'fa fa-whatsapp'),
(13, 'Quora', '', 'fa fa-quora'),
(14, 'StumbleUpon', '', 'fa fa-stumbleupon'),
(15, 'Delicious', '', 'fa fa-delicious'),
(16, 'Digg', '', 'fa fa-digg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_subscriber`
--

CREATE TABLE `tbl_subscriber` (
  `subs_id` int(11) NOT NULL,
  `subs_email` varchar(255) NOT NULL,
  `subs_date` varchar(100) NOT NULL,
  `subs_date_time` varchar(100) NOT NULL,
  `subs_hash` varchar(255) NOT NULL,
  `subs_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_subscriber`
--

INSERT INTO `tbl_subscriber` (`subs_id`, `subs_email`, `subs_date`, `subs_date_time`, `subs_hash`, `subs_active`) VALUES
(4, 'jbbr.1990@gmail.com', '2017-08-10', '2017-08-10 07:44:23', '', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_testdrive`
--

CREATE TABLE `tbl_testdrive` (
  `id_testdrive` int(11) NOT NULL,
  `pembeli_id` varchar(20) NOT NULL,
  `pengaju` varchar(200) NOT NULL,
  `nope` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `penjual` varchar(200) NOT NULL,
  `lokasi` varchar(200) NOT NULL,
  `mobil` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Menunggu Persetujuan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_testimonial`
--

CREATE TABLE `tbl_testimonial` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_testimonial`
--

INSERT INTO `tbl_testimonial` (`id`, `name`, `designation`, `company`, `photo`, `comment`) VALUES
(1, 'Ahmad Nurhuda', 'Direktur', 'PT Maju Jaya Abadi', 'testimonial-1.jpeg', 'Mantap pelayanan dan kualitasnya terbaik.'),
(2, 'Leo Wijaya', 'Digital Marketer', 'SS Multimedia', 'testimonial-2.jpg', 'Mantap... Mobilnya keren walaupun second'),
(3, 'Andre Gus Asrori', 'Karyawan Bank', 'PT Lentera Abadi', 'testimonial-3.jpg', 'sesuai sama ekspektasi.. nggak nyesel beli disini'),
(4, 'Joelyan Vicky', 'SPV', 'PT Informatika Nusantara', 'testimonial-4.jpg', 'Best Seller !! Terbaik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tipe`
--

CREATE TABLE `tbl_tipe` (
  `id` int(11) NOT NULL,
  `tipe_pembelian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_tipe`
--

INSERT INTO `tbl_tipe` (`id`, `tipe_pembelian`) VALUES
(1, 'Lunas'),
(2, 'Kredit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transmission_type`
--

CREATE TABLE `tbl_transmission_type` (
  `transmission_type_id` int(11) NOT NULL,
  `transmission_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_transmission_type`
--

INSERT INTO `tbl_transmission_type` (`transmission_type_id`, `transmission_type_name`) VALUES
(1, 'Manual'),
(2, 'Otomatis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tunai`
--

CREATE TABLE `tbl_tunai` (
  `id` int(11) NOT NULL,
  `id_pembeli` varchar(255) DEFAULT NULL,
  `total_bayar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_tunai`
--

INSERT INTO `tbl_tunai` (`id`, `id_pembeli`, `total_bayar`) VALUES
(18, '55767', '171000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `full_name`, `email`, `phone`, `password`, `photo`, `role`, `status`) VALUES
(1, 'Tony', 'tony1234@gmail.com', '6285233794526', '81dc9bdb52d04dc20036dbd8313ed055', 'user-1.jpg', 'Super Admin', 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_waktu_booking`
--

CREATE TABLE `tbl_waktu_booking` (
  `id` int(11) NOT NULL,
  `lama_booking` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_waktu_booking`
--

INSERT INTO `tbl_waktu_booking` (`id`, `lama_booking`) VALUES
(1, '1 Hari'),
(2, '2 Hari'),
(3, '3 Hari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_waktu_cicilan`
--

CREATE TABLE `tbl_waktu_cicilan` (
  `id` int(11) NOT NULL,
  `lama_cicilan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_waktu_cicilan`
--

INSERT INTO `tbl_waktu_cicilan` (`id`, `lama_cicilan`) VALUES
(1, '1 Tahun'),
(2, '2 Tahun'),
(3, '3 Tahun');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_bank`
--
ALTER TABLE `tbl_bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indeks untuk tabel `tbl_body_type`
--
ALTER TABLE `tbl_body_type`
  ADD PRIMARY KEY (`body_type_id`);

--
-- Indeks untuk tabel `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indeks untuk tabel `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indeks untuk tabel `tbl_car`
--
ALTER TABLE `tbl_car`
  ADD PRIMARY KEY (`car_id`);

--
-- Indeks untuk tabel `tbl_car_category`
--
ALTER TABLE `tbl_car_category`
  ADD PRIMARY KEY (`car_category_id`);

--
-- Indeks untuk tabel `tbl_car_photo`
--
ALTER TABLE `tbl_car_photo`
  ADD PRIMARY KEY (`car_photo_id`);

--
-- Indeks untuk tabel `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_credit`
--
ALTER TABLE `tbl_credit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_credit_items`
--
ALTER TABLE `tbl_credit_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indeks untuk tabel `tbl_faq_category`
--
ALTER TABLE `tbl_faq_category`
  ADD PRIMARY KEY (`faq_category_id`);

--
-- Indeks untuk tabel `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD PRIMARY KEY (`file_id`);

--
-- Indeks untuk tabel `tbl_fuel_type`
--
ALTER TABLE `tbl_fuel_type`
  ADD PRIMARY KEY (`fuel_type_id`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indeks untuk tabel `tbl_metode`
--
ALTER TABLE `tbl_metode`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_model`
--
ALTER TABLE `tbl_model`
  ADD PRIMARY KEY (`model_id`);

--
-- Indeks untuk tabel `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indeks untuk tabel `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`page_id`);

--
-- Indeks untuk tabel `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_payment_pembeli`
--
ALTER TABLE `tbl_payment_pembeli`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indeks untuk tabel `tbl_pricing_plan`
--
ALTER TABLE `tbl_pricing_plan`
  ADD PRIMARY KEY (`pricing_plan_id`);

--
-- Indeks untuk tabel `tbl_seller`
--
ALTER TABLE `tbl_seller`
  ADD PRIMARY KEY (`seller_id`);

--
-- Indeks untuk tabel `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`social_id`);

--
-- Indeks untuk tabel `tbl_subscriber`
--
ALTER TABLE `tbl_subscriber`
  ADD PRIMARY KEY (`subs_id`);

--
-- Indeks untuk tabel `tbl_testdrive`
--
ALTER TABLE `tbl_testdrive`
  ADD PRIMARY KEY (`id_testdrive`);

--
-- Indeks untuk tabel `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_tipe`
--
ALTER TABLE `tbl_tipe`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_transmission_type`
--
ALTER TABLE `tbl_transmission_type`
  ADD PRIMARY KEY (`transmission_type_id`);

--
-- Indeks untuk tabel `tbl_tunai`
--
ALTER TABLE `tbl_tunai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_waktu_booking`
--
ALTER TABLE `tbl_waktu_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_waktu_cicilan`
--
ALTER TABLE `tbl_waktu_cicilan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_bank`
--
ALTER TABLE `tbl_bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_body_type`
--
ALTER TABLE `tbl_body_type`
  MODIFY `body_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_car`
--
ALTER TABLE `tbl_car`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tbl_car_category`
--
ALTER TABLE `tbl_car_category`
  MODIFY `car_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_car_photo`
--
ALTER TABLE `tbl_car_photo`
  MODIFY `car_photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_credit`
--
ALTER TABLE `tbl_credit`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tbl_credit_items`
--
ALTER TABLE `tbl_credit_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_faq_category`
--
ALTER TABLE `tbl_faq_category`
  MODIFY `faq_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_file`
--
ALTER TABLE `tbl_file`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_fuel_type`
--
ALTER TABLE `tbl_fuel_type`
  MODIFY `fuel_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `tbl_metode`
--
ALTER TABLE `tbl_metode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_model`
--
ALTER TABLE `tbl_model`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT untuk tabel `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_payment_pembeli`
--
ALTER TABLE `tbl_payment_pembeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tbl_pricing_plan`
--
ALTER TABLE `tbl_pricing_plan`
  MODIFY `pricing_plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_seller`
--
ALTER TABLE `tbl_seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91609;

--
-- AUTO_INCREMENT untuk tabel `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `social_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_subscriber`
--
ALTER TABLE `tbl_subscriber`
  MODIFY `subs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_testdrive`
--
ALTER TABLE `tbl_testdrive`
  MODIFY `id_testdrive` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_tipe`
--
ALTER TABLE `tbl_tipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_transmission_type`
--
ALTER TABLE `tbl_transmission_type`
  MODIFY `transmission_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_tunai`
--
ALTER TABLE `tbl_tunai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_waktu_booking`
--
ALTER TABLE `tbl_waktu_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_waktu_cicilan`
--
ALTER TABLE `tbl_waktu_cicilan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

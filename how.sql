-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 10, 2020 at 06:43 PM
-- Server version: 5.7.31-0ubuntu0.18.04.1
-- PHP Version: 7.3.21-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `how`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `id` int(4) NOT NULL,
  `position` text NOT NULL,
  `size` int(3) NOT NULL,
  `title` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `hit` char(7) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category_news`
--

CREATE TABLE `category_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `clicked` int(11) NOT NULL DEFAULT '0',
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_news`
--

INSERT INTO `category_news` (`id`, `name`, `category_id`, `slug`, `status`, `clicked`, `icon`, `image`, `created_at`, `updated_at`) VALUES
(13, 'Video', NULL, 'video', 1, 9, NULL, 'video.jpeg', '2020-08-02 09:50:45', '2020-09-10 02:15:15'),
(20, 'Penceramah', NULL, 'penceramah', 0, 0, NULL, NULL, '2020-09-10 01:47:22', '2020-09-10 01:47:22'),
(21, 'Felix Siaw', 20, 'felix-siaw', 0, 0, NULL, 'felix-siaw.jpg', '2020-09-10 01:47:52', '2020-09-10 01:47:52'),
(22, 'Hanan Attaki', 20, 'hanan-attaki', 0, 0, NULL, 'hanan-attaki.jpg', '2020-09-10 01:48:26', '2020-09-10 01:48:26'),
(23, 'Syafiq Riza Basalamah', 20, 'syafiq-riza-basalamah', 0, 0, NULL, 'syafiq-riza-basalamah.jpg', '2020-09-10 01:48:55', '2020-09-10 01:48:55'),
(24, 'Khalid Basalamah', 20, 'khalid-basalamah', 0, 0, NULL, 'khalid-basalamah.jpeg', '2020-09-10 01:49:24', '2020-09-10 01:49:24'),
(25, 'Adi Hidayat', 20, 'adi-hidayat', 1, 0, NULL, 'adi-hidayat.png', '2020-09-10 01:49:47', '2020-09-10 03:24:42'),
(26, 'Abdul Somad', 20, 'abdul-somad', 1, 0, NULL, 'abdul-somad.jpeg', '2020-09-10 01:50:17', '2020-09-10 02:51:28'),
(27, 'Aa Gym', 20, 'aa-gym', 1, 0, NULL, 'aa-gym.jpeg', '2020-09-10 01:51:00', '2020-09-10 03:08:51'),
(28, 'Fikih', NULL, 'fikih', 1, 2, NULL, 'fikih.jpeg', '2020-09-10 02:21:57', '2020-09-10 03:36:05'),
(29, 'Jual Beli', NULL, 'jual-beli', 1, 2, NULL, 'jual-beli.png', '2020-09-10 02:24:39', '2020-09-10 03:36:02'),
(30, 'Muamalah', NULL, 'muamalah', 1, 2, NULL, 'muamalah.jpeg', '2020-09-10 02:24:53', '2020-09-10 07:34:30'),
(31, 'Story', NULL, 'story', 1, 1, NULL, 'story.jpeg', '2020-09-10 02:50:36', '2020-09-10 03:36:10'),
(32, 'Tanya Jawab', NULL, 'tanya-jawab', 1, 14, NULL, 'tanya-jawab.jpeg', '2020-09-10 02:59:23', '2020-09-10 11:29:22'),
(33, 'News', NULL, 'news', 1, 2, NULL, 'news.png', '2020-09-10 03:06:53', '2020-09-10 03:36:16'),
(34, 'Sunnah', NULL, 'sunnah', 1, 1, NULL, 'sunnah.png', '2020-09-10 03:20:15', '2020-09-10 03:36:23');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id` int(2) NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `description` text NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id`, `name`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'about-us', '<h2 style=\"text-align: center; \">HUMAN ON WHEEL</h2><div><br></div><div>Wheels, an important element that can not be separate in human lives.&nbsp;</div><div>The attachment between human and wheels appears in every activities without defining social status, ages and backgrounds.&nbsp;</div><div>Human\r\n also use wheels for their creative works by using their imagination. It\r\n shows passion in all process and there are impacts&nbsp;</div><div>afterwards.&nbsp;</div><div>And wheels make a movements.</div>', 1, '2020-09-01 12:46:33', '2020-09-01 13:07:13'),
(2, 'Contact', 'contact', '<p style=\"\"><b><br></b></p><p style=\"\"><b>Let’s Get Ride With Us !</b><br>humanonwheels@gmail.com</p>', 1, '2020-09-01 12:48:03', '2020-09-01 12:48:03'),
(3, 'Partner', 'partner', '<h3 style=\"text-align: center; \"><span style=\"font-family: Arial;\">VISI &amp; MISI</span></h3><p><span style=\"font-family: Arial;\">Largest on wheels community in south east asia&nbsp;</span></p><p><span style=\"font-family: Arial;\">&amp;&nbsp;</span></p><p><span style=\"font-family: Arial;\">spread peacefull spirit &amp; inspiring people thru wheels living</span></p>', 1, '2020-09-01 12:49:22', '2020-09-01 12:49:22'),
(4, 'Carrer', 'carrer', '<h2 style=\"text-align: center;\"><b>Carrer</b></h2>Wheels, an important element that can not be separate in human lives.&nbsp;<br>The attachment between human and wheels appears in every activities without defining social status, ages and backgrounds.&nbsp;<br>Human\r\n also use wheels for their creative works by using their imagination. It\r\n shows passion in all process and there are impacts&nbsp;<br>afterwards.<h3 style=\"text-align: center; \"><p><br></p></h3>', 1, '2020-09-01 12:49:47', '2020-09-01 12:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `gsettings`
--

CREATE TABLE `gsettings` (
  `id` int(2) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `footer` varchar(255) DEFAULT NULL,
  `address` text,
  `phone` char(13) DEFAULT NULL,
  `fax` varchar(30) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `title` text,
  `populartag` text,
  `privacy` text,
  `sitemap` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gsettings`
--

INSERT INTO `gsettings` (`id`, `logo`, `favicon`, `footer`, `address`, `phone`, `fax`, `email`, `title`, `populartag`, `privacy`, `sitemap`, `created_at`, `updated_at`) VALUES
(1, '2020-09-02.png', '2020-09-01.png', 'humanonwheels.id © All Copyright Reserved.', NULL, NULL, NULL, NULL, 'The journey of passion, dream, dedication & inspiration', NULL, NULL, NULL, '2020-09-01 13:00:00', '2020-09-02 10:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) NOT NULL,
  `isLandscape` tinyint(1) NOT NULL,
  `link` varchar(255) NOT NULL,
  `imageable_id` bigint(20) NOT NULL,
  `hasModel` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2020_07_16_124926_create_permission_tables', 1),
(10, '2020_08_02_095243_create_menu_categories_table', 2),
(11, '2020_08_02_172705_create_news_tables', 3),
(12, '2020_08_06_072148_create_news_menu_category', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(6, 'App\\Models\\Users\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id2` int(7) DEFAULT NULL,
  `schedule` tinyint(1) NOT NULL DEFAULT '0',
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` text COLLATE utf8mb4_unicode_ci,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `embed` text COLLATE utf8mb4_unicode_ci,
  `img_news` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` text COLLATE utf8mb4_unicode_ci,
  `author` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slide` tinyint(1) NOT NULL DEFAULT '0',
  `breaking` tinyint(1) NOT NULL DEFAULT '0',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `hit` bigint(20) DEFAULT '0',
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `id2`, `schedule`, `title`, `sub_title`, `slug`, `detail`, `embed`, `img_news`, `tag`, `author`, `slide`, `breaking`, `featured`, `hit`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'Jual Beli yang terlarang', 'Perdagangan ataupun kegiatan yang berkaitan dengan jual beli lainnya seperti memproduksi suatu barang kebutuhan umat manusia, menerima jasa dan sebagainya bukanlah sebuah perbuatan yang dilarang oleh Alloh Subhanahu wa Ta’ala. Alloh Subhanahu wa Ta’ala membolehkan jual beli bagi hamba-Nya selama tidak melalaikan dari perkara yang lebih penting dan bermanfaat. Seperti melalaikannya dari ibadah yang wajib atau membuat madharat terhadap kewajiban lainnya. Dan juga selama segala sesuatu yang di perjual-belikan itu bukanlah sesuatu yang bertentangan atau dilarang oleh Syariat Islam.', 'jual-beli-yang-terlarang', '<h2><span style=\"font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, sans-serif; font-size: 11.664px; text-align: justify;\">Berikut adalah Jual beli yang dilarang dalam islam</span></h2><h2><span style=\"font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, sans-serif; font-size: 11.664px; text-align: justify;\"><br></span></h2><p><strong style=\"font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, sans-serif; font-size: 11.664px; text-align: justify;\">Jual Beli Ketika Panggilan Adzan</strong><br></p><div class=\"entry\" style=\"margin: 0px; text-align: justify; font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, sans-serif; font-size: 11.664px;\"><p align=\"justify\" style=\"margin: 1em 0px;\">Jual beli tidak sah dilakukan bila telah masuk kewajiban untuk melakukan shalat Jum’at. Yaitu setelah terdengar panggilan adzan yang kedua, berdasarkan Firman Alloh&nbsp;<em>Subhanahu wa Ta’ala</em>, yang artinya:&nbsp;<em>“Hai orang-orang yang beriman, apabila diseru untuk menunaikan shalat pada hari Jum’at, maka bersegeralah kamu kepada mengingat Alloh dan tinggalkanlah jual beli. Yang demikian itu lebih baik bagimu jika kamu mengetahui.”</em>&nbsp;(QS: Al Jumu’ah: 9).</p><p style=\"margin: 1em 0px;\">Alloh&nbsp;<em>Subhanahu wa Ta’ala</em>&nbsp;melarang jual beli agar tidak menjadikannya sebagai kesibukan yang menghalanginya untuk melakukan Shalat Jum’at. Alloh&nbsp;<em>Subhanahu wa Ta’ala</em>&nbsp;mengkhususkan melarang jual beli karena ini adalah perkara terpenting yang (sering) menyebabkan kesibukan seseorang. Larangan ini menunjukan makna pengharaman dan tidak sahnya jual beli. Kemudian Alloh&nbsp;<em>Subhanahu wa Ta’ala&nbsp;</em>mengatakan “yang demikian itu”, yakni “perkara meninggalkan jual beli dan menghadiri Shalat Jum’at adalah lebih baik bagimu, jika kamu mengetahui akan maslahatnya”. Maka, melakukan kesibukan dengan perkara selain jual beli sehingga mengabaikan shalat Jum’at adalah juga perkara yang diharamkan.</p><p style=\"margin: 1em 0px;\">Demikian juga shalat fardhu lainnya, tidak boleh disibukkan dengan aktivitas jual beli ataupun yang lainnya setelah ada panggilan untuk menghadirinya. Alloh&nbsp;<em>Subhanahu wa Ta’ala&nbsp;</em>berfirman, yang artinya:&nbsp;<em>“Bertasbih kepada Alloh di masjid-masjid yang telah diperintahkan untuk dimuliakan dan disebut nama-Nya di dalamnya, pada waktu pagi dan waktu petang. laki-laki yang tidak dilalaikan oleh perniagaan dan tidak (pula) oleh jual beli dari mengingat Alloh, mendirikan shalat, dan membayarkan zakat. Mereka takut pada suatu hari yang (di hari itu) hati dan penglihatan menjadi goncang. (Mereka mengerjakan yang demikian itu) supaya Alloh memberi balasan kepada mereka (dengan balasan) yang lebih baik dari apa yang telah mereka kerjakan, dan supaya Alloh menambah karunia-Nya kepada mereka. Dan Alloh memberi rezki kepada siapa yang dikehendaki-Nya tanpa batas.”&nbsp;</em>(QS: An-Nur: 36-38).</p><p style=\"margin: 1em 0px;\"><strong>Jual Beli Untuk Kejahatan<br></strong><br>Demikian juga Alloh&nbsp;<em>Subhanahu wa Ta’ala</em>&nbsp;melarang kita menjual sesuatu yang dapat membantu terwujudnya kemaksiatan dan dipergunakan kepada yang diharamkan Alloh&nbsp;<em>Subhanahu wa Ta’ala</em>. Karena itu, tidak boleh menjual sirup yang dijadikan untuk membuat khamer karena hal tersebut akan membantu terwujudnya permusuhan. Hal ini berdasarkan firman Alloh&nbsp;<em>Subhanahu wa Ta’ala</em>, yang artinya:<em>&nbsp;“Janganlah kalian tolong-menolong dalam perbuatuan dosa dan permusuhan”&nbsp;</em>(AL Maidah: 2)</p><p style=\"margin: 1em 0px;\">Demikian juga tidak boleh menjual persenjataan serta peralatan perang lainnya di waktu terjadi fitnah (peperangan) antar kaum muslimin supaya tidak menjadi penyebab adanya pembunuhan. Alloh&nbsp;<em>Subhanahu wa Ta’ala</em>&nbsp;dan Rasul-Nya telah melarang dari yang demikian.</p><p style=\"margin: 1em 0px;\">Ibnul Qoyim berkata “Telah jelas dari dalil-dalil syara’ bahwa maksud dari akad jual beli akan menentukan sah atau rusaknya akad tersebut. Maka persenjataan yang dijual seseorang akan bernilai haram atau batil manakala diketahui maksud pembeliaan tersebut adalah untuk membunuh seorang Muslim. Karena hal tesebut berarti telah membantu terwujudnya dosa dan permusuhan. Apabila menjualnya kepada orang yang dikenal bahwa dia adalah Mujahid fi sabilillah maka ini adalah ketaТatan dan qurbah. Demikian pula bagi yang menjualnya untuk memerangi kaum muslimin atau memutuskan jalan perjuangan kaum muslimin maka dia telah tolong menolong untuk kemaksiatan.”</p><p style=\"margin: 1em 0px;\"><strong>Menjual Budak Muslim kepada Non Muslim</strong></p><p style=\"margin: 1em 0px;\">Alloh&nbsp;<em>Subhanahu wa Ta’ala</em>&nbsp;melarang menjual hamba sahaya muslim kepada seorang kafir jika dia tidak membebaskannya. Karena hal tersebut akan menjadikan budak tersebut hina dan rendah di hadapan orang kafir. Alloh&nbsp;<em>Subhanahu wa Ta’ala</em>&nbsp;telah berfirman, yang artinya:&nbsp;<em>“Alloh sekali-kali tidak akan memberi jalan kepada orang-orang kafir untuk memusnahkan orang-orang yang beriman.”&nbsp;</em>(QS: An-Nisa’: 141).</p><p style=\"margin: 1em 0px;\">Nabi&nbsp;<em>shalallahu ‘alaihi wasallam</em>&nbsp;bersabda, yang artinya:&nbsp;<em>“Islam itu tinggi dan tidak akan pernah ditinggikan atasnya”</em>&nbsp;(shahih dalam Al Irwa’: 1268, Shahih Al Jami’: 2778)</p><p style=\"margin: 1em 0px;\"><strong>Jual Beli di atas Jual Beli Saudaranya</strong></p><p style=\"margin: 1em 0px;\">Diharamkan menjual barang di atas penjualan saudaranya, seperti seseorang berkata kepada orang yang hendak membeli barang seharga sepuluh, Aku akan memberimu barang yang seperti itu dengan harga sembila.. Atau perkataan Aku akan memberimu lebih baik dari itu dengan harga yang lebih baik pula. Nabi&nbsp;<em>shalallahu ‘alaihi wasallam&nbsp;</em>bersabda, yang artinya:<em>&nbsp;“Tidaklah sebagian diatara kalian diperkenankan untuk menjual (barang) atas (penjualan) sebagian lainnya.”&nbsp;</em>(Mutafaq alaihi).</p><p style=\"margin: 1em 0px;\">Juga sabdanya, yang artinya:<em>&nbsp;“Tidaklah seorang menjual di atas jualan saudaranya”&nbsp;</em>(Mutfaq Сalaih)Demikian juga diharamkan membeli barang di atas pembelian saudaranya. Seperti mengatakan terhadap orang yang menjual dengan harga sembilan: Saya beli dengan harga sepuluh. Pada zaman ini betapa banyak contoh-contoh muamalah yang diharamkan seperti ini terjadi di pasar-pasar kaum muslimin. Maka wajib bagi kita untuk menjauhinya dan melarang manusia dari pebuatan seperti tersebut serta mengingkari segenap pelakunya.</p><p style=\"margin: 1em 0px;\"><strong>Samsaran</strong></p><p align=\"justify\" style=\"margin: 1em 0px;\">Termasuk jual beli yang diharamkan adalah jual belinya orang yang bertindak sebagai samsaran, (yaitu seorang penduduk kota menghadang orang yang datang dari tempat lain (luar kota), kemudian orang itu meminta kepadanya untuk menjadi perantara dalam jual belinya, begitupun sebaliknya). Hal ini berdasarkan sabda Nabi<em>&nbsp;shalallahu ‘alaihi wasallam,&nbsp;</em>yang artinya:&nbsp;<em>“Tidak boleh seorang yang hadir (tinggal di kota) menjualkan barang terhadap orang yang baadi (orang kampung lain yang datang ke kota)”.</em></p><p style=\"margin: 1em 0px;\">Ibnu Abbas&nbsp;<em>Radhiallahu anhu</em>&nbsp;berkata: Tidak boleh menjadi Samsar baginya (yaitu penunjuk jalan yang jadi perantara penjual dan pemberi). Nabi&nbsp;<em>Shalallahu ‘alaihi wasallam</em>&nbsp;bersabda, yang artinya:&nbsp;<em>“Biarkanlah manusia berusaha sebagian mereka terhadap sebagian yang lain untuk mendapatkan rizki Alloh”</em>&nbsp;(HR: Shahih Tirmidzi, 977, Shahih Al Jami’ 8603)</p><p style=\"margin: 1em 0px;\">Begitu pula tidak boleh bagi orang yang mukim untuk untuk membelikan barang bagi seorang pendatang. Seperti seorang penduduk kota (mukim) pergi menemui penduduk kampung (pendatang) dan berkata Saya akan membelikan barang untukmu atau menjualkan. Kecuali bila pendatang itu meminta kepada penduduk kota (yang mukim) untuk membelikan atau menjualkan barang miliknya, maka ini tidak dilarang.</p><p style=\"margin: 1em 0px;\"><strong>Jual Beli dengan Сinah</strong></p><p align=\"justify\" style=\"margin: 1em 0px;\">Diantara jual beli yang juga terlarang adalah jual beli dengan cara Сinah, yaitu menjual sebuah barang kepada seseorang dengan harga kredit, kemudian dia membelinya lagi dengan harga kontan akan tetapi lebih rendah dari harga kredit. Misalnya, seseorang menjual barang seharga Rp 20.000 dengan cara kredit. Kemudian (setelah dijual) dia membelinya lagi dengan harga Rp 15.000 kontan. Adapun harga Rp 20.000 tetap dalam hitungan hutang si pembeli sampai batas waktu yang ditentukan. Maka ini adalah perbuatan yang diharamkan karena termasuk bentuk tipu daya yang bisa mengantarkan kepada riba. Seolah-olah dia menjual dirham-dirham yang dikreditkan dengan dirham-dirham yang kontan bersamaan dengan adanya perbedaan (selisih). Sedangkan harga barang itu hanya sekedar tipu daya saja (hilah), padahal intinya adalah riba.</p><p style=\"margin: 1em 0px;\">Nabi&nbsp;<em>shalallahu ‘alaihi wasallam</em>&nbsp;bersabda, yang artinya:<em>&nbsp;“Jika kalian telah berjual beli dengan cara Сinah dan telah sibuk dengan ekor-ekor sapi (sibuk denngan bercocok tanam), sehingga kalian meninggalkan jihad, maka Alloh akan timpakan kepada kalian kehinaan, dan (Dia) tidak akan mengangkat kehinaan dari kalian, sampai kalian kembali kepada agama kalian”</em>&nbsp;(HR: Silsilah As Shahihah: 11, Shahih Abu Dawud: 2956) dan juga sabdanya, yang artinya:&nbsp;<em>“Akan datang pada manusia suatu masa yang mereka menghalalkan riba dengan jual beli”</em>&nbsp;(Hadits Dha’if, dilemahkan oleh Al Albany dalam Ghayatul Maram: 13).<br><em><br></em>(Sumber Rujukan: Mulakhos Fiqhy Juz II Hal 11-13, dengan beberapa tambahan)</p></div>', NULL, 'jual-beli-yang-terlarang.jpeg', 'jualbeli,haram', 'admin', 0, 0, 0, 12, 1, '2020-09-10 02:35:42', '2020-09-10 11:41:26'),
(2, 2, 0, 'Hukum Berwudhu Menggunakan Air Panas', 'Bagaimana hukum berwudhu menggunakan Air panas ?, silahkan baca selengkapnya di artikel berikut', 'hukum-berwudhu-menggunakan-air-panas', '<p align=\"justify\" style=\"margin: 1em 0px; font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, sans-serif; font-size: 11.664px; text-align: justify;\"><span class=\"datasimp\"><a href=\"http://www.mediamuslim.info/\" target=\"_blank\" style=\"color: rgb(81, 81, 81); border-bottom: 1px dotted silver;\"><br class=\"Apple-interchange-newline\">MediaMuslim.Info</a>&nbsp;– Apa hukumnya berwudhu’ dengan menggunakan air panas? Apakah sah berwudu dengan menggunakan air panas atau apakah hukumnya?</span></p><p style=\"margin: 1em 0px; font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, sans-serif; font-size: 11.664px; text-align: justify;\"><span class=\"datasimp\">Berwudhu’ dengan air panas tidaklah mengapa, namun jika terlalu panas hukumnya makruh kendati wudhu’nya tetap sah. Karena hal itu dapat merusak dan membakar kulit. Sejak dahulu permasalahan apakah air yang dipanaskan dapat mengangkat hadas memang terus diperselisihkan.</span><span id=\"more-23\"></span></p><p align=\"justify\" style=\"margin: 1em 0px; font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, sans-serif; font-size: 11.664px; text-align: justify;\">Namun yang benar dapat mengangkat hadas, bahkan menjadi kebutuhan utama di daerah-daerah dingin. Namun makruh hukumnya jika air itu dihangatkan dengan menggunakan bahan bakar yang najis.&nbsp;<em>Wallahu A’lam</em>.</p><p style=\"margin: 1em 0px; font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, sans-serif; font-size: 11.664px; text-align: justify;\">(Sumber Rujukan:&nbsp;<span class=\"tslink\">Al-Lu’lu’ Al-Makin kumpulan fatwa Syaikh Bin Jibriin hal 78)</span></p>', NULL, 'hukum-berwudhu-menggunakan-air-panas.jpeg', NULL, 'admin', 1, 0, 1, 11, 1, '2020-09-10 02:40:09', '2020-09-10 08:56:39'),
(3, 3, 0, 'Shalat dengan Mengenakan Baju Ketat', 'Memakai pakaian yang ketat dan sesak tidak dianjurkan (makruh) baik dari sudut pandang syari’ah maupun dari sudut pandang kesehatan. Ada sebagian jenis baju ketat membuat orang yang mengenakannya sulit melakukan sujud. Jika baju seperti ini menyebabkan si pemakai sukar mengerjakan shalat atau bahkan menyebabkan dia meninggalkan shalat, maka jelas hukum memakai baju seperti ini adalah haram.', 'shalat-dengan-mengenakan-baju-ketat', '<p align=\"justify\" style=\"margin: 1em 0px; font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, sans-serif; font-size: 11.664px; text-align: justify;\"><a href=\"http://www.mediamuslim.info/\" style=\"color: rgb(81, 81, 81); border-bottom: 1px dotted silver;\">MediaMuslim.Info</a>&nbsp;– Memakai pakaian yang ketat dan sesak tidak dianjurkan (makruh) baik dari sudut pandang syari’ah maupun dari sudut pandang kesehatan. Ada sebagian jenis baju ketat membuat orang yang mengenakannya sulit melakukan sujud. Jika baju seperti ini menyebabkan si pemakai sukar mengerjakan shalat atau bahkan menyebabkan dia meninggalkan shalat, maka jelas hukum memakai baju seperti ini adalah haram.</p><p class=\"MsoNormal\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, sans-serif; font-size: 11.664px; text-align: justify; line-height: 17.496px;\">Asy-Syaikh al Albaniy berkata bahwa celana ketat itu mendatangkan dua macam musibah: Musibah pertama, bahwa orang yang memakainya menyerupai orang-orang kafir. Sedangkan Kaum Muslim memang memakai celana, akan tetapi model celana yang lebar dan longgar. Model seperti ini masih banyak dipakai di daerah Suriah dan Libanon. Ummat Islam baru mengenal celana ketat setelah mereka dijajah bangsa eropa. Pengaruh buruk itulah yang diwariskan oleh kaum penjajah kepada ummat Islam. Akan tetapi karena kebodohan dan ketololan ummat Islam sendiri, mereka mengambil tradisi buruk tersebut.&nbsp;<span id=\"more-12\"></span>Musibah kedua, celana ketat menyebabkan bentuk aurat terlihat dengan jelas. Memang benar bahwa aurat pria adalah anggota badan antara pusar dan lutut. Namun seorang hamba yang sedang melakukan shalat dituntut untuk berbuat lebih dari ketentuan yang telah ditetapkan oleh syariat (dalam masalah busana ini, lihat Al Qur’an Surah 7:31-pen-). Tidak pantas dia melakukan maksiat kepada&nbsp;Alloh&nbsp;<em>subhanahu wa ta’ala</em>&nbsp;ketika sedang sujud bersimpuh di hadapan-Nya. Ketika dia mengenakan celana ketat, maka kedua pantatnya akan terbentuk dengan jelas. Bahkan lebih dari itu, bagian tubuh yang membelah keduanya juga terlihat nyata !</p><p style=\"margin: 1em 0px; font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, sans-serif; font-size: 11.664px; text-align: justify;\">Bagaimana seorang hamba melakukan shalat dan menghadap Rabb Semesta Alam dalam keadaan seperti ini ?! Yang lebih aneh lagi adalah mayoritas pemuda Muslim biasanya menentang keras apabila kaum wanita Muslimah memakai baju ketat. Alasan mereka bahwa baju ketat yang dipakai wanita bisa menunjukkan bentuk tubuhnya secara jelas. Akan tetapi pemuda ini lupa akan dirinya sendiri. Dia tidak sadar bahwa dia telah mengerjakan suatu hal yang dia sendiri membencinya.</p><p style=\"margin: 1em 0px; font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, sans-serif; font-size: 11.664px; text-align: justify;\">Jika demikian, tidak ada bedanya antara wanita yang memakai baju ketat sehingga terlihat lekuk tubuhnya dengan pria yang memakai celana ketat (jeans dan semacamnya-pen-) sehingga terlihat bentuk kedua pantatnya. Ketika pantat pria dan wanita dianggap sebagai aurat, maka hal menggunakan baju ketat bagi mereka itu sama saja hukumnya, yakni dilarang. Sebenarnya para pemuda wajib menyadari musibah yang telah melanda mayoritas mereka.</p><p style=\"margin: 1em 0px; font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, sans-serif; font-size: 11.664px; text-align: justify;\">Rasululloh&nbsp;<em>Shallallahu ‘Alaihi Wa Aalihi Wasallam</em>&nbsp;telah melarang kaum pria shalat dengan memakai celana tanpa gamis (kemeja). Hadits ini diriwayatkan oleh Abu Daud dan al Hakim. Sanad hadits ini sendiri berkualitas hasan. Lihat Shahiih al Jaami’ al Shaghiir nomor 6830 dan juga diriwayatkan oleh al Thahawiy dalam Syarh Ma’aaniy al Atsaar (I/382).</p><p style=\"margin: 1em 0px; font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, sans-serif; font-size: 11.664px; text-align: justify;\">Adapun jika model celana yang dikenakan ketika shalat tidak ketat dan berukuran longgar, maka sah shalat yang dikerjakan. Yang lebih baik adalah dirangkap dengan gamis yang bisa menutup anggota tubuh antara pusar dan lutut. Akan tetapi lebih baik lagi apabila panjang gamis itu sampai setengah betis atau sampai mata kaki (asalkan tidak sampai menutupi mata kaki –pen). Hal seperti ini adalah cara menutup aurat yang paling sempurna (mungkin pakaian seperti ini di daerah kita agak sukar didapatkan di pasaran, namun cukup banyak sarung yang bisa menggantikan fungsinya –pen-). (Al Fataawaa I/69, tulisan Syaikh ‘Abdul Aziz bin ‘Abdullah bin Baz).</p><p style=\"margin: 1em 0px; font-family: &quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, sans-serif; font-size: 11.664px; text-align: justify;\">Dengan latar belakang inilah Komite Tetap Pembahasan Masalah ‘Ilmiyyah dan fatwa Saudi Arabia (semacam MUI di Indonesia -pen-) menjawab pertanyaan mengenai hukum Islam tentang shalat memakai celana. Jawaban yang dirumuskan adalah sebagai berikut: “Jika pakaian tersebut tidak menyebabkan aurat terbentuk dengan jelas, karena modelnya longgar dan tidak bersifat transparan sehingga anggota aurat tidak bisa dilihat dari arah belakang, maka boleh dipakai ketika shalat. Namun apabila busana itu terbuat dari bahan yang tipis sehingga memungkinkan aurat yang memakai dilihat dari belakang, maka shalat yang dikerjakan batal hukumnya. Jika sifat busana yang dipakai hanya mempertajam atau memperjelas bentuk aurat saja, maka makruh mengenakan busana tersebut ketika shalat. Terkecuali jika tidak ada busana lain yang dapat dikenakan.</p>', NULL, 'shalat-dengan-mengenakan-baju-ketat.jpeg', NULL, 'admin', 1, 0, 1, 13, 1, '2020-09-10 02:43:06', '2020-09-10 11:41:29'),
(4, 4, 0, 'SEMBILAN PESAN PERNIKAHAN', 'Langkah, rezeki, pertemuan dan maut dalam kuasa Allah Swt. Tapi manusia diberi kuasa untuk memilih dan berbuat yang disebut dengan ikhtiyar. Rasulullah Saw bersabda,', 'sembilan-pesan-pernikahan', '<p><span style=\"font-size: 1rem;\">Oleh: H. Abdul Somad, Lc., MA.</span><br></p><p><br></p><p>Pertama: Pertemuan Karena Allah Swt.</p><p>Langkah, rezeki, pertemuan dan maut dalam kuasa Allah Swt. Tapi manusia diberi kuasa untuk memilih dan berbuat yang disebut dengan ikhtiyar. Rasulullah Saw bersabda,</p><p>كَتَبَ اللَّهُ مَقَادِيرَ الْخَلَائِقِ قَبْلَ أَنْ يَخْلُقَ السَّمَاوَاتِ وَالْأَرْضَ بِخَمْسِينَ أَلْفَ سَنَةٍ</p><p>“Allah Swt telah menetapkan takdir&nbsp; semua makhluk, lima puluh ribu tahun sebelum Ia menciptakan langit dan bumi”. (Hadits riwayat Imam Muslim, dari Abdullah bin ‘Amr). Maka fahamilah bahwa pasangan sebagai pilihan Allah Swt setelah melewati proses ikhtiyar manusia dengan berbagai macam skenarionya, dari mulai dipertemukan teman, sampai salah sambung telepon.</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Tiga orang rakyat jelata diberi sebuah pena dari Tuan Raja. Orang pertama berkata sambil menggerutu, “Raja yang kaya raya cuma memberi sebuah pena!”. Yang kedua berkata, “Lebih baik, daripada tidak ada sama sekali”. Yang ketiga berkata, “Saya tidak melihat penanya, tapi yang saya lihat adalah siapa yang memberikannya”.</p><p><br></p><p>Kedua: Menikah Setengah Iman.</p><p>Yang paling penting dalam hidup adalah iman. Hanya dengan iman manusia akan selamat di dunia dan akhirat. Iman adalah bekal menghadap Allah Swt. Nikah adalah setengah dari iman itu, sebagaimana sabda Rasulullah Saw bersabda,</p><p>مَنْ تَزَوَّجَ فَقَدْ اِسْتَكْمَلَ نِصْفَ الإِيْمَانِ فَلْيَتَّقِ اللهَ فِيْ النِّصْفِ الْبَاقِيْ</p><p>“Siapa yang menikah, maka ia telah menyempurnakan setengah keimanannya. Maka hendaklah ia bertakwa kepada Allah Swt pada setengahnya”. (Hadits riwayat Imam at-Thabrani, dari Anas bin Malik. Hadits Hasan). Bekal itu telah terisi setengah, maka sempurnakanlah dengan takwa kepada Allah Swt. Ketika bekal telah sempurna, maka jangan pernah berkurang, karena tidak ada yang tau ntah bila perjalanan akan dilanjutkan.</p><p><br></p><p>Ketiga: Menjaga Pandangan dan Kemaluan.</p><p>Iman itu tidak terlihat, karena ia masalah yang bersifat batin. Tapi iman diwujudkan dalam perbuatan. Bila setengah iman itu dilaksanakan, maka terwujud dalam bentuk pemeliharaan mata dan kemaluan. Demikian disabdakan Rasulullah Saw,</p><p>يَا مَعْشَرَ الشَّبَابِ مَنْ اسْتَطَاعَ مِنْكُمْ الْبَاءَةَ فَلْيَتَزَوَّجْ فَإِنَّهُ أَغَضُّ لِلْبَصَرِ وَأَحْصَنُ لِلْفَرْجِ</p><p>وَمَنْ لَمْ يَسْتَطِعْ فَعَلَيْهِ بِالصَّوْمِ فَإِنَّهُ لَهُ وِجَاءٌ</p><p>“Wahai para pemuda, siapa diantara kamu yang mampu, maka hendaklah ia menikah, karena pernikahan itu menjaga pandangan dan kemaluan. Siapa yang tidak mampu, maka hendaklah ia berpuasa, karena puasa itu sebagai pemelihara baginya”. (Hadits riwayat Imam al-Bukhari dan Imam Muslim, dari Abdullah bin Mas’ud). Sebagian besar penyebab kejahatan manusia adalah mata dan kemaluan. Keduanya dijaga dengan pernikahan.</p><p><br></p><p>Keempat: Pasangan Adalah “Ayat”.</p><p>Ketika disebut kata ayat, maka yang terbayang di benak kita adalah bagian dari surah dalam al-Qur’an. Ayat dalam surah al-Fatihah, ayat Kursi dan ayat-ayat lainnya. Semua itu adalah ayat yang tersurat, tertulis dalam al-Qur’an. Namun ada ayat-ayat lain, tanda-tanda kebesaran Allah Swt di alam semesta yang disebut sebagai Ayat Kauniyyah, diantara ayat-ayat itu adalah langit dan bumi, aneka ragam bahasa dan warna kulit dan berbagai ayat-ayat lainnya. Satu diantara ayat itu adalah pasangan hidup. Allah Swt berfirman,</p><p>وَمِنْ آَيَاتِهِ أَنْ خَلَقَ لَكُمْ مِنْ أَنْفُسِكُمْ أَزْوَاجًا</p><p>“Dan di antaraayat-ayat (tanda-tanda kekuasaan-Nya) ialah Dia menciptakan untukmu isteri-isteri dari jenismu sendiri”. (Qs. ar-Ruum [30]: 21).</p><p>&nbsp;Istri menjadi ayat bagi suami dan suami menjadi ayat bagi istri. Jika setiap pasangan memahami bahwa pasangannya adalah ayat, maka tidak akan ada yang melecehkan ayat, tidak akan ada tindakan kekerasan dalam rumah tangga. Karena melecehkan pasangan berarti melecehkan ayat, tanda-tanda kekuasaan Allah Swt.</p><p><br></p><p>Kelima: Ketenangan Jiwa.</p><p>Manusia terdiri dari ruh dan jasad. Jasad yang tenang berasal dari ruh yang tenang. Ketenangan ruh itu berasal dari Allah Swt. Ketenangan yang bukan berasal dari Allah Swt adalah ketenangan semu karena palsu. Allah Swt menjelaskan bahwa salah satu penyebab ketenangan itu adalah pasangan hidup yang telah ditetapkan Allah Swt. Firman-Nya,</p><p>لِتَسْكُنُوا إِلَيْهَا</p><p>“Supaya kamu cenderung dan merasa tenteram kepadanya”. (Qs. ar-Ruum [30]: 21).</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Harta memang bisa memberikan ketenangan. Tapi ketenangan bukan pada harta. Buktinya, banyak orang yang memiliki harta, tapi tidak mendapatkan ketenangan di dalamnya. Suatu ketika sahabat bertanya kepada Rasulullah Saw, “Wahai Rasulullah, apakah harta yang paling berharga?”. Rasulullah Saw menjawab,</p><p>لِسَانٌ ذَاكِرٌ وَقَلْبٌ شَاكِرٌ وَزَوْجَةٌ مُؤْمِنَةٌ تُعِينُهُ عَلَى إِيمَانِهِ</p><p>“Lidah yang senantiasa berzikir, hati yang selalu bersyukur, istri beriman yang menolong keimanan suami”. (Hadits riwayat Imam at-Tirmidzi dari Tsauban).</p><p><br></p><p>Keenam: Melihat Titik Persamaan.</p><p>Dua makhluk yang berbeda, sampai orang barat mengatakan, “Man are from Mars, Women are from Venus”. Semuanya berbeda, dari bentuk fisik, sifat bawaan, selera makanan dan berbagai hal lainnya. Allah Swt merekat perbedaan itu dengan Mawaddah dan Rahmah.</p><p>وَجَعَلَ بَيْنَكُمْ مَوَدَّةً وَرَحْمَةً</p><p>“dan dijadikan-Nya diantaramu rasa kasih dan sayang”. (Qs. ar-Ruum [30]: 21).</p><p>Mawaddah melihat kecantikan fisik, Rahmah memandang kebaikan akhlak.</p><p>Mawaddah memandang kelebihan, Rahmah menutupi kekurangan.</p><p>Itulah penyambung yang putus, perekat yang retak.</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Allah Swt menggambarkan pasangan seperti pakaian, saling menutupi dan melindungi,</p><p>هُنَّ لِبَاسٌ لَكُمْ وَأَنْتُمْ لِبَاسٌ لَهُنَّ</p><p>“mereka adalah pakaian bagimu, dan kamupun adalah pakaian bagi mereka”. (Qs. al-Baqarah [2]: 187). Pakaian yang tidak mampu menutupi dan melindungi, maka bukanlah pakaian.</p><p><br></p><p>Ketujuh: Patuh Bersyarat.</p><p>Laki-laki diberi tanggung jawab di dunia dan akhirat. Maka selama ia menunaikan kewajiban dan amanah, ajakan dan larangannya wajib diikuti. Bahkan Rasulullah Saw bersabda,</p><p>لَوْ كُنْتُ آمِرًا أَحَدًا أَنْ يَسْجُدَ لِأَحَدٍ لَأَمَرْتُ الْمَرْأَةَ أَنْ تَسْجُدَ لِزَوْجِهَا</p><p>“Seandainya aku boleh memerintahkan manusia untuk bersujud kepada manusia, pastilah aku perintahkan seorang istri untuk sujud kepada suaminya”. (Hadits riwayat Imam at-Tirmidzi, dari Abu Hurairah, hadits Hasan).</p><p>Dalam beberapa kasus, melawan suami menyebabkan turunnya laknat, sebagaimana sabda Rasulullah Saw,</p><p>إِذَا دَعَا الرَّجُلُ امْرَأَتَهُ إِلَى فِرَاشِهِ فَأَبَتْ فَبَاتَ غَضْبَانَ عَلَيْهَا لَعَنَتْهَا الْمَلَائِكَةُ حَتَّى تُصْبِحَ</p><p>“Apabila seorang suami mengajak suaminya berhubungan, tapi perempuan itu menolak, maka ia dilaknat malaikat hingga waktu pagi”. (Hadits riwayat Imam al-Bukhari dan Muslim dari Abu Hurairah).</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Namun ketaatan itu bukan tanpa syarat. Suami ditaati selama ia taat kepada Allah Swt dan Rasul-Nya. Tidak ada ketaatan kepada makhluk jika ketaatan itu menyebabkan perbuatan maksiat kepada Allah Swt,</p><p>فَإِنْ أُمِرَ بِمَعْصِيَةٍ فَلَا سَمْعَ عَلَيْهِ وَلَا طَاعَةَ</p><p>“Jika diperintahkan melakukan perbuatan maksiat, maka tidak perlu didengar dan tidak wajib dipatuhi”. (Hadits riwayat Imam at-Tirmidzi, dari Abdullah bin Umar, hadits Hasan Shahih).</p><p><br></p><p>Kedelapan: Tulang Rusuk Yang Bengkok.</p><p>Rasulullah Saw menggambarkan perumpamaan dengan gambaran yang sangat sempurna,</p><p>وَاسْتَوْصُوا بِالنِّسَاءِ فَإِنَّ الْمَرْأَةَ خُلِقَتْ مِنْ ضِلَعٍ وَإِنَّ أَعْوَجَ شَيْءٍ فِي الضِّلَعِ أَعْلَاهُ إِنْ ذَهَبْتَ تُقِيمُهُ كَسَرْتَهُ وَإِنْ تَرَكْتَهُ لَمْ يَزَلْ أَعْوَجَ اسْتَوْصُوا بِالنِّسَاءِ خَيْرًا</p><p>“Tinggalkanlah pesan yang baik untuk para perempuan. Sesungguhnya perempuan itu diciptakan dari tulang rusuk. Sesungguhnya tulang rusuk yang paling bengkok adalah yang paling atas. Jika engkau luruskan, maka engkau mematahkannya. Jika engkau biarkan, maka ia akan tetap bengkok. Tinggalkanlah pesan yang baik-baik untuk perempuan”. (Hadits riwayat Imam al-Bukhari dan Imam Muslim dari Abu Hurairah). Ia diciptakan bukan dari tulang kaki pria untuk diinjak. Bukan dari tulang kepalanya untuk dijunjung. Tapi dari tulang rusuk agar berada setara di sampingnya. Tapi tulang itu bengkok, jika diikuti akan ikut bengkok. Namun jika diluruskan dengan paksa, ia akan patah.</p><p><br></p><p>Kesembilan: Amal Jariyah.</p><p>Allah Swt memberikan ruang dan masa kepada manusia agar manusia beramal. Ketika ruang dan masa itu ditarik oleh Allah Swt, maka berakhirlah amal. Tapi ada amal yang tidak akan pernah terhenti, satu diantaranya anak yang shaleh, sabda Rasulullah Saw,</p><p>إِذَا مَاتَ الْإِنْسَانُ انْقَطَعَ عَنْهُ عَمَلُهُ إِلَّا مِنْ ثَلَاثَةٍ إِلَّا مِنْ صَدَقَةٍ جَارِيَةٍ أَوْ عِلْمٍ يُنْتَفَعُ بِهِ أَوْ وَلَدٍ صَالِحٍ يَدْعُو لَهُ</p><p>“Apabila manusia itu meninggal dunia, maka putuslah amalnya, kecuali tiga: sedekah jariyah, ilmu yang bermanfaat dan anak shaleh yang mendoakannya”. (Hadits riwayat Imam Muslim, dari Abu Hurairah). Anak shaleh itu diperoleh lewat pernikahan yang sah. Surga pun dijanjikan bagi mereka yang mampu menjaga amanah anak, sesuai sabda Rasulullah Saw,</p><p>مَنْ عَالَ ثَلَاثَ بَنَاتٍ فَأَدَّبَهُنَّ وَزَوَّجَهُنَّ وَأَحْسَنَ إِلَيْهِنَّ فَلَهُ الْجَنَّةُ</p><p>“Siapa yang merawat tiga orang anak perempuan dengan baik, ia beri pendidikan yang baik, ia nikahkan dengan orang-orang yang baik, ia berbuat baik kepada mereka, maka surgalah baginya”. (Hadits riwayat Imam at-Tirmidzi dari Abu Sa’id al-Khudri).</p>', NULL, 'sembilan-pesan-pernikahan.jpeg', 'pernikahan,pesan', 'admin', 0, 0, 1, 16, 1, '2020-09-10 02:57:37', '2020-09-10 08:51:07'),
(5, 5, 0, 'Nasab Anak Hasil Zina', 'Jika si A (laki-laki) berzina dengan si B (perempuan), kemudian lahir anak C (perempuan). Bolehkan si C dinasabkan kepada A?', 'nasab-anak-hasil-zina', '<p><span style=\"font-size: 1rem;\">Pertanyaan:</span><br></p><p>Jika si A (laki-laki) berzina dengan si B (perempuan), kemudian lahir anak C (perempuan). Bolehkan si C dinasabkan kepada A?</p><p><br></p><p>Jawaban:</p><p>يقول النبى صلى الله عليه وسلم \"الولد للفراش وللعاهر الحجر\" رواه البخارى ومسلم . جمهور الفقهاء على أن الزنا لا يثبت به نسب الولد للزانى ، بل ينسب إلى أمه بالولادة ، وعليه فيجوز للزانى أن يتزوج من البنت التى نتجت من زناه</p><p>Rasulullah Saw bersabda: “Anak dinisbatkan karena pernikahan, bagi pezina kesia-siaan”. (Hadits riwayat al-Bukhari dan Muslim).&nbsp;</p><p>Menurut Jumhur (mayoritas) Ulama: Sesungguhnya perbuatan zina tidak dapat menisbatkan nasab si anak kepada bapaknya, akan tetapi anak itu dinisbatkan kepada ibunya. Dengan demikian maka bapak yang berzina itu boleh menikahi anak hasil zinanya yang lahir dari perbuatan zina.</p><p>(Sumber: Fatawa al-Azhar, Syekh ‘Athiyyah Shaqar).</p>', NULL, 'nasab-anak-hasil-zina.jpeg', NULL, 'admin', 1, 1, 1, 14, 1, '2020-09-10 03:00:38', '2020-09-10 11:41:52'),
(6, 6, 0, 'Perempuan dan Ziarah Kubur', 'Apa hukum ziarah kubur bagi perempuan jika tetap menjaga adab-adab ziarah kubur dan bertujuan untuk mengambil pelajaran dan bersikap khusyu’?', 'perempuan-dan-ziarah-kubur', '<p><span style=\"font-size: 1rem;\">Fatwa Syekh ‘Athiyyah Shaqar.</span><br></p><p><span style=\"font-size: 1rem;\">Pertanyaan:</span><br></p><p>Apa hukum ziarah kubur bagi perempuan jika tetap menjaga adab-adab ziarah kubur dan bertujuan untuk mengambil pelajaran dan bersikap khusyu’?</p><p><br></p><p>Jawaban:</p><p>Pada awalnya Rasulullah Saw melarang ziarah kubur untuk memutus tradisi jahiliah berbangga-bangga dengan ziarah kubur dengan menyebut-nyebut peninggalan nenek moyang. Itu yang disebutkan Allah Swt dalam firman-Nya:</p><p><span style=\"font-size: 1rem;\">“Bermegah-megahan telah melalaikan kamu. Sampai kamu masuk ke dalam kubur”. (Qs. At-Takatsur [102]: 1-2). Kemudian diberi keringanan berziarah untuk mengingat mati dan mempersiapkan diri untuk kehidupan akhirat, sebagaimana yang diingatkan hadits yang diriwayatkan Ibnu Majah dengan sanad shahih:</span><br></p><p>كُنْتُ نَهَيْتُكُمْ عَنْ زِيَارَةِ الْقُبُورِ فَزُورُوا الْقُبُورَ فَإِنَّهَا تُزَهِّدُ فِى الدُّنْيَا وَتُذَكِّرُ الآخِرَةَ</p><p>“Dulu aku melarang kamu ziarah kubur. Ziarahlah kamu ke kubur, karena sesungguhnya ziarah kubur itu membuat zuhud di dunia dan mengingatkan kepada akhirat”.&nbsp; Dan hadits-hadits lain tentang ini yang diriwayatkan Imam Muslim dan lainnya.</p><p>&nbsp;Kaum muslimin telah Ijma’ tentang anjuran ziarah kubur, wajib menurut Mazhab Zhahiriah, hanya mereka menyatakan bahwa ziarah itu khusus bagi laki-laki, bukan untuk perempuan. Ketika Rasulullah Saw melihat bahwa perempuan pergi ziarah itu mengandung hal-hal tidak baik, maka Rasulullah Saw melarang mereka ziarah kubur. Izin ziarah kubur bagi laki-laki tetap berlaku. Ulama lain menyatakan bahwa larangan ziarah kubur bagi perempuan adalah pada masa lalu karena larangan yang bersifat umum, yaitu larangan ziarah kubur. Kemudian ada izin bagi laki-kai. Larangan tetap berlanjut bagi perempuan. Bagaimana pun juga, ada beberapa pendapat tentang ziarah kubur bagi perempuan, diringkas dalam beberapa poin berikut:</p><p>Pertama, haram secara mutlak, apakah ketika perempuan melakukan ziarah itu ada fitnah dan hal tidak baik atau pun tidak ada. Dalilnya adalah hadits:</p><p>أَنَّ رَسُولَ اللَّهِ -r- لَعَنَ زَوَّارَاتِ الْقُبُورِ</p><p>“Sesungguhnya Rasulullah Saw melaknat perempuan-perempuan yang ziarah kubur”. (HR. at-Tirmidzi). At-Tirmidzi berkata, “Hadits hasan shahih”. Akan tetapi al-Qurthubi berkata, “Ada kemungkinan mengandung makna bahwa haram jika dilakukan beramai-ramai. Karena menggunakan kata: زَوَّارَاتِ dalam bentuk Shighat Mubalaghah.</p><p>Kedua, haram ketika dikhawatirkan terjadi fitnah atau hal tidak baik. Berdasarkan ini diharamkan bagi pemudi ziarah kubur, demikian juga dengan wanita dewasa jika berhias berlebihan atau menggunakan sesuatu yang menarik perhatian. Dibolehkan bagi wanita tua yang tidak menimbulkan fitnah, tetap haram jika melakukan perbuatan yang diharamkan, seperti meratap dan perbuatan lain yang dilarang Rasulullah Saw:</p><p>لَيْسَ مِنَّا مَنْ لَطَمَ الْخُدُودَ ، وَشَقَّ الْجُيُوبَ ، وَدَعَا بِدَعْوَى الْجَاهِلِيَّةِ</p><p>“Bukan golongan kami orang yang menampar wajah, merobek kantong dan menyerukan seruan-seruan Jahiliah”. (HR. al-Bukhari, Muslim dan lainnya).</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Tidak mudah bagi perempuan melepaskan diri dari tradisi-tradisi tidak baik ini. Dalam hadits Ummu ‘Athiyyah disebutkan, “Ketika berbai’at, Rasulullah Saw mengambil janji dari kami agar jangan meratapi orang yang meninggal dunia. Tidak ada yang memenuhi janji itu dari kami selain lima orang perempuan”. (HR. al-Bukhari).</p><p>Ketika istri-istri Ja’far bin Abi thalib menangis saat Ja’far mati syahid, Rasulullah Saw memerintahkan seorang laki-laki agar melarang mereka menangis, dua kali dilarang namun mereka tidak patuh. Rasulullah Saw memerintahkan laki-laki itu agar menyiramkan debu ke mulut mereka. (HR. al-Bukhari).</p><p>Ketiga, makruh. Dalilnya adalah Qiyas. Diqiyaskan kepada mengiringi jenazah. Juga berdasarkan hadits Ummu ‘Athiyyah, “Rasulullah Saw melarang kami mengiringi jenazah. Akan tetapi Rasulullah Saw tidak bersikap keras terhadap kami”. (HR. al-Bukhari, Muslim dan lainnya).</p><p>Keempat, boleh. Dalilnya adalah Rasulullah Saw tidak mengingkari Aisyah ketika ia pergi ke pemakaman al-Baqi’. Rasulullah Saw mengajarkan kepada Aisyah ketika ziarah kubur agar mengucapkan:</p><p>السَّلاَمُ عَلَيْكُمْ دَارَ قَوْمٍ مُؤْمِنِينَ وَأَتَاكُمْ مَا تُوعَدُونَ غَدًا مُؤَجَّلُونَ وَإِنَّا إِنْ شَاءَ اللَّهُ بِكُمْ لاَحِقُونَ</p><p>“Keselamatan untuk kamu wahai negeri kaum mu’min. Telah datang kepada kamu apa yang dijanjikan untuk kamu esok hari masanya ditentukan. Sesungguhnya insya Allah kami menyertai kamu”. (HR. Muslim). Juga sebagaimana diriwayatkan bahwa Rasulullah Saw melewati seorang perempuan yang menangis di sisi kubur. Rasulullah Saw memerintahkannya agar bertakwa dan bersabar. Rasulullah Saw melarangnya menangis karena Rasulullah Saw mendengar sesuatu yang tidak ia sukai; ratapan dan lainnya. Rasulullah Saw tidak melarangnya ziarah kubur.</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Kelima, dianjurkan, sama seperti anjuran ziarah kubur bagi laki-laki. Dalilnya adalah izin dari Rasulullah Saw yang bersifat umum:</p><p>فزوروها</p><p>“Maka lakukanlah ziarah kubur”.</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Tiga pendapat terakhir berlaku ketika aman dari fitnah dan hal yang tidak baik. Jika terjadi fitnah dan hal yang tidak baik, maka haram bagi perempuan melakukan ziarah kubur. Dengan demikian maka jawaban telah dapat difahami. Meskipun saya cenderung kepada pendapat yang menyatakan makruh, jika tidak ada hal-hal yang diharamkan dan terlarang seperti membuka aurat, ratapan, menampar wajah, duduk diatas kubur, menginap di kuburan dan lain sebagainya. Lebih utama bagi perempuan menetap di rumah, tidak pergi meninggalkan rumah kecuali ada keperluan yang mendesak, untuk memelihara perempuan dari hal-hal yang tidak baik.</p><p><br></p><p><br></p><p>[1] Fatawa al-Azhar, juz. IX, hal. 462 [Maktabah Syamilah].</p>', NULL, 'perempuan-dan-ziarah-kubur.jpeg', 'tanya jawab,hukum,perempuan berziarah,hukum ziarah', 'admin', 0, 1, 0, 14, 1, '2020-09-10 03:05:39', '2020-09-10 11:41:37');
INSERT INTO `news` (`id`, `id2`, `schedule`, `title`, `sub_title`, `slug`, `detail`, `embed`, `img_news`, `tag`, `author`, `slide`, `breaking`, `featured`, `hit`, `status`, `created_at`, `updated_at`) VALUES
(7, 7, 0, 'Demi Pembangunan Masjid, Aa Gym Lelang Motor BMW GS 310 Kesayangan', '\"Ini adalah motor BMW GS 310 2019 dan baru sekitar 1000 kilometer, Alhamdulillah Allah menitipkan ini sebagai rejeki dari Allah untuk Aa dan kali ini akan dilelang, siapa sahabat-sahabat yang suka turing. Kita adalah turing, silaturahmi, dan taklim, seluruh dananya akan diwakafkan untuk pembangunan Masjid,\"', 'demi-pembangunan-masjid-aa-gym-lelang-motor-bmw-gs-310-kesayangan', '<p>Sumber&nbsp;<a href=\"https://seleb.tempo.co/read/1381999/demi-pembangunan-masjid-aa-gym-lelang-motor-bmw-gs-310-kesayangan\" target=\"_blank\">Tempo</a>,&nbsp;</p><p style=\"margin: 1em 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: medium; line-height: 22px; font-family: Roboto, HelveticaNeueW01-45Light, Helvetica, Arial; vertical-align: baseline; letter-spacing: 0.16px; text-rendering: optimizespeed; -webkit-font-smoothing: antialiased; color: rgb(51, 51, 51);\"><span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">TEMPO.CO</span>,&nbsp;<span style=\"margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;\">Jakarta</span>&nbsp;-Pendakwah Abdullah Gymnastiar atau yang akrab disapa dengan&nbsp;<a href=\"https://www.tempo.co/tag/aa-gym\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(0, 176, 255);\">Aa Gym</a>&nbsp;baru saja mengumumkan bahwa dia akan melelang motor BMW GS 310 tahun 2019. Nantinya, dana hasil lelang tersebut akan disalurkan untuk pembangun Masjid&nbsp;Rahmatan Lil \'alamin di Jalan Tugu Desa Karyawangi, Parompong, Kabupaten Bandung Barat.</p><p style=\"margin: 1em 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: medium; line-height: 22px; font-family: Roboto, HelveticaNeueW01-45Light, Helvetica, Arial; vertical-align: baseline; letter-spacing: 0.16px; text-rendering: optimizespeed; -webkit-font-smoothing: antialiased; color: rgb(51, 51, 51);\">Aa Gym mengumumkan pelaksanaan lelang tersebut melalui akun resmi Instagram pribadi @aagym yang berdurasi kurang lebih dua menit.</p><p style=\"margin: 1em 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: medium; line-height: 22px; font-family: Roboto, HelveticaNeueW01-45Light, Helvetica, Arial; vertical-align: baseline; letter-spacing: 0.16px; text-rendering: optimizespeed; -webkit-font-smoothing: antialiased; color: rgb(51, 51, 51);\">\"Ini adalah motor BMW GS 310 2019 dan baru sekitar 1000 kilometer, Alhamdulillah Allah menitipkan ini sebagai rejeki dari Allah untuk Aa dan kali ini akan dilelang, siapa sahabat-sahabat yang suka turing. Kita adalah turing, silaturahmi, dan taklim, seluruh dananya akan diwakafkan untuk pembangunan Masjid,\" kata pendiri Pondok Pesantren Daarut Tauhiid, Aa Gym di video yang diunggah di akun Instagramnya, Rabu, 2 September 2020.</p><p style=\"margin: 1em 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: medium; line-height: 22px; font-family: Roboto, HelveticaNeueW01-45Light, Helvetica, Arial; vertical-align: baseline; letter-spacing: 0.16px; text-rendering: optimizespeed; -webkit-font-smoothing: antialiased; color: rgb(51, 51, 51);\">Dia juga menyatakan bahwa motor yang bisa dipakai untuk turing itu masih dalam kondisi yang sangat baik dan bagus. Motor ini juga sudah di modifikasi oleh Aa Gym.</p><div style=\"margin: 0px auto; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: medium; line-height: inherit; font-family: Roboto, HelveticaNeueW01-45Light, Helvetica, Arial; vertical-align: baseline; letter-spacing: 0.16px; width: 640px; max-width: 640px; position: relative;\"><div id=\"aniBox\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; overflow: hidden; transition: height 1s ease 0s; width: 336px; height: 1px; opacity: 0;\"><div id=\"aniplayer_aniviewJS8720932\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; z-index: 10000001; position: fixed; bottom: 0px; left: 0px; transform: scale(1); transform-origin: left bottom; visibility: hidden;\"><div id=\"aniplayer_aniviewJS8720932gui\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"><div id=\"av-container\" class=\" av-desktop hide-controls\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; position: relative; width: 336px; height: 189px; background: black; overflow: hidden; text-align: initial;\"><div id=\"av-inner\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; position: absolute; top: 0px; left: 0px; width: 336px; height: 189px;\"><div id=\"slot\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; position: absolute; width: 336px; height: 189px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 0px 1px inset;\"><div id=\"imgpreloader\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; width: 336px; height: 189px; z-index: 99999; position: absolute; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><iframe id=\"ani_passback\" scrolling=\"no\" width=\"100%\" height=\"100%\" frameborder=\"0\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; font: inherit; vertical-align: baseline; height: 189px; overflow: hidden;\"></iframe></div><div id=\"videoslot\" class=\"loaded\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; position: absolute; top: 94.5px; transform: translateY(-50%); left: 0px; right: 0px; bottom: 0px; width: 336px; object-fit: initial; opacity: 1; animation: 0.5s ease 0s 1 normal none running fade-in; height: 189px;\"><div id=\"AVplayer0\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; position: absolute; z-index: 1; width: 336px; height: 189px;\"><div style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; width: 336px; height: 189px;\"><iframe src=\"about:blank\" scrolling=\"no\" allow=\"autoplay\" style=\"margin: 0px; padding: 0px; border-width: initial; border-style: none; font: inherit; vertical-align: baseline; width: 336px; height: 189px; display: block; opacity: 0; position: absolute; top: 0px;\"></iframe></div></div></div></div></div></div></div><div id=\"anibid\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;\"></div></div></div></div><div id=\"inarticle\" data-google-query-id=\"CJHzjs3N3esCFaeNSwUd91sHxQ\" style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: medium; line-height: inherit; font-family: Roboto, HelveticaNeueW01-45Light, Helvetica, Arial; vertical-align: baseline; letter-spacing: 0.16px;\"><div id=\"google_ads_iframe_/14056285/tempo.co/desktop_seleb_inarticle_0__container__\" style=\"margin: 0px; padding: 0px; border: 0pt none; font: inherit; vertical-align: baseline;\"><iframe id=\"google_ads_iframe_/14056285/tempo.co/desktop_seleb_inarticle_0\" title=\"3rd party ad content\" name=\"google_ads_iframe_/14056285/tempo.co/desktop_seleb_inarticle_0\" width=\"1\" height=\"1\" scrolling=\"no\" marginwidth=\"0\" marginheight=\"0\" frameborder=\"0\" data-google-container-id=\"1\" data-load-complete=\"true\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; font: inherit; vertical-align: bottom;\"></iframe></div></div><p style=\"margin: 1em 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: medium; line-height: 22px; font-family: Roboto, HelveticaNeueW01-45Light, Helvetica, Arial; vertical-align: baseline; letter-spacing: 0.16px; text-rendering: optimizespeed; -webkit-font-smoothing: antialiased; color: rgb(51, 51, 51);\">\"Silakan rekan-rekan sekalian, Insya Allah mulus dan Aa sendiri sangat suka dengan motor ini, tapi bukankah kita harus memberi kepada yang kita lebih sukai.&nbsp;<a href=\"https://www.tempo.co/tag/motor\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(0, 176, 255);\">Motor</a>&nbsp;ini juga sudah full modifikasi,\" kata Aa Gym.</p><p style=\"margin: 1em 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: medium; line-height: 22px; font-family: Roboto, HelveticaNeueW01-45Light, Helvetica, Arial; vertical-align: baseline; letter-spacing: 0.16px; text-rendering: optimizespeed; -webkit-font-smoothing: antialiased; color: rgb(51, 51, 51);\">Aa Gym memberikan waktu selama satu minggu untuk siapa saja yang ingin memiliki motor kesayangannya yang baru melakukan jarak tempuh 1073 km.<img src=\"https://cdn.tmpo.co/data/2019/03/11/id_825509/825509_720.jpg\" width=\"100%\" style=\"margin: 0px auto; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; display: block; width: auto !important; max-width: 728px;\"><small style=\"margin: 0px; padding: 0px; border: 0px; font-style: italic; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 11px; line-height: 0em; font-family: inherit; vertical-align: baseline; color: grey;\">Aa Gym. Instagram/@aagym</small></p><p style=\"margin: 1em 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: medium; line-height: 22px; font-family: Roboto, HelveticaNeueW01-45Light, Helvetica, Arial; vertical-align: baseline; letter-spacing: 0.16px; text-rendering: optimizespeed; -webkit-font-smoothing: antialiased; color: rgb(51, 51, 51);\">\"1073 KM, selama satu minggu motor ini di lelang. Semoga menjadi pahala yang mengalir tiada terputus bagi yang memiliki dan juga kita semua yang nantinya akan melaksanakan sholat di Masjid ini,\" kata Aa Gym menjelaskan.</p><p style=\"margin: 1em 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: medium; line-height: 22px; font-family: Roboto, HelveticaNeueW01-45Light, Helvetica, Arial; vertical-align: baseline; letter-spacing: 0.16px; text-rendering: optimizespeed; -webkit-font-smoothing: antialiased; color: rgb(51, 51, 51);\">Aa Gym juga&nbsp; telah melakukan pembebasan tanah yang nantinya akan dijadikan Masjid Rohmatan Lillalamin yang dengan hadirnya juga Pondok Pesantren Eco yang ke-2.</p><p style=\"margin: 1em 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: medium; line-height: 22px; font-family: Roboto, HelveticaNeueW01-45Light, Helvetica, Arial; vertical-align: baseline; letter-spacing: 0.16px; text-rendering: optimizespeed; -webkit-font-smoothing: antialiased; color: rgb(51, 51, 51);\">\"Assalamualaikum sahabat sekalian, kita berada di tanah wakaf yang baru di bebaskan, nanti di sini akan di bangun Masjid Rohmatan Lillalamin, Eco Pesantren yang ke-2 Alhamdulillah,\" jelas Aa Gym.</p><p style=\"margin: 1em 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: medium; line-height: 22px; font-family: Roboto, HelveticaNeueW01-45Light, Helvetica, Arial; vertical-align: baseline; letter-spacing: 0.16px; text-rendering: optimizespeed; -webkit-font-smoothing: antialiased; color: rgb(51, 51, 51);\">Masjid dan pesantren rencananya akan memanfaatkan apa yang alam miliki tanpa merusak lingkungan sekitar. \"Masjid ini akan dibangun seindah mungkin dan berwawasan alam, penggunaan cahaya matahari maksimal, angin dan air. Sehingga, membawa bukti Islam membawa Rahmat seisi alam ini,\" kata Aa Gym.</p><p style=\"margin: 1em 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: medium; line-height: 22px; font-family: Roboto, HelveticaNeueW01-45Light, Helvetica, Arial; vertical-align: baseline; letter-spacing: 0.16px; text-rendering: optimizespeed; -webkit-font-smoothing: antialiased; color: rgb(51, 51, 51);\">\"Insyaallah luas yang sudah dibebaskan itu sekitar 4,6 hektar dan akan kita perluas lagi karena akan dibangun pesantren di sini, dan pembangunan juga insyaallah tidak akan merusak alam dan lingkungan sekitar,\" tutur pendakwah, penyanyi dan juga penulis buku yang asli dari Bandung, Jawa Barat itu.</p><p style=\"margin: 1em 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: medium; line-height: 22px; font-family: Roboto, HelveticaNeueW01-45Light, Helvetica, Arial; vertical-align: baseline; letter-spacing: 0.16px; text-rendering: optimizespeed; -webkit-font-smoothing: antialiased; color: rgb(51, 51, 51);\">Sebagaimana diketahui bersama, motor besutan perusahaan asal Jerman,&nbsp;<a href=\"https://www.tempo.co/tag/bmw\" style=\"margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; color: rgb(0, 176, 255);\">BMW</a>&nbsp;tipe GS 310 ini memiliki tubuh yang sangat cocok untuk diajak bertualang dengan dibekali mesin satu silinder berkapasitas 313 cc. Dengan mesin itu, motor ini sanggup menghadirkan tenaga 34 hp dengan torsi maksimum mencapai 28 Nm pada putaran 7.500 rpm.</p>', NULL, 'demi-pembangunan-masjid-aa-gym-lelang-motor-bmw-gs-310-kesayangan.jpg', NULL, 'admin', 0, 0, 1, 11, 1, '2020-09-10 03:08:41', '2020-09-10 11:42:03'),
(8, 8, 0, 'Sunnah Memanah & Naik Kuda', 'Rasulullah shallallahu \'alaihi wasallam berada di atas mimbar dan berkata: \"Dan persiapkan untuk mereka apa yang kalian mampu berupa kekuatan. Ketahuilah bahwa kekuatan itu adalah memanah, ketahuilah bahwa kekuatan itu adalah memanah, ketahuilah bahwa kekuatan itu adalah memanah!', 'sunnah-memanah-naik-kuda', '<p><span style=\"font-size: 1rem;\">Rasulullah shallallahu \'alaihi wasallam berada di atas mimbar dan berkata: \"Dan persiapkan untuk mereka apa yang kalian mampu berupa kekuatan. Ketahuilah bahwa kekuatan itu adalah memanah, ketahuilah bahwa kekuatan itu adalah memanah, ketahuilah bahwa kekuatan itu adalah memanah!</span><br></p><p><br></p><p>(HR. Abu Daud)</p><p><br></p><p>Rasulullah shallallahu \'alaihi wasallam bersabda: \"Sesungguhnya Allah \'azza wajalla akan memasukkan tiga orang ke dalam surga lantaran satu anak panah. Yakni, orang yang membuatnya dengan berharap memperoleh kebaikan, orang yang memanahkannya dan orang yang menyiapkannya.\" Beliau juga bersabda: \"Berlatihlah memanah dan berkuda. Dan jika kalian memilih memanah maka hal itu lebih aku sukai daripada berkuda. Dan tiga hal yang tidak termasuk sia-sia; latihan berkuda, senda gurau bersama isteri dan melepaskan panah dari busurnya. Barangisapa meninggalkan melempar panah setelah diajari karena berpaling darinya maka sungguh itu merupakan nikmat yang ia tinggalkan.\"</p><p><br></p><p>(HR. Ahmad)</p><p><br></p>', NULL, 'sunnah-memanah-naik-kuda.png', NULL, 'admin', 0, 0, 0, 11, 1, '2020-09-10 03:21:45', '2020-09-10 08:52:29'),
(9, 9, 0, 'Manakah yang lebih utama di masa pandemi Covid-19, sedekah atau berkurban?', 'Inilah yang dibahas Ustaz Adi Hidayat dalam ceramahnya di YouTube Adi Hidayat Official.  Dalam video berjudul \"Tanya - Jawab seputar Dzulhijjah Sesi #4 - Ustadz Adi Hidayat\" Ustaz Adi Hidayat', 'manakah-yang-lebih-utama-di-masa-pandemi-covid-19-sedekah-atau-berkurban', '<p>TRIBUNLAMPUNG.CO.ID - Manakah yang lebih utama di masa pandemi Covid-19, sedekah atau berkurban?</p><p><span style=\"font-size: 1rem;\">Inilah yang dibahas Ustaz Adi Hidayat dalam ceramahnya di YouTube Adi Hidayat Official.&nbsp;&nbsp;</span><span style=\"font-size: 1rem;\">Dalam video berjudul \"Tanya - Jawab seputar Dzulhijjah Sesi #4 - Ustadz Adi Hidayat\" Ustaz Adi Hidayat membahas mengenai mana yang paling utama antara sedekah atau berkurban di masa pandemi Covid-19.&nbsp;</span><span style=\"font-size: 1rem;\">Artikel ini telah tayang di tribunlampung.co.id dengan judul Ceramah Ustaz Adi Hidayat tentang Mana Paling Utama Bersedekah Atau Berkurban di Pandemi Covid-19, </span><a href=\"https://lampung.tribunnews.com/2020/07/26/ceramah-ustaz-adi-hidayat-tentang-mana-paling-utama-bersedekah-atau-berkurban-di\" target=\"_blank\">https://lampung.tribunnews.com/2020/07/26/ceramah-ustaz-adi-hidayat-tentang-mana-paling-utama-bersedekah-atau-berkurban-di</a><span style=\"font-size: 1rem;\"> pandemi-covid-19.</span></p><p>Ustaz Adi Hidayat mengatakan, yang lebih utama adalah menggabungkan keduanya antara bersedekah dengan berkurban.&nbsp;</p><p><br></p><p>\"Dengan anda berniat berkurban, bukankah saat bersamaan anda pun membantu saudara-saudari kita yang tengah merasakan kesulitan tertentu dalam situasi seperti ini,\" ujar Ustaz Adi Hidayat.&nbsp;</p><p><span style=\"font-size: 1rem;\">Di masa-masa seperti ini mungkin, kata Ustaz Adi Hidayat, ada saudara-saudari kita yang membutuhkan bantuan untuk ketahanan pangan.&nbsp;</span><br></p><p><span style=\"font-size: 1rem;\">Hanya, lanjut Ustaz Adi Hidayat, ada kejadian-kejadian spesifik.&nbsp;&nbsp;</span><span style=\"font-size: 1rem;\">Misal dalam kondisi akan berkurban, ada tetangga punya kesulitan tertentu seperti akan operasi penyakit tertentu atau kondisi keuangan sulit.&nbsp;&nbsp;</span><span style=\"font-size: 1rem;\">Artikel ini telah tayang di tribunlampung.co.id dengan judul Ceramah Ustaz Adi Hidayat tentang Mana Paling Utama Bersedekah Atau Berkurban di Pandemi Covid-19, https://lampung.tribunnews.com/2020/07/26/ceramah-ustaz-adi-hidayat-tentang-mana-paling-utama-bersedekah-atau-berkurban-di-pandemi-covid-19.</span></p><p>\"Ada hal yang dibutuhkan bukan daging kurban misalnya. Maka mana yang kemudian didahulukan dalam hal ini?\" ucap Ustaz Adi Hidayat.&nbsp;</p><p><span style=\"font-size: 1rem;\">Ustaz Adi Hidayat berpedoman pada fikih prioritas.&nbsp;</span><span style=\"font-size: 1rem;\">Artikel ini telah tayang di tribunlampung.co.id dengan judul Ceramah Ustaz Adi Hidayat tentang Mana Paling Utama Bersedekah Atau Berkurban di Pandemi Covid-19, https://lampung.tribunnews.com/2020/07/26/ceramah-ustaz-adi-hidayat-tentang-mana-paling-utama-bersedekah-atau-berkurban-di-pandemi-covid-19.</span></p><p>Dalam fikih prioritas, jelas Ustaz Adi Hidayat, membantu yang darurat lebih dibutuhkan apalagi termasuk dalam lima hal pokok.&nbsp;</p><p><span style=\"font-size: 1rem;\">Yaitu menjaga jiwa, menjaga keturunan, menjaga harta dan lain sebagainya.&nbsp;&nbsp;</span><span style=\"font-size: 1rem;\">\"Ada orang sakit harus operasi kalau tidak ada support secara ikhtiar bisa bermasalah serius dibandingkan kurban. Yang ini (kurban) bisa ditunaikan di waktu lain,\" ujar Ustaz Adi Hidayat.&nbsp;</span></p><p><span style=\"font-size: 1rem;\"><br></span><span style=\"font-size: 1rem;\">Artikel ini telah tayang di tribunlampung.co.id dengan judul Ceramah Ustaz Adi Hidayat tentang Mana Paling Utama Bersedekah Atau Berkurban di Pandemi Covid-19,&nbsp;</span>Bahkan, lanjut dia, hukumnya bisa berbeda menolong orang kesulitan dengan kadar tadi bisa menjadi wajib jika kita mampu.</p><p><span style=\"font-size: 1rem;\">\"Dan kurban sunah muakkad. Dalam kondisi ini, kita bisa mendahulukan membantu kawan yang kesulitan ini,\" ucap Ustaz Adi Hidayat.&nbsp;&nbsp;</span><span style=\"font-size: 1rem;\">\"Maka dengan izin Allah SWT, kita bisa mendapat dua pahala. Satu pahala membantu. Kedua pahala niat berkurban,\" tuturnya.&nbsp;</span><span style=\"font-size: 1rem;\">Artikel ini telah tayang di tribunlampung.co.id dengan judul Ceramah Ustaz Adi Hidayat tentang Mana Paling Utama Bersedekah Atau Berkurban di Pandemi Covid-19,&nbsp;</span></p><p><iframe frameborder=\"0\" src=\"//www.youtube.com/embed/4xIxQzjTffI\" width=\"640\" height=\"360\" class=\"note-video-clip\"></iframe><span style=\"font-size: 1rem;\"><br></span></p>', NULL, 'manakah-yang-lebih-utama-di-masa-pandemi-covid-19-sedekah-atau-berkurban.jpeg', 'Kurban,Ustadz Adi hidayat', 'admin', 0, 0, 0, 13, 1, '2020-09-10 03:29:45', '2020-09-10 09:43:45'),
(10, 10, 0, 'Muamalah Dalam Islam, Pengertian, Konsep, Dan Contohnya', 'Di dalam islam ada yang disebut dengan muamalah, dan sebagai seorang muslim, kita harus mengetahui apa itu muamalah dalam islam. Artikel ini akan membahas tentang pengertian muamalah dalam islam. selamat membaca.', 'muamalah-dalam-islam-pengertian-konsep-dan-contohnya', '<p><span style=\"font-size: 1rem;\">Di dalam islam ada yang disebut dengan muamalah, dan sebagai seorang muslim, kita harus mengetahui apa itu muamalah dalam islam.&nbsp;</span><span style=\"font-size: 1rem;\">Artikel ini akan membahas tentang pengertian muamalah dalam islam.&nbsp;</span><span style=\"font-size: 1rem;\">selamat membaca.</span></p><p><br></p><p><span style=\"font-size: 1rem;\">Pengertian Muamalah Dalam Islam</span><br></p><p><span style=\"font-size: 1rem;\">Muamalah menurut istilah yaitu menghasilkan sesuatu yang berhubungan dengan duniawi yang mendukung juga menghasilkan dalam ukhrowi juga.&nbsp;</span><span style=\"font-size: 1rem;\">Definisi tersebut di kemukakan oleh Al Dimyati. Muamalah terkait juga dengan jual beli, sanksi dan lain sebagainya dalam Islam.&nbsp;</span><span style=\"font-size: 1rem;\">Menurut Muhammad Yusuf Musa yaitu aturan oleh Allah yang harus dilaksanakan dan juga disampaikan oleh setiap manusia yang hidup di dunia ini dalam rangka untuk kepentingan dan kebutuhan manusia.</span></p><p><span style=\"font-size: 1rem;\">Dari dua definisi di atas, maka dapat diambil arti dari muamalah merupakan semua peraturan yang dibuat oleh Allah SWT yang digunakan untuk hubungan manusia dengan manusia lain dalam kehidupan di dunia.&nbsp;</span><span style=\"font-size: 1rem;\">Tetapi menurut pendapat Louis Ma’luf muamalah yaitu hukum-hukum syara yang berhubungan dengan urusan dunia, dan kehidupan manusia, seperti jual beli, perdagangan dan lain sebagainya.</span></p><p><span style=\"font-size: 1rem;\">Menurut Ahmad Ibrahim bek yang juga memberikan pemahaman tentang muamalah, yaitu peraturan dan peraturan tentang kebendaan, perkawinan, thalak, sanksi-persetujuan, peradilan dan yang berkaitan dengan manajemen perkantoran, baik umum maupun yang terkait dengan peraturan perundang-undangan atau global dan terperinci untuk dijadikan petunjuk bagi manusia dalam bertukar Manfaat di antara mereka.</span><br></p><p><span style=\"font-size: 1rem;\">Pengertian muamalah secara umum berkaitan dengan perdebatan hukum waris, namun demikian dalam kajian fiqih kontemporer perdebatan atau hal yang memuat tentang hukum waris telah dibahas dalam kelimuan sendiri, oleh sebab itu kemudian muamalah yang memiliki arti tidak ada di sana.</span><br></p><p><span style=\"font-size: 1rem;\">&nbsp;</span><br></p><p>Resolusi tinggi hanya terbatas hanya dibatasi atas dasarnya saja.</p><p><span style=\"font-size: 1rem;\">Sementara muamalah dalam arti sempit atau dalam arti luas yang dimiliki oleh sama-sama halnya dengan manusia yang berkaitan dengan masalah-masalah keuangan atau pemutaran harta.&nbsp;</span><span style=\"font-size: 1rem;\">Menurut bahasa, muamalah bersumber dari kata aamala, yuamila, muamalat yang artinya perlakukan atau bertindak terhadap orang lain, hubungan kepentingan.</span></p><p><span style=\"font-size: 1rem;\">Kata seperti ini termasuk kata kerja aktif yang harus memiliki dua buah kejahatan, yang satu terhadap yang saling melakukan pekerjaan, membuat kedua yang terkait saling bekerja dari satu dengan lainnya.</span><br></p><p><span style=\"font-size: 1rem;\">Konsep Muamalah Dalam Islam</span><br></p><p><span style=\"font-size: 1rem;\">Setiap kegiatan usaha yang dilakukan oleh manusia pada dasarnya adalah kumpulan transaksi ekonomi yang mengikuti urutan tertentu.&nbsp;</span><span style=\"font-size: 1rem;\">Dalam Islam, transaksi utama dalam kegiatan usaha adalah transaksi nyata yang melibatkan objek tertentu, baik objek dalam bentuk barang maupun jasa.&nbsp;</span><span style=\"font-size: 1rem;\">melayani kegiatan usaha yang muncul karena manusia menginginkan sesuatu yang tidak dapat atau tidak ingin mereka lakukan sesuai dengan kodratnya, orang harus berusaha menjalin kerjasama di antara mereka.</span></p><p><span style=\"font-size: 1rem;\">Kerjasama dalam usaha yang sesuai dengan prinsip-prinsip Syariah pada dasarnya dapat dikelompokkan menjadi:</span><br></p><p><span style=\"font-size: 1rem;\">Bekerja sama dalam kegiatan usaha.</span><br></p><p>Dalam hal ini salah satu pihak dapat menjadi pemodal di mana manfaat yang diperoleh dari pembiayaan dapat dibuat untuk hasilnya.&nbsp;<span style=\"font-size: 1rem;\">Kolaborasi ini dapat dalam bentuk pembiayaan bisnis 100% melalui akad mudharaba atau pembiayaan usaha bersama melalui kontrak musyarakah.&nbsp;</span><span style=\"font-size: 1rem;\">Kerjasama dalam perdagangan, di mana untuk meningkatkan perdagangan, fasilitas tertentu dapat disediakan untuk pembayaran dan pengiriman objek.&nbsp;</span><span style=\"font-size: 1rem;\">Karena pihak yang menerima fasilitas akan mendapat manfaat, pihak yang menyediakan fasilitas memiliki hak untuk mendapatkan bagi hasil yang dapat dalam bentuk yang berbeda dari harga tunai.</span></p><p>Kerjasama dalam penyewaan aset di mana objek transaksi adalah manfaat menggunakan aset.</p><p>Aktivitas hubungan manusia dengan manusia (muamalah) dalam perekonomian menurut Syariah&nbsp;<span style=\"font-size: 1rem;\">islam harus memenuhi pilar dan kondisi tertentu.&nbsp;</span><span style=\"font-size: 1rem;\">Rukun adalah hal-hal yang harus ada dan merupakan dasar untuk sesuatu terjadi, yang bersama-sama akan menghasilkan validitas.</span></p><p><span style=\"font-size: 1rem;\">Rukun transaksi ekonomi Syariah sebagai berikut:</span><br></p><p><span style=\"font-size: 1rem;\">Pihak-pihak yang melakukan transaksi, seperti penjual dan pembeli, penyewa dan penyewa, penyedia layanan dan penerima layanan.&nbsp;</span><span style=\"font-size: 1rem;\">Adanya barang (maal) atau jasa (amal) yang menjadi objek transaksi.&nbsp;</span><span style=\"font-size: 1rem;\">Ada kesepakatan bersama dalam bentuk perjanjian untuk menyerahkan (ijab) bersama dengan kesepakatan untuk menerima (Kabul).</span></p><p>Selain itu, juga harus dipenuhi dengan kondisi atau segala sesuatu yang merupakan pelengkap rukun yang relevan.</p><p><br></p><p>Misalnya, ketentuan pihak yang melakukan transaksi adalah sah, ketentuan objek transaksi adalah spesifik atau tertentu, jelas sifatnya, ukurannya jelas, bermanfaat dan nilainya jelas.</p><p><br></p><p>Objek transaksi menurut Syariah dapat mencakup barang (maal) atau jasa, bahkan jasa juga dapat mencakup layanan dari penggunaan hewan.</p><p><br></p><p>Pada prinsipnya, objek transaksi dapat dibagi menjadi:</p><p><br></p><p>sebuah objek yang pasti (ayn), yaitu objek yang keberadaannya jelas atau dapat segera diuntungkan.</p><p>objek yang masih merupakan liabilitas (dayn), yaitu objek yang muncul sebagai akibat dari transaksi yang bukan tunai.</p><p>Secara garis besar, akad dalam muamalah fiqh adalah sebagai berikut:</p><p><br></p><p><br></p><p>&nbsp;</p><p>1. Akad Mudharaba</p><p>Ikatan atau akad Mudharaba pada dasarnya adalah ikatan penggabungan atau pencampuran dalam bentuk hubungan kerja sama antara Pemilik Bisnis dan Pemilik Properti.</p><p><br></p><p>2. Akad Musyarakah</p><p>Akad atau ikatan musyarakah pada dasarnya adalah ikatan penggabungan atau pencampuran antara pihak-pihak yang bersama-sama menjadi Pemilik usaha.</p><p><br></p><p>3. Akad Perdagangan</p><p>Akad fasilitas Perdagangan, perjanjian pertukaran keuangan untuk transaksi jual beli dimana salah satu pihak menyediakan fasilitas untuk menunda pembayaran atau penyerahan objek sehingga pembayaran atau penyerahan tidak dilakukan secara tunai atau pada saat transaksi.</p><p><br></p><p>4. Akad Ijarah</p><p>Akad ijarah merupakan akad yang memberikan hak untuk memanfaatkan Objek melalui penguasaan sementara atau meminjam Objek dengan Manfaat tertentu untuk membayar hadiah kepada pemilik Objek.</p><p><br></p><p>Ijarah mirip dengan leasing tetapi tidak sepenuhnya sama dengan leasing, karena Ijarah didasarkan pada transfer manfaat tetapi tidak ada transfer kepemilikan.</p><p><br></p><p>Baca Juga: Pengertian Hukum Islam</p><p><br></p><p>Macam-Macam Muamalah Dalam Islam</p><p>macam-macam mumalah dalam islam</p><p>pixabay.com</p><p>Berikut adalah macam-macam muamalah dalam islam:</p><p><br></p><p>1. Syirkah</p><p>salah satu Macam Macam Muamalah yaitu syirkah. Syirkah dalam arti bahasa yaitu kerjasama, kongsi, atau bersyarikat.</p><p><br></p><p>Syirkah pada kenyataan dalam kegiatan ekonomi merupakan suatu usaha untuk menggabungkan sumberdaya yang dimiliki untuk mencapai tujuan bersama, sumberdaya yang dimaksud bisa berupa modal uang, keahlian, bahan baku, jaringan kerja, dan dilakukan oleh dua orang atau lebih</p><p><br></p><p>Dalam ekonomi konvensional akad ini biasa disebut joint venture.</p><p><br></p><p>Tidak ada perbedaan secara signifikan pada akad ini kecuali bahwa dalam ekonomi islam kegiatan usaha tidak boleh melanggar aturan syariat dan negara. Seperti perkongsian untuk kartel narkoba, minuman keras, atau jual beli komoditas yang diharamkan agama.</p><p><br></p><p>2. Mudharabah</p><p>Merupakan akad untuk mengikat kerjasama antara dua belah pihak yaitu pemodal (shahib al-mal) dan pelaksana usaha (mudharib), akad mudharabah juga disebut bagi hasil bagi sebagian orang.</p><p><br></p><p>Caranya dengan menentukan berapa persen bagian keuntungan yang akan diterima oleh kedua pihak.</p><p><br></p><p>Mudharib wajib mengembalikan modal yang dipinjamkan dan membayarkan bagian keuntungan yang telah ditentukan dengan tenggat waktu atau masa kontrak yang disetujui atau tanpa masa kontrak.</p><p><br></p><p>Mudharib harus mengikuti aturan yang telah di sepakati kedua belah pihak. Semisal apabila pemodal menghendaki mudharib untuk tidak menjual komoditas tertentu misalnya, akan tetapi tetap menjualnya maka mudharib menanggung resiko penuh atas modal yang dipinjamnya.</p><p><br></p><p>Bagi pemodal (shahib al-mal), ia yang harus menanggung resiko kehilangan modal yang ditanamnya, aset yang dibeli menggunakan uangnya merupakan milik pemodal.</p><p><br></p><p>Apabila mudharib melanggar perjanjian awal maka mudharib wajib menanggung resiko penuh untuk mengganti modal yang ia pinjam.</p><p><br></p><p>Dalam akad mudharabah besaran nominal keuntungan tidak ditentukan di awal perjanjian, akan tetapi porsi keuntungan atau persentase yang didapat yang di tentukan di awal.</p><p><br></p><p>3. Jual Beli (Bai’ Al Murabahah)</p><p>Adalah akad yang berlaku untuk mengikat penjual dan pembeli dengan adanya penyerahan kepemilikan&nbsp; antara pedagang dan pembeli.</p><p><br></p><p>Ayat Al Quran Terkait Jual Beli: (Quran: Al Baqarah: 198)</p><p><br></p><p>Berikut akad yang ada dalam transaksi jual beli (Bai’ Al Murabahah):</p><p><br></p><p>Bissamanil Ajil,</p><p>Adalah transaksi jual beli barang dengan harga yang berbeda antara kontan dan angsuran. Hal ini dapat kita temukan pada pembelian kredit barang semisal kendaraan bermotor, handphone, dan sebagainya.</p><p><br></p><p>Yang tidak diperbolehkan pada transaksi ini adalah penambahan bunga yang naik turun sehingga membuat harga jual naik turun selama proses angsuran.</p><p><br></p><p>Akan tetapi boleh untuk memberikan margin keuntungan tertentu dari harga kontan yang disepakati di awal.</p><p><br></p><p>Salam</p><p>Yaitu jual beli barang secara tunai dengan penyerahan barang ditunda sesuai kesepakatan. Semisal seorang ekspor mebel Jepara yang akan mengekspor mebel ke luar negeri dengan jumlah barang yang besar.</p><p><br></p><p>Hal ini tentu akan memberatkan pengrajin mebel yang memiliki kapasitas produksi dan modal yang kecil, sehingga ekspor membayar didepan sebagai modal awal.</p><p><br></p><p>Istisna</p><p>Yaitu jual beli barang dengan pemesanan dan pembayarannya pada waktu pengambilan barang. Hal ini lazim kita temui dengan istilah cash on delivery untuk jual beli online.</p><p><br></p><p>Hal ini memiliki keuntungan untuk meminimalisir kerugian bagi pembeli akibat perbedaan spesifikasi barang yang disebutkan oleh penjual.</p><p><br></p><p>Isti’jar</p><p>Yaitu jual beli antara pembeli dengan penyuplai barang.</p><p><br></p><p>Ijarah</p><p>Yaitu jual beli jasa dari benda (sewa) atau tenaga/keahlian (upah). Hal ini kita temui ketika kita membayar upah buruh atau pegawai atau selepas kita menyewa barang atau properti tertentu.</p><p><br></p><p>Sarf</p><p>yaitu jual beli pertukaran mata uang antar negara. Hal ini karena adanya perbedaan mata uang yang berlaku lintas negara.</p><p><br></p><p>Akan tetapi jenis transaksi yang diperbolehkan hanya transaksi today spot yang transaksi dilaksanakan hari itu juga tanpa diberi hedging atau lindung nilai akibat dari penangguhan penyerahan</p><p><br></p><p>4. Transaksi dengan Pemberian Kepercayaan</p><p>Transaksi Pemberian Kepercayaan adalah akad atau perjanjian mengenai penjaminan hutang atau penyelesaian dengan pemberian kepercayaan.</p><p><br></p><p>Akad transaksi pemberian kepercayaan adalah sebagai berikut:</p><p><br></p><p>Jaminan (Kafalah/Damanah)</p><p>Adalah mengalihkan tanggung jawab seseorang (yang dijamin) kepada orang lain (penjamin).</p><p><br></p><p>Hal ini juga lazim terjadi pada ekonomi konvensional dimana pemberi jaminan meyakinkan kreditur untuk memberikan pinjaman kepada debitur.</p><p><br></p><p>Gadai (Rahn)</p><p>Yaitu menjadikan barang berharga yang nilainya setara atau lebih dari nilai pinjaman sebagai jaminan yang mengikat dengan hutang dan dapat dijadikan sebagai bayaran hutang jika kreditur yang berhutang tidak mampu melunasi hutangnya.</p><p><br></p><p>Akan tetapi akad rahn tidak bisa dijadikan satu dengan akad wadi’ah, semisal menggadaikan perhiasan dan pada proses gadai dikenai biaya tambahan atas simpanan, karena hal ini termasuk riba.</p><p><br></p><p>Pemindahan Hutang (Hiwalah)</p><p>yaitu pemindahan kewajiban atas pembayaran hutang kepada orang lain yang memiliki sangkutan hutang.</p><p><br></p><p>5. Titipan (Wadi’ah)</p><p>Adalah akad dimana seseorang menitipkan barang berharganya kepada seseorang yang ia percaya dan memberikan biaya atas jasa simpanan yang ia lakukan. Pada akad ini kita dapati juga pada ekonomi konvensional semisal deposit box.</p><p><br></p><p>6. Transaksi Pemberian/ Perwakilan dalam Transaksi (Wakalah)</p><p>Transaksi ini berupa pemberian kekuasaan untuk menyelesaikan transaksi tertentu, semisal penyerahan rumah atau transaksi jual beli surat berharga yang dilakukan oleh manajer investasi yang dilakukan pada bank kustodian.</p><p><br></p><p>Landasan hukum: Ayat Al Quran Terkait dengan Transaksi berlandas kepercayaan terdapat disurat Al Baqarah ayat 283.</p><p><br></p><p>Akhir Kata</p><p>Demikianlah pembahasan tentang pengertian muamalah dalam islam. Semoga dapat bermanfaat untuk kita semua.</p>', NULL, 'muamalah-dalam-islam-pengertian-konsep-dan-contohnya.jpeg', NULL, 'admin', 0, 0, 0, 29, 1, '2020-09-10 03:34:22', '2020-09-10 11:41:55');

-- --------------------------------------------------------

--
-- Table structure for table `news_category_news`
--

CREATE TABLE `news_category_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_id` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_news_id` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_category_news`
--

INSERT INTO `news_category_news` (`id`, `news_id`, `category_news_id`, `created_at`, `updated_at`) VALUES
(22, '16', '8', '2020-09-01 06:00:34', '2020-09-01 06:00:34'),
(23, '17', '8', '2020-09-01 06:03:47', '2020-09-01 06:03:47'),
(24, '18', '8', '2020-09-01 06:07:07', '2020-09-01 06:07:07'),
(25, '19', '11', '2020-09-01 06:12:30', '2020-09-01 06:12:30'),
(26, '19', '12', '2020-09-01 20:44:31', '2020-09-01 20:44:31'),
(27, '19', '13', '2020-09-01 20:44:31', '2020-09-01 20:44:31'),
(36, '26', '6', '2020-09-03 03:12:44', '2020-09-03 03:12:44'),
(37, '27', '6', '2020-09-03 03:22:50', '2020-09-03 03:22:50'),
(38, '28', '8', '2020-09-03 03:39:59', '2020-09-03 03:39:59'),
(40, '29', '8', '2020-09-03 03:47:46', '2020-09-03 03:47:46'),
(41, '30', '8', '2020-09-03 03:51:12', '2020-09-03 03:51:12'),
(42, '31', '12', '2020-09-03 04:01:38', '2020-09-03 04:01:38'),
(43, '32', '8', '2020-09-03 04:03:43', '2020-09-03 04:03:43'),
(44, '33', '11', '2020-09-03 04:45:56', '2020-09-03 04:45:56'),
(45, '34', '9', '2020-09-03 04:47:03', '2020-09-03 04:47:03'),
(46, '34', '11', '2020-09-03 04:48:22', '2020-09-03 04:48:22'),
(47, '35', '6', '2020-09-03 04:52:55', '2020-09-03 04:52:55'),
(48, '36', '13', '2020-09-03 07:43:25', '2020-09-03 07:43:25'),
(50, '37', '8', '2020-09-04 00:44:06', '2020-09-04 00:44:06'),
(52, '38', '8', '2020-09-05 05:17:15', '2020-09-05 05:17:15'),
(53, '39', '6', '2020-09-05 05:25:37', '2020-09-05 05:25:37'),
(54, '40', '6', '2020-09-05 05:30:14', '2020-09-05 05:30:14'),
(55, '41', '8', '2020-09-06 13:12:18', '2020-09-06 13:12:18'),
(56, '42', '6', '2020-09-06 13:16:51', '2020-09-06 13:16:51'),
(57, '43', '6', '2020-09-06 13:34:41', '2020-09-06 13:34:41'),
(58, '44', '8', '2020-09-07 04:56:08', '2020-09-07 04:56:08'),
(59, '45', '8', '2020-09-07 05:02:19', '2020-09-07 05:02:19'),
(60, '46', '8', '2020-09-07 05:08:01', '2020-09-07 05:08:01'),
(61, '47', '6', '2020-09-08 09:40:13', '2020-09-08 09:40:13'),
(62, '1', '28', '2020-09-10 02:35:42', '2020-09-10 02:35:42'),
(63, '1', '29', '2020-09-10 02:35:42', '2020-09-10 02:35:42'),
(64, '2', '28', '2020-09-10 02:40:09', '2020-09-10 02:40:09'),
(65, '3', '28', '2020-09-10 02:43:06', '2020-09-10 02:43:06'),
(66, '4', '26', '2020-09-10 02:57:37', '2020-09-10 02:57:37'),
(67, '4', '30', '2020-09-10 02:57:37', '2020-09-10 02:57:37'),
(68, '5', '26', '2020-09-10 03:00:38', '2020-09-10 03:00:38'),
(69, '5', '30', '2020-09-10 03:00:38', '2020-09-10 03:00:38'),
(70, '6', '26', '2020-09-10 03:05:40', '2020-09-10 03:05:40'),
(71, '6', '32', '2020-09-10 03:05:40', '2020-09-10 03:05:40'),
(72, '7', '33', '2020-09-10 03:08:41', '2020-09-10 03:08:41'),
(73, '7', '27', '2020-09-10 03:09:16', '2020-09-10 03:09:16'),
(74, '8', '34', '2020-09-10 03:21:45', '2020-09-10 03:21:45'),
(75, '9', '25', '2020-09-10 03:29:46', '2020-09-10 03:29:46'),
(76, '9', '34', '2020-09-10 03:29:46', '2020-09-10 03:29:46'),
(77, '10', '30', '2020-09-10 03:34:22', '2020-09-10 03:34:22');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'menu category-list', 'web', '2020-08-17 18:47:33', '2020-08-17 18:47:33'),
(2, 'menu category-create', 'web', '2020-08-17 18:47:33', '2020-08-17 18:47:33'),
(3, 'menu category-edit', 'web', '2020-08-17 18:47:33', '2020-08-17 18:47:33'),
(4, 'menu category-delete', 'web', '2020-08-17 18:47:33', '2020-08-17 18:47:33'),
(5, 'news-list', 'web', '2020-08-17 18:47:33', '2020-08-17 18:47:33'),
(6, 'news-create', 'web', '2020-08-17 18:47:33', '2020-08-17 18:47:33'),
(7, 'news-edit', 'web', '2020-08-17 18:47:34', '2020-08-17 18:47:34'),
(8, 'news-delete', 'web', '2020-08-17 18:47:34', '2020-08-17 18:47:34'),
(9, 'role-list', 'web', '2020-08-17 18:47:34', '2020-08-17 18:47:34'),
(10, 'role-create', 'web', '2020-08-17 18:47:34', '2020-08-17 18:47:34'),
(11, 'role-edit', 'web', '2020-08-17 18:47:34', '2020-08-17 18:47:34'),
(12, 'role-delete', 'web', '2020-08-17 18:47:34', '2020-08-17 18:47:34'),
(13, 'user-list', 'web', '2020-08-17 18:47:34', '2020-08-17 18:47:34'),
(14, 'user-create', 'web', '2020-08-17 18:47:34', '2020-08-17 18:47:34'),
(15, 'user-edit', 'web', '2020-08-17 18:47:34', '2020-08-17 18:47:34'),
(16, 'user-delete', 'web', '2020-08-17 18:47:34', '2020-08-17 18:47:34');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(3, 'Manager', 'web', '2020-08-17 19:13:32', '2020-08-17 19:13:32'),
(4, 'Super Admin', 'web', '2020-08-17 19:31:41', '2020-08-17 19:31:41'),
(5, 'Admin', 'web', '2020-08-17 19:32:30', '2020-08-17 19:32:30'),
(6, 'Users', 'web', '2020-08-17 19:33:14', '2020-08-17 19:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(7, 4),
(8, 4),
(9, 4),
(10, 4),
(11, 4),
(12, 4),
(13, 4),
(14, 4),
(15, 4),
(16, 4),
(1, 5),
(2, 5),
(3, 5),
(4, 5),
(5, 5),
(6, 5),
(7, 5),
(8, 5),
(9, 5),
(1, 6),
(5, 6),
(9, 6),
(13, 6),
(16, 6);

-- --------------------------------------------------------

--
-- Table structure for table `seo_settings`
--

CREATE TABLE `seo_settings` (
  `id` int(2) NOT NULL,
  `code_analytics` text NOT NULL,
  `metakeyword` text NOT NULL,
  `fbcomment` text NOT NULL,
  `siteurl` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seo_settings`
--

INSERT INTO `seo_settings` (`id`, `code_analytics`, `metakeyword`, `fbcomment`, `siteurl`, `created_at`, `updated_at`) VALUES
(1, '<!-- Global site tag (gtag.js) - Google Analytics -->\r\n<script async src=\"https://www.googletagmanager.com/gtag/js?id=UA-177294351-1\"></script>\r\n<script>\r\n  window.dataLayer = window.dataLayer || [];\r\n  function gtag(){dataLayer.push(arguments);}\r\n  gtag(\'js\', new Date());\r\n\r\n  gtag(\'config\', \'UA-177294351-1\');\r\n</script>', '<p>                                            humanonwheels human on wheels humanonwheels.id humanonwheels id Human On Wheels HumanOnWheels HOW how&nbsp;\r\n                                          </p>', '', '', '2020-09-01 13:03:14', '2020-09-04 06:36:48');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `position` int(2) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `name`, `code`, `link`, `position`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Instagram', '<i class=\"fa fa-instagram\"> </i>', 'https://www.instagram.com/humanonwheels/', 1, 1, '2020-09-01 11:17:42', '2020-09-01 11:29:36'),
(2, 'Youtube', '<i class=\"fa fa-youtube-play\" aria-hidden=\"true\"></i>', 'https://www.youtube.com/c/HumanOnWheels/featured', 2, 1, '2020-09-01 11:35:04', '2020-09-01 16:18:56'),
(3, 'Facebook', '<i class=\"fa fa-facebook\"></i>', 'https://web.facebook.com/humanonwheels', 3, 1, '2020-09-01 22:18:09', '2020-09-02 04:05:45'),
(4, 'Twitter', '<i class=\"fa fa-twitter\"></i>', 'https://twitter.com/humanonwheelsID', 4, 1, '2020-09-01 22:18:48', '2020-09-01 22:18:48');

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `id` int(5) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `i_am` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `i_am`, `status`, `name`, `username`, `slug`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'Administrataor', 'admin', 'admin', NULL, 'info@humanonwheels.id', NULL, '$2y$10$rWOwkfFY9xmToElHcdWWbOVcHBKDq9Y/3/3CluWoZ6k7mQMH9FlFy', NULL, '2020-08-17 20:54:29', '2020-08-17 20:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(5) NOT NULL,
  `title` text NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `embed` text,
  `url` varchar(255) DEFAULT NULL,
  `slug` text NOT NULL,
  `description` text NOT NULL,
  `status` int(1) NOT NULL,
  `hit` int(11) DEFAULT '0',
  `penceramah_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `title`, `thumbnail`, `embed`, `url`, `slug`, `description`, `status`, `hit`, `penceramah_id`, `category_id`, `created_at`, `updated_at`) VALUES
(3, 'Hafidz Good Looking, I am Not Radical - Ustadz Adi Hidayat', NULL, '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/RmJoIXH_whQ\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'https://www.youtube.com/embed/RmJoIXH_whQ', 'hafidz-good-looking-i-am-not-radical-ustadz-adi-hidayat', '<p>Test</p>', 1, 9, 25, NULL, '2020-09-09 10:02:25', '2020-09-10 11:42:15'),
(4, 'RASULULLAH KAGUM DAN BERKATA INILAH ORANG YANG BELUM PERNAH SHOLAT TAPI MASUK SORGA', NULL, '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/o1xLEQM3s34\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'https://www.youtube.com/embed/o1xLEQM3s34', 'rasulullah-kagum-dan-berkata-inilah-orang-yang-belum-pernah-sholat-tapi-masuk-sorga', '<p>Bismillah..</p><p>kisah di perang khaibar saat menyerang benteng yahudi yang kedua, ada 1&nbsp;</p><p>kisah yang luar biasa terjadi, Nabi sampai kagum</p><p><br></p><p>Jangan lupa Like, share and tinggalkan comentnya yah !! agar kami semakin semangat membuat konten - konten yg lebih baik lagi dan dapat di ambil ilmunya, semoga bermanfaat dan menjadi amal ajriyah kita bersama</p><p>Aamiin !!</p>', 1, 2, NULL, NULL, '2020-09-09 10:04:03', '2020-09-10 09:48:54'),
(5, '\"TIDAK ADA YANG BERKUASA KECUALI ALLAH \" KHUTBAH JUM\'AT Ustadz Abdul Somad, Lc., MA', NULL, '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/ltsVQdQqcWA\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'https://www.youtube.com/embed/ltsVQdQqcWA', 'tidak-ada-yang-berkuasa-kecuali-allah-khutbah-jumat-ustadz-abdul-somad-lc-ma', 'Ustadz Abdul Somad Official\r\n\r\nDapatkan buku-buku Ustadz Abdul Somad di\r\n\r\nToko Buku Amanah \r\nJl. Datuk Setia Maharaja / Parit Indah No. 16C, Kel. Tangkerang Labuai, Kec. Bukit Raya, Kota Pekanbaru, Riau. \r\n\r\nPemesanan online buku-buku UAS dapat melalui :  \r\nIg : @tokobukuamanah_uas\r\nLink (https://www.instagram.com/tokobukuama... )\r\nWhatsapp : 082188992996\r\n\r\nMari salurkan donasi wakaf anda ke yayasan Ustadz Abdul Somad \r\n@yayasanwakafhajjahrohana, melalui rekening \r\nBank Syariah Mandiri :\r\n 797 208 5264 ( An. Yayasan Waqaf Hajjah Rohana Berbagi )\r\nNo HP: 0812 6507 0343\r\n\r\nKunjungi Blog pribadi Ustadz Abdul Somad.\r\nSomadmorocco.blogspot.com\r\nMembahas berbagai macam persoalan Agama Islam.', 1, 0, 26, NULL, '2020-09-09 10:07:12', '2020-09-10 05:16:14'),
(6, 'TAK ADA YANG KEBETULAN, HIDUP ADALAH PILIHAN | Pesona Khayangan Juanda, Depok, Jawa Barat', NULL, '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/x3eAVMnBhxY\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'https://www.youtube.com/embed/x3eAVMnBhxY', 'tak-ada-yang-kebetulan-hidup-adalah-pilihan-pesona-khayangan-juanda-depok-jawa-barat', '<p><span style=\"color: rgb(3, 3, 3); font-family: Roboto, Arial, sans-serif; font-size: 14px; white-space: pre-wrap; background-color: rgb(249, 249, 249);\">Dukung channel resmi Ustadz Abdul Somad Official dengan cara share seluas-luasnya video ini, subscribe dan aktifkan notifikasinya untuk mendapatkan ilmu dan informasi terbaru dari Ustadz Abdul Somad, Lc., MA.</span><br></p>', 1, 23, 26, NULL, '2020-09-09 10:08:30', '2020-09-10 11:39:44'),
(7, 'TANYA JAWAB dengan para Dokter | RS. Budi Kemuliaan, Batam | Ustadz Abdul Somad, Lc., MA', NULL, '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/nN_Fhzcn9a8\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'https://www.youtube.com/embed/nN_Fhzcn9a8', 'tanya-jawab-dengan-para-dokter-rs-budi-kemuliaan-batam-ustadz-abdul-somad-lc-ma', '<p>TANYA JAWAB dengan para Dokter | RS. Budi Kemuliaan, Batam | Ustadz Abdul Somad, Lc., MA</p>', 1, 0, NULL, NULL, '2020-09-09 10:09:34', '2020-09-10 00:12:43'),
(8, 'PROFESI DOKTER DITINJAU DARI HUKUM ISLAM | RS. Budi Kemuliaan, Batam | Ustadz Abdul Somad, Lc., MA.', NULL, '<iframe width=\"853\" height=\"480\" src=\"https://www.youtube.com/embed/KxxqXLiBhT0\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'https://www.youtube.com/embed/KxxqXLiBhT0', 'profesi-dokter-ditinjau-dari-hukum-islam-rs-budi-kemuliaan-batam-ustadz-abdul-somad-lc-ma', '<p><div id=\"info\" class=\"style-scope ytd-video-primary-info-renderer\" style=\"margin: 0px; padding: 0px; border: 0px; background: rgb(249, 249, 249); display: flex; flex-direction: row; align-items: center; color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; font-size: 10px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\"></div></p><h1 class=\"title style-scope ytd-video-primary-info-renderer\" style=\"margin: 0px; padding: 0px; border: 0px; background: rgb(249, 249, 249); display: block; max-height: calc(2 * var(--yt-navbar-title-line-height, 2.4rem)); overflow: hidden; font-weight: 400; line-height: var(--yt-navbar-title-line-height, 2.4rem); color: var(--ytd-video-primary-info-renderer-title-color, var(--yt-spec-text-primary)); font-family: Roboto, Arial, sans-serif; font-size: var(--ytd-video-primary-info-renderer-title-font-size, var(--yt-navbar-title-font-size, inherit)); font-variant-ligatures: normal; font-variant-caps: normal; font-variant-numeric: ; font-variant-east-asian: ; transform: var(--ytd-video-primary-info-renderer-title-transform, none); text-shadow: var(--ytd-video-primary-info-renderer-title-text-shadow, none); font-style: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\"><yt-formatted-string force-default-style=\"\" class=\"style-scope ytd-video-primary-info-renderer\" style=\"word-break: break-word;\">PROFESI DOKTER DITINJAU DARI HUKUM ISLAM | RS. Budi Kemuliaan, Batam | Ustadz Abdul Somad, Lc., MA.</yt-formatted-string></h1>', 1, 6, 26, NULL, '2020-09-09 10:10:38', '2020-09-10 09:59:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_news`
--
ALTER TABLE `category_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gsettings`
--
ALTER TABLE `gsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_category_news`
--
ALTER TABLE `news_category_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `seo_settings`
--
ALTER TABLE `seo_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category_news`
--
ALTER TABLE `category_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `news_category_news`
--
ALTER TABLE `news_category_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2023 at 10:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grapes`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_brand_areas`
--

CREATE TABLE `about_brand_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_brand_areas`
--

INSERT INTO `about_brand_areas` (`id`, `brand_link`, `brand_photo`, `created_at`, `updated_at`) VALUES
(3, 'https://brand-link.com/', '0QlDtwr.png', '2022-08-20 08:58:42', NULL),
(4, 'https://brand-link.com/', 'CI7hDpy.png', '2022-08-20 08:58:51', NULL),
(5, 'https://brand-link.com/', 'KrFKesf.png', '2022-08-20 09:01:25', NULL),
(6, 'https://brand-link.com/', 'a8mgTP0.png', '2022-08-20 09:01:36', NULL),
(7, 'https://brand-link.com/', 'qOm4K6X.png', '2022-08-20 09:01:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `about_feature_areas`
--

CREATE TABLE `about_feature_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_feature_areas`
--

INSERT INTO `about_feature_areas` (`id`, `title`, `sub_title`, `feature_photo`, `created_at`, `updated_at`) VALUES
(3, 'Free Shipping', 'Capped at $39 per order', 'PcThYzS.png', '2022-08-17 04:42:42', '2022-08-17 05:02:06'),
(4, 'Card Payments', '12 Months Installments', '1KEfaU5.png', '2022-08-17 04:43:10', '2022-08-17 05:05:14'),
(5, 'Easy Returns', 'Shop With Confidence', 'xN95QP1.png', '2022-08-20 08:34:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `about_intro_areas`
--

CREATE TABLE `about_intro_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro_small_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro_large_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_intro_areas`
--

INSERT INTO `about_intro_areas` (`id`, `title`, `short_description`, `intro_small_photo`, `intro_large_photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'About Us', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius modjior tem incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniamyl quinol exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duisau irure dolor in reprehenderit in voluptate velit esse cillum dolore euhti fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim', 'ATzVaGV.png', 'EZ4kuDn.png', '2022-08-08 16:00:08', '2022-08-20 06:47:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `about_service_areas`
--

CREATE TABLE `about_service_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_service_areas`
--

INSERT INTO `about_service_areas` (`id`, `title`, `subtitle`, `short_description`, `service_photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, '100% Guaranteed Pure Cotton', 'Best Products Here Every Day', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius modjior tem incididunt ut labore et dolore magna aliqua.', 'QeAUltG.png', '2022-08-08 16:52:37', '2022-08-20 06:56:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `about_team_areas`
--

CREATE TABLE `about_team_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_team_areas`
--

INSERT INTO `about_team_areas` (`id`, `name`, `title`, `team_photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'CRAIG CHANEY', 'OUR TEAM', 'D4bmLjE.jpg', '2022-08-08 17:53:40', '2022-08-20 07:35:18', NULL),
(4, 'LESTER HOUSER', 'OUR TEAM', 'jsmbeTH.jpg', '2022-08-20 07:27:58', NULL, NULL),
(5, 'HOWARD BURNS', 'OUR TEAM', 'JPR9xv3.jpg', '2022-08-20 07:28:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `about_team_social_icons`
--

CREATE TABLE `about_team_social_icons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `social_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_icon_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_team_social_icons`
--

INSERT INTO `about_team_social_icons` (`id`, `social_icon`, `social_icon_link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'fa-twitter', 'https://twitter.com/', '2022-08-14 18:17:17', NULL, NULL),
(3, 'fa-linkedin', 'https://www.instagram.com/accounts/login/', '2022-08-14 18:18:29', NULL, NULL),
(4, 'fa-facebook', 'https://www.facebook.com/', '2022-08-20 08:03:14', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `about_testimonial_areas`
--

CREATE TABLE `about_testimonial_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `testimonial_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_testimonial_areas`
--

INSERT INTO `about_testimonial_areas` (`id`, `name`, `title`, `short_description`, `testimonial_photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Rajah Roach', 'Cum eligendi obcaeca', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#039;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#039;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet', 'IwttWrg.png', '2022-08-17 10:25:23', '2022-08-20 08:46:02', NULL),
(4, 'Leah Chatman', 'Happy Customer', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet', 'R8hFpIU.png', '2022-08-20 08:45:18', NULL, NULL),
(5, 'Reyna Chung', 'Happy Customer', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet', 'UL5KbcN.png', '2022-08-20 08:47:14', NULL, NULL),
(6, 'Shellie Cardenas', 'Deserunt aliquid omn', 'Facilis non reprehenThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet', 'x4YuEHR.jpg', '2022-08-20 08:48:59', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_parsonal_infos`
--

CREATE TABLE `admin_parsonal_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_parsonal_infos`
--

INSERT INTO `admin_parsonal_infos` (`id`, `name`, `email`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Habib', 'ahosanhabib21021@gmail.com', '01365987541', 'Titas,Comilla,Bangladesh', NULL, '2022-08-20 09:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offer_message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `offer_message`, `banner_title`, `banner_photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 'sele 30% off', 'Exclusive new  offer 2022', '1-dr4ZrWM.png', '2022-08-08 18:20:16', NULL, NULL),
(10, 'sele 45% off', 'Exclusive new  offer 2021', '1-d4yoq0P.png', '2022-08-08 18:20:30', NULL, NULL),
(11, 'sele 20% off', 'Exclusive new  offer 2020', '1-OoOnH3M.png', '2022-08-08 18:21:01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_member` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_member`) VALUES
(1, 'Kamal mia'),
(4, 'Korim'),
(5, 'Robin Raj'),
(7, 'Sajid'),
(8, 'Hridoy'),
(10, 'Farhan'),
(20, 'Mamun Mia');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_current_price` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `cart_to_amount` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_by` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_photo`, `create_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 'Women fashion', '1-7iZcxgr.jpg', 1, NULL, '2022-08-14 16:02:45', '2022-08-14 16:28:03'),
(4, 'Baby\'s toy', '1-nkCtskm.jpg', 1, NULL, '2022-08-14 16:09:45', NULL),
(5, 'Watch', '1-bdxya1m.jpg', 1, NULL, '2022-08-14 16:11:27', NULL),
(6, 'Mobile', '1-D84wA4F.jpg', 1, NULL, '2022-08-14 16:14:05', NULL),
(7, 'Shoes', '1-sLwOz9E.jpg', 1, NULL, '2022-08-14 16:15:09', NULL),
(8, 'Camera', '1-OmtRz0K.jpg', 1, NULL, '2022-08-14 16:27:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color_name`, `color_code`, `created_at`, `updated_at`) VALUES
(2, 'Green', '#1ea61c', '2022-02-10 05:10:03', NULL),
(3, 'Black', '#000000', '2022-02-10 11:23:41', NULL),
(4, 'Red', '#eb0f0f', '2022-02-10 12:00:27', NULL),
(5, 'Olib', '#7bc50d', '2022-02-10 12:00:52', NULL),
(6, 'Blue', '#2d23b8', '2022-02-10 12:01:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_froms`
--

CREATE TABLE `contact_froms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_froms`
--

INSERT INTO `contact_froms` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Sabibr', 'sabibr@gmail.com', 'Hello.', '2022-08-18 08:53:11', NULL),
(4, 'Test1', 'test1@gmail.com', 'hi', '2023-04-05 19:31:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_heads`
--

CREATE TABLE `contact_heads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_heads`
--

INSERT INTO `contact_heads` (`id`, `short_description`, `created_at`, `updated_at`) VALUES
(1, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', NULL, '2022-08-20 09:07:41');

-- --------------------------------------------------------

--
-- Table structure for table `contact_map_links`
--

CREATE TABLE `contact_map_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `embed_map_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_map_links`
--

INSERT INTO `contact_map_links` (`id`, `embed_map_link`, `created_at`, `updated_at`) VALUES
(1, 'https://maps.google.com/maps?q=23.99350672208908,%2090.42473482845747&t=&z=13&ie=UTF8&iwloc=&output=embed', NULL, '2022-08-18 09:40:23');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AX', 'Åland Islands'),
(3, 'AL', 'Albania'),
(4, 'DZ', 'Algeria'),
(5, 'AS', 'American Samoa'),
(6, 'AD', 'Andorra'),
(7, 'AO', 'Angola'),
(8, 'AI', 'Anguilla'),
(9, 'AQ', 'Antarctica'),
(10, 'AG', 'Antigua and Barbuda'),
(11, 'AR', 'Argentina'),
(12, 'AM', 'Armenia'),
(13, 'AW', 'Aruba'),
(14, 'AU', 'Australia'),
(15, 'AT', 'Austria'),
(16, 'AZ', 'Azerbaijan'),
(17, 'BS', 'Bahamas'),
(18, 'BH', 'Bahrain'),
(19, 'BD', 'Bangladesh'),
(20, 'BB', 'Barbados'),
(21, 'BY', 'Belarus'),
(22, 'BE', 'Belgium'),
(23, 'BZ', 'Belize'),
(24, 'BJ', 'Benin'),
(25, 'BM', 'Bermuda'),
(26, 'BT', 'Bhutan'),
(27, 'BO', 'Bolivia, Plurinational State of'),
(28, 'BQ', 'Bonaire, Sint Eustatius and Saba'),
(29, 'BA', 'Bosnia and Herzegovina'),
(30, 'BW', 'Botswana'),
(31, 'BV', 'Bouvet Island'),
(32, 'BR', 'Brazil'),
(33, 'IO', 'British Indian Ocean Territory'),
(34, 'BN', 'Brunei Darussalam'),
(35, 'BG', 'Bulgaria'),
(36, 'BF', 'Burkina Faso'),
(37, 'BI', 'Burundi'),
(38, 'KH', 'Cambodia'),
(39, 'CM', 'Cameroon'),
(40, 'CA', 'Canada'),
(41, 'CV', 'Cape Verde'),
(42, 'KY', 'Cayman Islands'),
(43, 'CF', 'Central African Republic'),
(44, 'TD', 'Chad'),
(45, 'CL', 'Chile'),
(46, 'CN', 'China'),
(47, 'CX', 'Christmas Island'),
(48, 'CC', 'Cocos (Keeling) Islands'),
(49, 'CO', 'Colombia'),
(50, 'KM', 'Comoros'),
(51, 'CG', 'Congo'),
(52, 'CD', 'Congo, the Democratic Republic of the'),
(53, 'CK', 'Cook Islands'),
(54, 'CR', 'Costa Rica'),
(55, 'CI', 'Côte d\'Ivoire'),
(56, 'HR', 'Croatia'),
(57, 'CU', 'Cuba'),
(58, 'CW', 'Curaçao'),
(59, 'CY', 'Cyprus'),
(60, 'CZ', 'Czech Republic'),
(61, 'DK', 'Denmark'),
(62, 'DJ', 'Djibouti'),
(63, 'DM', 'Dominica'),
(64, 'DO', 'Dominican Republic'),
(65, 'EC', 'Ecuador'),
(66, 'EG', 'Egypt'),
(67, 'SV', 'El Salvador'),
(68, 'GQ', 'Equatorial Guinea'),
(69, 'ER', 'Eritrea'),
(70, 'EE', 'Estonia'),
(71, 'ET', 'Ethiopia'),
(72, 'FK', 'Falkland Islands (Malvinas)'),
(73, 'FO', 'Faroe Islands'),
(74, 'FJ', 'Fiji'),
(75, 'FI', 'Finland'),
(76, 'FR', 'France'),
(77, 'GF', 'French Guiana'),
(78, 'PF', 'French Polynesia'),
(79, 'TF', 'French Southern Territories'),
(80, 'GA', 'Gabon'),
(81, 'GM', 'Gambia'),
(82, 'GE', 'Georgia'),
(83, 'DE', 'Germany'),
(84, 'GH', 'Ghana'),
(85, 'GI', 'Gibraltar'),
(86, 'GR', 'Greece'),
(87, 'GL', 'Greenland'),
(88, 'GD', 'Grenada'),
(89, 'GP', 'Guadeloupe'),
(90, 'GU', 'Guam'),
(91, 'GT', 'Guatemala'),
(92, 'GG', 'Guernsey'),
(93, 'GN', 'Guinea'),
(94, 'GW', 'Guinea-Bissau'),
(95, 'GY', 'Guyana'),
(96, 'HT', 'Haiti'),
(97, 'HM', 'Heard Island and McDonald Mcdonald Islands'),
(98, 'VA', 'Holy See (Vatican City State)'),
(99, 'HN', 'Honduras'),
(100, 'HK', 'Hong Kong'),
(101, 'HU', 'Hungary'),
(102, 'IS', 'Iceland'),
(103, 'IN', 'India'),
(104, 'ID', 'Indonesia'),
(105, 'IR', 'Iran, Islamic Republic of'),
(106, 'IQ', 'Iraq'),
(107, 'IE', 'Ireland'),
(108, 'IM', 'Isle of Man'),
(109, 'IL', 'Israel'),
(110, 'IT', 'Italy'),
(111, 'JM', 'Jamaica'),
(112, 'JP', 'Japan'),
(113, 'JE', 'Jersey'),
(114, 'JO', 'Jordan'),
(115, 'KZ', 'Kazakhstan'),
(116, 'KE', 'Kenya'),
(117, 'KI', 'Kiribati'),
(118, 'KP', 'Korea, Democratic People\'s Republic of'),
(119, 'KR', 'Korea, Republic of'),
(120, 'KW', 'Kuwait'),
(121, 'KG', 'Kyrgyzstan'),
(122, 'LA', 'Lao People\'s Democratic Republic'),
(123, 'LV', 'Latvia'),
(124, 'LB', 'Lebanon'),
(125, 'LS', 'Lesotho'),
(126, 'LR', 'Liberia'),
(127, 'LY', 'Libya'),
(128, 'LI', 'Liechtenstein'),
(129, 'LT', 'Lithuania'),
(130, 'LU', 'Luxembourg'),
(131, 'MO', 'Macao'),
(132, 'MK', 'Macedonia, the Former Yugoslav Republic of'),
(133, 'MG', 'Madagascar'),
(134, 'MW', 'Malawi'),
(135, 'MY', 'Malaysia'),
(136, 'MV', 'Maldives'),
(137, 'ML', 'Mali'),
(138, 'MT', 'Malta'),
(139, 'MH', 'Marshall Islands'),
(140, 'MQ', 'Martinique'),
(141, 'MR', 'Mauritania'),
(142, 'MU', 'Mauritius'),
(143, 'YT', 'Mayotte'),
(144, 'MX', 'Mexico'),
(145, 'FM', 'Micronesia, Federated States of'),
(146, 'MD', 'Moldova, Republic of'),
(147, 'MC', 'Monaco'),
(148, 'MN', 'Mongolia'),
(149, 'ME', 'Montenegro'),
(150, 'MS', 'Montserrat'),
(151, 'MA', 'Morocco'),
(152, 'MZ', 'Mozambique'),
(153, 'MM', 'Myanmar'),
(154, 'NA', 'Namibia'),
(155, 'NR', 'Nauru'),
(156, 'NP', 'Nepal'),
(157, 'NL', 'Netherlands'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'MP', 'Northern Mariana Islands'),
(166, 'NO', 'Norway'),
(167, 'OM', 'Oman'),
(168, 'PK', 'Pakistan'),
(169, 'PW', 'Palau'),
(170, 'PS', 'Palestine, State of'),
(171, 'PA', 'Panama'),
(172, 'PG', 'Papua New Guinea'),
(173, 'PY', 'Paraguay'),
(174, 'PE', 'Peru'),
(175, 'PH', 'Philippines'),
(176, 'PN', 'Pitcairn'),
(177, 'PL', 'Poland'),
(178, 'PT', 'Portugal'),
(179, 'PR', 'Puerto Rico'),
(180, 'QA', 'Qatar'),
(181, 'RE', 'Réunion'),
(182, 'RO', 'Romania'),
(183, 'RU', 'Russian Federation'),
(184, 'RW', 'Rwanda'),
(185, 'BL', 'Saint Barthélemy'),
(186, 'SH', 'Saint Helena, Ascension and Tristan da Cunha'),
(187, 'KN', 'Saint Kitts and Nevis'),
(188, 'LC', 'Saint Lucia'),
(189, 'MF', 'Saint Martin (French part)'),
(190, 'PM', 'Saint Pierre and Miquelon'),
(191, 'VC', 'Saint Vincent and the Grenadines'),
(192, 'WS', 'Samoa'),
(193, 'SM', 'San Marino'),
(194, 'ST', 'Sao Tome and Principe'),
(195, 'SA', 'Saudi Arabia'),
(196, 'SN', 'Senegal'),
(197, 'RS', 'Serbia'),
(198, 'SC', 'Seychelles'),
(199, 'SL', 'Sierra Leone'),
(200, 'SG', 'Singapore'),
(201, 'SX', 'Sint Maarten (Dutch part)'),
(202, 'SK', 'Slovakia'),
(203, 'SI', 'Slovenia'),
(204, 'SB', 'Solomon Islands'),
(205, 'SO', 'Somalia'),
(206, 'ZA', 'South Africa'),
(207, 'GS', 'South Georgia and the South Sandwich Islands'),
(208, 'SS', 'South Sudan'),
(209, 'ES', 'Spain'),
(210, 'LK', 'Sri Lanka'),
(211, 'SD', 'Sudan'),
(212, 'SR', 'Suriname'),
(213, 'SJ', 'Svalbard and Jan Mayen'),
(214, 'SZ', 'Swaziland'),
(215, 'SE', 'Sweden'),
(216, 'CH', 'Switzerland'),
(217, 'SY', 'Syrian Arab Republic'),
(218, 'TW', 'Taiwan'),
(219, 'TJ', 'Tajikistan'),
(220, 'TZ', 'Tanzania, United Republic of'),
(221, 'TH', 'Thailand'),
(222, 'TL', 'Timor-Leste'),
(223, 'TG', 'Togo'),
(224, 'TK', 'Tokelau'),
(225, 'TO', 'Tonga'),
(226, 'TT', 'Trinidad and Tobago'),
(227, 'TN', 'Tunisia'),
(228, 'TR', 'Turkey'),
(229, 'TM', 'Turkmenistan'),
(230, 'TC', 'Turks and Caicos Islands'),
(231, 'TV', 'Tuvalu'),
(232, 'UG', 'Uganda'),
(233, 'UA', 'Ukraine'),
(234, 'AE', 'United Arab Emirates'),
(235, 'GB', 'United Kingdom'),
(236, 'US', 'United States'),
(237, 'UM', 'United States Minor Outlying Islands'),
(238, 'UY', 'Uruguay'),
(239, 'UZ', 'Uzbekistan'),
(240, 'VU', 'Vanuatu'),
(241, 'VE', 'Venezuela, Bolivarian Republic of'),
(242, 'VN', 'Viet Nam'),
(243, 'VG', 'Virgin Islands, British'),
(244, 'VI', 'Virgin Islands, U.S.'),
(245, 'WF', 'Wallis and Futuna'),
(246, 'EH', 'Western Sahara'),
(247, 'YE', 'Yemen'),
(248, 'ZM', 'Zambia'),
(249, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_validity_date` date NOT NULL,
  `coupon_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_amount` double(8,2) NOT NULL,
  `minimum_order` double(8,2) NOT NULL,
  `coupon_limit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_validity_date`, `coupon_type`, `coupon_amount`, `minimum_order`, `coupon_limit`, `created_at`, `updated_at`) VALUES
(1, 'ramadan', '2022-03-09', 'percentage', 5.00, 700.00, 6, '2022-03-06 02:38:22', NULL),
(2, 'habib21', '2022-04-15', 'flat', 100.00, 1000.00, 8, '2022-03-06 02:38:50', '2022-03-23 10:41:04'),
(3, 'march', '2022-03-03', 'flat', 50.00, 500.00, 5, '2022-03-06 02:43:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cover_photos`
--

CREATE TABLE `cover_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cover_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_cover_photo.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cover_photos`
--

INSERT INTO `cover_photos` (`id`, `cover_photo`, `created_at`, `updated_at`) VALUES
(1, '1-VXNXvL.jpg', NULL, '2022-08-18 16:47:14');

-- --------------------------------------------------------

--
-- Table structure for table `deal_area_background_photos`
--

CREATE TABLE `deal_area_background_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `background_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'deal_area_default_background.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deal_area_background_photos`
--

INSERT INTO `deal_area_background_photos` (`id`, `background_photo`, `created_at`, `updated_at`) VALUES
(1, 'wC7bX37.jpg', NULL, '2022-08-19 13:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favicons`
--

CREATE TABLE `favicons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `favicon_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_favicon.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favicons`
--

INSERT INTO `favicons` (`id`, `favicon_photo`, `created_at`, `updated_at`) VALUES
(1, 'shlzzg5.png', NULL, '2022-08-20 15:22:33');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `feature_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `feature_title`, `sub_title`, `feature_photo`, `created_at`, `updated_at`) VALUES
(2, 'Rerum dolorem quod i', 'Facilis laboriosam', 'upload_photos/feature-photos/1-NZsE7D3.png', '2022-01-04 17:40:43', NULL),
(3, 'Sed eius quos sed ab', 'Voluptate quia susci', 'upload_photos/feature-photos/1-8Fxd8NX.png', '2022-01-04 17:42:11', '2022-01-04 17:57:45'),
(4, 'Et iste nulla vitae', 'Quidem voluptate ess', 'upload_photos/feature-photos/1-WrbzNpu.png', '2022-01-04 17:42:47', NULL),
(5, 'Quis esse perspicia', 'Delectus aut dolore', 'upload_photos/feature-photos/1-lrAgqvY.png', '2022-01-04 19:12:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `footer_describes`
--

CREATE TABLE `footer_describes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_describes`
--

INSERT INTO `footer_describes` (`id`, `short_description`, `created_at`, `updated_at`) VALUES
(1, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,', NULL, '2022-08-18 10:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `footer_social_icons`
--

CREATE TABLE `footer_social_icons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `social_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_icon_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_social_icons`
--

INSERT INTO `footer_social_icons` (`id`, `social_icon`, `social_icon_link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'fa-facebook', 'https://www.facebook.com/', '2022-08-18 10:42:14', '2022-08-20 09:58:01', NULL),
(3, 'fa-twitter', 'https://twitter.com/', '2022-08-20 09:58:20', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_blog_areas`
--

CREATE TABLE `home_blog_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `headline_one` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headline_two` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_front_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_display_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_blog_areas`
--

INSERT INTO `home_blog_areas` (`id`, `headline_one`, `short_description`, `headline_two`, `long_description`, `blog_front_photo`, `blog_display_photo`, `blog_photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Eveniet in rerum la', 'Ada banyak variasi tulisan Lorem Ipsum yang tersedia, tapi kebanyakan sudah mengalami perubahan bentuk, entah karena unsur humor atau kalimat yang diacak hingga nampak sangat tidak masuk akal. Jika anda ingin menggunakan tulisan Lorem Ipsum, anda harus yakin tidak ada bagian yang memalukan yang tersembunyi di tengah', 'Quo qui nihil omnis', 'Voluptatem cupidatat Ada banyak variasi tulisan Lorem Ipsum yang tersedia, tapi kebanyakan sudah mengalami perubahan bentuk, entah karena unsur humor atau kalimat yang diacak hingga nampak sangat tidak masuk akal. Jika anda ingin menggunakan tulisan Lorem Ipsum, anda harus yakin tidak ada bagian yang memalukan yang tersembunyi di tengah naskah tersebut. Semua generator Lorem Ipsum di internet cenderung untuk mengulang bagian-bagian', 'IoVvUzC.jpg', 'KwZztuc.jpg', '7fSSDBo.jpg', '2022-08-19 17:28:53', NULL, NULL),
(2, 'Voluptas ut mollitia', 'Deserunt enim volupt Ada banyak variasi tulisan Lorem Ipsum yang tersedia, tapi kebanyakan sudah mengalami perubahan bentuk, entah karena unsur humor atau kalimat yang diacak hingga nampak sangat tidak masuk akal. Jika anda ingin menggunakan tulisan Lorem Ipsum, anda harus', 'Soluta aliquip dolor', 'Ab facere cum volupt Ada banyak variasi tulisan Lorem Ipsum yang tersedia, tapi kebanyakan sudah mengalami perubahan bentuk, entah karena unsur humor atau kalimat yang diacak hingga nampak sangat tidak masuk akal. Jika anda ingin menggunakan tulisan Lorem Ipsum, anda harus yakin tidak ada bagian yang memalukan yang tersembunyi di tengah naskah tersebut. Semua generator Lorem Ipsum di internet cenderung untuk mengulang bagian-bagian', 'ckt5wuG.jpg', 'UeDYoLc.jpg', 'PFXTKGu.jpg', '2022-08-19 17:29:48', NULL, NULL),
(3, 'Labore cupidatat do', 'Ada banyak variasi tulisan Lorem Ipsum yang tersedia, tapi kebanyakan sudah mengalami perubahan bentuk, entah karena unsur humor atau kalimat yang diacak hingga nampak sangat tidak masuk akal. Jika anda ingin menggunakan tulisan Lorem Ipsum, anda harus yakin tidak', 'Exercitation Nam neq', 'Neque cupidatat dele Ada banyak variasi tulisan Lorem Ipsum yang tersedia, tapi kebanyakan sudah mengalami perubahan bentuk, entah karena unsur humor atau kalimat yang diacak hingga nampak sangat tidak masuk akal. Jika anda ingin menggunakan tulisan Lorem Ipsum, anda harus yakin tidak ada bagian yang memalukan yang tersembunyi di tengah naskah tersebut. Semua generator Lorem Ipsum di internet cenderung untuk mengulang bagian-bagian', 'HNff3q5.jpg', '9yhyHTV.jpg', 'BYUR0iJ.jpg', '2022-08-19 17:30:33', '2022-08-20 05:47:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_blog_comment_areas`
--

CREATE TABLE `home_blog_comment_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_blog_comment_areas`
--

INSERT INTO `home_blog_comment_areas` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Fahim', 'fahim@gmail.com', 'Hello,', '2022-08-08 10:45:12', NULL, NULL),
(4, 'Kamal', 'kamal@email.com', 'How are you.', '2022-08-08 11:06:04', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_blog_heads`
--

CREATE TABLE `home_blog_heads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_blog_heads`
--

INSERT INTO `home_blog_heads` (`id`, `title`, `subtitle`, `created_at`, `updated_at`) VALUES
(1, '#blog', 'Lorem ipsum dolor sit amet consectetur adipisicing eiusmod.', NULL, '2022-08-19 14:19:07');

-- --------------------------------------------------------

--
-- Table structure for table `home_blog_social_icons`
--

CREATE TABLE `home_blog_social_icons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `social_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_icon_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_blog_social_icons`
--

INSERT INTO `home_blog_social_icons` (`id`, `social_icon`, `social_icon_link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'fa-twitter', 'https://twitter.com/', '2022-08-08 10:08:41', '2022-08-08 10:18:59', NULL),
(4, 'fa-facebook', 'https://www.facebook.com/', '2022-08-20 06:25:05', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_deal_areas`
--

CREATE TABLE `home_deal_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deal_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_deal_areas`
--

INSERT INTO `home_deal_areas` (`id`, `category_name`, `title`, `deal_photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '#FASHION SHOP', 'Deal Of The Day', 'upload_photos/deal-area-two-photos/4lpxix3.png', '2022-08-06 10:58:22', '2022-08-19 13:47:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `product_id`, `color_id`, `size_id`, `quantity`, `created_at`, `updated_at`) VALUES
(4, 14, 4, 2, 25, '2022-02-11 00:54:27', '2022-06-23 12:21:17'),
(5, 14, 3, 5, 7, '2022-02-11 00:54:48', '2022-06-23 12:21:17'),
(7, 15, 6, 3, 52, '2022-02-11 01:19:25', NULL),
(8, 15, 3, 3, 3, '2022-02-11 01:19:42', '2022-03-23 10:34:28'),
(9, 15, 4, 3, 5, '2022-02-11 01:19:55', '2022-03-23 10:41:04'),
(11, 14, 6, 3, 12, '2022-02-11 01:21:18', NULL),
(14, 14, 2, 14, -1, '2022-02-11 01:42:11', '2022-05-23 11:32:25'),
(15, 14, 3, 4, 3, '2022-02-11 01:44:47', NULL),
(16, 13, 2, 3, 1, '2022-02-11 03:50:21', '2022-03-23 10:29:21'),
(17, 13, 3, 2, 0, '2022-02-11 03:51:04', '2022-03-23 10:34:28'),
(18, 33, 3, 5, 9, '2022-08-18 16:48:56', '2022-08-18 17:07:29'),
(19, 33, 6, 3, 6, '2022-08-18 16:49:06', '2023-04-05 19:54:55'),
(20, 32, 3, 5, 11, '2022-08-18 16:49:34', '2022-08-22 02:21:19'),
(21, 32, 6, 4, 22, '2022-08-18 16:49:44', NULL),
(22, 31, 4, 5, 5, '2022-08-18 16:50:04', NULL),
(23, 31, 5, 3, 8, '2022-08-18 16:50:13', '2023-04-05 19:36:11'),
(24, 29, 6, 13, 3, '2022-08-18 16:50:41', '2022-08-22 02:45:44'),
(25, 29, 3, 13, 10, '2022-08-18 16:50:50', NULL),
(26, 28, 3, 14, 9, '2022-08-18 16:51:16', '2023-04-05 19:35:08'),
(27, 27, 3, 14, 8, '2022-08-18 16:51:39', '2022-08-22 02:29:48'),
(28, 26, 3, 5, 15, '2022-08-18 16:52:08', NULL),
(29, 25, 6, 4, 12, '2022-08-18 16:52:30', NULL),
(30, 25, 3, 3, 9, '2022-08-18 16:52:37', '2022-08-22 02:27:29'),
(31, 23, 3, 5, 3, '2022-08-18 16:53:00', '2022-08-22 02:56:17'),
(32, 23, 6, 13, 4, '2022-08-18 16:53:08', NULL);

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
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(15, '2021_10_29_200551_create_blogs_table', 1),
(34, '2021_11_28_142242_create_subcategories_table', 2),
(35, '2021_12_10_190715_add_fields_at_users_table', 2),
(37, '2022_01_01_193342_create_products_table', 2),
(42, '2022_01_04_091802_create_banners_table', 3),
(44, '2022_01_04_092259_create_features_table', 4),
(45, '2022_01_31_155123_create_add_feature_photos_table', 5),
(46, '2022_01_31_160058_create_product_feature_photos_table', 6),
(47, '2022_02_10_104836_create_colors_table', 7),
(48, '2022_02_10_173128_create_sizes_table', 8),
(49, '2022_02_10_231843_create_inventories_table', 9),
(51, '2022_02_14_220431_create_customers_table', 12),
(52, '2022_02_15_071555_add_fields_users', 11),
(53, '2022_02_16_215222_create_carts_table', 13),
(54, '2022_02_20_083207_create_countries_table', 14),
(55, '2022_02_20_091018_create_shoppings_table', 15),
(56, '2022_03_06_080208_create_coupons_table', 16),
(57, '2022_03_23_151841_create_order_summaries_table', 17),
(58, '2022_03_23_160346_create_order_details_table', 18),
(59, '2022_05_17_112324_create_reviews_table', 19),
(61, '2022_08_06_124827_create_home_deal_areas_table', 20),
(62, '2022_08_06_162203_create_deal_area_background_photos_table', 21),
(66, '2022_08_08_005028_create_home_blog_heads_table', 25),
(67, '2022_08_08_154525_create_home_blog_social_icons_table', 26),
(68, '2022_08_08_163107_create_home_blog_comment_areas_table', 27),
(70, '2022_08_08_180133_create_about_intro_areas_table', 28),
(71, '2022_08_08_215117_create_about_service_areas_table', 29),
(73, '2022_08_08_231134_create_about_team_areas_table', 30),
(75, '2021_11_09_204910_create_categories_table', 31),
(76, '2022_08_14_233916_create_about_team_social_icons_table', 32),
(78, '2022_08_17_090457_create_about_feature_areas_table', 33),
(79, '2022_08_17_150649_create_about_testimonial_areas_table', 34),
(81, '2022_08_17_194315_create_testimonial_reatings_table', 35),
(82, '2022_08_17_233235_create_about_brand_areas_table', 36),
(84, '2022_08_18_124658_create_contact_heads_table', 37),
(85, '2022_08_18_134826_create_contact_froms_table', 38),
(86, '2022_08_18_151511_create_contact_map_links_table', 39),
(87, '2022_08_18_155231_create_footer_describes_table', 40),
(88, '2022_08_18_161015_create_footer_social_icons_table', 41),
(90, '2022_08_18_180507_create_project_logos_table', 43),
(92, '2022_08_18_190018_create_favicons_table', 44),
(93, '2022_08_18_213135_create_new_offers_table', 45),
(94, '2022_08_18_220618_create_cover_photos_table', 46),
(97, '2022_08_06_175027_create_home_blog_areas_table', 47),
(98, '2022_08_18_172806_create_admin_parsonal_infos_table', 48);

-- --------------------------------------------------------

--
-- Table structure for table `new_offers`
--

CREATE TABLE `new_offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offer_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `new_offers`
--

INSERT INTO `new_offers` (`id`, `offer_title`, `created_at`, `updated_at`) VALUES
(1, 'HELLO EVERYONE! 20% Off All Products', NULL, '2022-08-20 15:11:31');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `amount`, `address`, `status`, `transaction_id`, `currency`) VALUES
(1, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 47, 'Customer Address', 'Processing', '6302edd87abad', 'BDT'),
(2, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 22200, 'Customer Address', 'Processing', '6302f051d1d90', 'BDT'),
(3, 'Customer Name', 'customer@mail.com', '8801XXXXXXXXX', 550, 'Customer Address', 'Processing', '642dcd6c6954e', 'BDT');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_summary_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_current_price` double(8,2) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_summary_id`, `product_id`, `product_current_price`, `color_id`, `size_id`, `amount`, `created_at`, `updated_at`) VALUES
(20, 33, 33, 20500.00, 6, 3, 1, '2022-08-22 02:05:01', NULL),
(21, 34, 31, 1200.00, 5, 3, 1, '2022-08-22 02:08:35', NULL),
(26, 39, 29, 17.00, 6, 13, 1, '2022-08-22 02:45:44', NULL),
(28, 41, 28, 500.00, 3, 14, 1, '2023-04-05 19:35:08', NULL),
(29, 42, 31, 1200.00, 5, 3, 1, '2023-04-05 19:36:11', NULL),
(30, 43, 33, 20500.00, 6, 3, 1, '2023-04-05 19:54:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_summaries`
--

CREATE TABLE `order_summaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_country_id` int(11) NOT NULL,
  `customer_city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_order_notes` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` double(8,2) NOT NULL,
  `shopping_charge` double(8,2) NOT NULL,
  `discount_amount` double(8,2) NOT NULL DEFAULT 0.00,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grand_total` double(8,2) NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'processing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_summaries`
--

INSERT INTO `order_summaries` (`id`, `user_id`, `customer_name`, `customer_email`, `customer_country_id`, `customer_city_name`, `customer_address`, `customer_phone_number`, `customer_order_notes`, `payment_method`, `sub_total`, `shopping_charge`, `discount_amount`, `coupon_name`, `grand_total`, `payment_status`, `order_status`, `created_at`, `updated_at`) VALUES
(33, 12, 'Rashed', 'rashed@gmail.com', 19, 'Comilla', 'DUET,Gazipur', '01356487954', 'DUET,', 'cod', 20500.00, 50.00, 0.00, '', 20550.00, 'paid', 'delivered', '2022-08-22 02:05:01', '2022-08-22 02:06:12'),
(34, 12, 'Hilary Medina', 'torodejes@mailinator.com', 19, 'Dhaka', 'Deleniti aliquam neq', '01356487954', 'Consequatur Ab eum', 'cod', 1200.00, 30.00, 0.00, '', 1230.00, 'paid', 'delivered', '2022-08-22 02:08:35', '2022-08-22 02:08:51'),
(39, 12, 'Rashed', 'rashed@gmail.com', 19, 'Dhaka', 'Danmondi,dhaka', '01356487954', 'Danmondi,rod/2', 'online', 17.00, 30.00, 0.00, '', 47.00, 'paid', 'delivered', '2022-08-22 02:45:44', '2022-08-22 02:46:16'),
(41, 12, 'Rashed', 'rashed@gmail.com', 19, 'Comilla', 'DUET,Gazipur', '01965874589', 'DUET', 'online', 500.00, 50.00, 0.00, '', 550.00, 'paid', 'delivered', '2023-04-05 19:35:08', '2023-04-05 19:37:53'),
(42, 12, 'Rashed', 'rashed@gmail.com', 19, 'Comilla', 'Id officia assumenda', '01965874589', 'sadfa', 'cod', 1200.00, 50.00, 0.00, '', 1250.00, 'paid', 'delivered', '2023-04-05 19:36:11', '2023-04-05 19:37:38'),
(43, 12, 'Rashed', 'rashed@gmail.com', 19, 'Comilla', 'titas,comilla', '01965874589', 'Titas', 'cod', 20500.00, 50.00, 0.00, '', 20550.00, 'unpaid', 'processing', '2023-04-05 19:54:55', NULL);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regular_price` int(11) NOT NULL,
  `discounted_price` int(11) DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `long_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dimensions` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `materials` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_thumbnail_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_product_thumbnail_photo.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `regular_price`, `discounted_price`, `short_description`, `sku`, `category_id`, `subcategory_id`, `long_description`, `slug`, `weight`, `dimensions`, `materials`, `other_info`, `product_thumbnail_photo`, `created_at`, `updated_at`) VALUES
(23, 'Redmi', 22000, 22000, 'Maxime ab aut quo la', '6YrNEQ5beL', 6, 17, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here', 'redmi', 'Voluptas irure vitae', 'Rem ipsum quibusdam', 'Voluptates rerum vol', 'Aliquam labore deser', '1-m2U4rNy.jpg', '2022-08-14 17:08:15', '2022-08-14 17:08:15'),
(25, 'Casso', 1050, 1050, 'Eum porro voluptate', '9eHTGmPKR2', 5, 13, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here', 'casso', 'Aut nemo mollit quae', 'Quas dolorem odit ut', 'Elit beatae dolores', 'Quis dolorem similiq', '1-nqLqKNG.jpg', '2022-08-14 17:10:09', '2022-08-14 17:10:10'),
(26, 'Rolex', 10500, 10500, 'Exercitation esse d', 'cUrUPHBUKv', 5, 14, 'Non consectetur cum It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here', 'rolex', 'Nulla ex ex doloremq', 'Quibusdam obcaecati', 'Quidem non ad repell', 'Dolorum corporis err', '1-YWLUT94.jpg', '2022-08-14 17:11:00', '2022-08-14 17:11:00'),
(27, 'Dslr', 40000, 40000, 'Deserunt et duis est', 'zw76BvdGlA', 8, 21, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here', 'dslr', 'Deserunt in officia', 'Nobis non quam non r', 'Sint et quo magnam', 'Porro possimus plac', '1-a7xT8Ag.jpg', '2022-08-14 17:11:41', '2022-08-14 17:11:41'),
(28, 'Apex', 2800, 500, 'Esse ut et in harum', '8a5ggTDALz', 7, 19, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here', 'apex', 'Repellendus Necessi', 'Voluptas veritatis a', 'Sit ab sunt consequ', 'Aliqua Officiis mag', '1-PpjJnE9.jpg', '2022-08-14 17:12:28', '2022-08-14 17:12:28'),
(29, 'Bata', 2417, 17, 'Non molestiae volupt', 'R4vvA5Lve7', 7, 20, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here', 'bata', 'Ad eligendi quaerat', 'Qui ut quidem ullam', 'Velit reprehenderit', 'Voluptas rem eum ull', '1-PWociNv.jpg', '2022-08-14 17:13:11', '2022-08-14 17:13:11'),
(30, 'Car', 660, 660, 'Nulla eveniet eu co', '3O4PJBFpsc', 4, 11, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here', 'car', 'Blanditiis quisquam', 'Nisi cumque irure mi', 'Qui deleniti excepte', 'Ut exercitationem so', '1-XpnLDMT.png', '2022-08-14 17:14:35', '2022-08-14 17:14:35'),
(31, 'Dress', 1200, 1200, 'Quia vero ipsum offi', '8OAnhU4gv2', 3, 23, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here', 'dress', 'Ab reprehenderit off', 'Earum ut quisquam qu', 'Elit consequatur re', 'Tempora proident al', '1-P7KwAgL.jpg', '2022-08-14 17:17:27', '2022-08-14 17:17:27'),
(32, 'Realme', 20000, 20000, 'Atque aperiam eos e', '36OlsnvTWA', 6, 18, 'Vel error veritatis', 'realme', 'Distinctio Irure mo', 'Nulla laborum Simil', 'Quibusdam ab in cons', 'Quo illo et repudian', '1-xU7LnZY.jpg', '2022-08-14 17:28:54', '2022-08-14 17:28:54'),
(33, 'Samsung', 20500, 20500, 'Et nostrum velit qui', '4BIDH1HAdS', 6, 15, 'Rerum vero at accusa', 'samsung', 'Nihil cumque et qui', 'Nobis nihil hic expe', 'Vel qui nulla praese', 'Nisi facilis totam e', '1-oQVlFwY.jpg', '2022-08-14 17:30:15', '2022-08-14 17:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `product_feature_photos`
--

CREATE TABLE `product_feature_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_feature_photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_feature_photos`
--

INSERT INTO `product_feature_photos` (`id`, `product_id`, `product_feature_photo_name`, `created_at`, `updated_at`) VALUES
(16, 33, '1-2LjEF5H.jpg', '2022-08-18 16:54:08', NULL),
(17, 33, '1-jvCZmrH.jpg', '2022-08-18 16:54:08', NULL),
(18, 32, '1-nFrSIL9.jpg', '2022-08-18 16:55:36', NULL),
(19, 32, '1-7st1FlV.jpg', '2022-08-18 16:55:36', NULL),
(20, 32, '1-LgLTywF.jpg', '2022-08-18 16:55:36', NULL),
(21, 31, '1-nuvzcOX.jpg', '2022-08-18 16:56:21', NULL),
(22, 28, '1-MJsdicd.jpg', '2022-08-18 16:56:55', NULL),
(23, 28, '1-oJxXNUb.jpg', '2022-08-18 16:56:55', NULL),
(24, 27, '1-BaojObk.jpg', '2022-08-18 16:57:33', NULL),
(25, 27, '1-IP5HP7h.jpg', '2022-08-18 16:57:33', NULL),
(26, 29, '1-on5NNOt.jpg', '2022-08-18 16:58:04', NULL),
(27, 29, '1-5yLMfwe.jpg', '2022-08-18 16:58:04', NULL),
(28, 25, '1-q87XN9Z.jpg', '2022-08-18 17:01:36', NULL),
(29, 25, '1-jFkPl3S.jpg', '2022-08-18 17:01:36', NULL),
(30, 25, '1-iVSMNrR.jpg', '2022-08-18 17:01:36', NULL),
(31, 23, '1-4UHFdam.jpg', '2022-08-18 17:02:08', NULL),
(32, 23, '1-CLHCNtD.jpg', '2022-08-18 17:02:09', NULL),
(33, 23, '1-AQFqLGx.jpg', '2022-08-18 17:02:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_logos`
--

CREATE TABLE `project_logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_logo_photo.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_logos`
--

INSERT INTO `project_logos` (`id`, `logo_photo`, `created_at`, `updated_at`) VALUES
(1, '1pZw7ky.png', NULL, '2022-08-20 18:01:06');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_details_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `order_details_id`, `product_id`, `color_id`, `size_id`, `user_id`, `review`, `rating`, `created_at`, `updated_at`) VALUES
(2, 20, 33, 6, 3, 12, 'Kobi valo', 3, '2022-08-22 02:06:59', NULL),
(3, 21, 31, 5, 3, 12, 'Nice dress', 4, '2022-08-22 02:09:25', NULL),
(4, 26, 29, 6, 13, 12, 'wow', 4, '2022-08-22 02:46:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shoppings`
--

CREATE TABLE `shoppings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shopping_charge` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shoppings`
--

INSERT INTO `shoppings` (`id`, `country_id`, `city_name`, `shopping_charge`, `created_at`, `updated_at`) VALUES
(1, 19, 'Comilla', 50.00, NULL, NULL),
(4, 19, 'Dhaka', 30.00, NULL, NULL),
(5, 103, 'kolkata', 200.00, NULL, NULL),
(6, 103, 'Deli', 200.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size_name`, `created_at`, `updated_at`) VALUES
(2, 'S', '2022-02-10 11:52:17', NULL),
(3, 'M', '2022-02-10 11:54:20', NULL),
(4, 'XL', '2022-02-10 11:54:31', NULL),
(5, 'L', '2022-02-10 11:54:38', NULL),
(6, 'XXL', '2022-02-10 11:55:10', NULL),
(7, '28', '2022-02-10 11:55:16', NULL),
(8, '30', '2022-02-10 11:55:26', NULL),
(9, '32', '2022-02-10 11:55:32', NULL),
(10, '34', '2022-02-10 11:59:33', NULL),
(11, '36', '2022-02-10 11:59:39', NULL),
(12, '38', '2022-02-10 11:59:43', NULL),
(13, '40', '2022-02-10 11:59:48', NULL),
(14, '42', '2022-02-10 11:59:53', NULL),
(15, '44', '2022-02-10 12:00:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `added_by`, `created_at`, `updated_at`) VALUES
(11, 4, 'Car', 1, '2022-08-14 16:29:57', '2022-08-14 16:29:57'),
(12, 4, 'Doll', 1, '2022-08-14 16:30:07', '2022-08-14 16:30:07'),
(13, 5, 'Casso', 1, '2022-08-14 16:30:57', '2022-08-14 16:30:57'),
(14, 5, 'Rolex', 1, '2022-08-14 16:31:17', '2022-08-14 16:31:17'),
(15, 6, 'Samsung', 1, '2022-08-14 16:31:50', '2022-08-14 16:31:50'),
(16, 6, 'Oppo', 1, '2022-08-14 16:32:01', '2022-08-14 16:32:01'),
(17, 6, 'Redmi', 1, '2022-08-14 16:32:22', '2022-08-14 16:32:22'),
(18, 6, 'Realme', 1, '2022-08-14 16:32:48', '2022-08-14 16:32:48'),
(19, 7, 'Apex', 1, '2022-08-14 16:33:21', '2022-08-14 16:33:21'),
(20, 7, 'Bata', 1, '2022-08-14 16:33:31', '2022-08-14 16:33:31'),
(21, 8, 'Dslr camera', 1, '2022-08-14 16:34:19', '2022-08-14 16:34:19'),
(23, 3, 'Dress', 1, '2022-08-14 17:16:27', '2022-08-14 17:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_reatings`
--

CREATE TABLE `testimonial_reatings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonial_reatings`
--

INSERT INTO `testimonial_reatings` (`id`, `reating`, `created_at`, `updated_at`) VALUES
(2, 2, '2022-08-17 13:52:47', NULL),
(3, 4, '2022-08-17 14:01:14', NULL),
(5, 3, '2022-08-20 08:43:55', NULL),
(6, 4, '2022-08-20 08:44:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default-profile-photo.jpg',
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone_number`, `address`, `profile_photo`, `role`) VALUES
(1, 'Habib', 'habib@gmail.com', NULL, '$2y$10$9hzyKyAu4jLqYQ9F4rcmjemE.cboks5MFpCV2YMpDyK6KDddIHbm.', 'b2gto2lTX7iEmgTHyN1MEEqkZKhFcd9YfIMz5hcfgQSglXDEbzK2tM6GHD2b', '2021-10-31 13:58:12', '2022-01-01 18:17:24', NULL, 'Gazipur', '1-pc5M2y.jpg', 'Admin'),
(2, 'Nasim', 'nasim@gmail.com', NULL, '$2y$10$oosGFxXqm0mQsN.vwEwsT.Jto1l2T751JslV.S/v7jp78HsC4VTTi', NULL, '2021-11-13 11:01:33', '2021-11-13 11:01:33', NULL, NULL, 'default-profile-photo.jpg', 'Admin'),
(3, 'Ahosan', 'ahosan@gmail.com', NULL, '$2y$10$aFXz/Stc7TsIjBGyJPhvf.GMhr7kSl4F1yHp1SEs7mx9G2HykpqLq', NULL, '2021-11-27 06:46:38', '2021-11-27 06:46:38', NULL, NULL, 'default-profile-photo.jpg', 'Admin'),
(4, 'Naim', 'naim@gmail.com', NULL, '$2y$10$3aJCBiW4AKMQKwhcl41uruEKE45cK8khxEV.u2GeblSMEcQxafOou', NULL, '2021-11-27 09:51:10', '2021-11-27 09:51:10', NULL, NULL, 'default-profile-photo.jpg', 'Admin'),
(5, 'Abir', 'abir@gmail.com', NULL, '$2y$10$mB5t3Q7UtbBPyTvmQvO3yeNCVcSXjL2EzpSUeLcB5YaVTI0yc.DYy', 'YhBGMRUxOxe4y0SXTwgv35O2Zs46DE947pdpPt8zH4MiKIySCp8diy4f1pFD', '2021-11-27 10:00:11', '2021-12-13 18:34:26', NULL, NULL, 'default-profile-photo.jpg', 'Admin'),
(6, 'Rahat', 'rahat@gmail.com', NULL, '$2y$10$1iQO6Dd.9.gdYNcy98hxI.GlmBo7e1RaQzgm/TPt6k.oLvUG6.7YG', NULL, '2021-11-27 17:32:20', '2021-11-27 17:32:20', NULL, NULL, 'default-profile-photo.jpg', 'Admin'),
(7, 'Samim', 'samim@gmail.com', NULL, '$2y$10$5H3EhL1cZR6jWZLEQUg/ROTEzU64kiNKGVIlJmSpI3VobW1N2iJva', NULL, '2021-12-10 16:33:19', '2021-12-10 17:28:26', NULL, NULL, 'default-profile-photo.jpg', 'Admin'),
(8, 'Saymon', 'saymon@gmail.com', NULL, '$2y$10$3za.Q3FwoY4RKj8PF9n3du2if5qMAI9KP394C1DQbZIlft7.R1Tqa', 'DKuQT1TskvGVrtQOlUHnsQC21PbkzM0PmZs7BoQ2SVNhniPoFDj3DK9ca0CL', '2021-12-13 19:13:59', '2021-12-13 19:13:59', NULL, NULL, 'default-profile-photo.jpg', 'Admin'),
(9, 'Rabib Hosan', 'rabib@gmail.com', NULL, '$2y$10$QUltSxUvPq8e3VIOMhDTHO2ATLA/d.yZaoLRxhB5On7.XlyJEtGZ6', 'sfBtxav43gkQrxljQyMQjXsCsbREuVurUPNjpswLn2N9XMeg1pg2ruasKyYC', '2021-12-22 15:37:21', '2021-12-22 15:46:10', NULL, NULL, 'default-profile-photo.jpg', 'Admin'),
(10, 'Desirae Hudson', 'ddd@gmail.com', NULL, '$2y$10$6RWIpcUnf/91XUSHRbhlQeyEP7LySmSO6oW.jnY7sJ6IGywEsijau', NULL, '2022-02-14 15:49:52', '2022-02-14 15:49:52', NULL, NULL, 'default-profile-photo.jpg', 'Admin'),
(12, 'Rashed', 'rashed@gmail.com', NULL, '$2y$10$pgfTUxRbjf1Nbo768Nh94edLFI5vaM0TgHlut3JnVCbdz3lk3mwnu', NULL, '2022-02-15 01:28:58', NULL, '01736598754', 'Dhaka', 'default-profile-photo.jpg', 'Customer'),
(13, 'Hridoy', 'hridoy@gmail.com', NULL, '$2y$10$IcNHWPDg3EpdW2gG84/8Met8.ng6sYMTFn0Ezz1cgC8ENy43iT7XC', NULL, '2022-08-18 17:05:57', NULL, '01365987542', 'DUET,Gazipur', 'default-profile-photo.jpg', 'Customer'),
(14, 'Test1', 'test1@gmail.com', NULL, '$2y$10$FOOUaLB8X7JD2xpkxHIkGep7/qyq6lEZKnLDWtGUmYnpf9a91fc5O', NULL, '2023-04-05 15:20:38', NULL, '01969440721', 'Gazipur', 'default-profile-photo.jpg', 'Customer'),
(15, 'Rofik', 'rofi@gmail.com', NULL, '$2y$10$hR1q0fuuPW1z7Ydz917IW.ZOEEN2TYTXMxkMeUcJx4YMrZgRAFTLO', NULL, '2023-04-05 19:22:46', '2023-04-05 19:22:46', NULL, NULL, 'default-profile-photo.jpg', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_brand_areas`
--
ALTER TABLE `about_brand_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_feature_areas`
--
ALTER TABLE `about_feature_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_intro_areas`
--
ALTER TABLE `about_intro_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_service_areas`
--
ALTER TABLE `about_service_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_team_areas`
--
ALTER TABLE `about_team_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_team_social_icons`
--
ALTER TABLE `about_team_social_icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_testimonial_areas`
--
ALTER TABLE `about_testimonial_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_parsonal_infos`
--
ALTER TABLE `admin_parsonal_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_froms`
--
ALTER TABLE `contact_froms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_heads`
--
ALTER TABLE `contact_heads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_map_links`
--
ALTER TABLE `contact_map_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countries_code_index` (`code`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cover_photos`
--
ALTER TABLE `cover_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deal_area_background_photos`
--
ALTER TABLE `deal_area_background_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favicons`
--
ALTER TABLE `favicons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_describes`
--
ALTER TABLE `footer_describes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_social_icons`
--
ALTER TABLE `footer_social_icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_blog_areas`
--
ALTER TABLE `home_blog_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_blog_comment_areas`
--
ALTER TABLE `home_blog_comment_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_blog_heads`
--
ALTER TABLE `home_blog_heads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_blog_social_icons`
--
ALTER TABLE `home_blog_social_icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_deal_areas`
--
ALTER TABLE `home_deal_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_offers`
--
ALTER TABLE `new_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_summaries`
--
ALTER TABLE `order_summaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Indexes for table `product_feature_photos`
--
ALTER TABLE `product_feature_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_logos`
--
ALTER TABLE `project_logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shoppings`
--
ALTER TABLE `shoppings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial_reatings`
--
ALTER TABLE `testimonial_reatings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_brand_areas`
--
ALTER TABLE `about_brand_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `about_feature_areas`
--
ALTER TABLE `about_feature_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `about_intro_areas`
--
ALTER TABLE `about_intro_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `about_service_areas`
--
ALTER TABLE `about_service_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `about_team_areas`
--
ALTER TABLE `about_team_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `about_team_social_icons`
--
ALTER TABLE `about_team_social_icons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `about_testimonial_areas`
--
ALTER TABLE `about_testimonial_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin_parsonal_infos`
--
ALTER TABLE `admin_parsonal_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_froms`
--
ALTER TABLE `contact_froms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_heads`
--
ALTER TABLE `contact_heads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_map_links`
--
ALTER TABLE `contact_map_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cover_photos`
--
ALTER TABLE `cover_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deal_area_background_photos`
--
ALTER TABLE `deal_area_background_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favicons`
--
ALTER TABLE `favicons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `footer_describes`
--
ALTER TABLE `footer_describes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footer_social_icons`
--
ALTER TABLE `footer_social_icons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home_blog_areas`
--
ALTER TABLE `home_blog_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home_blog_comment_areas`
--
ALTER TABLE `home_blog_comment_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `home_blog_heads`
--
ALTER TABLE `home_blog_heads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_blog_social_icons`
--
ALTER TABLE `home_blog_social_icons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `home_deal_areas`
--
ALTER TABLE `home_deal_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `new_offers`
--
ALTER TABLE `new_offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `order_summaries`
--
ALTER TABLE `order_summaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `product_feature_photos`
--
ALTER TABLE `product_feature_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `project_logos`
--
ALTER TABLE `project_logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shoppings`
--
ALTER TABLE `shoppings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `testimonial_reatings`
--
ALTER TABLE `testimonial_reatings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

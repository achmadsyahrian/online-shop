-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 26, 2023 at 07:11 PM
-- Server version: 8.0.33-0ubuntu0.22.04.2
-- PHP Version: 8.1.2-1ubuntu2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshop_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `outlet_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `outlet_id`, `name`, `created_at`, `updated_at`) VALUES
(5, 3, 'Parfume', '2023-07-21 05:58:28', '2023-07-21 05:58:28');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_16_141733_create_outlets_table', 1),
(6, '2023_06_16_142829_create_categories_table', 1),
(7, '2023_06_16_143019_create_products_table', 1),
(8, '2023_06_26_094322_create_transactions_table', 1),
(9, '2023_06_26_102620_create_transaction_items_table', 1),
(10, '2023_07_26_053819_create_rates_table', 1),
(11, '2023_07_26_083952_create_qualities_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `outlets`
--

CREATE TABLE `outlets` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outlets`
--

INSERT INTO `outlets` (`id`, `user_id`, `name`, `address`, `phone`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Achmad.ID', 'Washington, D.C., Amerika Serikat', '089528126200', '', '2023-06-30 22:58:39', '2023-06-30 22:58:39'),
(2, 6, 'Gambar', '-', '82810939643', '<div><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:433,&quot;url&quot;:&quot;https://awsimages.detik.net.id/community/media/visual/2022/11/03/gambar-dekoratif-2.jpeg?w=650&amp;q=80&quot;,&quot;width&quot;:650}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://awsimages.detik.net.id/community/media/visual/2022/11/03/gambar-dekoratif-2.jpeg?w=650&amp;q=80\" width=\"650\" height=\"433\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:371,&quot;url&quot;:&quot;https://www.researchgate.net/publication/354245899/figure/fig1/AS:1062879461666816@1630421619887/Gambar-5-Gambar-Sketsa-Terpilih-Produk-1-Sumber-Penulis-2020.jpg&quot;,&quot;width&quot;:294}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://www.researchgate.net/publication/354245899/figure/fig1/AS:1062879461666816@1630421619887/Gambar-5-Gambar-Sketsa-Terpilih-Produk-1-Sumber-Penulis-2020.jpg\" width=\"294\" height=\"371\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:224,&quot;url&quot;:&quot;https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU&quot;,&quot;width&quot;:225}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQXSqFLCTtIuiV_d0pexajpo5ImwZVxRYEgNOZ8D9XtFKCnN-u9gKRaj3oksttl9NKkwfU&amp;usqp=CAU\" width=\"225\" height=\"224\"><figcaption class=\"attachment__caption\"></figcaption></figure></div>', '2023-07-01 04:40:13', '2023-07-01 04:40:13'),
(3, 9, 'Parfume', 'Jl. Karet Raya, Mangga, Kec. Medan Tuntungan, Kota Medan, Sumatera Utara 20141', '85274002754', '<div>-</div>', '2023-07-21 05:53:05', '2023-07-21 05:53:05');

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
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `outlet_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `stock` int NOT NULL,
  `photo_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `outlet_id`, `name`, `harga`, `stock`, `photo_1`, `photo_2`, `photo_3`, `description`, `created_at`, `updated_at`) VALUES
(5, 5, 3, 'Babylone', 2500, 100, 'product-images/aOc8XLxMlsqcaMyePImosuMPziP90tQ8GEoWvKfg.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:28:53', '2023-07-21 06:28:53'),
(6, 5, 3, 'Jillo Platinum', 2500, 100, 'product-images/CGoQ6YyShAvGzhMriKYe1bQ7HQ056UhFeGxFV4hM.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:29:38', '2023-07-21 06:29:38'),
(7, 5, 3, 'Hermes Teredhermes', 2500, 100, 'product-images/o3tI8ooIDeh2ubldKoC1S4EcycyptiRPY0U4t4JW.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:30:16', '2023-07-21 06:30:16'),
(8, 5, 3, 'Kenzo Daun', 3000, 100, 'product-images/Us1Nci1E31k07FIVlsKQf6X3yTpsFIJBzAS6Y5nX.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:31:20', '2023-07-21 06:31:20'),
(9, 5, 3, 'Pramugari', 2500, 100, 'product-images/dyALpl16U783ZgVbq7Cq7VXlZWXR5DNjcTAuFuUU.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:32:21', '2023-07-21 06:32:21'),
(10, 5, 3, 'Farhampton', 2500, 100, 'product-images/VQhCiDiUcBEmdimlw6jgZDUggnD2WGhaG4cmgwMH.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:33:03', '2023-07-21 06:33:03'),
(11, 5, 3, 'Carolina Herera', 4000, 100, 'product-images/9BzawkAHqCfaMObs8tsbf7gb55O2HiKGCvDHb6pm.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:33:41', '2023-07-21 06:33:41'),
(12, 5, 3, 'Candy Fruit Stawberry', 2000, 100, 'product-images/pjxmqMjivvAW5d3QoMvPkQD9JlOJOBgIXn6Enfr5.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:34:51', '2023-07-21 06:34:51'),
(13, 5, 3, 'Bombastis', 3500, 100, 'product-images/0xSQRfFTZDZH7JOACcUXcCVoFtcEACWUXKuM9d9N.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:35:27', '2023-07-21 06:35:27'),
(14, 5, 3, 'Jo Malone', 2500, 100, 'product-images/TbIM5eYj9zVrhkfldQyy2uulZzTJZBAxA4oH0dlX.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:36:00', '2023-07-21 06:36:00'),
(15, 5, 3, 'Raffi Ahmad / Qori', 2500, 100, 'product-images/xqnaFbutQM0VVChby8j01bqrwZzWwlrgzNzBPvOQ.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:36:59', '2023-07-21 06:36:59'),
(16, 5, 3, 'ORGSM', 2500, 100, 'product-images/McLOO4Qm0ajBxMhC8dtiiqc7tYuOoVvZ4TbXrzIg.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:37:44', '2023-07-21 06:37:44'),
(17, 5, 3, 'Bulgary Extreme', 2500, 100, 'product-images/fD4nGTmQw8UaeiJvWYKE9275KjEgZwbeP4zoXbPQ.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:38:25', '2023-07-21 06:38:25'),
(18, 5, 3, 'Clinique Happy For Man', 2500, 100, 'product-images/pPbddVJ7HrsNcDsEHhKH49UEpLO56VHC4lw7184b.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:39:09', '2023-07-21 06:39:09'),
(19, 5, 3, 'Christina Aguilera', 2500, 100, 'product-images/deaE38U7ZVWZ898G5JgkUFtMol1ZsXcPkHdxTeuq.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:40:18', '2023-07-21 06:40:18'),
(20, 5, 3, 'Baccarat Dubai', 2500, 100, 'product-images/LuINsrcGsy0lsBPm8ZXnOzj8KpbydTP0WWWo6Eyg.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:40:54', '2023-07-21 06:40:54'),
(21, 5, 3, 'Selena Gomez Love Song', 2500, 100, 'product-images/RNe8ym70b0M0mdEJnQvBJYIMiGooFzSKS44lQ0kj.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:41:28', '2023-07-21 06:41:28'),
(22, 5, 3, 'Coffe In the Air', 2500, 100, 'product-images/lA0ZwAooOhNgc7fLmTO9wmi1s6fcBJ85ZTfdw0hL.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:42:07', '2023-07-21 06:42:07'),
(23, 5, 3, 'Maherzain', 2500, 100, 'product-images/RRRETk8i4FXYNlvsiyFofq3QF8zquDm0VcdupIni.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:42:40', '2023-07-21 06:42:40'),
(24, 5, 3, 'Christian Dior Sauvage', 2500, 100, 'product-images/M0y2ohdI1IZE3BQvCVGsuklWOwhQKqMmNRzQ8tZf.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:43:20', '2023-07-21 06:43:20'),
(25, 5, 3, 'Vanilla Manggo', 2500, 100, 'product-images/RprIxmmACzdVUtuetJQBtxlxz7sldsqBZwn7D5Wl.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:44:20', '2023-07-21 06:44:20'),
(26, 5, 3, 'Avril Lavigne Forbidden Rose', 2500, 100, 'product-images/ezzVEduX6KRsSwS7Gr6MUIl0hZ3jPwq2YC77DG9A.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:45:11', '2023-07-21 06:45:11'),
(27, 5, 3, 'Brithney Spears Fantasi', 2500, 100, 'product-images/Be2qBLUlIGSHwBSboeWVtbmA2M8tSh3NYpJR4w66.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:45:58', '2023-07-21 06:45:58'),
(28, 5, 3, 'Diamor Woman', 2500, 100, 'product-images/HWNyq9s2MEsibaQbHRoO8v6bHD6SMNjVxxQz4teF.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:46:29', '2023-07-21 06:46:29'),
(29, 5, 3, 'Lovely', 2500, 100, 'product-images/jtGZBzWqBuuo4WdB794lCRuzDobrzcriHMzsUj6w.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:47:10', '2023-07-21 06:47:10'),
(30, 5, 3, 'Baccarat', 3500, 100, 'product-images/FzQniPHaVuGRfAkxpqPdg72KvjNLDPtO0vkOsCNB.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:47:47', '2023-07-21 06:47:47'),
(31, 5, 3, 'Taylor Swift', 2500, 100, 'product-images/QgabQLpcmZADEdOrqSuwsHzG40uKjkrxr5mCrXKe.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:48:17', '2023-07-26 02:43:03'),
(32, 5, 3, 'D & G Light Blue', 2500, 100, 'product-images/9jND2WRPdyJNTfrRZyzR5ISwhxwgzzj84Hx8YMCh.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:49:04', '2023-07-21 06:49:04'),
(33, 5, 3, 'Victoria Love', 2500, 100, 'product-images/PNRIgJYCA20g3TO9GXENgZbrBZrskWrp4yHxKOFA.jpg', NULL, NULL, '<div>-</div>', '2023-07-21 06:49:34', '2023-07-21 06:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `qualities`
--

CREATE TABLE `qualities` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `transaction_item_id` bigint UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `qualities`
--

INSERT INTO `qualities` (`id`, `user_id`, `transaction_item_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 11, 1, 'Sangat Baik', '2023-07-26 04:57:49', '2023-07-26 04:57:49'),
(2, 11, 2, 'Baik', '2023-07-26 04:57:58', '2023-07-26 04:57:58'),
(3, 11, 3, 'Sangat Baik', '2023-07-26 04:58:06', '2023-07-26 04:58:06'),
(4, 11, 4, 'Standart', '2023-07-26 04:58:29', '2023-07-26 04:58:29'),
(5, 11, 5, 'Standart', '2023-07-26 04:58:39', '2023-07-26 04:58:39'),
(6, 11, 6, 'Baik', '2023-07-26 04:58:45', '2023-07-26 04:58:45'),
(7, 11, 8, 'Sangat Baik', '2023-07-26 04:58:55', '2023-07-26 04:58:55'),
(8, 11, 7, 'Sangat Baik', '2023-07-26 04:59:01', '2023-07-26 04:59:01'),
(9, 11, 9, 'Standart', '2023-07-26 04:59:13', '2023-07-26 04:59:13'),
(10, 11, 10, 'Sangat Buruk', '2023-07-26 04:59:20', '2023-07-26 04:59:20'),
(11, 11, 11, 'Baik', '2023-07-26 04:59:33', '2023-07-26 04:59:33'),
(12, 11, 12, 'Baik', '2023-07-26 04:59:40', '2023-07-26 04:59:40'),
(13, 11, 13, 'Sangat Baik', '2023-07-26 04:59:47', '2023-07-26 04:59:47'),
(14, 11, 14, 'Sangat Baik', '2023-07-26 05:00:00', '2023-07-26 05:00:00'),
(15, 11, 15, 'Standart', '2023-07-26 05:00:05', '2023-07-26 05:00:05'),
(16, 11, 16, 'Baik', '2023-07-26 05:00:17', '2023-07-26 05:00:17'),
(17, 11, 17, 'Sangat Baik', '2023-07-26 05:00:25', '2023-07-26 05:00:25'),
(18, 11, 18, 'Sangat Baik', '2023-07-26 05:00:32', '2023-07-26 05:00:32'),
(19, 11, 19, 'Sangat Baik', '2023-07-26 05:00:38', '2023-07-26 05:00:38'),
(20, 12, 20, 'Baik', '2023-07-26 05:00:59', '2023-07-26 05:00:59'),
(21, 12, 21, 'Sangat Buruk', '2023-07-26 05:01:06', '2023-07-26 05:01:06'),
(22, 12, 22, 'Baik', '2023-07-26 05:01:16', '2023-07-26 05:01:16'),
(23, 12, 23, 'Standart', '2023-07-26 05:01:24', '2023-07-26 05:01:24'),
(24, 12, 24, 'Baik', '2023-07-26 05:01:31', '2023-07-26 05:01:31'),
(25, 12, 25, 'Buruk', '2023-07-26 05:01:38', '2023-07-26 05:01:38'),
(26, 12, 26, 'Standart', '2023-07-26 05:01:44', '2023-07-26 05:01:44'),
(27, 12, 27, 'Sangat Baik', '2023-07-26 05:01:50', '2023-07-26 05:01:50'),
(28, 12, 28, 'Sangat Baik', '2023-07-26 05:01:57', '2023-07-26 05:01:57'),
(29, 12, 29, 'Baik', '2023-07-26 05:02:07', '2023-07-26 05:02:07'),
(30, 12, 30, 'Standart', '2023-07-26 05:02:13', '2023-07-26 05:02:13'),
(31, 12, 31, 'Sangat Baik', '2023-07-26 05:02:21', '2023-07-26 05:02:21'),
(32, 12, 32, 'Baik', '2023-07-26 05:02:30', '2023-07-26 05:02:30'),
(33, 12, 33, 'Standart', '2023-07-26 05:02:36', '2023-07-26 05:02:36'),
(34, 12, 34, 'Sangat Buruk', '2023-07-26 05:02:43', '2023-07-26 05:02:43'),
(35, 12, 35, 'Sangat Baik', '2023-07-26 05:02:51', '2023-07-26 05:02:51'),
(36, 12, 36, 'Sangat Baik', '2023-07-26 05:02:57', '2023-07-26 05:02:57'),
(37, 12, 37, 'Sangat Baik', '2023-07-26 05:03:04', '2023-07-26 05:03:04'),
(38, 12, 38, 'Sangat Baik', '2023-07-26 05:03:11', '2023-07-26 05:03:11'),
(39, 12, 39, 'Sangat Baik', '2023-07-26 05:03:17', '2023-07-26 05:03:17'),
(40, 13, 40, 'Sangat Baik', '2023-07-26 05:03:38', '2023-07-26 05:03:38'),
(41, 13, 41, 'Sangat Baik', '2023-07-26 05:03:44', '2023-07-26 05:03:44'),
(42, 13, 42, 'Baik', '2023-07-26 05:03:50', '2023-07-26 05:03:50'),
(43, 13, 43, 'Sangat Baik', '2023-07-26 05:03:56', '2023-07-26 05:03:56'),
(44, 13, 44, 'Baik', '2023-07-26 05:04:03', '2023-07-26 05:04:03'),
(45, 13, 45, 'Sangat Baik', '2023-07-26 05:04:08', '2023-07-26 05:04:08'),
(46, 13, 46, 'Standart', '2023-07-26 05:04:14', '2023-07-26 05:04:14'),
(47, 13, 47, 'Baik', '2023-07-26 05:04:19', '2023-07-26 05:04:19'),
(48, 13, 48, 'Sangat Baik', '2023-07-26 05:04:25', '2023-07-26 05:04:25'),
(49, 13, 49, 'Sangat Baik', '2023-07-26 05:04:37', '2023-07-26 05:04:37'),
(50, 13, 50, 'Sangat Baik', '2023-07-26 05:04:44', '2023-07-26 05:04:44'),
(51, 13, 51, 'Standart', '2023-07-26 05:04:51', '2023-07-26 05:04:51'),
(52, 13, 52, 'Sangat Baik', '2023-07-26 05:05:00', '2023-07-26 05:05:00'),
(53, 13, 53, 'Sangat Baik', '2023-07-26 05:05:05', '2023-07-26 05:05:05'),
(54, 13, 54, 'Baik', '2023-07-26 05:05:11', '2023-07-26 05:05:11'),
(55, 13, 55, 'Buruk', '2023-07-26 05:05:18', '2023-07-26 05:05:18'),
(56, 15, 56, 'Sangat Baik', '2023-07-26 05:05:40', '2023-07-26 05:05:40'),
(57, 15, 57, 'Sangat Baik', '2023-07-26 05:05:45', '2023-07-26 05:05:45'),
(58, 15, 58, 'Sangat Baik', '2023-07-26 05:05:52', '2023-07-26 05:05:52'),
(59, 15, 59, 'Sangat Baik', '2023-07-26 05:05:58', '2023-07-26 05:05:58'),
(60, 15, 60, 'Sangat Baik', '2023-07-26 05:06:03', '2023-07-26 05:06:03'),
(61, 15, 61, 'Sangat Baik', '2023-07-26 05:06:10', '2023-07-26 05:06:10'),
(62, 15, 62, 'Baik', '2023-07-26 05:06:16', '2023-07-26 05:06:16'),
(63, 15, 63, 'Standart', '2023-07-26 05:06:23', '2023-07-26 05:06:23'),
(64, 15, 64, 'Standart', '2023-07-26 05:06:30', '2023-07-26 05:06:30'),
(65, 15, 65, 'Buruk', '2023-07-26 05:06:37', '2023-07-26 05:06:37'),
(66, 15, 66, 'Baik', '2023-07-26 05:06:42', '2023-07-26 05:06:42'),
(67, 15, 67, 'Sangat Baik', '2023-07-26 05:06:48', '2023-07-26 05:06:48'),
(68, 15, 68, 'Baik', '2023-07-26 05:06:53', '2023-07-26 05:06:53'),
(69, 15, 69, 'Baik', '2023-07-26 05:07:05', '2023-07-26 05:07:05'),
(70, 15, 70, 'Sangat Baik', '2023-07-26 05:07:12', '2023-07-26 05:07:12'),
(71, 15, 71, 'Sangat Baik', '2023-07-26 05:07:18', '2023-07-26 05:07:18'),
(72, 15, 72, 'Standart', '2023-07-26 05:07:27', '2023-07-26 05:07:27'),
(73, 15, 73, 'Standart', '2023-07-26 05:07:33', '2023-07-26 05:07:33'),
(74, 15, 74, 'Sangat Baik', '2023-07-26 05:07:40', '2023-07-26 05:07:40'),
(75, 15, 75, 'Baik', '2023-07-26 05:07:47', '2023-07-26 05:07:47'),
(76, 15, 76, 'Sangat Baik', '2023-07-26 05:07:53', '2023-07-26 05:07:53'),
(77, 15, 77, 'Sangat Baik', '2023-07-26 05:08:00', '2023-07-26 05:08:00'),
(78, 15, 78, 'Standart', '2023-07-26 05:08:06', '2023-07-26 05:08:06'),
(79, 15, 79, 'Baik', '2023-07-26 05:08:12', '2023-07-26 05:08:12'),
(80, 15, 80, 'Baik', '2023-07-26 05:08:20', '2023-07-26 05:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `transaction_item_id` bigint UNSIGNED NOT NULL,
  `rating` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `user_id`, `transaction_item_id`, `rating`, `created_at`, `updated_at`) VALUES
(1, 11, 1, 10, '2023-07-26 04:57:49', '2023-07-26 04:57:49'),
(2, 11, 2, 8, '2023-07-26 04:57:58', '2023-07-26 04:57:58'),
(3, 11, 3, 10, '2023-07-26 04:58:06', '2023-07-26 04:58:06'),
(4, 11, 4, 5, '2023-07-26 04:58:29', '2023-07-26 04:58:29'),
(5, 11, 5, 7, '2023-07-26 04:58:39', '2023-07-26 04:58:39'),
(6, 11, 6, 8, '2023-07-26 04:58:45', '2023-07-26 04:58:45'),
(7, 11, 8, 9, '2023-07-26 04:58:55', '2023-07-26 04:58:55'),
(8, 11, 7, 10, '2023-07-26 04:59:01', '2023-07-26 04:59:01'),
(9, 11, 9, 7, '2023-07-26 04:59:13', '2023-07-26 04:59:13'),
(10, 11, 10, 3, '2023-07-26 04:59:20', '2023-07-26 04:59:20'),
(11, 11, 11, 6, '2023-07-26 04:59:33', '2023-07-26 04:59:33'),
(12, 11, 12, 9, '2023-07-26 04:59:40', '2023-07-26 04:59:40'),
(13, 11, 13, 10, '2023-07-26 04:59:47', '2023-07-26 04:59:47'),
(14, 11, 14, 10, '2023-07-26 05:00:00', '2023-07-26 05:00:00'),
(15, 11, 15, 6, '2023-07-26 05:00:05', '2023-07-26 05:00:05'),
(16, 11, 16, 8, '2023-07-26 05:00:17', '2023-07-26 05:00:17'),
(17, 11, 17, 8, '2023-07-26 05:00:25', '2023-07-26 05:00:25'),
(18, 11, 18, 10, '2023-07-26 05:00:32', '2023-07-26 05:00:32'),
(19, 11, 19, 10, '2023-07-26 05:00:38', '2023-07-26 05:00:38'),
(20, 12, 20, 8, '2023-07-26 05:00:59', '2023-07-26 05:00:59'),
(21, 12, 21, 2, '2023-07-26 05:01:06', '2023-07-26 05:01:06'),
(22, 12, 22, 10, '2023-07-26 05:01:16', '2023-07-26 05:01:16'),
(23, 12, 23, 6, '2023-07-26 05:01:24', '2023-07-26 05:01:24'),
(24, 12, 24, 9, '2023-07-26 05:01:31', '2023-07-26 05:01:31'),
(25, 12, 25, 5, '2023-07-26 05:01:38', '2023-07-26 05:01:38'),
(26, 12, 26, 8, '2023-07-26 05:01:44', '2023-07-26 05:01:44'),
(27, 12, 27, 9, '2023-07-26 05:01:50', '2023-07-26 05:01:50'),
(28, 12, 28, 10, '2023-07-26 05:01:57', '2023-07-26 05:01:57'),
(29, 12, 29, 10, '2023-07-26 05:02:07', '2023-07-26 05:02:07'),
(30, 12, 30, 7, '2023-07-26 05:02:13', '2023-07-26 05:02:13'),
(31, 12, 31, 10, '2023-07-26 05:02:21', '2023-07-26 05:02:21'),
(32, 12, 32, 7, '2023-07-26 05:02:30', '2023-07-26 05:02:30'),
(33, 12, 33, 8, '2023-07-26 05:02:36', '2023-07-26 05:02:36'),
(34, 12, 34, 4, '2023-07-26 05:02:43', '2023-07-26 05:02:43'),
(35, 12, 35, 10, '2023-07-26 05:02:51', '2023-07-26 05:02:51'),
(36, 12, 36, 10, '2023-07-26 05:02:57', '2023-07-26 05:02:57'),
(37, 12, 37, 10, '2023-07-26 05:03:04', '2023-07-26 05:03:04'),
(38, 12, 38, 10, '2023-07-26 05:03:11', '2023-07-26 05:03:11'),
(39, 12, 39, 10, '2023-07-26 05:03:17', '2023-07-26 05:03:17'),
(40, 13, 40, 10, '2023-07-26 05:03:38', '2023-07-26 05:03:38'),
(41, 13, 41, 10, '2023-07-26 05:03:44', '2023-07-26 05:03:44'),
(42, 13, 42, 8, '2023-07-26 05:03:50', '2023-07-26 05:03:50'),
(43, 13, 43, 10, '2023-07-26 05:03:56', '2023-07-26 05:03:56'),
(44, 13, 44, 10, '2023-07-26 05:04:03', '2023-07-26 05:04:03'),
(45, 13, 45, 10, '2023-07-26 05:04:08', '2023-07-26 05:04:08'),
(46, 13, 46, 6, '2023-07-26 05:04:14', '2023-07-26 05:04:14'),
(47, 13, 47, 9, '2023-07-26 05:04:19', '2023-07-26 05:04:19'),
(48, 13, 48, 10, '2023-07-26 05:04:25', '2023-07-26 05:04:25'),
(49, 13, 49, 9, '2023-07-26 05:04:37', '2023-07-26 05:04:37'),
(50, 13, 50, 10, '2023-07-26 05:04:43', '2023-07-26 05:04:43'),
(51, 13, 51, 8, '2023-07-26 05:04:51', '2023-07-26 05:04:51'),
(52, 13, 52, 10, '2023-07-26 05:05:00', '2023-07-26 05:05:00'),
(53, 13, 53, 10, '2023-07-26 05:05:05', '2023-07-26 05:05:05'),
(54, 13, 54, 8, '2023-07-26 05:05:11', '2023-07-26 05:05:11'),
(55, 13, 55, 5, '2023-07-26 05:05:18', '2023-07-26 05:05:18'),
(56, 15, 56, 8, '2023-07-26 05:05:40', '2023-07-26 05:05:40'),
(57, 15, 57, 10, '2023-07-26 05:05:45', '2023-07-26 05:05:45'),
(58, 15, 58, 10, '2023-07-26 05:05:52', '2023-07-26 05:05:52'),
(59, 15, 59, 10, '2023-07-26 05:05:58', '2023-07-26 05:05:58'),
(60, 15, 60, 10, '2023-07-26 05:06:03', '2023-07-26 05:06:03'),
(61, 15, 61, 10, '2023-07-26 05:06:10', '2023-07-26 05:06:10'),
(62, 15, 62, 8, '2023-07-26 05:06:16', '2023-07-26 05:06:16'),
(63, 15, 63, 6, '2023-07-26 05:06:22', '2023-07-26 05:06:22'),
(64, 15, 64, 7, '2023-07-26 05:06:30', '2023-07-26 05:06:30'),
(65, 15, 65, 3, '2023-07-26 05:06:37', '2023-07-26 05:06:37'),
(66, 15, 66, 7, '2023-07-26 05:06:42', '2023-07-26 05:06:42'),
(67, 15, 67, 10, '2023-07-26 05:06:48', '2023-07-26 05:06:48'),
(68, 15, 68, 7, '2023-07-26 05:06:53', '2023-07-26 05:06:53'),
(69, 15, 69, 10, '2023-07-26 05:07:05', '2023-07-26 05:07:05'),
(70, 15, 70, 10, '2023-07-26 05:07:12', '2023-07-26 05:07:12'),
(71, 15, 71, 10, '2023-07-26 05:07:18', '2023-07-26 05:07:18'),
(72, 15, 72, 6, '2023-07-26 05:07:27', '2023-07-26 05:07:27'),
(73, 15, 73, 7, '2023-07-26 05:07:33', '2023-07-26 05:07:33'),
(74, 15, 74, 10, '2023-07-26 05:07:40', '2023-07-26 05:07:40'),
(75, 15, 75, 6, '2023-07-26 05:07:47', '2023-07-26 05:07:47'),
(76, 15, 76, 10, '2023-07-26 05:07:53', '2023-07-26 05:07:53'),
(77, 15, 77, 10, '2023-07-26 05:08:00', '2023-07-26 05:08:00'),
(78, 15, 78, 6, '2023-07-26 05:08:06', '2023-07-26 05:08:06'),
(79, 15, 79, 10, '2023-07-26 05:08:12', '2023-07-26 05:08:12'),
(80, 15, 80, 9, '2023-07-26 05:08:20', '2023-07-26 05:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_date` date NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `grand_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `payment_method`, `payment_date`, `payment_status`, `description`, `grand_total`, `image`, `created_at`, `updated_at`) VALUES
(1, 11, 'bank_transfer', '2023-07-26', 'completed', 'Segera diproses ya..', '75000', 'transaction-image/WOwmdYsZY5daDWkSp55YvtLB1KMU7Uc79Hgx8ErJ.webp', '2023-07-26 02:47:57', '2023-07-26 04:55:05'),
(2, 11, 'e_wallet', '2023-07-26', 'completed', 'Mohon cepat ya kak..', '82500', 'transaction-image/6GifSSLmYUXlurDxtJNAPp6dFwbDgI01tOS5Pyft.jpg', '2023-07-26 02:49:10', '2023-07-26 04:55:09'),
(3, 11, 'e_wallet', '2023-07-26', 'completed', 'Sudah lunas kak.. cepat ya', '120000', 'transaction-image/qlx9NoRn2WOB73uPKkhA27UyJhk2hLykU2ERzIA6.jpg', '2023-07-26 02:50:28', '2023-07-26 04:55:13'),
(4, 11, 'e_wallet', '2023-07-26', 'completed', 'Ditunggu pesenannya..', '54500', 'transaction-image/GW6HQHZgYi7jPybJTOIFm4ZOmrZwT2tL8eqqaD9O.jpg', '2023-07-26 02:51:16', '2023-07-26 04:55:16'),
(5, 11, 'bank_transfer', '2023-07-26', 'completed', 'Mohon cepat kak..', '95000', 'transaction-image/EaAmJCQ7m2qdBeNoxYDeBF9zmgmmjQUuT61SHa3n.jpg', '2023-07-26 02:52:35', '2023-07-26 04:55:21'),
(6, 12, 'bank_transfer', '2023-07-26', 'completed', 'Cepat kak!!', '140000', 'transaction-image/JGWJIFIarnMiNBxgZPQJBjJ7sLQIzUquajPHOxsO.webp', '2023-07-26 02:53:42', '2023-07-26 04:55:25'),
(7, 12, 'e_wallet', '2023-07-26', 'completed', 'ditunggu kak..', '153500', 'transaction-image/hA2XxuAVPQaELdUTC83XloCxdPmug84uBUZHmpa8.jpg', '2023-07-26 02:55:53', '2023-07-26 04:55:28'),
(8, 12, 'bank_transfer', '2023-07-26', 'completed', 'Cepat ya kak', '37500', 'transaction-image/CvDcvaRheIzVLKC8eCdMxpzTRjl8bRddGLTLBXzm.jpg', '2023-07-26 02:56:19', '2023-07-26 04:55:32'),
(9, 13, 'bank_transfer', '2023-07-26', 'completed', 'Cepat', '32500', 'transaction-image/jU0tkyz5q0xiWi2asAYAYwER3nMybZh35wVI55NS.jpg', '2023-07-26 02:57:00', '2023-07-26 04:55:36'),
(10, 13, 'e_wallet', '2023-07-26', 'completed', 'Cepat kak', '27500', 'transaction-image/E0g9qZpR4YrotuZ0WKBzHDDSXDXme5vVT8Yn0xhF.jpg', '2023-07-26 02:57:35', '2023-07-26 04:55:47'),
(11, 13, 'bank_transfer', '2023-07-26', 'completed', 'BRI ya kak', '106500', 'transaction-image/fmu5Ej3S8yjy6i5mz3s77J6X5O129ZdrpfgLSSFj.jpg', '2023-07-26 02:58:32', '2023-07-26 04:55:50'),
(12, 13, 'e_wallet', '2023-07-26', 'completed', 'buruan kakk!!', '57500', 'transaction-image/CUj1ZWWohTGLIazYszpMF822NQRCXJSmnEXV73F7.jpg', '2023-07-26 02:59:08', '2023-07-26 04:55:54'),
(13, 15, 'e_wallet', '2023-07-26', 'completed', 'kirim ya kak', '63000', 'transaction-image/kmIG2a20RWgVSCzldYyXqKAOfszHWbsxJPqhRKy7.jpg', '2023-07-26 03:01:01', '2023-07-26 04:55:58'),
(14, 15, 'bank_transfer', '2023-07-26', 'completed', 'ke medan kak', '100500', 'transaction-image/48CzYPxKZcIdrd2QEoCT8hHPQ08mYpeM5lRkMSSC.jpg', '2023-07-26 03:02:08', '2023-07-26 04:56:01'),
(15, 15, 'e_wallet', '2023-07-26', 'completed', 'ke Medan!!', '127500', 'transaction-image/Vd9Rbb4ql5HfolWI5MTD96tYqcltRJ4xnjIPlXn3.jpg', '2023-07-26 03:03:16', '2023-07-26 04:56:04'),
(16, 15, 'bank_transfer', '2023-07-26', 'completed', 'kirim kak', '121500', 'transaction-image/vcyvopaaOjKz7UaG96OENJy3hUPke2MaLGibXE4V.jpg', '2023-07-26 03:04:10', '2023-07-26 04:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_items`
--

CREATE TABLE `transaction_items` (
  `id` bigint UNSIGNED NOT NULL,
  `transaction_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_items`
--

INSERT INTO `transaction_items` (`id`, `transaction_id`, `product_id`, `quantity`, `sub_total`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 5, '12500', '2023-07-26 02:47:57', '2023-07-26 02:47:57'),
(2, 1, 9, 5, '12500', '2023-07-26 02:47:57', '2023-07-26 02:47:57'),
(3, 1, 10, 20, '50000', '2023-07-26 02:47:57', '2023-07-26 02:47:57'),
(4, 2, 24, 10, '25000', '2023-07-26 02:49:10', '2023-07-26 02:49:10'),
(5, 2, 11, 3, '12000', '2023-07-26 02:49:10', '2023-07-26 02:49:10'),
(6, 2, 13, 3, '10500', '2023-07-26 02:49:10', '2023-07-26 02:49:10'),
(7, 2, 31, 6, '15000', '2023-07-26 02:49:10', '2023-07-26 02:49:10'),
(8, 2, 33, 8, '20000', '2023-07-26 02:49:10', '2023-07-26 02:49:10'),
(9, 3, 14, 10, '25000', '2023-07-26 02:50:28', '2023-07-26 02:50:28'),
(10, 3, 6, 17, '42500', '2023-07-26 02:50:28', '2023-07-26 02:50:28'),
(11, 3, 23, 6, '15000', '2023-07-26 02:50:28', '2023-07-26 02:50:28'),
(12, 3, 28, 10, '25000', '2023-07-26 02:50:28', '2023-07-26 02:50:28'),
(13, 3, 18, 5, '12500', '2023-07-26 02:50:28', '2023-07-26 02:50:28'),
(14, 4, 8, 14, '42000', '2023-07-26 02:51:16', '2023-07-26 02:51:16'),
(15, 4, 15, 5, '12500', '2023-07-26 02:51:16', '2023-07-26 02:51:16'),
(16, 5, 25, 22, '55000', '2023-07-26 02:52:35', '2023-07-26 02:52:35'),
(17, 5, 10, 5, '12500', '2023-07-26 02:52:35', '2023-07-26 02:52:35'),
(18, 5, 32, 8, '20000', '2023-07-26 02:52:35', '2023-07-26 02:52:35'),
(19, 5, 16, 3, '7500', '2023-07-26 02:52:35', '2023-07-26 02:52:35'),
(20, 6, 5, 5, '12500', '2023-07-26 02:53:42', '2023-07-26 02:53:42'),
(21, 6, 6, 5, '12500', '2023-07-26 02:53:42', '2023-07-26 02:53:42'),
(22, 6, 7, 4, '10000', '2023-07-26 02:53:42', '2023-07-26 02:53:42'),
(23, 6, 9, 4, '10000', '2023-07-26 02:53:42', '2023-07-26 02:53:42'),
(24, 6, 10, 5, '12500', '2023-07-26 02:53:42', '2023-07-26 02:53:42'),
(25, 6, 11, 5, '20000', '2023-07-26 02:53:42', '2023-07-26 02:53:42'),
(26, 6, 12, 5, '10000', '2023-07-26 02:53:42', '2023-07-26 02:53:42'),
(27, 6, 13, 15, '52500', '2023-07-26 02:53:42', '2023-07-26 02:53:42'),
(28, 7, 14, 4, '10000', '2023-07-26 02:55:53', '2023-07-26 02:55:53'),
(29, 7, 15, 3, '7500', '2023-07-26 02:55:53', '2023-07-26 02:55:53'),
(30, 7, 16, 8, '20000', '2023-07-26 02:55:53', '2023-07-26 02:55:53'),
(31, 7, 8, 9, '27000', '2023-07-26 02:55:53', '2023-07-26 02:55:53'),
(32, 7, 18, 9, '22500', '2023-07-26 02:55:53', '2023-07-26 02:55:53'),
(33, 7, 19, 2, '5000', '2023-07-26 02:55:53', '2023-07-26 02:55:53'),
(34, 7, 20, 3, '7500', '2023-07-26 02:55:53', '2023-07-26 02:55:53'),
(35, 7, 23, 4, '10000', '2023-07-26 02:55:53', '2023-07-26 02:55:53'),
(36, 7, 24, 5, '12500', '2023-07-26 02:55:53', '2023-07-26 02:55:53'),
(37, 7, 30, 9, '31500', '2023-07-26 02:55:53', '2023-07-26 02:55:53'),
(38, 8, 33, 8, '20000', '2023-07-26 02:56:19', '2023-07-26 02:56:19'),
(39, 8, 32, 7, '17500', '2023-07-26 02:56:19', '2023-07-26 02:56:19'),
(40, 9, 5, 4, '10000', '2023-07-26 02:57:00', '2023-07-26 02:57:00'),
(41, 9, 6, 4, '10000', '2023-07-26 02:57:00', '2023-07-26 02:57:00'),
(42, 9, 7, 4, '10000', '2023-07-26 02:57:00', '2023-07-26 02:57:00'),
(43, 9, 9, 1, '2500', '2023-07-26 02:57:00', '2023-07-26 02:57:00'),
(44, 10, 23, 4, '10000', '2023-07-26 02:57:35', '2023-07-26 02:57:35'),
(45, 10, 15, 3, '7500', '2023-07-26 02:57:35', '2023-07-26 02:57:35'),
(46, 10, 17, 4, '10000', '2023-07-26 02:57:35', '2023-07-26 02:57:35'),
(47, 11, 13, 9, '31500', '2023-07-26 02:58:32', '2023-07-26 02:58:32'),
(48, 11, 21, 8, '20000', '2023-07-26 02:58:32', '2023-07-26 02:58:32'),
(49, 11, 19, 8, '20000', '2023-07-26 02:58:32', '2023-07-26 02:58:32'),
(50, 11, 29, 10, '25000', '2023-07-26 02:58:32', '2023-07-26 02:58:32'),
(51, 11, 32, 4, '10000', '2023-07-26 02:58:32', '2023-07-26 02:58:32'),
(52, 12, 16, 3, '7500', '2023-07-26 02:59:08', '2023-07-26 02:59:08'),
(53, 12, 9, 7, '17500', '2023-07-26 02:59:08', '2023-07-26 02:59:08'),
(54, 12, 33, 5, '12500', '2023-07-26 02:59:08', '2023-07-26 02:59:08'),
(55, 12, 25, 8, '20000', '2023-07-26 02:59:08', '2023-07-26 02:59:08'),
(56, 13, 5, 1, '2500', '2023-07-26 03:01:01', '2023-07-26 03:01:01'),
(57, 13, 6, 4, '10000', '2023-07-26 03:01:01', '2023-07-26 03:01:01'),
(58, 13, 7, 7, '17500', '2023-07-26 03:01:01', '2023-07-26 03:01:01'),
(59, 13, 8, 6, '18000', '2023-07-26 03:01:01', '2023-07-26 03:01:01'),
(60, 13, 9, 6, '15000', '2023-07-26 03:01:01', '2023-07-26 03:01:01'),
(61, 14, 13, 4, '14000', '2023-07-26 03:02:08', '2023-07-26 03:02:08'),
(62, 14, 12, 4, '8000', '2023-07-26 03:02:08', '2023-07-26 03:02:08'),
(63, 14, 11, 4, '16000', '2023-07-26 03:02:08', '2023-07-26 03:02:08'),
(64, 14, 14, 3, '7500', '2023-07-26 03:02:08', '2023-07-26 03:02:08'),
(65, 14, 15, 3, '7500', '2023-07-26 03:02:08', '2023-07-26 03:02:08'),
(66, 14, 19, 3, '7500', '2023-07-26 03:02:08', '2023-07-26 03:02:08'),
(67, 14, 23, 4, '10000', '2023-07-26 03:02:08', '2023-07-26 03:02:08'),
(68, 14, 33, 12, '30000', '2023-07-26 03:02:08', '2023-07-26 03:02:08'),
(69, 15, 32, 4, '10000', '2023-07-26 03:03:16', '2023-07-26 03:03:16'),
(70, 15, 9, 3, '7500', '2023-07-26 03:03:16', '2023-07-26 03:03:16'),
(71, 15, 28, 12, '30000', '2023-07-26 03:03:16', '2023-07-26 03:03:16'),
(72, 15, 31, 10, '25000', '2023-07-26 03:03:17', '2023-07-26 03:03:17'),
(73, 15, 17, 13, '32500', '2023-07-26 03:03:17', '2023-07-26 03:03:17'),
(74, 15, 15, 9, '22500', '2023-07-26 03:03:17', '2023-07-26 03:03:17'),
(75, 16, 22, 11, '27500', '2023-07-26 03:04:11', '2023-07-26 03:04:11'),
(76, 16, 13, 7, '24500', '2023-07-26 03:04:11', '2023-07-26 03:04:11'),
(77, 16, 21, 8, '20000', '2023-07-26 03:04:11', '2023-07-26 03:04:11'),
(78, 16, 32, 8, '20000', '2023-07-26 03:04:11', '2023-07-26 03:04:11'),
(79, 16, 11, 3, '12000', '2023-07-26 03:04:11', '2023-07-26 03:04:11'),
(80, 16, 25, 7, '17500', '2023-07-26 03:04:11', '2023-07-26 03:04:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email_verified_at`, `password`, `role`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, 'parfum', 'Parfum Quality', NULL, '$2y$10$.eV4kT8lPGmEf.dAC5sBLukWJSJRTCwfOMovo8euOzi4reJfErrIO', 'toko', '81234567890', NULL, '2023-07-21 05:48:16', '2023-07-21 05:48:16'),
(11, 'achmad', 'Achmad', NULL, '$2y$10$hb9X0tTmeKmOXJuTo9UlEOOVcL6ZwWoNyIWJko6LzwQdIgJoZUgsK', 'user', '81234567890', NULL, '2023-07-26 02:45:13', '2023-07-26 02:45:13'),
(12, 'syahrian', 'Syahrian', NULL, '$2y$10$4in.J1bGyvXwgt3ipit2Ve2aBgqfiu2K4zKDW2iW2TJqsoMgPdzPq', 'user', '81234567890', NULL, '2023-07-26 02:45:37', '2023-07-26 02:45:37'),
(13, 'wisnu', 'Wisnu', NULL, '$2y$10$zYGGDTcLILPiMUkcbcD.reJHdK26cVtKvXsW7VpC.LTZk8hVB.zgW', 'user', '81234567890', NULL, '2023-07-26 02:45:53', '2023-07-26 02:45:53'),
(15, 'cristiano', 'Cristiano Ronaldo', NULL, '$2y$10$xSJiijSE1ZAjQA.ng0eatOdXYHFSybJF4tcd./t45myffZ4gwnWJS', 'user', '81234567890', NULL, '2023-07-26 03:00:05', '2023-07-26 03:00:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outlets`
--
ALTER TABLE `outlets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `outlets_phone_unique` (`phone`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

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
  ADD UNIQUE KEY `products_name_unique` (`name`);

--
-- Indexes for table `qualities`
--
ALTER TABLE `qualities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_items`
--
ALTER TABLE `transaction_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `outlets`
--
ALTER TABLE `outlets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `qualities`
--
ALTER TABLE `qualities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transaction_items`
--
ALTER TABLE `transaction_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

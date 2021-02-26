-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2021 at 05:39 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gatisheel`
--

-- --------------------------------------------------------

--
-- Table structure for table `create_issues`
--

CREATE TABLE `create_issues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `issue_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ownership` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) NOT NULL DEFAULT 0,
  `updated_by` bigint(20) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `create_issues`
--

INSERT INTO `create_issues` (`id`, `issue_date`, `issue_description`, `current_status`, `ownership`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2021-02-25', 'Issue description', 'NA', 'Ajit', 1, 0, 0, NULL, '2021-02-25 01:02:50', '2021-02-25 01:02:50');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsible_service_person` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refer_new_customer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warranty_renewal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) NOT NULL DEFAULT 0,
  `updated_by` bigint(20) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `installations`
--

CREATE TABLE `installations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `installtion_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `installtion_machine_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `installtion_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `installtion_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) NOT NULL DEFAULT 0,
  `updated_by` bigint(20) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(53, '2014_10_12_000000_create_users_table', 1),
(54, '2014_10_12_100000_create_password_resets_table', 1),
(55, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(56, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(57, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(58, '2016_06_01_000004_create_oauth_clients_table', 1),
(59, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(60, '2019_08_19_000000_create_failed_jobs_table', 1),
(61, '2021_02_19_072901_create_permission_tables', 1),
(62, '2021_02_19_073046_create_products_table', 1),
(63, '2021_02_22_091232_create_installations_table', 1),
(64, '2021_02_22_131958_create_create_issues_table', 1),
(65, '2021_02_23_054244_create_customers_table', 1);

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
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0aa8b573674567959c84dcbdfa8fe9c9e9ac615eebcf7f6e6adc01edc79078f8bff611fc2ab698ee', 1, 1, 'authToken', '[]', 0, '2021-02-25 05:51:14', '2021-02-25 05:51:14', '2022-02-25 11:21:14'),
('0b7cbae533f811385f2c3549b4a204cea2c888e8b8495751e8937b6473385982a24a3472ce4ede3d', 1, 1, 'authToken', '[]', 0, '2021-02-25 10:43:53', '2021-02-25 10:43:53', '2022-02-25 16:13:53'),
('0bb5937db79fa25e330497b004f5ca6ab143ccda8712ce7ce0df82fa5369387e5e1cf5aada342e70', 4, 1, 'authToken', '[]', 0, '2021-02-25 02:23:07', '2021-02-25 02:23:07', '2022-02-25 07:53:07'),
('0d51fbc3329299565586077299c804ab7b4d524d4212044c27aaf8e93d9270cc2a5a3ceb8afa4ee0', 1, 1, 'authToken', '[]', 0, '2021-02-25 11:08:40', '2021-02-25 11:08:40', '2022-02-25 16:38:40'),
('107ed9a35b8572f83d341e3d1fdf909d4668486e6fdeef76f0563a5e6770dc71938067a2211d2c05', 1, 1, 'authToken', '[]', 0, '2021-02-25 10:53:29', '2021-02-25 10:53:29', '2022-02-25 16:23:29'),
('2198b6f3b07d8b8de1f80dd813e3a29d00947ac203cc8f72b48961e37f46604dfa5d752316d8a069', 1, 1, 'authToken', '[]', 0, '2021-02-25 10:43:53', '2021-02-25 10:43:53', '2022-02-25 16:13:53'),
('27605487ae4daa6f607cad5e0965b3bb95fef9171a37a5ee43cb31a9c0ad6df9671549cf10acfa4b', 1, 1, 'authToken', '[]', 0, '2021-02-25 07:17:56', '2021-02-25 07:17:56', '2022-02-25 12:47:56'),
('281c600b567e087fa9ee9975ee4aba3634fd163e55a3aecba52d8c4804057fc03d613658defa795b', 4, 1, 'authToken', '[]', 0, '2021-02-25 02:25:54', '2021-02-25 02:25:54', '2022-02-25 07:55:54'),
('2f27e4d5219cacf9f789fbf794f6cc6e002807ffd602ca2bb3fb6bda3828447819bed1336feab079', 1, 1, 'authToken', '[]', 0, '2021-02-25 05:51:14', '2021-02-25 05:51:14', '2022-02-25 11:21:14'),
('304208324722e3f8099402d64356214c40bf5cc8b98ab34b81c8ad0d9bdf5eb5f5648766b0ca696c', 1, 1, 'authToken', '[]', 0, '2021-02-25 10:57:19', '2021-02-25 10:57:19', '2022-02-25 16:27:19'),
('32c74fba0ad84544679ddff92023eeea52a011e8e721f3f3e3f33fde0ea796997be3436fbb80e636', 1, 1, 'authToken', '[]', 0, '2021-02-25 06:38:44', '2021-02-25 06:38:44', '2022-02-25 12:08:44'),
('33c5225981ff1ca08c138093efab40d0011cfbd7ab681b46130ccacf40eef1f5a43a31909973a49b', 1, 1, 'authToken', '[]', 0, '2021-02-25 10:42:10', '2021-02-25 10:42:10', '2022-02-25 16:12:10'),
('37ba3323a362d34937465968f9a5021ce6b2dd73341113e98209a18c36dc68d31be47150f9819fe5', 3, 1, 'authToken', '[]', 0, '2021-02-25 11:01:43', '2021-02-25 11:01:43', '2022-02-25 16:31:43'),
('4b72f6a345eabd5369b55c647f03e18adb562cada72dad2c14576b600e4f953b6a1db9025bfa3460', 1, 1, 'authToken', '[]', 0, '2021-02-25 10:44:20', '2021-02-25 10:44:20', '2022-02-25 16:14:20'),
('4fa7cf13c9d07f07a6a68e54be3a3ce37d039147028ee183d8ac5201d76d4452be334f1bd2c49ec0', 4, 1, 'authToken', '[]', 0, '2021-02-25 02:15:04', '2021-02-25 02:15:04', '2022-02-25 07:45:04'),
('63402f8490127e6673912774a9a9b8c68063d61cbff521235e239de89d8f44332027d0afc91673ef', 1, 1, 'authToken', '[]', 0, '2021-02-25 06:30:29', '2021-02-25 06:30:29', '2022-02-25 12:00:29'),
('678cf0b0ba7457c0252d6ac5092b6c6756837a065a157d864ecff218c6808b895b7a10ecfb286a20', 1, 1, 'authToken', '[]', 0, '2021-02-25 10:58:30', '2021-02-25 10:58:30', '2022-02-25 16:28:30'),
('750241bf65348563a5d9baa2959b7ff94fca54fce8260f3db8c076ac3c85742e8356ad6bfda23dc0', 1, 1, 'authToken', '[]', 0, '2021-02-25 10:45:37', '2021-02-25 10:45:37', '2022-02-25 16:15:37'),
('78beac1e0c2fbd7ffb505be0b09f9173496df80636b047f9daf020cd9b828aa0daff3cc14a62c960', 1, 1, 'authToken', '[]', 0, '2021-02-25 10:59:17', '2021-02-25 10:59:17', '2022-02-25 16:29:17'),
('81f75a9364b5e1f2b31b6f09a5898655c1289853889fb7764d0369cf3f369655a15442332d603c06', 3, 1, 'authToken', '[]', 0, '2021-02-25 11:08:09', '2021-02-25 11:08:09', '2022-02-25 16:38:09'),
('82ae9f4240adfd3737a2f20dac679f1f1cc61c09d53870a934b66189826069acc9c768fa69b036f6', 1, 1, 'authToken', '[]', 0, '2021-02-25 10:52:33', '2021-02-25 10:52:33', '2022-02-25 16:22:33'),
('85faf4ea068f66638506fd1f792c237eff60c0f51090eff2ac6779937c8c1d720a79f8513a940cc0', 3, 1, 'authToken', '[]', 0, '2021-02-25 11:07:12', '2021-02-25 11:07:12', '2022-02-25 16:37:12'),
('8643ab983d20031711651822684724584f504d72a98840c98159fa1f3ea9c8bc23e0c837003ddaef', 1, 1, 'authToken', '[]', 0, '2021-02-25 10:53:01', '2021-02-25 10:53:01', '2022-02-25 16:23:01'),
('8eeaf24b54a39bc93dd04b5ba302d42a91c90960e90c0b7bd303eb82abb750031ef4bfa25456dff7', 1, 1, 'authToken', '[]', 0, '2021-02-25 10:46:41', '2021-02-25 10:46:41', '2022-02-25 16:16:41'),
('9341b49f7bb838272575e4d8bca2a6bc162650e1048c2cf247f56e826fe69b67690fa0ef645f71a7', 1, 1, 'authToken', '[]', 0, '2021-02-25 06:38:44', '2021-02-25 06:38:44', '2022-02-25 12:08:44'),
('a791dc69528ea18e71290a7770e8d67d85e159f2b1f3df9539d80768a44d1d7e6f2bd31dd311da48', 1, 1, 'authToken', '[]', 0, '2021-02-25 10:56:41', '2021-02-25 10:56:41', '2022-02-25 16:26:41'),
('a8242702d2b013201b593cb08fc0c65ef3fe7e93fa7e199442f667b3d34049fba5460d7ceb0ef67d', 1, 1, 'authToken', '[]', 0, '2021-02-25 10:58:30', '2021-02-25 10:58:30', '2022-02-25 16:28:30'),
('a8b4b4b26d0286fccd95e8a571ff47ee9e057642d6b433f3fea9439791cdbcb49b5fcbabf8b65065', 1, 1, 'authToken', '[]', 0, '2021-02-25 11:08:41', '2021-02-25 11:08:41', '2022-02-25 16:38:41'),
('a9b258671d3b8d9ef3802693c036edfe110122655eb5431685b83842d479e2ece446720a1fc6641d', 1, 1, 'authToken', '[]', 0, '2021-02-25 10:44:20', '2021-02-25 10:44:20', '2022-02-25 16:14:20'),
('afe650414e1fe6be62ad08048773b4c1775729d5fe145dbd781047594f4ad1cf14089da1def288c7', 3, 1, 'authToken', '[]', 0, '2021-02-25 11:08:09', '2021-02-25 11:08:09', '2022-02-25 16:38:09'),
('b060b4160967ee1f166ebdf2197f114a50f364caa7ba8d78fe055a76af63a9aa18d8b24cf395972a', 1, 1, 'authToken', '[]', 0, '2021-02-25 10:57:19', '2021-02-25 10:57:19', '2022-02-25 16:27:19'),
('b252d95b2d83dc5224e169bf4e0740a64cb56e9a8c57b541d5173aadeb31d53d753209456ce19e79', 4, 1, 'authToken', '[]', 0, '2021-02-25 02:23:07', '2021-02-25 02:23:07', '2022-02-25 07:53:07'),
('b76fa0ceceed4c0f59c94e9c8044d9db1c1a7447de0ba8dc1e1107a0cf77db968ab0a15632a4075b', 1, 1, 'authToken', '[]', 0, '2021-02-25 10:52:33', '2021-02-25 10:52:33', '2022-02-25 16:22:33'),
('bf34e4bbcc52456b7b8feae3135ed675b464267d0f702cd9be3020a9be5aea262b4612e2834c7628', 4, 1, 'authToken', '[]', 0, '2021-02-25 02:15:04', '2021-02-25 02:15:04', '2022-02-25 07:45:04'),
('c4fc5b10893f06a4680141639e37099581ea6a5e818ae22a8b57b2df3b9a4c5663cdd9f5deaf79af', 1, 1, 'authToken', '[]', 0, '2021-02-25 06:30:29', '2021-02-25 06:30:29', '2022-02-25 12:00:29'),
('c87395c8dd8c9de8a661c076bb6af57576b161bd32076a65ce6ffde48f9f23aed4b9f321912e9a3d', 1, 1, 'authToken', '[]', 0, '2021-02-25 10:56:41', '2021-02-25 10:56:41', '2022-02-25 16:26:41'),
('c9061c0731feda3906b8c5aa365ad94038eab35bfdaad97db1935385e67eceb5272de6bd334d7e0c', 1, 1, 'authToken', '[]', 0, '2021-02-25 10:42:10', '2021-02-25 10:42:10', '2022-02-25 16:12:10'),
('cee776d32e054161b845e92c05b00dc23b393c49961d06db3a8ca41ed2b36c1017c2eccada0b7e51', 1, 1, 'authToken', '[]', 0, '2021-02-25 10:45:37', '2021-02-25 10:45:37', '2022-02-25 16:15:37'),
('d5efd75fda5b2c94c7ca32e0b6978aad85b4a2d28fc2fcca880aa36663c1453ae86a0fbcf5157871', 3, 1, 'authToken', '[]', 0, '2021-02-25 11:07:50', '2021-02-25 11:07:50', '2022-02-25 16:37:50'),
('dc21d28dc08ced6f434dab9486e316f0332c3867e39f8f76e8c8937a2226750cf2af10d989aa2fcd', 1, 1, 'authToken', '[]', 0, '2021-02-25 02:12:30', '2021-02-25 02:12:30', '2022-02-25 07:42:30'),
('dca56bff2ba444e2a9745d152f93ee7eb716e2078994fc47178e1e198f571a5d24ff1fcf712948ce', 4, 1, 'authToken', '[]', 0, '2021-02-25 02:25:54', '2021-02-25 02:25:54', '2022-02-25 07:55:54'),
('e33cdab191f1f005ec049e2642fec01513f8e8dc1ae077c323a9f84654e0ded79421665016436964', 3, 1, 'authToken', '[]', 0, '2021-02-25 11:07:50', '2021-02-25 11:07:50', '2022-02-25 16:37:50'),
('e5dab43788b185d493f1438acd7aa2373ae64988dc586705b93d6217160eb0bf9a9e2e5feeb19426', 1, 1, 'authToken', '[]', 0, '2021-02-25 10:53:29', '2021-02-25 10:53:29', '2022-02-25 16:23:29'),
('e602de5f9386efb88ce11ca0deba74de14876327eb92409ce4b00229e30d503b3f5b2118f09dff54', 3, 1, 'authToken', '[]', 0, '2021-02-25 11:01:43', '2021-02-25 11:01:43', '2022-02-25 16:31:43'),
('e79400decf0f1f1d0cb42ce3233d357f0484ebf2e1512cfa62ad1efd75e516db5bc4f455e59f0ef9', 1, 1, 'authToken', '[]', 0, '2021-02-25 07:17:56', '2021-02-25 07:17:56', '2022-02-25 12:47:56'),
('ec54471bca8735693bf9191d1bf16f77f26b686a5f399fc222ae6222cfee1a647af4e015f519c7ba', 1, 1, 'authToken', '[]', 0, '2021-02-25 10:46:41', '2021-02-25 10:46:41', '2022-02-25 16:16:41'),
('f35ed193026d910c2c1cc87a5fe97628dc3463e8bd924a8ada31c962943454509b99860e605b5806', 1, 1, 'authToken', '[]', 0, '2021-02-25 02:12:30', '2021-02-25 02:12:30', '2022-02-25 07:42:30'),
('fd7e841a32fa1f6ab4fcfddb16edd65ad5b0b5ac5891cb4a53e5e539b2293ba224b521d9121ad0cd', 1, 1, 'authToken', '[]', 0, '2021-02-25 10:59:17', '2021-02-25 10:59:17', '2022-02-25 16:29:17'),
('ff4e07abbfe561ad7c3aa50731d285d160e1d6cabcfe6bbe9b70839756d2565f86575148ce00a8fa', 3, 1, 'authToken', '[]', 0, '2021-02-25 11:07:12', '2021-02-25 11:07:12', '2022-02-25 16:37:12'),
('ffaf9eff6da6631b6705399062268473cf861abc97885157d03c9b7dc0ac3cdbb6b6738a87ebd4fe', 1, 1, 'authToken', '[]', 0, '2021-02-25 10:53:01', '2021-02-25 10:53:01', '2022-02-25 16:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Gatisheel Personal Access Client', 'P6lxuIEMCBUuABBf8A713KQxbSCI2FtjRo88OSNB', NULL, 'http://localhost', 1, 0, 0, '2021-02-25 01:02:10', '2021-02-25 01:02:10'),
(2, NULL, 'Gatisheel Password Grant Client', 'OtsrEGwwvRv6O6yiOMxcbZBe2eI7VbaUtyARiH2E', 'users', 'http://localhost', 0, 1, 0, '2021-02-25 01:02:10', '2021-02-25 01:02:10');

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

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-02-25 01:02:10', '2021-02-25 01:02:10');

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
(1, 'role-list', 'web', '2021-02-25 00:46:04', '2021-02-25 00:46:04'),
(2, 'role-create', 'web', '2021-02-25 00:46:04', '2021-02-25 00:46:04'),
(3, 'role-edit', 'web', '2021-02-25 00:46:04', '2021-02-25 00:46:04'),
(4, 'role-delete', 'web', '2021-02-25 00:46:04', '2021-02-25 00:46:04'),
(5, 'installation-list', 'web', '2021-02-25 00:46:04', '2021-02-25 00:46:04'),
(6, 'installation-create', 'web', '2021-02-25 00:46:04', '2021-02-25 00:46:04'),
(7, 'installation-edit', 'web', '2021-02-25 00:46:04', '2021-02-25 00:46:04'),
(8, 'installation-delete', 'web', '2021-02-25 00:46:04', '2021-02-25 00:46:04');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Super Admin', 'web', '2021-02-25 00:46:13', '2021-02-25 00:46:13'),
(2, 'Staff', 'web', '2021-02-25 00:47:39', '2021-02-25 00:52:23'),
(3, 'Customer', 'web', NULL, NULL),
(4, 'User', 'web', '2021-02-25 07:14:59', '2021-02-25 07:14:59');

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
(1, 1),
(1, 4),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(5, 4),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@gmail.com', '9546205063', NULL, '$2y$10$8V38AyV7klVGiX2q55xsCOK1/CM3Z3MvHkOJWT9DR.LDB9lADiQxy', NULL, NULL, '2021-02-25 00:46:13', '2021-02-25 00:46:13'),
(3, 'Staff', 'staff@gmail.com', NULL, NULL, '$2y$10$XVpJTho2dbzntABg8TmbHuxHDb762Jmh3PvRDzf1wRH94C6CMDLIu', NULL, NULL, '2021-02-25 00:59:45', '2021-02-25 03:42:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `create_issues`
--
ALTER TABLE `create_issues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `installations`
--
ALTER TABLE `installations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `installations_user_id_foreign` (`user_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `create_issues`
--
ALTER TABLE `create_issues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `installations`
--
ALTER TABLE `installations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `installations`
--
ALTER TABLE `installations`
  ADD CONSTRAINT `installations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

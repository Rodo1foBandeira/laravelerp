-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29-Mar-2017 às 19:04
-- Versão do servidor: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp`
--
CREATE DATABASE IF NOT EXISTS `erp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `erp`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `attributes_products`
--

CREATE TABLE `attributes_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `prodvar_id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories_entities`
--

CREATE TABLE `categories_entities` (
  `id` int(10) UNSIGNED NOT NULL,
  `entity_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categories_entities`
--

INSERT INTO `categories_entities` (`id`, `entity_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-03-29 19:25:08', '2017-03-29 19:25:08'),
(2, 1, 2, '2017-03-29 19:25:08', '2017-03-29 19:25:08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `city`, `code`, `created_at`, `updated_at`) VALUES
(1, 1, 'Araraquara', NULL, '2017-03-29 19:18:16', '2017-03-29 19:18:16'),
(2, 2, 'Uberlandia', NULL, '2017-03-29 19:18:43', '2017-03-29 19:18:43'),
(3, 1, 'Ibitinga', NULL, '2017-03-29 19:18:54', '2017-03-29 19:18:54'),
(4, 3, 'Bellinger', NULL, '2017-03-29 19:19:08', '2017-03-29 19:19:08'),
(5, 2, 'Belo Horizonte', NULL, '2017-03-29 19:19:51', '2017-03-29 19:22:01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_code_2` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso_code_3` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ddi` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `countries`
--

INSERT INTO `countries` (`id`, `country`, `iso_code_2`, `iso_code_3`, `ddi`, `created_at`, `updated_at`) VALUES
(1, 'Brasil', 'BR', 'BRA', 55, '2017-03-29 19:14:51', '2017-03-29 19:14:51'),
(2, 'Estados Unidos da America', 'US', 'USA', 1, '2017-03-29 19:15:02', '2017-03-29 19:15:02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emails`
--

CREATE TABLE `emails` (
  `id` int(10) UNSIGNED NOT NULL,
  `entity_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enotes` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `emails`
--

INSERT INTO `emails` (`id`, `entity_id`, `email`, `enotes`, `created_at`, `updated_at`) VALUES
(1, 1, 'rodolfo_band@hotmail.com', 'Principal', '2017-03-29 19:25:08', '2017-03-29 19:25:08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entities`
--

CREATE TABLE `entities` (
  `id` int(10) UNSIGNED NOT NULL,
  `neighborhood_id` int(10) UNSIGNED NOT NULL,
  `postal_code_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnpj_cpf` varchar(18) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ie_rg` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_number` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_complement` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `entities`
--

INSERT INTO `entities` (`id`, `neighborhood_id`, `postal_code_id`, `name`, `company`, `type`, `cnpj_cpf`, `ie_rg`, `birth_date`, `address`, `address_number`, `address_complement`, `active`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Rodolfo de Almeida Bandeira', 'Rodolfo', 'F', '414.924.588-64', '48.893.499-0', '1993-03-03', 'Rua Italia', '1299', NULL, 1, 'Teste', '2017-03-29 19:25:08', '2017-03-29 19:25:08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entity_categories`
--

CREATE TABLE `entity_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eckey` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `entity_categories`
--

INSERT INTO `entity_categories` (`id`, `category`, `eckey`, `created_at`, `updated_at`) VALUES
(1, 'Cliente', 'cliente', '2017-03-29 17:54:12', '2017-03-29 17:54:12'),
(2, 'Fornecedor', 'fornecedor', '2017-03-29 19:13:21', '2017-03-29 19:13:21'),
(3, 'Transportadora', 'transportadora', '2017-03-29 19:13:41', '2017-03-29 19:13:41');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_02_21_142800_create_users_table', 1),
(2, '2017_02_21_142900_create_password_resets_table', 1),
(3, '2017_02_21_150000_create_neighborhoods_table', 1),
(4, '2017_02_21_161010_create_countries_table', 1),
(5, '2017_02_21_161031_create_states_table', 1),
(6, '2017_02_21_161053_create_cities_table', 1),
(7, '2017_02_21_161200_create_postal_codes_table', 1),
(8, '2017_02_21_161357_create_entities_table', 1),
(9, '2017_02_26_185202_create_entity_categories_table', 1),
(10, '2017_02_26_185314_create_categories_entities_table', 1),
(11, '2017_02_27_194806_create_phones_table', 1),
(12, '2017_02_27_195451_create_emails_table', 1),
(13, '2017_02_28_211305_create_brands_table', 1),
(14, '2017_02_28_211344_create_product_groups_table', 1),
(15, '2017_02_28_211356_create_product_sub_groups_table', 1),
(16, '2017_02_28_211446_create_product_categories_table', 1),
(17, '2017_02_28_211556_create_munitsystems_table', 1),
(18, '2017_02_28_211557_create_unit_multipliers_table', 1),
(19, '2017_02_28_211719_create_product_attributes_table', 1),
(20, '2017_02_28_211743_create_products_table', 1),
(21, '2017_02_28_211823_create_product_variations_table', 1),
(22, '2017_02_28_211842_create_attributes_products_table', 1),
(23, '2017_02_28_211907_create_product_providers_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `m_unit_systems`
--

CREATE TABLE `m_unit_systems` (
  `id` int(10) UNSIGNED NOT NULL,
  `unit` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `measure` decimal(9,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `neighborhoods`
--

CREATE TABLE `neighborhoods` (
  `id` int(10) UNSIGNED NOT NULL,
  `neighborhood` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `neighborhoods`
--

INSERT INTO `neighborhoods` (`id`, `neighborhood`, `created_at`, `updated_at`) VALUES
(1, 'Centro', '2017-03-29 19:23:14', '2017-03-29 19:23:14'),
(2, 'Morumbi', '2017-03-29 19:23:22', '2017-03-29 19:23:22'),
(3, 'Itaim Bibi', '2017-03-29 19:23:42', '2017-03-29 19:23:42');

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `phones`
--

CREATE TABLE `phones` (
  `id` int(10) UNSIGNED NOT NULL,
  `entity_id` int(10) UNSIGNED NOT NULL,
  `number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pnotes` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `phones`
--

INSERT INTO `phones` (`id`, `entity_id`, `number`, `pnotes`, `created_at`, `updated_at`) VALUES
(1, 1, '(16) 3342-3825', 'Casa', '2017-03-29 19:25:08', '2017-03-29 19:25:08'),
(2, 1, '(16) 99738-2949', 'Vivo', '2017-03-29 19:25:08', '2017-03-29 19:25:08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `postal_codes`
--

CREATE TABLE `postal_codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `postal_codes`
--

INSERT INTO `postal_codes` (`id`, `city_id`, `code`, `created_at`, `updated_at`) VALUES
(1, 1, '14810-000', '2017-03-29 19:20:59', '2017-03-29 19:20:59'),
(2, 3, '14940-000', '2017-03-29 19:21:16', '2017-03-29 19:21:16'),
(3, 1, '14810-001', '2017-03-29 19:21:27', '2017-03-29 19:21:27'),
(4, 5, '14000-000', '2017-03-29 19:22:19', '2017-03-29 19:22:19'),
(5, 5, '14000-001', '2017-03-29 19:22:32', '2017-03-29 19:22:32'),
(6, 4, '10000-000', '2017-03-29 19:22:56', '2017-03-29 19:22:56');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `subgroup_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `prname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prdescription` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prcostprice` decimal(12,4) DEFAULT NULL,
  `prcostmed` decimal(12,4) DEFAULT NULL,
  `prsaleprice` decimal(12,4) DEFAULT NULL,
  `prsalemed` decimal(12,4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `pa_attribute` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pa_key` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pa_value` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `pcname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pckey` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_groups`
--

CREATE TABLE `product_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `pgname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_providers`
--

CREATE TABLE `product_providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `entity_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_sub_groups`
--

CREATE TABLE `product_sub_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `psname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `product_variations`
--

CREATE TABLE `product_variations` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `mus_id` int(10) UNSIGNED NOT NULL,
  `dmus_id` int(10) UNSIGNED NOT NULL,
  `wmus_id` int(10) UNSIGNED NOT NULL,
  `um_id` int(10) UNSIGNED NOT NULL,
  `percaddit` decimal(12,4) DEFAULT NULL,
  `valaddit` decimal(12,4) DEFAULT NULL,
  `quantity` decimal(12,4) DEFAULT NULL,
  `maxqtity` decimal(12,4) DEFAULT NULL,
  `minqtity` decimal(12,4) DEFAULT NULL,
  `length` decimal(12,4) DEFAULT NULL,
  `width` decimal(12,4) DEFAULT NULL,
  `height` decimal(12,4) DEFAULT NULL,
  `weight` decimal(12,4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `states`
--

CREATE TABLE `states` (
  `id` int(10) UNSIGNED NOT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_code_2` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `states`
--

INSERT INTO `states` (`id`, `state`, `iso_code_2`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'São Paulo', 'SP', 1, '2017-03-29 19:15:28', '2017-03-29 19:15:28'),
(2, 'Minas Gerais', 'MG', 1, '2017-03-29 19:15:38', '2017-03-29 19:15:38'),
(3, 'Texas', 'TX', 2, '2017-03-29 19:15:49', '2017-03-29 19:15:49');

-- --------------------------------------------------------

--
-- Estrutura da tabela `unit_multipliers`
--

CREATE TABLE `unit_multipliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `um_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `um_iso_code` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `um_multiplier` decimal(10,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rodolfo Bandeira', 'rodolfo_band@hotmail.com', '$2y$10$FkxIfsFJ9xltWgZorv7lvuamrdGmSbaAY87nZeEwPSP9wKwPQ6lzS', NULL, '2017-03-29 17:53:56', '2017-03-29 17:53:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes_products`
--
ALTER TABLE `attributes_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attributes_products_prodvar_id_foreign` (`prodvar_id`),
  ADD KEY `attributes_products_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_entities`
--
ALTER TABLE `categories_entities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_entities_entity_id_foreign` (`entity_id`),
  ADD KEY `categories_entities_category_id_foreign` (`category_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_state_id_foreign` (`state_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emails_entity_id_foreign` (`entity_id`);

--
-- Indexes for table `entities`
--
ALTER TABLE `entities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entities_neighborhood_id_foreign` (`neighborhood_id`),
  ADD KEY `entities_postal_code_id_foreign` (`postal_code_id`);

--
-- Indexes for table `entity_categories`
--
ALTER TABLE `entity_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_unit_systems`
--
ALTER TABLE `m_unit_systems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `neighborhoods`
--
ALTER TABLE `neighborhoods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phones_entity_id_foreign` (`entity_id`);

--
-- Indexes for table `postal_codes`
--
ALTER TABLE `postal_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postal_codes_city_id_foreign` (`city_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_group_id_foreign` (`group_id`),
  ADD KEY `products_subgroup_id_foreign` (`subgroup_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_groups`
--
ALTER TABLE `product_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_providers`
--
ALTER TABLE `product_providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_providers_product_id_foreign` (`product_id`),
  ADD KEY `product_providers_entity_id_foreign` (`entity_id`);

--
-- Indexes for table `product_sub_groups`
--
ALTER TABLE `product_sub_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_sub_groups_group_id_foreign` (`group_id`);

--
-- Indexes for table `product_variations`
--
ALTER TABLE `product_variations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variations_product_id_foreign` (`product_id`),
  ADD KEY `product_variations_mus_id_foreign` (`mus_id`),
  ADD KEY `product_variations_dmus_id_foreign` (`dmus_id`),
  ADD KEY `product_variations_wmus_id_foreign` (`wmus_id`),
  ADD KEY `product_variations_um_id_foreign` (`um_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_country_id_foreign` (`country_id`);

--
-- Indexes for table `unit_multipliers`
--
ALTER TABLE `unit_multipliers`
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
-- AUTO_INCREMENT for table `attributes_products`
--
ALTER TABLE `attributes_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories_entities`
--
ALTER TABLE `categories_entities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `entities`
--
ALTER TABLE `entities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `entity_categories`
--
ALTER TABLE `entity_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `m_unit_systems`
--
ALTER TABLE `m_unit_systems`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `neighborhoods`
--
ALTER TABLE `neighborhoods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `postal_codes`
--
ALTER TABLE `postal_codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_groups`
--
ALTER TABLE `product_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_providers`
--
ALTER TABLE `product_providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_sub_groups`
--
ALTER TABLE `product_sub_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_variations`
--
ALTER TABLE `product_variations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `unit_multipliers`
--
ALTER TABLE `unit_multipliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `attributes_products`
--
ALTER TABLE `attributes_products`
  ADD CONSTRAINT `attributes_products_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `product_attributes` (`id`),
  ADD CONSTRAINT `attributes_products_prodvar_id_foreign` FOREIGN KEY (`prodvar_id`) REFERENCES `product_variations` (`id`);

--
-- Limitadores para a tabela `categories_entities`
--
ALTER TABLE `categories_entities`
  ADD CONSTRAINT `categories_entities_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `entity_categories` (`id`),
  ADD CONSTRAINT `categories_entities_entity_id_foreign` FOREIGN KEY (`entity_id`) REFERENCES `entities` (`id`);

--
-- Limitadores para a tabela `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Limitadores para a tabela `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `emails_entity_id_foreign` FOREIGN KEY (`entity_id`) REFERENCES `entities` (`id`);

--
-- Limitadores para a tabela `entities`
--
ALTER TABLE `entities`
  ADD CONSTRAINT `entities_neighborhood_id_foreign` FOREIGN KEY (`neighborhood_id`) REFERENCES `neighborhoods` (`id`),
  ADD CONSTRAINT `entities_postal_code_id_foreign` FOREIGN KEY (`postal_code_id`) REFERENCES `postal_codes` (`id`);

--
-- Limitadores para a tabela `phones`
--
ALTER TABLE `phones`
  ADD CONSTRAINT `phones_entity_id_foreign` FOREIGN KEY (`entity_id`) REFERENCES `entities` (`id`);

--
-- Limitadores para a tabela `postal_codes`
--
ALTER TABLE `postal_codes`
  ADD CONSTRAINT `postal_codes_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Limitadores para a tabela `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`),
  ADD CONSTRAINT `products_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `product_groups` (`id`),
  ADD CONSTRAINT `products_subgroup_id_foreign` FOREIGN KEY (`subgroup_id`) REFERENCES `product_sub_groups` (`id`);

--
-- Limitadores para a tabela `product_providers`
--
ALTER TABLE `product_providers`
  ADD CONSTRAINT `product_providers_entity_id_foreign` FOREIGN KEY (`entity_id`) REFERENCES `entities` (`id`),
  ADD CONSTRAINT `product_providers_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Limitadores para a tabela `product_sub_groups`
--
ALTER TABLE `product_sub_groups`
  ADD CONSTRAINT `product_sub_groups_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `product_groups` (`id`);

--
-- Limitadores para a tabela `product_variations`
--
ALTER TABLE `product_variations`
  ADD CONSTRAINT `product_variations_dmus_id_foreign` FOREIGN KEY (`dmus_id`) REFERENCES `m_unit_systems` (`id`),
  ADD CONSTRAINT `product_variations_mus_id_foreign` FOREIGN KEY (`mus_id`) REFERENCES `m_unit_systems` (`id`),
  ADD CONSTRAINT `product_variations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_variations_um_id_foreign` FOREIGN KEY (`um_id`) REFERENCES `unit_multipliers` (`id`),
  ADD CONSTRAINT `product_variations_wmus_id_foreign` FOREIGN KEY (`wmus_id`) REFERENCES `m_unit_systems` (`id`);

--
-- Limitadores para a tabela `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

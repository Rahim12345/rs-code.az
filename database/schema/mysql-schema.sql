/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `abouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `abouts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `about_az` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_ru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_enabled` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blogs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slug_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_az` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_az` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_ru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_az` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_ru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_az` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `brif_fives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brif_fives` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `seo_sirketadi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_sirketsahesi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_sirkethaqqinda` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_vebsayt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_acarsozler` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_budce` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_ad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_vezife` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_telefon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_vaxt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `brif_fours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brif_fours` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `smm_sirketadi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smm_sirketsahesi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smm_sirkethaqqinda` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_gosteris` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smm_ayligpost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smm_gozlenti` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smm_ayligbudce` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smm_reqibler` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smm_cavablandirma` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smm_ad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smm_vezife` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smm_telefon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smm_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smm_vaxt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `brif_logos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brif_logos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sirketadi` text COLLATE utf8mb4_unicode_ci,
  `logotip` text COLLATE utf8mb4_unicode_ci,
  `fealiyyetsahesi` text COLLATE utf8mb4_unicode_ci,
  `prespektiv` text COLLATE utf8mb4_unicode_ci,
  `reqibler` text COLLATE utf8mb4_unicode_ci,
  `fealiyyetdairesi` text COLLATE utf8mb4_unicode_ci,
  `movcudlogo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reng` text COLLATE utf8mb4_unicode_ci,
  `logotipvacibliyi` text COLLATE utf8mb4_unicode_ci,
  `logotipsecimi` int DEFAULT NULL,
  `diger` text COLLATE utf8mb4_unicode_ci,
  `basqaarzu` text COLLATE utf8mb4_unicode_ci,
  `ad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vezife` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vaxt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `brif_threes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brif_threes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `adlandirma_sirketadi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adlandirma_seqment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adlandirma_hedef` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adlandirma_ugurluadlar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adlandirma_teessurat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adlandirma_xaricidil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adlandirma_sozlerinsayi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adlandirma_elaveistek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adlandirma_ad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adlandirma_vezife` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adlandirma_telefon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adlandirma_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adlandirma_vaxt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `brif_vebs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brif_vebs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `web_sirketadi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_logotip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_fealiyyetsahesi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_prespektiv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_reqibler` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_firmastilidiger` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_gosterisvesaitidiger` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_az` tinyint(1) DEFAULT NULL,
  `web_en` tinyint(1) DEFAULT NULL,
  `web_ru` tinyint(1) DEFAULT NULL,
  `web_qeydler` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_menu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_imkanlar1` tinyint(1) DEFAULT NULL,
  `web_imkanlar2` tinyint(1) DEFAULT NULL,
  `web_imkanlar3` tinyint(1) DEFAULT NULL,
  `web_imkanlar4` tinyint(1) DEFAULT NULL,
  `web_imkanlar5` tinyint(1) DEFAULT NULL,
  `web_ad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_vezife` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_telefon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web_vaxt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_az` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_az` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_ru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `companies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_az` text COLLATE utf8mb4_unicode_ci,
  `about_en` text COLLATE utf8mb4_unicode_ci,
  `about_ru` text COLLATE utf8mb4_unicode_ci,
  `group_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `companies_group_id_foreign` (`group_id`),
  CONSTRAINT `companies_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sirket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `elaqe_nomresi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `firm_logo_tips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `firm_logo_tips` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `brif_id` int DEFAULT NULL,
  `firma_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `firma_stilis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `firma_stilis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `groups` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `konvert_logo_tips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `konvert_logo_tips` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `brif_id` int DEFAULT NULL,
  `konvert_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `konverts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `konverts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `link_clicks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `link_clicks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `href` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'internal',
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `link_clicks_href_index` (`href`),
  KEY `link_clicks_date_index` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `logo_tips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logo_tips` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `note_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `note_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_az` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_en` longtext COLLATE utf8mb4_unicode_ci,
  `body_az` longtext COLLATE utf8mb4_unicode_ci,
  `note_category_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notes_note_category_id_foreign` (`note_category_id`),
  CONSTRAINT `notes_note_category_id_foreign` FOREIGN KEY (`note_category_id`) REFERENCES `note_categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `partners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `partners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_no` int unsigned NOT NULL DEFAULT '0',
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_no` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `service_id` bigint unsigned NOT NULL,
  `company_id` bigint unsigned NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `price_old` decimal(10,2) DEFAULT NULL,
  `unit` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` int DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `featured` tinyint NOT NULL DEFAULT '0',
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_az` text COLLATE utf8mb4_unicode_ci,
  `text_en` text COLLATE utf8mb4_unicode_ci,
  `text_ru` text COLLATE utf8mb4_unicode_ci,
  `hits` int NOT NULL DEFAULT '0',
  `order_no` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_service_id_foreign` (`service_id`),
  KEY `products_company_id_foreign` (`company_id`),
  CONSTRAINT `products_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  CONSTRAINT `products_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `project_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `project_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projects` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarix` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarix_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tarix_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tarix_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kateqoriya` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home` tinyint(1) NOT NULL DEFAULT '0',
  `order_no` int NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_az` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `description_ru` text COLLATE utf8mb4_unicode_ci,
  `photo1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `on_home` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 - not, 1 - on home',
  `order_no` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_no` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_enabled` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `veb_dasiyici_numunes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `veb_dasiyici_numunes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `veb_dasiyici_id` bigint unsigned NOT NULL,
  `name_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `veb_dasiyici_numunes_veb_dasiyici_id_foreign` (`veb_dasiyici_id`),
  CONSTRAINT `veb_dasiyici_numunes_veb_dasiyici_id_foreign` FOREIGN KEY (`veb_dasiyici_id`) REFERENCES `veb_dasiyicis` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `veb_dasiyicis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `veb_dasiyicis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `veb_firma_stilis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `veb_firma_stilis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `brif_veb_id` bigint unsigned NOT NULL,
  `veb_dasiyici_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `veb_firma_stilis_brif_veb_id_foreign` (`brif_veb_id`),
  KEY `veb_firma_stilis_veb_dasiyici_id_foreign` (`veb_dasiyici_id`),
  CONSTRAINT `veb_firma_stilis_brif_veb_id_foreign` FOREIGN KEY (`brif_veb_id`) REFERENCES `brif_vebs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `veb_firma_stilis_veb_dasiyici_id_foreign` FOREIGN KEY (`veb_dasiyici_id`) REFERENCES `veb_dasiyicis` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `veb_gostericis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `veb_gostericis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `brif_veb_id` bigint unsigned NOT NULL,
  `veb_vesait_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `veb_gostericis_brif_veb_id_foreign` (`brif_veb_id`),
  KEY `veb_gostericis_veb_vesait_id_foreign` (`veb_vesait_id`),
  CONSTRAINT `veb_gostericis_brif_veb_id_foreign` FOREIGN KEY (`brif_veb_id`) REFERENCES `brif_vebs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `veb_gostericis_veb_vesait_id_foreign` FOREIGN KEY (`veb_vesait_id`) REFERENCES `veb_vesaits` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `veb_vesaits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `veb_vesaits` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `visitors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `visitors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referer` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'desktop',
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `visitors_ip_index` (`ip`),
  KEY `visitors_date_index` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `vizit_karts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vizit_karts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_az` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `vizit_logo_tips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vizit_logo_tips` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `brif_id` int DEFAULT NULL,
  `vizit_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1,'2014_10_12_000000_create_users_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (2,'2014_10_12_100000_create_password_resets_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (3,'2019_08_19_000000_create_failed_jobs_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (4,'2019_12_14_000001_create_personal_access_tokens_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (5,'2021_06_18_032420_create_brif_vebs_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (6,'2021_10_22_055419_create_abouts_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (7,'2021_10_22_055937_create_projects_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (8,'2021_10_22_061344_create_partners_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (9,'2021_10_22_062347_create_blogs_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (10,'2021_10_27_103422_create_project_images_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (11,'2021_11_02_131715_create_comments_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (12,'2021_11_15_133441_create_admins_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (13,'2022_04_11_044447_create_services_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (14,'2022_04_11_101740_create_groups_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (15,'2022_04_12_102258_create_companies_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (16,'2022_05_30_055624_create_products_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (17,'2022_05_30_060727_create_product_images_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (18,'2022_06_15_052053_create_vizit_karts_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (19,'2022_06_15_052057_create_logo_tips_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (20,'2022_06_15_052058_create_firma_stilis_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (21,'2022_06_15_052058_create_konverts_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (22,'2022_06_15_052424_create_brif_logos_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (23,'2022_06_15_130617_create_firm_logo_tips_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (24,'2022_06_15_130648_create_konvert_logo_tips_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (25,'2022_06_15_131514_create_vizit_logo_tips_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (26,'2022_06_18_042054_create_veb_dasiyicis_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (27,'2022_06_18_045056_create_veb_dasiyici_numunes_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (28,'2022_06_18_051257_create_veb_vesaits_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (29,'2022_06_18_092420_create_veb_firma_stilis_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (30,'2022_06_18_092924_create_veb_gostericis_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (31,'2023_01_21_071404_create_brif_threes_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (32,'2023_01_21_191344_create_brif_fours_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (33,'2023_01_22_043753_create_brif_fives_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (34,'2023_09_17_140621_create_contacts_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (35,'2023_09_17_150804_create_teams_table',1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (36,'2026_04_22_115355_add_slugs_to_blogs_table',2);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (37,'2026_04_22_124124_add_multilang_to_projects_table',3);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (38,'2026_04_22_124931_add_commerce_fields_to_products_table',4);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (39,'2026_04_22_142657_add_order_no_to_partners_table',5);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (40,'2026_04_22_143650_add_2fa_to_users_table',6);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (41,'2026_04_22_144849_add_2fa_to_admins_table',7);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (42,'2026_04_22_163038_create_note_categories_table',8);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (43,'2026_04_22_163038_create_notes_table',8);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (44,'2026_04_22_195313_create_visitors_table',9);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (45,'2026_04_22_195714_create_link_clicks_table',10);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (46,'2026_04_22_200333_create_settings_table',11);

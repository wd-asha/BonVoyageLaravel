-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 17 2023 г., 19:27
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bonvoyage`
--

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `id` bigint UNSIGNED NOT NULL,
  `country_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `has_hotels` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `country_title`, `country_image`, `created_at`, `updated_at`, `deleted_at`, `has_hotels`) VALUES
(1, 'Абхазия', 'media/countries/1781527374557798.jpg', '2023-11-03 02:35:01', '2023-11-03 02:35:01', NULL, 1),
(2, 'Россия', 'media/countries/1781529060318235.jpg', '2023-11-03 03:01:48', '2023-11-03 03:01:48', NULL, 1),
(3, 'Албания', 'media/countries/1781529118296804.jpg', '2023-11-03 03:02:44', '2023-11-03 03:02:44', NULL, 0),
(4, 'Бахрейн', 'media/countries/1781529139568399.jpg', '2023-11-03 03:03:04', '2023-11-03 03:03:04', NULL, 0),
(5, 'Вьетнам', 'media/countries/1781529201422557.jpg', '2023-11-03 03:04:03', '2023-11-03 03:04:03', NULL, 0),
(6, 'Греция', 'media/countries/1781529224562038.jpg', '2023-11-03 03:04:25', '2023-11-03 03:04:25', NULL, 0),
(7, 'Донимикана', 'media/countries/1781529248691487.jpg', '2023-11-03 03:04:48', '2023-11-03 03:04:48', NULL, 0),
(8, 'Израиль', 'media/countries/1781529270986200.jpg', '2023-11-03 03:05:09', '2023-11-03 03:05:09', NULL, 0),
(9, 'Индия', 'media/countries/1781529296657827.jpg', '2023-11-03 03:05:34', '2023-11-03 03:05:34', NULL, 0),
(10, 'Индонезия', 'media/countries/1781529357209284.jpg', '2023-11-03 03:06:31', '2023-11-03 03:06:31', NULL, 0),
(11, 'Иордания', 'media/countries/1781529375096865.jpg', '2023-11-03 03:06:49', '2023-11-03 03:06:49', NULL, 0),
(12, 'Испания', 'media/countries/1781529411235077.jpg', '2023-11-03 03:07:23', '2023-11-03 03:07:23', NULL, 0),
(13, 'Италия', 'media/countries/1781529433419191.png', '2023-11-03 03:07:44', '2023-11-03 03:07:44', NULL, 0),
(14, 'Кипр', 'media/countries/1781529451007741.jpg', '2023-11-03 03:08:01', '2023-11-03 03:08:01', NULL, 0),
(15, 'Куба', 'media/countries/1781529469374460.jpg', '2023-11-03 03:08:18', '2023-11-03 03:08:18', NULL, 0),
(16, 'Маврикий', 'media/countries/1781529501617902.jpg', '2023-11-03 03:08:49', '2023-11-03 03:08:49', NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `departures`
--

CREATE TABLE `departures` (
  `id` bigint UNSIGNED NOT NULL,
  `country_id` int UNSIGNED DEFAULT NULL,
  `hotel_id` int UNSIGNED DEFAULT NULL,
  `departure_departure` date DEFAULT NULL,
  `departure_arrival` date DEFAULT NULL,
  `departure_seats` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departure_standard` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departure_days` int UNSIGNED DEFAULT NULL,
  `departure_price` int UNSIGNED DEFAULT NULL,
  `departure_status` int UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `departure_town` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `departures`
--

INSERT INTO `departures` (`id`, `country_id`, `hotel_id`, `departure_departure`, `departure_arrival`, `departure_seats`, `departure_standard`, `departure_days`, `departure_price`, `departure_status`, `created_at`, `updated_at`, `deleted_at`, `departure_town`) VALUES
(1, 1, 1, '2023-07-17', '2023-07-22', 'двухместный', 'стандарт', 6, 19400, 0, '2023-11-06 02:25:07', '2023-11-07 11:01:48', NULL, 'цандрипш'),
(2, 1, 1, '2023-07-16', '2023-07-23', 'двухместный', 'стандарт', 7, 20200, 0, '2023-11-06 03:45:30', '2023-11-07 11:10:44', NULL, 'цандрипш'),
(3, 1, 1, '2023-07-16', '2023-07-24', 'двухместный', 'стандарт', 8, 20000, 0, '2023-11-06 03:47:25', '2023-11-09 00:55:20', NULL, 'цандрипш'),
(4, 1, 1, '2023-07-15', '2023-07-25', 'двухместный', 'стандарт', 9, 23300, 0, '2023-11-06 03:49:03', '2023-11-07 01:41:56', NULL, 'цандрипш'),
(5, 1, 1, '2023-07-16', '2023-07-26', 'двухместный', 'стандарт', 10, 26300, 0, '2023-11-06 03:50:22', '2023-11-07 11:10:41', NULL, 'цандрипш'),
(6, 1, 1, '2023-07-16', '2023-07-22', 'двухместный', 'люкс', 6, 24100, 0, '2023-11-06 03:51:50', '2023-11-07 00:26:56', NULL, 'цандрипш'),
(7, 1, 1, '2023-07-16', '2023-07-23', 'двухместный', 'люкс', 7, 25600, 0, '2023-11-06 03:52:42', '2023-11-06 03:52:42', NULL, 'цандрипш'),
(8, 1, 1, '2023-07-16', '2023-07-24', 'двухместный', 'люкс', 8, 27200, 0, '2023-11-06 03:53:43', '2023-11-06 11:45:20', NULL, 'цандрипш'),
(9, 1, 1, '2023-07-16', '2023-07-25', 'двухместный', 'люкс', 9, 29600, 0, '2023-11-06 03:54:41', '2023-11-06 23:44:58', NULL, 'цандрипш'),
(10, 1, 1, '2023-07-16', '2023-07-26', 'двухместный', 'люкс', 10, 31100, 0, '2023-11-06 03:55:30', '2023-11-06 14:42:14', NULL, 'цандрипш'),
(11, 1, 2, '2023-07-16', '2023-07-22', 'двухместный', '2 категория', 6, 24100, 0, '2023-11-06 09:08:32', '2023-11-09 00:55:10', NULL, 'Гагра'),
(12, 2, 3, '2023-07-14', '2023-07-20', 'трехкомнатный', 'с подселением', 6, 17300, 0, '2023-11-07 11:12:32', '2023-11-09 06:14:52', NULL, 'Калининград'),
(13, 2, 3, '2023-07-14', '2023-07-21', 'четырехместный', 'с подселением', 7, 18500, 0, '2023-11-07 11:13:39', '2023-11-07 11:13:39', NULL, 'Калининград'),
(14, 2, 3, '2023-07-14', '2023-07-22', 'трехкомнатный', 'с подселением', 8, 19700, 0, '2023-11-07 11:14:33', '2023-11-09 06:14:30', NULL, 'Калининград'),
(15, 1, 2, '2023-07-16', '2023-07-22', 'двухместный', '1 категория', 6, 25600, 0, '2023-11-07 11:16:44', '2023-11-07 11:16:44', NULL, 'Гагра'),
(16, 1, 2, '2023-07-16', '2023-07-23', 'двухместный', '2 категория', 7, 25800, 0, '2023-11-07 11:17:59', '2023-11-07 11:17:59', NULL, 'Гагра'),
(17, 2, 4, '2023-07-14', '2023-07-20', 'двухместный', 'эконом', 6, 19200, 0, '2023-11-07 11:20:09', '2023-11-07 11:20:09', NULL, 'Балтийск'),
(18, 2, 4, '2023-07-14', '2023-07-21', 'двухместный', 'эконом', 7, 20700, 0, '2023-11-07 11:21:08', '2023-11-09 00:52:47', NULL, 'Балтийск'),
(19, 2, 4, '2023-07-14', '2023-07-22', 'двухместный', 'эконом', 8, 22200, 0, '2023-11-07 11:22:02', '2023-11-07 11:22:02', NULL, 'Балтийск'),
(20, 2, 4, '2023-07-14', '2023-07-23', 'двухместный', 'эконом', 9, 23800, 0, '2023-11-09 04:20:40', '2023-11-09 04:20:40', NULL, 'Балтийск'),
(21, 2, 4, '2023-07-14', '2023-07-24', 'двухместный', 'эконом', 10, 25300, 0, '2023-11-09 04:21:48', '2023-11-09 04:21:48', NULL, 'Балтийск'),
(22, 2, 4, '2023-07-14', '2023-07-20', 'двухместный', 'стандарт', 6, 25900, 0, '2023-11-09 04:23:03', '2023-11-09 04:23:03', NULL, 'Балтийск'),
(23, 2, 4, '2023-07-14', '2023-07-21', 'двухместный', 'стандарт', 7, 27200, 0, '2023-11-09 04:24:10', '2023-11-09 04:24:10', NULL, 'Балтийск'),
(24, 2, 4, '2023-07-14', '2023-07-22', 'двухместный', 'стандарт', 8, 31100, 0, '2023-11-09 04:25:41', '2023-11-09 04:25:41', NULL, 'Балтийск'),
(25, 2, 4, '2023-07-14', '2023-07-23', 'двухместный', 'стандарт', 9, 33800, 0, '2023-11-09 04:26:49', '2023-11-09 04:26:49', NULL, 'Балтийск'),
(26, 2, 4, '2023-07-14', '2023-07-24', 'двухместный', 'стандарт', 10, 36400, 0, '2023-11-09 04:27:39', '2023-11-09 04:59:04', NULL, 'Балтийск'),
(27, 2, 3, '2023-07-14', '2023-07-23', 'трехкомнатный', 'с подселелнием', 9, 20900, 0, '2023-11-09 06:14:03', '2023-11-09 06:14:03', NULL, 'Калининград'),
(28, 2, 3, '2023-07-14', '2023-07-24', 'трехкомнатный', 'с подселелнием', 10, 22100, 0, '2023-11-10 02:14:17', '2023-11-10 02:14:17', NULL, 'Калининград'),
(29, 2, 3, '2023-07-12', '2023-07-18', 'двухкомнатный', 'двухместный', 6, 23900, 0, '2023-11-10 02:17:44', '2023-11-10 02:17:44', NULL, 'Калининград'),
(30, 2, 3, '2023-07-14', '2023-07-21', 'двухкомнатный', 'двухместный', 7, 26200, 0, '2023-11-10 02:18:56', '2023-11-10 02:18:56', NULL, 'Калининград'),
(31, 2, 3, '2023-07-14', '2023-07-22', 'двухкомнатный', 'двухместный', 8, 28500, 0, '2023-11-10 02:19:55', '2023-11-10 02:19:55', NULL, 'Калининград'),
(32, 2, 3, '2023-07-12', '2023-07-21', 'двухкомнатный', 'двухместный', 9, 30800, 0, '2023-11-10 02:20:55', '2023-11-10 02:20:55', NULL, 'Калининград'),
(33, 2, 3, '2023-07-12', '2023-07-22', 'двухкомнатный', 'двухместный', 10, 33120, 0, '2023-11-10 02:21:43', '2023-11-10 04:42:05', NULL, 'Калининград'),
(34, 1, 2, '2023-07-16', '2023-07-23', 'двухместный', '1 категории', 7, 27440, 0, '2023-11-10 05:28:47', '2023-11-10 05:28:47', NULL, 'Гагра'),
(35, 1, 2, '2023-07-16', '2023-07-24', 'двухместный', '2 категории', 8, 27320, 0, '2023-11-10 05:30:07', '2023-11-10 05:30:07', NULL, 'Гагра'),
(36, 1, 2, '2023-07-16', '2023-07-24', 'двухместный', '1 категории', 8, 29250, 0, '2023-11-10 05:31:04', '2023-11-10 05:31:04', NULL, 'Гагра'),
(37, 1, 2, '2023-07-16', '2023-07-25', 'двухместный', '2 категории', 9, 29660, 0, '2023-11-10 05:32:07', '2023-11-10 05:32:07', NULL, 'Гагра'),
(38, 1, 2, '2023-07-16', '2023-07-25', 'двухместный', '1 категории', 9, 31830, 0, '2023-11-10 05:33:13', '2023-11-10 05:33:13', NULL, 'Гагра'),
(39, 1, 2, '2023-07-16', '2023-07-26', 'двухместный', '2 категории', 10, 31230, 0, '2023-11-10 05:34:17', '2023-11-10 05:34:17', NULL, 'Гагра'),
(40, 1, 2, '2023-07-16', '2023-07-26', 'двухместный', '1 категории', 10, 33640, 0, '2023-11-10 05:35:24', '2023-11-10 05:35:24', NULL, 'Гагра');

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint UNSIGNED NOT NULL,
  `hotel_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int DEFAULT NULL,
  `hotel_town` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotel_stars` int DEFAULT NULL,
  `hotel_place` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `hotel_tours` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `hotel_about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `hotel_rooms` int DEFAULT NULL,
  `hotel_price` int DEFAULT NULL,
  `hotel_image1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotel_image2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotel_image3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotel_image4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `has_departures` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `hotels`
--

INSERT INTO `hotels` (`id`, `hotel_title`, `country_id`, `hotel_town`, `hotel_stars`, `hotel_place`, `hotel_tours`, `hotel_about`, `hotel_rooms`, `hotel_price`, `hotel_image1`, `hotel_image2`, `hotel_image3`, `hotel_image4`, `created_at`, `updated_at`, `deleted_at`, `has_departures`) VALUES
(1, 'Amida Beach', 1, 'Цандрипш', 3, '<p>Гостевой дом «Amina Beach» расположен в тихом и живописном поселке \r\nЦандрипш, недалеко от границы с РФ. Огороженная территория отеля \r\nвымощена плиткой и украшена цветниками.</p><p>Отель расположен в 150 м от моря, в 17 км от аэропорта г.\r\n Сочи. ​Кафе, магазины, сувенирные лавки, рынок – все в шаговой \r\nдоступности.</p><p>На территории: Wi-Fi (бесплатно), парковка, экскурсионное бюро.</p>', '<p>Есть туры на 6, 7, 8, 9 и 10 ночей. Есть туры с 16 по 25 июля 2021 года.</p><p>Время заезда: после 14:00. Время выезда: до 12:00</p><p>В номере: уборка комнат (ежедневно), смена постельного \r\nбелья (1 раз в 4 дня), смена полотенец (1 раз в 4 дня), ТВ, кондиционер,\r\n душ.</p>', '<p>К размещению предлагаются номера категорий:</p><p><i class=\"fa fa-tags\"></i> 2-местный однокомнатный \r\n«стандарт» (23 кв.м, макс. 2 осн.места + 1 доп.место; холодильник. Доп. \r\nместо: кресло-кровать (может быть установлено без ограничения по \r\nвозрасту)</p><p><i class=\"fa fa-tags\"></i> 3-местный однокомнатный \r\n«стандарт» (23 кв.м, макс. 3 осн.места + 1 доп.место; вид на сад, \r\nодноспальные кровати, холодильник. Доп. место: кресло-кровать (может \r\nбыть установлено без ограничения по возрасту)</p><p><i class=\"fa fa-tags\"></i> 2-местный однокомнатный «люкс» (23 кв.м, макс. 2 чел., балкон с видом на море (3 этаж), холодильник)</p><p><i class=\"fa fa-tags\"></i> 2-местный однокомнатный без удобств (13 кв.м, вид на сад, односпальные кровати, душ и туалет - на этаже)</p><p>Дети принимаются: с любого возраста. Дети до 2 лет без места без питания — бесплатно.</p><p>Размещение с домашними животными разрешено - под запрос.</p>', 25, 17518, 'media/hotels/1781564787575279.jpg', 'media/hotels/1781564787702171.jpg', 'media/hotels/1781564787721047.jpg', 'media/hotels/1781564787738473.jpg', '2023-11-03 12:29:41', '2023-11-03 13:12:22', NULL, 1),
(2, 'Сана', 1, 'Гагра', 2, '<p>Санаторий «Сана» утопает в пышной субтропической зелени, \r\nрасполагается в парковой зоне в сердце курорта Гагра. Всего в нескольких\r\n минутах ходьбы находится чистый благоустроенный собственный пляж, парк.</p><p>\r\n            Санаторий располагается в центре Гагры. В нескольких \r\nминутах ходьбы находится чистый благоустроенный собственный пляж (600 \r\nм), аквапар<br></p>', '<p>Развлечения и спорт: настольный тесннис, бильярд (платно), финская сауна, боулинг-клуб, солярий. Питание: ресторан, бар.</p><p>\r\n            В номере: балкон, ТВ, душ, кондиционер, холодильник.</p><p>\r\n            Собственная бальнеолечебница и минеральный источник<br></p>', '<p>К размещению предлагаются номера категорий:</p><p><i class=\"fa fa-tags\"></i> двухместный однокомнатный \r\nномер 2ой категории (16 кв.м, основные места – 2, дополнительное место –\r\n еврораскладушка или кресло-кровать)</p><p><i class=\"fa fa-tags\"></i> двухместный однокомнатный \r\nномер 1ой категории (16 кв.м, основные места – 2, дополнительное место –\r\n еврораскладушка или кресло-кровать)</p><p><i class=\"fa fa-tags\"></i> двухместный двухкомнатный \r\n«Улучшенный» номер (32 кв.м, основные места – 2, два дополнительных \r\nместа – еврораскладушка или кресло-кровать)</p>', 75, 22285, 'media/hotels/1781566667085207.jpg', 'media/hotels/1781566667112266.jpg', 'media/hotels/1781566667131044.jpg', 'media/hotels/1781566667150307.jpg', '2023-11-03 12:59:33', '2023-11-03 12:59:33', NULL, 1),
(3, 'Патриот', 2, 'Калининград', 2, '<p>Отель, расположенный всего в 5 км от центра города, предлагает своим \r\nгостям комфортабельное размещение. Среди несомненных плюсов гостиницы - \r\nразмещение с домашними животными.</p><p>\r\n            Отель расположен в 400 м от Калининградского ботанического сада, в 15 минутах ходьбы от Северного железнодорожного вокзала.</p><p>\r\n            На территории: Wi-Fi (бесплатно), парковка, кафе<br></p>', '<p>Есть туры на 6, 7, 8, 9 и 10 ночей. Есть туры с 14 по 24 июля 2021 года.</p><p>Время заезда: после 14:00. Время выезда: до 12:00</p><p>\r\n            В номере: ТВ, стол<br></p>', '<p>К размещению предлагаются номера категорий:</p><p><i class=\"fa fa-tag\"></i> Двухкомнатный одноместный (односппальная кровать, мини-кухня)</p><p><i class=\"fa fa-tags\"></i> Трёхкомнатный 2-х местный (макс. 2 чел., 2 раздельные кровати, мини-кухня: шкаф, чайник, удобства одни на номер)</p><p><i class=\"fa fa-tags\"></i> Двухкомнатный 2-х местный (2 односпальные кровати)</p><p><i class=\"fa fa-tags\"></i> Двухкомнатный 3-х местный (3 односпальные кровати, общие удобства)</p><p><i class=\"fa fa-tag\"></i> Двухкомнатный 3-х местный под одноместное​​ (односпальная кровать, общие удобства)</p><p><i class=\"fa fa-tag\"></i> Двухкомнатный 4-х местный под одноместное​​ (односпальная кровать, общие удобства)</p><p>Дети до 3-х лет без предоставление места и питания — бесплатно.</p><p>Размещение с домашними животными допускается.</p>', 77, 17325, 'media/hotels/1781566891571075.jpg', 'media/hotels/1781566891589569.jpg', 'media/hotels/1781566891642903.jpg', 'media/hotels/1781566891696653.jpg', '2023-11-03 13:03:07', '2023-11-03 13:03:07', NULL, 1),
(4, 'Золотой якорь', 2, 'Балтийск', 3, '<p>Все комнаты отеля оснащены согласно современным стандартам сервиса. \r\nНа первом этаже гостиницы работает кафе «Жемчужина», а сторца здания \r\nрасположен кафе-клуб «Золотой якорь», функционирующий в вечернее и \r\nночное время по выходным.</p><p>\r\n            Отель расположен в исторической части города, в 3,2 км до центра города, в 65 км до аэропорта Храброво (г. Калининград).</p><p>\r\n            На территории: прачечная, камера хранения, Wi-Fi (бесплатно), парковка, экскурсионное бюро, прокат велосипедов, кафе<br></p>', '<p>Есть туры на 6, 7, 8, 9 и 10 ночей. Есть туры с 16 по 25 июля 2021 года.</p><p>\r\n            Программа детского отдыха. В номере: ТВ, холодильник<br></p>', '<p>К размещению предлагаются номера категорий:</p><p><i class=\"fa fa-tag\"></i> Эконом одноместный (10 кв.м, номер с односпальной кроватью, санузел и душ общего пользования)</p><p><i class=\"fa fa-tags\"></i> Эконом двухместный (15 кв.м, номер с 2 односпальными кроватями, санузел и душ на два номера)</p><p><i class=\"fa fa-tag\"></i> Стандарт одноместный (15 кв.м, полутороспальная кровать, чайник)</p><p><i class=\"fa fa-tags\"></i> Стандарт двухместный (17 кв.м, номер с двуспальной кроватью/2 односпальными кроватями;  чайник)</p><p><i class=\"fa fa-tags\"></i> Комфорт (25 кв.м, номер со \r\nспальной и гостиной зонами; широкая двуспальная кровать, диван, \r\nжурнальный столик, чайник, мини-кухня с микроволновой печью, фен, халат,\r\n тапочки)</p>', 34, 19227, 'media/hotels/1781567118446358.jpg', 'media/hotels/1781567118515086.jpg', 'media/hotels/1781567118559093.jpg', 'media/hotels/1781567118655356.jpg', '2023-11-03 13:06:44', '2023-11-03 13:06:44', NULL, 1),
(6, 'Миа', 1, 'Гагра', 2, NULL, NULL, NULL, NULL, 19253, 'media/hotels/1781641614945232.jpg', NULL, NULL, NULL, '2023-11-04 08:50:49', '2023-11-04 08:50:49', NULL, 0),
(7, 'Мандарин', 1, 'Новый Афон', 2, NULL, NULL, NULL, NULL, 23797, 'media/hotels/1781641952699145.jpg', NULL, NULL, NULL, '2023-11-04 08:56:11', '2023-11-04 08:56:11', NULL, 0),
(8, 'Бамбора', 1, 'Гудаута', 1, NULL, NULL, NULL, NULL, 23863, 'media/hotels/1781642016679441.jpg', NULL, NULL, NULL, '2023-11-04 08:57:12', '2023-11-04 08:57:12', NULL, 0),
(9, 'Pekan', 1, 'Цандрипш', 2, NULL, NULL, NULL, NULL, 23900, 'media/hotels/1781642094666344.jpg', NULL, NULL, NULL, '2023-11-04 08:58:26', '2023-11-04 08:58:26', NULL, 0),
(10, 'Камарит', 1, 'Новый Афон', 2, NULL, NULL, NULL, NULL, 24867, 'media/hotels/1781642231912406.jpg', NULL, NULL, NULL, '2023-11-04 09:00:37', '2023-11-04 09:00:37', NULL, 0),
(11, 'Лагуна', 1, 'Цандрипш', 2, NULL, NULL, NULL, NULL, 25280, 'media/hotels/1781642296819076.jpg', NULL, NULL, NULL, '2023-11-04 09:01:39', '2023-11-04 09:01:39', NULL, 0),
(12, 'Индисан', 1, 'Гагра', 3, NULL, NULL, NULL, NULL, 27640, 'media/hotels/1781642356517537.jpg', NULL, NULL, NULL, '2023-11-04 09:02:36', '2023-11-04 09:02:36', NULL, 0),
(13, 'Akua Resort', 1, 'Сухум', 3, NULL, NULL, NULL, NULL, 27865, 'media/hotels/1781663361470907.jpg', NULL, NULL, NULL, '2023-11-04 14:36:28', '2023-11-04 14:36:28', NULL, 0),
(14, 'Sun Palase Gagra', 1, 'Гагра', 3, NULL, NULL, NULL, NULL, 28000, 'media/hotels/1781663454771896.jpg', NULL, NULL, NULL, '2023-11-04 14:37:57', '2023-11-04 14:37:57', NULL, 0),
(15, 'Samson', 1, 'Сухум', 3, NULL, NULL, NULL, NULL, 28000, 'media/hotels/1781663509755598.jpg', NULL, NULL, NULL, '2023-11-04 14:38:49', '2023-11-04 14:38:49', NULL, 0),
(16, 'Солнечный', 1, 'Гагра', 3, NULL, NULL, NULL, NULL, 28280, 'media/hotels/1781663576690616.jpg', NULL, NULL, NULL, '2023-11-04 14:39:53', '2023-11-04 14:39:53', NULL, 0),
(17, 'Серебряный двор', 1, 'Гагра', NULL, NULL, NULL, NULL, NULL, 29100, 'media/hotels/1781663660456697.jpeg', NULL, NULL, NULL, '2023-11-04 14:41:13', '2023-11-04 14:41:13', NULL, 0),
(18, 'Псоу', 1, 'Цандрипш', 2, NULL, NULL, NULL, NULL, 29400, 'media/hotels/1781663732182659.jpg', NULL, NULL, NULL, '2023-11-04 14:42:21', '2023-11-04 14:42:21', NULL, 0),
(19, 'Грифон', 1, 'Новый Афон', 3, NULL, NULL, NULL, NULL, 29400, 'media/hotels/1781663783750777.jpg', NULL, NULL, NULL, '2023-11-04 14:43:11', '2023-11-04 14:43:11', NULL, 0),
(20, 'Bridge Mountain', 2, 'Сочи', 3, NULL, NULL, NULL, NULL, 19300, 'media/hotels/1781666016487946.jpg', NULL, NULL, NULL, '2023-11-04 15:18:40', '2023-11-04 15:18:40', NULL, 0),
(21, 'Альпина', 2, 'Приэльбрусье', 3, NULL, NULL, NULL, NULL, 20440, 'media/hotels/1781666081711979.jpg', NULL, NULL, NULL, '2023-11-04 15:19:42', '2023-11-04 15:19:42', NULL, 0),
(22, 'Таулу', 2, 'Донбай', 2, NULL, NULL, NULL, NULL, 21600, 'media/hotels/1781666930516019.jpg', NULL, NULL, NULL, '2023-11-04 15:33:12', '2023-11-04 15:33:12', NULL, 0),
(23, 'Пруссия', 2, 'Калининград', 2, NULL, NULL, NULL, NULL, 21800, 'media/hotels/1781666987799970.jpg', NULL, NULL, NULL, '2023-11-04 15:34:06', '2023-11-04 15:34:06', NULL, 0),
(24, 'Искра', 2, 'Пятигорск', 2, NULL, NULL, NULL, NULL, 21800, 'media/hotels/1781667052870893.png', NULL, NULL, NULL, '2023-11-04 15:35:08', '2023-11-04 15:35:08', NULL, 0),
(25, 'Чайка', 2, 'Миниральные воды', 4, NULL, NULL, NULL, NULL, 23150, 'media/hotels/1781667136660715.jpg', NULL, NULL, NULL, '2023-11-04 15:36:28', '2023-11-04 15:36:28', NULL, 0),
(26, 'Катрин', 2, 'Сочи', 2, NULL, NULL, NULL, NULL, 23440, 'media/hotels/1781667430388495.jpg', NULL, NULL, NULL, '2023-11-04 15:41:09', '2023-11-04 15:41:09', NULL, 0),
(27, 'Гранд Каньон', 2, 'Санкт-Питербург', 3, NULL, NULL, NULL, NULL, 24600, 'media/hotels/1781667509508538.jpg', NULL, NULL, NULL, '2023-11-04 15:42:24', '2023-11-04 15:42:24', NULL, 0),
(28, 'Академик', 2, 'Калининград', 3, NULL, NULL, NULL, NULL, 24860, 'media/hotels/1781667583682892.jpg', NULL, NULL, NULL, '2023-11-04 15:43:35', '2023-11-04 15:43:35', NULL, 0),
(29, 'Альянс', 2, 'Железноводск', 2, NULL, NULL, NULL, NULL, 25170, 'media/hotels/1781667655464119.jpg', NULL, NULL, NULL, '2023-11-04 15:44:43', '2023-11-04 15:44:43', NULL, 0),
(30, 'Тройка', 2, 'Сочи', 3, NULL, NULL, NULL, NULL, 25800, 'media/hotels/1781667709369201.jpg', NULL, NULL, NULL, '2023-11-04 15:45:34', '2023-11-04 15:45:34', NULL, 0),
(31, 'Золотой век', 2, 'Санкт-Питербург', 3, NULL, NULL, NULL, NULL, 26400, 'media/hotels/1781667770538223.jpg', NULL, NULL, NULL, '2023-11-04 15:46:33', '2023-11-04 15:46:33', NULL, 0),
(32, 'Золотая бухта', 2, 'Калининград', 3, NULL, NULL, NULL, NULL, 26700, 'media/hotels/1781667817624374.jpg', NULL, NULL, NULL, '2023-11-04 15:47:18', '2023-11-04 15:47:18', NULL, 0),
(33, 'Питер', 2, 'Санкт-Питербург', 3, NULL, NULL, NULL, NULL, 26760, 'media/hotels/1781667870786386.jpg', NULL, NULL, NULL, '2023-11-04 15:48:08', '2023-11-04 15:48:08', NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_02_185542_create_roles_table', 1),
(6, '2023_11_03_053350_create_countries_table', 2),
(8, '2023_11_03_084542_create_hotels_table', 3),
(12, '2023_11_05_074544_create_departures_table', 4),
(13, '2023_11_06_094948_create_wishlists_table', 5),
(14, '2023_11_06_111531_add_town_to_departures', 6),
(15, '2023_11_06_181756_create_order_items_table', 7),
(16, '2023_11_06_181824_create_orders_table', 7),
(17, '2023_11_10_180607_add_field_has_hotels_to_countries_table', 8),
(18, '2023_11_10_181243_add_field_has_departures_to_hotels_table', 8),
(20, '2023_11_12_174536_create_subscribers_table', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_delivery` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` int NOT NULL DEFAULT '0',
  `order_total` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `slug`, `user_id`, `user_name`, `order_delivery`, `order_email`, `order_phone`, `order_status`, `order_total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 5, 'Михаил', 'Михаил', 'szn-asha@bk.ru', '89043000734', 0, '17 300', '2023-11-09 00:35:06', '2023-11-09 00:35:06', NULL),
(2, NULL, 5, 'Михаил', 'Михаил', 'szn-asha@bk.ru', '89043000734', 0, '24 100', '2023-11-09 00:40:38', '2023-11-09 00:40:38', NULL),
(3, NULL, 5, 'Михаил', 'Михаил', 'szn-asha@bk.ru', '89043000734', 0, '20 000', '2023-11-09 00:44:07', '2023-11-09 00:44:07', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` int NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departure_id` int UNSIGNED DEFAULT NULL,
  `departure_departure` date DEFAULT NULL,
  `departure_arrival` date DEFAULT NULL,
  `departure_seats` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departure_standard` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departure_days` int UNSIGNED DEFAULT NULL,
  `departure_price` int UNSIGNED DEFAULT NULL,
  `departure_town` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departure_country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departure_hotel` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `slug`, `departure_id`, `departure_departure`, `departure_arrival`, `departure_seats`, `departure_standard`, `departure_days`, `departure_price`, `departure_town`, `departure_country`, `departure_hotel`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, 12, '2023-07-14', '2023-07-20', 'трехместный', 'с подселением', 6, 17300, 'Калининград', 'Россия', 'Патриот', '2023-11-09 00:35:06', '2023-11-09 00:35:06', NULL),
(2, 2, NULL, 11, '2023-07-16', '2023-07-22', 'двухместный', '2 категория', 6, 24100, 'Гагра', 'Абхазия', 'Сана', '2023-11-09 00:40:38', '2023-11-09 00:40:38', NULL),
(3, 3, NULL, 3, '2023-07-16', '2023-07-24', 'двухместный', 'стандарт', 8, 20000, 'цандрипш', 'Абхазия', 'Amida Beach', '2023-11-09 00:44:07', '2023-11-09 00:44:07', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(3, 'Admin', 'admin', NULL, NULL),
(4, 'Author', 'author', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `subscribers`
--

INSERT INTO `subscribers` (`id`, `user_id`, `user_name`, `user_email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'nemo', 'wd-asha@bk.ru', '2023-11-12 13:21:35', '2023-11-12 13:21:35', NULL),
(2, 3, 'Admin', 'szn-asha@bk.ru', '2023-11-12 13:25:40', '2023-11-12 13:25:40', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int NOT NULL DEFAULT '2',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `shipping_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `email`, `email_verified_at`, `shipping_user`, `phone_user`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Admin', 1, 'admin@gmail.com', NULL, 'wd-asha@bk.ru', '89043000734', '$2y$10$7YldyKhi3YNG6zg6mDeQJejrwSb4dj.cee2XM2va8x3wgdPFPdram', 'RKPFCKyUjK9zAUMI3vzy0XBEK8KHff0QYcwOZ8O5esbVzmuv6xlRfmQ5DdWI', '2023-11-03 10:11:08', '2023-11-07 01:51:49', NULL),
(4, 'Author', 2, 'author@gmail.com', NULL, NULL, NULL, '$2y$10$U7SOC4Z/HL5d3hQhrVv8Jeoxtxx4Paas/duVElD.KGNieLQ2ryDYi', NULL, '2023-11-03 10:11:08', NULL, NULL),
(5, 'Михаил', 2, 'szn-asha@bk.ru', NULL, 'Челябинская обл., Аша, Ленина, 48-60', '89043000734', '$2y$10$DLiLif4PRrz1EP1fN8wcR.r7IAgjw.0KrcrNmioOU0aM5nza7ZZcG', NULL, '2023-11-08 03:50:41', '2023-11-08 04:05:09', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departure_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `departures`
--
ALTER TABLE `departures`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `departures`
--
ALTER TABLE `departures`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

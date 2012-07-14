-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 05, 2012 at 01:34 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `tsl`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(2500) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `date_published` datetime NOT NULL,
  `slug` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `featured_image` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `articles`
--


-- --------------------------------------------------------

--
-- Table structure for table `articles_categories`
--

CREATE TABLE IF NOT EXISTS `articles_categories` (
  `articles_categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `articles_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  PRIMARY KEY (`articles_categories_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `articles_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `calendar_events`
--


CREATE TABLE IF NOT EXISTS `calendar_events` (
  `calendar_events_id` int(11) NOT NULL AUTO_INCREMENT,
  `date_created` datetime NOT NULL,
  `date_happen` datetime NOT NULL,
  `calendar_link` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `event_categories_id` int(11) NOT NULL,
  PRIMARY KEY (`calendar_events_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `calendar_events`
--

INSERT INTO `calendar_events` (`calendar_events_id`, `date_created`, `date_happen`, `calendar_link`, `event_categories_id`) VALUES
(1, '2012-07-06 02:44:06', '2012-07-04 00:00:00', 'http://google.com', 4),
(2, '2012-07-07 01:52:21', '2012-07-09 00:00:00', 'http://facebook.com', 2),
(3, '2012-07-07 14:20:58', '2012-07-28 14:21:04', 'http://twitter.com', 2),
(4, '2012-07-07 00:00:00', '2012-07-10 00:00:00', 'http://time.mk', 1),
(5, '2012-07-07 00:00:00', '2012-07-11 00:00:00', 'http://time.mk', 2),
(6, '2012-07-07 00:00:00', '2012-07-12 00:00:00', 'http://time.mk', 3),
(7, '2012-07-07 00:00:00', '2012-07-15 00:00:00', 'http://time.mk', 4),
(8, '2012-07-07 00:00:00', '2012-07-23 00:00:00', 'http://time.mk', 5),
(9, '2012-07-07 00:00:00', '2012-07-24 00:00:00', 'http://time.mk', 6),
(10, '2012-07-07 00:00:00', '2012-08-01 00:00:00', 'http://time.mk', 7),
(11, '2012-07-07 00:00:00', '2012-08-04 00:00:00', 'http://time.mk', 8),
(12, '2012-07-07 00:00:00', '2012-08-06 00:00:00', 'http://time.mk', 9),
(13, '2012-07-07 00:00:00', '2012-08-11 00:00:00', 'http://time.mk', 10),
(14, '2012-07-07 00:00:00', '2012-08-20 00:00:00', 'http://time.mk', 11);


-- --------------------------------------------------------

--
-- Table structure for table `calendar_events_categories`
--

CREATE TABLE IF NOT EXISTS `calendar_events_categories` (
  `calendar_events_categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `color_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`calendar_events_categories_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `calendar_events_categories`
--

INSERT INTO `calendar_events_categories` (`calendar_events_categories_id`, `name`, `color`, `slug`, `color_name`) VALUES
(1, 'Услуга кон клиентите', '#868686', 'usluga-kon-klientite', 'siva'),
(2, 'Продажни вештини', '#ef1d1d', 'prodazni-vestini', 'crvena'),
(3, 'Маркетинг и PR', '#edb7b7', 'marketing-i-pr', 'rozeva'),
(4, 'Менаџмент', '#7771ee', 'management', 'svetlo plava'),
(5, 'Човечки ресурси', '#d7ed1f', 'covecki-resursi', 'zolta'),
(6, 'Финансии', '#ab348b', 'finansii', 'violetova'),
(7, 'Производство и дистрибуција', '#2ada74', 'proizvodstvo-i-distribucija', 'svetlo zelena'),
(8, 'Деловни вештини', '#eca72f', 'delovni-vestini', 'portokalova'),
(9, 'Тим билдинг', '#10125f', 'tim-bilding', 'teget'),
(10, 'Конференции', '#186752', 'konferencii', 'temno zelena'),
(11, 'Експертски академии', '#000000', 'ekspertski-akademii', 'crna');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`categories_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `name`, `slug`) VALUES
(1, 'Новости', 'novosti'),
(2, 'Speakers', 'speakers'),
(3, 'Learning', 'learning'),
(4, 'Recruitment', 'recruitment'),
(5, 'Consulting', 'consulting'),
(6, 'Експертски академии', 'ekspertski-akademii'),
(7, 'Тренери', 'treneri');


CREATE TABLE IF NOT EXISTS `slides` (
  `slides_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(2500) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(2500) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `order_index` int(11) NOT NULL,
  PRIMARY KEY (`slides_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

INSERT INTO `slides` (`slides_id`, `title`, `description`, `link`, `image`, `date_created`, `order_index`) VALUES
(2, 'Добредојдовте', '<p>      Можете да се надевате на успех, a можете и да                          се обучите за успех.</p>                                          <p>                         Triple S Learning - брзи, интезивни тренинг                      програми дизајнирани за Вашиот успех...</p>', '#', 'slider1.jpg', '2012-07-08 12:44:02', 1),
(3, 'This image is wrapped in a link!', 'This image is wrapped in a link!', '#', 'slider2.jpg', '2012-07-08 12:44:31', 2),
(4, 'This image is wrapped in a link!', 'This image is wrapped in a link!', '#', 'slider3.jpg', '2012-07-08 12:44:56', 3),
(5, 'This image is wrapped in a link!', 'This image is wrapped in a link!', '#', 'slider4.jpg', '2012-07-08 12:45:17', 4);







CREATE TABLE IF NOT EXISTS `galleries` (
  `id_gallery` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_group_id` int(10) NOT NULL,
  `description` varchar(1020) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id_gallery`),
  KEY `gallery_group_id` (`gallery_group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id_gallery`, `gallery_group_id`, `description`, `date_created`) VALUES
(1, 3, 'Brian Tracy (Ноември, 2007)', '2012-07-08 17:17:55'),
(3, 2, 'Доделување на\r\nсертификати (Март, 2011)', '2012-07-08 14:41:14'),
(7, 3, 'Brian Tracy (Ноември, 2007)', '2012-07-08 16:08:00'),
(9, 1, 'blab lab al', '2012-07-08 17:31:30'),
(10, 1, 'vtora', '2012-07-08 17:31:50'),
(11, 1, 'treta', '2012-07-08 17:31:55'),
(12, 1, 'cetvrta', '2012-07-08 17:32:01'),
(13, 1, 'peta', '2012-07-08 17:32:06');



CREATE TABLE IF NOT EXISTS `gallery_photos` (
  `id_gallery_photos` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `galleries_id_gallery` int(10) unsigned NOT NULL,
  `image` varchar(510) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id_gallery_photos`,`galleries_id_gallery`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `gallery_photos`
--

INSERT INTO `gallery_photos` (`id_gallery_photos`, `galleries_id_gallery`, `image`, `description`, `date_created`) VALUES
(1, 1, 'b-01.jpg', 'Регистрација на гости', '2012-07-08 00:00:00'),
(3, 1, 'b-02.jpg', 'REgistracija', '2012-07-08 00:00:00'),
(4, 3, 't-01.jpg', 'Отворање на настанот', '2012-07-08 00:00:00'),
(5, 7, 't-04.jpg', 'Отворање на настанот', '2012-07-08 00:00:00'),
(6, 7, 'b-02.jpg', 'test image ', '2012-07-08 00:00:00'),
(7, 7, 'b-02.jpg', 'test image ', '2012-07-08 00:00:00'),
(8, 7, 'b-02.jpg', 'test image ', '2012-07-08 00:00:00'),
(9, 7, 'b-02.jpg', 'test image ', '2012-07-08 00:00:00'),
(10, 7, 'b-02.jpg', 'test image ', '2012-07-08 00:00:00'),
(11, 7, 'b-02.jpg', 'test image ', '2012-07-08 00:00:00'),
(12, 7, 'b-02.jpg', 'test image ', '2012-07-08 00:00:00'),
(13, 7, 'b-02.jpg', 'test image ', '2012-07-08 00:00:00'),
(14, 7, 'b-02.jpg', 'test image ', '2012-07-08 00:00:00'),
(15, 9, 'b-02.jpg', 'test image ', '2012-07-08 00:00:00'),
(16, 9, 'b-02.jpg', 'test image ', '2012-07-08 00:00:00'),
(17, 10, 'b-02.jpg', 'test image ', '2012-07-08 00:00:00'),
(18, 10, 'b-02.jpg', 'test image ', '2012-07-08 00:00:00'),
(19, 10, 'b-02.jpg', 'test image ', '2012-07-08 00:00:00'),
(20, 10, 'b-02.jpg', 'test image ', '2012-07-08 00:00:00'),
(21, 10, 'b-02.jpg', 'test image ', '2012-07-08 00:00:00'),
(22, 10, 'b-02.jpg', 'test image ', '2012-07-08 00:00:00'),
(23, 10, 'b-02.jpg', 'test image ', '2012-07-08 00:00:00'),
(24, 11, 'b-02.jpg', 'test image ', '2012-07-08 00:00:00'),
(25, 12, 'b-02.jpg', 'test image ', '2012-07-08 00:00:00'),
(26, 12, 'b-02.jpg', 'test image ', '2012-07-08 00:00:00'),
(27, 13, 'b-02.jpg', 'test image ', '2012-07-08 00:00:00');



CREATE TABLE IF NOT EXISTS `gallery_groups` (
  `id_gallery_group` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id_gallery_group`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `gallery_groups`
--

INSERT INTO `gallery_groups` (`id_gallery_group`, `name`, `date_created`) VALUES
(1, 'TRIPLE S GROUP', '2012-07-08 00:00:00'),
(2, 'ОБУКИ', '2012-07-08 00:00:00'),
(3, 'КОНФЕРЕНЦИИ', '2012-07-08 00:00:00');



CREATE TABLE IF NOT EXISTS `quotes` (
  `quotes_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`quotes_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`quotes_id`, `description`, `author`, `date_created`) VALUES
(1, 'It''s not the strongest of the species that survives, nor the most intelligent, but the one most responsive to change', 'Charles Darwin', '2012-07-10 22:54:25'),
(2, 'Obstacles are those frightful things you see when you take your eyes off your goal', 'Henry Ford', '2012-07-10 22:56:10'),
(3, 'Time stays long enough for anyone who will use it', 'Leonardo Da Vinci', '2012-07-10 22:56:47'),
(4, 'We all have possibilities we don''t know about. We can do things we don''t even dream we can do', 'Dale Carnegie', '2012-07-10 22:59:14'),
(5, 'Make measurable progress in reasonable time.', 'Jim Rohn', '2012-07-10 23:00:37'),
(7, 'The best way to sell yourself to others is first to sell the others to yourself.', 'Napoleon Hill', '2012-07-10 23:00:58'),
(8, 'Invest three percent of your income in yourself (self-development) in order to guarantee your future', 'Brian Tracy', '2012-07-10 23:04:01');



CREATE TABLE IF NOT EXISTS `clients` (
  `clients_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`clients_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clients_id`, `name`, `image`, `link`, `date_created`) VALUES
(1, 'T-mobile', 't-mobile.png', '#', '2012-07-11 01:22:27'),
(2, 'T-home', 't-home.png', '#', '2012-07-11 01:22:56'),
(3, 'One', 'one.png', '#', '2012-07-11 01:23:24'),
(4, 'VIP', 'vip.png', '#', '2012-07-11 01:23:57'),
(5, 'NLB Тутунска банка', 'NLB-Tutunska-banka.png', '#', '2012-07-11 01:24:56'),
(6, 'Охридска Банка', 'Ohridska-banka.png', '#', '2012-07-11 01:25:35'),
(7, 'ProCredit Банка', 'Pro-Credit-banka.png', '#', '2012-07-11 01:26:02'),
(8, 'ТТК Банка', 'TTK-banka.png', '#', '2012-07-11 01:26:29'),
(9, 'Moжности', 'moznosti.png', '#', '2012-07-11 01:26:54'),
(10, 'QBE', 'QBE.png', '#', '2012-07-11 01:29:02'),
(11, 'Eurolink', 'eurolink.png', '#', '2012-07-11 01:30:03'),
(12, 'Hypo Alpe Adria', 'Hypo-Alpe-Adria.png', '#', '2012-07-11 01:30:27'),
(13, 'eurostandard банка', 'eurostandard-banka.png', '#', '2012-07-11 01:30:56'),
(14, 'Automobile-Sk', 'Automobile-SK.png', '#', '2012-07-11 01:31:25'),
(15, 'Avtonova Citroen', 'Avtonova-Citroen.png', '#', '2012-07-11 01:31:49'),
(16, 'Ka-Dis', 'Ka-Dis-seat.png', '#', '2012-07-11 01:33:28'),
(17, 'dalmet-fu', 'Dal-Met-Fu.png', '#', '2012-07-11 01:33:45'),
(18, 'Blue Cafe`', 'BlueCafe.png', '#', '2012-07-11 01:34:20'),
(19, 'papu', 'Papu.png', '#', '2012-07-11 01:34:43'),
(20, 'Форца', 'Forza.png', '#', '2012-07-11 01:35:02'),
(21, 'Ресторан 14', 'restoran-14.png', '#', '2012-07-11 01:35:55'),
(22, 'Ресторан Лира', 'Lira-restoran.png', '#', '2012-07-11 01:36:15'),
(23, 'World Learning', 'World-Learning.png', '#', '2012-07-11 01:36:37'),
(24, 'Национална Агенција', 'Nacionalna-agencija.png', '#', '2012-07-11 01:37:02'),
(25, 'Катастар', 'Katastar.png', '#', '2012-07-11 01:37:25'),
(26, 'Glaxo-Smith-Kline', 'Glaxo-Smith-Kline.png', '#', '2012-07-11 01:38:09'),
(27, 'Филип Втори', 'Filip-Vtori.png', '#', '2012-07-11 01:38:38'),
(28, 'Д-р Пановски', 'Dr-Panovski.png', '#', '2012-07-11 01:39:54'),
(29, 'Натусана', 'Natusana.png', '#', '2012-07-11 01:40:17'),
(30, 'belupo', 'belupo.png', '#', '2012-07-11 01:40:49');





--
-- Table structure for table `menu_items`
--

CREATE TABLE IF NOT EXISTS `menu_items` (
  `menu_items_id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `date_created` datetime NOT NULL,
  `order_index` int(11) NOT NULL,
  `depth_level` int(11) NOT NULL,
  PRIMARY KEY (`menu_items_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`menu_items_id`, `text`, `link`, `parent_id`, `date_created`, `order_index`, `depth_level`) VALUES
(1, 'За нас', 'articles/51-za-nas', 0, '2012-07-12 11:24:14', 100, 0),
(2, 'Learning', 'category/3-learning', 0, '2012-07-12 11:26:02', 200, 0),
(3, 'Speakers', 'category/2-speakers', 0, '2012-07-12 11:27:33', 300, 0),
(4, 'Speaker 1', 'articles/52-speaker-1', 3, '2012-07-12 11:31:22', 301, 1),
(5, 'Speaker 2', 'articles/53-speaker-2', 4, '2012-07-12 11:31:40', 302, 2);
(26, 'Експертски академии', 'category/6-ekspertski-akademii', 0, '2012-07-14 09:32:15', 600, 0),
(27, 'Тренери', 'category/7-treneri', 0, '2012-07-14 09:32:34', 700, 0),
(24, 'Recruitment', 'category/4-recruitment', 0, '2012-07-14 09:31:19', 400, 0),
(25, 'Consulting', 'category/5-consulting', 0, '2012-07-14 09:31:47', 500, 0),
(28, 'Галерија', 'gallery', 0, '2012-07-14 09:35:47', 800, 0),
(29, 'Новости', 'category/1-novosti', 0, '2012-07-14 09:36:16', 900, 0),
(30, 'Референци', 'articles/54-referenci', 0, '2012-07-14 09:37:59', 1000, 0);



INSERT INTO `articles` (`id`, `title`, `description`, `content`, `date_created`, `date_published`, `slug`, `featured_image`, `status`) VALUES 
(54, 'Референци', 'Краток преглед на сите референци', '<p>Овде ќе бидат ставени референците</p>', '2012-07-14 09:42:41', '2012-07-14 09:37:00', 'referenci', 'default_featured_image.jpg', 1),
(52, 'Speaker 1', 'Статија за Speaker 1', '<p>Ова е статија за Speaker 1</p>', '2012-07-12 11:31:42', '2012-07-12 11:29:00', 'speaker-1', 'default_featured_image.jpg', 1),
(53, 'Speaker 2', 'Статија за Speaker 2	', '<p>Статија за Speaker 2</p>', '2012-07-12 11:36:47', '2012-07-12 11:35:00', 'speaker-2', 'default_featured_image.jpg', 1);




CREATE TABLE IF NOT EXISTS `sidebar` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `content` text COLLATE utf8_bin,
  `position` int(10) unsigned DEFAULT NULL,
  `is_deletable` int(10) unsigned DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sidebar`
--

INSERT INTO `sidebar` (`id`, `name`, `content`, `position`, `is_deletable`, `type`) VALUES
(1, 'calendar', 'elements/calendar', 0, 0, 'view'),
(2, 'quotes', 'elements/quotes', 1, 0, 'view'),
(3, 'success_pages', '<a href="#">\r\n        <img alt="" style="float: left;margin-right: 10px;" src="<?php echo base_url().''images/tick.png''; ?>" />    <h3 style="float: left;margin-top: 5px;">Страници на успех</h3>\r\n    </a>', 2, 0, 'content'),
(4, 'social links', '<h3>Следи не:</h3>\r\n        <a target="_balnk" href="http://www.facebook.com//login.php#!/pages/Triple-S-Learning/321852101858?ref=ts"><img alt="" src="<?php echo base_url().''images/icon-facebook.png''; ?>" /></a>\r\n        <a target="_balnk" href="http://www.linkedin.com/in/tripleslearning"><img alt="" src="<?php echo base_url().''images/icon-linkedin.png''; ?>" /></a>\r\n        <a target="_balnk" href="http://twitter.com/TripleSGroup"><img alt="" src="<?php echo base_url().''images/icon-twitter.png''; ?>" /></a>\r\n        <a target="_balnk" href="http://www.youtube.com/user/TripleSLearning"><img alt="" src="<?php echo base_url().''images/icon-youtube.png''; ?>" /></a>\r\n        <a target="_balnk" href="#"><img alt="" src="<?php echo base_url().''images/icon-rss.png''; ?>" /></a>\r\n', 3, 0, 'content');



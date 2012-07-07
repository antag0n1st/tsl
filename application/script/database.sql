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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `calendar_events`
--


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
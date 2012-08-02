-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 02, 2012 at 02:36 PM
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
  PRIMARY KEY (`id`),
  FULLTEXT KEY `title_2` (`title`),
  FULLTEXT KEY `description` (`description`),
  FULLTEXT KEY `content` (`content`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=71 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `content`, `date_created`, `date_published`, `slug`, `featured_image`, `status`) VALUES
(51, 'За нас', 'Ова ќе биде страницата за нас', '<p><strong>Triple S Learning<br /><br /></strong>Triple S Learning е прв и единствен специјализиран тренинг центар во Македонија во областите на продажба, услуга и успех. Знаењето и методологијата кои се содржани во тренинг програмите, кои ги користат и светските лидерски компании, ги издвојува Triple S Learning како единствени и иновативни во современите услови на работење.<br />Тренинг програмите на Triple S Learning се персонализираат и приспособуваат на бизнис потребите на секој клиент. Обезбедуваат насоки, вештини и одговори за секојдневните ситуации, интеракции, можности, проблеми и предизвици на вработените.<br />Triple S Learning е компанија која успешно делува и во Србија, Хрватска и Словенија, каде се вбројува меѓу првите во индустријата на обуки, чии клиенти се најдобриите компании, кои нешто значат на пазарот.<strong><br />&nbsp;<br /><br />Визија<br /></strong>Triple S Learning ќе <strong>иницира промени и развој на луѓето, нивните компании и квалитетот на животот</strong> преку дизајнирање на современи тренинг програми и пренесување на технологиите на работење на светски најуспешните компании и поединци.<br /><br /><strong>Мисија</strong><br />Да обезбедуваме информации и одговори од реалниот свет кои лесно се применуваат во практиката и се претвораат во пари.<br /><br /><strong>Принципи</strong><br />Вработените на Triple S Learning ќе живеат според принципите содржани во тренинг програмите. Инкорпорирањето на филозофијата на тренинг програмите во секојдневното работење ќе допринесе за остварување на долгорочните цели.&nbsp;</p>', '2012-07-19 09:55:50', '2012-07-12 11:22:00', 'za-nas', 'default_featured_image.jpg', 1),
(54, 'Референци', 'Краток преглед на сите референци на Triple S Learning', '<p>Oвде ќе бидат ставени референците</p>', '2012-07-15 17:14:36', '2012-07-14 09:37:00', 'referenci', 'default_featured_image.jpg', 1),
(52, 'Brian Tracy', 'Ова е статија за Brian Tracy', '<p>Ова е статија за Brian Tracy</p>', '2012-07-28 13:39:08', '2012-07-12 11:29:00', 'brian-tracy', 'default_featured_image.jpg', 1),
(42, 'БРЕНД МАРКЕТИНГ', 'Научете што е бренд маркетинг!', '<p>Брендот претставува едно од највредните средства што го поседува секоја компанија. Во последно време, кога производствените и другите организациски процеси лесно се копираат, брендот претставува единствена алатка која тешко се копира, а која креира нови можности и успешна диференцијација на компаниите. Современото пазарно окружување станува се покомплексно и добрите стари маркетинг техники не се повеќе ефективни.<br /><br />Оваа дводневна обука за брендирање и бренд менаџмент ќе ви овозможи да ја запознаете суштината на брендирањето и кои се критичните точки при градење успешен бренд во модерно време. Ќе ви помогне детално да ги осознаете сите етапи во процесот на градење на бренд и ќе ве научи како самите успешно да одлучувате и управувате со нив. Низ обуката се интегрирани најдобрите практични совети од светски познатите, но и локални брендови, кои ќе ве инспирираат да правите подобри бренд стратегии и ќе ви откријат како истите успешно да ги имплементирате.<br /><br /><strong>&nbsp;Дел од она што ќе го научат учесниците</strong>:</p>\n<ul>\n<li>Вовед во бренд маркетинг и брендирање</li>\n<li>Суштина на брендирањето</li>\n<li>Принципи за бренд супериорност</li>\n<li>Чекор по чекор, процес за градење на бренд</li>\n<li>Идентификување на брендотсо Име, Лого, Слоган</li>\n</ul>\n<div>Контактирајте н&egrave; за дополнителни информации за изведба на обуката ..</div>', '2012-07-22 20:49:08', '2012-07-22 12:30:00', 'brend-marketing', 'brand_marketing.jpg', 1),
(53, 'Jay Conrad Levinson', 'Статија за Jay Conrad Levinson', '<p>Статија за Jay Conrad Levinson</p>', '2012-07-18 21:19:58', '2012-07-12 11:35:00', 'jay-conrad-levinson', 'default_featured_image.jpg', 1),
(46, 'ГЕРИЛА МАРКЕТИНГ И ПРОДАЖБА', 'Револуционерниот систем на герила пристапот Ви го опишува арсеналот на оружја за маркетинг и продажба, во форма на обука која Ви ги открива моќните тајни на маркетингот', '<p>Револуционерниот систем на герила пристапот Ви го опишува арсеналот на оружја за маркетинг и продажба, во форма на обука која Ви ги открива моќните тајни на маркетингот и продажбата во нивна практична форма.Конкуренцијата веќе се бори да превземе што е можно повеќе клиенти. Возвратете со Герила маркетинг и продажба. Дајте му на Вашиот тим неконвенционални стратегии и тактики кои се креативни, проверени и недвосмислено ефективни.<br /><br /><strong>Дел од она што ќе го научат учесниците:</strong><br /><br /></p>\r\n<ul>\r\n<li>&bdquo;Оружјата&ldquo; на герила маркетингот</li>\r\n<li>Герила маркетинг план</li>\r\n<li>Герила адвертајзинг</li>\r\n<li>Герила маркетинг стратегија</li>\r\n</ul>\r\n<div><strong>Цели и придобивки од тренинг програмата:<br /><br /></strong>\r\n<ul>\r\n<li>Осознавање и градење на маркетиншкиот идентитет на производ</li>\r\n<li>Откривање на најдобрите начини за промовирање</li>\r\n<li>Развивање на способност за употреба на 100-те герила маркетинг оружја</li>\r\n<li>Развивање и употреба на комплементарен систем на продажба - герила продажба</li>\r\n</ul>\r\n<div><br /><br /></div>\r\n</div>', '2012-07-07 20:21:06', '2012-07-07 20:17:00', 'gerila-marketing-i-prodazhba', 'guerilla_marketing.jpg', 1),
(47, 'TSL CONFERENCE', 'Иновативни стратегии за раст и профит во услови на рецесија – како да се зголеми профитот во услови на глобална економска криза', '<p><strong>Иновативни стратегии за раст и профит во услови на рецесија &ndash; како да се зголеми профитот во услови на глобална економска криза<br /></strong><br />Авторот на бизнис бестселерот &bdquo;Иновација до корен&ldquo; и водечкиот експерт за бизнис иновација, г-динот Rowan Gibson пред македонската бизнис елита ги презентираше своите решенија и идеи како да се надмине рецесијата и уште повеќе, како да се профитра во услови на глобална економска криза.<br /><br />Неговото општопризнаено искуство во оваа тема и експертизата во полето на бизнис иновации се веќе успешно докажани преку работата на г-динот Gibson со многу Fortune 500 компании. Македонската бизнис елита имаше непроценлива шанса да слушне многу практични совети, идеи и решенија уникатни по својата лесна применливост во секој бизнис сектор и во секаква бизнис клима. Ова искуство беше збогатено со можноста посетителите на оваа конференција да му поставуваат директни прашања на г-динот Gibson.<br /><br />Трите сесии на конференцијата беа дизајнирани да го пружат оптималниот бизнис пакет како да се справиме со глобалната економска криза: целосен увид во стратегиите за победа во тешки економски времиња, иновација до корен: како да се претвори компанијата во лидер за иновации и со тоа да се зголеми продажбата во тековните економски трендови.<br /><br />&nbsp;Елитната бизнис конференција го привлече вниманието и на медиумите, кои ја обележаа како &bdquo;најдоброто решение за македонските бизнисмени во услови на рецесија&ldquo;, истакнувајќи ја по бројот на споделени корисни и лесно применливи примери и искуства кои треба да ја збогатат и македонската бизнис заедница.<br /><br />Г-динот Гибсон ја започна конференцијата со следнта реченица: &bdquo;Во секоја економија постојат моменти на криза во продажбата или финансиски турболенции. Ќе ви покажам дека дури и економски најтешките времиња можат да претставуваат одлична шанса за напредок на вашиот бизнис и потиснување на конкуренцијата.&ldquo; Презентирајќи го неговиот бизнис изум &bdquo;Четирите леќи на иновацијата&ldquo; (предизвикување на втемелените обичаи, применување на трендовите, мерење на способностите и адресирање на недопрените потреби) г-динот Gibson ја инспирираше публиката да &bdquo;Бидете победници на 21-от век, и дури и во економски најтешките времиња бидете отворени за промени, постојано редефинирајте ја вашата индустрија, создавајте нови пазари, едноставно кажано: постојано предизвикувајте ја позицијата на статус кво.&ldquo;<br /><br />&nbsp;Освен во Скопје, г-динот Gibson гостуваше и во Белград (2 јуни) исто така во организација на локалното претставништво на Triple S Learning.<br /><br />Им благодариме на сите кои покажаа интерес и беа дел од Конференцијата. Им благодариме на сите кои остварувајќи ја својата Визија се дел од нашата Визија - да внесеме позитивна промена во начинот на деловното работење и живеење.<br /><br />Ве очекуваме на гостувањето на нови атрактивни говорници и познати светски гуруа од светот на бизнисот кои следат.<br /><br /><strong>Продолжуваме понатаму - заедно...</strong><br />&nbsp;</p>', '2012-07-21 13:20:13', '2012-07-07 20:21:00', 'tdzl-conference', 'rowan_gibson.jpg', 1),
(61, 'onaka', 'Краток опис', '<p>Објавете нова статија<br /><br /><img src="/tsl/public/uploaded/uspeh.jpg" alt="gdfg" width="400" height="300" />fdslfsdfsdfsdfsdfsfl;<br /><br /><img src="/tsl/public/uploaded/clients/t-home.png" alt="fdgfd" width="110" height="25" /><strong>Македонски Телеком АД-Скопје</strong>&nbsp;<br />Национален оператор за електронски комуникации<br /><br />&nbsp;</p>', '2012-07-22 21:40:49', '2012-07-21 16:58:00', 'onaka', 'default_featured_image.jpg', 1),
(64, 'Наслов на статијата', 'Краток опис', '<p><br />Текст на статијата</p>', '2012-07-24 08:22:34', '1970-01-01 01:00:00', 'naslov-na-statijata', 'default_featured_image.jpg', 1),
(66, 'Statija vo Speakers', 'Statija vo Speakers', '<p>Објавете нова статија</p>', '2012-07-28 13:50:20', '2012-07-28 13:42:00', 'statija-vo-speakers', 'default_featured_image.jpg', 1),
(67, 'Statija vo Learning', 'Statija vo Learning', '<p>Објавете нова статија</p>', '2012-07-28 13:50:12', '2012-07-28 13:44:00', 'statija-vo-learning', 'default_featured_image.jpg', 1),
(68, 'Statija vo Recruitment', 'Statija vo Recruitment', '<p>Објавете нова статија<br /> <iframe src="http://www.youtube.com/embed/BckjLxWjRAU" frameborder="0" width="560" height="315"></iframe><br /><br /><br /><img src="/tsl/public/uploaded/uspeh.jpg" /></p>', '2012-07-28 14:46:59', '2012-07-28 13:46:00', 'statija-vo-recruitment', 'default_featured_image.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `articles_categories`
--

CREATE TABLE IF NOT EXISTS `articles_categories` (
  `articles_categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `articles_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  PRIMARY KEY (`articles_categories_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=233 ;

--
-- Dumping data for table `articles_categories`
--

INSERT INTO `articles_categories` (`articles_categories_id`, `articles_id`, `categories_id`) VALUES
(184, 66, 1),
(182, 67, 1),
(232, 68, 1),
(231, 68, 4),
(181, 67, 3),
(183, 66, 2),
(174, 64, 1),
(60, 39, 4),
(59, 39, 3),
(66, 41, 5),
(65, 41, 4),
(64, 41, 3),
(149, 42, 1),
(175, 52, 2),
(122, 53, 2),
(81, 46, 1),
(125, 47, 1);

-- --------------------------------------------------------

--
-- Table structure for table `calendar_events`
--

CREATE TABLE IF NOT EXISTS `calendar_events` (
  `calendar_events_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(2500) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `date_happen` datetime NOT NULL,
  `calendar_link` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `event_categories_id` int(11) NOT NULL,
  `candidates_num` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`calendar_events_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `calendar_events`
--

INSERT INTO `calendar_events` (`calendar_events_id`, `title`, `date_created`, `date_happen`, `calendar_link`, `event_categories_id`, `candidates_num`) VALUES
(2, 'title', '2012-07-07 01:52:21', '2012-07-09 00:00:00', 'http://facebook.com', 2, 0),
(5, 'title', '2012-07-23 21:43:35', '2012-07-24 02:20:00', 'http://movies.mk', 4, 0),
(6, 'title', '2012-07-07 15:54:06', '2012-07-03 00:00:00', 'http://times.com', 1, 0),
(7, 'title', '2012-08-02 13:16:29', '2002-08-02 12:00:00', 'http://google.com', 2, 0),
(8, 'Настанот во септември', '2012-07-22 09:27:10', '2012-09-08 00:00:00', 'http://google.com', 10, 1),
(9, 'title', '2012-07-07 17:18:42', '2004-07-20 12:00:00', 'http://movies.mk', 10, 0),
(10, 'title', '2012-07-07 17:29:47', '2007-07-20 12:00:00', 'http://times.com', 5, 0),
(11, 'title', '2012-07-09 21:49:18', '2012-07-07 17:31:00', 'http://movies.mk', 11, 0),
(12, 'title', '2012-07-09 21:49:25', '2012-07-07 17:43:00', 'http://google.com', 1, 0),
(14, 'title', '2012-07-07 18:03:30', '2012-07-10 17:53:00', 'http://google.com', 1, 0),
(15, 'title', '2012-07-07 18:05:28', '2012-07-07 18:20:00', 'http://tsl.mk', 1, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

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
(8, 'Деловни вештини', '#eca72f', 'delovni-veshtini', 'portokalova'),
(9, 'Тим билдинг', '#10125f', 'tim-bilding', 'teget'),
(10, 'Конференции', '#186752', 'konferencii', 'temno zelena'),
(11, 'Експертски академии', '#000000', 'ekspertski-akademii', 'crna'),
(17, 'kategorija taa e taa', '#abc000', 'kategorija-taa-e-taa', 'crna');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE IF NOT EXISTS `candidates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profession` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_id` int(10) unsigned NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `candidates_ix` (`event_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `phone`, `email`, `profession`, `company`, `event_id`, `comment`, `date_created`) VALUES
(10, 'Vladimir Apostolski', '070 123 456', 'vladimir.apostolski@gmail.com', 'Profesionalec', 'Google', 8, 'sdfgfdg;fdlgfdg gldfdlkg fgl;fdg kdg;ld gdfl;gfdg;l dg gdfdfg dfkg; gdkf;lgfdl;gdf;gl d;g;dkg ;dkfg', '2012-07-22 12:29:58');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `featured_image` varchar(2500) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(2500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`categories_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `name`, `description`, `slug`, `featured_image`, `logo`) VALUES
(1, 'Новости', '', 'novosti', 'default_featured_image.jpg', 'logo.png'),
(2, 'Speakers', '', 'speakers', 'triple-s-speakers.jpg', 'logo-speakers.jpg'),
(3, 'Learning', '<p>Opis</p>', 'learning', 'triple-s-learning.jpg', 'logo-learning.jpg'),
(4, 'Recruitment', '', 'recruitment', 'triple-s-recruitment.jpg', 'logo-recruitment.jpg'),
(5, 'Consulting', '', 'consulting', 'default_featured_image.jpg', 'logo.png'),
(6, 'Експертски академии', '', 'ekspertski-akademii', 'default_featured_image.jpg', 'logo.png'),
(7, 'Тренери', '', 'treneri', 'default_featured_image.jpg', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `clients_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`clients_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

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
(31, 'belupo', 'belupo.png', '#', '2012-07-28 13:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `is_unsubscribed` tinyint(4) NOT NULL DEFAULT '0',
  `unsubscribe_id` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_uq` (`email`),
  KEY `emails_unsubscribe_id_idx` (`unsubscribe_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=18 ;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `email`, `created_at`, `is_unsubscribed`, `unsubscribe_id`) VALUES
(1, 'trbogazov1@gmail.com', '2012-07-15 00:00:00', 0, 'db2487bb-d31f-11e1-895c-0019dbf8832c'),
(2, 'vladimir@gmail.com', '2012-07-15 00:00:00', 0, 'db24926f-d31f-11e1-895c-0019dbf8832c'),
(3, 'tsl@gmail.com', '2012-07-15 00:00:00', 0, 'db249430-d31f-11e1-895c-0019dbf8832c'),
(4, 'farytail@gmail.com', '2012-07-15 00:00:00', 0, 'db2495ce-d31f-11e1-895c-0019dbf8832c'),
(5, 'sample@yahoo.com', '2012-07-15 00:00:00', 0, 'db24975c-d31f-11e1-895c-0019dbf8832c'),
(6, 'nemo@yahoo.com', '2012-07-15 00:00:00', 0, 'db2498eb-d31f-11e1-895c-0019dbf8832c'),
(7, 'jet-fly@yahoo.com', '2012-07-15 00:00:00', 0, 'db249a76-d31f-11e1-895c-0019dbf8832c'),
(8, 'panda@hotmal.com', '2012-07-15 00:00:00', 0, 'db249c01-d31f-11e1-895c-0019dbf8832c'),
(16, 'vladimir.apostolski@gmail.com', '2012-07-24 09:17:39', 0, '09e55b42-d569-11e1-a080-f486bf2ea9c3');

-- --------------------------------------------------------

--
-- Table structure for table `emails_sent`
--

CREATE TABLE IF NOT EXISTS `emails_sent` (
  `newsletter_id` smallint(5) unsigned NOT NULL,
  `email_id` smallint(5) unsigned NOT NULL,
  `date_sent` timestamp NULL DEFAULT NULL,
  KEY `email_ix` (`email_id`),
  KEY `newsletter_ix` (`newsletter_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `emails_sent`
--

INSERT INTO `emails_sent` (`newsletter_id`, `email_id`, `date_sent`) VALUES
(4, 1, '2012-07-24 09:21:58'),
(4, 2, '2012-07-24 09:22:09'),
(4, 3, '2012-07-24 09:22:20'),
(4, 4, '2012-07-24 09:22:31'),
(4, 5, '2012-07-24 09:22:42'),
(4, 6, '2012-07-24 09:22:54'),
(4, 7, '2012-07-24 09:23:05'),
(4, 8, '2012-07-24 09:23:16'),
(4, 16, '2012-07-24 09:23:27'),
(3, 1, '2012-07-24 09:28:13'),
(3, 2, '2012-07-24 09:28:24'),
(3, 3, '2012-07-24 09:28:35'),
(3, 4, '2012-07-24 09:28:46'),
(3, 5, '2012-07-24 09:28:57'),
(3, 6, '2012-07-24 09:29:09'),
(3, 7, '2012-07-24 09:29:20'),
(3, 8, '2012-07-24 09:29:31'),
(3, 16, '2012-07-24 09:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE IF NOT EXISTS `footer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id`, `content`) VALUES
(1, '<div class="left" style="background-image: none;">\r\n<h3 style="color: white;">Контакт</h3>\r\n<p>Доколку не можете да го пронајдете тоа што Ве интересира или имате дополнително прашање, контактирајте н&egrave; на:</p>\r\n<br />\r\n<div style="float: left; width: 50%; margin: 0px;">\r\n<p><strong>Triple S Group doo</strong> <br /> Ул. Орце Николов бр. 190-3/5 <br /> 1000 Скопје, <br /> Р.Македонија</p>\r\n</div>\r\n<div style="float: left; width: 50%; margin: 0px;">\r\n<p><strong>тел.:</strong> 02/ 3 112 048 <br /> <strong>факс:</strong> 02/ 3 112 395 <br /> <strong>жиро сметка:</strong> 530010100496686 <br /> <strong>депонент:</strong> Охридска Банка, АД Охрид <br /> <strong>даночен број:</strong> МК 4030005533741</p>\r\n</div>\r\n</div>\r\n<div class="right" style="background-image: none; border-color: #747474;"><a href="https://maps.google.com/maps?q=42.006054,21.407708&amp;hl=en&amp;num=1&amp;t=h&amp;z=18" rel="nofollow" target="_blank"> <img src="http://maps.googleapis.com/maps/api/staticmap?center=42.00605,21.407711&amp;zoom=15&amp;size=300x206&amp;sensor=false&amp;maptype=hybrid&amp;markers=color:red%7Ccolor:red%7C42.00605,21.407711" alt="" /> </a></div>');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `gallery_groups`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `gallery_photos`
--

CREATE TABLE IF NOT EXISTS `gallery_photos` (
  `id_gallery_photos` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `galleries_id_gallery` int(10) unsigned NOT NULL,
  `image` varchar(510) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id_gallery_photos`,`galleries_id_gallery`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

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

-- --------------------------------------------------------

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=49 ;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`menu_items_id`, `text`, `link`, `parent_id`, `date_created`, `order_index`, `depth_level`) VALUES
(1, 'За нас', 'articles/51-za-nas', 0, '2012-07-12 11:24:14', 100, 0),
(2, 'Learning', 'category/3-learning', 0, '2012-07-12 11:26:02', 200, 0),
(3, 'Speakers', 'category/2-speakers', 0, '2012-07-12 11:27:33', 300, 0),
(4, 'Brian Tracy', 'articles/52-brian-tracy', 3, '2012-07-18 21:16:26', 302, 1),
(5, 'Jay Conrad Levinson', 'articles/53-jay-conrad-levinson', 3, '2012-07-28 13:43:40', 304, 1),
(26, 'Експертски академии', 'category/6-ekspertski-akademii', 0, '2012-07-14 09:32:15', 600, 0),
(27, 'Тренери', 'category/7-treneri', 0, '2012-07-14 09:32:34', 700, 0),
(24, 'Recruitment', 'category/4-recruitment', 0, '2012-07-14 13:23:29', 400, 0),
(25, 'Consulting', 'category/5-consulting', 0, '2012-07-14 09:31:47', 500, 0),
(28, 'Галерија', 'gallery', 0, '2012-07-14 09:35:47', 800, 0),
(29, 'Новости', 'category/1-novosti', 0, '2012-07-14 09:36:16', 900, 0),
(30, 'Референци', 'articles/54-referenci', 0, '2012-07-14 09:37:59', 1000, 0),
(46, 'Statija vo Speakers', 'articles/66-dztatija-vo-dzpeakers', 3, '2012-07-28 13:42:54', 305, 1),
(48, 'Statija vo Recruitment', 'articles/68-statija-vo-recruitment', 24, '2012-07-28 13:48:13', 401, 1),
(47, 'Statija vo Learning', 'articles/67-dztatija-vo-learning', 2, '2012-07-28 13:44:55', 201, 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(510) COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `status` tinyint(4) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_started` datetime DEFAULT NULL,
  `date_finished` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `title`, `content`, `status`, `date_created`, `date_started`, `date_finished`) VALUES
(3, 'sent 0 emails', '<p>okej e</p>', 3, '2012-07-15 17:06:49', '2012-07-24 09:28:09', '2012-07-24 09:31:54'),
(4, 'the paused title', '<p>with some content</p>', 0, '2012-07-15 17:19:07', '2012-07-24 09:26:12', '0000-00-00 00:00:00'),
(5, 'the finished newsletter', 'asda sdfasdfasdfasdf', 3, '2012-07-15 17:19:53', NULL, NULL),
(7, 'raboti li ova be', '<p>raboti li ova cudo</p>', 1, '2012-07-25 21:34:16', '2012-07-25 21:35:10', NULL),
(9, 'test pismo', '<p>test pismo</p>', 0, '2012-08-02 14:07:31', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_articles`
--

CREATE TABLE IF NOT EXISTS `newsletter_articles` (
  `newsletter_id` smallint(5) unsigned NOT NULL,
  `article_id` int(10) unsigned NOT NULL,
  KEY `newsletter_ix` (`newsletter_id`),
  KEY `articles_ix` (`article_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `newsletter_articles`
--

INSERT INTO `newsletter_articles` (`newsletter_id`, `article_id`) VALUES
(4, 46),
(3, 47),
(3, 53),
(3, 61),
(3, 64),
(4, 53),
(5, 49),
(5, 48),
(5, 47),
(5, 46),
(6, 49),
(4, 61),
(4, 64),
(7, 64),
(7, 61),
(7, 54),
(7, 53),
(9, 64),
(9, 66),
(9, 67),
(9, 68),
(9, 70);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_clicks`
--

CREATE TABLE IF NOT EXISTS `newsletter_clicks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `newsletter_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `email_id` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `newsletter_clicks`
--

INSERT INTO `newsletter_clicks` (`id`, `newsletter_id`, `article_id`, `email_id`, `date_created`) VALUES
(1, 7, 67, 2, '2012-08-02 13:58:16'),
(8, 9, 67, 8, '2012-08-02 14:10:24'),
(7, 9, 68, 8, '2012-08-02 14:10:19'),
(11, 9, 68, 7, '2012-08-01 14:50:19'),
(9, 9, 66, 8, '2012-08-02 14:10:27');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE IF NOT EXISTS `quotes` (
  `quotes_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`quotes_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=50 ;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`quotes_id`, `description`, `author`, `date_created`) VALUES
(1, '„Не е важно од каде доаѓате, важно е каде одите.“', 'Brian Tracy', '2015-07-12 00:00:00'),
(2, '„За да постигнете успех каков што не сте постигнале претходно, мора да станете човек каков што не сте биле претходно.“', 'Brian Tracy', '2015-07-12 00:00:00'),
(3, '„Инвестирајте само 3% од Вашиот приход во усовршување и загарантирајте  ја својата иднина!“ ', 'Brian Tracy', '2015-07-12 00:00:00'),
(4, '„Успешни луѓе се оние кои имаат успешни навики.“', 'Brian Tracy', '2015-07-12 00:00:00'),
(5, '„Вистинскиот успех е да се биде способен да го поминете Вашиот живот онака како што Вие посакувате. Успехот не е во релација со она што сте денес, туку лежи во Вашата моќ да станете она што сакате.“', 'Colin Turner', '2015-07-12 00:00:00'),
(6, '„Маркетингот е уметност на менување на мислењето на луѓето или наведување да го задржат своето мислење доколку веќе купуваат од Вас.“', 'Jay Conrad Levinson', '2015-07-12 00:00:00'),
(7, '„Маркетинг е секој контакт што кој било од вашата компанија го има со кој било кој не е дел од неа.“', 'Jay Conrad Levinson', '2015-07-12 00:00:00'),
(8, '„Тргни ги сите изговори настрана и запомни дека: ТИ можеш!” ', 'Zig Ziglar', '2015-07-12 00:00:00'),
(9, '„Способноста може да ве вивне до врвот, но потребен ви е карактер за да останете таму.”', 'Zig Ziglar', '2015-07-12 00:00:00'),
(10, '„Пред да го промениш начинот на размислување, потребно е да ги промениш мислите.“', 'Zig Ziglar', '2015-07-12 00:00:00'),
(11, '„Не треба да бидеш голем за да започнеш, но треба да започнеш за да станеш голем.“', 'Zig Ziglar', '2015-07-12 00:00:00'),
(12, '„Доколку не се гледате себеси како победник, бидете сигурен дека ни другите не ве гледаат така.“', 'Zig Ziglar', '2015-07-12 00:00:00'),
(13, '„Вие сте родени да успеете, но мора да планирате да успеете, да се подготвите да успеете, тогаш може да очекувате да успеете.“', 'Zig Ziglar', '2015-07-12 00:00:00'),
(14, '„Единствениот кој може да ги искористи твоите способности си ти и тоа е една исклучителна одговорност.“', 'Zig Ziglar', '2015-07-12 00:00:00'),
(15, '„Формалното образование ќе ви обезбеди за живот; неформалното образование ќе ви обезбеди богатство.“', 'Jim Rohn', '2015-07-12 00:00:00'),
(16, '„Сите успешни луѓе имаат цел. Никој не може да стигне некаде, без да знае каде оди и што сака да направи.“', 'Norman Vincent Peale', '2015-07-12 00:00:00'),
(17, '„Креативноста доаѓа од довербата. Верувај им на своите инстинкти!”', 'Rita Mae Bown', '2015-07-12 00:00:00'),
(18, '„Секој пат кога ќе почувствуваш потреба да реагираш на стариот познат начин, запрашај се дали сакаш да бидеш затвореник на минатото или пионер на иднината!”', 'Deepak Chopra', '2015-07-12 00:00:00'),
(19, '„Луѓето можат да заборават што сте направиле и што сте рекле, но никогаш нема да заборават како сте ги направиле да се чувствуваат.”', 'Анонимен автор', '2015-07-12 00:00:00'),
(20, '„Сите успешни луѓе имаат цел. Никој не може да стигне некаде, без да знае каде оди и што сака да направи.“', 'Norman Vincent Peale', '2015-07-12 00:00:00'),
(21, '„Можете да научите с? што е потребно да знаете за да ja остварите било која цел што ќе си ја поставите себеси; ограничувања не постојат.“', 'Brian Tracy', '2015-07-12 00:00:00'),
(22, '„Дисциплината претставува мост помеѓу целите и достигнувањата.”', 'Jim Rohn', '2015-07-12 00:00:00'),
(23, '„Ако сакате да добиете повеќе во животот, потребно е да инвестирате во себеси.“', 'Mark Fritz', '2015-07-12 00:00:00'),
(24, '„Не се грижете за областите каде вашата конкуренција е полоша од вас... Учете од областите во кои е подобра!”', 'Michael Bergdahl', '2015-07-12 00:00:00'),
(25, '„Кога сонуваме сами - тоа е само сон. Кога сонуваме заедно со други - тоа е почеток на реалноста.“', 'Dom Helder Camara', '2015-07-12 00:00:00'),
(26, '„Луѓето се среќни онолку колку што ќе го убедат својот ум дека се среќни.“', 'Abraham Lincoln', '2015-07-12 00:00:00'),
(27, '„Вашата визија ќе стане јасна само доколку погледнете длабоко во Вашето срце. Оној кој гледа во другите, сонува. Оној кој гледа длабоко во себе си, се буди.“', 'Carl Gustav Jung', '2015-07-12 00:00:00'),
(28, '„Успехот има едноставна формула: прави го најдоброто и на луѓето ќе  им се допадне.“', 'Sam Ewing', '2015-07-12 00:00:00'),
(29, '„Можеш да го правиш она што треба да го направиш, но понекогаш тоа можеш да го направиш дури и подобро отколку што мислиш.“', 'Jimmy Carter Jr.', '2015-07-12 00:00:00'),
(30, '„Ископај бунар пред да станеш жеден.“', 'Harvey Mackay', '2015-07-12 00:00:00'),
(31, '„Која е разликата помеѓу училиштето и животот? Во училиште ја учите лекцијата - потоа добивате тест. Во животот добивате тест од кој ја учите лекцијата.“', 'Robert L. Carter', '2015-07-12 00:00:00'),
(32, '„Првиот и најважниот чекор кон успехот е чувството дека можеме да успееме.” ', 'Nelson Boswell', '2015-07-12 00:00:00'),
(33, '„Целта на HR системот на една компанија не е само да ги селектира вработените, измери нивниот перформанс или пресмета компензациски пакет, туку да ги поврзе луѓето во компанијата и да ги направи да се чувствуваат како дел од големото семејство на компанијата.“', 'Tim Ringo', '2015-07-12 00:00:00'),
(34, '„Слушајте го Вашиот клиент, бидејќи е експерт во Вашиот продукт исто колку што сте Вие; само што експертизата во продуктот се однесува на неговото користење.“ ', 'Linda Richardson', '2015-07-12 00:00:00'),
(35, '„Обичните луѓе размислуваат за трошење на времето. Големите луѓе размислуваат за искористување на времето.“', 'Анонимен автор', '2015-07-12 00:00:00'),
(36, '„Не слушајте колку е лоша економијата. Само направете план за дејствување и работете на него. Рецесијата е напраевна од човекот. Таа дава одлична можност за успех.“', 'Colin Turner', '2015-07-12 00:00:00'),
(37, '“Единствените ограничувања во нашиот живот се оние кои што самите ги поставуваме.“', 'Bob Procor', '2015-07-12 00:00:00'),
(38, '„Вашата визија ќе стане јасна само доколку погледенете длабоко во Вашето срце. Оној кој гледа во другите, сонува. Оној кој гледа длабоко во себе си, се буди.“ ', 'Carl Gustav Jung', '2015-07-12 00:00:00'),
(39, '„Чудо нема да се изнедри од чиста интелегенција. Тоа ќе се случи доколку посегнете по Вашето вистинско Јас, и ако го следите тоа што мислите дека е Вашиот Пат.“', 'Dr. Bernie Siegel', '2015-07-12 00:00:00'),
(40, '„Денес, моќта лежи во контролирањето на најреткиот ресурс: човековата интелигенција.“', 'Dr. Jonas Ridderstr?le', '2015-07-12 00:00:00'),
(41, '„Кога сонуваме сами - тоа е само сон. Кога сонуваме заедно со други - тоа е почеток на реалноста.“ ', 'Dom Helder Camarа', '2015-07-12 00:00:00'),
(42, '„Емоционалната интелигенција е способност да се почувствува, разбере и употреби моќта и остроумноста на емоциите како извор на човековата енергија, поврзаност и влијание.“ ', 'Robert K. Cooper', '2015-07-12 00:00:00'),
(43, '„Се додека постои цел, нема граници за ничие достигање.”', 'Pol Arden', '2015-07-12 00:00:00'),
(44, '„Кога почнуваме да размислуваме, тогаш и почнуваме да се менуваме!” ', 'Mark Fritz', '2015-07-12 00:00:00'),
(45, '„Наградата за добро сторена работа, е шансата да сториш многу повеќе!“', 'Wiliam Arthur', '2015-07-12 00:00:00'),
(46, '„Не можеш да ги промениш околностите, годишното време или ветрот, но секако можеш да направиш одредени промени кај себе.“', 'Jim Rohn', '2015-07-12 00:00:00'),
(47, '„Само со срцето се гледа исправно. Суштината останува невидлива за очите.“', '„Малиот принц”', '2015-07-12 00:00:00'),
(48, '„Можете да научите с? што е потребно да знаете за да ja остварите било која цел што ќе си ја поставите себеси; ограничувања не постојат.“ ', 'Brian Tracy', '2015-07-12 00:00:00'),
(49, '„Намалете го јазот помеѓу она што може да бидеме и она што сме.“', 'Ken Blanchard', '2015-07-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sidebar`
--

CREATE TABLE IF NOT EXISTS `sidebar` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `content` text COLLATE utf8_bin,
  `position` int(10) unsigned DEFAULT NULL,
  `is_deletable` int(10) unsigned DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=12 ;

--
-- Dumping data for table `sidebar`
--

INSERT INTO `sidebar` (`id`, `name`, `content`, `position`, `is_deletable`, `type`) VALUES
(1, 'calendar', 'elements/calendar', 0, 0, 'view'),
(2, 'quotes', 'elements/quotes', 1, 0, 'view'),
(3, 'success_pages', '<div style="text-align: center;"><a href="/tsl/newsletter/pages_of_success"> <img src="/tsl/public/images/stranici_na_uspeh.jpg" alt="stranici na uspeh" /> </a></div>', 2, 0, 'content'),
(4, 'social links', '<div class="social-buttons">\r\n<h3>Следи н&egrave;:</h3>\r\n<p><a href="http://www.facebook.com//login.php#!/pages/Triple-S-Learning/321852101858?ref=ts" target="_balnk"><img src="/tsl/images/icon-facebook-color.png" alt="" /></a> <a href="http://www.linkedin.com/in/tripleslearning" target="_balnk"><img src="/tsl/images/icon-linkedin-color.png" alt="" /></a> <a href="http://twitter.com/TripleSGroup" target="_blank"><img src="/tsl/images/icon-twitter-color.png" alt="" /></a> <a href="http://www.youtube.com/user/TripleSLearning" target="_balnk"><img src="/tsl/images/icon-youtube-color.png" alt="" /></a></p>\r\n</div>', 4, 0, 'content'),
(11, 'Newsletter', 'elements/newsletter', 3, 0, 'view');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE IF NOT EXISTS `slides` (
  `slides_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(2500) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(2500) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `order_index` int(11) NOT NULL,
  PRIMARY KEY (`slides_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`slides_id`, `title`, `description`, `link`, `image`, `date_created`, `order_index`) VALUES
(2, 'Добредојдовте', '<p>      Можете да се надевате на успех, a можете и да                          се обучите за успех.</p>                                          <p>                         Triple S Learning - брзи, интезивни тренинг                      програми дизајнирани за Вашиот успех...</p>', '', 'slider1.jpg', '2012-07-08 12:44:02', 4),
(4, 'Успехот се учи!', 'Колку повеќе работи знаете, толку повеќе врати Ви се отвораат!', '', 'slider3.jpg', '2012-07-15 17:21:33', 3),
(5, 'Delivering Success...', '<p>Тоа е она што најдобро го правиме! Пријавете се и бидете успешни!</p>', '', 'slider4.jpg', '2012-07-28 14:58:48', 2),
(7, 'Triple S Group', '<p>- <strong>Лидери </strong>во Македонија за неформално образование<br />- Над <strong>10.000</strong> обучени менаџери и претприемачи<br />- Водечки регионални <strong>практичари</strong><br />- Најпознатите <strong>светски бизнис гуруа</strong><br />- Присутни на пазарите на <strong>Македонија, Србија, Хрватска и Словенија</strong></p>', '', 'kolaz.jpg', '2012-07-28 15:38:10', 1);

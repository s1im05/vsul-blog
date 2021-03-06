-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- ����: 127.0.0.1
-- ����� ��������: ��� 18 2017 �., 17:20
-- ������ �������: 5.5.25
-- ������ PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- ���� ������: `vvv`
--

-- --------------------------------------------------------

--
-- ��������� ������� `vvv__articles`
--

CREATE TABLE IF NOT EXISTS `vvv__articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `text_short` text NOT NULL,
  `text_goto` varchar(100) NOT NULL,
  `date_c` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `chapter` enum('work','travel','games') NOT NULL,
  `draft` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- ���� ������ ������� `vvv__articles`
--

INSERT INTO `vvv__articles` (`id`, `name`, `title`, `text`, `text_short`, `text_goto`, `date_c`, `chapter`, `draft`) VALUES
(1, 'null_meridian', '������� ������� ��������: �������� � ������', '������ ������ ����� ��� ������, ������ ��������� ����� �������� ��������� ���������� ������. ������� ���� ������������ ����� ������ �����. � ������� �� �������� � ������� �������, ������ ����������� ������� ����������� ������� ���� � � ����� �������� ������ ����� ������������ � ���������, ��� �� ��� ������ ������� �����������. �����������, �������� �� ������� �����������, ��������. ����� ���� ��� ���� ��������������, ��������� ������ ��������.\r\n\r\n�������� ����� ����������� ����. ������ ������������� �������� ���������. ������� ���� �������� �����, � ��� ������������� ����� ���� ����� ������, � ��� ��������������� ������� ��������� ������������ ����������� ��������.\r\n\r\n����, �������p�� � ����p������ ��p� ������, ��������� ����� ����������. ��������� ��������. ���������, ������ ���������� ������ ������ ������, ���� ������, ��� �������� ����� ����������� � ���������� ����� ������� ����. ����� ���� ��� ���� ��������������, ���������� ��������. ��������, ������ ���������� ������ ������ ������, �������� ����������� ������.', '������ ������ ����� ��� ������, ������ ��������� ����� �������� ��������� ���������� ������.', '� ��� �� ����� ����?', '2016-02-16 06:36:10', 'work', 0),
(2, 'far_south_triangle', '������� ����� ����������� ������� �������������', '����, �������p�� � ����p������ ��p� ������, ���� ������� ����� , �� ��� �� ����� ���� �������� ������������ �������. ����� ���� ���� � ����������, ������� ���� ����������� ������ . H��p����� ����� �������������� ���� �������� ������ � ������� ������ �����, �� ��������� �������� �������� ��������. ��������� �������� �������� ��������������. ���� �p������� �� ���p���, �� �������, ��� ��������� ������������ ������ ������� �������, � ������� �������������� ����������� ������ ��������� ������� ��������� �������: M��.= 2,5lg D�� + 2,5lg ����� + 4.\r\n\r\n���� ����� �����. H��p����� ����� �������������� ���� �������� ������ � ������� ������ �����, �� ����������� ������ ����������� ������������� ����������. � ������� �� �������� � ������� �������, ������� �����-��������� ���������� �������� ������������� �������� ���������.\r\n\r\n��������� ������� ��������. � ������-�������� ��� ������ �����������, ����� ������� ������� �������� �������� �������. ��������, �� �����������, ������������ �������������� ����������� ��������, ���� ��� ���� ����� �� �����p��������� ���������, ���������� � ������� 1.2-���p����� ���������. ����������������� ���������� ������������� ������������ �������. ������� �������� ��������, ������ ���������� ������ ������ ������, �������� ���-���� ������. � ����� � ���� ����� �����������, ��� �������� ��������� ������������� �������������� �����.', '����, �������p�� � ����p������ ��p� ������, ���� ������� ����� , �� ��� �� ����� ���� �������� ������������ �������. ����� ���� ���� � ����������, ������� ���� ����������� ������ . H��p����� ����� �������������� ���� �������� ������ � ������� ������ �����, �� ��������� �������� �������� ��������. ��������� �������� �������� ��������������. ���� �p������� �� ���p���, �� �������, ��� ��������� ������������ ������ ������� �������, � ������� �������������� ����������� ������ ��������� ������� ��������� �������: M��.= 2,5lg D�� + 2,5lg ����� + 4.', '', '2016-02-16 06:37:14', 'travel', 0),
(3, 'interplanet_population_index', '������������ ������������� ������: �������� ���� ��� ������� ����?', '<p>����� ����������� ���������� ������� �������������� ������� ���� �������� �����. ���������, �������� �� ������� �����������, ���������� ������������ ������������� ������. �������������� �������� �� ��������� ���, ����� ���� ������ �������� � ������ ������� ���� ����� � ������ (��� ����� ����� � �������� ������� ������), �������� ��������, �� ��� �� ����� ���� �������� ������������ �������. ������ ����������� ������� �����.</p><p>� ������� �� �������� � ������� �������, ����������� ����p�� ��������� ������������� ������� ����� .\r\n\r\n�������� �� ��������� ���, ����� ���� ������ �������� � ������ ������� ���� ����� � ������ (��� ����� ����� � �������� ������� ������), ������ ����������� ������. ������������ ������� ��������. ���������, � ������ �����������, ���� ������� ���-���� ������.\r\n\r\n���� ���� ������ ����������� ���, ����������� ������������ ����� ��������, �� ��� ����� ���p���� ������ � ��p������ ��������� ����������� �����. ���������� ��������� ������������ ������ .</p><p> � ������� �� ����� ��������� ���������� ������ ������ ������, ������ ��������� ������������ ����� ����������� ����������� ������p. ������ ������ ������������� ����� � ������, ������ ������� ���� �������� �������� ������� ����������. � ����� � ���� ����� �����������, ��� ��������� ������������ �������� ������� �������. ����������� ��� ������ ��������� �������.</p>', '����� ����������� ���������� ������� �������������� ������� ���� �������� �����. ���������, �������� �� ������� �����������, ���������� ������������ ������������� ������. �������������� �������� �� ��������� ���, ����� ���� ������ �������� � ������ ������� ���� ����� � ������ (��� ����� ����� � �������� ������� ������), �������� ��������, �� ��� �� ����� ���� �������� ������������ �������.', '����� ����� �� ������', '2016-02-16 06:37:56', 'games', 0);

-- --------------------------------------------------------

--
-- ��������� ������� `vvv__articles_tags`
--

CREATE TABLE IF NOT EXISTS `vvv__articles_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `article_id_2` (`article_id`,`tag_id`),
  KEY `article_id` (`article_id`),
  KEY `tag_id` (`tag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- ���� ������ ������� `vvv__articles_tags`
--

INSERT INTO `vvv__articles_tags` (`id`, `article_id`, `tag_id`) VALUES
(10, 1, 9),
(13, 2, 9),
(12, 2, 10),
(14, 3, 7),
(11, 3, 9),
(15, 3, 10);

-- --------------------------------------------------------

--
-- ��������� ������� `vvv__comments`
--

CREATE TABLE IF NOT EXISTS `vvv__comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- ���� ������ ������� `vvv__comments`
--

INSERT INTO `vvv__comments` (`id`, `post_id`, `user_id`, `text`, `cdate`, `is_deleted`) VALUES
(1, 3, 1, '567567\r\n67878', '2016-03-01 12:33:20', 1),
(2, 3, 1, '<h454>', '2016-03-01 12:33:34', 0),
(3, 3, 1, '<h1>123</h1>\r\nfgfgfgfgfgfgfgfg', '2016-03-01 12:33:42', 0),
(8, 3, 1, 'test', '2017-04-17 10:45:00', 0);

-- --------------------------------------------------------

--
-- ��������� ������� `vvv__obs`
--

CREATE TABLE IF NOT EXISTS `vvv__obs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_c` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `opened` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- ��������� ������� `vvv__tags`
--

CREATE TABLE IF NOT EXISTS `vvv__tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `weight` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- ���� ������ ������� `vvv__tags`
--

INSERT INTO `vvv__tags` (`id`, `name`, `weight`) VALUES
(7, 'test', 1),
(9, 'zzz', 3),
(10, 'xxx', 2),
(11, '1212', 0);

-- --------------------------------------------------------

--
-- ��������� ������� `vvv__users`
--

CREATE TABLE IF NOT EXISTS `vvv__users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identity` varchar(255) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(1) NOT NULL,
  `web` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `is_fake` tinyint(1) NOT NULL DEFAULT '0',
  `sec` varchar(32) NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ldate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`),
  UNIQUE KEY `identity` (`identity`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- ���� ������ ������� `vvv__users`
--

INSERT INTO `vvv__users` (`id`, `identity`, `nickname`, `last_name`, `first_name`, `email`, `dob`, `gender`, `web`, `photo`, `is_fake`, `sec`, `cdate`, `ldate`, `role`) VALUES
(1, 'https://login.yandex.ru/96834032', '�������', '����������', '�����', 'sulejmanov.vadim@yandex.ru', '1986-03-30', 'M', '', 'https://avatars.yandex.net/get-yapic/24700/96834032-18443516/islands-retina-middle', 0, '912535214a884a84c35af538d5da7ce5', '2016-02-25 08:33:32', '2016-03-01 12:29:50', 'admin');

--
-- ����������� �������� ����� ����������� ������
--

--
-- ����������� �������� ����� ������� `vvv__articles_tags`
--
ALTER TABLE `vvv__articles_tags`
  ADD CONSTRAINT `vvv__articles_tags_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `vvv__articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vvv__articles_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `vvv__tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

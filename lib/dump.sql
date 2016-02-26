-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- ����: 127.0.0.1
-- ����� ��������: ��� 24 2016 �., 17:05
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
  `id_parent` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- ���� ������ ������� `vvv__articles`
--

INSERT INTO `vvv__articles` (`id`, `name`, `title`, `text`, `text_short`, `text_goto`, `date_c`, `id_parent`) VALUES
(1, 'null_meridian', '������� ������� ��������: �������� � ������', '������ ������ ����� ��� ������, ������ ��������� ����� �������� ��������� ���������� ������. ������� ���� ������������ ����� ������ �����. � ������� �� �������� � ������� �������, ������ ����������� ������� ����������� ������� ���� � � ����� �������� ������ ����� ������������ � ���������, ��� �� ��� ������ ������� �����������. �����������, �������� �� ������� �����������, ��������. ����� ���� ��� ���� ��������������, ��������� ������ ��������.\r\n\r\n�������� ����� ����������� ����. ������ ������������� �������� ���������. ������� ���� �������� �����, � ��� ������������� ����� ���� ����� ������, � ��� ��������������� ������� ��������� ������������ ����������� ��������.\r\n\r\n����, �������p�� � ����p������ ��p� ������, ��������� ����� ����������. ��������� ��������. ���������, ������ ���������� ������ ������ ������, ���� ������, ��� �������� ����� ����������� � ���������� ����� ������� ����. ����� ���� ��� ���� ��������������, ���������� ��������. ��������, ������ ���������� ������ ������ ������, �������� ����������� ������.', '������ ������ ����� ��� ������, ������ ��������� ����� �������� ��������� ���������� ������.', '', '2016-02-16 06:36:10', 0),
(2, 'far_south_triangle', '������� ����� ����������� ������� �������������', '����, �������p�� � ����p������ ��p� ������, ���� ������� ����� , �� ��� �� ����� ���� �������� ������������ �������. ����� ���� ���� � ����������, ������� ���� ����������� ������ . H��p����� ����� �������������� ���� �������� ������ � ������� ������ �����, �� ��������� �������� �������� ��������. ��������� �������� �������� ��������������. ���� �p������� �� ���p���, �� �������, ��� ��������� ������������ ������ ������� �������, � ������� �������������� ����������� ������ ��������� ������� ��������� �������: M��.= 2,5lg D�� + 2,5lg ����� + 4.\r\n\r\n���� ����� �����. H��p����� ����� �������������� ���� �������� ������ � ������� ������ �����, �� ����������� ������ ����������� ������������� ����������. � ������� �� �������� � ������� �������, ������� �����-��������� ���������� �������� ������������� �������� ���������.\r\n\r\n��������� ������� ��������. � ������-�������� ��� ������ �����������, ����� ������� ������� �������� �������� �������. ��������, �� �����������, ������������ �������������� ����������� ��������, ���� ��� ���� ����� �� �����p��������� ���������, ���������� � ������� 1.2-���p����� ���������. ����������������� ���������� ������������� ������������ �������. ������� �������� ��������, ������ ���������� ������ ������ ������, �������� ���-���� ������. � ����� � ���� ����� �����������, ��� �������� ��������� ������������� �������������� �����.', '����, �������p�� � ����p������ ��p� ������, ���� ������� ����� , �� ��� �� ����� ���� �������� ������������ �������. ����� ���� ���� � ����������, ������� ���� ����������� ������ . H��p����� ����� �������������� ���� �������� ������ � ������� ������ �����, �� ��������� �������� �������� ��������. ��������� �������� �������� ��������������. ���� �p������� �� ���p���, �� �������, ��� ��������� ������������ ������ ������� �������, � ������� �������������� ����������� ������ ��������� ������� ��������� �������: M��.= 2,5lg D�� + 2,5lg ����� + 4.', '', '2016-02-16 06:37:14', 0),
(3, 'interplanet_population_index', '������������ ������������� ������: �������� ���� ��� ������� ����?', '����� ����������� ���������� ������� �������������� ������� ���� �������� �����. ���������, �������� �� ������� �����������, ���������� ������������ ������������� ������. �������������� �������� �� ��������� ���, ����� ���� ������ �������� � ������ ������� ���� ����� � ������ (��� ����� ����� � �������� ������� ������), �������� ��������, �� ��� �� ����� ���� �������� ������������ �������. ������ ����������� ������� �����. � ������� �� �������� � ������� �������, ����������� ����p�� ��������� ������������� ������� ����� .\r\n\r\n�������� �� ��������� ���, ����� ���� ������ �������� � ������ ������� ���� ����� � ������ (��� ����� ����� � �������� ������� ������), ������ ����������� ������. ������������ ������� ��������. ���������, � ������ �����������, ���� ������� ���-���� ������.\r\n\r\n���� ���� ������ ����������� ���, ����������� ������������ ����� ��������, �� ��� ����� ���p���� ������ � ��p������ ��������� ����������� �����. ���������� ��������� ������������ ������ . � ������� �� ����� ��������� ���������� ������ ������ ������, ������ ��������� ������������ ����� ����������� ����������� ������p. ������ ������ ������������� ����� � ������, ������ ������� ���� �������� �������� ������� ����������. � ����� � ���� ����� �����������, ��� ��������� ������������ �������� ������� �������. ����������� ��� ������ ��������� �������.', '����� ����������� ���������� ������� �������������� ������� ���� �������� �����. ���������, �������� �� ������� �����������, ���������� ������������ ������������� ������. �������������� �������� �� ��������� ���, ����� ���� ������ �������� � ������ ������� ���� ����� � ������ (��� ����� ����� � �������� ������� ������), �������� ��������, �� ��� �� ����� ���� �������� ������������ �������.', '', '2016-02-16 06:37:56', 0);

-- --------------------------------------------------------

--
-- ��������� ������� `vvv__articles_tags`
--

CREATE TABLE IF NOT EXISTS `vvv__articles_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`),
  KEY `tag_id` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- ��������� ������� `vvv__tags`
--

CREATE TABLE IF NOT EXISTS `vvv__tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `order` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- ����������� �������� ����� ����������� ������
--

--
-- ����������� �������� ����� ������� `vvv__articles_tags`
--
ALTER TABLE `vvv__articles_tags`
  ADD CONSTRAINT `vvv__articles_tags_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `vvv__articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vvv__articles_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `vvv__tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
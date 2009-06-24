-- phpMyAdmin SQL Dump
-- version 3.1.2deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 24, 2009 at 11:41 AM
-- Server version: 5.0.75
-- PHP Version: 5.2.6-3ubuntu4.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `dualtech_peep`
--

-- --------------------------------------------------------

--
-- Table structure for table `discuss_categories`
--

CREATE TABLE IF NOT EXISTS `discuss_categories` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `discuss_categories`
--

INSERT INTO `discuss_categories` (`id`, `name`, `created`, `modified`) VALUES
(1, 'General', '2009-06-23 12:06:04', '2009-06-23 12:06:04'),
(2, 'Another Category', '2009-06-23 12:06:24', '2009-06-23 12:06:24'),
(3, 'Yet Another Category', '2009-06-23 15:23:08', '2009-06-23 15:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `discuss_posts`
--

CREATE TABLE IF NOT EXISTS `discuss_posts` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `discuss_topic_id` int(11) default NULL,
  `parent_id` int(11) default NULL,
  `title` varchar(255) default NULL,
  `content` text NOT NULL,
  `discuss_post_count` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_discuss_posts_discuss_topics` (`discuss_topic_id`),
  KEY `fk_discuss_posts_discuss_posts` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `discuss_posts`
--

INSERT INTO `discuss_posts` (`id`, `user_id`, `discuss_topic_id`, `parent_id`, `title`, `content`, `discuss_post_count`, `created`, `modified`) VALUES
(1, 1, 1, NULL, 'Hello World!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fermentum, lacus ut tempor tempor, massa erat dictum felis, ac accumsan odio tellus eget justo. Cras nibh nulla, accumsan a elementum eu, dictum ut orci. Donec vitae nibh erat, sed tincidunt dolor. Vivamus nisi orci, scelerisque et pharetra in, lobortis in est.', 1, '2009-06-24 11:41:08', '2009-06-24 11:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `discuss_topics`
--

CREATE TABLE IF NOT EXISTS `discuss_topics` (
  `id` int(11) NOT NULL auto_increment,
  `discuss_category_id` int(11) default NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `discuss_post_count` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_discuss_topics_discuss_categories` (`discuss_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `discuss_topics`
--

INSERT INTO `discuss_topics` (`id`, `discuss_category_id`, `name`, `description`, `discuss_post_count`, `created`, `modified`) VALUES
(1, 1, 'News', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fermentum, lacus ut tempor tempor, massa erat dictum felis, ac accumsan odio tellus eget justo. Cras nibh nulla, accumsan a elementum eu, dictum ut orci. Donec vitae nibh erat, sed tincidunt dolor. Vivamus nisi orci, scelerisque et pharetra in, lobortis in est.', 1, '2009-06-23 12:24:43', '2009-06-23 12:24:43'),
(2, 1, 'Feedback', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fermentum, lacus ut tempor tempor, massa erat dictum felis, ac accumsan odio tellus eget justo. Cras nibh nulla, accumsan a elementum eu, dictum ut orci. Donec vitae nibh erat, sed tincidunt dolor. Vivamus nisi orci, scelerisque et pharetra in, lobortis in est.', 0, '2009-06-23 12:24:43', '2009-06-23 12:24:43'),
(3, 3, 'Developer Chat', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fermentum, lacus ut tempor tempor, massa erat dictum felis, ac accumsan odio tellus eget justo. Cras nibh nulla, accumsan a elementum eu, dictum ut orci. Donec vitae nibh erat, sed tincidunt dolor. Vivamus nisi orci, scelerisque et pharetra in, lobortis in est.', 0, '2009-06-23 15:23:55', '2009-06-23 15:23:55');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `discuss_posts`
--
ALTER TABLE `discuss_posts`
  ADD CONSTRAINT `fk_discuss_posts_discuss_posts` FOREIGN KEY (`parent_id`) REFERENCES `discuss_posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_discuss_posts_discuss_topics` FOREIGN KEY (`discuss_topic_id`) REFERENCES `discuss_topics` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `discuss_topics`
--
ALTER TABLE `discuss_topics`
  ADD CONSTRAINT `fk_discuss_topics_discuss_categories` FOREIGN KEY (`discuss_category_id`) REFERENCES `discuss_categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;


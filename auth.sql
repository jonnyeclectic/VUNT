-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2014 at 06:51 AM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `auth`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE IF NOT EXISTS `candidates` (
  `user_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `election_id` int(11) NOT NULL,
  `num_votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`user_id`, `candidate_id`, `election_id`, `num_votes`) VALUES
(1, 1, 1, 1),
(1, 2, 2, 1),
(4, 3, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE IF NOT EXISTS `colleges` (
  `College of Arts and Sciences` int(13) NOT NULL,
  `College of Business` int(1) NOT NULL,
  `College of Education` int(2) NOT NULL,
  `College of Engineering` int(3) NOT NULL,
  `College of Information` int(4) NOT NULL,
  `College of Merchandising, Hospitality and Tourism` int(5) NOT NULL,
  `College of Music` int(6) NOT NULL,
  `College of Public Affairs and Community Service` int(7) NOT NULL,
  `College of Visual Arts and Design` int(8) NOT NULL,
  `Frank W. and Sue Mayborn School of Journalism` int(9) NOT NULL,
  `Honors College` int(10) NOT NULL,
  `Texas Academy of Mathematics and Science` int(11) NOT NULL,
  `Toulouse Graduate School` int(12) NOT NULL,
  `General` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`College of Arts and Sciences`, `College of Business`, `College of Education`, `College of Engineering`, `College of Information`, `College of Merchandising, Hospitality and Tourism`, `College of Music`, `College of Public Affairs and Community Service`, `College of Visual Arts and Design`, `Frank W. and Sue Mayborn School of Journalism`, `Honors College`, `Texas Academy of Mathematics and Science`, `Toulouse Graduate School`, `General`) VALUES
(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13);

-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE IF NOT EXISTS `elections` (
  `election_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` varchar(16384) NOT NULL,
  `college` varchar(64) NOT NULL,
  `college_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elections`
--

INSERT INTO `elections` (`election_id`, `name`, `description`, `college`, `college_id`, `start_time`, `end_time`, `status`) VALUES
(0, 'StuGov President', 'Election to decide the president of the student government.', 'College of Engineering', 0, '2014-11-18 00:00:00', '2014-11-21 00:00:00', 'inactive'),
(1, 'Art Boss Election', 'Decision on who is art boss.', 'College of Arts and Sciences', 0, '2014-11-21 00:00:00', '2014-11-24 00:00:00', 'active'),
(2, 'Hasbeens', 'Many hasbeen everywhere.', 'General', 0, '2014-11-21 00:00:00', '2014-11-30 00:00:00', 'active'),
(3, 'Newest Best Election', 'It''s the best one.', 'Texas Academy of Mathematics and Science', 0, '2014-11-21 00:00:00', '2014-11-24 00:00:00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'candidates', 'candidates'),
(4, 'pending', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `college` varchar(100) DEFAULT NULL,
  `EUID` varchar(20) DEFAULT NULL,
  `valid_user` int(11) NOT NULL,
  `candidacy_request` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `college`, `EUID`, `valid_user`, `candidacy_request`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1416712118, 1, 'Admin', 'istrator', 'College of Engineering', '0', 1, 0),
(4, '::1', 'christian fitch', '$2y$08$xGvkZXZrKFjTisOSvlkz3OzECxahQ5hlq5hja4Mf9SzpBawdKMvL2', NULL, 'zapheres@gmail.com', NULL, NULL, NULL, NULL, 1416679883, 1416712337, 1, 'Christian', 'Fitch', 'Toulouse Graduate School', 'ccf0056', 1, 0),
(5, '::1', 'zach triblionee', '$2y$08$0hqMyNVxoATKK5a2p/iZAO9nFbNiSs7W5m..Wd7MqcCg.NgnCGGhW', NULL, 'ztmeister@my.unt.edu', NULL, NULL, NULL, NULL, 1416692126, 1416692162, 1, 'Zach', 'Triblionee', 'College of Education', 'ztt7490', 1, 0),
(6, '::1', 'hoola boola', '$2y$08$TJRIM0ZXunxCW91SM/Sr9ucRlnEaIZVu9DNfP9zStuu9e0yKf8WPe', NULL, 'derp@woo.com', NULL, NULL, NULL, NULL, 1416692930, 1416694433, 1, 'Hoola', 'Boola', 'General', 'ppp0000', 1, 0),
(7, '::1', 'jimmy johnson', '$2y$08$G/86kQ4G5wolYe0gM0ghku.iQ0jCOnoIpY58epSJdh3JkkcI5/EF6', NULL, 'jimmyjohns@food.com', NULL, NULL, NULL, NULL, 1416694782, NULL, 1, 'Jimmy', 'Johnson', 'College of Engineering', 'jmj9876', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(19, 1, 3),
(20, 4, 2),
(22, 4, 3),
(23, 5, 2),
(24, 6, 2),
(26, 6, 3),
(27, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE IF NOT EXISTS `votes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `election_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `user_id`, `election_id`, `candidate_id`) VALUES
(0, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
 ADD KEY `College of Arts and Sciences` (`College of Arts and Sciences`,`College of Business`), ADD KEY `College of Arts and Sciences_2` (`College of Arts and Sciences`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`), ADD KEY `fk_users_groups_users1_idx` (`user_id`), ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

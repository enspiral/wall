CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(200) CHARACTER SET latin1 NOT NULL,
  `admin_password` varchar(300) CHARACTER SET latin1 NOT NULL,
  `admin_email` varchar(300) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `admin_email`) VALUES
(1, 'admin', '63a401a18004e5c6a5b5bd3643fbb1d5', 'srinivas@9lessons.info');


CREATE TABLE IF NOT EXISTS `template` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `t_file` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `t_name` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `t_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED AUTO_INCREMENT=5 ;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`t_id`, `t_file`, `t_name`, `t_order`) VALUES
(1, 'block_friends_widget.php', 'CONNECTIONS', 1),
(2, 'block_profile_views_widget.php', 'WHO''S VIEWED YOUR PROFILE', 2),
(3, 'block_advertisments.php', 'SPONSORED', 4),
(4, 'block_groups_widget.php', 'GROUPS', 3);


CREATE TABLE IF NOT EXISTS `advertisments` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_title` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `a_desc` varchar(300) CHARACTER SET latin1 DEFAULT NULL,
  `a_url` text CHARACTER SET latin1,
  `a_img` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `status` enum('0','1','2') CHARACTER SET latin1 DEFAULT '1',
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED AUTO_INCREMENT=9 ;

--
-- Dumping data for table `advertisments`
--

INSERT INTO `advertisments` (`a_id`, `a_title`, `a_desc`, `a_url`, `a_img`, `status`) VALUES
(1, 'The Wall Script', 'The Social Networking Script', 'http://www.thewallscript.com', 'add_1412713429.png', '1'),
(7, '9lessons Programming Blog', 'A blog about best programming tutorials', 'http://www.9lessons.info', 'add_1413001803.png', '1'),
(8, 'OAuth Login - Social Login', 'Login with Facebook, Google, Microsoft and Linkedin', 'http://www.oauthlogin.com', 'add_1413002322.png', '1');


CREATE TABLE IF NOT EXISTS `configurations` (
  `con_id` int(11) NOT NULL AUTO_INCREMENT,
  `newsfeedPerPage` int(3) DEFAULT NULL,
  `friendsPerPage` int(3) DEFAULT NULL,
  `photosPerPage` int(3) DEFAULT NULL,
  `groupsPerPage` int(3) DEFAULT NULL,
  `adminPerPage` int(3) DEFAULT NULL,
  `uploadImage` int(11) DEFAULT NULL,
  `bannerWidth` int(11) DEFAULT NULL,
  `profileWidth` int(11) DEFAULT NULL,
  `notificationPerPage` int(3) DEFAULT NULL,
  `friendsWidgetPerPage` int(4) DEFAULT NULL,
  `gravatar` enum('0','1') DEFAULT NULL,
  `forgot` varchar(30) DEFAULT NULL,
  `applicationName` varchar(100) NOT NULL,
  `applicationDesc` text NOT NULL,
  PRIMARY KEY (`con_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`con_id`, `newsfeedPerPage`, `friendsPerPage`, `photosPerPage`, `groupsPerPage`, `adminPerPage`, `uploadImage`, `bannerWidth`, `profileWidth`, `notificationPerPage`, `friendsWidgetPerPage`, `gravatar`, `forgot`, `applicationName`, `applicationDesc`) VALUES
(1, 30, 20, 30, 10, 25, 3072, 860, 250, 30, 20, '0', 'forgotkey', 'The Wall Script', 'The Social Networking Script. ');


CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(200) NOT NULL,
  `group_desc` text NOT NULL,
  `uid_fk` int(11) NOT NULL,
  `group_created` int(11) NOT NULL,
  `group_pic` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `group_bg` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `group_ip` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `status` enum('0','1','2') CHARACTER SET latin1 DEFAULT '1',
  `group_count` int(11) DEFAULT '0',
  `group_updates` int(11) DEFAULT '0',
  `group_bg_position` varchar(20) CHARACTER SET latin1 DEFAULT '0',
  `verified` enum('0','1') CHARACTER SET latin1 DEFAULT '0',
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED AUTO_INCREMENT=2 ;


CREATE TABLE IF NOT EXISTS `group_users` (
  `group_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id_fk` int(11) NOT NULL DEFAULT '0',
  `uid_fk` int(11) NOT NULL DEFAULT '0',
  `status` enum('0','1') CHARACTER SET latin1 DEFAULT '1',
  PRIMARY KEY (`group_id_fk`,`uid_fk`),
  UNIQUE KEY `group_user_id` (`group_user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED AUTO_INCREMENT=5 ;

CREATE TABLE IF NOT EXISTS `profile_views` (
  `uid_fk` int(11) NOT NULL DEFAULT '0',
  `view_uid_fk` int(11) NOT NULL DEFAULT '0',
  `created` int(11) DEFAULT NULL,
  PRIMARY KEY (`uid_fk`,`view_uid_fk`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

ALTER TABLE user_uploads ADD group_id_fk int default '0';
ALTER TABLE user_uploads ADD image_type enum('0','1','2') default '0';

ALTER table `message_like` ADD ouid_fk int;

ALTER TABLE friends add created int default '1412711248';
ALTER TABLE `messages` add group_id_fk int default '0';


ALTER TABLE users ADD profile_bg varchar(200);
ALTER TABLE users ADD group_count int default '0';
ALTER TABLE users ADD last_login int;
ALTER TABLE users ADD profile_bg_position varchar(10);
ALTER TABLE users ADD verified enum('0','1') default '0';
ALTER TABLE users ADD notification_created int;
ALTER TABLE users ADD forgot_code varchar(100);
ALTER TABLE users ADD photos_count int default '0';
ALTER TABLE users ADD tour enum('0','1') default '0';


alter table `comment_like` add ouid_fk int;
alter table `comment_like` add created int default '0';

alter table `group_users` add created int default '0';
alter table `message_like` add created int default '0';

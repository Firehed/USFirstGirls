-- 2010-01-27
CREATE TABLE `data` (
  `name` varchar(63) NOT NULL,
  `value` tinytext NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `users` ADD `name` varchar(32) NOT NULL DEFAULT '' AFTER `email`;


-- 2009-12-11


ALTER TABLE `users` DROP `username`;
-- 2009-12-11
ALTER TABLE `teams` ADD `name` varchar(64) NOT NULL DEFAULT ''  AFTER `number`;
ALTER TABLE `teams` ADD `location` tinytext NOT NULL DEFAULT ''  AFTER `size`;



-- 2009-12-10
ALTER TABLE `teams` ADD `girls` tinyint NULL DEFAULT NULL  AFTER `methods`;
ALTER TABLE `teams` ADD `size` tinyint NULL DEFAULT NULL  AFTER `girls`;
ALTER TABLE `teams` CHANGE `girls` `girls` tinyint(4) NOT NULL DEFAULT '0';
ALTER TABLE `teams` CHANGE `size` `size` tinyint(4) NOT NULL DEFAULT '0';
ALTER TABLE `teams` CHANGE `recruited` `recruited` tinyint(4) NOT NULL DEFAULT '0';

-- 2010-01-27
ALTER TABLE `teams` ADD `website` tinytext NOT NULL AFTER `location`;

-- 2010-02-07
CREATE TABLE `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `size` int(11) unsigned NOT NULL,
  `type` varchar(32) NOT NULL,
  `md5` char(32) NOT NULL,
  `sha1` char(40) NOT NULL,
  `data` longblob NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 2010-02-10
CREATE TABLE `forumTopicSubscriptions` (
  `forum_topic_id` int(11) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `forum_topic_id` (`forum_topic_id`),
  CONSTRAINT `forumtopicsubscriptions_ibfk_3` FOREIGN KEY (`forum_topic_id`) REFERENCES `forum_topics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `forumtopicsubscriptions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8
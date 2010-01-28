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


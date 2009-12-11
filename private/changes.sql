-- 2009-12-10
ALTER TABLE `teams` ADD `girls` tinyint NULL DEFAULT NULL  AFTER `methods`;
ALTER TABLE `teams` ADD `size` tinyint NULL DEFAULT NULL  AFTER `girls`;
ALTER TABLE `teams` CHANGE `girls` `girls` tinyint(4) NOT NULL DEFAULT '0';
ALTER TABLE `teams` CHANGE `size` `size` tinyint(4) NOT NULL DEFAULT '0';
ALTER TABLE `teams` CHANGE `recruited` `recruited` tinyint(4) NOT NULL DEFAULT '0';

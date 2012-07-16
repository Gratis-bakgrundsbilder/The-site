--
-- MySQL 5.0.95
-- Sun, 15 Jul 2012 16:42:10 +0000
--

CREATE TABLE `gb_crawler_log` (
   `date` timestamp not null default CURRENT_TIMESTAMP,
   `start_time` datetime,
   `ending_time` datetime,
   `images_fetched` smallint(5) unsigned,
   `limit` smallint(5) unsigned,
   `tags` varchar(255),
   `searchText` varchar(255),
   `license` tinyint(4),
   `minResolution` smallint(5) unsigned,
   `startPage` int(10) unsigned,
   PRIMARY KEY (`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- [Table `gb_crawler_log` is empty]

CREATE TABLE `gb_image_tags` (
   `image_id` int(10) unsigned not null,
   `tag` varchar(255),
   `date` timestamp not null default CURRENT_TIMESTAMP,
   PRIMARY KEY (`image_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- [Table `gb_image_tags` is empty]

CREATE TABLE `gb_image_views` (
   `image_id` int(10) unsigned not null,
   `date` timestamp not null default CURRENT_TIMESTAMP,
   PRIMARY KEY (`image_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- [Table `gb_image_views` is empty]

CREATE TABLE `gb_images` (
   `id` int(10) unsigned not null auto_increment,
   `orginal_id` int(10) unsigned,
   `url` varchar(255),
   `orginal_url` varchar(255),
   `title` varchar(255),
   `desc` mediumtext,
   `author_username` varchar(255),
   `author_realname` varchar(255),
   `licens` tinyint(4),
   `date` timestamp not null default CURRENT_TIMESTAMP,
   `width` smallint(5) unsigned,
   `height` smallint(5) unsigned,
   `chechksum` binary(20),
   PRIMARY KEY (`id`),
   UNIQUE KEY (`orginal_id`),
   UNIQUE KEY (`url`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [Table `gb_images` is empty]

CREATE TABLE `gb_licenses` (
   `id` tinyint(3) unsigned not null,
   `license` varchar(44),
   PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `gb_licenses` (`id`, `license`) VALUES ('1', 'Attribution-NonCommercial-ShareAlike License');
INSERT INTO `gb_licenses` (`id`, `license`) VALUES ('2', 'Attribution-NonCommercial License');
INSERT INTO `gb_licenses` (`id`, `license`) VALUES ('3', 'Attribution-NonCommercial-NoDerivs License');
INSERT INTO `gb_licenses` (`id`, `license`) VALUES ('4', 'Attribution licenses');
INSERT INTO `gb_licenses` (`id`, `license`) VALUES ('5', 'Attribution-ShareAlike License');
INSERT INTO `gb_licenses` (`id`, `license`) VALUES ('6', 'Attribution-NoDerivs License');
DROP TABLE IF EXISTS `tqk_admin`;
CREATE TABLE IF NOT EXISTS `tqk_admin` (
  `id` mediumint(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role_id` smallint(5) NOT NULL,
  `last_ip` varchar(15) DEFAULT NULL,
  `last_time` int(10) DEFAULT '0',
  `email` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

DROP TABLE IF EXISTS `tqk_ad`;
CREATE TABLE IF NOT EXISTS `tqk_ad` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `img` text NOT NULL,
  `add_time` int(10) NOT NULL DEFAULT '0',
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

DROP TABLE IF EXISTS `tqk_admin_auth`;
CREATE TABLE IF NOT EXISTS `tqk_admin_auth` (
  `role_id` tinyint(3) NOT NULL,
  `menu_id` smallint(6) NOT NULL,
  KEY `role_id` (`role_id`,`menu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tqk_admin_role`;
CREATE TABLE IF NOT EXISTS `tqk_admin_role` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `remark` text NOT NULL,
  `ordid` tinyint(3) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;


DROP TABLE IF EXISTS `tqk_article`;
CREATE TABLE IF NOT EXISTS `tqk_article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` smallint(4) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `info` text NOT NULL,
  `hits` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览数',
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255' COMMENT '排序值',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0',
  `last_time` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `seo_title` varchar(255) NOT NULL,
  `seo_keys` varchar(255) NOT NULL,
  `seo_desc` text NOT NULL,
  `tuisong` int(1) NOT NULL DEFAULT '0',
  `pic` varchar(255) NOT NULL DEFAULT '/static/images/nopic.jpg',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2851 ;

DROP TABLE IF EXISTS `tqk_article_cate`;
CREATE TABLE IF NOT EXISTS `tqk_article_cate` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `pid` smallint(4) unsigned NOT NULL DEFAULT '0',
  `spid` varchar(50) NOT NULL,
  `ordid` smallint(4) unsigned NOT NULL DEFAULT '255',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `seo_title` varchar(255) NOT NULL,
  `seo_keys` varchar(255) NOT NULL,
  `seo_desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

DROP TABLE IF EXISTS `tqk_help`;
CREATE TABLE IF NOT EXISTS `tqk_help` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(120) NOT NULL,
  `info` text NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `seo_keys` varchar(255) NOT NULL,
  `seo_desc` text NOT NULL,
  `last_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;


DROP TABLE IF EXISTS `tqk_items`;
CREATE TABLE IF NOT EXISTS `tqk_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ordid` int(11) DEFAULT '9999' COMMENT '自定义排序',
  `cate_id` int(11) DEFAULT '0' COMMENT '属于分类',
  `ali_id` varchar(50) DEFAULT NULL,
  `zc_id` int(11) DEFAULT '0' COMMENT '专场',
  `orig_id` smallint(6) DEFAULT '1',
  `num_iid` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `intro` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `nick` varchar(200) NOT NULL,
  `change_price` varchar(255) DEFAULT NULL,
  `mobilezk` varchar(200) NOT NULL,
  `area` varchar(200) NOT NULL,
  `sellerId` varchar(11) DEFAULT NULL,
  `uid` int(10) unsigned NOT NULL DEFAULT '1',
  `uname` varchar(20) NOT NULL DEFAULT 'admin',
  `pic_url` varchar(200) NOT NULL,
  `pic_urls` varchar(200) DEFAULT NULL COMMENT '宽版图片',
  `price` decimal(11,2) NOT NULL,
  `link` varchar(200) DEFAULT NULL,
  `click_url` varchar(200) NOT NULL DEFAULT '0',
  `ding` int(1) NOT NULL DEFAULT '0' COMMENT '0',
  `volume` int(11) NOT NULL,
  `commission` decimal(11,2) NOT NULL,
  `commission_rate` int(11) NOT NULL,
  `tk_commission_rate` int(11) DEFAULT NULL,
  `coupon_type` int(11) DEFAULT NULL,
  `coupon_price` decimal(11,2) NOT NULL,
  `coupon_rate` int(11) NOT NULL,
  `coupon_start_time` int(11) DEFAULT NULL,
  `coupon_end_time` int(11) DEFAULT NULL,
  `pass` int(11) DEFAULT '0' COMMENT '是否审核',
  `status` varchar(20) DEFAULT 'underway' COMMENT '出售状态',
  `fail_reason` varchar(500) DEFAULT NULL COMMENT '未通过理由',
  `shop_name` varchar(50) DEFAULT NULL,
  `shop_type` varchar(11) DEFAULT NULL,
  `item_url` varchar(500) DEFAULT NULL COMMENT '宝贝地址',
  `ems` int(11) DEFAULT '0',
  `qq` varchar(20) DEFAULT NULL,
  `mobile` varchar(13) DEFAULT '',
  `realname` varchar(25) DEFAULT NULL,
  `hits` int(11) DEFAULT '0' COMMENT '点击量',
  `isshow` int(11) DEFAULT '1',
  `likes` int(11) DEFAULT '0',
  `inventory` int(11) DEFAULT '0' COMMENT '库存',
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_keys` varchar(255) DEFAULT NULL,
  `seo_desc` text,
  `add_time` int(11) DEFAULT NULL,
  `last_rate_time` int(10) NOT NULL DEFAULT '0',
  `is_collect_comments` int(1) DEFAULT '0' COMMENT '是否采集了淘宝评论1表示已经采集了淘宝评论',
  `isq` smallint(1) NOT NULL DEFAULT '0',
  `quan` varchar(50) NOT NULL,
  `quanurl` varchar(255) DEFAULT NULL,
  `quankouling` varchar(250) DEFAULT NULL,
  `quanshorturl` varchar(250) DEFAULT '0',
  `Quan_condition` varchar(255) NOT NULL,
  `Quan_surplus` int(50) NOT NULL,
  `Quan_receive` int(50) NOT NULL,
  `tk` int(1) NOT NULL DEFAULT '0' COMMENT '默认0',
  `que` int(1) NOT NULL DEFAULT '0' COMMENT '默认0',
  `quan_pl` varchar(1) DEFAULT '0',
  `quan_rq` varchar(1) DEFAULT '0',
  `last_time` int(11) DEFAULT '0',
  `Quan_id` varchar(32) NOT NULL,
  `desc` longtext,
  `tuisong` int(1) NOT NULL DEFAULT '0' COMMENT '是否推送',
  `is_commend` tinyint(1) DEFAULT '0',
  `up_time` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `num_iid` (`num_iid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



DROP TABLE IF EXISTS `tqk_items_cate`;
CREATE TABLE IF NOT EXISTS `tqk_items_cate` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `ali_id` varchar(50) DEFAULT NULL,
  `tags` varchar(50) NOT NULL,
  `pid` smallint(4) unsigned NOT NULL,
  `spid` varchar(50) NOT NULL,
  `remark` text NOT NULL,
  `sort` varchar(50) NOT NULL DEFAULT 'id  desc',
  `wait_time` varchar(50) NOT NULL DEFAULT '0',
  `end_time` varchar(50) NOT NULL DEFAULT '0',
  `shop_type` varchar(11) NOT NULL COMMENT 'B:商城C:集市',
  `mix_price` decimal(11,2) DEFAULT NULL,
  `max_price` decimal(11,2) DEFAULT NULL,
  `mix_volume` int(11) DEFAULT NULL,
  `max_volume` int(11) DEFAULT NULL,
  `ems` varchar(50) NOT NULL DEFAULT '0',
  `thiscid` int(11) NOT NULL DEFAULT '0' COMMENT '是否当前分类',
  `add_time` int(10) NOT NULL,
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `status` tinyint(1) NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `seo_keys` varchar(255) NOT NULL,
  `seo_desc` text NOT NULL,
  `cateimg` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;


DROP TABLE IF EXISTS `tqk_items_like`;
CREATE TABLE IF NOT EXISTS `tqk_items_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



DROP TABLE IF EXISTS `tqk_items_orig`;
CREATE TABLE IF NOT EXISTS `tqk_items_orig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;


DROP TABLE IF EXISTS `tqk_link`;
CREATE TABLE IF NOT EXISTS `tqk_link` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `img` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;


DROP TABLE IF EXISTS `tqk_menu`;
CREATE TABLE IF NOT EXISTS `tqk_menu` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `pid` smallint(6) NOT NULL,
  `module_name` varchar(20) NOT NULL,
  `action_name` varchar(20) NOT NULL,
  `data` varchar(120) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `often` tinyint(1) NOT NULL DEFAULT '0',
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `display` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=354 ;


DROP TABLE IF EXISTS `tqk_nav`;
CREATE TABLE IF NOT EXISTS `tqk_nav` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `alias` varchar(20) NOT NULL,
  `link` varchar(255) NOT NULL,
  `target` tinyint(1) NOT NULL DEFAULT '1',
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `mod` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;


DROP TABLE IF EXISTS `tqk_robots`;
CREATE TABLE IF NOT EXISTS `tqk_robots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `keyword` varchar(200) DEFAULT NULL,
  `cid` int(11) NOT NULL DEFAULT '16',
  `cate_id` int(11) DEFAULT '0' COMMENT '所属分类',
  `shop_type` varchar(50) NOT NULL DEFAULT 'all',
  `start_coupon_rate` int(11) NOT NULL DEFAULT '100',
  `end_coupon_rate` int(11) NOT NULL DEFAULT '10000',
  `start_commissionRate` int(11) NOT NULL DEFAULT '1000',
  `end_commissionRate` int(11) NOT NULL DEFAULT '9000',
  `start_credit` varchar(50) NOT NULL DEFAULT '1heart',
  `end_credit` varchar(50) NOT NULL DEFAULT '5goldencrown',
  `start_price` decimal(8,2) DEFAULT '0.00',
  `end_price` decimal(8,2) DEFAULT '999.00',
  `start_volume` int(11) NOT NULL DEFAULT '0',
  `end_volume` int(11) NOT NULL DEFAULT '999999',
  `ems` int(11) DEFAULT '0' COMMENT '采集包邮',
  `recid` int(11) DEFAULT '1' COMMENT '是否更新分类',
  `page` int(11) NOT NULL DEFAULT '100' COMMENT '采集页数',
  `ordid` tinyint(3) unsigned NOT NULL DEFAULT '255',
  `status` int(11) DEFAULT '1',
  `sort` varchar(50) NOT NULL DEFAULT 'total_sales_des',
  `last_page` int(11) DEFAULT '0' COMMENT '上次采集页数',
  `last_time` int(11) DEFAULT NULL,
  `http_mode` int(11) DEFAULT '0' COMMENT '采集模式',
  `tb_cid` int(11) DEFAULT NULL COMMENT '淘宝网分类ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;



DROP TABLE IF EXISTS `tqk_setting`;
CREATE TABLE IF NOT EXISTS `tqk_setting` (
  `name` varchar(100) NOT NULL,
  `data` text NOT NULL,
  `remark` varchar(255) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
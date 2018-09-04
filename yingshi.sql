/*
 Navicat MySQL Data Transfer

 Source Server         : root
 Source Server Type    : MySQL
 Source Server Version : 50721
 Source Host           : localhost:3306
 Source Schema         : yingshi

 Target Server Type    : MySQL
 Target Server Version : 50721
 File Encoding         : 65001

 Date: 04/09/2018 14:12:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for banner
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '轮播名称',
  `img` varchar(255) DEFAULT NULL COMMENT '图片连接',
  `connect

Connect

connect` varchar(255) DEFAULT NULL COMMENT '连接地址',
  `created` int(11) DEFAULT NULL,
  `is_show` tinyint(3) DEFAULT NULL COMMENT '是否显示(1是显示0是不显示）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of banner
-- ----------------------------
BEGIN;
INSERT INTO `banner` VALUES (1, '测试11', 'https://ww1.sinaimg.cn/large/a15b4afegy1fmzsoky72pj20i20crwg5.jpg', 'play/15146543071170040437.html', NULL, 1);
COMMIT;

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(50) NOT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  `url` varchar(100) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `sortd` int(11) NOT NULL DEFAULT '0' COMMENT '排序呢',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8 COMMENT='系统菜单';

-- ----------------------------
-- Records of menu
-- ----------------------------
BEGIN;
INSERT INTO `menu` VALUES (11, '网站设置', 0, '', 'fa fa fa-bar-chart-o', 0);
INSERT INTO `menu` VALUES (12, '首页轮播', 0, '', 'fa fa-columns', 1);
INSERT INTO `menu` VALUES (13, '导航管理', 0, '', 'fa fa-female', 2);
INSERT INTO `menu` VALUES (14, '视频尝鲜', 0, '', 'fa fa-edit', 5);
INSERT INTO `menu` VALUES (15, '权限管理', 0, '', 'fa fa-desktop', 12);
INSERT INTO `menu` VALUES (16, '系统设置', 0, '', 'fa fa-flask', 100);
INSERT INTO `menu` VALUES (17, '系统设置', 16, 'settings/index', '', 0);
INSERT INTO `menu` VALUES (18, '管理员', 15, 'auth/adminlist', '', 0);
INSERT INTO `menu` VALUES (19, '菜单管理', 15, 'auth/menuList', '', 0);
INSERT INTO `menu` VALUES (22, '地区管理', 16, 'area/Index', '', 0);
INSERT INTO `menu` VALUES (23, '尝鲜列表', 14, 'excation/index', '', 0);
INSERT INTO `menu` VALUES (24, '导航列表', 13, 'user/index', '', 0);
INSERT INTO `menu` VALUES (25, '轮播列表', 12, 'admin/bannerlist', '', 0);
INSERT INTO `menu` VALUES (26, '添加轮播', 12, 'admin/addbanner', '', 0);
INSERT INTO `menu` VALUES (28, '基本设置', 11, 'admin/webset', '', 0);
INSERT INTO `menu` VALUES (30, '接口列表', 11, 'admin/jkset', '', 0);
INSERT INTO `menu` VALUES (33, '添加导航', 13, 'transfers/index', '', 0);
INSERT INTO `menu` VALUES (35, '电视直播', 0, '', 'fa fa-cny', 7);
INSERT INTO `menu` VALUES (36, '直播列表', 35, 'financial/index', '', 0);
INSERT INTO `menu` VALUES (37, '增加直播', 35, 'financial/grant', '', 0);
INSERT INTO `menu` VALUES (40, '微信管理', 0, '', 'fa fa-thumbs-up', 3);
INSERT INTO `menu` VALUES (44, '友情链接', 0, '', 'fa fa-credit-card', 6);
INSERT INTO `menu` VALUES (45, '友链列表', 44, 'transfers/index', '', 0);
INSERT INTO `menu` VALUES (46, '添加友链', 44, 'transfers/soindex', '', 0);
INSERT INTO `menu` VALUES (47, 'APP管理', 0, '', 'fa fa-archive', 8);
INSERT INTO `menu` VALUES (48, 'APP信息', 47, 'activity/index', '', 0);
INSERT INTO `menu` VALUES (49, '侵权设置', 0, '', 'fa fa-bar-chart', 4);
INSERT INTO `menu` VALUES (50, '侵权列表', 49, 'yun/index', '', 0);
INSERT INTO `menu` VALUES (51, '添加侵权', 49, 'hiscommis/index', '', 2);
INSERT INTO `menu` VALUES (55, '安全防御', 0, '', 'fa fa-gears', 6);
INSERT INTO `menu` VALUES (56, 'CC防御', 55, 'imei/index', '', 0);
INSERT INTO `menu` VALUES (57, '缓存相关', 0, '', 'fa fa-archive', 5);
INSERT INTO `menu` VALUES (61, '修改密码', 0, '', 'fa fa-thumbs-up', 8);
INSERT INTO `menu` VALUES (67, '广告位管理', 61, 'shop/addver/index', '', 0);
INSERT INTO `menu` VALUES (68, '短网址生成', 0, '', 'fa fa fa-bar-chart-o', 9);
INSERT INTO `menu` VALUES (85, '增加尝鲜', 14, '	shop/shop_user/index		', '', 0);
COMMIT;

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `id` int(111) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='系统配置信息表';

-- ----------------------------
-- Records of setting
-- ----------------------------
BEGIN;
INSERT INTO `setting` VALUES (1, 'a:13:{s:7:\"webname\";s:4:\"3232\";s:10:\"websubname\";s:3:\"323\";s:8:\"webdomin\";s:5:\"23232\";s:11:\"webkeywords\";s:3:\"232\";s:7:\"webdesc\";s:3:\"323\";s:6:\"webdir\";s:3:\"232\";s:6:\"webicp\";s:3:\"232\";s:7:\"webmail\";s:3:\"232\";s:9:\"copyright\";s:3:\"232\";s:7:\"weblogo\";s:3:\"232\";s:2:\"cy\";s:4:\"2323\";s:9:\"webtongji\";s:1:\"3\";s:10:\"isregister\";s:1:\"1\";}', '2018-08-27 03:30:48', NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;

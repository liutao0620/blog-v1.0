/*
Navicat MySQL Data Transfer

Source Server         : liutao
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : myblog

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2017-05-24 17:21:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for blog_admin
-- ----------------------------
DROP TABLE IF EXISTS `blog_admin`;
CREATE TABLE `blog_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(60) NOT NULL DEFAULT '' COMMENT '密码',
  `salt` char(6) NOT NULL COMMENT '盐',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态，1启用，2禁用',
  `last_login_time` int(11) NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  `last_login_ip` int(11) NOT NULL DEFAULT '0' COMMENT '最后登录ip',
  `login_times` int(11) NOT NULL DEFAULT '0' COMMENT '登录次数',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of blog_admin
-- ----------------------------
INSERT INTO `blog_admin` VALUES ('17', 'admin', '0e829536fc70fc332d663639f9c009ad', '8b35db', '1', '1495616909', '2130706433', '6', '0');
INSERT INTO `blog_admin` VALUES ('20', '波波', 'a020731cfb615a854c496d8fb62ef2d8', 'de548f', '1', '1495610376', '2130706433', '1', '1495557709');
INSERT INTO `blog_admin` VALUES ('21', '小儿', '69c6cdaf900aa3b2644c0714a356f302', '4442bf', '1', '1495606801', '2130706433', '1', '1495606756');

-- ----------------------------
-- Table structure for blog_admin_rule
-- ----------------------------
DROP TABLE IF EXISTS `blog_admin_rule`;
CREATE TABLE `blog_admin_rule` (
  `admin_id` int(11) DEFAULT NULL,
  `rule_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of blog_admin_rule
-- ----------------------------
INSERT INTO `blog_admin_rule` VALUES ('1', '49');
INSERT INTO `blog_admin_rule` VALUES ('14', '49');
INSERT INTO `blog_admin_rule` VALUES ('15', '65');
INSERT INTO `blog_admin_rule` VALUES ('17', '66');
INSERT INTO `blog_admin_rule` VALUES ('0', '0');
INSERT INTO `blog_admin_rule` VALUES ('20', '67');
INSERT INTO `blog_admin_rule` VALUES ('21', '68');

-- ----------------------------
-- Table structure for blog_config
-- ----------------------------
DROP TABLE IF EXISTS `blog_config`;
CREATE TABLE `blog_config` (
  `id` int(11) unsigned NOT NULL,
  `site_name` varchar(255) NOT NULL DEFAULT '0',
  `site_url` varchar(255) NOT NULL DEFAULT '0',
  `site_keyword` varchar(255) NOT NULL DEFAULT '0',
  `description` varchar(500) NOT NULL DEFAULT '0',
  `site_version` varchar(255) NOT NULL DEFAULT '0',
  `copyright_information` varchar(300) NOT NULL DEFAULT '0',
  `case_number` varchar(100) DEFAULT '0',
  `allow_ip` varchar(1000) NOT NULL DEFAULT '0',
  `failure_number` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of blog_config
-- ----------------------------
INSERT INTO `blog_config` VALUES ('1', '刘涛的博客', 'http://www.blog.com/', '个人博客,php博客,技术博客,博客系统,博客源码,php代码,代码分享', '刘涛的博客致力分享个人学习经验，实例代码，开源项目，代码规范，提供优质的代码分享', 'v1.0', 'Copyright ?2015-2017 It Bolg v1.0 All Rights Reserved.', '蜀ICP备15010979号-1', '1', '10');

-- ----------------------------
-- Table structure for blog_content
-- ----------------------------
DROP TABLE IF EXISTS `blog_content`;
CREATE TABLE `blog_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章ID编号',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '文章标题',
  `type_id` int(11) NOT NULL DEFAULT '0' COMMENT '所属栏目的ID编号',
  `author` varchar(255) NOT NULL DEFAULT '' COMMENT '作者',
  `comment_num` int(11) NOT NULL DEFAULT '0' COMMENT '评论数量',
  `laud_num` int(11) NOT NULL DEFAULT '0' COMMENT '点赞数',
  `reading_num` int(11) NOT NULL DEFAULT '0' COMMENT '阅读数量',
  `image` varchar(255) NOT NULL DEFAULT '' COMMENT '封面图图片路径',
  `is_top` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否置顶',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(1) NOT NULL DEFAULT '0' COMMENT '更新时间',
  `content` text COMMENT '文章内容',
  `introduction` text NOT NULL COMMENT '文章简介',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_content
-- ----------------------------
INSERT INTO `blog_content` VALUES ('1', 'thinkphp5.0 auth权限管理', '6', '一俊', '0', '0', '3', '', '1', '1493719897', '1493968108', '&lt;pre class=&quot;brush:php;toolbar:false&quot;&gt;public&amp;nbsp;function&amp;nbsp;contentSave(){\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$type&amp;nbsp;=&amp;nbsp;new&amp;nbsp;Data(&amp;#39;type&amp;#39;);\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$content&amp;nbsp;=&amp;nbsp;new&amp;nbsp;Data(&amp;#39;content&amp;#39;);\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$content_tag&amp;nbsp;=&amp;nbsp;new&amp;nbsp;Data(&amp;#39;content_tag&amp;#39;);\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;try{\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;if(Request::instance()-&amp;gt;isPost()){\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$post&amp;nbsp;=&amp;nbsp;Request::instance()-&amp;gt;post();\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$tag_ids&amp;nbsp;=&amp;nbsp;$post[&amp;#39;tag_ids&amp;#39;];&amp;nbsp;&amp;nbsp;//选择的标签\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;unset($post[&amp;#39;tag_ids&amp;#39;]);\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$rule_validate&amp;nbsp;=&amp;nbsp;new&amp;nbsp;ArticleValidate();\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$rule_validate&amp;nbsp;=&amp;nbsp;$rule_validate-&amp;gt;contentValidate();\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;self::validateData($rule_validate[&amp;#39;rule&amp;#39;],$rule_validate[&amp;#39;message&amp;#39;],$post);\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;if(!empty($_FILES)){\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$post[&amp;#39;image&amp;#39;]&amp;nbsp;=&amp;nbsp;upload();&amp;nbsp;//图片上传\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$post[&amp;#39;update_time&amp;#39;]&amp;nbsp;=&amp;nbsp;time();\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$post[&amp;#39;introduction&amp;#39;]&amp;nbsp;=&amp;nbsp;\\think\\Helper::contentStripTags($post[&amp;#39;content&amp;#39;]);\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$content-&amp;gt;startTrans();\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$content_save_bool&amp;nbsp;=&amp;nbsp;$content-&amp;gt;updateData($post);\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$tag_delete_bool&amp;nbsp;=&amp;nbsp;$content_tag-&amp;gt;deleteByWhere(&amp;quot;content_id&amp;nbsp;=&amp;nbsp;{$post[&amp;#39;id&amp;#39;]}&amp;quot;);&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;//删除该文章原来的标签\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$arr_tag_ids&amp;nbsp;=&amp;nbsp;\\think\\Helper::contentTag($tag_ids,$post[&amp;#39;id&amp;#39;]);&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;//组合数组\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$content_tag_bool&amp;nbsp;=&amp;nbsp;$content_tag-&amp;gt;insertAll($arr_tag_ids);&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;//重新插入新的标签\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;if($content_save_bool&amp;nbsp;===&amp;nbsp;false&amp;nbsp;||&amp;nbsp;!$tag_delete_bool&amp;nbsp;||&amp;nbsp;!$content_tag_bool){\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$content-&amp;gt;rollback();\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;throw&amp;nbsp;new&amp;nbsp;\\LogicException(Config::get(&amp;#39;error_table.error&amp;#39;)[&amp;#39;msg&amp;#39;],Config::get(&amp;#39;error_table.error&amp;#39;)[&amp;#39;code&amp;#39;]);\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$content-&amp;gt;commit();\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;return&amp;nbsp;self::formatSuccessResult();\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}catch(\\Exception&amp;nbsp;$e){\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;return&amp;nbsp;self::formatResult($e-&amp;gt;getCode(),$e-&amp;gt;getMessage());\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$id&amp;nbsp;=&amp;nbsp;intval(input(&amp;#39;param.id&amp;#39;));\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$getOne&amp;nbsp;=&amp;nbsp;$content-&amp;gt;find(&amp;quot;id&amp;nbsp;=&amp;nbsp;$id&amp;quot;);\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$type_list&amp;nbsp;=&amp;nbsp;$type-&amp;gt;selectData(&amp;quot;model_id&amp;nbsp;=&amp;nbsp;1&amp;quot;);\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$type_list&amp;nbsp;=&amp;nbsp;infinite($type_list,0,0);&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;//递归+deep\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$tag&amp;nbsp;=&amp;nbsp;new&amp;nbsp;Data(&amp;#39;tag&amp;#39;);\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$tag_list&amp;nbsp;=&amp;nbsp;$tag-&amp;gt;selectData();&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;//读取所有的标签\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$tag_ids&amp;nbsp;=&amp;nbsp;$content_tag-&amp;gt;selectData(&amp;quot;content_id&amp;nbsp;=&amp;nbsp;$id&amp;quot;,&amp;quot;tag_id&amp;quot;);//查询该文章对应的tag_id\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$tag_ids&amp;nbsp;=&amp;nbsp;\\think\\Helper::implodeTag($tag_ids);&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;//对标签的ID进行处理\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;return&amp;nbsp;view(&amp;#39;contentSave&amp;#39;,[&amp;#39;type_list&amp;#39;=&amp;gt;$type_list,&amp;#39;one&amp;#39;=&amp;gt;$getOne,&amp;#39;tag_list&amp;#39;=&amp;gt;$tag_list,&amp;#39;tag_ids&amp;#39;=&amp;gt;$tag_ids]);\n}&lt;/pre&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', 'public&nbsp;function&nbsp;contentSave(){\n&nbsp;&nbsp;&nbsp;&nbsp;$type&nbsp;=&nbsp;new&nbsp;Data(&#39;type&#39;);\n&nbsp;&nbsp;&nbsp;&nbsp;$content&nbsp;=&nbsp;new&nbsp;Data(&#39;content&#39;);\n&nbsp;&nbsp;&nbsp;&nbsp;$content_tag&nbsp;=&nbsp;new&nbsp');
INSERT INTO `blog_content` VALUES ('2', '发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭', '3', '一俊', '0', '0', '1', '', '0', '1493720050', '1495297166', '&lt;p&gt;发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭&lt;/p&gt;', '发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达省份打算发烧大富大沙发斯蒂芬发射点发烧饭发送到佛山发送到发达');
INSERT INTO `blog_content` VALUES ('3', 'thinkphp5.0助手类的封装', '6', '一俊', '0', '0', '1', '', '1', '1493720174', '1495340217', '&lt;pre class=&quot;brush:php;toolbar:false&quot;&gt;public&amp;nbsp;static&amp;nbsp;function&amp;nbsp;contentStripTags($str){\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;return&amp;nbsp;mb_substr(strip_tags((trim(html_entity_decode($str)))),0,250,&amp;#39;utf-8&amp;#39;);\n}\n\n/**\n&amp;nbsp;*&amp;nbsp;@param&amp;nbsp;array&amp;nbsp;$tag_ids\n&amp;nbsp;*&amp;nbsp;@return&amp;nbsp;string\n&amp;nbsp;*\n&amp;nbsp;*/\npublic&amp;nbsp;static&amp;nbsp;function&amp;nbsp;implodeTag($tag_ids&amp;nbsp;=&amp;nbsp;[]){\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$str_ids&amp;nbsp;=&amp;nbsp;&amp;#39;&amp;#39;;\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;foreach($tag_ids&amp;nbsp;as&amp;nbsp;$v){\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$str_ids&amp;nbsp;.=&amp;nbsp;$v[&amp;#39;tag_id&amp;#39;].&amp;#39;,&amp;#39;;\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$arr_ids&amp;nbsp;=&amp;nbsp;explode(&amp;#39;,&amp;#39;,trim($str_ids,&amp;#39;,&amp;#39;));\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;return&amp;nbsp;$arr_ids;\n}\n\n/**\n&amp;nbsp;*&amp;nbsp;@param&amp;nbsp;array&amp;nbsp;$parent_button\n&amp;nbsp;*&amp;nbsp;@param&amp;nbsp;array&amp;nbsp;$son_button\n&amp;nbsp;*&amp;nbsp;@return&amp;nbsp;mixed\n&amp;nbsp;*&amp;nbsp;主要处理后台按钮\n&amp;nbsp;*/\npublic&amp;nbsp;static&amp;nbsp;function&amp;nbsp;button($parent_button&amp;nbsp;=&amp;nbsp;[],$son_button&amp;nbsp;=&amp;nbsp;[]){\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;foreach($parent_button&amp;nbsp;as&amp;nbsp;$k=&amp;gt;$v){\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;foreach($son_button&amp;nbsp;as&amp;nbsp;$k1=&amp;gt;$v1){\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;if($v1[&amp;#39;p_id&amp;#39;]&amp;nbsp;==&amp;nbsp;$v[&amp;#39;id&amp;#39;]){\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$button[$k][&amp;#39;parentButton&amp;#39;]&amp;nbsp;=&amp;nbsp;$v;\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$button[$k][&amp;#39;sonButton&amp;#39;][]&amp;nbsp;&amp;nbsp;=&amp;nbsp;$v1;\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;return&amp;nbsp;$button;\n}&lt;/pre&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', 'public&nbsp;static&nbsp;function&nbsp;contentStripTags($str){\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;mb_substr(strip_tags((trim(html_entity_decode($str)))),0,250,&#39;utf-8&#39;);\n}\n\n');
INSERT INTO `blog_content` VALUES ('4', 'thinkphp5.0 HTMl标签过滤', '3', '一俊', '0', '0', '0', '', '0', '1493720375', '1493778662', '&lt;pre class=&quot;brush:php;toolbar:false&quot;&gt;public&amp;nbsp;static&amp;nbsp;function&amp;nbsp;implodeTag($tag_ids&amp;nbsp;=&amp;nbsp;[]){\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$str_ids&amp;nbsp;=&amp;nbsp;&amp;#39;&amp;#39;;\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;foreach($tag_ids&amp;nbsp;as&amp;nbsp;$v){\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$str_ids&amp;nbsp;.=&amp;nbsp;$v[&amp;#39;tag_id&amp;#39;].&amp;#39;,&amp;#39;;\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$arr_ids&amp;nbsp;=&amp;nbsp;explode(&amp;#39;,&amp;#39;,trim($str_ids,&amp;#39;,&amp;#39;));\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;return&amp;nbsp;$arr_ids;\n}\n\n/**\n&amp;nbsp;*&amp;nbsp;@param&amp;nbsp;array&amp;nbsp;$parent_button\n&amp;nbsp;*&amp;nbsp;@param&amp;nbsp;array&amp;nbsp;$son_button\n&amp;nbsp;*&amp;nbsp;@return&amp;nbsp;mixed\n&amp;nbsp;*&amp;nbsp;主要处理后台按钮\n&amp;nbsp;*/\npublic&amp;nbsp;static&amp;nbsp;function&amp;nbsp;button($parent_button&amp;nbsp;=&amp;nbsp;[],$son_button&amp;nbsp;=&amp;nbsp;[]){\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;foreach($parent_button&amp;nbsp;as&amp;nbsp;$k=&amp;gt;$v){\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;foreach($son_button&amp;nbsp;as&amp;nbsp;$k1=&amp;gt;$v1){\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;if($v1[&amp;#39;p_id&amp;#39;]&amp;nbsp;==&amp;nbsp;$v[&amp;#39;id&amp;#39;]){\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$button[$k][&amp;#39;parentButton&amp;#39;]&amp;nbsp;=&amp;nbsp;$v;\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$button[$k][&amp;#39;sonButton&amp;#39;][]&amp;nbsp;&amp;nbsp;=&amp;nbsp;$v1;\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;return&amp;nbsp;$button;\n}\n\n/**\n&amp;nbsp;*&amp;nbsp;@param&amp;nbsp;array&amp;nbsp;$data\n&amp;nbsp;*&amp;nbsp;读取配置文件\n&amp;nbsp;*/\npublic&amp;nbsp;static&amp;nbsp;function&amp;nbsp;&amp;nbsp;config($data&amp;nbsp;=&amp;nbsp;[]){\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;foreach($data&amp;nbsp;as&amp;nbsp;$v){\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$config[$v[&amp;#39;cname&amp;#39;]]&amp;nbsp;=&amp;nbsp;$v[&amp;#39;option&amp;#39;];\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}\n}&lt;/pre&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', 'public&nbsp;static&nbsp;function&nbsp;implodeTag($tag_ids&nbsp;=&nbsp;[]){\n&nbsp;&nbsp;&nbsp;&nbsp;$str_ids&nbsp;=&nbsp;&#39;&#39;;\n&nbsp;&nbsp;&nbsp;&nbsp;foreach($tag_ids&nbsp;as&nbsp;$v){\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$str_ids&nb');
INSERT INTO `blog_content` VALUES ('5', 'php中html标签过滤以及空格过滤', '3', '一俊', '0', '0', '5', '', '0', '1493720457', '1495294302', '&lt;pre class=&quot;brush:php;toolbar:false&quot;&gt;public&amp;nbsp;static&amp;nbsp;function&amp;nbsp;implodeTag($tag_ids&amp;nbsp;=&amp;nbsp;[]){\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$str_ids&amp;nbsp;=&amp;nbsp;&amp;#39;&amp;#39;;\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;foreach($tag_ids&amp;nbsp;as&amp;nbsp;$v){\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$str_ids&amp;nbsp;.=&amp;nbsp;$v[&amp;#39;tag_id&amp;#39;].&amp;#39;,&amp;#39;;\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$arr_ids&amp;nbsp;=&amp;nbsp;explode(&amp;#39;,&amp;#39;,trim($str_ids,&amp;#39;,&amp;#39;));\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;return&amp;nbsp;$arr_ids;\n}\n\n/**\n&amp;nbsp;*&amp;nbsp;@param&amp;nbsp;array&amp;nbsp;$parent_button\n&amp;nbsp;*&amp;nbsp;@param&amp;nbsp;array&amp;nbsp;$son_button\n&amp;nbsp;*&amp;nbsp;@return&amp;nbsp;mixed\n&amp;nbsp;*&amp;nbsp;主要处理后台按钮\n&amp;nbsp;*/\npublic&amp;nbsp;static&amp;nbsp;function&amp;nbsp;button($parent_button&amp;nbsp;=&amp;nbsp;[],$son_button&amp;nbsp;=&amp;nbsp;[]){\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;foreach($parent_button&amp;nbsp;as&amp;nbsp;$k=&amp;gt;$v){\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;foreach($son_button&amp;nbsp;as&amp;nbsp;$k1=&amp;gt;$v1){\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;if($v1[&amp;#39;p_id&amp;#39;]&amp;nbsp;==&amp;nbsp;$v[&amp;#39;id&amp;#39;]){\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$button[$k][&amp;#39;parentButton&amp;#39;]&amp;nbsp;=&amp;nbsp;$v;\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$button[$k][&amp;#39;sonButton&amp;#39;][]&amp;nbsp;&amp;nbsp;=&amp;nbsp;$v1;\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;return&amp;nbsp;$button;\n}\n\n/**\n&amp;nbsp;*&amp;nbsp;@param&amp;nbsp;array&amp;nbsp;$data\n&amp;nbsp;*&amp;nbsp;读取配置文件\n&amp;nbsp;*/\npublic&amp;nbsp;static&amp;nbsp;function&amp;nbsp;&amp;nbsp;config($data&amp;nbsp;=&amp;nbsp;[]){\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;foreach($data&amp;nbsp;as&amp;nbsp;$v){\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;$config[$v[&amp;#39;cname&amp;#39;]]&amp;nbsp;=&amp;nbsp;$v[&amp;#39;option&amp;#39;];\n&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;}\n}&lt;/pre&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;', 'public&nbsp;static&nbsp;function&nbsp;implodeTag($tag_ids&nbsp;=&nbsp;[]){\n&nbsp;&nbsp;&nbsp;&nbsp;$str_ids&nbsp;=&nbsp;&#39;&#39;;\n&nbsp;&nbsp;&nbsp;&nbsp;foreach($tag_ids&nbsp;as&nbsp;$v){\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$str_ids&nb');
INSERT INTO `blog_content` VALUES ('7', '22222', '6', '一俊', '0', '0', '0', 'content/20170524/59246122b7b55.PNG', '0', '1495295956', '1495556386', '&lt;p&gt;safdsadfsadfsdfsdfsdfsdfsdf&lt;/p&gt;', '&lt;p&gt;safdsadfsadfsdfsdfsdfsdfsdf&lt;');
INSERT INTO `blog_content` VALUES ('8', 'sdafasdf', '6', '一俊', '0', '0', '0', 'content/20170524/5924614717154.jpg', '0', '1495295988', '1495556423', '&lt;p&gt;sdfsadfsdf&lt;/p&gt;', '&lt;p&gt;sdfsadfsdf&lt;/p&gt;');

-- ----------------------------
-- Table structure for blog_content_tag
-- ----------------------------
DROP TABLE IF EXISTS `blog_content_tag`;
CREATE TABLE `blog_content_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL DEFAULT '0' COMMENT '文章ID编号',
  `tag_id` int(11) NOT NULL DEFAULT '0' COMMENT '标签的ID编号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_content_tag
-- ----------------------------
INSERT INTO `blog_content_tag` VALUES ('4', '15', '1');
INSERT INTO `blog_content_tag` VALUES ('11', '1', '1');
INSERT INTO `blog_content_tag` VALUES ('12', '5', '1');
INSERT INTO `blog_content_tag` VALUES ('13', '5', '2');
INSERT INTO `blog_content_tag` VALUES ('14', '5', '3');
INSERT INTO `blog_content_tag` VALUES ('15', '2', '1');
INSERT INTO `blog_content_tag` VALUES ('16', '2', '2');
INSERT INTO `blog_content_tag` VALUES ('20', '7', '1');
INSERT INTO `blog_content_tag` VALUES ('21', '7', '2');
INSERT INTO `blog_content_tag` VALUES ('23', '8', '1');
INSERT INTO `blog_content_tag` VALUES ('24', '8', '2');
INSERT INTO `blog_content_tag` VALUES ('25', '8', '3');
INSERT INTO `blog_content_tag` VALUES ('26', '3', '1');
INSERT INTO `blog_content_tag` VALUES ('27', '3', '2');

-- ----------------------------
-- Table structure for blog_link
-- ----------------------------
DROP TABLE IF EXISTS `blog_link`;
CREATE TABLE `blog_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_name` varchar(255) NOT NULL DEFAULT '' COMMENT '友情连接名称',
  `link_url` varchar(255) NOT NULL DEFAULT '' COMMENT '友情链接跳转地址',
  `link_contact` varchar(50) NOT NULL DEFAULT '' COMMENT '联系人',
  `link_method` varchar(255) NOT NULL DEFAULT '' COMMENT '联系方式',
  `link_method_num` varchar(255) NOT NULL DEFAULT '' COMMENT '联系方式的号码',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1是通过审核',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_link
-- ----------------------------
INSERT INTO `blog_link` VALUES ('4', '百度', 'http://www.baidu.com', '张兵', '微信', '18616250931', '1493979130', '1');

-- ----------------------------
-- Table structure for blog_menu
-- ----------------------------
DROP TABLE IF EXISTS `blog_menu`;
CREATE TABLE `blog_menu` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '' COMMENT '验证规则标识',
  `title` char(20) NOT NULL DEFAULT '' COMMENT '验证规则名称',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 是否启用',
  `condition` char(100) NOT NULL DEFAULT '',
  `p_id` int(11) NOT NULL DEFAULT '0' COMMENT '上级的ID编号',
  `is_show` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0显示，1不显示',
  `icon` varchar(20) NOT NULL DEFAULT '' COMMENT '图片标记（一般顶级栏目才有）',
  `orderby` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`) USING HASH
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_menu
-- ----------------------------
INSERT INTO `blog_menu` VALUES ('1', '', '系统管理', '1', '1', '', '0', '0', '#xe63c', '0');
INSERT INTO `blog_menu` VALUES ('2', '', '栏目管理', '1', '1', '', '0', '0', '#xe681', '0');
INSERT INTO `blog_menu` VALUES ('3', 'admin/menu/index', '权限管理', '1', '1', '', '1', '0', '', '0');
INSERT INTO `blog_menu` VALUES ('4', 'admin/menu/add', '添加权限', '1', '1', '', '1', '1', '', '0');
INSERT INTO `blog_menu` VALUES ('5', 'admin/menu/edit', '更新权限', '1', '1', '', '1', '1', '', '0');
INSERT INTO `blog_menu` VALUES ('6', 'admin/rule/index', '角色管理', '1', '1', '', '1', '0', '', '0');
INSERT INTO `blog_menu` VALUES ('7', 'admin/rule/add', '添加角色', '1', '1', '', '1', '1', '', '0');
INSERT INTO `blog_menu` VALUES ('8', 'admin/rule/edit', '修改角色', '1', '1', '', '1', '1', '', '0');
INSERT INTO `blog_menu` VALUES ('9', 'admin/admin/index', '管理员管理', '1', '1', '', '1', '0', '', '0');
INSERT INTO `blog_menu` VALUES ('10', 'admin/admin/add', '添加管理员', '1', '1', '', '1', '1', '', '0');
INSERT INTO `blog_menu` VALUES ('11', 'admin/admin/edit', '修改管理员', '1', '1', '', '1', '1', '', '0');
INSERT INTO `blog_menu` VALUES ('12', '', '内容管理', '1', '1', '', '0', '0', '#xe616', '0');
INSERT INTO `blog_menu` VALUES ('13', 'admin/content/index', '文章管理', '1', '1', '', '12', '0', '', '0');
INSERT INTO `blog_menu` VALUES ('14', 'admin/content/add', '添加文章', '1', '1', '', '12', '1', '', '0');
INSERT INTO `blog_menu` VALUES ('15', 'admin/content/edit', '修改文章', '1', '1', '', '12', '1', '', '0');
INSERT INTO `blog_menu` VALUES ('16', 'admin/content/delete', '删除文章', '1', '1', '', '12', '1', '', '0');
INSERT INTO `blog_menu` VALUES ('17', 'admin/tag/index', '标签管理', '1', '1', '', '12', '0', '', '0');
INSERT INTO `blog_menu` VALUES ('18', 'admin/tag/add', '添加标签', '1', '1', '', '12', '1', '', '0');
INSERT INTO `blog_menu` VALUES ('19', 'admin/tag/edit', '修改标签', '1', '1', '', '12', '1', '', '0');
INSERT INTO `blog_menu` VALUES ('20', 'admin/tag/delete', '删除标签', '1', '1', '', '12', '1', '', '0');
INSERT INTO `blog_menu` VALUES ('21', 'admin/type/index', '栏目列表', '1', '1', '', '2', '0', '', '0');
INSERT INTO `blog_menu` VALUES ('22', 'admin/type/add', '添加栏目', '1', '1', '', '2', '1', '', '0');
INSERT INTO `blog_menu` VALUES ('23', 'admin/type/edit', '修改栏目', '1', '1', '', '2', '1', '', '0');
INSERT INTO `blog_menu` VALUES ('24', 'admin/type/delete', '删除栏目', '1', '1', '', '2', '1', '', '0');
INSERT INTO `blog_menu` VALUES ('25', 'admin/base/index', '系统设置', '1', '1', '', '1', '0', '', '0');
INSERT INTO `blog_menu` VALUES ('26', '', '友情链接', '1', '1', '', '0', '0', '#xe6f1', '0');
INSERT INTO `blog_menu` VALUES ('27', 'admin/link/index', '链接列表', '1', '1', '', '26', '0', '', '0');
INSERT INTO `blog_menu` VALUES ('28', '', '源码分享', '1', '1', '', '0', '0', '#xe666', '0');
INSERT INTO `blog_menu` VALUES ('29', 'admin/share/index', '分享列表', '1', '1', '', '28', '0', '', '0');
INSERT INTO `blog_menu` VALUES ('30', 'admin/menu/delete', '删除权限', '1', '1', '', '1', '1', '', '0');
INSERT INTO `blog_menu` VALUES ('31', 'admin/rule/delete', '删除角色', '1', '1', '', '1', '1', '', '0');
INSERT INTO `blog_menu` VALUES ('32', 'admin/admin/delete', '删除管理员', '1', '1', '', '1', '1', '', '0');
INSERT INTO `blog_menu` VALUES ('33', 'admin/link/add', '增加链接', '1', '1', '', '26', '1', '', '0');
INSERT INTO `blog_menu` VALUES ('34', 'admin/link/edit', '修改链接', '1', '1', '', '26', '1', '', '0');
INSERT INTO `blog_menu` VALUES ('35', 'admin/link/delete', '删除链接', '1', '1', '', '26', '1', '', '0');
INSERT INTO `blog_menu` VALUES ('36', 'admin/share/add', '增加分享', '1', '1', '', '28', '1', '', '0');
INSERT INTO `blog_menu` VALUES ('37', 'admin/share/edit', '修改分享', '1', '1', '', '28', '1', '', '0');
INSERT INTO `blog_menu` VALUES ('38', 'admin/share/delete', '删除分享', '1', '1', '', '28', '1', '', '0');

-- ----------------------------
-- Table structure for blog_rule
-- ----------------------------
DROP TABLE IF EXISTS `blog_rule`;
CREATE TABLE `blog_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1启用，2禁用',
  `rules` varchar(500) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '角色分组注释',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_rule
-- ----------------------------
INSERT INTO `blog_rule` VALUES ('68', '中级管理员', '1', '2,21,22,23,24,12,13,14,15,16,17,18,19,20,26,27,33,34,35,28,29,36,37,38,', '点都不想写描述  what a fucking thing!!');
INSERT INTO `blog_rule` VALUES ('66', '超级管理员', '1', '1,3,4,5,6,7,8,9,10,11,25,2,21,22,23,24,12,13,14,15,16,17,18,19,20,26,27,28,29,', '点都不想写描述  what a fucking thing!');
INSERT INTO `blog_rule` VALUES ('67', '高级管理员', '1', '1,3,4,5,6,7,8,9,10,11,25,2,21,22,23,24,12,13,14,15,16,17,18,19,20,26,27,', '点都不想写描述  what a fucking thing!');
INSERT INTO `blog_rule` VALUES ('69', '一般管理员', '1', '1,3,4,5,6,7,8,9,10,11,25,2,21,22,23,24,', '点都不想写描述  what a fucking thing!');

-- ----------------------------
-- Table structure for blog_rule_menu
-- ----------------------------
DROP TABLE IF EXISTS `blog_rule_menu`;
CREATE TABLE `blog_rule_menu` (
  `rule_id` mediumint(8) unsigned NOT NULL,
  `menu_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `rule_id_menu_id` (`rule_id`,`menu_id`),
  KEY `urle_id` (`rule_id`),
  KEY `menu_id` (`menu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_rule_menu
-- ----------------------------
INSERT INTO `blog_rule_menu` VALUES ('50', '50');
INSERT INTO `blog_rule_menu` VALUES ('50', '51');
INSERT INTO `blog_rule_menu` VALUES ('50', '52');
INSERT INTO `blog_rule_menu` VALUES ('51', '53');
INSERT INTO `blog_rule_menu` VALUES ('51', '54');
INSERT INTO `blog_rule_menu` VALUES ('51', '55');
INSERT INTO `blog_rule_menu` VALUES ('52', '50');
INSERT INTO `blog_rule_menu` VALUES ('52', '51');
INSERT INTO `blog_rule_menu` VALUES ('53', '50');
INSERT INTO `blog_rule_menu` VALUES ('53', '52');
INSERT INTO `blog_rule_menu` VALUES ('53', '53');
INSERT INTO `blog_rule_menu` VALUES ('53', '54');
INSERT INTO `blog_rule_menu` VALUES ('53', '55');
INSERT INTO `blog_rule_menu` VALUES ('54', '50');
INSERT INTO `blog_rule_menu` VALUES ('54', '51');
INSERT INTO `blog_rule_menu` VALUES ('54', '52');
INSERT INTO `blog_rule_menu` VALUES ('55', '0');
INSERT INTO `blog_rule_menu` VALUES ('56', '50');
INSERT INTO `blog_rule_menu` VALUES ('56', '51');
INSERT INTO `blog_rule_menu` VALUES ('56', '52');
INSERT INTO `blog_rule_menu` VALUES ('57', '0');
INSERT INTO `blog_rule_menu` VALUES ('58', '0');
INSERT INTO `blog_rule_menu` VALUES ('59', '50');
INSERT INTO `blog_rule_menu` VALUES ('59', '51');
INSERT INTO `blog_rule_menu` VALUES ('60', '53');
INSERT INTO `blog_rule_menu` VALUES ('60', '54');
INSERT INTO `blog_rule_menu` VALUES ('61', '53');
INSERT INTO `blog_rule_menu` VALUES ('61', '54');
INSERT INTO `blog_rule_menu` VALUES ('66', '1');
INSERT INTO `blog_rule_menu` VALUES ('66', '2');
INSERT INTO `blog_rule_menu` VALUES ('66', '3');
INSERT INTO `blog_rule_menu` VALUES ('66', '4');
INSERT INTO `blog_rule_menu` VALUES ('66', '5');
INSERT INTO `blog_rule_menu` VALUES ('66', '6');
INSERT INTO `blog_rule_menu` VALUES ('66', '7');
INSERT INTO `blog_rule_menu` VALUES ('66', '8');
INSERT INTO `blog_rule_menu` VALUES ('66', '9');
INSERT INTO `blog_rule_menu` VALUES ('66', '10');
INSERT INTO `blog_rule_menu` VALUES ('66', '11');
INSERT INTO `blog_rule_menu` VALUES ('66', '12');
INSERT INTO `blog_rule_menu` VALUES ('66', '13');
INSERT INTO `blog_rule_menu` VALUES ('66', '14');
INSERT INTO `blog_rule_menu` VALUES ('66', '15');
INSERT INTO `blog_rule_menu` VALUES ('66', '16');
INSERT INTO `blog_rule_menu` VALUES ('66', '17');
INSERT INTO `blog_rule_menu` VALUES ('66', '18');
INSERT INTO `blog_rule_menu` VALUES ('66', '19');
INSERT INTO `blog_rule_menu` VALUES ('66', '20');
INSERT INTO `blog_rule_menu` VALUES ('66', '21');
INSERT INTO `blog_rule_menu` VALUES ('66', '22');
INSERT INTO `blog_rule_menu` VALUES ('66', '23');
INSERT INTO `blog_rule_menu` VALUES ('66', '24');
INSERT INTO `blog_rule_menu` VALUES ('66', '25');
INSERT INTO `blog_rule_menu` VALUES ('66', '26');
INSERT INTO `blog_rule_menu` VALUES ('66', '27');
INSERT INTO `blog_rule_menu` VALUES ('66', '28');
INSERT INTO `blog_rule_menu` VALUES ('66', '29');
INSERT INTO `blog_rule_menu` VALUES ('67', '1');
INSERT INTO `blog_rule_menu` VALUES ('67', '2');
INSERT INTO `blog_rule_menu` VALUES ('67', '3');
INSERT INTO `blog_rule_menu` VALUES ('67', '4');
INSERT INTO `blog_rule_menu` VALUES ('67', '5');
INSERT INTO `blog_rule_menu` VALUES ('67', '6');
INSERT INTO `blog_rule_menu` VALUES ('67', '7');
INSERT INTO `blog_rule_menu` VALUES ('67', '8');
INSERT INTO `blog_rule_menu` VALUES ('67', '9');
INSERT INTO `blog_rule_menu` VALUES ('67', '10');
INSERT INTO `blog_rule_menu` VALUES ('67', '11');
INSERT INTO `blog_rule_menu` VALUES ('67', '12');
INSERT INTO `blog_rule_menu` VALUES ('67', '13');
INSERT INTO `blog_rule_menu` VALUES ('67', '14');
INSERT INTO `blog_rule_menu` VALUES ('67', '15');
INSERT INTO `blog_rule_menu` VALUES ('67', '16');
INSERT INTO `blog_rule_menu` VALUES ('67', '17');
INSERT INTO `blog_rule_menu` VALUES ('67', '18');
INSERT INTO `blog_rule_menu` VALUES ('67', '19');
INSERT INTO `blog_rule_menu` VALUES ('67', '20');
INSERT INTO `blog_rule_menu` VALUES ('67', '21');
INSERT INTO `blog_rule_menu` VALUES ('67', '22');
INSERT INTO `blog_rule_menu` VALUES ('67', '23');
INSERT INTO `blog_rule_menu` VALUES ('67', '24');
INSERT INTO `blog_rule_menu` VALUES ('67', '25');
INSERT INTO `blog_rule_menu` VALUES ('67', '26');
INSERT INTO `blog_rule_menu` VALUES ('67', '27');
INSERT INTO `blog_rule_menu` VALUES ('68', '2');
INSERT INTO `blog_rule_menu` VALUES ('68', '12');
INSERT INTO `blog_rule_menu` VALUES ('68', '13');
INSERT INTO `blog_rule_menu` VALUES ('68', '14');
INSERT INTO `blog_rule_menu` VALUES ('68', '15');
INSERT INTO `blog_rule_menu` VALUES ('68', '16');
INSERT INTO `blog_rule_menu` VALUES ('68', '17');
INSERT INTO `blog_rule_menu` VALUES ('68', '18');
INSERT INTO `blog_rule_menu` VALUES ('68', '19');
INSERT INTO `blog_rule_menu` VALUES ('68', '20');
INSERT INTO `blog_rule_menu` VALUES ('68', '21');
INSERT INTO `blog_rule_menu` VALUES ('68', '22');
INSERT INTO `blog_rule_menu` VALUES ('68', '23');
INSERT INTO `blog_rule_menu` VALUES ('68', '24');
INSERT INTO `blog_rule_menu` VALUES ('68', '26');
INSERT INTO `blog_rule_menu` VALUES ('68', '27');
INSERT INTO `blog_rule_menu` VALUES ('68', '28');
INSERT INTO `blog_rule_menu` VALUES ('68', '29');
INSERT INTO `blog_rule_menu` VALUES ('68', '33');
INSERT INTO `blog_rule_menu` VALUES ('68', '34');
INSERT INTO `blog_rule_menu` VALUES ('68', '35');
INSERT INTO `blog_rule_menu` VALUES ('68', '36');
INSERT INTO `blog_rule_menu` VALUES ('68', '37');
INSERT INTO `blog_rule_menu` VALUES ('68', '38');
INSERT INTO `blog_rule_menu` VALUES ('69', '1');
INSERT INTO `blog_rule_menu` VALUES ('69', '2');
INSERT INTO `blog_rule_menu` VALUES ('69', '3');
INSERT INTO `blog_rule_menu` VALUES ('69', '4');
INSERT INTO `blog_rule_menu` VALUES ('69', '5');
INSERT INTO `blog_rule_menu` VALUES ('69', '6');
INSERT INTO `blog_rule_menu` VALUES ('69', '7');
INSERT INTO `blog_rule_menu` VALUES ('69', '8');
INSERT INTO `blog_rule_menu` VALUES ('69', '9');
INSERT INTO `blog_rule_menu` VALUES ('69', '10');
INSERT INTO `blog_rule_menu` VALUES ('69', '11');
INSERT INTO `blog_rule_menu` VALUES ('69', '21');
INSERT INTO `blog_rule_menu` VALUES ('69', '22');
INSERT INTO `blog_rule_menu` VALUES ('69', '23');
INSERT INTO `blog_rule_menu` VALUES ('69', '24');
INSERT INTO `blog_rule_menu` VALUES ('69', '25');

-- ----------------------------
-- Table structure for blog_share
-- ----------------------------
DROP TABLE IF EXISTS `blog_share`;
CREATE TABLE `blog_share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `git_url` varchar(255) NOT NULL,
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_share
-- ----------------------------
INSERT INTO `blog_share` VALUES ('1', 'http://git.oschina.net/tangyijun/framework/widget_preview', '1493974590');
INSERT INTO `blog_share` VALUES ('3', 'http://git.oschina.net/tangyijun/chat/widget_preview', '1493975281');

-- ----------------------------
-- Table structure for blog_tag
-- ----------------------------
DROP TABLE IF EXISTS `blog_tag`;
CREATE TABLE `blog_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(50) NOT NULL DEFAULT '' COMMENT '标签名称',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加标签的时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_tag
-- ----------------------------
INSERT INTO `blog_tag` VALUES ('1', 'thinkphp', '1493364612');
INSERT INTO `blog_tag` VALUES ('2', 'Linux', '1493364612');
INSERT INTO `blog_tag` VALUES ('3', 'Mysql', '1493364612');
INSERT INTO `blog_tag` VALUES ('4', 'jQury', '1495608548');
INSERT INTO `blog_tag` VALUES ('5', 'javaScript', '1495608620');

-- ----------------------------
-- Table structure for blog_type
-- ----------------------------
DROP TABLE IF EXISTS `blog_type`;
CREATE TABLE `blog_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '栏目的ID编号',
  `type_name` varchar(55) NOT NULL DEFAULT '' COMMENT '栏目的ID编号',
  `p_id` int(11) NOT NULL DEFAULT '0' COMMENT '父级栏目的ID编号',
  `model_id` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1文章模型，2独立模型,3作品展示',
  `order_by` int(255) NOT NULL DEFAULT '0' COMMENT '排序，升序排列',
  `type_description` varchar(255) NOT NULL DEFAULT '' COMMENT '栏目描述',
  `type_keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '栏目的关键词',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog_type
-- ----------------------------
INSERT INTO `blog_type` VALUES ('6', '代码片段', '0', '1', '0', '', '');
INSERT INTO `blog_type` VALUES ('7', '源码分享', '0', '3', '1', '', '');
INSERT INTO `blog_type` VALUES ('8', '微信开发', '0', '1', '0', '', '');
INSERT INTO `blog_type` VALUES ('9', 'Mysql', '0', '1', '0', '', '');
INSERT INTO `blog_type` VALUES ('10', 'Linux', '0', '1', '0', '', '');
INSERT INTO `blog_type` VALUES ('11', '随笔', '0', '1', '0', '', '');

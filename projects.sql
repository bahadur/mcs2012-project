/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : projects

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2014-01-11 18:52:12
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `categoryid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `order` int(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`categoryid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'On Hold', '1');
INSERT INTO `category` VALUES ('2', 'With Client', '2');

-- ----------------------------
-- Table structure for `company`
-- ----------------------------
DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `companyid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `contactTypeid` int(11) NOT NULL,
  `companyCode` decimal(20,0) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` decimal(50,0) DEFAULT NULL,
  `fax` decimal(50,0) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `address1` mediumtext,
  `address2` mediumtext,
  `address3` mediumtext,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zipCode` decimal(50,0) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `linkedin` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`companyid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of company
-- ----------------------------
INSERT INTO `company` VALUES ('1', 'e-dynamics', '1', '0', 'info@edynamics.com', null, null, 'http://www.edynamics.com', null, null, null, null, null, null, null, null, null, null);
INSERT INTO `company` VALUES ('2', 'Sale Soft', '1', '0', 'info@salesoft.com', null, null, 'http://www.salesoft.com', null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `companytype`
-- ----------------------------
DROP TABLE IF EXISTS `companytype`;
CREATE TABLE `companytype` (
  `companyTypeid` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`companyTypeid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of companytype
-- ----------------------------
INSERT INTO `companytype` VALUES ('1', 'Staff');
INSERT INTO `companytype` VALUES ('2', 'Client');
INSERT INTO `companytype` VALUES ('3', 'Contractor');
INSERT INTO `companytype` VALUES ('4', 'Other');

-- ----------------------------
-- Table structure for `contact`
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `contactid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `title` varchar(10) DEFAULT NULL,
  `workPhone` varchar(15) DEFAULT NULL,
  `homePhone` varchar(15) DEFAULT NULL,
  `mobilePhone` varchar(15) DEFAULT NULL,
  `fax` varchar(15) DEFAULT NULL,
  `contactType` int(11) NOT NULL,
  `companyid` int(11) DEFAULT NULL,
  `mainContact` int(2) NOT NULL DEFAULT '1',
  `allowLogin` int(2) NOT NULL DEFAULT '1',
  `address1` mediumtext,
  `address2` mediumtext,
  `address3` mediumtext,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `linkedin` varchar(100) DEFAULT NULL,
  `createDate` datetime NOT NULL,
  `activated` int(2) NOT NULL,
  PRIMARY KEY (`contactid`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of contact
-- ----------------------------
INSERT INTO `contact` VALUES ('1', 'Bahadur', 'Rai Oad', 'bahadur.oad@gmail.com', '040b7cf4a55014e185813e0644502ea9', 'Mr', ' 111010010', ' 0213524685', ' 03452677850', '0215578 458', '1', '1', '1', '1', ' P-6 Star Shelter Comples', ' Gulistan-e-Jouhar, Block 18', null, ' Karachi', ' Sindh', ' Pakistan', ' http://www.twitter.com/bahadur', ' http://www.facebook.com/bahadur', ' http://www.linkedin.com/bahadur', '2013-11-01 19:48:26', '1');
INSERT INTO `contact` VALUES ('2', 'Muhammad', 'Shahzad', 'shahzad@gmail.com', '040b7cf4a55014e185813e0644502ea9', 'Mr', null, null, null, null, '3', '1', '1', '1', null, null, null, null, null, null, null, null, null, '2013-11-10 19:48:26', '0');
INSERT INTO `contact` VALUES ('3', 'Naveed', 'Ahmed', 'naveed@gmail.com', '040b7cf4a55014e185813e0644502ea9', 'Mr', null, null, null, null, '3', '1', '0', '1', null, null, null, null, null, null, null, null, null, '2013-11-19 19:48:26', '0');
INSERT INTO `contact` VALUES ('4', 'Abdul', 'Kareem', 'abdul.kareem@gmail.com', '040b7cf4a55014e185813e0644502ea9', 'Mr', null, null, null, null, '3', '1', '0', '1', null, null, null, null, null, null, null, null, null, '2013-11-21 19:48:26', '0');
INSERT INTO `contact` VALUES ('5', 'Atif', 'Ahmed', 'atif.ahmed', '040b7cf4a55014e185813e0644502ea9', 'Mr', null, null, null, null, '3', '1', '0', '1', null, null, null, null, null, null, null, null, null, '2013-11-23 19:48:26', '0');
INSERT INTO `contact` VALUES ('6', 'Muhammad', 'Ali', 'mali@gmail.com', '040b7cf4a55014e185813e0644502ea9', 'Mr', null, null, null, null, '2', '1', '0', '1', null, null, null, null, null, null, null, null, null, '2013-11-26 19:48:26', '1');
INSERT INTO `contact` VALUES ('7', 'Saqib', 'Ali', 'saqib@gmail.com', '040b7cf4a55014e185813e0644502ea9', 'Mr', null, null, null, null, '2', '1', '0', '1', null, null, null, null, null, null, null, null, null, '2013-11-22 19:48:26', '0');
INSERT INTO `contact` VALUES ('8', 'Imadad', 'Daudpota', 'imdad@gmail.com', '040b7cf4a55014e185813e0644502ea9', 'Mr', null, null, null, null, '2', '1', '0', '1', null, null, null, null, null, null, null, null, null, '2013-11-11 19:48:26', '0');
INSERT INTO `contact` VALUES ('9', 'Amir', 'Hussain', 'amir@gmail.com', '040b7cf4a55014e185813e0644502ea9', 'Mr', null, null, null, null, '2', '1', '0', '1', null, null, null, null, null, null, null, null, null, '2013-11-13 19:48:26', '0');
INSERT INTO `contact` VALUES ('10', 'Kamran', 'Khan', 'kamran@gmail.com', '040b7cf4a55014e185813e0644502ea9', 'Mr', null, null, null, null, '2', '1', '0', '1', null, null, null, null, null, null, null, null, null, '2013-11-15 19:48:26', '0');
INSERT INTO `contact` VALUES ('11', 'Hyder Ali', 'Shah', 'hyder@gmail.com', '040b7cf4a55014e185813e0644502ea9', 'Mr', null, null, null, null, '3', '1', '0', '1', null, null, null, null, null, null, null, null, null, '2013-11-02 19:48:26', '0');
INSERT INTO `contact` VALUES ('20', 'Bahadur', 'Rai', 'bahadur_oad@yahoo.com', '040b7cf4a55014e185813e0644502ea9', 'Mr', '(255) 659-8956', '(565) 978-9556', '(564) 987-9865', '(448) 959-5965', '3', '1', '1', '1', 'Flat no P6 Star Shelter', 'Block-18', 'Gulistan-e-Jouhar', 'Karachi', 'Sindh', 'Pakistan', 'www.twitter.com/bahadur', 'www.facebook.com/bahadur', 'www.linkedin.com/bahadur', '2013-11-17 13:37:39', '1');
INSERT INTO `contact` VALUES ('21', 'Shahzad', 'Ahmed', 'shahzadahmed119@hotmail.com', '040b7cf4a55014e185813e0644502ea9', 'Mr', '(215) 478-9912', '(115) 448-7985', '(115) 448-9856', '(145) 487-9554', '3', '1', '1', '1', 'Flat kamran chorangi', '', '', 'Karachi', 'Sindh', 'Pakistan', 'www.twitter.com/shahzad', 'www.facebook.com/shahzad', 'www.linkedin.com/shahzad', '2013-11-17 13:40:59', '1');
INSERT INTO `contact` VALUES ('22', 'abc', 'xyz', 'abcxyz@hotmail.com', '70fb874a43097a25234382390c0baeb3', 'Mr', '(333) 889-4287', '', '(333) 887-4289', '', '3', '1', '1', '1', 'lives in the middle of nowhere', '', '', 'not known', '', 'not known', '', '', '', '2013-11-17 22:17:33', '0');

-- ----------------------------
-- Table structure for `contacttype`
-- ----------------------------
DROP TABLE IF EXISTS `contacttype`;
CREATE TABLE `contacttype` (
  `contactTypeid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`contactTypeid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of contacttype
-- ----------------------------
INSERT INTO `contacttype` VALUES ('1', 'Administrator');
INSERT INTO `contacttype` VALUES ('2', 'Project Manager');
INSERT INTO `contacttype` VALUES ('3', 'Team Member');
INSERT INTO `contacttype` VALUES ('4', 'Client');

-- ----------------------------
-- Table structure for `member_task`
-- ----------------------------
DROP TABLE IF EXISTS `member_task`;
CREATE TABLE `member_task` (
  `rowid` int(11) NOT NULL AUTO_INCREMENT,
  `taskid` int(11) NOT NULL,
  `contactid` int(11) NOT NULL,
  PRIMARY KEY (`rowid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of member_task
-- ----------------------------
INSERT INTO `member_task` VALUES ('1', '1', '4');
INSERT INTO `member_task` VALUES ('2', '1', '5');

-- ----------------------------
-- Table structure for `menu`
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `menuid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `component` varchar(255) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `parentid` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`menuid`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', 'Accounts', 'account', 'icon-group', '0', '2');
INSERT INTO `menu` VALUES ('2', 'Create', 'account/create', 'icon-plus', '1', '1');
INSERT INTO `menu` VALUES ('3', 'Summary', 'account/summary', 'icon-reorder', '1', '2');
INSERT INTO `menu` VALUES ('4', 'Projects', 'project', 'icon-building', '0', '3');
INSERT INTO `menu` VALUES ('5', 'Create', 'project/create', 'icon-plus', '4', '1');
INSERT INTO `menu` VALUES ('6', 'Summary', 'project/summary', 'icon-reorder', '4', '2');
INSERT INTO `menu` VALUES ('7', 'Tasks', 'task', 'icon-signout', '0', '4');
INSERT INTO `menu` VALUES ('8', 'Assign', 'task/assing', 'icon-gears', '7', '1');
INSERT INTO `menu` VALUES ('9', 'Summary', 'task/summary', '', '7', '2');
INSERT INTO `menu` VALUES ('10', 'Messages', 'message', 'icon-envelope', '0', '5');
INSERT INTO `menu` VALUES ('11', 'All', 'message', 'icon-envelope', '10', '1');
INSERT INTO `menu` VALUES ('14', 'Reports', 'report', 'icon-edit', '0', '6');
INSERT INTO `menu` VALUES ('15', 'Create', 'report/create', '', '14', '1');
INSERT INTO `menu` VALUES ('16', 'Dashboard', 'home', 'icon-home', '0', '1');
INSERT INTO `menu` VALUES ('17', 'Create', 'message/create', '', '10', '2');

-- ----------------------------
-- Table structure for `message`
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `msgid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fromid` int(11) NOT NULL,
  `toid` int(11) NOT NULL,
  `subject` varchar(225) DEFAULT NULL,
  `message` text NOT NULL,
  `msgtime` datetime NOT NULL,
  `isread` tinyint(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`msgid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of message
-- ----------------------------
INSERT INTO `message` VALUES ('1', '2', '1', 'test', 'Just test this', '2013-11-14 16:35:35', '1');
INSERT INTO `message` VALUES ('2', '3', '1', 'Other test', 'This is message testing 	', '2013-11-14 12:05:04', '1');

-- ----------------------------
-- Table structure for `notification`
-- ----------------------------
DROP TABLE IF EXISTS `notification`;
CREATE TABLE `notification` (
  `notificationid` int(11) NOT NULL AUTO_INCREMENT,
  `managerid` int(11) NOT NULL,
  `note` text,
  `notetime` datetime NOT NULL,
  PRIMARY KEY (`notificationid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of notification
-- ----------------------------

-- ----------------------------
-- Table structure for `permission`
-- ----------------------------
DROP TABLE IF EXISTS `permission`;
CREATE TABLE `permission` (
  `permissionid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `roleid` int(11) NOT NULL,
  `menuid` int(11) NOT NULL,
  PRIMARY KEY (`permissionid`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of permission
-- ----------------------------
INSERT INTO `permission` VALUES ('1', '1', '1');
INSERT INTO `permission` VALUES ('2', '1', '2');
INSERT INTO `permission` VALUES ('3', '1', '3');
INSERT INTO `permission` VALUES ('4', '1', '4');
INSERT INTO `permission` VALUES ('5', '1', '5');
INSERT INTO `permission` VALUES ('6', '1', '6');
INSERT INTO `permission` VALUES ('7', '2', '7');
INSERT INTO `permission` VALUES ('8', '2', '8');
INSERT INTO `permission` VALUES ('9', '2', '9');
INSERT INTO `permission` VALUES ('10', '1', '10');
INSERT INTO `permission` VALUES ('11', '1', '11');
INSERT INTO `permission` VALUES ('12', '1', '12');
INSERT INTO `permission` VALUES ('13', '1', '13');
INSERT INTO `permission` VALUES ('14', '1', '14');
INSERT INTO `permission` VALUES ('15', '1', '15');
INSERT INTO `permission` VALUES ('16', '1', '16');
INSERT INTO `permission` VALUES ('17', '2', '4');
INSERT INTO `permission` VALUES ('19', '2', '6');
INSERT INTO `permission` VALUES ('23', '2', '10');
INSERT INTO `permission` VALUES ('24', '3', '7');
INSERT INTO `permission` VALUES ('25', '3', '9');
INSERT INTO `permission` VALUES ('26', '3', '10');
INSERT INTO `permission` VALUES ('27', '2', '16');
INSERT INTO `permission` VALUES ('28', '3', '16');

-- ----------------------------
-- Table structure for `priority`
-- ----------------------------
DROP TABLE IF EXISTS `priority`;
CREATE TABLE `priority` (
  `priorityid` int(11) NOT NULL AUTO_INCREMENT,
  `priority` varchar(225) NOT NULL,
  PRIMARY KEY (`priorityid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of priority
-- ----------------------------
INSERT INTO `priority` VALUES ('1', 'Very High');
INSERT INTO `priority` VALUES ('2', 'High');
INSERT INTO `priority` VALUES ('3', 'Medium');
INSERT INTO `priority` VALUES ('4', 'Low');
INSERT INTO `priority` VALUES ('5', 'Very Low');

-- ----------------------------
-- Table structure for `project`
-- ----------------------------
DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `projectid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `managerid` int(11) NOT NULL,
  `clientaccess` int(11) NOT NULL,
  `dateStart` datetime NOT NULL,
  `dueDate` datetime DEFAULT NULL,
  `priority` int(11) NOT NULL,
  `timeAllocated` time DEFAULT NULL,
  `qoutedPrice` int(50) DEFAULT NULL,
  `invoicePrice` int(50) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`projectid`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project
-- ----------------------------
INSERT INTO `project` VALUES ('1', 'ERP', '1', '6', '0', '2013-10-10 09:47:45', '2013-10-31 09:47:50', '1', null, null, null, '');
INSERT INTO `project` VALUES ('2', 'Website', '1', '2', '1', '2013-10-10 09:47:45', '2013-10-31 09:47:50', '1', null, null, null, null);
INSERT INTO `project` VALUES ('3', 'Iphone development', '2', '6', '0', '2013-10-10 09:47:45', '2013-10-31 09:47:50', '1', null, null, null, '');
INSERT INTO `project` VALUES ('4', 'Android Development', '3', '6', '0', '2013-10-10 09:47:45', '2013-10-31 09:47:50', '1', null, null, null, '');
INSERT INTO `project` VALUES ('7', 'Wesite for stocks', '4', '6', '1', '2013-11-28 18:09:00', '2013-12-28 18:09:00', '2', null, null, null, 'First website for stocks');
INSERT INTO `project` VALUES ('18', 'Web Marketing', '1', '7', '0', '2014-01-08 12:15:15', '2014-02-12 12:15:15', '2', null, null, null, '');

-- ----------------------------
-- Table structure for `project_category`
-- ----------------------------
DROP TABLE IF EXISTS `project_category`;
CREATE TABLE `project_category` (
  `projectCategoryid` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(225) NOT NULL,
  PRIMARY KEY (`projectCategoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_category
-- ----------------------------
INSERT INTO `project_category` VALUES ('1', 'Running');
INSERT INTO `project_category` VALUES ('2', 'On Hold');
INSERT INTO `project_category` VALUES ('3', 'Completed');
INSERT INTO `project_category` VALUES ('4', 'Canceled');

-- ----------------------------
-- Table structure for `project_memebers`
-- ----------------------------
DROP TABLE IF EXISTS `project_memebers`;
CREATE TABLE `project_memebers` (
  `rowid` int(11) NOT NULL AUTO_INCREMENT,
  `projectid` int(11) NOT NULL,
  `contactid` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  PRIMARY KEY (`rowid`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of project_memebers
-- ----------------------------
INSERT INTO `project_memebers` VALUES ('13', '4', '3', '0');
INSERT INTO `project_memebers` VALUES ('17', '3', '11', '4');
INSERT INTO `project_memebers` VALUES ('18', '7', '5', '3');
INSERT INTO `project_memebers` VALUES ('19', '1', '2', '1');
INSERT INTO `project_memebers` VALUES ('20', '1', '2', '2');

-- ----------------------------
-- Table structure for `role`
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `roleid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`roleid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', 'Administrator');
INSERT INTO `role` VALUES ('2', 'Project Manager');
INSERT INTO `role` VALUES ('3', 'Team Member');
INSERT INTO `role` VALUES ('4', 'Client');

-- ----------------------------
-- Table structure for `task`
-- ----------------------------
DROP TABLE IF EXISTS `task`;
CREATE TABLE `task` (
  `taskid` int(11) NOT NULL AUTO_INCREMENT,
  `projectid` int(11) NOT NULL,
  `taskName` varchar(225) NOT NULL,
  `order` float(10,5) DEFAULT NULL,
  `taskStyle` varchar(50) NOT NULL,
  `description` mediumtext,
  `startDate` datetime NOT NULL,
  `timeAllocate` varchar(50) DEFAULT NULL,
  `dueDate` datetime DEFAULT NULL,
  `priority` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`taskid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of task
-- ----------------------------
INSERT INTO `task` VALUES ('1', '3', 'Initial Design layout', '1.00000', '1', null, '2013-10-11 09:47:45', null, '2013-10-22 09:47:45', '1', '1');
INSERT INTO `task` VALUES ('2', '4', 'Wireframe desing', '1.00000', '1', null, '2013-10-10 09:47:45', null, '2013-10-15 09:47:45', '1', '1');
INSERT INTO `task` VALUES ('3', '1', 'abc', '1.00000', '1', null, '2014-01-11 18:45:06', null, '2014-01-25 18:45:14', '1', '1');
INSERT INTO `task` VALUES ('4', '7', 'xyz', '1.00000', '1', null, '2014-01-11 18:45:46', null, '2014-01-29 18:45:49', '1', '1');

-- ----------------------------
-- Table structure for `task_style`
-- ----------------------------
DROP TABLE IF EXISTS `task_style`;
CREATE TABLE `task_style` (
  `taskStyleid` int(11) NOT NULL AUTO_INCREMENT,
  `taskStyle` varchar(225) NOT NULL,
  PRIMARY KEY (`taskStyleid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of task_style
-- ----------------------------

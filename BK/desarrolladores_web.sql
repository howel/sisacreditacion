/*
Navicat MySQL Data Transfer

Source Server         : disco D
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : sisacreditacion

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2014-11-03 12:33:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for desarrolladores_web
-- ----------------------------
DROP TABLE IF EXISTS `desarrolladores_web`;
CREATE TABLE `desarrolladores_web` (
  `id_desarrolladoresweb` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_desarrolladoresweb`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of desarrolladores_web
-- ----------------------------
INSERT INTO `desarrolladores_web` VALUES ('1', 'https://scontent-b-mia.xx.fbcdn.net/hphotos-prn2/t1.0-9/1476444_473956026056345_1386278107_n.jpg', 'Ing. Miguel Angel Valles Coral');
INSERT INTO `desarrolladores_web` VALUES ('2', 'https://fbcdn-sphotos-c-a.akamaihd.net/hphotos-ak-xaf1/t31.0-8/10697180_782521438472547_4811169088481149226_o.jpg', 'Howel Corporation Jhowel Altamirano Vega');
INSERT INTO `desarrolladores_web` VALUES ('3', 'https://scontent-a-lga.xx.fbcdn.net/hphotos-xap1/v/t1.0-9/10314697_738938626145883_3895300915569642377_n.jpg?oh=6692991751f8d1c09c14c262319ab6f7&oe=54F609B4', 'Miriam Guerra Moncada');
INSERT INTO `desarrolladores_web` VALUES ('4', 'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-xap1/t31.0-8/s960x960/10628821_776416475752188_3609739603922376449_o.jpg', 'Luis Andre Perez Tangoa');
INSERT INTO `desarrolladores_web` VALUES ('5', 'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-xfp1/v/t1.0-9/1924879_589972431108712_3921945700096238657_n.jpg?oh=57cb538590b9317471d87ad40e1ede59&oe=54F4A298&__gda__=1425191683_2c610e9987630d28947b4097f6a0e3ea', 'Jhoselyn Brigit Guevara Rojas');
INSERT INTO `desarrolladores_web` VALUES ('6', 'https://scontent-a-lga.xx.fbcdn.net/hphotos-xap1/v/t1.0-9/1926880_392889410849344_1042170776_n.jpg?oh=6fcad5e42a0b9a4c2467befb6765aa87&oe=54E3374F', '\r\nElvis Bravo Sandoval\r\nElvis Bravo Sandoval');
INSERT INTO `desarrolladores_web` VALUES ('7', 'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-xfp1/v/t1.0-9/10368276_803953939671481_4396607061697616886_n.jpg?oh=51877fbbca658faca9af6afdcd5963d4&oe=54F0AEC0&__gda__=1423549513_a1afd766044f59c34be0674c4a8a42b7', 'Catherine López Archenti');
INSERT INTO `desarrolladores_web` VALUES ('8', 'https://scontent-a-lga.xx.fbcdn.net/hphotos-xaf1/t31.0-8/10547883_777684265622081_206433795455152037_o.jpg', '\r\nJewel Francois Pinedo Vargas');
INSERT INTO `desarrolladores_web` VALUES ('10', 'https://scontent-a-lga.xx.fbcdn.net/hphotos-xpa1/v/t1.0-9/10628489_1491136364469292_1194445597579108455_n.jpg?oh=29f10b0459261fe6816efe6df0098614&oe=54E565F7', 'Dan Kenn');
INSERT INTO `desarrolladores_web` VALUES ('11', 'https://fbcdn-sphotos-f-a.akamaihd.net/hphotos-ak-xap1/v/t1.0-9/10614334_1558231127744380_546057796905627550_n.jpg?oh=785e3eb0d08285677b4d5b79ae076737&oe=54D7EA5F&__gda__=1425016963_03b33e14dcb5aa6344f652f25a36c53c', 'Ken Müller Gotze Dos Santos');
INSERT INTO `desarrolladores_web` VALUES ('12', 'https://scontent-a-lga.xx.fbcdn.net/hphotos-ash2/v/t1.0-9/574595_579533448736711_1817676466_n.jpg?oh=e6f53afe37dbd467ae574abb97732517&oe=54DDFEED', 'Brayan Dante');
INSERT INTO `desarrolladores_web` VALUES ('13', 'https://fbcdn-sphotos-c-a.akamaihd.net/hphotos-ak-xaf1/t31.0-8/10697180_782521438472547_4811169088481149226_o.jpg', 'Howel Corporation Jhowel Altamirano Vega');
INSERT INTO `desarrolladores_web` VALUES ('14', 'https://scontent-a-lga.xx.fbcdn.net/hphotos-xap1/v/t1.0-9/10314697_738938626145883_3895300915569642377_n.jpg?oh=6692991751f8d1c09c14c262319ab6f7&oe=54F609B4', 'Miriam Guerra Moncada');
INSERT INTO `desarrolladores_web` VALUES ('15', 'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-xap1/t31.0-8/s960x960/10628821_776416475752188_3609739603922376449_o.jpg', 'Luis Andre Perez Tangoa');
INSERT INTO `desarrolladores_web` VALUES ('16', 'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-xfp1/v/t1.0-9/1924879_589972431108712_3921945700096238657_n.jpg?oh=57cb538590b9317471d87ad40e1ede59&oe=54F4A298&__gda__=1425191683_2c610e9987630d28947b4097f6a0e3ea', 'Jhoselyn Brigit Guevara Rojas');
INSERT INTO `desarrolladores_web` VALUES ('17', 'https://scontent-a-lga.xx.fbcdn.net/hphotos-xap1/v/t1.0-9/1926880_392889410849344_1042170776_n.jpg?oh=6fcad5e42a0b9a4c2467befb6765aa87&oe=54E3374F', 'Elvis Bravo Sandoval');
INSERT INTO `desarrolladores_web` VALUES ('18', 'https://fbcdn-sphotos-b-a.akamaihd.net/hphotos-ak-xfp1/v/t1.0-9/10368276_803953939671481_4396607061697616886_n.jpg?oh=51877fbbca658faca9af6afdcd5963d4&oe=54F0AEC0&__gda__=1423549513_a1afd766044f59c34be0674c4a8a42b7', 'Catherine López Archenti');

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE `accounts` (
  `guid` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(30) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `vip` int(11) NOT NULL DEFAULT '0',
  `ipRegister` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `lastIP` varchar(15) NOT NULL,
  `lastConnectionDate` varchar(100) NOT NULL,
  `question` varchar(100) NOT NULL DEFAULT 'DELETE?',
  `reponse` varchar(100) NOT NULL DEFAULT 'DELETE',
  `pseudo` varchar(30) NOT NULL,
  `banned` tinyint(3) NOT NULL DEFAULT '0',
  `reload_needed` tinyint(1) NOT NULL DEFAULT '1',
  `kamas` bigint(31) NOT NULL DEFAULT '0',
  `objets` text NOT NULL,
  `friends` text NOT NULL,
  `enemy` text NOT NULL,
  `etable` text NOT NULL,
  `logged` int(1) NOT NULL DEFAULT '0',
  `points` int(11) NOT NULL DEFAULT '0',
  `cadeau` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`guid`),
  UNIQUE KEY `account` (`account`)
) ENGINE=MyISAM AUTO_INCREMENT=1958 DEFAULT CHARSET=latin1;

-- ----------------------------
-- ----------------------------

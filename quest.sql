-- Adminer 4.7.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `qu1`;
CREATE TABLE `qu1` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `reponse1` varchar(250) NOT NULL,
  `question1` varchar(250) NOT NULL,
  `categorie` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `qu1` (`id`, `reponse1`, `question1`, `categorie`) VALUES
(1,	'11',	'Combien font 1+10 ?',	'Facile'),
(2,	'Paris',	'Quelle est la capitale de la France ?',	'Moyen'),
(3,	'365',	'Combien de jours en une annÃ©e ?',	'Expert'),
(5,	'3600',	'Combien de seconde dans une minute ?',	'Expert'),
(6,	'4',	'Combien de cÃ´tÃ©s possÃ¨de un carrÃ© ?',	'Facile'),
(7,	'#',	'Quel est le signe du hashtag ?',	'Expert'),
(8,	'3,14',	'Quel est le nombre Pi ?',	'Moyen'),
(9,	'1',	'Combien font 7 modulo 3 ?',	'Moyen'),
(10,	'Un langage',	'Qu\'est ce que le Python ?',	'Facile');

INSERT INTO `questionnaire` (`id`, `quest1`, `link`, `categorie`) VALUES
(1,	'Questionnaire 1',	'http://localhost/projects/QuestData/quest1.php',	'Logique'),
(2,	'Questionnaire 2',	'http://localhost/projects/QuestData/quest2.php',	'Langage'),
(3,	'Questionnaire 3',	'http://localhost/projects/QuestData/quest3.php',	'Code');

INSERT INTO `questLink` (`id`, `quest1L`) VALUES
(1,	'Questionnaire 1'),
(2,	'Questionnaire 2');

INSERT INTO `Statutmembre` (`id`, `username`) VALUES
(2,	'jack'),
(1,	'john');

INSERT INTO `Statutquiz` (`id-st`, `username`, `inputType`) VALUES
(51,	'jack',	'Paris'),
(52,	'jack',	'Paris'),
(53,	'jack',	'Paris'),
(54,	'jack',	'Paris'),
(55,	'john',	'rouge'),
(56,	'john',	'rouge'),
(57,	'john',	'rouge'),
(58,	'john',	'rouge'),
(59,	'john',	'rouge'),
(60,	'john',	'Paris'),
(61,	'john',	'RHYH'),
(62,	'john',	'Paris'),
(63,	'john',	'rouge'),
(64,	'john',	'rouge'),
(65,	'john',	'rouge'),
(66,	'john',	'rouge'),
(67,	'john',	'rouge'),
(68,	'john',	'rouge'),
(69,	'john',	'rouge'),
(70,	'john',	'rouge'),
(71,	'john',	'Paris'),
(72,	'john',	'Paris'),
(73,	'john',	'Paris'),
(74,	'john',	'Paris'),
(75,	'john',	'Paris'),
(76,	'john',	'Paris'),
(77,	'john',	'Paris'),
(78,	'john',	'Paris'),
(79,	'john',	'Paris'),
(80,	'john',	'Paris'),
(81,	'john',	'GTR'),
(82,	'john',	'rouge'),
(83,	'john',	'rouge'),
(84,	'john',	'Paris'),
(85,	'fred',	'rouge'),
(86,	'fred',	'Paris'),
(87,	'john',	'rouge'),
(88,	'john',	'rouge'),
(89,	'fred',	'2016'),
(90,	'john',	'rouge'),
(91,	'john',	'rouge'),
(92,	'john',	'rouge'),
(93,	'john',	'rouge'),
(94,	'john',	'rouge'),
(95,	'john',	'rouge'),
(96,	'john',	'rouge'),
(97,	'john',	'rouge'),
(98,	'john',	'rouge'),
(99,	'Fred',	'rouge'),
(100,	'Fred',	'rouge'),
(101,	'Fred',	'noire'),
(102,	'Fred',	'noire'),
(103,	'Fred',	'noire'),
(104,	'Fred',	'noire'),
(105,	'Fred',	'noire'),
(106,	'Fred',	'noire'),
(107,	'Fred',	'noire'),
(108,	'Fred',	'noire'),
(109,	'Fred',	'noire'),
(110,	'Fred',	'noire'),
(111,	'Fred',	'noire'),
(112,	'Fred',	'rouge'),
(113,	'Fred',	'rouge'),
(114,	'Fred',	'Paris'),
(115,	'Fred',	'rouge'),
(116,	'Fred',	'Paris'),
(117,	'Fred',	'Paris'),
(118,	'Fred',	'4'),
(119,	'Fred',	'4'),
(120,	'Fred',	'4'),
(121,	'john',	'rouge'),
(122,	'john',	'rouge'),
(123,	'john',	'noire'),
(124,	'Jojo',	'rouge'),
(125,	'Jojo',	'noire'),
(126,	'Jojo',	'2'),
(127,	'Jojo',	'9'),
(128,	'Jojo',	'Un langage'),
(129,	'Jojo',	'langage');

INSERT INTO `users` (`id`, `admins`, `username`, `password`, `email`) VALUES
(4,	'',	'fred',	'$2y$12$1IODVzlCd1VIg3tecxOPK./iXdZ7/J/i1/toRslDSYjVQOBL7GZOW',	'exonet3i@gmail.com'),
(5,	'',	'john',	'$2y$12$Gyb5RJ0NCA1IrQ8iVZ0XnenyOPCXPBeexdb/AzTO4x521PyBN93K2',	'exone@gmail.com'),
(6,	'admin',	'',	'$2y$12$fu/WyEjCS.hKgT3oLYpDLeCg7eycWeg5LcP24julHeLXFHQl4gRcC',	'webmst@exonet3i.com'),
(7,	'',	'Jojo',	'$2y$12$N54kHSNw1N.JAqGhvNYnd.AmyBw5WOZsxstx1z1Oc3XH6uQGMcJHO',	'exonet3i@gmail.com');

-- 2019-04-29 14:30:58

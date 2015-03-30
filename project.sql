SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `location` varchar(100) DEFAULT NULL,
  `anno` varchar(4) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `residential` tinyint(1) DEFAULT NULL,
  `collaboration` tinyint(1) DEFAULT NULL,
  `competition` tinyint(1) DEFAULT NULL,
  `nimgs` int(3) DEFAULT NULL,
  `cover` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

INSERT INTO `project` (`id`, `nome`, `location`, `anno`, `description`, `residential`, `collaboration`, `competition`, `nimgs`, `cover`) VALUES
(1, '68 St. George&#39;s Square', 'London', '2014', '&nbsp;', 1, 0, 0, 7, 0),
(2, 'Centenary Square', 'Birmingham', '2014', '&nbsp;', 0, 0, 1, 4, 1),
(3, 'Industrial Re-use', 'Albino | Italy', '2012', '&nbsp;', 0, 0, 1, 4, 3),
(4, 'Masterplan for Bari', 'Bari | Italy', '2010', '&nbsp;', 0, 0, 1, 7, 2),
(5, 'King&#39;s Road', 'London', '2010', '&nbsp;', 1, 0, 0, 7, 0),
(6, '116 B Highlever Rd', 'London', '2014', '&nbsp;', 0, 1, 0, 10, 9),
(7, 'Henhurst Lodge', 'Surrey', '2013', '&nbsp;', 0, 1, 0, 7, 6),
(8, 'Alderney St', 'London', '2011', '&nbsp;', 1, 0, 0, 6, 0),
(9, 'Denbigh St', 'London', '2014', '&nbsp;', 1, 0, 0, 6, 2);
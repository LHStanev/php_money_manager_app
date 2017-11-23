-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.26-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for money_app
CREATE DATABASE IF NOT EXISTS `money_app` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `money_app`;

-- Dumping structure for table money_app.operations
CREATE TABLE IF NOT EXISTS `operations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` char(1) NOT NULL,
  `reason_id` int(10) unsigned NOT NULL,
  `sum` decimal(7,2) unsigned NOT NULL,
  `notes` text NOT NULL,
  `on_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `for_date` timestamp NULL DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_users` (`user_id`),
  KEY `FK_reasons` (`reason_id`),
  CONSTRAINT `FK_reasons` FOREIGN KEY (`reason_id`) REFERENCES `reasons` (`id`),
  CONSTRAINT `FK_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table money_app.operations: ~5 rows (approximately)
/*!40000 ALTER TABLE `operations` DISABLE KEYS */;
INSERT INTO `operations` (`id`, `type`, `reason_id`, `sum`, `notes`, `on_date`, `for_date`, `user_id`) VALUES
	(2, 'I', 2, 2400.00, 'George', '2017-11-12 16:31:28', '2017-11-16 00:00:00', 1),
	(6, 'I', 2, 2400.00, 'George', '2017-11-23 12:56:08', '2017-11-16 00:00:00', 10),
	(7, 'O', 4, 400.00, 'Marry', '2017-11-23 22:27:58', '2017-11-19 00:00:00', 9),
	(8, 'I', 2, 2400.00, 'George', '2017-11-23 22:31:19', '2017-11-16 00:00:00', 9),
	(9, 'O', 3, 12.00, 'Coffee with Bill', '2017-11-23 23:35:55', '2017-11-26 00:00:00', 9);
/*!40000 ALTER TABLE `operations` ENABLE KEYS */;

-- Dumping structure for table money_app.reasons
CREATE TABLE IF NOT EXISTS `reasons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table money_app.reasons: ~4 rows (approximately)
/*!40000 ALTER TABLE `reasons` DISABLE KEYS */;
INSERT INTO `reasons` (`id`, `name`) VALUES
	(2, 'coffee'),
	(4, 'loan'),
	(3, 'party'),
	(1, 'salary');
/*!40000 ALTER TABLE `reasons` ENABLE KEYS */;

-- Dumping structure for table money_app.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL DEFAULT '0',
  `first_name` varchar(255) NOT NULL DEFAULT '0',
  `last_name` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Dumping data for table money_app.users: ~10 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`) VALUES
	(1, 'peter', '$2y$10$fnncUQdY0MQJuqIgFk1BGOQKkxpSmPXTh0IX.av4TB5Tp9CzM2PS.', 'Peter', 'Jackson'),
	(2, 'James', '$2y$10$Q7A5iTVJBYnaY5X5gMwqOuoD5pGcDooG9c7k5PqM2.0L9LRSmDX7K', 'James', 'Cameron'),
	(3, 'Alice', '$2y$10$qh.HcdLKZwsnl4GglZ43h.Cti5Q9WGPYjnTbJu9Ad28e3jZWRFv5G', 'Alice', 'Taylor'),
	(4, 'John', '$2y$10$Vq51Djo01MVxy4m8VtvyKud5l/puwh4o6XVV8jEk2L6AdNZX95AIm', 'John', 'Doe'),
	(5, 'Bob', '$2y$10$SjBM7Cqz9qUIIMqDsJGXzeD.g.RbyaffD5UHazCk.AA2DXLzg27De', 'Bob', 'Dillon'),
	(6, 'Jim', '$2y$10$EtBS3N6Dp8hywP3wiUYfhOYipeqeOM6ifjtM.vFIAqQJHKC.wSaMm', 'Jim', 'Carey'),
	(7, 'Jimmmy', '$2y$10$x9qP/3GCIJbQquKzMTVrjeZE5qgrxurTIR7oOwEXN/lqFb4GNStJq', 'Jim', 'Carey'),
	(8, 'Johnny', '$2y$10$uSOEVDkGYUTRT8hJoHDPQOFEGJzVGlTR5rwT3rTMIGs1inqbxogBK', 'John', 'Travolta'),
	(9, 'Marry', '$2y$10$Xa06ISzQe.EAHDJ6oed8oOjV6r6GmCvud1HWhQV6c1yWFbAgD.VdG', 'Maria', 'DB'),
	(10, 'Kim', '$2y$10$y1H5lWVzUf8fe5vqSCiFMuM4oW/eaJJqKoibxdnsR3.zOoy5ko3DK', 'Kim', 'Ir Sen');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for clearance-backend
CREATE DATABASE IF NOT EXISTS `clearance-backend` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `clearance-backend`;

-- Dumping structure for table clearance-backend.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `ntlogin` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT 'employee',
  `time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table clearance-backend.users: ~0 rows (approximately)
INSERT INTO `users` (`id`, `name`, `username`, `ntlogin`, `email`, `password`, `role`, `time`) VALUES
	(1, 'Super Admin', 'superadmin', NULL, NULL, NULL, 'super_admin', NULL),
	(2, 'HR Manager', 'hr', NULL, NULL, '5f4dcc3b5aa765d61d8327deb882cf99', 'hr', NULL),
	(3, 'IT Manager', 'it', NULL, NULL, NULL, 'it', NULL),
	(4, 'Team Leader', 'teamlead', NULL, NULL, NULL, 'team_leader', NULL),
	(5, 'Engineer', 'engineering', NULL, NULL, NULL, 'engineering_auxiliary', NULL),
	(6, 'Facilities', 'facilities', NULL, NULL, NULL, 'admin_facilities', NULL),
	(7, 'Account', 'account', NULL, NULL, NULL, 'account_coordinator', NULL),
	(8, 'Operations', 'operations', NULL, NULL, NULL, 'operations_manager', NULL),
	(9, 'John Doe', 'jdoe', 'jcgrijaldo', NULL, '5f4dcc3b5aa765d61d8327deb882cf99', 'employee', NULL);

-- Dumping structure for table clearance-backend.users_accounts
CREATE TABLE IF NOT EXISTS `users_accounts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `ntlogin` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT 'employee',
  `timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table clearance-backend.users_accounts: ~9 rows (approximately)
INSERT INTO `users_accounts` (`id`, `name`, `username`, `ntlogin`, `email`, `password`, `role`, `timestamp`) VALUES
	(1, 'Super Admin', 'superadmin', NULL, NULL, '5f4dcc3b5aa765d61d8327deb882cf99', 'super_admin', NULL),
	(2, 'HR Manager', 'hr', NULL, NULL, '5f4dcc3b5aa765d61d8327deb882cf99', 'hr', NULL),
	(3, 'IT Manager', 'it', NULL, NULL, '5f4dcc3b5aa765d61d8327deb882cf99', 'it', NULL),
	(4, 'Team Leader', 'teamlead', NULL, NULL, '5f4dcc3b5aa765d61d8327deb882cf99', 'team_leader', NULL),
	(5, 'Engineer', 'engineering', NULL, NULL, '5f4dcc3b5aa765d61d8327deb882cf99', 'engineering_auxiliary', NULL),
	(6, 'Facilities', 'facilities', NULL, NULL, '5f4dcc3b5aa765d61d8327deb882cf99', 'admin_facilities', NULL),
	(7, 'Account', 'account', NULL, NULL, '5f4dcc3b5aa765d61d8327deb882cf99', 'account_coordinator', NULL),
	(8, 'Operations', 'operations', NULL, NULL, '5f4dcc3b5aa765d61d8327deb882cf99', 'operations_manager', NULL),
	(9, 'John Doe', 'jdoe', 'jcgrijaldo', NULL, '5f4dcc3b5aa765d61d8327deb882cf99', 'employee', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

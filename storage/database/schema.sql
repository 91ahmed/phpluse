-- Drop database
DROP DATABASE IF EXISTS `app`;

-- Create database
CREATE DATABASE IF NOT EXISTS `app`
DEFAULT CHARACTER SET utf8mb4
DEFAULT COLLATE utf8mb4_general_ci;

-- Use database
USE `app`;

-- Drop tables
DROP TABLE IF EXISTS `admins`;
DROP TABLE IF EXISTS `account_status`;
DROP TABLE IF EXISTS `account_privacy`;
DROP TABLE IF EXISTS `genders`;

-- Create `account_status` table
CREATE TABLE IF NOT EXISTS `account_status` 
(
	`account_status_id` TINYINT(2) UNSIGNED NOT NULL AUTO_INCREMENT,
	`account_status_name` VARCHAR(20) NOT NULL UNIQUE,

	PRIMARY KEY (`account_status_id`)
) 
	ENGINE innoDB
	DEFAULT CHARACTER SET utf8mb4
	DEFAULT COLLATE utf8mb4_general_ci
	AUTO_INCREMENT 1
;

-- Create `account_privacy` table
CREATE TABLE IF NOT EXISTS `account_privacy` 
(
	`account_privacy_id` TINYINT(2) UNSIGNED NOT NULL AUTO_INCREMENT,
	`account_privacy_name` VARCHAR(20) NOT NULL UNIQUE,

	PRIMARY KEY (`account_privacy_id`)
) 
	ENGINE innoDB
	DEFAULT CHARACTER SET utf8mb4
	DEFAULT COLLATE utf8mb4_general_ci
	AUTO_INCREMENT 1
;

-- Create `genders` table
CREATE TABLE IF NOT EXISTS `genders` 
(
	`gender_id` TINYINT(1) UNSIGNED NOT NULL AUTO_INCREMENT,
	`gender_name` VARCHAR(10) NOT NULL UNIQUE,

	PRIMARY KEY (`gender_id`)
) 
	ENGINE innoDB
	DEFAULT CHARACTER SET utf8mb4
	DEFAULT COLLATE utf8mb4_general_ci
	AUTO_INCREMENT 1
;

-- Create `admins` table
CREATE TABLE IF NOT EXISTS `admins` 
(
	`admin_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`admin_first_name` VARCHAR(20) NOT NULL,
	`admin_last_name` VARCHAR(20) NOT NULL,
	`admin_user_name` VARCHAR(20) NOT NULL UNIQUE,
	`admin_email` VARCHAR(60) NOT NULL UNIQUE,
	`admin_password` CHAR(60) NOT NULL UNIQUE,
	`admin_phone` VARCHAR(20) NULL UNIQUE,
	`admin_photo` VARCHAR(100) NOT NULL DEFAULT 'default',
	`admin_cover` VARCHAR(100) NOT NULL DEFAULT 'default',
	`admin_gender` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1,

	`account_status` TINYINT(2) UNSIGNED NOT NULL DEFAULT 1,
	`account_privacy` TINYINT(2) UNSIGNED NOT NULL DEFAULT 1,
	`public_code` CHAR(15) UNIQUE NOT NULL,
	`token` CHAR(128) UNIQUE NOT NULL,
	`is_verified` TINYINT UNSIGNED NOT NULL DEFAULT 2,

	`admin_birth_day` TINYINT(2) UNSIGNED NOT NULL,
	`admin_birth_month` TINYINT(2) UNSIGNED NOT NULL,
	`admin_birth_year` SMALLINT(4) UNSIGNED NOT NULL,

	`admin_created_day` TINYINT(2) UNSIGNED NOT NULL,
	`admin_created_month` TINYINT(2) UNSIGNED NOT NULL,
	`admin_created_year` SMALLINT(4) UNSIGNED NOT NULL,

	`admin_created_datetime` DATETIME NOT NULL DEFAULT NOW(),
	`admin_updated_datetime` TIMESTAMP NOT NULL,

	`admin_softdelete` DATE NULL,

	FOREIGN KEY (`admin_gender`) REFERENCES `genders` (`gender_id`) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (`account_status`) REFERENCES `account_status` (`account_status_id`) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (`account_privacy`) REFERENCES `account_privacy` (`account_privacy_id`) ON UPDATE CASCADE ON DELETE CASCADE,

	PRIMARY KEY (`admin_id`)
) 
	ENGINE innoDB
	DEFAULT CHARACTER SET utf8mb4
	DEFAULT COLLATE utf8mb4_general_ci
	AUTO_INCREMENT 1
;

-- Loading data into table `account_status`
INSERT INTO `account_status` (`account_status_id`, `account_status_name`) VALUES 
(1, 'Unverified'),
(2, 'Verified'),
(3, 'Suspended'),
(4, 'Banned'),
(5, 'Deleted');

-- Loading data into table `account_privacy`
INSERT INTO `account_privacy` (`account_privacy_id`, `account_privacy_name`) VALUES 
(1, 'Public'), 
(2, 'Private');

-- Loading data into table `genders`
INSERT INTO `genders` (`gender_id`, `gender_name`) VALUES 
(1, 'Male'), 
(2, 'Female');
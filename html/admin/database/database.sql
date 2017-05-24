-- -----------------------------------------------------
-- Schema example
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `example` DEFAULT CHARACTER SET utf8 ;
USE `example` ;

-- -----------------------------------------------------
-- Table `example`.`news`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `example`.`news` ;

CREATE TABLE IF NOT EXISTS `example`.`news` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `excerpt` VARCHAR(160) NULL,
  `content` TEXT NULL,
  `publish_date` TIMESTAMP NOT NULL DEFAULT current_timestamp,
  `author` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

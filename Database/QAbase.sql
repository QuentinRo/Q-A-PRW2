-- MySQL Script generated by MySQL Workbench
-- 02/01/19 15:59:40
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema QAbase
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema QAbase
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `QAbase` DEFAULT CHARACTER SET utf8 ;
USE `QAbase` ;

-- -----------------------------------------------------
-- Table `QAbase`.`surveys`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `QAbase`.`surveys` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `created_at` DATETIME NULL,
  `update_at` DATETIME NULL,
  `open` TINYINT(1) NOT NULL DEFAULT 0,
  `oneShotReset` INT(4) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `QAbase`.`questions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `QAbase`.`questions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `entitled` MEDIUMTEXT NOT NULL,
  `survey_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_questions_surveys1_idx` (`survey_id` ASC),
  CONSTRAINT `fk_questions_surveys1`
    FOREIGN KEY (`survey_id`)
    REFERENCES `QAbase`.`surveys` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `QAbase`.`answers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `QAbase`.`answers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `question_id` INT NOT NULL,
  `answer` MEDIUMTEXT NOT NULL,
  `client` VARCHAR(45) NULL,
  INDEX `fk_questions_has_users_questions1_idx` (`question_id` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_questions_has_users_questions1`
    FOREIGN KEY (`question_id`)
    REFERENCES `QAbase`.`questions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

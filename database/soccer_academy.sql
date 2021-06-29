-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema soccer_academy
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema soccer_academy
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `soccer_academy` DEFAULT CHARACTER SET utf8 ;
USE `soccer_academy` ;

-- -----------------------------------------------------
-- Table `soccer_academy`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soccer_academy`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) BINARY NOT NULL,
  `password` TEXT NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soccer_academy`.`genders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soccer_academy`.`genders` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soccer_academy`.`members`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soccer_academy`.`members` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  `nisn` INT(20) NULL,
  `birth_date` DATE NULL,
  `birth_place` VARCHAR(255) NULL,
  `class_type` VARCHAR(10) NULL,
  `gender_id` INT UNSIGNED NOT NULL,
  `religion` VARCHAR(45) NULL,
  `address` VARCHAR(45) NULL,
  `height` VARCHAR(45) NULL,
  `weight` VARCHAR(45) NULL,
  `phone_number` VARCHAR(45) NULL,
  `image_path` TEXT NULL,
  `position` VARCHAR(45) NULL,
  `reason` VARCHAR(45) NULL,
  `notes` VARCHAR(255) NULL,
  `created_at` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_member_gender_id_idx` (`gender_id` ASC),
  CONSTRAINT `fk_member_gender_id`
    FOREIGN KEY (`gender_id`)
    REFERENCES `soccer_academy`.`genders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soccer_academy`.`teams`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soccer_academy`.`teams` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  `address` VARCHAR(255) NULL,
  `manager_id` VARCHAR(45) NULL,
  `licenses` VARCHAR(45) NULL,
  `registration_number` VARCHAR(255) NULL,
  `created_at` VARCHAR(45) NULL,
  `updated_at` VARCHAR(45) NULL,
  PRIMARY KEY (`id`)),
  ADD UNIQUE (`registration_number`)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soccer_academy`.`coaches`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soccer_academy`.`coaches` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `image_path` TEXT NULL,
  `team_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_coaches_teams1_idx` (`team_id` ASC),
  CONSTRAINT `fk_coaches_teams1`
    FOREIGN KEY (`team_id`)
    REFERENCES `soccer_academy`.`teams` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soccer_academy`.`players`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soccer_academy`.`players` (
  `id` INT NOT NULL,
  `full_name` VARCHAR(255) NULL,
  `birth_date` DATE NULL,
  `birth_place` VARCHAR(255) NULL,
  `address` VARCHAR(255) NULL,
  `identity_number` VARCHAR(20) NULL,
  `height` VARCHAR(45) NULL,
  `weight` VARCHAR(45) NULL,
  `position` VARCHAR(45) NULL,
  `back_number` VARCHAR(45) NULL,
  `back_name` VARCHAR(45) NULL,
  `image_path` VARCHAR(45) NULL,
  `files` VARCHAR(45) NULL,
  `religion` VARCHAR(255) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `team_id` INT UNSIGNED NOT NULL,
  `gender_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_players_teams1_idx` (`team_id` ASC),
  INDEX `fk_players_gender1_idx` (`gender_id` ASC),
  CONSTRAINT `fk_players_teams1`
    FOREIGN KEY (`team_id`)
    REFERENCES `soccer_academy`.`teams` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_players_gender1`
    FOREIGN KEY (`gender_id`)
    REFERENCES `soccer_academy`.`genders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = '	';


-- -----------------------------------------------------
-- Table `soccer_academy`.`managers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soccer_academy`.`managers` (
  `id` INT NOT NULL,
  `nama` VARCHAR(45) NULL,
  `image_path` VARCHAR(45) NULL,
  `phone_number` VARCHAR(45) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `teams_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_managers_teams1_idx` (`teams_id` ASC),
  CONSTRAINT `fk_managers_teams1`
    FOREIGN KEY (`teams_id`)
    REFERENCES `soccer_academy`.`teams` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soccer_academy`.`leagues`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soccer_academy`.`leagues` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `image_path` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soccer_academy`.`teams_has_leagues`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soccer_academy`.`teams_has_leagues` (
  `team_id` INT UNSIGNED NOT NULL,
  `league_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`team_id`, `league_id`),
  INDEX `fk_teams_has_leagues_leagues1_idx` (`league_id` ASC),
  INDEX `fk_teams_has_leagues_teams1_idx` (`team_id` ASC),
  CONSTRAINT `fk_teams_has_leagues_teams1`
    FOREIGN KEY (`team_id`)
    REFERENCES `soccer_academy`.`teams` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_teams_has_leagues_leagues1`
    FOREIGN KEY (`league_id`)
    REFERENCES `soccer_academy`.`leagues` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soccer_academy`.`structures`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soccer_academy`.`structures` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `position` VARCHAR(45) NULL,
  `image_path` TEXT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soccer_academy`.`achievements`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soccer_academy`.`achievements` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `description` VARCHAR(255) NULL,
  `image_path` TEXT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soccer_academy`.`galleries`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soccer_academy`.`galleries` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `image_path` VARCHAR(45) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soccer_academy`.`news`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soccer_academy`.`news` (
  `id` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `description` VARCHAR(45) NULL,
  `date` DATE NULL,
  `images` VARCHAR(45) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soccer_academy`.`schedules`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soccer_academy`.`schedules` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `schedulescol` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soccer_academy`.`matches`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soccer_academy`.`matches` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `date` DATE NULL,
  `time` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `soccer_academy`.`scores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `soccer_academy`.`scores` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `matches_id` INT UNSIGNED NOT NULL,
  `teams_id` INT UNSIGNED NOT NULL,
  `value` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_scores_matches1_idx` (`matches_id` ASC),
  INDEX `fk_scores_teams1_idx` (`teams_id` ASC),
  CONSTRAINT `fk_scores_matches1`
    FOREIGN KEY (`matches_id`)
    REFERENCES `soccer_academy`.`matches` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_scores_teams1`
    FOREIGN KEY (`teams_id`)
    REFERENCES `soccer_academy`.`teams` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

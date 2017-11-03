
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Table `project`.`album`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project`.`album` (
  `id` VARCHAR(50) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NULL,
  `artist` TEXT(250) NULL DEFAULT NULL,
  `year` VARCHAR(4) NULL DEFAULT NULL,
  `created_at` DATE NULL DEFAULT NULL,
  `updated_at` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `project`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project`.`users` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(25) CHARACTER SET 'latin1' COLLATE 'latin1_bin' NOT NULL,
  `email` VARCHAR(50) NULL DEFAULT NULL,
  `first_name` VARCHAR(25) NULL DEFAULT NULL,
  `last_name` VARCHAR(25) NULL DEFAULT NULL,
  `password` VARCHAR(64) NULL DEFAULT NULL,
  `is_admin` CHAR(1) NULL DEFAULT NULL,
  `created_at` DATE NULL DEFAULT NULL,
  `updated_at` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username` (`username` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 14
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `project`.`cart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project`.`cart` (
  `created_at` DATE NULL DEFAULT NULL,
  `updated_at` DATE NULL DEFAULT NULL,
  `users_id` INT(5) NOT NULL,
  PRIMARY KEY (`users_id`),
  CONSTRAINT `cart_users_fk`
    FOREIGN KEY (`users_id`)
    REFERENCES `project`.`users` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `project`.`genre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project`.`genre` (
  `id` VARCHAR(50) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NULL,
  `description` VARCHAR(500) NOT NULL,
  `created_at` DATE NULL DEFAULT NULL,
  `updated_at` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `project`.`quality`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project`.`quality` (
  `id` VARCHAR(25) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `bitrate` VARCHAR(5) NULL DEFAULT NULL,
  `format` VARCHAR(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `project`.`songs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project`.`songs` (
  `id` VARCHAR(50) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NULL,
  `artist` TEXT(250) NULL DEFAULT NULL,
  `length` VARCHAR(40) NULL DEFAULT NULL,
  `created_at` DATE NULL DEFAULT NULL,
  `updated_at` DATE NULL DEFAULT NULL,
  `album_id` VARCHAR(50) NOT NULL,
  `genre_id` VARCHAR(50) NOT NULL,
  `quality_id` VARCHAR(25) NOT NULL,
  `price` DECIMAL(4,2) NOT NULL,
  `description` LONGTEXT NOT NULL,
  `picture_location` VARCHAR(50) NULL DEFAULT NULL,
  `file_location` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `songs_album_fk` (`album_id` ASC),
  INDEX `songs_genre_fk` (`genre_id` ASC),
  INDEX `songs_quality_fk` (`quality_id` ASC),
  CONSTRAINT `songs_album_fk`
    FOREIGN KEY (`album_id`)
    REFERENCES `project`.`album` (`id`),
  CONSTRAINT `songs_genre_fk`
    FOREIGN KEY (`genre_id`)
    REFERENCES `project`.`genre` (`id`),
  CONSTRAINT `songs_quality_fk`
    FOREIGN KEY (`quality_id`)
    REFERENCES `project`.`quality` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `project`.`cart_songs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project`.`cart_songs` (
  `songs_id` VARCHAR(50) NOT NULL,
  `cart_id` INT(5) NOT NULL,
  PRIMARY KEY (`songs_id`, `cart_id`),
  INDEX `cart_songs_cart_fk` (`cart_id` ASC),
  CONSTRAINT `cart_songs_cart_fk`
    FOREIGN KEY (`cart_id`)
    REFERENCES `project`.`cart` (`users_id`),
  CONSTRAINT `cart_songs_songs_fk`
    FOREIGN KEY (`songs_id`)
    REFERENCES `project`.`songs` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `project`.`libraries`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project`.`libraries` (
  `id` VARCHAR(25) NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(250) NULL DEFAULT NULL,
  `created_at` DATE NULL DEFAULT NULL,
  `updated_at` DATE NULL DEFAULT NULL,
  `users_id` INT(5) NOT NULL,
  PRIMARY KEY (`id`, `users_id`),
  UNIQUE INDEX `libraries__idx` (`users_id` ASC),
  CONSTRAINT `libraries_users_fk`
    FOREIGN KEY (`users_id`)
    REFERENCES `project`.`users` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `project`.`library_songs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `project`.`library_songs` (
  `songs_id` VARCHAR(50) NOT NULL,
  `libraries_id` VARCHAR(25) NOT NULL,
  `libraries_users_id` INT(5) NOT NULL,
  PRIMARY KEY (`songs_id`, `libraries_id`, `libraries_users_id`),
  INDEX `library_songs_libraries_fk` (`libraries_id` ASC, `libraries_users_id` ASC),
  CONSTRAINT `library_songs_libraries_fk`
    FOREIGN KEY (`libraries_id` , `libraries_users_id`)
    REFERENCES `project`.`libraries` (`id` , `users_id`),
  CONSTRAINT `library_songs_songs_fk`
    FOREIGN KEY (`songs_id`)
    REFERENCES `project`.`songs` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

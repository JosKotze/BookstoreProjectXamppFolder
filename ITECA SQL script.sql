-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Bookstoe_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Bookstoe_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Bookstoe_db` DEFAULT CHARACTER SET utf8 ;
USE `Bookstoe_db` ;

-- -----------------------------------------------------
-- Table `Bookstoe_db`.`Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Bookstoe_db`.`Users` (
  `user_id` INT GENERATED ALWAYS AS () VIRTUAL,
  `email` VARCHAR(45) NOT NULL,
  `fName` VARCHAR(45) NOT NULL,
  `lName` VARCHAR(45) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE,
  UNIQUE INDEX `idUsers_UNIQUE` (`user_id` ASC) VISIBLE,
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Bookstoe_db`.`Categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Bookstoe_db`.`Categories` (
  `category_id` INT NOT NULL,
  `category_name` VARCHAR(45) NULL,
  PRIMARY KEY (`category_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Bookstoe_db`.`Listings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Bookstoe_db`.`Listings` (
  `listing_id` INT NOT NULL,
  `user_id` INT NULL,
  `category_id` VARCHAR(45) NULL,
  `title` VARCHAR(45) NULL,
  `page_count` VARCHAR(45) NULL,
  `author` VARCHAR(45) NULL,
  `genre` VARCHAR(45) NULL,
  `condition` VARCHAR(45) NULL,
  `price` VARCHAR(45) NULL,
  `format` VARCHAR(45) NULL,
  `City` VARCHAR(45) NULL,
  `Province` VARCHAR(45) NULL,
  `Shipping` TINYINT NULL,
  `Collection` TINYINT NULL,
  PRIMARY KEY (`listing_id`),
  CONSTRAINT `user_id`
    FOREIGN KEY ()
    REFERENCES `Bookstoe_db`.`Users` ()
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Bookstoe_db`.`Sales`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Bookstoe_db`.`Sales` (
  `Sale_id` INT NOT NULL,
  `user_id` INT NULL,
  `buyer` VARCHAR(45) NULL,
  `listing_id` INT NULL,
  `date` DATETIME NULL,
  `price_sold` DECIMAL(15,2) NULL,
  `initial_price` DECIMAL(15,2) NULL,
  PRIMARY KEY (`Sale_id`),
  CONSTRAINT `user_id`
    FOREIGN KEY ()
    REFERENCES `Bookstoe_db`.`Users` ()
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `listing_id`
    FOREIGN KEY ()
    REFERENCES `Bookstoe_db`.`Listings` ()
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Bookstoe_db`.`ShoppingCart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Bookstoe_db`.`ShoppingCart` (
  `shoppingCart_id` INT NOT NULL,
  `shoppingCart_items` VARCHAR(45) NULL,
  `user_id` INT NULL,
  PRIMARY KEY (`shoppingCart_id`),
  CONSTRAINT `user_id`
    FOREIGN KEY ()
    REFERENCES `Bookstoe_db`.`Users` ()
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Bookstoe_db`.`Wishlist`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Bookstoe_db`.`Wishlist` (
  `idWishlist` INT NOT NULL,
  `user_id` VARCHAR(45) NULL,
  `wishlist_items` VARCHAR(45) NULL,
  PRIMARY KEY (`idWishlist`),
  CONSTRAINT `user_id`
    FOREIGN KEY ()
    REFERENCES `Bookstoe_db`.`Users` ()
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

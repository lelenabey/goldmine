SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `goldmine` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `goldmine` ;

-- -----------------------------------------------------
-- Table `goldmine`.`user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `goldmine`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `login` VARCHAR(16) NOT NULL ,
  `password` VARCHAR(16) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  UNIQUE INDEX `login_UNIQUE` (`login` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `goldmine`.`song`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `goldmine`.`songs` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `url` VARCHAR(128) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC)
  UNIQUE INDEX `url_UNIQUE` (`url` ASC))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `goldmine`.`playlist`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `goldmine`.`playlists` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL, 
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `goldmine`.`pl_item`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `goldmine`.`pl_items` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `order_id` INT NOT NULL ,
  `product_id` INT NOT NULL ,
  `quantity` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_order_item_order1` (`order_id` ASC) ,
  INDEX `fk_order_item_product1` (`product_id` ASC) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  CONSTRAINT `fk_order_item_order1`
    FOREIGN KEY (`order_id` )
    REFERENCES `estore`.`orders` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_order_item_product1`
    FOREIGN KEY (`product_id` )
    REFERENCES `estore`.`products` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;
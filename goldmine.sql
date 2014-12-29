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
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
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
  `playlist_id` INT NOT NULL ,
  `song_id` INT NOT NULL ,
  `rank` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_pl_item_playlist1` (`playlist_id` ASC) ,
  INDEX `fk_pl_item_song1` (`song_id` ASC) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  CONSTRAINT `fk_pl_item_playlist1`
    FOREIGN KEY (`playlist_id` )
    REFERENCES `goldmine`.`playlists` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_pl_item_song1`
    FOREIGN KEY (`song_id` )
    REFERENCES `goldmine`.`songs` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `goldmine`.`us_playlist`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `goldmine`.`us_playlists` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `playlist_id` INT NOT NULL ,
  `user_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_pl_item_playlist2` (`playlist_id` ASC) ,
  INDEX `fk_pl_item_user1` (`user_id` ASC) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  CONSTRAINT `fk_pl_item_playlist2`
    FOREIGN KEY (`playlist_id` )
    REFERENCES `goldmine`.`playlists` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_pl_item_user1`
    FOREIGN KEY (`user_id` )
    REFERENCES `goldmine`.`users` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


CREATE USER 'miguel' IDENTIFIED BY 'golddigger';

grant SELECT on TABLE `goldmine`.`users` to 'miguel'@'%';
grant UPDATE on TABLE `goldmine`.`users` to 'miguel'@'%';
grant DELETE on TABLE `goldmine`.`users` to 'miguel'@'%';
grant INSERT on TABLE `goldmine`.`users` to 'miguel'@'%';

grant SELECT on TABLE `goldmine`.`playlists` to 'miguel'@'%';
grant UPDATE on TABLE `goldmine`.`playlists` to 'miguel'@'%';
grant DELETE on TABLE `goldmine`.`playlists` to 'miguel'@'%';
grant INSERT on TABLE `goldmine`.`playlists` to 'miguel'@'%';

grant SELECT on TABLE `goldmine`.`pl_items` to 'miguel'@'%';
grant UPDATE on TABLE `goldmine`.`pl_items` to 'miguel'@'%';
grant DELETE on TABLE `goldmine`.`pl_items` to 'miguel'@'%';
grant INSERT on TABLE `goldmine`.`pl_items` to 'miguel'@'%';

grant SELECT on TABLE `goldmine`.`us_playlists` to 'miguel'@'%';
grant UPDATE on TABLE `goldmine`.`us_playlists` to 'miguel'@'%';
grant DELETE on TABLE `goldmine`.`us_playlists` to 'miguel'@'%';
grant INSERT on TABLE `goldmine`.`us_playlists` to 'miguel'@'%';

grant SELECT on TABLE `goldmine`.`songs` to 'miguel'@'%';
grant UPDATE on TABLE `goldmine`.`songs` to 'miguel'@'%';
grant DELETE on TABLE `goldmine`.`songs` to 'miguel'@'%';
grant INSERT on TABLE `goldmine`.`songs` to 'miguel'@'%';



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
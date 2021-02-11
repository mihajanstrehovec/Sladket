-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema e-shop_shema
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema e-shop_shema
-- -----------------------------------------------------
DROP DATABASE IF EXISTS `e-shop_shema`;
CREATE SCHEMA IF NOT EXISTS `e-shop_shema` DEFAULT CHARACTER SET utf8 ;
USE `e-shop_shema` ;

-- -----------------------------------------------------
-- Table `e-shop_shema`.`Artikel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Artikel`;
CREATE TABLE IF NOT EXISTS `e-shop_shema`.`Artikel` (
  `idArtikla` INT NOT NULL AUTO_INCREMENT,
  `imeArtikla` VARCHAR(45) NOT NULL,
  `cenaArtikla` FLOAT NOT NULL,
  `zalogaArtikla` INT NOT NULL,
  `opisArtikla` MEDIUMTEXT NOT NULL,
  `kategorijaArtikla` VARCHAR(45) NOT NULL,
  `aktiviran` TINYINT(1) NOT NULL DEFAULT 1,
  `ocena` INT NOT NULL DEFAULT 0,
  `steviloOcen` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`idArtikla`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `e-shop_shema`.`Prodajalec`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Prodajalec`;
CREATE TABLE IF NOT EXISTS `e-shop_shema`.`Prodajalec` (
  `idProdajalca` INT NOT NULL AUTO_INCREMENT,
  `uporabniskoIme` VARCHAR(45) NOT NULL,
  `eMail` VARCHAR(45) NOT NULL,
  `geslo` CHAR(60) NOT NULL,
  `aktiviran` TINYINT(1) NOT NULL DEFAULT 1,
  `imeProdajalca` VARCHAR(45) NULL,
  `priimekProdajalca` VARCHAR(45) NULL,
  PRIMARY KEY (`idProdajalca`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `e-shop_shema`.`Stranka`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Stranka`;
CREATE TABLE IF NOT EXISTS `e-shop_shema`.`Stranka` (
  `idStranke` INT NOT NULL AUTO_INCREMENT,
  `imeStranke` VARCHAR(45) NOT NULL,
  `priimekStranke` VARCHAR(45) NOT NULL,
  `mailStranke` VARCHAR(45) NOT NULL,
  `gesloStranke` CHAR(60) NOT NULL,
  `aktivirana` TINYINT(1) NOT NULL DEFAULT 1,
  `ulica` VARCHAR(45) NOT NULL,
  `hisnaSt` INT NOT NULL,
  `posta` VARCHAR(45) NOT NULL,
  `postnaSt` INT NOT NULL,
  PRIMARY KEY (`idStranke`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `e-shop_shema`.`Naročilo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Naročilo`;
CREATE TABLE IF NOT EXISTS `e-shop_shema`.`Naročilo` (
  `idNaročila` INT NOT NULL AUTO_INCREMENT,
  `idStranke` INT NOT NULL,
  `total` FLOAT NOT NULL,
  `potrjeno` TINYINT(1) NOT NULL,
  `preklicano` TINYINT(1) NOT NULL DEFAULT 0,
  `stornirano` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idNaročila`),
  INDEX `fk_Naročilo_1_idx` (`idStranke` ASC) VISIBLE,
  CONSTRAINT `fk_Stranka`
    FOREIGN KEY (`idStranke`)
    REFERENCES `e-shop_shema`.`Stranka` (`idStranke`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `e-shop_shema`.`Narocilo_artikli`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Narocilo_artikli`;
CREATE TABLE IF NOT EXISTS `e-shop_shema`.`Narocilo_artikli` (
  `idNarocilo_artikli` INT NOT NULL AUTO_INCREMENT,
  `idNarocilaForeign` INT NOT NULL,
  `idArtiklaForeign` INT NOT NULL,
  `kolicina` INT NOT NULL,
  PRIMARY KEY (`idNarocilo_artikli`),
  INDEX `fk_Narocilo_artikli_1_idx` (`idArtiklaForeign` ASC) VISIBLE,
  INDEX `fk_Narocilo_artikli_2_idx` (`idNarocilaForeign` ASC) VISIBLE,
  CONSTRAINT `fk_Narocilo_artikli_1`
    FOREIGN KEY (`idArtiklaForeign`)
    REFERENCES `e-shop_shema`.`Artikel` (`idArtikla`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Narocilo_artikli_2`
    FOREIGN KEY (`idNarocilaForeign`)
    REFERENCES `e-shop_shema`.`Naročilo` (`idNaročila`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e-shop_shema`.`Administrator`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Administrator`;
CREATE TABLE IF NOT EXISTS `e-shop_shema`.`Administrator` (
  `idAdmin` INT NOT NULL,
  `ime` VARCHAR(45) NOT NULL,
  `priimek` VARCHAR(45) NOT NULL,
  `eMail` VARCHAR(45) NOT NULL,
  `geslo` CHAR(60) NOT NULL,
  PRIMARY KEY (`idAdmin`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e-shop_shema`.`Images`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Images`;
CREATE TABLE IF NOT EXISTS `e-shop_shema`.`Images` (
  `idImages` INT NOT NULL AUTO_INCREMENT,
  `idArtikla` INT NOT NULL,
  `imeSlike` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`idImages`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `e-shop_shema`.`ArtikelStrankaOcena`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ArtikelStrankaOcena`;
CREATE TABLE IF NOT EXISTS `e-shop_shema`.`ArtikelStrankaOcena` (
  `idArtikla` INT NOT NULL,
  `idStranke` INT NOT NULL,
  INDEX `fk_Artikel_idx` (`idArtikla` ASC) VISIBLE,
  INDEX `fk_Stranka` (`idStranke` ASC) VISIBLE,
  CONSTRAINT `fk_Artikel_aso`
    FOREIGN KEY (`idArtikla`)
    REFERENCES `e-shop_shema`.`Artikel` (`idArtikla`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Stranka_aso`
    FOREIGN KEY (`idStranke`)
    REFERENCES `e-shop_shema`.`Stranka` (`idStranke`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

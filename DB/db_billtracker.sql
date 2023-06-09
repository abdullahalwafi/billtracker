-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema db_billtracker
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_billtracker
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_billtracker` ;
USE `db_billtracker` ;

-- -----------------------------------------------------
-- Table `db_billtracker`.`clients`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_billtracker`.`clients` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `kode` CHAR(15) NOT NULL,
  `nama` VARCHAR(45) NOT NULL,
  `phone` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `alamat` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  UNIQUE INDEX `kode_UNIQUE` (`kode` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_billtracker`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_billtracker`.`categories` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nama` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  UNIQUE INDEX `categoriescol_UNIQUE` (`nama` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_billtracker`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_billtracker`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `slug` VARCHAR(50) NOT NULL,
  `nama` VARCHAR(45) NOT NULL,
  `harga` VARCHAR(45) NOT NULL,
  `deskripsi` TEXT NULL,
  `categories_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `slug_UNIQUE` (`slug` ASC) ,
  INDEX `fk_products_categories_idx` (`categories_id` ASC) ,
  CONSTRAINT `fk_products_categories`
    FOREIGN KEY (`categories_id`)
    REFERENCES `db_billtracker`.`categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_billtracker`.`imgproducts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_billtracker`.`imgproducts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `img` VARCHAR(45) NOT NULL,
  `products_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `fk_imgproducts_products1_idx` (`products_id` ASC) ,
  CONSTRAINT `fk_imgproducts_products1`
    FOREIGN KEY (`products_id`)
    REFERENCES `db_billtracker`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_billtracker`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_billtracker`.`orders` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `invoice` VARCHAR(45) NOT NULL,
  `tanggal` DATE NOT NULL,
  `total` VARCHAR(50) NOT NULL,
  `clients_id` INT NOT NULL,
  `status` VARCHAR(45) NOT NULL,
  `bukti` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  UNIQUE INDEX `invoice_UNIQUE` (`invoice` ASC) ,
  INDEX `fk_orders_clients1_idx` (`clients_id` ASC) ,
  CONSTRAINT `fk_orders_clients1`
    FOREIGN KEY (`clients_id`)
    REFERENCES `db_billtracker`.`clients` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_billtracker`.`order_detail`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_billtracker`.`order_detail` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `orders_id` INT NOT NULL,
  `products_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  INDEX `fk_order_detail_orders1_idx` (`orders_id` ASC) ,
  INDEX `fk_order_detail_products1_idx` (`products_id` ASC) ,
  CONSTRAINT `fk_order_detail_orders1`
    FOREIGN KEY (`orders_id`)
    REFERENCES `db_billtracker`.`orders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_order_detail_products1`
    FOREIGN KEY (`products_id`)
    REFERENCES `db_billtracker`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_billtracker`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_billtracker`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nama` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `level` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_billtracker`.`gateway`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_billtracker`.`gateway` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `no_wa` VARCHAR(45) NOT NULL,
  `url_api` VARCHAR(45) NOT NULL,
  `api_key` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_billtracker`.`setting`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_billtracker`.`setting` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nama_app` VARCHAR(45) NOT NULL,
  `slogan` VARCHAR(45) NULL,
  `phone` VARCHAR(45) NULL,
  `alamat` VARCHAR(45) NULL,
  `logo` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

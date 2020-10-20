-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema dbms_miniproject
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema dbms_miniproject
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dbms_miniproject` DEFAULT CHARACTER SET utf8 ;
USE `dbms_miniproject` ;

-- -----------------------------------------------------
-- Table `dbms_miniproject`.`branch`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbms_miniproject`.`branch` (
  `branch_id` INT(11) NOT NULL,
  `manager_id` VARCHAR(45) NOT NULL,
  `street` VARCHAR(45) NOT NULL,
  `city` VARCHAR(45) NOT NULL,
  `state` VARCHAR(100) NOT NULL,
  `pincode` INT(11) NOT NULL,
  `address` VARCHAR(150) NOT NULL DEFAULT 'street+'' ''+city+'' ''+state+'' ''+zipcode''',
  PRIMARY KEY (`branch_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `dbms_miniproject`.`distributers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbms_miniproject`.`distributers` (
  `distributer_id` INT(11) NOT NULL,
  `Distributer_name` VARCHAR(150) NOT NULL,
  `branch_branch_id` INT(11) NOT NULL,
  `street` VARCHAR(45) NOT NULL,
  `city` VARCHAR(45) NOT NULL,
  `state` VARCHAR(45) NOT NULL,
  `pincode` INT(11) NOT NULL,
  `address` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`distributer_id`),
  INDEX `fk_Distributers_branch1_idx` (`branch_branch_id` ASC) VISIBLE,
  CONSTRAINT `fk_Distributers_branch1`
    FOREIGN KEY (`branch_branch_id`)
    REFERENCES `dbms_miniproject`.`branch` (`branch_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `dbms_miniproject`.`domain`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbms_miniproject`.`domain` (
  `domain_id` INT(11) NOT NULL,
  `domain_name` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`domain_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `dbms_miniproject`.`books`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbms_miniproject`.`books` (
  `books_id` INT(11) NOT NULL,
  `books_name` VARCHAR(100) NOT NULL,
  `author` VARCHAR(100) NOT NULL,
  `publisher` VARCHAR(100) NOT NULL,
  `price` INT(11) NOT NULL,
  `branch_id` INT(11) NOT NULL,
  `domain_id` INT(11) NOT NULL,
  `distributer_id` INT(11) NOT NULL,
  `availability` TINYINT(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`books_id`),
  INDEX `fk_books_branch1_idx` (`branch_id` ASC) VISIBLE,
  INDEX `fk_books_domain1_idx` (`domain_id` ASC) VISIBLE,
  INDEX `fk_books_Distributers1_idx` (`distributer_id` ASC) VISIBLE,
  CONSTRAINT `fk_books_Distributers1`
    FOREIGN KEY (`distributer_id`)
    REFERENCES `dbms_miniproject`.`distributers` (`distributer_id`),
  CONSTRAINT `fk_books_branch1`
    FOREIGN KEY (`branch_id`)
    REFERENCES `dbms_miniproject`.`branch` (`branch_id`),
  CONSTRAINT `fk_books_domain1`
    FOREIGN KEY (`domain_id`)
    REFERENCES `dbms_miniproject`.`domain` (`domain_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `dbms_miniproject`.`contacts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbms_miniproject`.`contacts` (
  `contact_id` INT(11) NOT NULL AUTO_INCREMENT,
  `phone_no` MEDIUMTEXT NULL DEFAULT NULL,
  `branch_branch_id` INT(11) NOT NULL,
  PRIMARY KEY (`contact_id`),
  INDEX `fk_contacts_branch_idx` (`branch_branch_id` ASC) VISIBLE,
  CONSTRAINT `fk_contacts_branch`
    FOREIGN KEY (`branch_branch_id`)
    REFERENCES `dbms_miniproject`.`branch` (`branch_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `dbms_miniproject`.`customer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbms_miniproject`.`customer` (
  `customer_id` INT(11) NOT NULL,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `branch_id` INT(11) NOT NULL,
  `dob` DATE NOT NULL,
  `age` INT(11) NOT NULL,
  `street` VARCHAR(45) NOT NULL,
  `city` VARCHAR(45) NOT NULL,
  `state` VARCHAR(45) NOT NULL,
  `pincode` INT(11) NOT NULL,
  `address` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`customer_id`),
  INDEX `fk_customer_branch1_idx` (`branch_id` ASC) VISIBLE,
  CONSTRAINT `fk_customer_branch1`
    FOREIGN KEY (`branch_id`)
    REFERENCES `dbms_miniproject`.`branch` (`branch_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `dbms_miniproject`.`employees`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbms_miniproject`.`employees` (
  `employee_id` INT(11) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `first_name` VARCHAR(45) NOT NULL,
  `salary` VARCHAR(45) NOT NULL,
  `branch_id` INT(11) NOT NULL,
  PRIMARY KEY (`employee_id`),
  INDEX `fk_Employees_branch1_idx` (`branch_id` ASC) VISIBLE,
  CONSTRAINT `fk_Employees_branch1`
    FOREIGN KEY (`branch_id`)
    REFERENCES `dbms_miniproject`.`branch` (`branch_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `dbms_miniproject`.`issue_status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbms_miniproject`.`issue_status` (
  `issue_id` INT(11) NOT NULL AUTO_INCREMENT,
  `customer_customer_id` INT(11) NOT NULL,
  `date_of_issue` DATE NULL DEFAULT NULL,
  `date_of_return` DATE NULL DEFAULT NULL,
  `customer_id` INT(11) NULL DEFAULT NULL,
  `availability` TINYINT(1) NULL DEFAULT NULL,
  `issue_employee_id` INT(11) NULL DEFAULT NULL,
  `return_employee_id` INT(11) NULL DEFAULT NULL,
  `book_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`issue_id`, `customer_customer_id`),
  INDEX `fk_issue_status_customer1_idx` (`customer_customer_id` ASC) VISIBLE,
  CONSTRAINT `fk_issue_status_customer1`
    FOREIGN KEY (`customer_customer_id`)
    REFERENCES `dbms_miniproject`.`customer` (`customer_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `dbms_miniproject`.`login`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dbms_miniproject`.`login` (
  `idlogin` INT(11) NOT NULL,
  `password` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`idlogin`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

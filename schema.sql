

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
DROP TABLE IF EXISTS `dbms_miniproject`.`branch` ;

CREATE TABLE IF NOT EXISTS `dbms_miniproject`.`branch` (
  `branch_id` INT NOT NULL,
  `manager_id` VARCHAR(45) NOT NULL,
  `street` VARCHAR(45) NOT NULL,
  `city` VARCHAR(45) NOT NULL,
  `state` VARCHAR(100) NOT NULL,
  `pincode` INT NOT NULL,
  `address` VARCHAR(150) NOT NULL DEFAULT 'street+\' \'+city+\' \'+state+\' \'+zipcode\'',
  PRIMARY KEY (`branch_id`))



-- -----------------------------------------------------
-- Table `dbms_miniproject`.`contacts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbms_miniproject`.`contacts` ;

CREATE TABLE IF NOT EXISTS `dbms_miniproject`.`contacts` (
  `contact_id` INT NOT NULL AUTO_INCREMENT,
  `phone_no` INT NOT NULL,
  `branch_branch_id` INT NOT NULL,
  PRIMARY KEY (`contact_id`),
  INDEX `fk_contacts_branch_idx` (`branch_branch_id` ASC) VISIBLE,
  CONSTRAINT `fk_contacts_branch`
    FOREIGN KEY (`branch_branch_id`)
    REFERENCES `dbms_miniproject`.`branch` (`branch_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)



-- -----------------------------------------------------
-- Table `dbms_miniproject`.`Employees`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbms_miniproject`.`Employees` ;

CREATE TABLE IF NOT EXISTS `dbms_miniproject`.`Employees` (
  `employee_id` INT NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `first_name` VARCHAR(45) NOT NULL,
  `salary` VARCHAR(45) NOT NULL,
  `branch_id` INT NOT NULL,
  PRIMARY KEY (`employee_id`),
  INDEX `fk_Employees_branch1_idx` (`branch_id` ASC) VISIBLE,
  CONSTRAINT `fk_Employees_branch1`
    FOREIGN KEY (`branch_id`)
    REFERENCES `dbms_miniproject`.`branch` (`branch_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)



-- -----------------------------------------------------
-- Table `dbms_miniproject`.`customer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbms_miniproject`.`customer` ;

CREATE TABLE IF NOT EXISTS `dbms_miniproject`.`customer` (
  `customer_id` INT NOT NULL,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `branch_id` INT NOT NULL,
  `dob` DATE NOT NULL,
  `age` INT NOT NULL,
  `street` VARCHAR(45) NOT NULL,
  `city` VARCHAR(45) NOT NULL,
  `state` VARCHAR(45) NOT NULL,
  `pincode` INT NOT NULL,
  `address` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`customer_id`),
  INDEX `fk_customer_branch1_idx` (`branch_id` ASC) VISIBLE,
  CONSTRAINT `fk_customer_branch1`
    FOREIGN KEY (`branch_id`)
    REFERENCES `dbms_miniproject`.`branch` (`branch_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)



-- -----------------------------------------------------
-- Table `dbms_miniproject`.`Distributers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbms_miniproject`.`Distributers` ;

CREATE TABLE IF NOT EXISTS `dbms_miniproject`.`Distributers` (
  `distributer_id` INT NOT NULL,
  `Distributer_name` VARCHAR(150) NOT NULL,
  `branch_branch_id` INT NOT NULL,
  `street` VARCHAR(45) NOT NULL,
  `city` VARCHAR(45) NOT NULL,
  `state` VARCHAR(45) NOT NULL,
  `pincode` INT NOT NULL,
  `address` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`distributer_id`),
  INDEX `fk_Distributers_branch1_idx` (`branch_branch_id` ASC) VISIBLE,
  CONSTRAINT `fk_Distributers_branch1`
    FOREIGN KEY (`branch_branch_id`)
    REFERENCES `dbms_miniproject`.`branch` (`branch_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)



-- -----------------------------------------------------
-- Table `dbms_miniproject`.`domain`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbms_miniproject`.`domain` ;

CREATE TABLE IF NOT EXISTS `dbms_miniproject`.`domain` (
  `domain_id` INT NOT NULL,
  `domain_name` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`domain_id`))



-- -----------------------------------------------------
-- Table `dbms_miniproject`.`books`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbms_miniproject`.`books` ;

CREATE TABLE IF NOT EXISTS `dbms_miniproject`.`books` (
  `books_id` INT NOT NULL,
  `books_name` VARCHAR(100) NOT NULL,
  `author` VARCHAR(100) NOT NULL,
  `publisher` VARCHAR(100) NOT NULL,
  `price` INT NOT NULL,
  `branch_id` INT NOT NULL,
  `domain_id` INT NOT NULL,
  `distributer_id` INT NOT NULL,
  `availability` TINYINT(1) NOT NULL DEFAULT 1,
  INDEX `fk_books_branch1_idx` (`branch_id` ASC) VISIBLE,
  INDEX `fk_books_domain1_idx` (`domain_id` ASC) VISIBLE,
  INDEX `fk_books_Distributers1_idx` (`distributer_id` ASC) VISIBLE,
  CONSTRAINT `fk_books_branch1`
    FOREIGN KEY (`branch_id`)
    REFERENCES `dbms_miniproject`.`branch` (`branch_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_books_domain1`
    FOREIGN KEY (`domain_id`)
    REFERENCES `dbms_miniproject`.`domain` (`domain_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_books_Distributers1`
    FOREIGN KEY (`distributer_id`)
    REFERENCES `dbms_miniproject`.`Distributers` (`distributer_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)


-- -----------------------------------------------------
-- Table `dbms_miniproject`.`issue_status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dbms_miniproject`.`issue_status` ;

CREATE TABLE IF NOT EXISTS `dbms_miniproject`.`issue_status` (
  `date_of_issue` DATE NULL,
  `date_of_return` DATE NULL,
  `customer_id` INT NULL,
  `availability` TINYINT(1) NULL,
  `issue_employee_id` INT NULL,
  `return_employee_id` INT NULL,
  `issue_customer_id` INT NOT NULL,
  `book_id` INT NULL,
  PRIMARY KEY (`issue_customer_id`),
  INDEX `fk_issue_status_customer1_idx` (`issue_customer_id` ASC) VISIBLE,
  CONSTRAINT `fk_issue_status_customer1`
    FOREIGN KEY (`issue_customer_id`)
    REFERENCES `dbms_miniproject`.`customer` (`customer_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)




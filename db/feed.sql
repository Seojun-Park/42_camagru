CREATE TABLE `db_cama`.`board`( 
    `idx` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `pw` VARCHAR(100) NOT NULL,
    `title` VARCHAR(100) NOT NULL ,
    `content` TEXT NOT NULL ,
    `date` DATE NOT NULL ,
    `hit` INT NOT NULL DEFAULT 0,
    ) ENGINE = InnoDB;
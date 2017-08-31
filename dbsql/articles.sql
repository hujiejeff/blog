CREATE TABLE `cats`(
`id` INT PRIMARY KEY AUTO_INCREMENT,
`name` VARCHAR (255) NOT NULL ,
`creartd_at` INT (11) NOT NULL ,
` updated_at` INT (11) NOT NULL
)ENGINE=InnoDB;
CREATE TABLE `articles`(
`id` INT(11) PRIMARY KEY AUTO_INCREMENT,
`user_id` INT NOT NULL ,
`cat_id` INT NOT NULL ,
`title` VARCHAR(255) NOT NULL ,
`content` TEXT  NOT NULL ,
`created_at` INT(11) NOT NULL ,
`updated_at` INT(11) NOT NULL,
FOREIGN KEY (cat_id) REFERENCES cats(id) ON DELETE RESTRICT
)ENGINE=InnoDB;
CREATE TABLE `laravel`.`article_tag` (
`id` INT NOT NULL AUTO_INCREMENT,
`article_id` INT NOT NULL ,
`tag_id` INT NOT NULL ,
`created_at` INT(11) NOT NULL ,
`updated_at` INT(11) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `laravel`.`tags` (
`id` INT NOT NULL AUTO_INCREMENT,
`name` VARCHAR(50) NOT NULL ,
`created_at` INT(11) NOT NULL ,
`updated_at` INT(11) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
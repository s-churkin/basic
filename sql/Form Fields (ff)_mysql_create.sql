/*
http://des1roer.blogspot.ru/2016/01/yii-2_21.html
*/

DROP TABLE IF EXISTS ff_content;
CREATE TABLE `ff_content` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`tree_id` INT(11) DEFAULT null,
	`name` varchar(255) NOT NULL COMMENT 'Наименование',
	`url` varchar(255) DEFAULT null COMMENT 'путь',
	PRIMARY KEY (`id`) 
) ENGINE=InnoDB AUTO_INCREMENT=14 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci';

DROP TABLE IF EXISTS ff_fields;
CREATE TABLE `ff_fields` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`content_id` INT(11) NOT NULL,
	`name` varchar(255) NOT NULL COMMENT 'Наименование',
	`not_null` tinyint(1) DEFAULT null  COMMENT 'Обязательное',
	`type` enum('Строка', 'Дата', 'Число', 'Сумма', 'Логическое') NOT NULL  COMMENT 'Тип',
	PRIMARY KEY (`id`) 
) ENGINE=InnoDB AUTO_INCREMENT=14 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci';

DROP TABLE IF EXISTS ff_values;
CREATE TABLE `ff_values` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`fields_id` INT(11) NOT NULL,
	`value` varchar(255) DEFAULT null COMMENT 'Значение',
	`dfrom` DATETIME DEFAULT null COMMENT 'Дата с',
	`dto` DATETIME DEFAULT null COMMENT 'Дата по',
	`instance_id` INT(11) NOT NULL 	COMMENT 'Дата по',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci';

DROP TABLE IF EXISTS ff_instance;
CREATE TABLE `ff_instance` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`content_id` INT(11) NOT NULL,
	`name` varchar(255) DEFAULT null COMMENT 'Наименование',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 CHARACTER SET 'utf8' COLLATE 'utf8_general_ci';

ALTER TABLE `ff_content` ADD CONSTRAINT `ff_content_fk0` FOREIGN KEY (`tree_id`) REFERENCES `ff_content`(`id`)  ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `ff_fields` ADD CONSTRAINT `ff_fields_fk0` FOREIGN KEY (`content_id`) REFERENCES `ff_content`(`id`);

ALTER TABLE `ff_values` ADD CONSTRAINT `ff_values_fk0` FOREIGN KEY (`fields_id`) REFERENCES `ff_fields`(`id`);

ALTER TABLE `ff_values` ADD CONSTRAINT `ff_values_fk1` FOREIGN KEY (`instance_id`) REFERENCES `ff_instance`(`id`);

ALTER TABLE `ff_instance` ADD CONSTRAINT `ff_instance_fk0` FOREIGN KEY (`content_id`) REFERENCES `ff_content`(`id`);

ALTER TABLE `ff_content` ADD INDEX `ff_content_i0` ('tree_id');
ALTER TABLE `ff_fields` ADD INDEX `ff_fields_i0` ('content_id');
ALTER TABLE `ff_values` ADD INDEX `ff_valuest_i0` ('fields_id');
ALTER TABLE `ff_instance` ADD INDEX `ff_instance_i0` ('content_id');

INSERT INTO `ff_content`(`id`, `tree_id`, `name`, `url`) VALUES (1,null,'Объекты',null);
INSERT INTO `ff_content`(`id`, `tree_id`, `name`, `url`) VALUES (2, 1,'Клиенты',null);
INSERT INTO `ff_content`(`id`, `tree_id`, `name`, `url`) VALUES (3, 2,'ЮЛ',null);
INSERT INTO `ff_content`(`id`, `tree_id`, `name`, `url`) VALUES (4, 2,'ФЛ',null);
INSERT INTO `ff_content`(`id`, `tree_id`, `name`, `url`) VALUES (5, 2,'ИЧП',null);

INSERT INTO `ff_content`(`id`, `tree_id`, `name`, `url`) VALUES (6,1,'Договоры',null);

INSERT INTO `ff_content`(`id`, `tree_id`, `name`, `url`) VALUES (7,1,'Товары',null);


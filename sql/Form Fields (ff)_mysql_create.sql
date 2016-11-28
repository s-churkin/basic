CREATE TABLE `ff_content` (
	`id` INT(11) NOT NULL,
	`tree_id` INT(11) UNIQUE DEFAULT 'null',
	`name` varchar(255) NOT NULL,
	`url` varchar(255) DEFAULT 'null',
	PRIMARY KEY (`id`)
);

CREATE TABLE `ff_fields` (
	`id` INT(11) NOT NULL,
	`content_id` INT(11) NOT NULL,
	`name` varchar(255) NOT NULL,
	`not_null` tinyint(1) DEFAULT 'null',
	`type` enum('Строка', 'Число', 'Сумма', 'Логическое') NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `ff_values` (
	`id` INT(11) NOT NULL,
	`fields_id` INT(11) NOT NULL,
	`value` varchar(255) DEFAULT 'null',
	`dfrom` DATETIME DEFAULT 'null',
	`dto` DATETIME DEFAULT 'null',
	PRIMARY KEY (`id`)
);

ALTER TABLE `ff_content` ADD CONSTRAINT `ff_content_fk0` FOREIGN KEY (`tree_id`) REFERENCES `ff_content`(`id`);

ALTER TABLE `ff_fields` ADD CONSTRAINT `ff_fields_fk0` FOREIGN KEY (`content_id`) REFERENCES `ff_content`(`id`);

ALTER TABLE `ff_values` ADD CONSTRAINT `ff_values_fk0` FOREIGN KEY (`fields_id`) REFERENCES `ff_fields`(`id`);


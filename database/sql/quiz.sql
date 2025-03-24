CREATE TABLE `quiz` (
	`id_quiz` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
	`name_quiz` VARCHAR(255),
	PRIMARY KEY(`id_quiz`)
);


CREATE TABLE `question` (
	`id_question` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
	`id_quiz` INTEGER,
	`name_question` VARCHAR(255),
	`f_answer` VARCHAR(255),
	`s_answer` VARCHAR(255),
	`t_answer` VARCHAR(255),
	`fth-answer` VARCHAR(255),
	`real_answer` VARCHAR(255),
	PRIMARY KEY(`id_question`)
);


ALTER TABLE `quiz`
ADD FOREIGN KEY(`id_quiz`) REFERENCES `question`(`id_quiz`)
ON UPDATE NO ACTION ON DELETE NO ACTION;
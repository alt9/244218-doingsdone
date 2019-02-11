CREATE DATABASE doingsdone
	DEFAULT CHARACTER SET utf8
	DEFAULT COLLATE utf8_general_ci;

USE doingsdone;

CREATE TABLE categories (
	id INT AUTO_INCREMENT PRIMARY KEY,
 	name CHAR(128),
 	user_id INT
);

CREATE TABLE tasks (
 	id INT AUTO_INCREMENT PRIMARY KEY,
 	create_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 	decided_date TIMESTAMP,
 	result TINYINT DEFAULT 0,
 	name CHAR(128),
 	file CHAR(128),
 	deadline_date TIMESTAMP,
 	category_id INT,
 	user_id INT
);

CREATE TABLE users (
 	id INT AUTO_INCREMENT PRIMARY KEY,
 	reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 	email CHAR(128) NOT NULL UNIQUE,
 	username CHAR(128) NOT NULL UNIQUE,
 	password CHAR(128)
);

CREATE INDEX date ON tasks(dedline_date);

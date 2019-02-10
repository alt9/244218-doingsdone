CREATE DATABASE doingsdone
	DEFAULT CHARACTER SET utf8
	DEFAULT COLLATE utf8_general_ci;

USE doingsdone;

CREATE TABLE categories (
	id INT AUTO_INCREMENT PRIMARY_KEY,
 	name CHAR(128)
);

CREATE TABLE tasks (
 	id INT AUTO_INCREMENT PRIMARY_KEY,
 	сreate_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 	decided_date TIMESTAMP,
 	result INT DEFAULT 0 CHECK (result=0 and result=1),
 	name CHAR(128),
 	file CHAR(256),
 	dedline_date TIMESTAMP
);

CREATE TABLE users (
 	id INT AUTO_INCREMENT PRIMARY_KEY,
 	reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 	email CHAR(128) NOT NULL UNIQUE,
 	username CHAR(128) NOT NULL UNIQUE,
 	user_pass CHAR(128)
);

CREATE INDEX date ON tasks(dedline_date);
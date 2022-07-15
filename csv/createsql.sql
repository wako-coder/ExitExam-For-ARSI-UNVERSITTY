CREATE DATABASE IF NOT EXISTS mydatabase;
USE mydatabase;
DROP TABLE IF EXISTS `user`;
CREATE TABLE user
(
    name VARCHAR(50)      NOT NULL DEFAULT '',
    email VARCHAR(50) NOT NULL DEFAULT '',
    phone int(11),
    PRIMARY KEY (`email`)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;
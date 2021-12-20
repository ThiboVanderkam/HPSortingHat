DROP DATABASE IF EXISTS sortinghat;
CREATE DATABASE sortinghat;

USE sortinghat;

DROP TABLE IF EXISTS account;
CREATE TABLE account (
	AccountId INT NOT NULL UNIQUE,
    Firstname VARCHAR(100) NOT NULL,
    Lastname VARCHAR(100) NOT NULL,
    Age INT NOT NULL,
    Gender VARCHAR(10) NOT NULL,
    Favouritefood VARCHAR(100) NOT NULL,
    Gryffindor INT NOT NULL,
    Slytherin INT NOT NULL,
    Ravenclaw INT NOT NULL,
    Hufflepuff INT NOT NULL,
    PRIMARY KEY(AccountId)
);

-- All data input to the database is handled by PHP


CREATE DATABASE zoo_db;
USE zoo_db;

CREATE TABLE `habitats` (
  `IDHAB` int AUTO_INCREMENT PRIMARY KEY,
  `NOMHAB` varchar(100) DEFAULT NULL,
  `Description_hab` text
);

INSERT INTO `habitats` VALUES (1,'Savane','Large grassy plains with scattered trees'),(2,'Jungle','Dense tropical forest with high biodiversity'),(3,'Desert','Arid area with sparse vegetation'),(4,'Ocean','Saltwater marine environment');
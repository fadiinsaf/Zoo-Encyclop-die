CREATE DATABASE zoo_db;
USE zoo_db;

CREATE TABLE `habitats` (
  `IDHAB` int AUTO_INCREMENT PRIMARY KEY,
  `NOMHAB` varchar(100) DEFAULT NULL,
  `Description_hab` text
);

INSERT INTO `habitats` VALUES (1,'Savane','Large grassy plains with scattered trees'),(2,'Jungle','Dense tropical forest with high biodiversity'),(3,'Desert','Arid area with sparse vegetation'),(4,'Ocean','Saltwater marine environment');

CREATE TABLE animals (
    IDanimal INT AUTO_INCREMENT PRIMARY KEY,
    NOM VARCHAR(100) NOT NULL,
    Type_alimentaire VARCHAR(50) NOT NULL,
    IMAGE VARCHAR(200),
    IDHAB INT,
    FOREIGN KEY (IDHAB) REFERENCES habitats(IDHAB)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

INSERT INTO animals (NOM, Type_alimentaire, IMAGE, IDHAB)
VALUES ('Lion', 'Carnivore', 'lion.jpg', 1);

UPDATE habitats
SET NomHab = 'Jungle', Description_Hab = 'Habitat dense et humide'
WHERE IDHAB = 1;

UPDATE animals
SET NOM = 'Lion Africain',
    Type_alimentaire = 'Carnivore',
    IMAGE = 'lion_africain.png',
    IDHAB = 2
WHERE IDanimal = 1;

DELETE FROM animals
WHERE IDanimal = 1;

SELECT *
FROM animals
LEFT JOIN habitats
ON animals.IDHAB = habitats.IDHAB;
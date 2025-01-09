CREATE DATABASE biblioKKK;

use biblioKKK;

CREATE TABLE roles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    role_name VARCHAR(25) UNIQUE,
    role_description TEXT,
    logo VARCHAR(255)
)ENGINE=INNODB;

CREATE TABLE utilisateurs(
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(30),
    lastname VARCHAR(30),
    email VARCHAR(50) UNIQUE,
    password VARCHAR(50),
    phone VARCHAR(20),
    photo VARCHAR(255),
    role_id INT ,
    Foreign Key (role_id) REFERENCES roles(id)
)ENGINE=INNODB;


CREATE TABLE categories(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR (50),
    description TEXT
)ENGINE=INNODB;

CREATE TABLE tags(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name  VARCHAR(35),
    description TEXT,
    logo VARCHAR(225)
)ENGINE=INNODB;

CREATE TABLE livres(
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(100),
    description_courte VARCHAR (255),
    description TEXT,
    date_de_publication DATE,
    quantité INT,
    cover VARCHAR(255),
    auteur VARCHAR(255),
    categorie_id INT ,
    Foreign Key (categorie_id) REFERENCES categories(id)
)ENGINE=INNODB;

CREATE TABLE reservations(
    id INT PRIMARY KEY AUTO_INCREMENT,
    duree INT,
    etat VARCHAR(50),
    apprenant_id INT,
    FOREIGN KEY (apprenant_id) REFERENCES utilisateurs(id),
    livre_id INT,
    FOREIGN Key (livre_id) REFERENCES livres(id) 
)ENGINE=INNODB;

CREATE TABLE tag_livre(
livre_id INT,
 FOREIGN KEY (livre_id) REFERENCES livres(id),
tag_id INT, 
 FOREIGN KEY  (tag_id) REFERENCES tags(id),
 PRIMARY KEY (livre_id, tag_id)
)ENGINE=INNODB;


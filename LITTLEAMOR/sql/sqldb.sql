
DROP SCHEMA IF EXISTS littleamorkids;

CREATE DATABASE littleamorkids DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE littleamorkids;

CREATE TABLE produit (
  code         INT AUTO_INCREMENT,
  description  VARCHAR(255),
  prix	       FLOAT(8,2),
  quantite     INT(8),
  url_photo    VARCHAR(255),
  categorie_id INT,
  CONSTRAINT produit_pk PRIMARY KEY (code)
);

CREATE TABLE categorie (
  id       INT AUTO_INCREMENT,
  nom  VARCHAR(255),
   CONSTRAINT categorie_pk PRIMARY KEY (id)
);

CREATE TABLE utilisateur (
  id          INT AUTO_INCREMENT,
  nom         VARCHAR(255),
  mot_passe   VARCHAR(255),
  CONSTRAINT user_pk PRIMARY KEY (id)
);

CREATE TABLE cart (
  id       INT AUTO_INCREMENT,
  produit_code  INT,
  utilisateur_id INT,
  CONSTRAINT cart_pk PRIMARY KEY (id)
);

INSERT INTO produit VALUES(1, 'aveeno peau sensible lotion', 25.55, 25, 'aveenolotion.jpg',1);
INSERT INTO produit VALUES(2, 'booster simple pour enfant blue', 25.55, 15, 'boosterblue.jpg',4);
INSERT INTO produit VALUES(3, 'set de vetements pour garcon', 25.55, 5, 'boycloth1.jpg',1);
INSERT INTO produit VALUES(4, 'Lit convertible pour enfant 4 en 1', 25.55, 30, 'convertiblecrib.jpg',1);
INSERT INTO produit VALUES(5, 'chaise haute pour enfant', 25.55, 10, 'highchair.jpg',2);
INSERT INTO produit VALUES(6, 'couche pour enfant diapers huggies', 25.55, 4, 'huggiesdiaper.jpg',2);
INSERT INTO produit VALUES(7, 'laptop pour enfant multicolor', 25.55, 8, 'laptoptoy1.jpg',2);
INSERT INTO produit VALUES(8, 'walker multicolor pour enfant', 25.55, 25, 'walker1.jpg',1);
INSERT INTO produit VALUES(9, 'sac a couche maternite pour parentt', 25.55, 5, 'maternitybag.jpg',3);
INSERT INTO produit VALUES(10, 'oreiller pour femme enceinte', 25.55, 4, 'sleepingpillow.jpg',3);




INSERT INTO utilisateur VALUES (1,'admin1','admin');
INSERT INTO utilisateur VALUES (2,'moi','abc123');


INSERT INTO categorie VALUES (1,'baby');
INSERT INTO categorie VALUES (2,'todler');
INSERT INTO categorie VALUES (3,'maternity');
INSERT INTO categorie VALUES (4,'yougth');

ALTER TABLE produit
ADD FOREIGN KEY (categorie_id) REFERENCES categorie(id);

ALTER TABLE cart
ADD FOREIGN KEY (produit_code) REFERENCES produit(code);
ALTER TABLE cart
ADD FOREIGN KEY (utilisateur_id) REFERENCES utilisateur(id);

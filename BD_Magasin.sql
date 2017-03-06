CREATE DATABASE bd_balm;

USE bd_balm;

CREATE TABLE Client (
    num_Client int NOT NULL auto_increment,
    nom_Client varchar(255),
    prenom_Client varchar(255),
    mail varchar(255),
    tel varchar(10),
    password varchar(100),
    
    PRIMARY KEY(num_Client)
);

CREATE TABLE Adresse (
    num_Adresse int NOT NULL auto_increment,
    numero int,
    rue varchar(255),
    complement varchar(255),
    cp varchar(5),
    ville varchar(255),
    id_Client int NOT NULL,
    
    PRIMARY KEY(num_Adresse),
    FOREIGN KEY (id_Client) REFERENCES Client(num_Client) ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE Artiste (
    num_Artiste int NOT NULL auto_increment,
    nom_Artiste varchar(255),
    
    PRIMARY KEY(num_Artiste)
);

CREATE TABLE Style(
    num_Style int NOT NULL auto_increment,
    nom_Style varchar(255),
    
    PRIMARY KEY (num_Style)
);

CREATE TABLE Album (
    num_Album int NOT NULL auto_increment,
    nom_Album varchar(255),
    sortie date,
    prix float,
    stock int,
    id_Artiste int NOT NULL,
    id_Style int NOT NULL,
    
    PRIMARY KEY(num_Album),
    FOREIGN KEY(id_Artiste) REFERENCES Artiste(num_Artiste) ON UPDATE NO ACTION ON DELETE NO ACTION,
    FOREIGN KEY(id_Style) REFERENCES Style(num_Style) ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE Chanson (
    id_Album int NOT NULL,
    nom_Chanson varchar(255) NOT NULL,
    duree varchar(255),
    
    PRIMARY KEY(id_Album, nom_Chanson),
    FOREIGN KEY(id_Album) REFERENCES Album(num_Album) ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE Achat(
    num_Achat int NOT NULL auto_increment,
    id_Client int NOT NULL,
    date_Achat date,
    prix_Achat float,
    
    PRIMARY KEY(num_Achat),
    FOREIGN KEY (id_Client) REFERENCES Client(num_Client) ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE AchatAlbum (
    id_Achat int NOT NULL,
    id_Album int NOT NULL,
    quantite int,
    
    PRIMARY KEY(id_Achat, id_Album),
    FOREIGN KEY(id_Achat) REFERENCES Achat(num_Achat)  ON UPDATE NO ACTION ON DELETE NO ACTION,
    FOREIGN KEY(id_Album) REFERENCES Album(num_Album) ON UPDATE NO ACTION ON DELETE NO ACTION
);

/*Création Client*/
INSERT INTO Client(nom_Client, prenom_Client, mail, tel, password) VALUES('FONCK', 'Joris', 'fonck.joris@hotmail.fr', '0623589854', md5('Joris!'));
INSERT INTO Client(nom_Client, prenom_Client, mail, tel, password) VALUES('BARBE', 'Camille', 'barbe.camille@outlook.fr', '0632799925', md5('Camille!'));
INSERT INTO Client(nom_Client, prenom_Client, mail, tel, password) VALUES('DUPOND', 'Albert', 'dupond.albert@hotmail.fr', '0698587456', md5('Albert!'));
INSERT INTO Client(nom_Client, prenom_Client, mail, tel, password) VALUES('FONFEK', 'Sophie', 'fonfek.sophie@hotmail.fr', '0798560314', md5('Sophie!'));
INSERT INTO Client(nom_Client, prenom_Client, mail, tel, password) VALUES('BRIZ', 'Denise', 'briz.denise@wanadoo.com', '0626369858', md5('Denise!'));
INSERT INTO Client(nom_Client, prenom_Client, mail, tel, password) VALUES('DURAND', 'Jacques', 'durand.jacques@gmail.com', '0781547606', md5('Jacques!'));
INSERT INTO Client(nom_Client, prenom_Client, mail, tel, password) VALUES('CAFOT', 'Bertrand', 'cafot.bertrand@outlook.fr', '0676251088', md5('Bertrand!'));
INSERT INTO Client(nom_Client, prenom_Client, mail, tel, password) VALUES('POLIA', 'Kova', 'polia.kova@hotmail.fr', '0671132590', md5('Kova!'));
INSERT INTO Client(nom_Client, prenom_Client, mail, tel, password) VALUES('BONNET', 'Pierre', 'bonnet.pierre@hotmail.fr', '0709221674', md5('Pierre!'));
INSERT INTO Client(nom_Client, prenom_Client, mail, tel, password) VALUES('GAILLARD', 'Bastien', 'gaillard.bastien@free.com', '0678649043', md5('Bastien!'));


/*Création Adresse*/
INSERT INTO Adresse(numero, rue, complement, cp, ville, id_Client) VALUES(209, 'Avenue de Laon', '5eme etage Porte F', '51100', 'Reims', 1);
INSERT INTO Adresse(numero, rue, complement, cp, ville, id_Client) VALUES(78, 'Rue des Lilas', '', '35220', 'Chateaubourg', 1);
INSERT INTO Adresse(numero, rue, complement, cp, ville, id_Client) VALUES(5, 'Rue de l''Ecole', '', '22510', 'Saint-Quentin', 2);
INSERT INTO Adresse(numero, rue, complement, cp, ville, id_Client) VALUES(68, 'Rue de Limardé', 'Porte 6', '26320', 'Saint-Marcelle', 3);
INSERT INTO Adresse(numero, rue, complement, cp, ville, id_Client) VALUES(122, 'Boulevard des Caches', '', '59852', 'Lille', 4);
INSERT INTO Adresse(numero, rue, complement, cp, ville, id_Client) VALUES(56, 'Rue des Tulipes', '', '35000', 'Rennes', 5);
INSERT INTO Adresse(numero, rue, complement, cp, ville, id_Client) VALUES(155, 'Avenue du Général de Gaulles', 'Batiment C', '13000', 'Marseille', 6);
INSERT INTO Adresse(numero, rue, complement, cp, ville, id_Client) VALUES(2, 'Impasse des Limousins', '', '31100', 'Toulouse', 7);
INSERT INTO Adresse(numero, rue, complement, cp, ville, id_Client) VALUES(43, 'Boulebard de Champagne', 'Porte B', '51100', 'Reims', 8);
INSERT INTO Adresse(numero, rue, complement, cp, ville, id_Client) VALUES(22, 'Rue de Paris', '', '75000', 'Paris', 9);
INSERT INTO Adresse(numero, rue, complement, cp, ville, id_Client) VALUES(91, 'Impasse des héros', '', '51120', 'Sézanne', 10);

/*Création Artiste*/
INSERT INTO Artiste(nom_Artiste) VALUES('Daft Punk');
INSERT INTO Artiste(nom_Artiste) VALUES('Stromae');
INSERT INTO Artiste(nom_Artiste) VALUES('Mylène Farmer');
INSERT INTO Artiste(nom_Artiste) VALUES('Imagine Dragons');
INSERT INTO Artiste(nom_Artiste) VALUES('Louise Attaque');
INSERT INTO Artiste(nom_Artiste) VALUES('AP-Connection');
INSERT INTO Artiste(nom_Artiste) VALUES('David Guetta');
INSERT INTO Artiste(nom_Artiste) VALUES('Rihanna');
INSERT INTO Artiste(nom_Artiste) VALUES('Michel Sardou');
INSERT INTO Artiste(nom_Artiste) VALUES('Adèle');
INSERT INTO Artiste(nom_Artiste) VALUES('The Beatles');
INSERT INTO Artiste(nom_Artiste) VALUES('James Blunt');
INSERT INTO Artiste(nom_Artiste) VALUES('Linkin Park');
INSERT INTO Artiste(nom_Artiste) VALUES('Téléphone');
INSERT INTO Artiste(nom_Artiste) VALUES('Metallica');
INSERT INTO Artiste(nom_Artiste) VALUES('U2');
INSERT INTO Artiste(nom_Artiste) VALUES('Black M');
INSERT INTO Artiste(nom_Artiste) VALUES('Jamiroquai');
INSERT INTO Artiste(nom_Artiste) VALUES('Marron 5');
INSERT INTO Artiste(nom_Artiste) VALUES('Chroméo');
INSERT INTO Artiste(nom_Artiste) VALUES('Bruno Mars');
INSERT INTO Artiste(nom_Artiste) VALUES('Kaaris');
INSERT INTO Artiste(nom_Artiste) VALUES('Booba');
INSERT INTO Artiste(nom_Artiste) VALUES('Charles Aznavour');
INSERT INTO Artiste(nom_Artiste) VALUES('Eminem');
INSERT INTO Artiste(nom_Artiste) VALUES('Elton John');
INSERT INTO Artiste(nom_Artiste) VALUES('Coldplay');
INSERT INTO Artiste(nom_Artiste) VALUES('Lady Gaga');
INSERT INTO Artiste(nom_Artiste) VALUES('Madonna');
INSERT INTO Artiste(nom_Artiste) VALUES('Nirvana');



/*Création Style*/
INSERT INTO Style(nom_Style) VALUES('Rock');
INSERT INTO Style(nom_Style) VALUES('Rap');
INSERT INTO Style(nom_Style) VALUES('Funk');
INSERT INTO Style(nom_Style) VALUES('RnB');
INSERT INTO Style(nom_Style) VALUES('Hardrock');
INSERT INTO Style(nom_Style) VALUES('Metal');
INSERT INTO Style(nom_Style) VALUES('Pop');
INSERT INTO Style(nom_Style) VALUES('Classic');
INSERT INTO Style(nom_Style) VALUES('Country');
INSERT INTO Style(nom_Style) VALUES('Jazz');
INSERT INTO Style(nom_Style) VALUES('Dance');
INSERT INTO Style(nom_Style) VALUES('Electro');
INSERT INTO Style(nom_Style) VALUES('Dubstep');
INSERT INTO Style(nom_Style) VALUES('Hardstyle');
INSERT INTO Style(nom_Style) VALUES('House');
INSERT INTO Style(nom_Style) VALUES('Soul');
INSERT INTO Style(nom_Style) VALUES('Nu-Disco');
INSERT INTO Style(nom_Style) VALUES('Rock ''n'' roll');
INSERT INTO Style(nom_Style) VALUES('Samba');
INSERT INTO Style(nom_Style) VALUES('Zumba');
INSERT INTO Style(nom_Style) VALUES('Techno');
INSERT INTO Style(nom_Style) VALUES('Variete Française');
INSERT INTO Style(nom_Style) VALUES('Blues');
INSERT INTO Style(nom_Style) VALUES('Pop Rock');


/*Création Album*/
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('Homework', '1997-01-17', 14.99, 100, 1, 17);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('Racine Carree', '2013-08-19', 12.99, 100, 2, 15);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('Cendres de Lune', '1986-04-01', 9.99, 100, 3, 7);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('Night Visions', '2012-09-04', 19.99, 100, 4, 1);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('Louise Attaque', '1997-04-22', 6.99, 100, 5, 1);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('Stellar Groove', '2014-09-01', 5.99, 100, 6, 3);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('One Love', '2009-08-21', 11.99, 100, 7, 15);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('Loud', '2010-11-15', 6.99, 100, 8, 4);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('Je Vole', '1978-01-01', 9.99, 100, 9, 22);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('21', '2011-01-19', 9.99, 100, 10, 7);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('Abbey Road', '1969-09-26', 9.99, 100, 11, 23);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('Back to Bedlam', '2003-11-14', 9.99, 100, 12, 23);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('Livings Things', '2012-06-12', 9.99, 100, 13, 23);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('Rappels', '1991-01-01', 9.99, 100, 14, 1);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('Metallica', '1991-08-12', 9.99, 100, 15, 6);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('Songs of Innocence', '2014-09-09', 9.99, 100, 16, 1);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('Yeux Plus Gros que le Monde', '2014-03-31', 9.99, 100, 17, 2);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('Rock Dust Light Star', '2010-07-29', 9.99, 100, 18, 3);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('V', '2014-08-29', 9.99, 100, 19, 23);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('White Women', '2014-05-06', 9.99, 100, 20, 3);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('Unorthodox Jukebox', '2012-12-07', 9.99, 100, 21, 7);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('Le Bruit de mon Âme', '2015-03-30', 9.99, 100, 22, 2);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('Futur', '2012-11-06', 9.99, 100, 23, 2);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('Jazznavour', '1998-11-16', 9.99, 100, 24, 22);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('Encore', '2004-11-12', 9.99, 100, 25, 2);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('The One', '1992-06-22', 9.99, 100, 26, 1);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('Ghost Stories', '2014-05-16', 9.99, 100, 27, 7);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('Artpop', '2013-11-06', 9.99, 100, 28, 11);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('Like a Virgin', '1984-11-12', 9.99, 100, 29, 7);
INSERT INTO Album(nom_Album, sortie, prix, stock, id_Artiste, id_Style) VALUES('Nevermind', '1991-09-24', 9.99, 100, 30, 1);


/*Création chanson*/
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(1, 'Around the world', '7:10');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(1, 'Alive', '5:16');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(1, 'Funk Ad', '0:51');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(1, 'Rock''n Roll', '7:34');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(1, 'Da Funk', '5:29');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(2, 'Ta fête', '2:55');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(2, 'Papaouitai', '3:51');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(2, 'Tous les mêmes', '3:31');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(2, 'Formidables', '3:34');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(2, 'Sommeil', '3:39');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(3, 'Libertine', '3:49');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(3, 'Au bout de la nuit', '4:22');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(3, 'Chloé', '2:35');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(3, 'We''ll Never Die', '4:17');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(3, 'Cendres de lune', '1:48');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(4, 'Radioactive', '3:07');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(4, 'It''s time', '4:00');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(4, 'Démons', '2:57');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(4, 'Bleeding out', '3:43');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(4, 'Fallen', '2:59');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(5, 'Amour', '1:57');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(5, 'Jt''emmene au vent', '3:04');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(5, 'Ton invitation', '2:40');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(5, 'La Brune', '1:55');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(5, 'Les Nuits Parisiennes', '2:31');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(6, 'Bring Back the Funk', '4:12');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(6, 'Gonna Make It Right', '4:53');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(6, 'The Way She Moves', '5:23');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(6, 'On the Road', '3:29');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(6, 'Crash on the Moon', '4:01');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(7, 'Sexy Bitch', '3:13');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(7, 'Memories', '3:28');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(7, 'On the Dancefloor', '3:45');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(7, 'I Wanna Go Crazy', '3:24');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(7, 'One Love', '3:57');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(8, 'S & M', '4:01');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(8, 'What''s My Name', '4:23');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(8, 'Man Down', '4:25');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(8, 'Fading', '3:20');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(8, 'Skin', '5:04');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(9, 'J''y crois', '3:14');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(9, 'En Chantant', '3:55');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(9, 'Finir l''amour', '3:14');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(9, 'Je vole', '5:02');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(9, 'On a déjà donné', '3:41');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(10, 'Rolling in the Deep', '3:48');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(10, 'Don''t You Remember', '4:01');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(10, 'Set Fire to the Rain', '4:01');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(10, 'Take it All', '3:48');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(10, 'Hiding my Heart', '3:28');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(11, 'Come Together', '4:20');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(11, 'Something', '3:03');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(11, 'Here Comes the Sun', '3:06');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(11, 'Because', '2:46');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(11, 'Golden Slumbers', '1:32');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(12, 'High', '4:04');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(12, 'You''re Beautiful', '3:24');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(12, 'Out of My Mind', '3:33');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(12, 'So Long Jimmy', '4:25');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(13, 'Cry', '4:07');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(13, 'Lost in the Echo', '3:25');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(13, 'In My Remains', '3:20');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(13, 'Burn it Down', '3:50');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(13, 'I''ll Be Gone', '3:30');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(13, 'Castle of Glass', '3:25');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(14, 'La Bombe humaine', '3:53');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(14, 'Argent trop cher', '4:08');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(14, 'Crache ton venin', '4:57');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(14, 'Dure Limite', '4:38');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(14, 'Jour contre jour', '3:37');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(15, 'Sad but True', '5:25');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(15, 'The Unforgiven', '6:27');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(15, 'Don''t Tread on Me', '3:41');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(15, 'The God That Failed', '5:09');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(15, 'My Friend of Misery', '6:50');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(16, 'Every Breaking Wave', '4:12');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(16, 'Song for Someone', '3:47');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(16, 'Raised by Wolves', '4:06');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(16, 'The Crystal Ballroom', '4:41');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(16, 'The Troubles', '4:46');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(17, 'Mme Pavoshko', '4:15');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(17, 'A force d''être', '4:46');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(17, 'C''esst tout moi', '3:51');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(17, 'Jessica', '5:17');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(17, 'Sur ma route', '4:12');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(18, 'Rock Dust Light Star', '4:40');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(18, 'All Good in the Hood', '3:36');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(18, 'Lifeline', '4:40');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(18, 'Never Gonna Be Another', '4:08');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(18, 'Hey Floyd', '5:08');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(19, 'Maps', '3:10');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(19, 'Animals', '3:51');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(19, 'It Was Always You', '4:00');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(19, 'Sugar', '3:55');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(19, 'Feelings', '3:14');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(20, 'Jealous', '3:48');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(20, 'Over Your Shoulder', '4:32');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(20, 'Sexy Socialite', '5:36');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(20, 'Something good', '6:30');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(20, 'Fall Back 2U', '5:50');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(21, 'Young Girls', '3:49');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(21, 'Gorilla', '4:05');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(21, 'Treasure', '2:59');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(21, 'Show Me', '3:28');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(21, 'If I Knew', '2:13');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(22, 'Kadirov', '3:08');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(22, 'El Chapo', '5:12');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(22, 'Zone de Transit', '3:45');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(22, 'Trap', '3:53');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(22, 'Les Oiseaux', '5:04');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(23, 'Wesh Morray', '4:15');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(23, 'Tombé pour elle', '3:29');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(23, 'Pirates', '3:47');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(23, 'Kalash', '3:49');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(23, 'Maître Yoda', '3:15');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(24, 'Ce sacré piano', '3:49');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(24, 'Mes emmerdes', '3:57');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(24, 'Lucie', '2:54');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(24, 'Dormir avec vous madame', '2:26');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(24, 'For me... Formidable', '2:22');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(25, 'Evil Deeds', '4:20');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(25, 'Yellow Brick Road', '5:46');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(25, 'Mosh', '5;18');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(25, 'Puke', '4:08');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(25, 'One Shot 2 Shot', '4:27');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(26, 'Simple Life', '6:25');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(26, 'Sweat It Out', '6:39');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(26, 'The North', '5:15');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(26, 'On Dark Street', '4:43');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(26, 'Understanding Women', '5:04');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(27, 'Always In My Head', '3:37');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(27, 'Magic', '4:45');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(27, 'True Love', '4:06');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(27, 'Midnight', '4:48');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(27, 'A Sky Sull Of Stars', '3:59');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(28, 'Aura', '3:55');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(28, 'Sexxx Dreams', '3:34');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(28, 'Do What U Want', '3:47');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(28, 'Dope', '3:41');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(28, 'Applause', '3:32');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(29, 'Angel', '3:56');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(29, 'Like A Virgin', '3:35');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(29, 'Dress You Up', '4:02');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(29, 'Pretender', '4:30');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(29, 'Stay', '4:07');

INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(30, 'Smells Like Teen Spririt', '5:01');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(30, 'Come As You Are', '3:39');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(30, 'Lithium', '4:17');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(30, 'Drain You', '3:37');
INSERT INTO Chanson(id_Album, nom_Chanson, duree) VALUES(30, 'Something in the Way', '3:50');
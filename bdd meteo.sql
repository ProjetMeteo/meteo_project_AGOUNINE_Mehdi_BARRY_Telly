CREATE TABLE Utilisateur(
   id int AUTO_INCREMENT,
   mail VARCHAR(50) NOT NULL,
   mdp VARCHAR(50) NOT NULL,
   nom VARCHAR(50),
   prenom VARCHAR(50),
   PRIMARY KEY(Id)
);

CREATE TABLE Historique(
   id int AUTO_INCREMENT,
   creation DATETIME,
   villeID int,
   temperature INT,
   meteo VARCHAR(50),
   idUtilisateur int NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(idUtilisateur) REFERENCES Utilisateur(Id)
);

CREATE TABLE Ville_favorite(
   id int AUTO_INCREMENT,
   Nom VARCHAR(50) NOT NULL,
   PRIMARY KEY(id)
);

CREATE TABLE Ajoute(
   id int,
   id_1 int,
   PRIMARY KEY(Id, id_1),
   FOREIGN KEY(Id) REFERENCES Utilisateur(Id),
   FOREIGN KEY(id_1) REFERENCES Ville_favorite(id)
);

INSERT INTO Utilisateur (mail, mdp , nom , prenom) VALUES ('test@gmail.com','test','agounine','prenom');
DROP TABLE Data;
DROP TABLE Activite;
DROP TABLE Utilisateur;


CREATE TABLE Utilisateur (
	idUtilisateur INTEGER PRIMARY KEY AUTOINCREMENT,
	nom TEXT NOT NULL,
	prenom TEXT NOT NULL,
	date_naissance TEXT NOT NULL,
	sexe TEXT NOT NULL CHECK(sexe IN ('M','F')),
	taille INTEGER NOT NULL CHECK(taille >= 0 AND taille <= 250),
	poids INTEGER NOT NULL CHECK(poids >= 0 AND poids <= 200),
	email TEXT NOT NULL UNIQUE,
	mdp TEXT NOT NULL CHECK (length(mdp) >= 8)
);

CREATE TABLE Activite (
	idAct INTEGER PRIMARY KEY AUTOINCREMENT,
	date TEXT NOT NULL,
	description TEXT NOT NULL,
	duree TIME NOT NULL CHECK(duree >= 0),
	distance_parcourue REAL NOT NULL CHECK(distance_parcourue >= 0),
	cardio_freq_min REAL NOT NULL CHECK(cardio_freq_min <= cardio_freq_max AND cardio_freq_min <= cardio_freq_moy),
	cardio_freq_max REAL NOT NULL CHECK(cardio_freq_max >= cardio_freq_min AND cardio_freq_max >= cardio_freq_moy),
	cardio_freq_moy REAL NOT NULL CHECK(cardio_freq_moy >= cardio_freq_min AND cardio_freq_moy <= cardio_freq_max),
	unUtilisateur INTEGER NOT NULL,
	FOREIGN KEY(unUtilisateur) REFERENCES Utilisateur(idUtilisateur)
);

CREATE TABLE Data (
	idData INTEGER PRIMARY KEY AUTOINCREMENT,
	temps TEXT NOT NULL CHECK(temps >= 0),
	cardio_frequence REAL NOT NULL,
	latitude REAL NOT NULL CHECK(latitude >= -90 AND latitude <= 90),
	longitude REAL NOT NULL CHECK(longitude >= -180 AND longitude <= 180),
	altitude REAL NOT NULL CHECK(altitude >= -500 AND altitude <= 1500),
	unAct INTEGER NOT NULL,
	FOREIGN KEY(unAct) REFERENCES Activite(idAct)
);

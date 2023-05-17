CREATE TABLE IF NOT EXISTS Libro(
	PRIMARY KEY(id_libro),
	id_libro 		INT 			GENERATED ALWAYS AS IDENTITY,
	ISBN 			CHAR(13) 		UNIQUE NOT NULL,
	titolo 			VARCHAR(35)		NOT NULL,
	data_rilascio  	DATE 			,	--nullable
	copertina 		VARCHAR(100)	UNIQUE NOT NULL,
	valutazione 	INT				DEFAULT 0
						CONSTRAINT rating_libro
						CHECK(valutazione >= 0 AND valutazione < 10 )
	
);

CREATE TABLE IF NOT EXISTS Genere(
	PRIMARY KEY(id_genere),
	id_genere 		INT 		GENERATED ALWAYS AS IDENTITY,
	genere			VARCHAR(30)		NOT NULL
);

--tabella rel(N,N)
CREATE TABLE IF NOT EXISTS	Genere_libro(
	PRIMARY KEY(id_libro,id_genere),
	id_libro 		INT
						REFERENCES Libro(id_libro),
	id_genere 		INT 
						REFERENCES Genere(id_genere)
);


CREATE TABLE IF NOT EXISTS Autore(
	PRIMARY KEY(id_autore),
	id_autore 		INT				GENERATED ALWAYS AS IDENTITY,
	nome 			VARCHAR(30)		NOT NULL,
	cognome			VARCHAR(30)		NOT NULL
);

--relazione(N,N)
CREATE TABLE IF NOT EXISTS Autore_libro(
	PRIMARY KEY(id_autore,id_libro),
	id_autore		INT 
						REFERENCES Autore(id_autore),
	id_libro		INT
						REFERENCES Libro(id_libro)
);

CREATE TABLE IF NOT EXISTS Utente(
	PRIMARY KEY(id_utente),
	id_utente 		INT 			GENERATED ALWAYS AS IDENTITY,
	nome 			VARCHAR(30)		NOT NULL,
	cognome 		VARCHAR(30)		NOT NULL,
	ddn				INT						,
	data_iscrizione DATE 			NOT NULL,
	email 			VARCHAR(150)		UNIQUE NOT NULL
							CONSTRAINT email
							CHECK(email LIKE '%_@_%.__%'),
	pswd 			VARCHAR(255)		NOT NULL,
	img_profilo		VARCHAR(300) --???
);

ALTER TABLE Utente
ADD COLUMN country VARCHAR(100),
ADD COLUMN city VARCHAR(100),
ADD COLUMN username VARCHAR(100) UNIQUE
;


--Relationship(1,N)



CREATE TABLE IF NOT EXISTS Recensioni(
	PRIMARY KEY(id_libro,id_utente,valutazione),
	id_libro 			INT 	
							REFERENCES Libro(id_libro),
	id_utente			INT
							REFERENCES Utente(id_utente),
	testo 				VARCHAR(300)	,
	valutazione			INT
							CONSTRAINT rating
							CHECK(valutazione > 0 AND valutazione < 10)

);




CREATE VIEW Libri_recenti AS
SELECT * FROM Libro
ORDER BY data_rilascio DESC
LIMIT 9;

CREATE VIEW Valutazione AS
SELECT * FROM Libro
ORDER BY valutazione DESC
LIMIT 9;


CREATE VIEW Visualizza_libri AS
SELECT titolo,copertina,valutazione,nome,cognome
FROM (Libro JOIN Autore_libro ON Libro.id_libro = Autore_Libro.id_libro)
JOIN Autore ON Autore_libro.id_autore = Autore.id_autore;

CREATE VIEW Libri AS
SELECT titolo,copertina,genere,valutazione
FROM (Libro JOIN Genere_libro ON Libro.id_libro = Genere_libro.id_libro)
JOIN Genere ON Genere.id_genere = Genere_libro.id_genere;





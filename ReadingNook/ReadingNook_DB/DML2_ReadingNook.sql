
INSERT INTO Libro(isbn,titolo,data_rilascio,copertina) VALUES
(2000000098869,'La bella estate','2023-02-14','/ReadingNook/images/Copertine/la_bella_estate.jpeg'),
(9788806245948,'Il mestiere di vivere','2020-05-26','/ReadingNook/images/Copertine/il_mestiere_di_vivere.jpeg'),
(9788856670226,'Le valigie di Auschwitz','2019-03-11','/ReadingNook/images/Copertine/le_valigie_di_auschwitz.jpeg'),
(9788898519651,'I miti delle costellazioni','2019-03-28','/ReadingNook/images/Copertine/i_miti_delle_costellazioni.jpeg'),
(9788806222642,'L''isola di Arturo','2014-07-18','/ReadingNook/images/Copertine/lisola_di_arturo.jpeg'),
(9788806219642,'La storia','2014-02-10','/ReadingNook/images/Copertine/la_storia.jpeg'),
(9788804668237,'1984','2016-06-21','/ReadingNook/images/Copertine/1984.jpeg'),
(9788804686439,'Una boccata d''aria','2018-03-27','/ReadingNook/images/Copertine/una_boccata_daria.jpeg'),
(9788845268342,'Lo Hobbit','2012-06-20','/ReadingNook/images/Copertine/lo_hobbit.jpeg'),
(9788830104716,'Il signore degli anelli','2020-10-28','/ReadingNook/images/Copertine/il_signore_degli_anelli.jpeg'),
(9788842822318,'Il secondo sesso','2016-03-03','/ReadingNook/images/Copertine/il_secondo_sesso.jpeg'),
(9788806222017,'Memorie di una ragazza perbene','2014-05-19','/ReadingNook/images/Copertine/memorie_di_una_ragazza_perbene.jpeg'),
(9788807900594,'La signora Daloway','2013-06-05','/ReadingNook/images/Copertine/la_signora_dalloway.jpeg')
;

INSERT INTO Autore_libro(id_autore,id_libro) VALUES
(3,15),
(3,16),
(6,17),
(6,18),
(5,19),
(5,20),
(2,21),
(2,22),
(7,23),
(7,24),
(4,25),
(4,26),
(1,27)
;

INSERT INTO Genere(genere) VALUES
('Diary'),
('Hystorical'),
('Kids'),
('Assay')
;

INSERT INTO Genere_libro(id_libro,id_genere) VALUES
(15,1),
(16,3),
(16,13),
(17,8),
(17,14),
(18,15),
(19,1),
(19,8),
(20,1),
(20,14),
(21,1),
(21,8),
(21,11),
(22,5),
(22,8),
(23,1),
(23,10),
(24,10),
(25,16),
(26,3),
(27,1),
(27,2)
;


ALTER TABLE Autore
ADD COLUMN bio VARCHAR(300);

ALTER TABLE Autore
ADD COLUMN foto VARCHAR(300);

select * from autore;


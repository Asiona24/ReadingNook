INSERT INTO Libro(isbn,titolo,data_rilascio,copertina) VALUES
(9788822719683,'Gita al faro','2018-06-21','/ReadingNook/images/Copertine/gita_al_faro.jpeg'),
(9788807902826,'Orlando','2017-11-9','/ReadingNook/images/Copertine/orlando.jpeg'),
(9788804663089,'La fattoria degli animali','2016-05-31','/ReadingNook/images/Copertine/la_fattoria_degli_animali.jpeg'),
(9788806245887,'La luna e i falò','2020-05-26','/ReadingNook/images/Copertine/la_luna_e_i_falo.jpeg'),
(9788806221355,'Una donna spezzata','2014-04-22','/ReadingNook/images/Copertine/una_donna_spezzata.jpeg'),
(9788806223342,'Menzogna e sortilegio','2014-07-18','/ReadingNook/images/Copertine/menzogna_e_sortilegio.jpeg'),
(9788855449861,'A un passo da un mondo perfetto','2020-06-23','/ReadingNook/images/Copertine/a_un_passo_da_un_mondo_perfetto.jpeg'),
(2000000098395,'La caduta di Gondolin','2023-02-15','/ReadingNook/images/Copertine/la_caduta_di_gondolin.jpeg'),
(9788807900730,'La metamorfosi','2013-11-01','/ReadingNook/images/Copertine/la_metamorfosi.jpeg'),
(9788806223427,'Il processo','2014-07-18','/ReadingNook/images/Copertine/il_processo.jpeg'),
(9788807901744,'Il castello','2015-01-07','/ReadingNook/images/Copertine/il_castello.jpeg'),
(9788854174511,'Emma','2015-03-05','/ReadingNook/images/Copertine/emma.jpeg'),
(9788854165052,'Orgoglio e pregiudizio','2014-05-22','/ReadingNook/images/Copertine/orgoglio_e_pregiudizio.jpeg'),
(9788854188143,'Persuasione','2015-10-29','/ReadingNook/images/Copertine/persuasione.jpeg')
;

INSERT INTO Autore(nome,cognome) VALUES
('Virginia','Woolf'),
('George','Orwell'),
('Cesare','Pavese'),
('Simone','De Beauvoir'),
('Elsa','Morante'),
('Daniela','Palumbo'),
('John','R.R. Tolkien'),
('Franz','Kafka'),
('Jane','Austen')
;

INSERT INTO Autore_libro(id_autore,id_libro) VALUES
(1,1),
(1,2),
(2,3),
(3,4),
(4,5),
(5,6),
(6,7),
(7,8),
(8,9),
(8,10),
(8,11),
(9,12),
(9,13),
(9,14)
;

INSERT INTO Genere(genere) VALUES
('Romanzo'),
('Narrativa Psicologica'),
('Narrativa Biografica'),
('Allegoria'),
('Satira'),
('Favola'),
('Fantascienza'),
('Narrativa'),
('Novella'),
('Narrativa Fantasy'),
('Narrativa Distopica'),
('Commedia')
;

INSERT INTO Genere_libro(id_libro,id_genere) VALUES
(1,1),
(1,2),
(2,1),
(2,3),
(3,4),
(3,5),
(3,6),
(3,7),
(4,1),
(5,8),
(6,8),
(7,8),
(8,1),
(9,9),
(9,10),
(10,1),
(10,11),
(11,1),
(11,11),
(11,12),
(12,1),
(12,8),
(12,12),
(13,1),
(14,1)
;



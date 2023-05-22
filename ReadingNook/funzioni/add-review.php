<?php
session_start();
$id_libro = $_POST['libro'];
$id_utente = $_POST['utente'];
$testo = $_POST['testo'];
$valutazione = ($_POST['rating'])/2;



$connect = pg_connect("host=localhost port=5432 dbname=readingnook user=postgres password=24082001") or die('Could not connect: ' . pg_last_error());
$query = "INSERT INTO Recensioni(id_utente,id_libro,testo,orario,valutazione) VALUES
          ($id_utente,$id_libro,'$testo',current_timestamp,$valutazione);";


pg_query($connect,$query);
$query = "UPDATE Libro SET valutazione=(SELECT avgscore FROM Media WHERE Libro.id_libro = Media.id_libro) WHERE id_libro = $id_libro; ";
pg_query($connect,$query);

pg_close($connect);


header('Location: ' . $_SESSION['url'] );
exit;

?>
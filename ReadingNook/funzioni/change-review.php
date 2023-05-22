<?php

    $connect = pg_connect("host=localhost port=5432 dbname=readingnook user=postgres password=24082001") or die('Could not connect: ' . pg_last_error());
    $rate = $_POST['rate']/2;
    $testo = $_POST['testo'];
    $utente = $_POST['utente'];
    $libro = $_POST['libro'];

    $query = "UPDATE Recensioni SET testo = '$testo', valutazione = $rate WHERE id_libro = $libro AND id_utente = $utente;";
    pg_query($connect,$query);

    $query = "UPDATE Libro SET valutazione=(SELECT avgscore FROM Media WHERE Libro.id_libro = Media.id_libro) WHERE id_libro = $libro; ";

    pg_query($connect,$query);
    
    pg_close($connect);














?>

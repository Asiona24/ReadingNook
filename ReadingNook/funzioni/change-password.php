<?php
    session_start();
    $connect = pg_connect("host=localhost port=5432 dbname=readingnook user=postgres password=24082001") or die('Could not connect: ' . pg_last_error());
    $old = $_POST['old'];
    $password = password_hash($_POST['new'],PASSWORD_DEFAULT);
    $id = $_SESSION['userid'];
    $query = "SELECT * FROM Utente WHERE id_utente = $id ;";
    $result = pg_query($connect,$query);
    $line = pg_fetch_array($result,null,PGSQL_ASSOC);
    if ($line != null){
        // effettuo la comparazione della password digitata con quella salvata nel DB
        if (password_verify($old,$line['pswd'])) {
            // in caso di successo faccio l'update

            $query = "UPDATE Utente SET pswd = '$password' WHERE id_utente = $id;";
            $result = pg_query($connect,$query);
            // e stampo 1 (che identifica il successo)
            
            echo 1;
        }else{
            // in caso di comparazione non riuscita stampo zero
            
            echo 0;
        }
    }else{
        // se non ci sono risultati stampo zero
        echo 0;
    }
    pg_free_result($result);
    pg_close($connect);
    
?>
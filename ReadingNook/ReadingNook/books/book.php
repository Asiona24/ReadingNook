<?php
    session_start();

    $_SESSION['url'] = $_SERVER['REQUEST_URI'];
    

    if(!(isset($_GET['titolo']))){
        header('Location: ' . '/ReadingNook/home/home.php');
    }else{
        $connect = pg_connect("host=localhost port=5432 dbname=readingnook user=postgres password=24082001") or die('Could not connect: ' . pg_last_error());
        $titolo = $_GET['titolo'];
        $titolo = str_replace("'","''",$titolo);
        $query = "SELECT * FROM Libro WHERE titolo = '$titolo';";
        $result = pg_query($connect,$query);
        $libri = pg_fetch_array($result,null,PGSQL_ASSOC);


        $query = "SELECT nome,cognome FROM (Libro JOIN Autore_libro ON Libro.id_libro = Autore_libro.id_libro) JOIN Autore ON Autore_libro.id_autore = Autore.id_autore WHERE titolo = '$titolo';";
        $result = pg_query($connect,$query);
        $autore = pg_fetch_array($result);
        $nome_autore = $autore['nome'];
        $cognome_autore = $autore['cognome'];


        $output = "";

    }
?> 

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ReadingNook</title>
    <!--Per le stelline-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <!-- Per l'icona del titolo -->
    <link rel="icon" type="image/x-icon" href="/ReadingNook/images/favicon.ico">
    <!-- Nostre Modifiche-->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/stelle.css">
    <!--Boostrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <!-- Per aggiungere effetto on hover al nav con jquery-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    
    
    
</head>

<body>
  
  <?php include '/Users/asiamazzotta/Desktop/ReadingNook/componenti/navbar.php'; ?>

  

  <div class="container-fluid pt-4">
    <div class="border border-2 rounded pb-4 px-1">
      <div class="row mt-4">
        <div class="col-md-3 col-sm">
          <img width="300" height="300" id="libro" src="<?php echo $libri['copertina']; ?>" class="img-thumbnail ms-3">
        </div>
        <div class="col-md">
         
          <h4 id="nome"> <?php echo $libri['titolo']; ?> <a type="button" class="btn ms-5 border" href="<?php echo $libri['sito'];?>" ><i class="bi bi-cart-fill"></i></a></h4>
          <h6>Version: (<?php echo $libri['lingua'];?>)</h6>
          <div class="stelline">
            <div class="stars-outer">
                <div class="stars-inner" style="width: <?php 
                
                $val = ($libri['valutazione'] / 5) * 100;
                $val = round($val/10)*10;
                $val = "$val%";
                echo $val;


                ?>;"></div>
            </div>
            <span class="number-rating"><?php echo $libri['valutazione'] ?></span>
            
          </div>
          <div class="text-center mt-4">
            <a href="/ReadingNook/author/author.php?nome=<?php echo $nome_autore;?>&cognome=<?php echo $cognome_autore;?>" class="text-decoration-none"><h5 id="autore"><?php echo $nome_autore ." ". $cognome_autore?></h5></a>
          </div>
          <div class="row mt-5">
            <div class="col-md">
              <h6>ISBN: <?php echo $libri['isbn'];?></h6>
            </div>
            <div class="col-md">
              <h6>Release Date: <?php echo date("M jS, Y", strtotime($libri['data_rilascio']));?></h6>
            </div>

          </div>
          <hr>
          <div class="text-center mt-2">
            <h5>Plot:</h5>
            <p id="bio"><?php echo $libri['trama'];?></p>
          </div>
        </div>
        
        
      </div>

    </div>
    
    <hr class="mt-4">
    <hr>

    <div id="recensioni">
      <h5 class="ms-4" style="font-size:x-large;">Reviews:</h5>



      <?php
        if(empty($_SESSION['userid'])){
          $display1 = "d-none";
          $display2 = "d-block";
        }else{
          $display1 = "d-block";
          $display2 = "d-none";

          $id_utente = $_SESSION['userid'];
          $query = "SELECT * FROM Utente WHERE id_utente = '$id_utente';";
          $result = pg_query($connect,$query);
          $utente = pg_fetch_array($result,null,PGSQL_ASSOC);
          $nome_utente = $utente['nome'];
          $cognome_utente = $utente['cognome'];
          $img = $utente['img_profilo'];
          if($img == null){
            $img = "/ReadingNook/images/user.png";
          }
          $query = "SELECT * FROM Recensioni WHERE id_utente = $id_utente";
          $result = pg_query($connect,$query);
          $n = pg_num_rows($result);
          if($n!=0){
            $display1 = "d-none";
          }
        }
        
        
      ?>





      <div class="<?php echo $display1;?> border border-2 rounded p-3">

        <form  action="/funzioni/add-review.php" method="post">
          <div class="row justify-content-center">
            <div class="col-md-2 col-sm-12 text-center">
              <img src="<?php echo $img;?>" width="150" height="150" alt="" class="rounded-circle border border-2">
            </div>
            <div class="col-md-4 col-sm-12 text-center mt-4">
              <h4 class="fw-bolder"><?php echo $nome_utente . ' '. $cognome_utente;?></h4>
            </div>
            <div class="col-md-2 col-sm-12 text-center mt-4">

              <div class="rate">
                <input type="radio" id="rating10" name="rating" value="10" /><label for="rating10" title="5 stars"></label>
                <input type="radio" id="rating9" name="rating" value="9" /><label class="half" for="rating9" title="4 1/2 stars"></label>
                <input type="radio" id="rating8" name="rating" value="8" /><label for="rating8" title="4 stars"></label>
                <input type="radio" id="rating7" name="rating" value="7" /><label class="half" for="rating7" title="3 1/2 stars"></label>
                <input type="radio" id="rating6" name="rating" value="6" /><label for="rating6" title="3 stars"></label>
                <input type="radio" id="rating5" name="rating" value="5" /><label class="half" for="rating5" title="2 1/2 stars"></label>
                <input type="radio" id="rating4" name="rating" value="4" /><label for="rating4" title="2 stars"></label>
                <input type="radio" id="rating3" name="rating" value="3" /><label class="half" for="rating3" title="1 1/2 stars"></label>
                <input type="radio" id="rating2" name="rating" value="2" /><label for="rating2" title="1 star"></label>
                <input type="radio" id="rating1" name="rating" value="1" /><label class="half" for="rating1" title="1/2 star"></label>
                <input type="radio" id="rating0" name="rating" value="0" /><label for="rating0" title="No star"></label>
              </div>

              <input type="hidden" name="utente" value="<?php echo $utente['id_utente'];?>">
              <input type="hidden" name="libro" value="<?php echo $libri['id_libro']; ?>">
            </div>

            
          </div>
          <div class="row justify-content-center">
            <div class="col-md-9 col-sm-12 text-center mt-4">
              <div class="form-outline mb-4">
                <span style="font-size: .875rem;color: #adb5bd;">Review must have max 300 characters</span>
                <textarea class="form-control" name="testo" maxlength="300" rows="4"></textarea>
                <label class="form-label" for="textAreaExample6"></label>
                <input type="submit" class="btn btn-primary mt-3" value="Submit">
              </div>
            </div>
          </div>


          
          
          
        </form>
      </div>
      <div class="<?php echo $display2;?>">
        <p class="fst-italic text-decoration-underline"><a href="/ReadingNook/login/login.php" onclick="passaUrl();" >Please login to leave a review!</a></p>
      </div>



      <div style="overflow-y: scroll;">
        <?php
          $id = $libri['id_libro'];
          $query = "SELECT * FROM Recensioni JOIN Utente ON Recensioni.id_utente = Utente.id_utente WHERE id_libro = '';";



        ?>
      </div>

    </div>


  </div>
  <?php include '/Users/asiamazzotta/Desktop/ReadingNook/componenti/footer.php';?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="/funzioni/cerca.js"></script>
  
  <script type="text/javascript">
    function passaUrl() {
        sessionStorage.setItem("url",window.location.href);
    }
  </script>



</body>

</html>

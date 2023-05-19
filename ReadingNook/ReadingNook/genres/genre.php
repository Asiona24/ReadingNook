<?php
    if(!(isset($_GET['genere']))){
        header('Location: ' . '/ReadingNook/home/generi.php');
    }else{
        $genere = $_GET['genere'];
        $connect = pg_connect("host=localhost port=5432 dbname=readingnook user=postgres password=24082001") or die('Could not connect: ' . pg_last_error());
        $query = "SELECT * FROM Libri WHERE genere = '$genere' ";
        $result = pg_query($connect,$query);
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
    <!--Boostrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <!-- Per aggiungere effetto on hover al nav con jquery-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    
</head>

<body>
  <?php include "/Users/asiamazzotta/Desktop/ReadingNook/componenti/navbar.php"; ?>

  

  <div class="conteiner-fluid">
    <div class="row">
          <div class="col-md-8 col-sm-12 mx-auto mt-5">
            <div class="input-group">
                
                <input type="text" class="form-control">
                <div class="input-group-append">
                  <span class="input-group-text"><i class="bi bi-search"></i></span>
                </div>
                
                
            </div>
          </div>
            
    </div>
        
    <br>
    <hr>
    <hr>  
    <div id="genere">
      <?php
        

        $output .= "
          
        <div class=\"row ms-2 me-2\">

        ";

        while($row = pg_fetch_array($result,null,PGSQL_ASSOC)){
          $copertina = $row["copertina"];
          $titolo = $row["titolo"];
          $valutazione = $row["valutazione"];
          $val = ($valutazione / 5) * 100;
          $val = round($val/10)*10;
          $val = "$val%";

          $output .= "
          <div class=\"col-md-4 p-3 mt-1\">
            <a href=\"/ReadingNook/books/book.php?titolo=$titolo\" class=\"text-decoration-none\">
              <div class=\"card\">
                  <img src=\"$copertina\" class=\"card-img-top mt-2 copertina\">
                  <div class=\"card-body\">
                      <h6 class=\"card-title titolo\">$titolo</h6>
                      <div class=\"stelline\">
                          <div class=\"stars-outer\">
                              <div class=\"stars-inner\" style=\"width: $val;\"></div>
                          </div>
                          <span class=\"number-rating\">$valutazione</span>
                      
                      </div>
                  </div>
              </div>
            </a>
          </div>
          ";
        }
        $output .= "</div>";
        echo $output;
        pg_free_result($result);
        pg_close($connect);
      ?>

    </div>
  </div>
  

  
    
  



    



    

    <!-- Per far apparire il menu a tendina, per la pagination-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/funzioni/cerca.js"></script>
    




</body>

</html>

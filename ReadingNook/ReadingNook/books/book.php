<?php

    if(!(isset($_GET['titolo']))){
        header('Location: ' . '/ReadingNook/home/home.php');
    }else{
        $connect = pg_connect("host=localhost port=5432 dbname=readingnook user=postgres password=24082001") or die('Could not connect: ' . pg_last_error());
        $titolo = $_GET['titolo'];
        $titolo = str_replace("%"," ",$titolo);
        $query = "SELECT * FROM Libro WHERE titolo = '$titolo';";
        $result = pg_query($connect,$query);
        $libri = pg_fetch_array($result,null,PGSQL_ASSOC);
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
  <div class="sticky-top">
    <nav class="navbar navbar-expand-lg ">
      <div class="container-fluid">
        <a class="navbar-brand" id="titolo" href="/ReadingNook/home/home.php">ReadingNook</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/ReadingNook/home/home.php">Home</a>
            </li>

            <li class="nav-item dropdown">


              <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Browse
              </a>


              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li id="author-page"><a class="dropdown-item" href="/ReadingNook/home/authors.php">Authors</a></li>
                <li><a class="dropdown-item" href="/ReadingNook/home/generi.php">Genres</a></li>
              </ul>


            </li>

            <li class="nav-item">
              <a href="/ReadingNook/home/profile/area_privata.php" class="nav-link">Profile</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/ReadingNook/home/contacts.php">Contacts</a>
            </li>
            
          </ul>
          <form class="d-flex justify-content-center" id="form">
            <!-- DA SOSTITUIRE LE ICONE -->
           
            <input id="search" class="form-control" type="text" autocomplete="off" placeholder="Search" aria-label="Search">
            
            <ul class="dropdown" id="dropdown">  
            </ul>
          


            <button id="login-btn" type="button" class="btn btn-outline-success m-1 ms-2" onclick="location.href=' /ReadingNook/login/login.php'"><i class="bi bi-person-circle fa-lg p-1"></i></button>
          </form>
          
        </div>
      </div>
    </nav>
  </div>

  

  <div class="container-fluid pt-4">
    <div class="border border-2 rounded pb-4 px-1">
      <div class="row mt-4">
        <div class="col-md-3 col-sm">
          <img width="300" height="300" id="autore" src="<?php echo $libri['copertina']; ?>" class="rounded img-fluid">
        </div>
        <div class="col-md">
          <h4 id="nome"> <?php echo $libri['titolo']; ?>  </h4>
          <!--<p class="mt-4"> <?php echo $libri['trama'] ?> </p> -->
          <div class="stelline">
            <div class="stars-outer">
                <div class="stars-inner" style="width: <?php echo $libri['valutazione'] ?>;"></div>
            </div>
            <span class="number-rating"><?php echo $libri['valutazione'] ?></span>
          </div>
        </div>
        
        
      </div>

    </div>
    
    <hr class="mt-4">
    <hr>

    <div class="container-fluid">
      <h4 class="text-center">Reviews:</h4>
      <div class="row mt-4">
        <div class="container" id="libri">
            <?php 
              $output .= "
              
                  <div id=\"foto\" class=\"row mt-4 mb-4\">
              
              ";
          
              while($row = pg_fetch_array($libri,null,PGSQL_ASSOC)){
                  
                $copertina = $row["copertina"];
                $titolo = $row["titolo"];
                $valutazione = $row["valutazione"];
                $val = ($valutazione / 5) * 100;
                $val = round($val/10)*10;
                $val = "$val%";
        
                $output .= "
                
                <div class=\"col-md-4 p-3 mt-1\">
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
                </div>
                
                ";
        
        
              }
              $output .= "</div>";  
              echo $output; 
              pg_free_result($autore);
              pg_free_result($libri);
              pg_close($connect);
              
            ?>
        </div>
      </div>
    </div>


  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="/ajax/cerca.js"></script>
  



</body>

</html>

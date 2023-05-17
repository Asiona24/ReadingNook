<?php
// avvio la sessione
session_start();

// verifico che esista la sessione di autenticazione
if (empty($_SESSION['userid'])) {
  header('Location: '.' /ReadingNook/login/login.php');
  exit;
}else{
  $id = $_SESSION['userid'];
  $connect = pg_connect("host=localhost port=5432 dbname=readingnook user=postgres password=24082001") or die('Could not connect: ' . pg_last_error());
  $query = "SELECT * FROM Utente WHERE id_utente = $id;";
  $result = pg_query($connect,$query);
  $utente = pg_fetch_array($result,null,PGSQL_ASSOC);
  $query = "SELECT * FROM Recensioni WHERE id_utente = $id;";
  $recensioni = pg_query($connect,$query);
  $r = pg_num_rows($recensioni);

 
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
    <link rel="stylesheet" href="bru.css">
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






  <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(/ReadingNook/images/sfondo_profile.jpeg); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container d-flex align-items-center">
          
          <div class="row">
            <div class="col-lg-7 col-md-10">
              <h1 class="display-2 text-white" style="text-align: center;">Hi user!</h1>
              <p class="text-white mt-0 mb-5" style="text-align: center;">This is your profile page. You can see here your profile's details and you can update them whenever you want!</p>
              
          </div>
            
            
            
              
        </div>
    </div>
  </div>





  

  <div class="container mt--7">
        <div class="row mt-4">
          <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
              
              <!-- rettangolo in alto con Message-->
              <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                <div class="d-flex justify-content-between">
                  <h3 class="mb-0">Details</h3>
                  <a href="./settings.php" class="btn btn-sm btn-primary">Settings</a>
                </div>
              </div>
              <div class="text-center mt-5">
                <?php 
                  if ($utente['img_profilo'] == null){
                    $src = "/ReadingNook/images/user.png";
                  }else{
                    $src = $utente['img_profilo'];
                  }
                ?>
                <img id="fotoprofilo" src="<?php echo $src ?>" alt="" class="img-thumbnail rounded">
              </div>
              <div class="card-body pt-0 pt-md-2">
                <div class="row">
                  <div class="col">
                    <div class="card-profile-stats d-flex justify-content-center mt-md-3">
                      <div>
                        <span class="heading"><?php echo $r; ?></span>
                        <span class="description">Reviews</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <h3>
                    <?php echo $utente['nome'] . " " . $utente['cognome']; ?>
                  </h3>
                  <div class="h5 font-weight-300">
                    <i class="ni location_pin mr-2"></i> <?php echo $utente['city'] . "," . $utente['country'] ;?>
                  </div>
                  <?php 
                      $data=$utente['ddn'] ;
                      echo date("M jS, Y", strtotime($data));
                    ?>
                  <div class="h5 font-weight-300 mt-3">
                    <i class="ni location_pin mr-2"></i> Registration Date:
                  </div>
                  <div class="mt-2">
                    <i class="ni education_hat mr-2"></i> <?php
                    $data = $utente['data_iscrizione'];
                    echo date("M jS, Y", strtotime($data)); 
                    ?>
                  </div>
                  
                  <!--riga tra profilo e show more-->
                  <hr class="my-4">
                  <a href="/ReadingNook/home/logout.php" class="btn btn-sm btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

          <!--rettangolo a sinistra-->
          <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
              <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                  <div class="col-8">
                    <h3 class="mb-0">My reviews</h3>
                  </div>
                  
                </div>
              </div>
              <!--PARTE DOVE AGGIUNGERE RECENSIONI-->
              <div class="card-body">
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--per lasciare spazio alla fine pagina-->
    <footer class="footer">
      
    </footer>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="/ajax/cerca.js"></script>


</body>
</html>
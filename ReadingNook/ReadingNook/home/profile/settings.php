<?php 
    session_start();
    $id = $_SESSION['userid'];
    $connect = pg_connect("host=localhost port=5432 dbname=readingnook user=postgres password=24082001") or die('Could not connect: ' . pg_last_error());
    $query = "SELECT * FROM Utente WHERE id_utente = $id;";
    $result = pg_query($connect,$query);
    $utente = pg_fetch_array($result,null,PGSQL_ASSOC);
  
    $img = $utente['img_profilo'];
?>

<?php

    //Cambio immagine del profilo
    if(isset($_POST['invia'])){
        /*Cancello la foto iniziale se ci sta e faccio l'upload di quella nuova */


        $photo = "".$id.".jpeg";
        $tmp = $_FILES['image']['tmp_name'];
        $folder = "C:\\Users\\asiam\\Desktop\\ReadingNook\\ReadingNook\\images\\users\\" .$photo;
        move_uploaded_file($tmp,$folder);
        $path = "/ReadingNook/images/users/" . $photo;
        $query = "UPDATE Utente SET img_profilo = '$path' WHERE id_utente = $id;";
        $result = pg_query($connect,$query);

       
        header("Refresh:0");
        
    }
    //Aggiorno dati del profilo
    if(isset($_POST['modifica'] )){
        $nome = $_POST['firstname'];
        $cognome = $_POST['lastname'];
        $birthday = $_POST['birthday'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        
        

        $query = "UPDATE Utente SET nome = '$nome' , cognome = '$cognome' , ddn = '$birthday' , country = '$country' , city = '$city' WHERE id_utente = $id;";
        pg_query($connect,$query);
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



     <div class="container-xl px-4 mt-4">
       
        
            
        
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                        <form action="settings.php" method="post" enctype="multipart/form-data">
                            <div class="card-body text-center">
                                <!-- Profile picture image-->
                                <img width="200" class="img-account-profile rounded-circle mb-2" src="<?php if($img != null){echo $img;}else{echo "/ReadingNook/images/user.png";}; ?>" alt="Submit">
                                <!-- Profile picture help block-->
                                <div class="small font-italic text-muted mb-4">Upload a photo for your profile</div>
                                <!-- Profile picture upload button-->
                                <input type="file" accept="image/*" name="image">
                                <input class="btn btn-primary mt-2" value="Submit" name="invia" type="submit">
                                
                            </div>    
                        </form>
                        
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">User informations</div>
                    <div class="card-body">
                        <form action="settings.php" method="post">
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="firstname">First name</label>
                                    <input class="form-control" id="firstname" name="firstname" type="text" placeholder="Enter your first name" value="<?php echo $utente['nome'];?>">
                                </div>
                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="lastname">Last name</label>
                                    <input class="form-control" id="lastname" name="lastname" type="text" placeholder="Enter your last name" value="<?php echo $utente['cognome'];?>">
                                </div>
                            </div>
                            <!-- Form Row        -->
                            <div class="row gx-3 mb-3">
                                
                                <div class="col-md-6">
                                    <label class="small mb-1" for="country">Country</label>
                                    <input class="form-control" id="country" name="country" type="text" placeholder="Enter your country" value="<?php if($utente['country'] != null){echo $utente['country'];};?>">
                                </div>
                                <div class="col-md-6">
                                    <label class="small mb-1" for="city">City</label>
                                    <input class="form-control" id="city" name="city" type="text" placeholder="Enter your city" value="<?php if($utente['city'] != null){echo $utente['city'];};?>">
                                </div>
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputEmailAddress">Email</label>
                                    <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email" value="<?php echo $utente['email'];?>" readonly>                    
                                </div>
                                <!-- Form Group (birthday)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="birthday">Birthday</label>
                                    <input class="form-control" id="birthday" type="date" name="birthday" value="<?php echo $utente['ddn'] ?>">
                                </div>
                            </div>
                            
                            <!-- Save changes button-->
                            <input type="submit" name="modifica" class="btn btn-primary" value="Submit">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/ajax/cerca.js"></script>


</body>
</html>
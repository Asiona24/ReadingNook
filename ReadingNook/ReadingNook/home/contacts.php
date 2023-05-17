<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts</title>
    <!-- Per l'icona del titolo -->
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <!-- Per l'immagine della lente tasto cerca -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--Per la Nav Bar -->
    <link href="/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Nostre Modifiche-->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/css/style.css">
    <!--Boostrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <!-- Per aggiungere effetto on hover al nav con jquery-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    
   


    
    <style>
        .dropdown:hover .dropdown-menu{
            display: block;
        }
        .dropdown-menu{
            margin-top: 0;
        }
    </style>
    <script>
    $(document).ready(function(){
        $(".dropdown").hover(function(){
            var dropdownMenu = $(this).children(".dropdown-menu");
            if(dropdownMenu.is(":visible")){
                dropdownMenu.parent().toggleClass("open");
            }
        });
    });     
    </script>
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



      
  <div class="container">
    <div class="row header">
      <h1>CONTACT US &nbsp;</h1>
      <h3>Fill out the form below if you have anything you're curious about!</h3>
    </div>

    <div class="row body">
      <form action="" method="post" name="contact">
        <ul>
            
          <li>
            <p class="left">
              <label for="first_name">First name<span class="req">*</label>
              <input type="text" name="first_name" placeholder="first name.." required />
            </p>
            <p class="pull-right">
              <label for="last_name">Last name<span class="req">*</label>
              <input type="text" name="last_name" placeholder="last name.." required />      
            </p>
          </li>
            
          <li>
            <p>
              <label for="email">Email <span class="req">*</span></label>
              <input type="email" name="email" placeholder="email.." />
            </p>
          </li>        
          <li><div class="divider"></div></li>
          <li>
            <label for="comments">Report or Question!</label>
            <textarea class="rounded  " cols="46" rows="3" name="comments" required ></textarea>
          </li>
            
          <li>
            <input class="btn btn-submit" type="submit" value="Submit" />
            
          </li>
          
        </ul>
      </form>  
    </div>
  </div>

      
    <!-- Per far apparire il menu a tendina, per la pagination-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/ajax/cerca.js"></script>
    <script src="/ajax/high-rating.js"></script>
    <script src="/ajax/recent-add.js"></script>
</body>
</html>

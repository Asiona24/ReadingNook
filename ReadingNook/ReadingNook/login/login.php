<?php
  session_start();
  if(!empty($_SESSION['userid'])){
    header('Location: ' . '/ReadingNook/home/profile/area_privata.php');
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
    <link rel="stylesheet" href="./style.css">
    <!--Boostrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <!-- Per aggiungere effetto on hover al nav con jquery-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    
    <script>
      function controllaEmail(){
        var format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (document.formlogin.email.value.match(format)){
          return (true)
        }
        alert("You have entered an invalid email address!");
        document.formlogin.email-login.focus();
        return (false)
      };
      function myFunction() {
        var x = document.getElementById("password-login");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
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

    <section class="form-02-main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="_lk_de">
              <div class="form-03-main">
                
                <div class="logo">
                  <img src="/ReadingNook/images/user.png" class="ms-2">
                </div>
                
                <h2 class="form_title title" style="text-align:center;">Sign in to Website</h2>
                <form class="form" name="formlogin" id="b-form">
                
                
                  <input name="email" id="email-login" class="form__input" type="text" placeholder="Email" autocomplete="off" onchange="return controllaEmail();" required>
                  <input name="password" id="password-login" class="form__input" type="password" placeholder="Password" required>
                  <div class="form-check form-switch">
                    <input type="checkbox" class="form-check-input" onclick="myFunction()">Show Password
                  </div>
                  
                  <div id="messaggio"></div>
                  <div class="form-group">
                    <input type="submit" id="submit-login" value="Login" class="_btn_04">
                  </div> 

                </form>
                

                <div class="checkbox form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="">
                    <label class="form-check-label" for="">
                      Remember me
                    </label>
                  </div>
                  <a href="#">Forgot Password</a>
                </div>

                
  

                <div><p class="text-center fst-italic mt-1 mb-0">Don't have an account?</p></div>
                <div class="form-group" class="text-decoration-none" style="text-align:center;font-weight:bold;">
                  
                    <a id="registrazione"  href="./register.php" style="text-decoration:none;">Register</a>
                  
                </div>
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/ajax/cerca.js"></script>


    <!--SCRIPT PER SIGN IN-->
    <script type="text/javascript">
      $("#b-form").submit(function() {
        // passo i dati (via POST) al file PHP che effettua le verifiche 
        $.post("/ajax/process-login.php", { password: $('#password-login').val(), email: $("#email-login").val() }, function(risposta) {
          // se i dati sono corretti...
          if (risposta == 1) {
            // applico l'effetto allo span con id "messaggio"
            $("#messaggio").fadeTo(200, 0.1, function() {
              // per prima cosa mostro, con effetto fade, un messaggio di attesa
              $(this).removeClass().addClass('corretto').text('Login in corso...').css('color','black').fadeTo(900, 1, function() {
                // al termine effettuo il redirect alla pagina privata
                document.location = '/ReadingNook/home/profile/area_privata.php';
              });
            });
          // se, invece, i dati non sono corretti...
          }else{
            // stampo un messaggio di errore
            $("#messaggio").fadeTo(200, 0.1, function() {
              $(this).removeClass().addClass('errore').text('Dati di login non corretti!').css('color','black').fadeTo(900,1);
            });
          }
        });
        // evito il submit del form (che deve essere gestito solo dalla funzione Javascript)
        return false;
      });
    </script>
  
    


</body>
</html>

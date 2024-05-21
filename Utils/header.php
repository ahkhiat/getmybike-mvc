<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" href="./Content/img/site/fav.ico" type="image/x-icon">

  <!-- ------------------------------- stylesheets ------------------------------ -->
  <link rel="stylesheet" href="./Content/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- ------------------------------- libraries scripts  ------------------------------ -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/29aef3fc25.js" crossorigin="anonymous"></script>

  <!-- ---------------------------------icons---------------------------------------- -->
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

  <!-- --------------------------------fonts-------------------------------------------- -->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">


  <!-- ------------------------------- scripts ------------------------------ -->
  <script type="module" src="./Content/js/script.js" defer></script>
  <script src="./Content/js/login_form_verify.js" defer></script>
  <script src="./Content/js/registration_form_verify.js" defer></script> 
  <script src="./Content/js/form-preresa.js" defer></script> 


  <title>Get My Bike</title>
</head>

<body>
  <header>

    <!-- -------------------------Navbar Bootstrap---------------------------------------- -->


    <nav class="navbar navbar-expand-lg navbar-main " id="navbar_main">

      <div class="container-fluid">

        <div>
          <?php
              if (isset($_SESSION["email"])) 
              { echo 
                '
                <a href="?controller=moto&action=all_motos" class="href"><img class="logo" src="./Content/img/site/logo.png" alt="logo.png"></a>
              ';
              } else  {
                echo 
                '
                <a href="?controller=home&action=home" class="href"><img class="logo" src="./Content/img/site/logo.png" alt="logo.png"></a>
                ';
              }
              ?>
        </div>

        <?php
            if (isset($_SESSION["email"])) 
            { echo 
              '
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
            ';
            }
            ?>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <?php
            if (isset($_SESSION["email"])) {
              include('Utils/header_User.php') ;
              };
          ?> 
        
        </div>
        
        <ul class="navbar-nav ms-5 me-auto mb-lg-0">
            <a href="?controller=home&action=faq"><li class="nav-item">Des questions ?</li></a>
        </ul>
          <!-- this button is here to respect the automatic justify between of the bootstrap navbar  -->
          <?php
          if (!isset($_SESSION["email"])) {
            echo 
                      '
                      <ul class="nav-item me-3 mb-2 mb-lg-0">
                        <a href="?controller=security&action=user_connection" ><button type="button" class="btn btn-louer">Louer ma moto</button></a>
                      </ul>
                      ';
          }
          ?>

      </div>

    </nav>


  </header>
</body>

</html>
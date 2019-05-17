<?php
error_reporting(E_ALL);?>

<!DOCTYPE html>

<html>

  <head>
      <meta charset="utf-8" />
      <title>Forteroche Live</title>
      <link rel="stylesheet" href="/forteroche/public/style.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
      <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=0zyt0uc363koowi3vpni9xwls9t0s9tzss66rx4o3098iije"></script>
      <script>tinymce.init({selector:'textarea.tinymce', width: '850px', height : '400px',});</script>
      <link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>

  <body class='bg'>

      <nav class="navbar navbar-expand-lg navbar-light bg-white">
          <a class="navbar-brand" href='/forteroche/app/Home/show'><img src="/forteroche/public/img/logoj.png" id="logo"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                      <a class="nav-link" href='/forteroche/app/Home/show'><i class="fas fa-home"></i> <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/forteroche/app/Tchat/show">Le Tchat des Rocheux</a>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Lire en ligne
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="/forteroche/app/Listing/show_books">Par Livres</a>
                          <a class="dropdown-item" href="#">Par Genres</a>
                          <a class="dropdown-item" href="/forteroche/app/Listing/show_chapters">Par Chapitres</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Vous aurez la possibilité de laisser un commentaire en fin de lecture</a>
                      </div>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="#">Acheter les Livres</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/forteroche/app/Jean/show">L'auteur</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/forteroche/app/Contact/show">Contact</a>
                  </li>
              </ul>

                  <ul class="navbar-nav mr-auto">
                      <?php 
                          if (isset ($_SESSION['identifiant']) && $_SESSION['identifiant'] == 'ADMIN' ) {
                            echo '
                      <li class="nav-item">
                          <a id="admin" class="nav-link" href="/forteroche/app/Write/show">ADMIN</a>
                      </li>
                      <li class="nav-item"> <form action="/forteroche/app/User/disconnect" method="post">
                          <button type="submit" class="btn btn-dark" name="disconnect_btn">Me déconnecter</button>
                          </form>
                      </li>'; } 
                      
                          elseif (isset ($_SESSION['identifiant'])) {
                              echo '
                              <li class="nav-item">
                                  <a id="connected" class="nav-link" href="/forteroche/app/User/show">Mon Espace (<strong>'.$_SESSION['identifiant'].'</strong>)</a> 
                              </li>
                              <li class="nav-item"> <form action="/forteroche/app/User/disconnect" method="post">
                                  <button type="submit" class="btn btn-dark" name="disconnect_btn">Me déconnecter</button>
                                  </form>
                              </li>'; 

                          }else { echo '
                              <li class="nav-item">
                                  <a id="connect" class="nav-link" href="/forteroche/app/Connexion/show">Se connecter</a>
                              </li>
                              <li class="nav-item">
                                  <a id="create" class="nav-link" href="/forteroche/app/Create/show">Devenir Rocheux</a>
                              </li>';}
                      ?>
                  </ul>

                  <!-- BARRE DE RECHERCHE AJAX -->
              <!--<div class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" name ='search' id='search' placeholder="Recherche.." aria-label="Recherche">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
              </div> -->

          </div>
      </nav>

  <div class="box_title">
    <h1 class="h1 text-light text-center"><span class="gradient">FORTEROCHE LIVE</span></h1>
    <h2 class="h2 text-light text-center">Vivez toute les publications de votre auteur préféré directement en ligne</h2>
</div>
        
<header>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url('https://images4.alphacoders.com/132/132008.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">Billet Simple pour l'Alaska</h2>
          <p class="lead">La dernière aventure de Forteroche. Elle vous mènera aux confins d'un imaginaire insaisissable !</p>
        </div>
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('https://digitalart.io/storage/artworks/281/Gods-of-Land-vs-Water-Epic-Wallpaper.jpeg')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">Le Spectre du Soleil</h2>
          <p class="lead">Un roman haletant au suspens insoutenable !</p>
        </div>
      </div>
      <!-- Slide Three - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('https://images6.alphacoders.com/492/492493.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="display-4">Une Curieuse Rencontre</h2>
          <p class="lead">Une nouvelle rafraîchissante, pleine d'humour et de surprises !</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
  </div>
</header>

<!-- Page Content -->
<section class="py-5">
  <div class="container">
    <h1 class="display-4">Full Page Image Slider</h1>
    <p class="lead">The background images for the slider are set directly in the HTML using inline CSS. The images in this snippet are from <a href="https://unsplash.com">Unsplash</a>, taken by <a href="https://unsplash.com/@joannakosinska">Joanna Kosinska</a>!</p>
  </div>
</section>

<div class="loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
  integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
  crossorigin="anonymous"></script>
        <script type="text/javascript" src="/forteroche/public/js/index.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  

    </body>
</html>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OG Tech PC - Page d'accueil</title>
  <?php 
    require "header.php"; 
    require_once "includes/class_autoloader.php";

    // Initialisation de la base de données
    $dbinit = new InitDB();
    $dbinit->initDbExec();
  ?>
</head>
<body>
  <div class="slider" style="width: 60%; margin: auto;">
    <ul class="slides">
      <li>
        <img src="./static/images/carousel_1.gif"> 
        <div class="caption center-align">
          <h3></h3>
          <h5 class="light grey-text text-lighten-3">Construisez votre setup de rêve avec nous.</h5>
        </div>
      </li>
      <li>
        <img src="./static/images/category_3.jpg"> 
        <div class="caption center-align">
          <h3 class="bold page-title">Chez OG Tech</h3>
          <h5 class="bold page-title">Du PC aux périphériques, nous avons tout ce qu’il vous faut.</h5>
        </div>
      </li>
      <li>
        <img src="static/images/Banner-Rebate-1.jfif"> 
      </li>
      <li>
        <img src="./static/images/carousel_3.jpg"> 
        <div class="caption center-align">
          <h3 class="bold green-text page-title">RTX ACTIVÉ</h3>
        </div>
      </li>
      <li>
        <img src="./static/images/carousel_4.gif"> 
        <div class="caption center-align">
        </div>
      </li>
    </ul>
  </div>
  
  <div class="container" style="margin-top: 100px">
    <div class="row">
      <div class="row" style="margin-bottom: -20px">
        <h4 class="underline white-text bold center">Catégories</h4>
      </div>
      <div class="row hoverable">
        <div class="col hoverable">
          <a href="product_catalogue.php?category=0" class="hoverable">
            <div class="selectable-card hoverable" style="width: 300px; margin: 50px;">
              <img class="hoverable" src="static/images/category_1.gif"/>
              <h5 class="white-text center bold hoverable">PACKS PC</h5>
            </div>
          </a>
        </div>

        <div class="col">
          <a href="product_catalogue.php?category=1">
            <div class="selectable-card" style="width: 300px; margin: 50px;">
              <img src="./static/images/category_3.jpg"/>
              <h5 class="white-text center bold" style="margin-top : 120px">MONITEURS & AUDIO</h5>
            </div>
          </a>
        </div>

        <div class="col">
          <a href="product_catalogue.php?category=2">
            <div class="selectable-card" style="width: 300px; margin: 50px;">
              <img src="./static/images/category_2.gif"/>
              <h5 class="white-text center bold">PÉRIPHÉRIQUES</h5>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="section" style="margin-top: 100px;">
    <div class="wide-container">
      <h3 class="white-text center">CONÇU PAR DES PASSIONNÉS POUR DES PASSIONNÉS</h3>
      <h5 class="white-text center">
        Chez <b class="orange-text">OG Tech PC</b>, nous sommes une équipe de gamers et d’overclockeurs passionnés par les PC personnalisés et performants.
      </h5>
    </div>
  </div>

  <div class="grid" style="margin-top: 20px; margin-bottom: 100px">
    <div class="grid">
      <h1 class="count red-text text-darken-4 bold center">15</h1>
      <h5 class="white-text center">Années d'histoire</h5>
    </div>
    <div class="grid">
      <h1 class="count red-text text-darken-4 bold center">10000</h1>
      <h5 class="white-text center">PC assemblés</h5>
    </div>
    <div class="grid">
      <h1 class="count red-text text-darken-4 bold center">14</h1>
      <h5 class="white-text center">États couverts</h5>
    </div>
    <div class="grid">
      <h1 class="count red-text text-darken-4 bold center">100</h1>
      <h5 class="white-text center">% de satisfaction garantie</h5>
    </div>
  </div>

  <h3 class="white-text center">OG Tech PC - Configuration PC blanche</h3>
  <div onclick="this.nextElementSibling.style.display='block'; this.style.display='none'" style="margin-bottom: 100px">
    <img src="static/images/ice_pc.png" style="cursor:pointer; display:block; margin: 0 auto;" />
  </div>
  <div style="display:none">
    <video style="display:block; margin: 0 auto;" class="responsive-video" width="1280" height="720" autoplay="autoplay" controls muted>
      <source src="static/FROST Gaming PC.mp4" type="video/mp4">
    </video>
  </div>

  <h3 class="white-text center">NOTRE DIFFÉRENCE</h3>
  <h6 class="white-text center">Comparé aux autres services de montage PC</h6>

  <div class="grid" style="margin-bottom: 0px;">
    <div class="grid">
      <div class="rounded-card-parent">
        <div class="card rounded-card tint-glass-black" style="height: 300px; width: 250px;">
          <img src="static/images/values_images/P.svg" height="200px">
          <div class="row center">
            <h5 class="orange-text bold center" style="display: inline;">O</h5>
            <h5 class="white-text bold center" style="display: inline;">PIÈCES D’ORIGINE</h5>
          </div>
        </div>
      </div>
    </div>

    <div class="grid">
      <div class="rounded-card-parent">
        <div class="card rounded-card tint-glass-black" style="height: 300px; width: 250px;">
          <img src="static/images/values_images/T.svg" height="200px">
          <div class="row center">
            <h5 class="orange-text bold center" style="display: inline;">G</h5>
            <h5 class="white-text bold center" style="display: inline;">arantie & Retour</h5>
          </div>
        </div>
      </div>
    </div>

    <div class="grid">
      <div class="rounded-card-parent">
        <div class="card rounded-card tint-glass-black" style="height: 300px; width: 250px;">
          <img src="static/images/values_images/E.svg" height="200px">
          <div class="row center">
            <h5 class="orange-text bold center" style="display: inline;">S</h5>
            <h5 class="white-text bold center" style="display: inline;">upport Technique</h5>
          </div>
        </div>
      </div>
    </div>

    <div class="grid">
      <div class="rounded-card-parent">
        <div class="card rounded-card tint-glass-black" style="height: 300px; width: 250px;">
          <img src="static/images/values_images/Rebate.png" height="200px">
          <div class="row center">
            <h5 class="orange-text bold center" style="display: inline;">R</h5>
            <h5 class="white-text bold center" style="display: inline;">ÉDUCTIONS POUR MISE À NIVEAU</h5>
          </div>
        </div>
      </div>
    </div>

    <div class="grid">
      <div class="rounded-card-parent">
        <div class="card rounded-card tint-glass-black" style="height: 300px; width: 250px;">
          <img src="static/images/values_images/S.svg" height="200px">
          <div class="row center">
            <h5 class="orange-text bold center" style="display: inline;">V</h5>
            <h5 class="white-text bold center" style="display: inline;">érifié avant expédition</h5>
          </div>
        </div>
      </div>
    </div>

    <div class="grid">
      <div class="rounded-card-parent">
        <div class="card rounded-card tint-glass-black" style="height: 300px; width: 250px;">
          <img src="static/images/values_images/H.png" height="200px">
          <div class="row center">
            <h5 class="orange-text bold center" style="display: inline;">H</h5>
            <h5 class="white-text bold center" style="display: inline;">aute professionnalité</h5>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php require "footer.php"; ?>

  <!-- Nouveau widget WhatsApp Elfsight -->
  <script src="https://static.elfsight.com/platform/platform.js" async></script>
  <div class="elfsight-app-0af70dde-1855-4987-9508-af242a47e77d" data-elfsight-app-lazy></div> 

</body>

<script>
  $(document).ready(function(){
    // Carrousel auto-défilant
    $('.slider').slider({full_width: true});

    // Compteur animé
    $('.count').each(function () {
      $(this).prop('Counter', 0).animate({
        Counter: $(this).text()
      }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
          $(this).text(Math.ceil(now));
        }
      });
    });
  });
</script>
</html>
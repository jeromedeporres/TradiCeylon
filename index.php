<?php
session_start();
include 'parts/header.php';
include_once 'config.php';
include 'lang/FR_FR.php';
include 'controllers/indexCtrl.php';
?>
<div id="carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ol>
    <div class="carousel carousel-inner text-center">
      <div class="carousel-item active">
      <img src="../assets/img/carimg1.jpg" alt="carimg1">
        <div class="carousel-caption">
          <h1>Le SAVOIR-FAIRE</h1>
          <p>C’est à travers ses artisans que l’on découvre le mieux un pays, sa culture et ses traditions.</p>
        </div>   
      </div>
  <div class="carousel-item">
    <img src="../assets/img/carimg2.jpg" alt="carimg2">
    <div class="carousel-caption">
      <h1>100% EQUITABLE ET NATUREL</h1>
      <p>Il s’agit d’un échange à sa juste valeur entre producteurs locaux et acheteurs satisfaits tout en réduisant les inégalités sociales et environnementales dans ce pays</p>
    </div>   
  </div>
  <div class="carousel-item">
    <img src="../assets/img/carimg3.jpg" alt="carimg3">
    <div class="carousel-caption">
      <h1>L’AUTHENTICITE</h1>
      <p>Ici, c'est une vertu par laquelle un individu exprime avec sincérité et engagement ce qu'il est profondément et dont ce qu’il créer.</p>
    </div>   
  </div>
</div>
<a class="carousel-control-prev" href="#demo" data-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
  <span class="carousel-control-next-icon"></span>
</a>
</div>
<div class="jumbotron" id="marketing">
  <div class="container text-center">
    <div class="row">
      <div class="col-lg-4">
        <img src="../assets/img/mainpgimg1.png" alt="img">
          <h3>Poterie</h3>
          <p>La céramique et la porcelaine se sont développées depuis le passage des colons. La réalisation est particulièrement soignée : une fois formés et peints avec un mélange d’argile et de pigments, les objets sont polis avec des galets de rivière. La cuisson se fait entre 700° et 900°. Le brillant spécifique de ces céramiques est obtenu en passant le produit dans un four alimenté avec des feuilles de manguier.</p>
          <p><a class="btn btn-secondary" href="#" role="button">En savoir plus</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
          <img src="../assets/img/mainpgimg2.png" alt="img">
          <h3>Papier Bouse d’Eléphant</h3>
          <p>On savait déjà que la bouse d’éléphant était un antimoustique puissant. On sait aujourd’hui que c’est aussi un moyen insolite de fabriquer du papier… sans couper d’arbres. Sans ajout de chlore et teintés avec des pigments non chimiques, les papiers 100 % naturels fabriqués sur le site permettent d’aider les populations locales. Certes, les quantités de bouses récoltées et de papier fabriqué sont minimes, mais l’initiative sensibilise elle aussi au risque de la déforestation illégale et à la cause des éléphants.</p>
          <p><a class="btn btn-secondary" href="#" role="button">En savoir plus</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <img src="../assets/img/mainpgimg3.png" alt="img">
        <h3>Epices « fait maison »</h3>
        <p>Issus de l’agriculture biologique, les épices sri lankaises, réputées pour leur excellente qualité. Lorsqu’elles sont entières, les épices conservent tous leurs arômes. Une fois broyées, elles libèrent leur saveur et leur authenticité dans vos petits plats. Ces épices proviennent de près de 200 cultivateurs isolés avec une rémunération juste, les épices sont ensuite transformées et ensachées sur place par une soixantaine de femmes bénéficiant ainsi de réels avantages sociaux.</p>
        <p><a class="btn btn-secondary" href="#" role="button">En savoir plus</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
  </div>
</div>
  <hr class="featurette-divider">
<div class="jumbotron" id="marketing">
  <div class="container text-center">
    <div class="row featurette">
      <div class="col-md-7">
        <h3 class="featurette-heading">Le bois<span class="text-muted">It’ll blow your mind.</span></h3>
        <p class="lead">Le Sri Lanka possède un patrimoine forestier riche en essences diverses et de qualité.  L’ébène est très appréciée pour fabriquer des statuettes et des masques. La couleur caractéristique de ce bois en fait sa richesse. D’autres espèces comme le teck et le bambou permettent de créer un grand nombre d’objets décoratifs. Ici, les artisans locaux, ils tirent la quintessence des bois précieux sri-lankais grâce à leur savoir-faire traditionnel.</p>
      </div>
    <div class="col-md-5">
      <img class="img-fluid mx-auto" width="500" height="500" src="assets/img/mainpgimg4.jpg" >
    </div>
  </div>
</div>
  <hr class="featurette-divider">
<div class="jumbotron" id="marketing">
  <div class="container text-center">
    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h3 class="featurette-heading">Tissus batik<span class="text-muted">See for yourself.</span></h3>
        <p class="lead">Ce sont des pièces de tissu colorées, faites à la main et qui représentent généralement un objet, un animal ou une personne : mais surtout, ce sont des pièces qui nécessitent une grande patience et beaucoup de technique pour les réaliser ! Les batiks demandent un travail minutieux : juste avant de plonger le tissu dans un bain de teinture, l'artisan recouvre les parties du dessin qu'il souhaite préserver de la teinture en versant de la cire chaude dessus. </p>
      </div>
    <div class="col-md-5 order-md-1">
    <img class="img-fluid mx-auto" width="500" height="500" src="assets/img/mainpgimg5.jpg" >
    </div>
</div>
</div>
  <hr class="featurette-divider">
<div class="jumbotron" id="marketing">
  <div class="container text-center">
    <div class="row featurette">
      <div class="col-md-7">
        <h3 class="featurette-heading">Le Rotin<span class="text-muted">Checkmate.</span></h3>
        <p class="lead">Le rotin (ou rattan) est une fibre végétale sauvage entrant dans la classification des palmiers. Avant de pouvoir être tressé, le rotin nécessite différentes étapes de transformation essentielles, il s’agit encore d’une activité artisanale s’opérant dans de petits ateliers. Le rotin présente de nombreux avantages. L’entretien des meubles en rotin est très simple et ne peut être fait qu’annuellement. La souplesse qu’il offre aide au confort, notamment pour le cannage d’assises ou de dossiers.</p>
      </div>
    <div class="col-md-5 order-md-1">
      <img class="img-fluid mx-auto" width="500" height="500" src="assets/img/mainpgimg6.jpg" >
    </div>
  </div>
</div>
</div>
</div>
</div>
<div class="jumbotron">
    <div class="row">
      <div class="col-lg-2 col-md-12 mb-4">
        <div class="view overlay z-depth-1-half">
        <img src="assets/img/mainpgimg7.jpg" class="img-fluid" alt="">
            <div class="mask rgba-white-light"></div>
          </a>
        </div>
      </div>
      <div class="col-lg-2 col-md-6 mb-4">
        <div class="view overlay z-depth-1-half">
        <img src="assets/img/mainpgimg8.jpg" class="img-fluid" alt="">
            <div class="mask rgba-white-light"></div>
          </a>
        </div>
      </div>
      <div class="col-lg-2 col-md-6 mb-4">
        <div class="view overlay z-depth-1-half">
          <img src="assets/img/mainpgimg9.jpg" class="img-fluid" alt="">
            <div class="mask rgba-white-light"></div>
          </a>
        </div>
      </div>
      <div class="col-lg-2 col-md-12 mb-4">
        <div class="view overlay z-depth-1-half">
          <img src="assets/img/mainpgimg10.jpg" class="img-fluid" alt="">
            <div class="mask rgba-white-light"></div>
          </a>
        </div>
      </div>
      <div class="col-lg-2 col-md-6 mb-4">
        <div class="view overlay z-depth-1-half">
          <img src="assets/img/mainpgimg11.jpg" class="img-fluid" alt="">
            <div class="mask rgba-white-light"></div>
          </a>
        </div>
      </div>
      <div class="col-lg-2 col-md-6 mb-4">
        <div class="view overlay z-depth-1-half">
        <img src="assets/img/mainpgimg12.jpg" class="img-fluid" alt="">
            <div class="mask rgba-white-light"></div>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php include 'parts/footer.php'?>
<!--</div>
<footer class="footer">
          <div class="container-fluid">
            <div class="row">
               <div class="col-6 col-md-">
                  <h1>Qui Sommes Nous</h1>
                  <p class="text-center"> 
                   <strong> JHKMcréations  </strong>est né en 2020 avec la passion de confectionner des t-shirts pour hommes, femmes, enfants et couples. Notre horizon s'étend à la création de publicités de diverses entreprises via nos t-shirts. Nous recherchons la qualité optimale à un prix raisonnable. Des t-shirts avec des slogans diffusent des messages d'harmonie sociale et motivent les gens à leurs différents niveaux. Soyons les facteurs de changement.
                         <a href="portfolio.php" class="btn btn-danger btn-sm">En savoir plus</a>
                        </p>
               </div>
               <div class="col-6 col-md-3">
                  <h2>Quick Links</h2>
                  <ul class="footer-links">
                     <li><a href="nosservices.php">Nos Services</a></li>
                     <li><a href="nosrealisations.php">Nos Realisations</a></li>
                     <li><a href="cgv.php">Conditions générales de vente</a></li>
                     <li><a href="données.php">Données personnelles</a></li>
                     <li><a href="nouscontacter.php">Nous écrire</a></li>
                  </ul>
               </div>
               <div class="col-6 col-md-3">
                  <h2>Nous Trouver</h2>
                  <ul class="footer-links">
                     <li> <a href="mailto:info@jhkm.com"> <i class="fa fa-envelope"></i> info@jhkm.com</a></li>
                     <li> <a href="tel:+33344252525"><i class="fa fa-phone"></i> 03 44 25 25 25</a></li>
                     <li> <a href="https://www.google.fr/maps/place/1+Rue+de+Paris,+60200+Compi%C3%A8gne/@49.4156636,2.8204603,17z/data=!4m13!1m7!3m6!1s0x47e7d683dc0ef1a7:0x7adf6dd09c347f2f!2s1+Rue+de+Paris,+60200+Compi%C3%A8gne!3b1!8m2!3d49.4156636!4d2.822649!3m4!1s0x47e7d683dc0ef1a7:0x7adf6dd09c347f2f!8m2!3d49.4156636!4d2.822649"><i class="fa fa-map-marker"></i> 01 Rue de Paris, 60200 Compiégne</a></li>
                  </ul>
               </div>
            </div>
         </div>-->
         <!-- Footer -->

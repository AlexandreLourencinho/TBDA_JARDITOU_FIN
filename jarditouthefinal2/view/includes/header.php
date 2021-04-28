<?php
//include_once 'session.php';
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php $_SERVER['DOCUMENT_ROOT']?>/alourencin/jarditouthefinal/assets/css/style.css">
        <title><?php echo $titre;  ?></title>
        <!-- <link rel="stylesheet" href="../bootstrap/style.css"> -->
  </head>
<body>
                                                    <!-- div pincipale container fluide/flex -->
                                                    <div class="container-fluid">
                                                        <!-- header avec logo et tout le jardin  -->
              <header class="row justify-content-between">
                  <div class="col-12 col-md-8 col-lg-6">
                      <a href="<?php $_SERVER['DOCUMENT_ROOT']?>/alourencin/jarditouthefinal/index.php">
                          <img src="<?php $_SERVER['DOCUMENT_ROOT']?>/alourencin/jarditouthefinal/assets/IMG/jarditou_logo.jpg" class="img-fluid w-50" alt="Logo jarditou" title="Logo jarditou" id="logo">
                      </a>
                  </div>
                  <div class="d-flex justify-content-end align-items-end col-12 col-sm-6 col-md-4 col-lg-6" id="toutjardin">
                  <p class="d-none d-md-block mb-0 mr-lg-5"><?php // affiche la date du jour : var date1= date format de base y-m-d, setlocale fr et langue français, strftime->
                      //Formate une date/heure locale avec la configuration locale, strtotime passe de string a format date
                      $date1 = date('Y-m-d'); setlocale(LC_TIME, "fr_FR","French"); $date = strftime("%d %B %Y", strtotime($date1)); echo $date."  ";?>
                      </p>
                      <p class="d-none mr-2 d-sm-block h3 font-weight-bold mb-0">La qualité depuis 70 ans</p>
                  </div>
              </header>
                                                      <!-- navbar qui se collapse en menu burger -->
              <nav id="nav" class="navbar shadow navbar-expand-lg navbar-light bg-light">
                  <a class="navbar-brand" href="<?php $_SERVER['DOCUMENT_ROOT']?>/alourencin/jarditouthefinal/index.php">Jarditou : le site officiel</a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                      </button>
                  <div class="collapse navbar-collapse" id="navbar1">
                      <ul class="navbar-nav mr-auto">
                          <li class="nav-item active">
                          <a class="nav-link" href="<?php $_SERVER['DOCUMENT_ROOT']?>/alourencin/jarditouthefinal/index.php">Accueil</a>
                          </li>
                          <li class="nav-item active">
                          <a class="nav-link" href="<?php $_SERVER['DOCUMENT_ROOT']?>/alourencin/jarditouthefinal/view/tableau_produits.php">voir nos produits</a>
                          </li>
                          <li class="nav-item active">
                          <a class="nav-link" href="<?php $_SERVER['DOCUMENT_ROOT']?>/alourencin/jarditouthefinal/controller/produits/ajouter_produit.php">Ajoutez un produit</a>
                          </li>
                          <li class="nav-item active">
                          <a class="nav-link" href="<?php $_SERVER['DOCUMENT_ROOT']?>/alourencin/jarditouthefinal/view/formulaire_contact.php" tabindex="-1">contactez nous!</a>
                          </li>
                      </ul>
                      <ul class="navbar-nav ml-auto">
                      <?php if(!isset($_SESSION['user_id'])){ ?>
                          <li class="nav-item active">
                          <a class="nav-item nav-link" href="<?php $_SERVER['DOCUMENT_ROOT']?>/alourencin/jarditouthefinal/controller/login/se_connecter.php">Se connecter</a>
                          </li>
                          <li class="nav-item active">
                          <a class="nav-item nav-link" href="<?php $_SERVER['DOCUMENT_ROOT']?>/alourencin/jarditouthefinal/controller/login/s_inscrire.php">S'inscrire</a>
                          </li>
                          <?php } else {?>
                            <div class="navbar-nav active">
                            <a class="nav-link" href="<?php $_SERVER['DOCUMENT_ROOT']?>/alourencin/jarditouthefinal/model/login/session_destroy.php">Se déconnecter</a>
                            <a class="nav-item nav-link" href="#">Bonjour <?php echo $_SESSION['pseudo'];?>!</a>
                            </div>
                          <?php } ?>
                      </ul>
                  <form class="form-inline my-2 my-lg-0">
                      <input class="form-control mr-sm-2" type="search" placeholder="Votre promotion" aria-label="Search">
                          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button>
                  </form>
                  </div>
              </nav>
                                                                               <!-- logo promotion jarditou lames de terrasse  -->
                                                                               <div class="p-0 col-12">
                    <img src="<?php $_SERVER['DOCUMENT_ROOT']?>/alourencin/jarditouthefinal/assets/IMG/promotion.jpg" class="w-100 img-fluid mb-2 shadow-lg" title="depensez votre argent chez nous PUTAIN" alt="Image de promotion de lames de terasses" id="promo">
              </div>
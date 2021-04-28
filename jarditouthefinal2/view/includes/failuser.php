<?php 
// titre
$titre="erreur création compte";
// appelle bdd e crud user
require "../../model/bdd/conn_db.php";
require_once "../../model/CRUD/crud_user.php";
$crud_user = new user($pdo);
include_once "header.php"; ?>
<div class="container-fluid shadow-lg">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <!-- <div class="justify-content-center"> -->
            <h1 class="text-danger">Un autre utilisateur porte déjà ce nom!</h1><br>
            <h2 class="text-danger">Veuillez en choisir un autre pour pouvoir vous créer un compte</h2><br>
            <a href="../../controller/login/s_inscrire.php" class="btn btn-primary">Cliquez ici pour tenter à nouveau</a>
            <a href="../../index.php" class="btn btn-secondary">Cliquez ici pour retourner à la page d'accueil</a> <br>
            <a href="../tableau_produits.php" class="btn btn-info">Appuyez ici pour voir nos produits!</a>
        <!-- </div> -->
    </div>
</div>



<?php include_once "footer.php"; ?>
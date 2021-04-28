<?php 
$titre ="création de compte réussie!";
require "../../model/bdd/conn_db.php";
require_once '../../model/CRUD/crud_user.php';
$crud_user = new user($pdo);
include "header.php" ?>


<div class="d-flex flex-column justify-content-center align-items-center">
    <h1 class="text-success"> Votre compte a bien été créé!</h1>
    <a href="../../controller/login/se_connecter.php" class="btn btn-info"> Appuyez ici pour vous connecter!</a>
</div>

<?php include "footer.php" ?>
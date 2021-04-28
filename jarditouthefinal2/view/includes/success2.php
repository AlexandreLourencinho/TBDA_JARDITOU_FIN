<?php 
$titre ="création de compte réussie!";
require ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/model/bdd/conn_db.php");
require_once ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/model/crud/crud_user.php");
$crud_user = new user($pdo);
include ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/view/includes/header.php"); ?>


<div class="d-flex flex-column justify-content-center align-items-center">
    <h1 class="text-success"> Votre compte a bien été créé!</h1>
    <a href="<?php $_SERVER['DOCUMENT_ROOT']?>/alourencin/jarditouthefinal/controller/login/se_connecter.php" class="btn btn-info"> Appuyez ici pour vous connecter!</a>
</div>

<?php include ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/view/includes/footer.php"); ?>
<?php 
//titre, appelle bdd et crud
$titre = "Ajouté!";
require ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/model/bdd/conn_db.php");
require_once ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/model/crud/crud_user.php");
$crud_user = new user($pdo);
include ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/view/includes/header.php");

?>
<?php echo "Insertion réussie!";?>
<a href="<?php $_SERVER['DOCUMENT_ROOT']?>/alourencin/jarditouthefinal/view/tableau_produits.php" class="btn btn-primary"> retour liste des produits</a>


<?php include ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/view/includes/footer.php"); ?>

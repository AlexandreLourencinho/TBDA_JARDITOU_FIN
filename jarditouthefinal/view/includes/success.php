<?php 
//titre, appelle bdd et crud
$titre = "Ajouté!";
require_once "../../model/bdd/conn_db.php";
require_once '../CRUD/crud_user.php';
$crud_user = new user($pdo);
include_once "../includes/header.php";

?>
<?php echo "Insertion réussie!";?>
<a href="../tableau_produit.php" class="btn btn-primary"> retour liste des produits</a>


<? include "../includes/footer.php"; ?>

<?php 
include_once ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/view/includes/session.php");
// titre page
$titre="nos produits!";
// appel bdd et header
require ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/model/bdd/conn_db.php");
require_once ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/model/crud/crud.php");
//require_once "utilisateurs.php";
$crud = new crud($pdo);
require_once ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/model/crud/crud_user.php");
$crud_user = new user($pdo);
// appelle la fonction qui liste les stations
$resultats = $crud->getProduits(); 
include ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/view/includes/header.php");?>
<!-- tableau contenant les produits -->
<div id="pricing" class="container">
<table class="table text-center w-auto shadow-lg table-hover table-responsive table-bordered">
    <!--  tête de tableau -->
        <thead>
        <tr>
            <th id="photo">Photo</th>
            <th scope="col">ID</th>
            <th scope="col">Libellé</th>
            <th scope="col">Prix</th>
            <th scope="col">Stocks</th>
            <th scope="col">couleur</th>
            <th scope="col">Date d'ajout</th>
            <th scope="col">Dernière modification</th>
            <th scope="col">Blocage</th>
        </tr>
        </thead>
        <!-- boucle qui crée le tableau tant qu'il y a des données a afficher -->
        <?php while($r = $resultats->fetch(PDO::FETCH_ASSOC))
        // ouverture de l'accolade et fermeture dans l'autre balise php :
        // permet que rien ne s'affiche si erreur
              { ?>
              <!--  début du tableau généré dynamiquement -->
              <!-- via noms de variables php -->
              <tbody>
        <tr>
            <th id="photo2" class="bg-warning"><img width='150' src="../assets/IMG/<?php echo $r['pro_id'].".".$r['pro_photo'] ?>" class="img-thumbnail rounded-circle"></th>
            <td><?php echo $r['pro_id'] ?></td>
            <td class="bg-warning"><a href="../view/details.php?id=<?php echo $r['pro_id']; ?>" class="text-danger"><u><b><?php echo strtoupper($r['pro_libelle']); ?></b></u></td>
            <td><?php echo $r['pro_prix'] ?></td>
            <td><?php echo $r['pro_stock'] ?></td>
            <td><?php echo $r['pro_couleur'] ?></td>
            <td><?php echo $r['pro_d_ajout'] ?></td>
            <td><?php echo $r['pro_d_modif'] ?></td>
            <td><?php echo $r['pro_bloque'] ?></td>
        </tr>
        </tbody>
        <!-- fermeture de l'accolade citée plus haut -->
        <?php } ?>
    </table>
    </div>
<!-- footer -->
<?php include ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/view/includes/footer.php"); ?>
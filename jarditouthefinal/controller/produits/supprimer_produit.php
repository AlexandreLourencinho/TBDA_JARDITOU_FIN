<?php
//appelle la session et l'auth check qui vérifie
include_once '../../view/includes/session.php';
require "../../view/includes/auth_check.php";
// définit le titre par défaut comme étant erreur
$titre="erreur";    
// appel bdd et crud
require_once "../../model/bdd/conn_db.php"; 
require_once "../../model/CRUD/crud.php";
$crud = new crud($pdo);
//appelle le crud user
require_once '../../model/CRUD/crud_user.php';
$crud_user = new user($pdo);
// si l'id  n'est pas récupéré 
        if(!isset($_GET['id']))
        {
                // message d'erreur
                echo "<h1 class='text-danger'>Une erreur est survenue : essayez a nouveau</h1>";
               
        }
        else 
        {
            // si l'id est récupéré
                // assigne l'id a $id
                $id = $_GET['id'];
                // appelle la fonction getdetails qui récupère les données d'une station
                $r = $crud->read($id);
                // titre page
                $titre = $r['pro_libelle'];
                include "../../view/includes/header.php";
?>
<!-- même principe que pour la modification : les infos sont rentrés de base dans les champs en les récupérant avec l'id -->
<section id="cover">
    <div id="cover-caption">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                    <div class="card col-12 shadow-lg">
                    <img src="../../assets/IMG/<?php echo $r['pro_id'].'.'.$r['pro_photo']; ?>" alt="">
                    <div class='card-title'>
                    <h1 class="text-info"><?php echo $r['pro_libelle']; ?></h1>
                    </div>
                        <form>
                            <div class="form-group">
                                <label for="ref">Référence :</label>
                                    <input type="text" id="ref" class="form-control" readonly value="<?php echo $r['pro_ref'];?>">
                                <label for="cat">Catégorie :</label>
                                    <input type="text" class="form-control" readonly value="<?php echo $r['cat_nom'];?>">
                                <label for="ref">Libellé :</label>
                                    <input type="text" class="form-control" readonly value="<?php echo $r['pro_libelle'];?>">
                                <label for="ref">Description :</label>
                                    <textarea id='txtarea' type="text" class="form-control"
                                    readonly><?php echo $r['pro_description'];?></textarea>
                                <label for="ref">Prix :</label>
                                    <input type="text" class="form-control" readonly value="<?php 
                                echo $r['pro_prix'];?>">
                                <label for="ref">Stock :</label>
                                    <input type="text" class="form-control" readonly value="<?php 
                                echo $r['pro_stock'];?>">
                                <label for="ref">Couleur :</label>
                                    <input type="text" class="form-control" readonly value="<?php 
                                echo $r['pro_couleur'];?>">
                                <label for="ref">Produit bloqué? :</label> <br>
                                <input disabled type="radio" class="mr-1" name="rad" <?php if($r['pro_bloque']==1) 
                                {echo "checked";} else {echo 'value="false"';}?>>oui
                                <input disabled type="radio" class="ml-1 mr-1" name="rad" <?php if($r['pro_bloque']==0 && $r['pro_bloque']!=NULL)
                                {echo "checked";}?> value="non">non <br>
                                <label for="ref">Date d'ajout : </label>
                                    <input type="text" class="form-control" readonly value="<?php 
                                echo $r['pro_d_ajout'];?>">
                                <label for="ref">Date de modification :</label>
                                    <input type="text" class="form-control" readonly value="<?php 
                                echo $r['pro_d_modif'];?>">
                                <br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        <div class="d-flex flex-column shadow-lg justify-content-center align-items-center bg-secondary">
            <h1 class="text-danger">&#9940; <b>Êtes vous sûr de vouloir supprimer <?php echo $r['pro_libelle']; ?> de la base de donnée?&#9940;</b></h1>
<h2 class="text-warning"><u>La suppression est irreversible.</u></h2>
<a href="../../view/tableau_produits.php" class='btn btn-primary mb-2'>retour à la liste des produits</a>
<br>
<a href="../../model/produits/supprimer_produit_script.php?id=<?php echo $r['pro_id']; ?>" class='btn btn-danger'
onclick="confirm('Êtes vous certain de vouloir supprimer <?php echo $r['pro_libelle'];?> de la liste des produits?')"> Confirmer la supression</a>
    </div>
</section>











<?php } ?>
<?php include "../../view/includes/footer.php"; ?>

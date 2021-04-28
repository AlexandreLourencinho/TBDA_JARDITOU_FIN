<?php   
include_once ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/view/includes/session.php");
$titre="erreur";    
// appel bdd
require ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/model/bdd/conn_db.php");
require_once ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/model/crud/crud_user.php");
require_once ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/model/crud/crud.php");
//require_once "utilisateurs.php";
$crud = new crud($pdo);
$crud_user = new user($pdo);
        if(!isset($_GET['id']))
        {
                // message d'erreur
                echo "<h1 class='text-danger'>Une erreur est survenue : essayez a nouveau</h1>";
               
        }
        else 
        {
                // assigne l'id a $id
                $id = $_GET['id'];
                // appelle la fonction getdetails qui récupère les données d'une station
                $r = $crud->read($id);
                // titre page
                $titre = $r['pro_libelle'];
                include ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/view/includes/header.php");
        
        ?>


<section id="cover">
    <div id="cover-caption">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-10 col-md-8 col-sm-10 mx-auto text-center form p-4">
                    <div class="card col-12 shadow-lg justify-content-center">
                    <img src="<?php $_SERVER['DOCUMENT_ROOT']?>/alourencin/jarditouthefinal/assets/IMG/<?php echo $r['pro_id'].'.'.$r['pro_photo']; ?>" width="400" alt="" class="mx-auto">
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
                                <a href="<?php $_SERVER['DOCUMENT_ROOT']?>/alourencin/jarditouthefinal/view/tableau_produits.php" class="btn btn-primary mb-3">Retour a la liste des produits</a>
                                <a href="<?php $_SERVER['DOCUMENT_ROOT']?>/alourencin/jarditouthefinal/controller/produits/modifier_produit.php?id=<?php echo $r['pro_id']?>" type="button" class="btn btn-warning mb-3">Modifier</a>
                                <a href="<?php $_SERVER['DOCUMENT_ROOT']?>/alourencin/jarditouthefinal/controller/produits/supprimer_produit.php?id=<?php echo $r['pro_id']?>" type="button" class="btn btn-danger mb-3" 
                                onclick="confirm('Êtes vous sûrs de vouloir supprimer ce produit?')">Supprimer</a>
                            </div>
                        </form>
<!-- bouton pour retourner a la liste des stations -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>





<!-- footer -->
<?php include ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/view/includes/footer.php"); ?>
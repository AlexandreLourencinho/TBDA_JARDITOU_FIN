<?php
// appelle la session et le aut_check pour gérer les droits d'accès à cette page
include_once ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/view/includes/session.php");
require ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/view/includes/auth_check.php");
// titre de la page par défaut si le détail du produit n'a pas été chargé
$titre="erreur";
// appel bdd et header
require ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/model/bdd/conn_db.php");
require_once ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/model/crud/crud.php");
//appelle le crud user et le crud (juste au dessus) afin de gérer les fonctions et les comptes utilisateurs
$crud = new crud($pdo); 
require_once ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/model/crud/crud_user.php");
$crud_user = new user($pdo);
// si l'id du produit n'est pas récupéré
        if(!isset($_GET['id']))
        {
                // message d'erreur
                echo "<h1 class='text-danger'>Une erreur est survenue : essayez a nouveau</h1>";
               
        }
        else 
        {
            //si l'id est récupéré
                // assigne l'id a $id
                $id = $_GET['id'];
                // appelle la fonction getdetails qui récupère les données d'une station
                $r = $crud->read($id);
                $requete = "SELECT * FROM produits WHERE pro_id=".$id; // Requête SQL pour sélectionner les produits en fonction de leur ID
                $requete2 = "SELECT * FROM categories ORDER BY cat_id"; // Requête SQL pour sélectionner les catégories 
                $result = $pdo->query($requete); // Exécute la requête SQL et retourne un jeu de résultat
                $result2 = $pdo->query($requete2);
                
                // Renvoi de l'enregistrement sous forme d'un objet
                $produit = $result->fetch(PDO::FETCH_OBJ);
                $categories = $result2->fetchAll(PDO::FETCH_OBJ);
                
                // titre page si pas erreur
                $titre = "Edition de : ".$r['pro_libelle'];
                include ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/view/includes/header.php");
        
        ?>
<!-- les noms , catégories, prix etc sont récupérés de la bdd d'après l'id et  -->
<section id="cover">
    <div id="cover-caption">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-lg-10 col-md-8 col-sm-10 mx-auto text-center form p-4">
                    <div class="card col-12 shadow-lg">
                    <img src="../../assets/IMG/<?php echo $r['pro_id'].'.'.$r['pro_photo']; ?>" class="mx-auto" alt="">
                        <form method="POST" action="<?php $_SERVER['DOCUMENT_ROOT']?>/alourencin/jarditouthefinal/model/produits/modifier_produit_script.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="ref">Référence :</label>
                                    <input type="text" id="ref" class="form-control" name="pro_ref" value="<?php echo $r['pro_ref'];?>">


                                <label for="cat">Catégorie :</label>
                                <select class="custom-select" name="pro_cat_id" id="pro_cat_id">
                                        <?php foreach($categories as $c) // Pour afficher la liste des catégories sous forme d'un menu déroulant
                                        {?>
                                    <option value = "<?= $c->cat_id?>"<?php 
                                            if ($c->cat_id == $produit->pro_cat_id) // Si il y a correspondance on sélectionne la catégorie indiquée
                                            {
                                                echo "selected";
                                            }
                                            ?>> <?=$c->cat_id."-".$c->cat_nom?></option>
                                            <?php } ?>                                        
                                </select>


                                <label for="ref">Libellé :</label>
                                    <input type="text" class="form-control" name="pro_libelle" value="<?php echo $r['pro_libelle'];?>">


                                <label for="ref">Description :</label>
                                    <textarea id='txtarea' name="pro_description" type="text" class="form-control"
                                    ><?php echo $r['pro_description'];?></textarea>


                                <label for="ref">Prix :</label>
                                    <input type="text" class="form-control" name="pro_prix" value="<?php 
                                echo $r['pro_prix'];?>">


                                <label for="ref">Stock :</label>
                                    <input type="text" class="form-control" name="pro_stock" value="<?php 
                                echo $r['pro_stock'];?>">


                                <label for="ref">Couleur :</label>
                                    <input type="text" class="form-control" name="pro_couleur" value="<?php 
                                echo $r['pro_couleur'];?>">


                                <label for="ref">Produit bloqué? :</label> <br>
                                <input type="radio" class="mr-1" name="pro_bloque" <?php if($r['pro_bloque']==1) 
                                {echo "checked";}?> value="1">oui
                                <input type="radio" class="ml-1 mr-1" name="pro_bloque" <?php if($r['pro_bloque']==0 && $r['pro_bloque']!=NULL)
                                {echo "checked";}?> value="0">non <br>


                                <label for="ref">Date d'ajout : </label>
                                    <input type="text" class="form-control" name="pro_d_ajout" readonly value="<?php 
                                echo $r['pro_d_ajout'];?>">
                                <br>

                                <input type="hidden" name="pro_id" value="<?= $r['pro_id']; ?>">

                                <label for="illu">choisissez une photo d'illustration</label>
                                <input type="file" accept="image/*" class="btn btn-primary" id="illu" name="illu">     
                                <br>                          
                                
                                <button name="submit" value="submit" type="submit" class="btn btn-info mt-3">Sauver les modifications</button>
                                <br><br>
                                <a href="<?php $_SERVER['DOCUMENT_ROOT']?>/alourencin/jarditouthefinal/view/tableau_produits.php" class="btn btn-primary mb-1">Retour a la liste des produits</a>                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>







<!-- footer -->
<?php include ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/view/includes/footer.php"); ?>
<?php
// crée une classe crud pour rassembler les fonctions utilisée, appelée ensuite
// avec le $crud
class crud
{
        // objet base de donnée privée
        private $db;
        // constructor pour ini une variable privée pour la co a la bdd
        function __construct($conn)
        {
                $this->db = $conn;
        }
        // fonction pour rentrer un truc dans la base jarditou - public , utilisée par tout le monde
        public function create($pro_id, $pro_cat_id, $pro_ref, $pro_libelle, $pro_description, 
        $pro_prix, $pro_stock, $pro_couleur, $pro_photo, $pro_d_ajout, $pro_d_modif, $pro_bloque)
        {
            try 
            {
                    require "../../model/bdd/conn_db.php";
                    // requete SQL pour update
                    if($pro_photo != null)
                    {
                        //requete si présence de photo
                        $stmt = $pdo->prepare("INSERT INTO produits (pro_id, pro_cat_id, pro_ref, pro_libelle, pro_description, pro_prix, pro_stock, pro_couleur, 
                    pro_photo, pro_d_ajout, pro_bloque) VALUES (:pro_id, :pro_cat_id, :pro_ref, :pro_libelle, :pro_description, :pro_prix, :pro_stock, 
                    :pro_couleur, :pro_photo, :pro_d_ajout, :pro_bloque)");
                    }
                    else
                    {
                        // requete sans la photo - finalement inutilisée
                        $stmt = $pdo->prepare("INSERT INTO produits (pro_id, pro_cat_id, pro_ref, pro_libelle, pro_description, pro_prix, pro_stock, pro_couleur,
                    pro_d_ajout, pro_bloque) VALUES (:pro_id, :pro_cat_id, :pro_ref, :pro_libelle, :pro_description, :pro_prix, :pro_stock, 
                   :pro_couleur, :pro_d_ajout, :pro_bloque)");
                    }
                    // lie les paramètres placeholders de la requete sql
                    // aux variables correspondantes
                    $stmt->bindparam(":pro_id", $pro_id);
                    $stmt->bindparam(":pro_cat_id", $pro_cat_id);
                    $stmt->bindparam(":pro_ref", $pro_ref);
                    $stmt->bindparam(":pro_libelle", $pro_libelle);
                    $stmt->bindparam(":pro_description", $pro_description);                                    
                    $stmt->bindparam(":pro_prix", $pro_prix);
                    $stmt->bindparam(":pro_stock", $pro_stock);
                    $stmt->bindparam(":pro_couleur", $pro_couleur);
                    $stmt->bindparam(":pro_d_ajout", $pro_d_ajout);     
                    if($pro_photo != null)
                    {
                        $stmt->bindparam(":pro_photo", $pro_photo);
                    }
                    else
                    {

                    }
                    // définit le pro bloqué en fonction de si un des bouton radio a été coché, ou aucun
                    if(isset($_POST['pro_bloque']))
                    {
                        if ($_POST['pro_bloque']=="0") 
                        {
                            $pro_bloque = 0;
                        } 
                        else if  ($_POST['pro_bloque']=="1") 
                        { 
                            // Si le produit est bloqué alors cela affiche 1 dans le tableau phpMyAdmin
                            $pro_bloque = 1;
                        }
                    }
                    else
                    {
                        $pro_bloque=NULL;
                    }
                    
                    $stmt->bindparam(':pro_bloque', $pro_bloque);
                    // si image choisie 
                    if(isset($_POST['pro_photo']))
                    {
                        // récupération extension fichier
                        $pro_photo = substr (strrchr ($_FILES['pro_photo']['name'], "."), 1);
                        $stmt->bindparam(":pro_photo", $pro_photo);
                    }
                    else
                    {
                        $pro_photo=NULL;                                        
                    }
                    // executer la commande sql
               
                    if($stmt->execute())
                    {
                        // récupère le dernier ID inséré dans la BDD
                        $id = ($pdo->lastInsertId());
                        // le transforme de string en INT
                        $new_id = (int)$id;// En lien avec l'insertion d'image et le renommage du fichier qui sera l'ID
                        $message = "Insertion réussie";
                        // retourne un tableau avec l'id et la  valeur true
                        return array('result' => true, 'pro_id' => $new_id);
                    }
                    else
                    {
                        $message = "Echec de l'insertion";
                    }
            }
            // si erreur
            catch (Exception $e) 
            {
                    // pareil qu'au dessus : $e obtient le message d'erreur et l'echo 
                    // + retour requête pas ok
                    echo $e->getMessage();
                    return false;
            }
        }





                // fonction -publique ici aussi - pour éditer un produit
public function update($pro_id, $pro_cat_id, $pro_ref, $pro_libelle, $pro_description, 
$pro_prix, $pro_stock, $pro_couleur, $pro_photo, $pro_d_ajout, $pro_d_modif, $pro_bloque)
{
        try {
                    // requete SQL pour update -- pareil qu'avec le create : si photo ou pas photo
                    if($pro_photo != null)
                    {
                    $sql = "UPDATE produits SET pro_id=:pro_id, pro_cat_id=:pro_cat_id, pro_ref=:pro_ref, 
                    pro_libelle=:pro_libelle, pro_description=:pro_description, pro_prix=:pro_prix, 
                    pro_stock=:pro_stock,pro_couleur=:pro_couleur, pro_photo = :pro_photo, pro_d_ajout=:pro_d_ajout,
                    pro_d_modif=:pro_d_modif, pro_bloque=:pro_bloque WHERE pro_id=:pro_id";
                    }
                    else
                    {
                        $sql = "UPDATE produits SET pro_id=:pro_id, pro_cat_id=:pro_cat_id, pro_ref=:pro_ref, 
                    pro_libelle=:pro_libelle, pro_description=:pro_description, pro_prix=:pro_prix, 
                    pro_stock=:pro_stock,pro_couleur=:pro_couleur, pro_d_ajout=:pro_d_ajout,
                    pro_d_modif=:pro_d_modif, pro_bloque=:pro_bloque WHERE pro_id=:pro_id";
                    }
                    // prépare l'execution du script sql en remplaçant les placeholders
                    $stmt = $this->db->prepare($sql);
                    // lie les paramètres placeholders de la requete sql
                    // aux variables correspondantes
                    $stmt->bindparam(":pro_id", $pro_id);
                    $stmt->bindparam(":pro_cat_id", $pro_cat_id);
                    $stmt->bindparam(":pro_ref", $pro_ref);
                    $stmt->bindparam(":pro_libelle", $pro_libelle);
                    $stmt->bindparam(":pro_description", $pro_description);                                    
                    $stmt->bindparam(":pro_prix", $pro_prix);
                    $stmt->bindparam(":pro_stock", $pro_stock);
                    $stmt->bindparam(":pro_couleur", $pro_couleur);
                    $stmt->bindparam(":pro_d_ajout", $pro_d_ajout);
                    $stmt->bindparam(":pro_d_modif", $pro_d_modif);
                    // définit le pro_photo
                    if($pro_photo != null)
                    {
                        $stmt->bindparam(":pro_photo", $pro_photo);
                    }
                    else
                    {

                    }
                    // définit le pro bloque
                    if(isset($_POST['pro_bloque']))
                    {
                        if ($_POST['pro_bloque']==0) 
                        {
                            $pro_bloque = 0;
                        } 
                        else if  ($_POST['pro_bloque']==1) 
                        { 
                            // Si le produit est bloqué alors cela affiche 1 dans le tableau phpMyAdmin
                            $pro_bloque = 1;
                        }
                    }
                    else
                    {
                        $pro_bloque=NULL;
                    }
                $stmt->bindparam(':pro_bloque', $pro_bloque);
                    // si image choisie 
                if(isset($_POST['illu']))
                    {
                        // récupération extension fichier
                        $pro_photo = substr (strrchr ($_FILES['illu']['name'], "."), 1);
                        $stmt->bindparam(":pro_photo", $pro_photo);
                    }
                else
                    {
                        $pro_photo=NULL;                                        
                    }
                    // executer la commande sql
                    $stmt->execute();
                if($stmt)
                    {
                        //$message = "Le produit a été rajouté dans la base de données";
                        // $id = ; // En lien avec l'insertion d'image et le renommage du fichier qui sera l'ID
                        $message = "Insertion réussie";
                        //return true;    
                        return array('result' => true, 'pro_id' => $pro_id);
                    }
                else
                    {
                        $message = "Echec de l'insertion";
                    }
            }
        // si erreur
        catch (Exception $e) 
        {
                // pareil qu'au dessus : $e obtient le message d'erreur et l'echo 
                // + retour requête pas ok
                echo $e->getMessage();
                return false;
        }
}
                






                // fonction publique pour voir les détails d'un produit
        public function read($id)
        {
                // preparation de la requête sql + identification table
                $sql = "SELECT * FROM produits, categories WHERE pro_id = :id and pro_cat_id = cat_id";
                // appel de la fonction de préparation de la requete sql
                $stmt = $this->db->prepare($sql);
                // retourner le placeholder :id dans le $id
                $stmt->bindparam(':id', $id);
                // executer la requete sql
                $resultat = $stmt->execute();
                // match avec la dtb
                $resultat = $stmt->fetch();
                // retourner le resultat de la requete
                return $resultat;
        }



        // fonction qui appelle l'affichage de toutes les infos de toutes les stations
        public function readd()
        {
                $sql = "SELECT * FROM produits, categories where pro_cat_id = cat_id group by cat_id";
                // pas bien sur de comment le $this et le -> marche. ou même pourquoi 
                // le db marche sans le $ 
                // et quid du query ici ?-- se renseigner
                $resultat = $this->db->query($sql);
                // retourne le resultat définit juste au dessus
                return $resultat;
        }


        
        // fonction qui appelle l'affichage de toutes les infos de toutes les stations
        public function getProduits()        
        {
                $sql = "SELECT * FROM produits, categories where pro_cat_id = cat_id";
                // pas bien sur de comment le $this et le -> marche. ou même pourquoi 
                // le db marche sans le $ 
                // et quid du query ici ?-- se renseigner
                $resultat = $this->db->query($sql);
                // retourne le resultat définit juste au dessus
                return $resultat;
        }



        // supprimer un produit
        public function delete($id)
        {
                try {
                
                $sql = "DELETE FROM produits where pro_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id', $id);
                $stmt->execute();
                return true; 


                }
                catch (Exception $e) 
                {
                        // pareil qu'au dessus : $e obtient le message d'erreur et l'echo 
                        // + retour requête pas ok
                        echo $e->getMessage();
                        return false;
                }

        }


        
}
?>
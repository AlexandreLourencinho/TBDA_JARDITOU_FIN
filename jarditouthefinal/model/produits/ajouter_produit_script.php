<?php 
// pas besoin d'un titre...
$titre = "ajoutpost" ;
// appelle la BDD et le crud et le crud user
require_once "../../model/bdd/conn_db.php";
require_once "../../model/CRUD/crud.php";
$crud = new crud($pdo); 
require_once '../CRUD/crud_user.php';
$crud_user = new user($pdo);
    // si récupère l'id
    if(isset($_POST['submit']))
        {
            date_default_timezone_set('Europe/Paris'); // Toujours le datetime avant la variable $date
            // extrait les valeurs incluses dans post
            $pro_id = NULL;
            $pro_cat_id = $_POST['pro_cat_id'];
            $pro_ref= $_POST['pro_ref'];
            $pro_libelle=$_POST['pro_libelle'];
            $pro_description = $_POST['pro_description'];
            $pro_prix= $_POST['pro_prix'];
            $pro_stock = $_POST['pro_stock'];
            $pro_couleur= $_POST['pro_couleur'];
            $pro_d_ajout = $_POST['pro_d_ajout'];
            $pro_d_modif = NULL;            
            $pro_bloque=$_POST['pro_bloque'];
                // définit en fonction du pro_photo la marche à suivre
                if(empty($_POST['pro_photo']))
                {
                    $pro_photo = substr (strrchr ($_FILES['pro_photo']['name'], "."), 1);
                }
                else
                {
                    $pro_photo=NULL;
                }
            // appelle la fonction qui va éditer
            $result = $crud->create($pro_id, $pro_cat_id, $pro_ref, $pro_libelle, $pro_description, 
            $pro_prix, $pro_stock, $pro_couleur, $pro_photo, $pro_d_ajout, $pro_d_modif, $pro_bloque);
            if($result['result'] == true)
                {                                 
            // ----------------------------- SECURITE - VERIFICATION DU TYPE DE FICHIER AUTORISE -----------------------------
                            // On met les types autorisés dans un tableau (ici pour une image)
                            // Liste des types autorisés : https://developer.mozilla.org/fr/docs/Web/HTTP/Basics_of_HTTP/MIME_types/Complete_list_of_MIME_types
                            $aMimeTypes = array("image/gif", "image/jpeg", "image/jpg", "image/pjpeg", "image/png", "image/x-png", "image/tiff", "image/bmp");                            
                            // On ouvre l'extension FILE_INFO
                            $finfo = finfo_open(FILEINFO_MIME_TYPE);                            
                            // On extrait le type MIME du fichier via l'extension FILE_INFO 
                            $mimetype = finfo_file($finfo, $_FILES["pro_photo"]["tmp_name"]);                            
                            // On ferme l'utilisation de FILE_INFO 
                            finfo_close($finfo);                            
                            if (!in_array($mimetype, $aMimeTypes))
                                {
                                // Le type n'est pas autorisé, donc ERREUR                            
                                    echo "Type de fichier non autorisé";    
                                    exit;
                                            
                                } 
                            else 
                                {
                                    $new_id = $result['pro_id'];
                                    /* Le type est parmi ceux autorisés, donc OK, on va pouvoir déplacer et renommer le fichier */      
                                    // Requête SQL pour récupérer le nouveau nom qui est l'ID
                                    $nouveauNom = $new_id.'.'.$pro_photo;
                                    $cheminEtNomTemporaire = $_FILES['pro_photo']['tmp_name']; 
                                    // ['fichier'] récupère le name du fichier 
                                    $cheminEtNomDefinitif = '../../assets/IMG/'.$nouveauNom;
                                    move_uploaded_file($cheminEtNomTemporaire, $cheminEtNomDefinitif); 
                                    header("location: ../../view/includes/success.php");
                                }
                    }
                    // sinon : message d'erreur
                else
                {
                    header("location: ../../view/includes/success.php");
                }
        }
        
                // si ne récupère pas l'id
                else 
                    {
                        echo '<h1 class="text-center text-danger">erreur de POST</h1>';
                    }
    
?> 

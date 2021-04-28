<?php 
// pas besoin d'un titre...
$titre = "editpost" ;
// appelle la BDD
require ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/model/bdd/conn_db.php");
require_once ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/model/crud/crud.php");
$crud = new crud($pdo); 
require_once ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/model/crud/crud_user.php");
$crud_user = new user($pdo);
// si récupère l'id
if(isset($_POST['submit']))
{
    date_default_timezone_set('Europe/Paris'); // Toujours le datetime avant la variable $date
    // extrait les valeurs incluses dans post
    $pro_id = $_POST['pro_id'];
    $pro_cat_id = $_POST['pro_cat_id'];
    $pro_ref= $_POST['pro_ref'];
    $pro_libelle=$_POST['pro_libelle'];
    $pro_description = $_POST['pro_description'];
    $pro_prix= $_POST['pro_prix'];
    $pro_stock = $_POST['pro_stock'];
    $pro_couleur= $_POST['pro_couleur'];
    $pro_d_ajout = $_POST['pro_d_ajout'];
    $pro_d_modif = date("Y-m-d H:i:s");            
    $pro_bloque=$_POST['pro_bloque'];
    if(!isset($_POST['illu'])){
        $pro_photo = substr (strrchr ($_FILES['illu']['name'], "."), 1);
    }
    else
    {
        $pro_photo=NULL;
    }
    // appelle la fonction qui va éditer
    $result = $crud->update($pro_id, $pro_cat_id, $pro_ref, $pro_libelle, $pro_description, 
    $pro_prix, $pro_stock, $pro_couleur, $pro_photo, $pro_d_ajout, $pro_d_modif, $pro_bloque);
    // si réussi
    if($result['result'] == true && $pro_photo != NULL)
    {
    // ----------------------------- SECURITE - VERIFICATION DU TYPE DE FICHIER AUTORISE -----------------------------
        // On met les types autorisés dans un tableau (ici pour une image)
        // Liste des types autorisés : https://developer.mozilla.org/fr/docs/Web/HTTP/Basics_of_HTTP/MIME_types/Complete_list_of_MIME_types
        $aMimeTypes = array("image/gif", "image/jpeg", "image/jpg", "image/pjpeg", "image/png", "image/x-png", "image/tiff", "image/bmp");                            
        // On ouvre l'extension FILE_INFO
        $finfo = finfo_open(FILEINFO_MIME_TYPE);                            
        // On extrait le type MIME du fichier via l'extension FILE_INFO 
        $mimetype = finfo_file($finfo, $_FILES["illu"]["tmp_name"]);                            
        // On ferme l'utilisation de FILE_INFO 
        finfo_close($finfo);                            
        if (!in_array($mimetype, $aMimeTypes))
        {
            // Le type n'est pas autorisé, donc ERREUR                            
            echo "Type de fichier non autorisé";    
            exit();                            
        } 
        else 
        {
            /* Le type est parmi ceux autorisés, donc OK, on va pouvoir déplacer et renommer le fichier */      
            // Requête SQL pour récupérer le nouveau nom qui est l'ID
            $nouveauNom = $pro_id.'.'.$pro_photo;
            $cheminEtNomTemporaire = $_FILES['illu']['tmp_name']; 
            // ['fichier'] récupère le name du fichier 
            $cheminEtNomDefinitif = $_SERVER['DOCUMENT_ROOT']."/alourencin/web/jarditouthefinal/assets/IMG/".$nouveauNom;
            $moveIsOk = move_uploaded_file($cheminEtNomTemporaire, $cheminEtNomDefinitif); 
            // Fonction qui permet de renommer et déplacer le fichier dans le dossier souhaité
            if ($moveIsOk) 
            {
                echo "Le fichier a été uploadé dans ".$cheminEtNomDefinitif;
                // redirection a la page des vues si ça a marché
                header("location: ../../view/includes/success.php");
            }
            else 
            {
                echo "Suite à une erreur, le fichier n'a pas été uploadé";
            }
                
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

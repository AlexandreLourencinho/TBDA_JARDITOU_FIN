<?php
// pour le session start
include_once "../../view/includes/session.php";
// titre page
$titre = "Se connecter";
// appel bdd et script
require "../../model/bdd/conn_db.php";
require "../../model/CRUD/crud_user.php";
// appelle le crud user pour les fonctions user  create etc
$crud_user = new user($pdo);
// s'il y a eu une requete post, alors...
if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // passe le pseudo en minuscule, récupère les données
        $pseudo = strtolower(trim($_POST['pseudo']));
        $mdp = $_POST['mdp'];
        // chiffre le modp de la même manière qu'a la création de compte pour la correspondance
        $new_mdp = md5($mdp . $pseudo);
        $email = $_POST['email'];
        //lance la fonction qui récupère les données utilisateurs 
        $resultat = $crud_user->getUser($pseudo, $new_mdp, $email);
        if(!$resultat) 
            {
                // si pas de correspondance
                echo "<div class='alert alert-danger'> nom d'utilisateur ou mot de passe incorrect ! Essayez a nouveau.</div>";
            }
        else 
            {
                // définit la session avec l'id et le pseudo de l'utilisateur
                $_SESSION['pseudo'] = $pseudo;
                $_SESSION['user_id'] = $resultat['user_id'];
                // fin d'écriture de session - possiblement inutile, mais difficultés a garder session ouverte sans
                session_write_close();
                echo "<div class='alert alert-success'> Vous êtes connecté! </div>";
                var_dump($_SESSION);
                header("location: ../../index.php");


            }

    }
include "../../view/includes/header.php";
?>
<div class="d-flex flex-column justify-content-center align-items-center">
<h1 class="text-center text-primary"><?php echo $titre; ?></h1>

    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        <table class="table table-sm">
            <tr>
                <td><label for="pseudo"> Nom d'utilisateur : *</label></td>
                <td><input type="text" name="pseudo" class="form-control" id="pseudo" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST'){ echo $_POST['pseudo'];} ?>"></td>
            </tr>
            <tr>
            <td><label for="email"> Votre email : *</label></td>
            <td><input type="text" name="email" class="form-control" id="email"></td>
            </tr>
            <tr>
                <td><label for="mdp"> Votre mot de passe : *</label></td>
                <td><input type="password" name="mdp" id="mdp" class="form-control"></td>
            </tr>
        </table>
        <input type="submit" value="login" class="btn btn-info btn-block rounded">
        <a href="#"> Mot de passe oublié?</a>
    </form>
</div>
<br><br>
<!-- footer -->
<?php include '../../view/includes/footer.php'; ?>
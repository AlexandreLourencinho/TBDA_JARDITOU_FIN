<?php
// appelle la bdd et le crud user
require "../bdd/conn_db.php";
require "../CRUD/crud_user.php";
$crud_user = new user($pdo);
// si des infos d'inscriptions sont bien envoyés
if(isset($_POST['submit']))
{
    // cherche la correspondance entre le MDP et sa confirmation
            if($_POST['mdp']==$_POST['mdp2'])
            {
                $user_id = NULL;
                $pseudo = $_POST['pseudo'];
                $mdp= $_POST['mdp'];
                $email= $_POST['email'];
                $result = $crud_user->insertUser($user_id, $pseudo, $mdp, $email);
                if($result==false)
                {
                    // redirige vers la page d'échec si pas inscrit
                    header("location: ../../view/includes/failuser.php");
                }
                else
                {
                    // ou vers la page de succès si inscrit
                    header("location: ../../view/includes/success2.php");
                }
            }
            else
            {
                // mdp ne correspondent pas
                echo '<h1 class="text-danger"> Vos mots de passe ne correspondent pas!</h1>';
                echo '<a class="btn btn-primary" href="../../controller/login/s_inscrire.php>Ressayez en appuyant ici</a>';
                echo '<a class="btn btn-dark" href="../../index.php>retournez au site en appuyant ici</a>';
            }
}
else
{
    // si erreur de soumission de formulaire
    echo '<h1>Erreur de post</h1>';
}




?>
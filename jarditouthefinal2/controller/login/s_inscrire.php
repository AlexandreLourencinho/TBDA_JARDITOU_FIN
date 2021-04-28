<?php 
include_once ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/view/includes/session.php");
require ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/model/bdd/conn_db.php");
require_once ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/model/crud/crud_user.php");
$titre = "s'inscrire!";
$crud_user = new user($pdo);
include ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/view/includes/header.php");
?>
<section id="cover">
    <div id="cover-caption">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                    <form method="post" class="form-group" action="<?php $_SERVER['DOCUMENT_ROOT']?>/alourencin/jarditouthefinal/model/login/inscription_script.php">

                        <label for="pseudo">Votre pseudo * :</label>
                            <input type="text" name="pseudo" id="pseudo" class="form-control" required>


                        <label for="mdp">Votre mot de passe * :</label>
                            <input type="password" name="mdp" id="mdp" class="form-control" required>


                        <label for="mdp2"> Confirmez votre mot de passe * :</label>
                            <input type="password" name="mdp2" id="mdp2" class="form-control">


                        <label for="email">Votre email * :</label>
                            <input type="email" name="email" class="form-control">
                        <br>
                        <input type="submit" name="submit" value="s_inscrire" id="submit" class="btn btn-success">
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>






<?php include ($_SERVER['DOCUMENT_ROOT']."alourencin/web/jarditouthefinal/view/includes/footer.php"); ?>
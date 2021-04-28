<?php 
include_once 'includes/session.php';
$titre = "Contactez nous!";
require "../model/bdd/conn_db.php";
require_once '../model/CRUD/crud_user.php';
$crud_user = new user($pdo);
include "../view/includes/header.php"; ?>


<section id="cover">
    <div id="cover-caption">
        <div class="container shadow-lg" id="fondformulaire">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form">
<!-- <div id="formulaire" class="container col-12 p-0"> -->
                    <form class="mb-3 justify-content-center needs-validation" id="formulaire" action="http://bienvu.net/script.php" method="POST"  onsubmit="return checkForm(this)">
                        <p class="ml-2">* : Ces zones sont obligatoires</p>
                        <h1 class="h2 ml-2" id="vcoord"><u>Vos coordonnées</u></h1>
                                                    <!-- NOM -->
                        <label class="col-12 " for="nom">Nom *</label>
                            <input type="text" class="ml-sm-0 ml-md-1 ml-lg-2 col-12 form-control" id="nom" name="nom de famille" placeholder="Veuillez entrer votre nom"  >
                                <div id="nomerr" class="ml-3"></div><br>
                                                    <!--prenom -->
                        <label for="prenom" class="col-12  ">prenom *</label>
                            <input type="text" name="prenom" class="ml-lg-2 form-control col-12  " id="prenom" placeholder="Veuillez entrer votre prénom">
                                <span id="prenerr" class="ml-3"></span><br>
                                                    <!-- SEXE -->
                                <label for="sexe" class="ml-2" id="sexe"> Sexe *</label><br>
                                    <input id="sexe" type="radio" name="sexe" value="homme" class="ml-3"   > hommme
                                    <input type="radio" name="sexe" value="femme"> femme
                                    <input type="radio" name="sexe" value="neutre"> neutre
                    <br><br>
                                                    <!-- DATE DE NAISSANCE -->
                        <label class="control-label col-12  " for="daten">Date de naissance *</label>
                            <input class="form-control ml-lg-2 col-12 " id="daten" name="datenaissance" type="date"   >
                    <br>
                                                    <!-- CODE POSTAL -->
                        <label for="codep" class="ml-2 col-12  ">Code postal *</label><br>
                            <input type="text" class="ml-lg-2 form-control col-12" placeholder='votre code postal' id="codep" name="codepostal">
                            <span id="codeperr" class="ml-3"></span><br>
                                                    <!-- ADRESSE -->
                        <label for="adresse" class="ml-lg-2 col-12  ">Adresse *</label><br>
                            <input type="text" class="form-control ml-lg-2 col-12 " placeholder='votre adresse postale' id="adresse" name="adresse">
                            <span id="adresserr" class="ml-3"></span><br>
                                                    <!-- VILLE -->
                        <label for="ville" class="ml-lg-2 col-12  ">Ville *</label><br>
                            <input type="text" class="form-control ml-lg-2 col-12" placeholder='Entrez le nom de votre ville de résidence' id="ville" name="ville">
                            <span id="villerr" class="ml-3"></span><br>
                                                    <!-- EMAIL -->
                        <label for="example-email-input" class="ml-lg-2 col-12">Email *</label>
                            <input class="form-control ml-lg-2 col-12" type="text" placeholder="votre email" id="mail" name="mail"  >
                            <span id="emailerr"></span>
                            <br>
                        <h2 class="ml-2" id="vdemande"><u>Votre demande</u></h2><br>


                    <!-- CHOIX SUJET -->
                            <label for="inputState" class="ml-2">Sujet *</label>
                                <select id="inputState" class="form-control ml-lg-2 col-12" name="sujet"   >
                                    <option selected value="">-</option>
                                    <option> Mes commandes</option>
                                    <option> Question sur un produit</option>
                                    <option> Réclamation</option>
                                    <option> Autre </option>
                                </select> <br>
                    <!-- BOITE TEXTE QUESTION  -->
                            <div class="form-group">
                                <label for="reclamation" class="ml-2">Votre question *</label>
                                    <textarea class="form-control ml-lg-2 col-12" id="reclamation" name="reclamation" rows="3" 
                                    placeholder ='Faites nous part de votre demande ou de votre problème!' ></textarea>
                                    <span id="texterr" class="ml-3"></span>
                            </div>
                    <!-- CHECKBOX AUTORISATION -->
                            <div class="form-check ml-2 ">
                                <input type="checkbox" class="form-check-input" id="Check1" name="autorisation"  >
                                    <label class="form-check-label" for="Check1">J'accepte le traitement informatique de ce formulaire</label>
                            </div><span id="checkerr" class="ml-3"></span><br>
                    <!-- BOUTONS ENVOYER OU ANNULER  -->
                            <div id="boutons">
                                <button type="submit" class="btn ml-2 btn-primary text-light border-info">Envoyer</button>
                                <button type="reset" class="btn ml-2 bg-dark text-light border-info">Annuler</button>
                            </div>
                            <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
              
  </div>
  <script src="../assets/javascript/script_formulaire.js"></script>
<!-- footer -->
<?php include "../view/includes/footer.php"; ?>
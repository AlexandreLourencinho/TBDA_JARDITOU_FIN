// Exercice 5 : vérification d'un formulaire
// Effectuez le contrôle de saisie de votre formulaire Jarditou en Javascript.

// Lorsqu'une erreur est détectée, l'utilisateur doit en être informé grâce à l'affichage d'un message sous le champ concerné.

// Le formulaire ne peut être envoyé que lorsque tout est bon.
// ++++++++++++++++++++++++++++++++++++++++
// Laurent Briaux02/16/2021
// Bonjour tout le monde,
// Pour le dernier exercice, la date et l’émail vous laissez bootstrap gérer les contraintes!
// Pour les plus avancés, vous pouvez le faire en js, un petit peu d’exercice ne fait pas de mal :innocent:
// Bon courage

// expressions régulières -----------------------------------------------------------------------------------------
var fnom= new RegExp(/^[A-Za-zéàïèøÀÉÇüÜëËÙù-]+$/);
// var fdate = new RegExp(/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{2,4}$/);
var fmail= new RegExp(/^\S+@\S+\.\S+$/);
var fcodep = new RegExp(/^[0-9]{5}$/);
var fville = new RegExp(/^[A-Za-z0-9éàïèøÀÉÇüÜëËÙù -]+$/);
var fadresse = new RegExp (/^[A-Za-z0-9éàïèøÀÉÇüÜëËÙù -]+$/);
//var name = form.nom.value

// fonction checkform-vérifie le formulaire------------------------------------------------------------------------
function checkForm(form)
{
    // var retour vrai ou faux pour valider ou non l'envoi de formulaire
    var bool=true
    //   check nom vide--------------------------------------------------------------------------------------------
    if(form.nom.value == "") {
        document.getElementById("nomerr").style.color = "#ff0000";
        document.getElementById("nomerr").innerHTML = "<div class='alert alert-danger'>Le champ est vide!</div>";
        document.getElementById('nom').style.borderColor = "red";
        form.nom.focus();
        bool=false;
    }  
// chek nom avec la regex fnom, entoure le cadre en rouge si faux--------------------------------------------------
    else if(!fnom.test(form.nom.value)) {
        document.getElementById("nomerr").style.color = "#ff0000";
        document.getElementById("nomerr").innerHTML = "<div class='alert alert-danger'>Uniquement des lettres majuscules ou minuscules</div>";
        document.getElementById('nom').style.borderColor = "red";
        form.nom.focus();
        bool=false;
    }
    // vide le message d'erreur et entoure le cadre en vert pour indiquer que ce champs est correct----------------
    else
    {
        document.getElementById("nomerr").innerHTML = "<div class='alert alert-success'>champ OK</div>";
        document.getElementById('nom').style.borderColor = "limegreen";
    }

    //   check  prenom vide-----------------------------------------------------------------------------------------
    if(form.prenom.value == "") {
        document.getElementById("prenerr").style.color = "#ff0000";
        document.getElementById("prenerr").innerHTML = "<div class='alert alert-danger'>Le champ est vide!</div>";
        form.prenom.focus();
        document.getElementById('prenom').style.borderColor = "red";
        bool=false;
    }
//     // check  prenom avec la même regex que celle du nom, fnom--------------------------------------------------
    else if(!fnom.test(form.prenom.value)) {
        document.getElementById("prenerr").style.color = "#ff0000";
        document.getElementById("prenerr").innerHTML = "<div class='alert alert-danger'>Uniquement des lettres majuscules ou minuscules</div>";
        document.getElementById('prenom').style.borderColor = "red";
        form.prenom.focus();
        bool=false;
    }   
     // vide le message d'erreur et entoure le cadre en vert pour indiquer que ce champs est correct----------------    
    else 
    {
        document.getElementById('prenom').style.borderColor = "limegreen";
        document.getElementById("prenerr").innerHTML = "<div class='alert alert-success'>champ OK</div>";
    }
    // check code postal vide --------------------------------------------------------------------------------------
    if(form.codep.value == "") {
        document.getElementById("codeperr").style.color = "#ff0000";
        document.getElementById("codeperr").innerHTML ="<div class='alert alert-danger'>le champs est vide!</div>";
        document.getElementById('codep').style.borderColor = "red";
            form.codep.focus();
            bool=false;
    }
    // check code postal avec la regex fcodep--------------------------------------------------------------------------------------
    else if(!fcodep.test(form.codep.value)) {
        document.getElementById("codeperr").style.color = "#ff0000";
        document.getElementById("codeperr").innerHTML ="<div class='alert alert-danger'>entrez un code postal au format valide. exemple : 84560</div>"
        document.getElementById('codep').style.borderColor = "red";
        form.codep.focus();
        bool=false;
    }
     // vide le message d'erreur et entoure le cadre en vert pour indiquer que ce champs est correct----------------
    else
    {
        document.getElementById('codep').style.borderColor = "limegreen";
        document.getElementById("codeperr").innerHTML = "<div class='alert alert-success'>champ OK</div>";
    }
// check ville vide-------------------------------------------------------------------------------------------------
    if(form.ville.value == "") {
        document.getElementById("villerr").style.color = "#ff0000";
        document.getElementById("villerr").innerHTML ="<div class='alert alert-danger'>le champ est vide!</div>";
        document.getElementById('ville').style.borderColor = "red";
        form.ville.focus();
        bool=false;
}
// check ville avec la regex fville------------------------------------------------------------------------------------------------
    else if(!fville.test(form.ville.value)) {
        document.getElementById("villerr").style.color = "#ff0000";
        document.getElementById("villerr").innerHTML ="<div class='alert alert-danger'>Entrez un nom de ville!</div>"
        document.getElementById('ville').style.borderColor = "red";
        form.ville.focus();
        bool=false;
    }
     // vide le message d'erreur et entoure le cadre en vert pour indiquer que ce champs est correct----------------
    else{
        document.getElementById('ville').style.borderColor = "limegreen";
        document.getElementById("villerr").innerHTML = "<div class='alert alert-success'>champ OK</div>";
    }
    // check mail vide-------------------------------------------------------------------------------------------------
    if(form.mail.value == "") {
        document.getElementById("emailerr").style.color = "#ff0000";
        document.getElementById("emailerr").innerHTML ="<div class='alert alert-danger'>le champ est vide!</div>"
        document.getElementById('mail').style.borderColor = "red";
        form.mail.focus();
        bool=false;
}
// check mail avec la regex fmail------------------------------------------------------------------------------------------------
    else if(!fmail.test(form.mail.value)) {
        document.getElementById("emailerr").style.color = "#ff0000";
        document.getElementById("emailerr").innerHTML ="<div class='alert alert-danger'>Entrez un email au format valide: example@yahoo.fr</div>";
        document.getElementById('mail').style.borderColor = "red";
        form.mail.focus();
        bool=false;
    }
     // vide le message d'erreur et entoure le cadre en vert pour indiquer que ce champs est correct----------------
    else{
        document.getElementById('mail').style.borderColor = "limegreen";
        document.getElementById("mailerr").innerHTML = "<div class='alert alert-success'>champ OK</div>";
    }
  // check adresse vide---------------------------------------------------------------------------------------------
    if(form.adresse.value == "") {
        document.getElementById("adresserr").style.color = "#ff0000";
        document.getElementById("adresserr").innerHTML ="<div class='alert alert-danger'>Le champ est vide!</div>";
        document.getElementById('adresse').style.borderColor = "red";
    form.adresse.focus();
    bool=false;
    }
// check adresse avec la regex fadresse-----------------------------------------------------------------------------
    else if(!fadresse.test(form.adresse.value)) {
        document.getElementById("adresserr").style.color = "#ff0000";
        document.getElementById("adresserr").innerHTML = "<div class='alert alert-danger'>Entrez une adresse valide</div>"
        document.getElementById('adresse').style.borderColor = "red";
    form.adresse.focus();
    bool=false;
    } 
     // vide le message d'erreur et entoure le cadre en vert pour indiquer que ce champs est correct----------------
    else
    {
        document.getElementById('adresse').style.borderColor = "limegreen";
        document.getElementById("adresserr").innerHTML = "<div class='alert alert-success'>champ OK</div>";
    } 
    // zone de texte vide-------------------------------------------------------------------------------------------
    if(form.reclamation.value == "") {
        document.getElementById("texterr").style.color = "#ff0000";
        document.getElementById("texterr").innerHTML ="<div class='alert alert-danger'>Le champ est vide!</div>";
        document.getElementById('reclamation').style.borderColor = "red";
    form.reclamation.focus();
    bool=false;
    }
     // vide le message d'erreur et entoure le cadre en vert pour indiquer que ce champs est correct----------------
    else
    {
        document.getElementById('reclamation').style.borderColor = "limegreen";
        document.getElementById("texterr").innerHTML = "<div class='alert alert-success'>champ OK</div>";
    }
    // checkbox cochée ou non---------------------------------------------------------------------------------------
    if(form.Check1.checked==false) {
        document.getElementById("checkerr").style.color = "#ff0000";
        document.getElementById("checkerr").innerHTML = "<div class='alert alert-danger'>Vous devez cocher cette case pour nous autoriser a traiter le formulaire.</div>";
        document.getElementById('Check1').style.borderColor = "red";
        bool=false;
      }
    else
    {
        document.getElementById('Check1').style.borderColor = "limegreen";
        document.getElementById("checkerr").innerHTML = "<div class='alert alert-success'>case cochée</div>";

    }
    //   validation réussie
    return bool;


}

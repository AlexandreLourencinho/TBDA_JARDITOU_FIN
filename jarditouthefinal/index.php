<?php 
include_once 'view/includes/session.php';
require "model/bdd/conn_db.php";
$titre = "Acceuil Jarditou";
require_once 'model/CRUD/crud_user.php';
$crud_user = new user($pdo);
include "view/includes/header.php"; ?>
<!-- CONTENU DE LA PAGE -->
<div class="container-fluid shadow">       
                    <div class="row">
                        <div class="col-12 col-md-8 shadow mb-3 mb-md-0">
                            <section class="container">
                                <h1 id="accueil" class="text-center"><u> Accueil </u></h1><hr> 
                        
                                        <article>
                                                <h2 class="text-center"><u> L'entreprise</u> </h2>
                                                        <p>Notre entreprise familiale met tout son savoir-faire à votre disposition dans le domaine du jardin et du paysagisme.</p>
                                                        <p>Créée il y a 70 ans, notre entreprise vend fleurs, arbustes, matériel à main et motorisés.</p>
                                                        <p>Implantés à Amiens, nous intervenons dans tout le département de la Somme : Albert, Doullens, Péronne, Abbeville, Corbie</p>
                                        </article>
                                        <article>
                                                <h3 class="text-center"><u> Qualité</u></h3><hr>
                                                        <p> Nous mettons à votre disposition un service personnalisé, avec 1 seul interlocuteur durant tout votre projet.</p>
                                                        <p>Vous serez séduit par notre expertise, nos compétences et notre sérieux.</p>
                                        </article>
                                        <article>
                                                <h4 class="text-center"><u> Devis Gratuit</u></h4><hr>
                                                        <p>Vous pouvez bien sûr contacter pour de plus amples informations ou pour une demande d’intervention. 
                                                        Vous souhaitez un devis ? Nous vous le réalisons gratuitement.</p>
                                        </article>
                            </section>
                        </div>
                    <!-- div de la colonne droite responsive -->
                      <div class="container border-top rounded-lg mt-sm-6 mt-md-0 shadow col-12 col-md-4 bg-warning">
                          <h4 class="text-center">[colonne de droite]</h4><br>
                          <p> Bon ben j'écris là dedans pour que ça ait une utilité, parce que là c'est vide et moche, quoi..</p><br>
                          <p>Bon par contre je blablate parce que j'ai aucune idée là de suite de quoi mettre ici ..</p><br>
                          <p>Note à moi même : essayer de trouver un truc interessant/rp a mettre ici (pourquoi pas le panier, tiens?)</p><br>
                          <p>ceci est mon premier site fait entièrement de moi même, on va essayer de faire les choses propre, hein !</p>
                          <p>Copyright 09 mars 2021-<?php $date1 = date('Y-m-d'); setlocale(LC_TIME, "fr_FR","French"); $date = strftime("%d %B %Y", strtotime($date1)); echo $date;;?> </p>
                          <p>Lourencinho Alexandre</p>
                      </div>
                    </div>
                </div><br>
    <!-- PIED DE PAGE -->
<?php include "view/includes/footer.php"; ?>
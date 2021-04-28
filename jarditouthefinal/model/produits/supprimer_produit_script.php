<?php
// appel bdd-- page fonction delete, et le CRUD
require "../bdd/conn_db.php";
require '../CRUD/crud.php';

// -- si récupère bien l'id souhaité
$crud = new crud($pdo);
require_once '../CRUD/crud_user.php';
$crud_user = new user($pdo);
    if($_GET['id'])
        {
                // assigne l'id a $id
                $id = $_GET['id'];
                // appelle la fonction crud (c'est crud putain faut que je corrige mes com)
                // pour supprimer la station correspondante
                $result = $crud->delete($id);
                // si ça marche
                    if($result)
                        {
                            // redirige vers la page des stations
                            header("location: ../../view/tableau_produits.php");
                        }
                    // sinon affiche erreur (ça se voit que j'avais la flemme là ?)
                    else
                        {
                            echo 'erreur del';
                        }
        }
    // si récup pas l'id (oui flemme visible)
    else
        {
            echo 'erreur id';
        }





?>
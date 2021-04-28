<?php
// infos de co bdd
$host = "localhost";
$db = "alourencin";
$user = "alourencin";
$pass = "al20160";
$charset = "utf8";
// insère les infos au dessus dans le $dsn
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try
{
    // crée un objet pdo avec les infos du $dsn
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "hello dB!";
}
catch(PDOException $e)
{
    // message d'erreur si pas de co à la BDD
    echo "<h1 class='text-danger'>PAS DE BDD</h1>";
    // throw new PDOException($e->getMessage());
}

//$user = new user($pdo);

//$user->insertUser("admin", "mdp");
?>
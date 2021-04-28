<?php
// crud user - les fonctions CRUD en rapport avec la table user
    class user {
                // objet base de donnée privée
                private $db;
                // constructor pour ini une variable privée pour la co a la bdd
                function __construct($conn)
                {
                        $this->db = $conn;
                }
                // fonction création utilisateur
                 public function insertUser($user_id, $pseudo, $mdp, $email)
                 {
                    try 
                    {       // vérifie avec la fonction getuserbyusername (définie plus bas) si le pseudo à déja été utilisé ou pas
                        $resultats = $this->getUserByUserName($pseudo);
                        if($resultats['nombre'] > 0)
                            {
                                    // si nom utilisateur déjà existant, retour false
                                return false;
                            }
                        else 
                            {
                                // si nom d'utilisateur n'existe pas
                                // chiffre le mdp avec le nom d'util pour le stockage
                            $new_mdp = md5($mdp . $pseudo);
                            // prépare l'execution script sql avec placeholders
                            $sql = "INSERT INTO utilisateurs (pseudo, mdp, email) VALUES (:pseudo, :mdp, :email)";
                            // prépare l'execution du script sql en remplaçant les placeholders
                            $stmt = $this->db->prepare($sql);
                            $stmt->bindparam(":pseudo", $pseudo);
                            $stmt->bindparam(":mdp", $new_mdp);
                            $stmt->bindparam(":email", $email);                            
                            // executer la commande sql
                            $stmt->execute();
                            return true;
                            }
    
    
    
                    } 
                    // si erreur => display l'erreur
                    catch (Exception $e) 
                    {
                            // $e obtient le message d'erreur et l' "echo" 
                            echo $e->getMessage();
                            // retour : pas d'insertion
                            return false;
                    }

                }
                        // fonction qui récupère tous les utilisateurs
                 public function getUser($pseudo, $new_mdp, $email){
                            try {

                              
                                        // preparation de la requête sql + identification table
                                        $sql = "SELECT * FROM utilisateurs WHERE pseudo = :pseudo AND mdp = :mdp AND email = :email";
                                        // appel de la fonction de préparation de la requete sql
                                        $stmt = $this->db->prepare($sql);
                                        // retourner le placeholder :nomUser dans le $nomUser et le :password dans le $password
                                        $stmt->bindparam(':pseudo', $pseudo);
                                        $stmt->bindparam(':mdp', $new_mdp);
                                        $stmt->bindparam(':email', $email);
                                        // executer la requete sql
                                        $resultat = $stmt->execute();
                                        // match avec la dtb
                                        $resultat = $stmt->fetch();
                                        // retourner le resultat de la requete
                                        return $resultat;
                                

                        }catch (Exception $e) {
                                                    // pareil qu'au dessus : $e obtient le message d'erreur et l'echo 
                                                // + retour requête pas ok
                                                echo $e->getMessage();
                                                return false;
                                              }
                 }
                 // retrouve un utilisateur via le pseudo
                 public function getUserByUserName($pseudo){
                                try {
                                        $sql = "SELECT COUNT(*) as nombre from utilisateurs where pseudo = :pseudo";
                                        // appel de la fonction de préparation de la requete sql
                                        $stmt = $this->db->prepare($sql);
                                        // retourner le placeholder :nomUser dans le $nomUser
                                        $stmt->bindparam(':pseudo', $pseudo);
                                        // executer la requete sql
                                        $resultat = $stmt->execute();
                                        // match avec la dtb
                                        $resultat = $stmt->fetch();
                                        // retourner le resultat de la requete
                                        return $resultat;



                                    } catch (Exception $e) {
                                    // pareil qu'au dessus : $e obtient le message d'erreur et l'echo 
                                    // + retour requête pas ok
                                    echo $e->getMessage();
                                    return false;
                                                            }

                 }

    }

?>
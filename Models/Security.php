<?php

require_once(dirname(__FILE__) . '/../Utils/functions.php');

class Security extends Model
{
    protected $bd;

    private static $instance=null;

    public static function get_model()
    {

        if(is_null(self::$instance))
        {
            self::$instance=new Security();
        }
        return self::$instance;
    }
    
    protected function __construct() {
        parent::__construct(); 
    }
/* ---------------------------- ancienne version ---------------------------- */



 
/* ----------------------- version Nadia 15 avril 2024 ---------------------- */
public function get_login()
    { 
        try {
            $email = validData($_POST['email']);
            $requete = $this->bd->prepare('SELECT * FROM user WHERE email = :email');
            $requete->execute(array(':email' => $email));

            $updateQuery = $this->bd->prepare('UPDATE user SET lastActivityTime = CURRENT_TIMESTAMP WHERE email = :em');
            $updateQuery->execute(array(':em' => $email));
            
            if($requete->rowCount() > 0) {
                $user = $requete->fetch(PDO::FETCH_OBJ);
                $password_hash = $user->pswd; // Récupérer le hachage du mot de passe depuis la base de données
                $password = $_POST['password']; // Récupérer le mot de passe entré par l'utilisateur   
                if (password_verify($password, $password_hash)) {
                    // Mot de passe correct, retourner l'utilisateur
                    return $user;
                } else {
                    // Mot de passe incorrect
                    echo "<script>alert('Mot de passe incorrect !');</script>";
                    return false;
                }
            } else {
                // Utilisateur non trouvé
                echo "<script>alert('Adresse email non enregistrée. Veuillez vous inscrire !');</script>";
                return false;
            }
        } catch (PDOException $e) {
            // Gestion des erreurs PDO
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage());
        } 
        
    }


//....................user registration....................


/* ------------------ Nouvelle version Nadia 15 avril 2024 ------------------ */

public function get_user_registration_valid()
{   
    $email = validData($_POST['email']);
    $password = validData(password_hash($_POST['password'], PASSWORD_DEFAULT));
    $nom = validData($_POST['nom']);
    $prenom = validData($_POST['prenom']);
    
     
    try {
        // Vérifier si l'email existe déjà dans la base de données
        $requete_verification = $this->bd->prepare('SELECT * FROM user WHERE email = :email');
        $requete_verification->execute(array(':email' => $email));
        
        if ($requete_verification->rowCount() > 0) {
            // L'email existe déjà, afficher un message d'erreur
        echo "<script>alert('Cet email est déjà utilisé. Veuillez choisir un autre email.');</script>";
            return null; // Arrêter le processus d'inscription
        } else {
            // L'email n'existe pas, il faut s'inscription
            //'user' is the default role
            $role = "user";
            $requete_insertion = $this->bd->prepare('INSERT INTO user (user_id, email, roles, pswd, prenom, nom) 
                VALUES(NULL, :e, :rl, :pswd, :prenom, :nom)');
            
            $requete_insertion->execute(array(
                ':e' => $email,
                ':rl' => $role,
                ':pswd' => $password,
                ':nom' => $nom,
                ':prenom' => $prenom,
                ));

            return $requete_insertion->fetchAll(PDO::FETCH_OBJ);

}
    } catch (PDOException $e) {
        // Gestion des erreurs PDO
        die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage());
    }  

}

}
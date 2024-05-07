<?php

class User extends Model
{
    protected $bd;

    private static $instance=null;

    public static function get_model()
    {

        if(is_null(self::$instance))
        {
            self::$instance=new User();
        }
        return self::$instance;
    }
    
    protected function __construct() {
        parent::__construct(); 
    }

    public function get_all_users()
    {

        try {
            $requete = $this->bd->prepare('SELECT * FROM user');
            $requete->execute();
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_count_users()
    {
        try {
            $requete = $this->bd->prepare('SELECT COUNT(*) FROM user');
            $requete->execute();
            $count = $requete->fetchColumn();
            return $count;
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
    }

    public function get_user_profile()
    {

        try {
            $requete = $this->bd->prepare('SELECT * FROM user u
                                           WHERE u.user_id = :d');
            $requete->execute(array(':d' => $_SESSION['id']));

            
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
       
    }

    public function set_user_profile()
    {

        try {
            $requete = $this->bd->prepare('UPDATE user SET lastname = :ln, firstname = :fn, email = :em, birthdate = :birth  WHERE user_id = :d');
            $requete->execute(array(':d' => $_SESSION['id'], ':ln' => $_POST['lastname'], ':fn' => $_POST['firstname'], ':em' => $_POST['email'], ':birth' => $_POST['birthdate'] ));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_proprietaire()
    {

        try {
            $requete = $this->bd->prepare('SELECT * FROM proprietaire p
                                           JOIN user u ON p.user_id = u.user_id
                                           WHERE p.user_id = :d');
            $requete->execute(array(':d' => $_SESSION['id']));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
       
    }

    public function get_public_profile()
    {

        try {
            $requete_user = $this->bd->prepare('SELECT user_id, prenom, nom, created_at, image_name, lastActivityTime  FROM user WHERE user_id = :d');
            $requete_user->execute(array(':d' => $_GET['id']));

        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete_user->fetchAll(PDO::FETCH_OBJ);

       
    }

    public function set_profile_picture($newImageName)
    {
        try {
            $requete = $this->bd->prepare('UPDATE user SET image_name = :new WHERE user_id = :id');
            $requete->execute(array(':id' => $_POST['user_id'], ':new' => $newImageName));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);

    }

    public function get_profile_picture($user_id)
    {   
        try {
            $requete = $this->bd->prepare('SELECT image_name FROM user WHERE user_id = :id');
            $requete->execute(array(':id' => $user_id));
            $result = $requete->fetchColumn();
            return $result;
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
    }
    public function get_date_naissance()
    {

        try {
            $requete = $this->bd->prepare('SELECT date_naissance FROM user WHERE user_id = :d');
            $requete->execute(array(':d' => $_GET['id']));

        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);

    }
    
    public function get_age()
    {
        try {
            $requete = $this->bd->prepare('SELECT date_naissance FROM user WHERE user_id = :d');
            $requete->execute(array(':d' => $_GET['id']));
    
            $resultat = $requete->fetch(PDO::FETCH_OBJ);
            $date_naissance = new DateTime($resultat->date_naissance);
    
            $maintenant = new DateTime();
            $difference = $date_naissance->diff($maintenant);
            return $difference->y; 
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
    }
    
    

    

    

    
    

   

   
   

}
<?php

class Commentaire extends Model
{
    protected $bd;

    private static $instance=null;

    public static function get_model()
    {

        if(is_null(self::$instance))
        {
            self::$instance=new Commentaire();
        }
        return self::$instance;
    }
    
    protected function __construct() {
        parent::__construct(); 
    }

    public function get_commentaires_recus_moto()
    {

        try {
            $requete = $this->bd->prepare('SELECT * 
                                           FROM commentaire c
                                           JOIN reservation r ON c.reservation_id = r.reservation_id
                                           JOIN user u ON u.user_id = r.user_id
                                           WHERE r.moto_id = :mid
                                           ');
            $requete->execute(array(':mid'=> $_GET['moto_id']));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_moy_notes_recues_moto()
    {

        try {
            $requete = $this->bd->prepare('SELECT ROUND((SUM(note_moto)/COUNT(note_moto)), 2) AS moyenne
                                           FROM commentaire c 
                                           JOIN reservation r ON c.reservation_id = r.reservation_id 
                                           JOIN user u ON u.user_id = r.user_id 
                                           WHERE r.moto_id = :mid;

                                           ');
            $requete->execute(array(':mid'=> $_GET['moto_id']));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_nbr_notes_recues_moto()
    {

        try {
            $requete = $this->bd->prepare('SELECT COUNT(note_moto) AS nbr_notes
                                           FROM commentaire c 
                                           JOIN reservation r ON c.reservation_id = r.reservation_id 
                                           JOIN user u ON u.user_id = r.user_id 
                                           WHERE r.moto_id = :mid;
                                           ');
            $requete->execute(array(':mid'=> $_GET['moto_id']));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_commentaires_recus_user()
    {

        try {
            $requete = $this->bd->prepare('SELECT * 
                                           FROM commentaire c
                                           JOIN reservation r ON c.reservation_id = r.reservation_id
                                           JOIN moto m ON r.moto_id = m.moto_id
                                           JOIN proprietaire p ON p.proprietaire_id = m.proprietaire_id
                                           JOIN user u ON u.user_id = p.user_id
                                           WHERE u.user_id = :pid
                                           ');
            $requete->execute(array(':pid'=> $_GET['id']));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_moy_notes_recues_user($user_id)
    {

        try {
            $requete = $this->bd->prepare('SELECT ROUND((SUM(note_proprio)/COUNT(note_proprio)), 2) AS moyenne
                                           FROM commentaire c 
                                           JOIN reservation r ON c.reservation_id = r.reservation_id 
                                           JOIN moto m ON r.moto_id = m.moto_id 
                                           JOIN proprietaire p ON p.proprietaire_id = m.proprietaire_id 
                                           JOIN user u ON u.user_id = p.user_id 
                                           WHERE u.user_id = :mid;
            ;

                                           ');
            $requete->execute(array(':mid'=> $user_id));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_nbr_notes_recues_user($user_id)
    {

        try {
            $requete = $this->bd->prepare('SELECT COUNT(note_proprio) AS nbr_notes
                                           FROM commentaire c 
                                           JOIN reservation r ON c.reservation_id = r.reservation_id 
                                           JOIN moto m ON r.moto_id = m.moto_id 
                                           JOIN proprietaire p ON p.proprietaire_id = m.proprietaire_id 
                                           JOIN user u ON u.user_id = p.user_id 
                                           WHERE u.user_id = :mid;

                                           ');
            $requete->execute(array(':mid'=> $user_id));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }



   
// SELECT (SUM(note_moto)/COUNT(note_moto)) FROM commentaire c JOIN reservation r ON c.reservation_id = r.reservation_id JOIN user u ON u.user_id = r.user_id WHERE r.moto_id = 24;

// SELECT COUNT(note_moto) FROM commentaire c JOIN reservation r ON c.reservation_id = r.reservation_id JOIN user u ON u.user_id = r.user_id WHERE r.moto_id = 24;



}
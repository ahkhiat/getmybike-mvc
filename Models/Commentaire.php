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

    public function get_commentaires_recus_moto($moto_id)
    {

        try {
            $requete = $this->bd->prepare('SELECT c.commentaire_id, c.note_moto, c.texte_moto, c.note_proprio, 
                                           c.texte_proprio, u.nom, u.prenom, u.image_name, c.created_at, u.user_id
                                           FROM commentaire c
                                           JOIN reservation r ON c.reservation_id = r.reservation_id
                                           JOIN user u ON u.user_id = r.user_id
                                           WHERE r.moto_id = :mid
                                           ');
            $requete->execute(array(':mid'=> $moto_id));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_moy_notes_recues_moto($moto_id)
    {

        try {
            $requete = $this->bd->prepare('SELECT ROUND((SUM(note_moto)/COUNT(note_moto)), 2) AS moyenne
                                           FROM commentaire c 
                                           JOIN reservation r ON c.reservation_id = r.reservation_id 
                                           JOIN user u ON u.user_id = r.user_id 
                                           WHERE r.moto_id = :mid;

                                           ');
            $requete->execute(array(':mid'=> $moto_id));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_nbr_notes_recues_moto($moto_id)
    {

        try {
            $requete = $this->bd->prepare('SELECT COUNT(note_moto) AS nbr_notes
                                           FROM commentaire c 
                                           JOIN reservation r ON c.reservation_id = r.reservation_id 
                                           JOIN user u ON u.user_id = r.user_id 
                                           WHERE r.moto_id = :mid;
                                           ');
            $requete->execute(array(':mid'=> $moto_id));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_commentaires_recus_user($user_id)
    {

        try {
            $requete = $this->bd->prepare('SELECT c.commentaire_id, c.note_moto, c.texte_moto, c.note_proprio, 
                                           c.texte_proprio, us.nom, us.prenom, us.image_name, c.created_at, us.user_id
                                           FROM commentaire c
                                           JOIN reservation r ON c.reservation_id = r.reservation_id
                                           JOIN user us ON r.user_id = us.user_id
                                           JOIN moto m ON r.moto_id = m.moto_id
                                           JOIN proprietaire p ON p.proprietaire_id = m.proprietaire_id
                                           JOIN user u ON u.user_id = p.user_id
                                           WHERE u.user_id = :pid
                                           ');
            $requete->execute(array(':pid'=> $user_id));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_nbr_commentaires_recus_user($user_id)
    {

        try {
            $requete = $this->bd->prepare('SELECT COUNT(c.commentaire_id)
                                           FROM commentaire c
                                           JOIN reservation r ON c.reservation_id = r.reservation_id
                                           JOIN user us ON r.user_id = us.user_id
                                           JOIN moto m ON r.moto_id = m.moto_id
                                           JOIN proprietaire p ON p.proprietaire_id = m.proprietaire_id
                                           JOIN user u ON u.user_id = p.user_id
                                           WHERE u.user_id = :pid
                                           ');
            $requete->execute(array(':pid'=> $user_id));
            $count = $requete->fetchColumn();
            return $count;

        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
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

    public function set_commentaire_add($reservation_id)
    {

        try {
            $requete = $this->bd->prepare('INSERT INTO commentaire (commentaire_id, reservation_id, note_moto, texte_moto,
                                           note_proprio, texte_proprio) VALUES (NULL, :rid, :notem, :textm, :notep, :textp)

                                           ');
            $requete->execute(array(':rid'=> $reservation_id,
                                    ':notem'=> $_POST['note_moto'],
                                    ':textm' => $_POST['texte_moto'],
                                    ':notep'=> $_POST['note_proprio'],
                                    ':textp'=> $_POST['texte_proprio']));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    public function is_commentaire_exists($reservation_id)
    {
        try {
            $requete = $this->bd->prepare('SELECT COUNT(*) 
                                           FROM commentaire 
                                           WHERE reservation_id = :rid
                                    
                                           ');
            $requete->execute(array(':rid'=> $reservation_id));
            $count = $requete->fetchColumn();

            if ($count > 0) {
                return 1; 
            } else {
                return 0; 
            }
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
    }



   


}
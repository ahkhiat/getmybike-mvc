<?php

class Reservation extends Model
{
    protected $bd;

    private static $instance=null;

    public static function get_model()
    {

        if(is_null(self::$instance))
        {
            self::$instance=new Reservation();
        }
        return self::$instance;
    }
    
    protected function __construct() {
        parent::__construct(); 
    }
    public function get_nbr_reservations($user_id)
    {

        try {
            $requete = $this->bd->prepare('SELECT COUNT(reservation_id) AS nbr_reservations
                                           FROM reservation r
                                           JOIN moto m ON r.moto_id = m.moto_id 
                                           JOIN proprietaire p ON p.proprietaire_id = m.proprietaire_id 
                                           JOIN user u ON u.user_id = p.user_id 
                                           WHERE u.user_id = :mid;
                                           ');
            $requete->execute(array(':mid'=> $user_id));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        $count = $requete->fetchColumn();
        return $count;
    }

    public function get_reservations($moto_id)
    {

        try {
            $requete = $this->bd->prepare('SELECT * 
                                           FROM reservation
                                           WHERE moto_id = :mid
                                           ');
            $requete->execute(array(
                                    'mid'=> $moto_id,
                                    ));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    public function set_reservation($moto_id)
    {

        try {
            $requete = $this->bd->prepare('INSERT INTO reservation 
                                           (reservation_id, user_id, moto_id, date_debut, date_fin)
                                           VALUES (NULL, :usid, :mid, :dd, :df)
                                           ');
            $requete->execute(array(':usid'=> $_SESSION['id'],
                                    'mid'=> $moto_id,
                                    ':dd'=> $_POST['date_debut'],
                                    ':df'=> $_POST['date_fin']));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
   


}
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
   


}
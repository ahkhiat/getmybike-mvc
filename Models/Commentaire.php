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
                                           JOIN user u ON u.user_id = c.user_id
                                           WHERE r.moto_id = :mid
                                           ');
            $requete->execute(array(':mid'=> $_GET['moto_id']));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

   


}
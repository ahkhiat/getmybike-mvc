<?php

class Moto extends Model
{
    protected $bd;

    private static $instance=null;

    public static function get_model()
    {

        if(is_null(self::$instance))
        {
            self::$instance=new Moto();
        }
        return self::$instance;
    }
    
    protected function __construct() {
        parent::__construct(); 
    }
    public function get_all_motos()
    {

        try {
            $requete = $this->bd->prepare('SELECT * 
                                           FROM moto mt
                                           JOIN modele md ON mt.modele_id = md.modele_id
                                           JOIN marque mq ON md.marque_id = mq.marque_id
                                           JOIN proprietaire p ON mt.proprietaire_id = p.proprietaire_id
                                           JOIN user u ON u.user_id = p.user_id ');
            $requete->execute();
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
   
    public function get_moto_show()
    {

        try {
            $requete = $this->bd->prepare('SELECT * 
                                           FROM moto mt
                                           JOIN modele md ON mt.modele_id = md.modele_id
                                           JOIN marque mq ON md.marque_id = mq.marque_id
                                           JOIN proprietaire p ON mt.proprietaire_id = p.proprietaire_id
                                           JOIN user u ON u.user_id = p.user_id
                                           WHERE moto_id = :mid  ');
            $requete->execute(array(':mid' => $_GET['moto_id']));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_user_id()
    {

        try {
            $requete = $this->bd->prepare('SELECT p.user_id 
                                           FROM moto mt
                                           JOIN proprietaire p ON mt.proprietaire_id = p.proprietaire_id
                                           WHERE mt.moto_id = :mid
                                           ');
            $requete->execute(array(':mid' => $_GET['moto_id']));
            return $requete->fetchColumn();
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        // return $requete->fetchAll(PDO::FETCH_OBJ);
    }

   


}
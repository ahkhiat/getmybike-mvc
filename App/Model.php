<?php

/* ------------------------- POUR RAJOUTER UN MODELE ------------------------ */
/*
Créer son modèle dans Models

Le déclarer dans index.php 

Attention aux fonctions qui doivent être protected et non private

Le constructeur doit faire appel au constructeur parent

Dans chaque modèle, on doit instancier le modèle en question


*/



class Model
{
    protected $bd;

    private static $instance=null;

    protected function __construct()
    {
        try {
            $this->bd = new PDO(getenv('DB_PATH'));
            $this->bd->query("SET NAMES 'utf8'");
            $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
        catch (PDOException $e) 
        {
            die('<p>Echec connexion. Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
    }

    public static function get_model()
    {
        if(is_null(self::$instance))
        {
            self::$instance=new Model();
        }
        return self::$instance;
    }
}
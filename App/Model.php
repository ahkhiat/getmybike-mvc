<?php


class Model
{
    protected $bd;

    private static $instance=null;

    protected function __construct()
    {
        try {
            $this->bd = new PDO('mysql:host=localhost:3307;dbname=get-my-bike-mvc', 'root', '');
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
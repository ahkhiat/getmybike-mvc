<?php

class Admin extends Model
{
    protected $bd;

    private static $instance=null;

    public static function get_model()
    {

        if(is_null(self::$instance))
        {
            self::$instance=new Admin();
        }
        return self::$instance;
    }
    
    protected function __construct() {
        parent::__construct(); 
    }

    public function get_nb_ventes_total_jour()
    {

        try {
            $requete = $this->bd->prepare('SELECT COUNT(*)
                                           FROM facture 
                                           WHERE date = CURDATE()
                                           ');
            $requete->execute();
            $count = $requete->fetchColumn();
            return $count;
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
    }
    public function get_ca_jour()
    {

        try {
            $requete = $this->bd->prepare('SELECT SUM(prix_ht) AS total_ht, 
                                           SUM(prix_ttc) AS total_ttc 
                                           FROM facture 
                                           WHERE date = CURDATE()
                                           ');
            $requete->execute();
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_ventes_jour_all()
    {

        try {
            $requete = $this->bd->prepare('SELECT f.id, date, prix_ht, prix_ttc, c.nom AS client_nom, c.prenom AS client_prenom,
                                           u.nom AS user_nom, u.prenom AS user_prenom
                                           FROM facture f
                                           JOIN clients c ON f.id_client = c.id
                                           JOIN user u ON f.id_user = u.id
                                           
                                           WHERE f.date = CURDATE()
                                           ORDER BY date DESC
                                           ');
            $requete->execute();
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_ventes_mois_produit()
    {

        try {
            // $requete = $this->bd->prepare('SELECT 
            //                                f.id, date, prix_ht, prix_ttc, c.nom AS client_nom, c.prenom AS client_prenom,
            //                                u.nom AS user_nom, u.prenom AS user_prenom
            //                                FROM facture f
            //                                JOIN clients c ON f.id_client = c.id
            //                                JOIN user u ON f.id_user = u.id
            //                                JOIN ligne_facture l ON f.id = l.id_facture
            //                                WHERE l.id_produit = :pid
            //                                AND YEAR(f.date) = YEAR(CURRENT_DATE())
            //                                ');
            $requete = $this->bd->prepare('SELECT 
                                          p.name,
                                          DATE_FORMAT(f.date, "%m") AS mois, 
                                          SUM(prix_ht) AS total_prix_ht, 
                                          SUM(prix_ttc) AS total_prix_ttc 
                                          FROM facture f 
                                          JOIN clients c ON f.id_client = c.id 
                                          JOIN user u ON f.id_user = u.id 
                                          JOIN ligne_facture l ON f.id = l.id_facture 
                                          JOIN produits p ON l.id_produit = p.id
                                          WHERE l.id_produit = :pid
                                          AND YEAR(f.date) = YEAR(CURRENT_DATE()) 
                                          GROUP BY mois;
                                            ');
            $requete->execute(array(':pid' => $_POST['choix_produit']));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
    

}
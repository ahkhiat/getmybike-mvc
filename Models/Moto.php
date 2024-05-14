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
   
    public function get_moto_show($moto_id)
    {

        try {
            $requete = $this->bd->prepare('SELECT * 
                                           FROM moto mt
                                           JOIN modele md ON mt.modele_id = md.modele_id
                                           JOIN marque mq ON md.marque_id = mq.marque_id
                                           JOIN proprietaire p ON mt.proprietaire_id = p.proprietaire_id
                                           JOIN user u ON u.user_id = p.user_id
                                           WHERE moto_id = :mid  ');
            $requete->execute(array(':mid' => $moto_id));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    public function set_moto_delete($moto_id)
    {

        try {
            $requete = $this->bd->prepare('DELETE FROM moto WHERE moto_id = :mid');
            $requete->execute(array(':mid'=> $moto_id));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_motos_user()
    {

        try {

            $requete = $this->bd->prepare('SELECT *, 
                                        (SELECT ROUND((SUM(note_moto)/COUNT(note_moto)), 2) AS moyenne 
                                            FROM commentaire c 
                                            JOIN reservation r ON c.reservation_id = r.reservation_id 
                                            WHERE r.moto_id = mt.moto_id) AS moyenne_notes,
                                        (SELECT COUNT(note_moto) AS nbr_notes
                                           FROM commentaire c 
                                           JOIN reservation r ON c.reservation_id = r.reservation_id 
                                           WHERE r.moto_id = mt.moto_id) AS nbr_notes
                                        FROM moto mt
                                        JOIN modele md ON mt.modele_id = md.modele_id
                                        JOIN marque mq ON md.marque_id = mq.marque_id
                                        JOIN proprietaire p ON mt.proprietaire_id = p.proprietaire_id
                                        JOIN user u ON u.user_id = p.user_id
                                        WHERE u.user_id = :mid');
            $requete->execute(array(':mid' => $_SESSION['id']));
            
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

    public function get_all_modeles()
    {

        try {
            $requete = $this->bd->prepare('SELECT * 
                                           FROM modele md
                                           JOIN marque mq ON md.marque_id = mq.marque_id
                                           ');
            $requete->execute();
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
    public function set_model_add()
    {
        try { // a faire
            $requete = $this->bd->prepare('INSERT INTO clients (id, nom, prenom, adresse1, adresse2, code_postal, ville, email, telephone) 
            VALUES(NULL, :nom, :prenom, :ad1, :ad2, :cp, :ville, :email, :tel)');
            $requete->execute(array(
                ':nom' => $_POST['nom'],
                ':prenom' => $_POST['prenom'],
                ':ad1' => $_POST['adresse1'],
                ':ad2' => $_POST['adresse2'],
                ':cp' => $_POST['code_postal'],
                ':ville' => $_POST['ville'],
                ':email' => $_POST['email'],
                ':tel' => $_POST['telephone']
            ));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }
    public function set_moto_add_request()
    {
        $bagagerie = isset($_POST['bagagerie']) && $_POST['bagagerie'] === 'on';

        try { // a faire
            $requete = $this->bd->prepare('INSERT INTO moto (moto_id, proprietaire_id, modele_id, annee, 
                                           couleur, prix_jour, description, bagagerie, adresse_moto, 
                                           code_postal_moto, ville_moto, cylindree, poids, puissance, dispo) 
                                           VALUES(NULL, :pro, :mod, :annee, :coul, :pj, :des, :bag, :adr, :cp, :vil, 
                                           :cyl, :poi, :pui, :dsp)');
            $requete->execute(array(
                ':pro' => $_SESSION['prop_id'],
                ':mod' => $_POST['modele_id'],
                ':annee' => $_POST['annee'],
                ':coul' => $_POST['couleur'],
                ':pj' => $_POST['prix_jour'],
                ':des' => $_POST['description'],
                ':bag' => $bagagerie,
                ':adr' => $_POST['adresse_moto'],
                ':cp' => $_POST['code_postal_moto'],
                ':vil' => $_POST['ville_moto'],
                ':cyl' => $_POST['cylindree'],
                ':poi' => $_POST['poids'],
                ':pui' => $_POST['puissance'],
                ':dsp' => '1'
            ));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        // return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_moto_update_request()
    {

        try {
            // $bagagerie = isset($_POST['bagagerie']) && $_POST['bagagerie'] === 'on';

            $requete = $this->bd->prepare('UPDATE moto SET modele_id = :mod, annee = :annee, 
                                           couleur = :coul, prix_jour = :pj, description = :des, bagagerie = :bag, adresse_moto = :adr, 
                                           code_postal_moto = :cp, ville_moto = :vil, cylindree = :cyl, poids = :poi, 
                                           puissance = :pui
                                           WHERE moto_id = :mid
                                           ');
            $requete->execute(array(':mid' => $_POST['moto_id'],
                                    ':mod' => $_POST['modele_id'],
                                    ':annee' => $_POST['annee'],
                                    ':coul' => $_POST['couleur'],
                                    ':pj' => $_POST['prix_jour'],
                                    ':des' => $_POST['description'],
                                    ':bag' => $_POST['bagagerie'],
                                    ':adr' => $_POST['adresse_moto'],
                                    ':cp' => $_POST['code_postal_moto'],
                                    ':vil' => $_POST['ville_moto'],
                                    ':cyl' => $_POST['cylindree'],
                                    ':poi' => $_POST['poids'],
                                    ':pui' => $_POST['puissance']
                                    ));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    public function set_moto_picture($newImageName)
    {
        try {
            $requete = $this->bd->prepare('UPDATE moto SET moto_image_name = :new WHERE moto_id = :id');
            $requete->execute(array(':id' => $_POST['moto_id'], ':new' => $newImageName));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);

    }
    public function get_moto_picture($moto_id)
    {   
        try {
            $requete = $this->bd->prepare('SELECT moto_image_name FROM moto WHERE moto_id = :id');
            $requete->execute(array(':id' => $moto_id));
            $result = $requete->fetchColumn();
            return $result;
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
    }

    public function set_favori($moto_id)
    {
        try {
            $requete = $this->bd->prepare('INSERT INTO favori (user_id, moto_id)
            VALUES (:usid, :mid)');
            $requete->execute(array(':usid' => $_SESSION['id'], ':mid' => $moto_id));
            $count = $requete->fetchColumn();
            return $count;
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
    }
    public function set_unfavori($moto_id)
    {
        try {
            $requete = $this->bd->prepare('DELETE FROM favori WHERE user_id = :usid AND  moto_id = :mid');
            $requete->execute(array(':usid' => $_SESSION['id'], ':mid' => $moto_id));
            $count = $requete->fetchColumn();
            return $count;
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
    }
    public function get_is_favori($moto_id)
    {
        try {
            
            $requete = $this->bd->prepare('SELECT COUNT(*) FROM favori WHERE user_id = :usid AND moto_id = :mid');
            $requete->execute(array(':usid' => $_SESSION['id'], ':mid' => $moto_id));
            $count = $requete->fetchColumn();
            // return $count > 0;
            if ($count > 0) {
                return 1; // when followed_id is followed by follower_id
            } else {
                return 0; // when followed_id is NOT followed by follower_id
            }
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
    }
   
    public function get_motos_favorites()
    {
        try {
            $requete = $this->bd->prepare('SELECT * 
                                           FROM favori f
                                           JOIN moto m ON f.moto_id = m.moto_id
                                           JOIN modele md ON m.modele_id = md.modele_id
                                           JOIN marque mar ON md.marque_id = mar.marque_id
                                           JOIN user u ON f.user_id = u.user_id
                                           WHERE f.user_id = :usid
                                           ');
            $requete->execute(array(':usid' => $_SESSION['id']));
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
        return $requete->fetchAll(PDO::FETCH_OBJ);
    }


}
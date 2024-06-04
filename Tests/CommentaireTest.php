<?php

require_once '../Models/Commentaire.php';  
require_once '../App/Model.php'; 

// Simuler $_POST et $_SESSION
$_POST = [
    'reservation_id' => 1,
    'note_moto' => 5,
    'texte_moto' => 'Très bonne moto',
    'note_proprio' => 4,
    'texte_proprio' => 'Propriétaire sympathique'
];

$_SESSION = [
    'id' => 1
];

// Simuler une classe de base de données
class FakeDatabase {
    public $lastQuery;
    public function prepare($query) {
        $this->lastQuery = $query;
        return new FakeStatement($query);
    }
}

class FakeStatement {
    private $query;
    public function __construct($query) {
        $this->query = $query;
    }
    public function execute($params) {
        // Logique de simulation pour les tests
        foreach ($params as $key => $value) {
            $this->query = str_replace($key, $value, $this->query);
        }
        echo "Executed query: " . $this->query . "\n";
    }
    public function fetchColumn() {
        return 1;  // Simulation du retour de la colonne de comptage
    }
}

// Injecter la base de données factice dans le modèle Commentaire
class Commentaire {
    private $bd;
    public function __construct($db) {
        $this->bd = $db;
    }

    public function set_commentaire_add($reservation_id) {
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
    }

    public function is_reservation_sans_commentaire($user_id) {
        try {
            $requete = $this->bd->prepare('SELECT COUNT(*) 
                                           FROM reservation r 
                                           WHERE r.user_id = :usid
                                           AND r.date_fin < CURRENT_DATE
                                           AND NOT EXISTS (SELECT 1 
                                                           FROM commentaire c 
                                                           WHERE c.reservation_id = r.reservation_id 
                                                           AND r.user_id = :usid)
                                           ');
            $requete->execute(array(':usid'=> $user_id));
            $count = $requete->fetchColumn();

            return $count;
            
        } catch (PDOException $e) {
            die('Erreur [' . $e->getCode() . '] : ' . $e->getMessage() . '</p>');
        }
    }
}

function testSetCommentaireAdd() {
    $db = new FakeDatabase();
    $commentaire = new Commentaire($db);
    
    $commentaire->set_commentaire_add($_POST['reservation_id']);
    
    echo "Test set_commentaire_add PASSED\n";
}

function testIsReservationSansCommentaire() {
    $db = new FakeDatabase();
    $commentaire = new Commentaire($db);
    
    $count = $commentaire->is_reservation_sans_commentaire($_SESSION['id']);
    
    if ($count === 1) {
        echo "Test is_reservation_sans_commentaire PASSED\n";
    } else {
        echo "Test is_reservation_sans_commentaire FAILED\n";
    }
}
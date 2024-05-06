<?php

require_once('../App/Model.php');
require_once('../Models/Produit.php');


$m = Produit::get_model();

$produits = $m->get_all_produits_json();

ob_clean();
header('Content-Type: application/json');

echo $produits;
exit;
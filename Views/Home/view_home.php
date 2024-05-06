<?php

// if(isset($_SESSION['nom'])) {
//     echo 'Prénom de l\'utilisateur : '. $_SESSION['prenom'] . '<br>';
//     echo 'Nom de l\'utilisateur : '. $_SESSION['nom']. '<br>';
//     echo 'Id de l\'utilisateur : '. $_SESSION['id']. '<br>';
// }
?>

<!-- <h4 class="text-center mt-5">
Bienvenue <?php if(isset($_SESSION['nom'])) {
    echo $_SESSION["prenom"] ." ". $_SESSION['nom']. '<br>';
}; ?>
Faisons des ventes aujourd'hui !
</h4> -->

<img src="./Content/img/site/home/moto_home.png" id="home-image">

<div id="conteneur_slider">
    <a href="?controller=security&action=user_connection"><button type= "button" class="btn btn-light">Prenez la route</button></a>
</div>


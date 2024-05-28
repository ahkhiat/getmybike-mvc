<?php

?>
<div id="home_container">


<!-- <img src="./Content/img/site/home/moto_home.png" id="home-image" class=""> -->

<div id="conteneur_slider">
<?php if(isset($_SESSION['nom'])) :?>
    <a href="?controller=moto&action=all_motos" class="btn btn-warning" id="bouton_acceuil">Prenez la route</a>
<?php else : ?>
    <a href="?controller=security&action=user_connection" class="btn btn-louer-mobile" id="bouton_acceuil">Louer ma moto</a>
<?php endif ?>
</div>

</div>


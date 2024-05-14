<?php

?>
<div id="home_container">


<!-- <img src="./Content/img/site/home/moto_home.png" id="home-image" class=""> -->

<div id="conteneur_slider">
<?php if(isset($_SESSION['nom'])) :?>
    <a href="?controller=moto&action=all_motos"><button type= "button" class="btn btn-warning">Prenez la route</button></a>
<?php else : ?>
    <a href="?controller=security&action=user_connection"><button type= "button" class="btn btn-light">Inscrivez-vous</button></a>
<?php endif ?>
</div>

</div>


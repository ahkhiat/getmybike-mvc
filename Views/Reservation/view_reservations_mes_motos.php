<?php

// var_dump($reservations);
// var_dump($date_now);

?>


  
<section id="gallery"> 
    <h1>Réservations de mes motos</h1>
    <div class="container"> 
        <div class="row">

        <?php foreach($reservations as $reservation): ?>
	    <!-- <?php var_dump($reservation); ?>  -->

            <div class="col-sm-5 col-md-3 col-lg-3 mb-4">
                <div class="card">
                    <!-- <a href="?controller=moto&action=moto_show&moto_id=<?= $reservation->reservation_id ?>"> --> 
                        <img src="./Public/img/moto/<?= $reservation->moto_image_name ?>" alt="" class="vignette-resa align-self-center">
                        <div class="card-body">
                            <div class="">
                            <h5 class="card-title">Réservation n°<?= $reservation->reservation_id?></h5>
                            <?php
                            // var_dump($date_now);
                            // var_dump(date('d m Y', strtotime($reservation->date_debut)));
                            // var_dump($reservation->date_fin);
                                if($date_now < new DateTime($reservation->date_debut)) {
                                echo '
                                <span class="badge text-bg-primary">A venir</span>							
                                ';
                                } 
                                elseif(($date_now > new DateTime($reservation->date_debut)) && ($date_now < new DateTime($reservation->date_fin))) {
                                echo '
                                <span class="badge text-bg-success">En cours</span>
                                ';
                                } else {
                                echo '
                                <span class="badge text-bg-secondary">Passé</span>
                                ';
                                }
                            
                            ?>

                            </div>
                            <p class="card-text mt-3 fw-bold"><?= $reservation->marque_libelle?> <?= $reservation->modele_libelle?></p>
                            <p class="card-text">Du : <?= date('d m Y', strtotime($reservation->date_debut))?></p>
                            <p class="card-text">Au : <?= date('d m Y', strtotime($reservation->date_fin))?></p>
                            <p class="card-text">Locataire : 
                                <a href="?controller=user&action=public_profile&id=<?= $reservation->user_id?>">
                                    <?= $reservation->prenom ?> <?= $reservation->nom ?>
                                </a>
                            </p>

                            
                        </div>    
                        <!-- /* ------------------------------ fin card body ----------------------------- */ -->
                </div>  
                <!-- /* -------------------------------- fin card -------------------------------- */ -->

            </div>
            <!-- /* ----------------------------- fin responsive ----------------------------- */ -->
        <?php endforeach;?> 

        </div>
    </div>
</section>





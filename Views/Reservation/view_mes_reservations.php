<?php

// var_dump($reservations);
// var_dump($date_now);

?>


  
<section id="gallery">
  <div class="container">
    <div class="row">

<?php foreach($reservations as $reservation): ?>
	<!-- <?php var_dump($reservation); ?> -->

		<div class="col-lg-3 col-md-3 col-sm-5 mb-4">
			<div class="card">
				<!-- <a href="?controller=moto&action=moto_show&moto_id=<?= $reservation->reservation_id ?>"> -->
					<img src="./Public/img/moto/<?= $reservation->moto_image_name ?>" alt="" class="vignette-resa">
					<div class="card-body">
						<div class="d-flex justify-content-between align-items-center">
						<h5 class="card-title">Réservation n°<?= $reservation->reservation_id?></h5>
						<?php
                        // var_dump($date_now);
                        // var_dump(date('d m Y', strtotime($reservation->date_debut)));
                        // var_dump($reservation->date_fin);
							if($date_now < $reservation->date_debut) {
							echo '
                            <span class="badge text-bg-primary">A venir</span>							
                            ';
							} 
							elseif(($date_now > $reservation->date_debut) && ($date_now < $reservation->date_fin)) {
							echo '
                            <span class="badge text-bg-primary">En cours</span>
							';
							} else {
                            echo '
                            <span class="badge text-bg-secondary">Passé</span>
                            ';
                            }
						
						?>

						</div>
                        <p class="card-text"><?= $reservation->marque_libelle?> <?= $reservation->modele_libelle?></p>
						<p class="card-text">Du : <?= date('d m Y', strtotime($reservation->date_debut))?></p>
						<p class="card-text">Au : <?= date('d m Y', strtotime($reservation->date_fin))?></p>
						
					</div>
					<!-- </a> -->
				</div>
			
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalComment">
                    Laisser un commentaire
                </button>

                <!-- Modal -->
                <div class="modal fade" id="ModalComment" tabindex="-1"  aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered ">
                        <div class="modal-content">
                            <form action="?controller=commentaire&action=commentaire_add" method="POST">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Je laisse un commentaire</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body ">
                                    <div class="d-flex justify-content-around">
                                        <div>
                                            <label for="date-debut" class="form-label">Note moto</label>
                                            <input type="text" class="form-control" id="note_moto" name="note_moto">
                                        </div>
                                        <div>
                                            <label for="date-debut" class="form-label">Commentaire Moto</label>
                                            <input type="text" class="form-control" id="texte_moto" name="texte_moto">
                                        </div>
                                        <div>
                                            <label for="date-debut" class="form-label">Note proprietaire</label>
                                            <input type="text" class="form-control" id="note_proprio" name="note_proprio">
                                        </div>
                                        <div>
                                            <label for="date-debut" class="form-label">Commentaire Propriétaire</label>
                                            <input type="text" class="form-control" id="texte_proprio" name="texte_proprio">
                                        </div>
                                        <div>
                                            <input type="hidden" class="form-control" id="reservation_id" name="reservation_id" value="<?= $reservation->reservation_id?>">
                                        </div>

                                    </div>
                                    <div style="overflow:hidden;">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                        <button type="submit" class="btn btn-primary">Laisser mon commentaire !</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Fin de la Modal -->                   
		</div>
<?php endforeach;?> 

 

  </div>
</div>
</section>





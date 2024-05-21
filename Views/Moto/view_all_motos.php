<?php
// var_dump($motos)
?>

  
<section id="gallery">
  <div class="container">
    <div class="row">

<?php foreach($motos as $moto): ?>
	<!-- <?php var_dump($moto); ?> -->

		<div class="col-12 col-sm-5 col-md-6 col-lg-3 mb-4">
			<div class="card">
				<a href="?controller=moto&action=moto_show&moto_id=<?= $moto->moto_id ?>">
					<img src="./Public/img/moto/<?= $moto->moto_image_name ?>" alt="" class="card-img-top">
					<div class="card-body">
						<div class="d-flex justify-content-between align-items-center">
						<h5 class="card-title"><?= $moto->marque_libelle?> <?= $moto->modele_libelle?></h5>
						<?php
							if($moto->is_favori == 0) {
							echo '
							<a href="?controller=moto&action=favori&moto_id='. $moto->moto_id .'" class="btn btn-outline-danger btn-sm "><i class="fa-regular fa-heart"></i></a>
							';
							} 
						
							elseif($moto->is_favori == 1) {
							echo '
							<a href="?controller=moto&action=unfavori&moto_id='. $moto->moto_id .'" class="btn btn-outline-secondary btn-sm"><i class="fa-solid fa-check"></i></a>

								';
							}
						
						?>

						</div>
						<p class="card-text"><i class="fa-solid fa-star" style="color: orange;"></i> 
                           <?= $moto->moyenne_notes[0]->moyenne ?> /5 ( <?= $moto->nbr_notes[0]->nbr_notes ?>)</p>

						<div class="d-flex justify-content-between align-items-end">
							<div>
								<p class="card-text">
									<i class="fa-solid fa-location-dot"></i>
									<?php echo !empty($moto->ville_moto) ? $moto->ville_moto : $moto->ville; ?>
								</p>
							</div>
							<div class="fs-5">
								<strong><?= $moto->prix_jour ?>€</strong> /jour
							</div>
						</div>
						
						<?php if (isset($_SESSION['email']) && $_SESSION['roles'] == 'admin') : ?>
						<form action="?controller=moto&action=moto_update" method="POST">
                              <input type="hidden" name="moto_id" id="moto_id" value="<?= $moto->moto_id ?>">
                              <button type="submit" class="btn btn-outline-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i></button>
                        </form>
						<?php endif; ?>
					</div>
					</a>
				</div>
			

		</div>
<?php endforeach;?> 

 

  </div>
</div>
</section>





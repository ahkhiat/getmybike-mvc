<?php

// var_dump($motos)
?>

<section id="motos_favorites">
  <div class="container">
    <div class="row">
        <h1>Motos favorites</h1>

<?php foreach($motos as $moto): ?>
	<!-- <?php var_dump($moto); ?> -->

		<div class="col-lg-3 col-md-3 col-sm-5 mb-4">
			<div class="card">
				<a href="?controller=moto&action=moto_show&moto_id=<?= $moto->moto_id ?>">
					<img src="./Public/img/moto/<?= $moto->moto_image_name ?>" alt="" class="card-img-top">
					<div class="card-body">
						<h5 class="card-title"><?= $moto->modele_libelle?></h5>
						<p class="card-text">
							<i class="fa-solid fa-location-dot"></i>
							<?php echo isset($moto->ville_moto) ? $moto->ville_moto : $moto->ville; ?>
						</p>
					<a href="" class="btn btn-outline-success btn-sm">Réserver</a>
					</div>
					</a>
				</div>
			

		</div>
<?php endforeach;?> 

 

  </div>
</div>
</section>
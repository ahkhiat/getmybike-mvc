<?php
// var_dump($motos)
?>
<!-- <div class="d-flex flex-row">

	<div class="colonne-gauche col-12  col-sm-12 col-md-9 col-lg-4">
		<?php foreach($motos as $moto): ?>
			<div class="card mb-3 col-12  col-sm-12 col-md-12 col-lg-12">
				<div class="row no-gutters" >
					<div class="col-md-5 " >
						 <img src={{ '/images/moto/' ~ moto.imageName }} class="card-img-top img-fluid img-thumbnail" alt="..." style="height: 25vh;"> -->
					<!-- </div>
					<div class="col-md-7">
						<div class="card-body d-flex flex-column justify-content-between">
							<div class="d-flex flex-row justify-content-between">
								<h5 class="card-title"> <?= $moto->modele_libelle?> </h5>
								
								<a href="{{ path('app_moto_fiche', {'id': moto.id}) }}">
									<button type="button" class="btn btn-outline-secondary stretched-link " data-bs-toggle="modal" data-bs-target="#ficheMoto{{ moto.id }}">
										<i class="fa-solid fa-list"></i>
									</button>
								</a>
							</div >

							<div class=" d-flex">
								<div class="d-flex flex-column  justify-content-around align-items-center">
									<i class="fa-solid fa-star" style="color: orange;"></i>
									<i class="fa-solid fa-location-dot"></i>
								</div>
								<div class="d-flex flex-column  justify-content-around ps-1 ">
									<p class="card-text small text-muted mb-1 "> {{ moto.average|number_format(2, '.', ',') }}/5 ({{ moto.nombrenotes }})</p>
									<p class="card-text small text-muted mb-0 ">
									{% if moto.villemoto %}
										{{moto.villemoto}}
									{% else %} 
										{{ moto.proprietaire.user.ville }}
									{% endif %}
									</p>
								</div>
								
							</div>

							<div class="card-body text-dark d-flex flex-column align-self-end justify-self-end">
								<h4 class="card-title"><?= $moto->prix_jour?> €</h4>
								<p class="card-text">par jour</p>
							</div>

						</div>
					</div>
				</div>
			</div>
        <?php endforeach;?>
    </div>

	

</div>
	 -->

<!-- <?php foreach($motos as $moto): ?>
<div id="container-cards">
    <div id="container-moto">	
        <div class="product-details">
            <h2><?= $moto->modele_libelle?></h2>
            <span class="hint-star star">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
            </span>
            <p class="information">
                
            <?php
                echo isset($moto->ville_moto) ? $moto->ville_moto : $moto->ville;
            ?>

            </p>
            <div class="control">
                <button class="btn-price">
                    <span class="price"><?= $moto->prix_jour ?> €</span>
                    <span class="shopping-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                    <span class="buy">Réserver</span>
                </button>
            </div>
        </div>
        
        <div class="product-image">
            <img src="https://images.unsplash.com/photo-1606830733744-0ad778449672?ixid=MXwxMjA3fDB8MHxzZWFyY2h8Mzl8fGNocmlzdG1hcyUyMHRyZWV8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
            <div class="info">
                <h2> Description</h2>
                <ul>
                    <li><strong>Cylindrée : </strong><?= $moto->cylindree ?> cm3</li>
                    <li><strong>Poids : </strong><?= $moto->poids ?> kgs</li>
                    <li><strong>Puissance : </strong><?= $moto->puissance ?> ch</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php endforeach;?> -->

	
  
<section id="gallery">
  <div class="container">
    <div class="row">

<?php foreach($motos as $moto): ?>
	<!-- <?php var_dump($moto); ?> -->

		<div class="col-lg-3 col-md-3 col-sm-5 mb-4">
			<div class="card">
				<a href="?controller=moto&action=moto_show&moto_id=<?= $moto->moto_id ?>">
					<img src="./Public/img/moto/<?= $moto->moto_image_name ?>" alt="" class="card-img-top">
					<div class="card-body">
						<div class="d-flex justify-content-between align-items-center">
						<h5 class="card-title"><?= $moto->modele_libelle?></h5>
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
						<p class="card-text">
							<i class="fa-solid fa-location-dot"></i>
							<?php echo isset($moto->ville_moto) ? $moto->ville_moto : $moto->ville; ?>
						</p>
						
					</div>
					</a>
				</div>
			

		</div>
<?php endforeach;?> 

 

  </div>
</div>
</section>





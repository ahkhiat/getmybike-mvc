<?php 
 //var_dump($user);
// var_dump($age);
// var_dump($user['user_info']);
// var_dump($user['games_info']);
// var_dump($isFollowing);
// var_dump($_GET)
// var_dump($moy_notes_user);
// var_dump($nbr_notes_user);
// var_dump($commentaires)
// var_dump($is_proprietaire);
?>

<div id="public_profile">


<div class="container mt-5">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-6 col-md-7 col-sm-9 col-11">
        <div class="card">
          <div class="card-body p-4">
            <div class="d-flex text-black">
              <div class="flex-shrink-0">
              <img src="Public/img/user/<?=$user[0]->image_name?>" alt="" title="<?=$user[0]->image_name?>" class="pp-user me-2">
              
              </div>
              <div class="flex-grow-1 ms-3">
                <div class="d-flex justify-content-between">
                <h5 class="mb-1"><?= $user[0]->prenom ?> <?= mb_substr($user[0]->nom, 0, 1) ?></h5>
                <div>
                  <?php               
                  if($is_proprietaire) {
                    echo "<span class='badge text-bg-secondary'>Proriétaire</span>";
                  }
                  ?>
                </div>

                </div>
                <p class="mb-2 pb-1" style="color: #2b2a2a;"><?= $age ?> ans</p>
                <p><i class="fa-solid fa-star" style="color: orange;"></i> <?= $moy_notes_user[0]->moyenne ?>  /5 (<?= $nbr_notes_user[0]->nbr_notes ?>)</p>

                <div class="d-flex justify-content-start rounded-3 p-2 mb-2"
                  style="background-color: #efefef;">
                 
                  <div>
                  
                    <p class="small text-muted mb-1">Motos</p>
                    <p class="mb-0"><?= $nbr_motos ?></p>
                  </div>
                  <div>
                    
                  </div>

                  
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="container">
  <div class="col-xl-6 col-md-7 col-sm-9 col-11 mx-auto">
  <p class="lead fw-normal mb-1">Evaluations</p>
    <div class="card p-3 d-flex flex-column justify-content-between">

    <?php foreach ($commentaires as $commentaire) : ?>
        <div class="card border-0 ">
          <!-- <?php var_dump($commentaire); ?> -->
            <div class="card-body">
                <div class="d-flex align-items-center ">
                    <a href="?controller=user&action=public_profile&id=<?= $commentaire->user_id ?>" class="text-decoration-none link-dark fw-bold position-relative">
                        <img src="Public/img/user/<?=$commentaire->image_name?>" alt="" title="<?=$commentaire->image_name?>" class="pp-commentaire me-2">
                        <h5 class="ms-3"><?= $commentaire->prenom ?> <?= $commentaire->nom ?></h5>
                    </a>
                </div>
                <p class="card-text"><?= $commentaire->texte_proprio ?></p>
                <!-- <p><i class="fa-solid fa-star" style="color: orange;"></i> <?= $commentaire->note_moto ?>/5</p>  -->
                <?php
                if ($commentaire->note_moto > 0) {
                    $etoiles = str_repeat('<i class="fa-solid fa-star" style="color: orange;"></i>', $commentaire->note_moto);
                    echo $etoiles;
                }
                ?>

            </div>
        </div>
    <?php endforeach ?>
    </div>
  </div>

</div>
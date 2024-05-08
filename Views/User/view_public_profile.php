<?php 
// var_dump($user);
var_dump($age);
// var_dump($user['user_info']);
// var_dump($user['games_info']);
// var_dump($isFollowing);
// var_dump($_GET)
// var_dump($moy_notes_user);
// var_dump($nbr_notes_user);
var_dump($commentaires)
?>




<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-md-9 col-lg-7 col-xl-5">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body p-4">
            <div class="d-flex text-black">
              <div class="flex-shrink-0">
              <img src="Public/img/user/<?=$user[0]->image_name?>" alt="" title="<?=$user[0]->image_name?>" class="pp-commentaire me-2">
                <span class="badge-online position-absolute p-1 '.($user->active ? 'bg-success' : 'bg-danger').' border border-light rounded-circle">
                    <span class="visually-hidden">New alerts</span>
                </span>
                
              </div>
              <div class="flex-grow-1 ms-3">
                <h5 class="mb-1"><?= $user[0]->prenom ?> <?= mb_substr($user[0]->nom, 0, 1) ?></h5>
                <p class="mb-2 pb-1" style="color: #2b2a2a;"><?= $age ?> ans</p>
                <p><i class="fa-solid fa-star" style="color: orange;"></i> <?= $moy_notes_user[0]->moyenne ?>  /5 (<?= $nbr_notes_user[0]->nbr_notes ?>)</p>

                <div class="d-flex justify-content-start rounded-3 p-2 mb-2"
                  style="background-color: #efefef;">
                 
                  <div>
                  
                    <p class="small text-muted mb-1">Motos</p>
                    <p class="mb-0"><?= $nbr_motos ?></p>
                  </div>
                  <div class="px-3">
                    
                  </div>

                  
                </div>

                  <!-- <div class="d-flex pt-1">
                    <button type="button" class="btn btn-outline-primary me-1 flex-grow-1">Chat</button>
                    <button type="button" class="btn btn-primary flex-grow-1">Follow</button> 
                  </div>  -->

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> 

<?php foreach ($commentaires as $commentaire) : ?>
                                                <div class="card border-0 ">

                                                    <div class="card-body">
                                                        <div class="d-flex align-items-center ">
                                                            <!-- <img src="{{ vich_uploader_asset(commentaire.user, 'imageFile') }}" alt="{{ commentaire.user.imageName }}"
                                                        class="rounded-circle img-fluid" style="width: 70px;"> -->
                                                            <a href="?controller=user&action=public_profile&id=<?= $commentaire->user_id ?>" class="text-decoration-none link-dark fw-bold position-relative">
                                                                <img src="Public/img/user/<?=$commentaire->image_name?>" alt="" title="<?=$commentaire->image_name?>" class="pp-commentaire me-2">
                                                                <span class="badge-online position-absolute p-1 '.($user->active ? 'bg-success' : 'bg-danger').' border border-light rounded-circle">
                                                                    <span class="visually-hidden">New alerts</span>
                                                                </span>
                                                                <h5 class="ms-3"><?= $commentaire->prenom ?> <?= $commentaire->nom ?></h5>
                                                            </a>

                                                            <a href="{{ path('app_user_show_public', {'id': commentaire.user.id}) }}">
                                                                <!-- <h5 class="card-title ms-3"><?= $commentaire->prenom ?> <?= $commentaire->nom ?></h5> -->
                                                            </a>
                                                        </div>
                                                        <p class="card-text"><?= $commentaire->texte_moto ?></p>
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
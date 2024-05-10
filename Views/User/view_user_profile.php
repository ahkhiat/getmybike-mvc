<div id="profile_container">

  <?php
  // var_dump($user);
  // var_dump($proprietaire);
  // var_dump($is_proprietaire);
  // var_dump($motos);
  // var_dump($followers);
  // var_dump($followed);
  var_dump($_SESSION);
  // var_dump($moy_notes_user);
  // var_dump($nbr_motos);
  // var_dump($nbr_reservations);
  // var_dump($nbr_commentaires);
  // var_dump($commentaires);
  ?>




  <section>
    <div class="container py-5">

      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <!-- /* ----------------------------- image container ---------------------------- */ -->
              <form action="?controller=user&action=profile_picture" class="img-form" id="img_form"
                enctype="multipart/form-data" method="POST">
                <div class="upload">
                  <img src="Public/img/user/<?= $user[0]->image_name ?>" width=125 height=125 alt=""
                    title="<?= $user[0]->image_name ?>">

                  <div class="round">
                    <input type="hidden" name="user_id" value="<?= $user[0]->user_id ?>">
                    <input type="hidden" name="nom" value="<?= $user[0]->nom ?>">
                    <input type="file" name="img_input" id="img_input" accept="image/*" capture="camera">
                    <i class="fa fa-camera" style="color: #fff"></i>
                  </div>
                </div>
              </form>

              <h5 class="my-3"><?= $user[0]->prenom ?> <?= $user[0]->nom ?></h5>
              <p class="text-muted mb-1">
                <?php
                if (isset($_SESSION['email']) && $_SESSION['roles'] == 'admin') {
                  echo 'Administrateur';
                }
                ?>
              </p>
              <?php
              if (isset($proprietaire) && !empty($proprietaire)) {
                echo "<span class='badge text-bg-secondary'>Proriétaire</span>";
              }
              ?>
              <p class="card-text small text-muted mb-3 mt-3">
                <i class="fa-solid fa-star" style="color: orange;"></i>
                <?= $moy_notes_user[0]->moyenne ?> /5 (<?= $nbr_notes_user[0]->nbr_notes ?>)
              </p>
            </div>
          </div>
          <div class="card mb-4 mb-lg-0">
            <div class="card-body p-0">
              <ul class="list-group list-group-flush rounded-3">
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  Membre depuis le : <p class="text-muted mb-0"><?= date('d m Y', strtotime($user[0]->created_at)) ?>
                  </p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  Nombre de motos : <p class="text-muted mb-0"><?= $nbr_motos ?></p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  Nombre de reservations reçues : <p class="text-muted mb-0"><?= $nbr_reservations ?></p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  Nombre de commentaires reçus : <p class="text-muted mb-0"><?= $nbr_commentaires ?></p>
                </li>


              </ul>
            </div>
            <div class="d-flex justify-content-center mb-2">
              <a href="{{ path('app_user_edit', {'id': user.id}) }}"><button type="button"
                  class="btn btn-outline-warning">Modifier</button></a>
            </div>
          </div>



        </div>

        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Nom</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $user[0]->nom ?></p>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Prénom</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $user[0]->prenom ?></p>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $user[0]->email ?></p>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Date de naissance</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $user[0]->date_naissance ?></p>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Téléphone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $user[0]->telephone ?></p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Addresse</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $user[0]->adresse ?> <?= $user[0]->code_postal ?>
                    <?= $user[0]->ville ?>
                  </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Bio</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0"><?= $user[0]->bio ?></p>
                </div>
              </div>


            </div>
          </div>


          <!-- /* ----------------------------- container motos ---------------------------- */ -->
          <div class="row">
          <p class="lead fw-normal mb-1">Motos</p>

            <div class="col-md-12">
              <div class="card mb-4 mb-md-0">
                <div class="card-body">

                  <?php if ($is_proprietaire): ?>
                    <a href="?controller=moto&action=moto_add"><button type="btn" class="btn btn-primary">Ajouter une
                        moto</button></a>
                  <?php else: ?>
                    <a href="?controller=user&action=set_proprietaire"><button type="btn" class="btn btn-primary">Créer
                        une fiche propriétaire</button></a>
                  <?php endif; ?>

                  <p class="mb-4"><span class="font-italic me-1 fw-bold">
                      <?php
                      if ($nbr_motos == 1) {
                        echo 'Ma moto';
                      } else {
                        echo 'Mes motos';
                      }
                      ?>

                    </span></p>
                  <div class="d-flex">
                    <?php foreach ($motos as $moto): ?>
                      <!-- <?php var_dump($moto) ?> -->
                      <div class="card ms-1 me-1" style="width: 18rem;">
                        
                        <div class="card-body">
                          <h5 class="card-title"><?= $moto->marque_libelle ?>   <?= $moto->modele_libelle ?></h5>
                          <p class="card-text"><i class="fa-solid fa-star" style="color: orange;"></i> 
                           <?= $moto->moyenne_notes ?> /5 ( <?= $moto->nbr_notes ?>)</p>
                          <div class="d-flex justify-content-between">
                            <a href="?controller=moto&action=moto_show&moto_id=<?= $moto->moto_id ?>"
                              class="btn btn-outline-warning btn-sm">Fiche moto</a>
                            <a href="{{ path('app_moto_edit', {'id': moto.id}) }}"
                              class="btn btn-outline-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                          </div>
                        </div>
                      </div>
                    <?php endforeach; ?>
                  </div>

                </div>
              </div>
            </div>
          </div>

          <!-- /* -------------------------- Section commentaires -------------------------- */ -->
          <!-- <div class="row">

            <div class="col-md-12">
              <div class="card mb-4 mb-md-0">
                <div class="card-body">
                  <div class="d-flex">
                    <?php foreach ($commentaires as $commentaire): ?>
                      <div class="card border-0 ">
                        <div class="card-body">
                          <div class="d-flex align-items-center ">
                            <a href="?controller=user&action=public_profile&id=<?= $commentaire->user_id ?>"
                              class="text-decoration-none link-dark fw-bold position-relative">
                              <img src="Public/img/user/<?= $commentaire->image_name ?>" alt=""
                                title="<?= $commentaire->image_name ?>" class="pp-commentaire me-2">
                              <h5 class="ms-3"><?= $commentaire->prenom ?>   <?= $commentaire->nom ?></h5>
                            </a>
                          </div>
                          <p class="card-text"><?= $commentaire->texte_proprio ?></p>
                         <p><i class="fa-solid fa-star" style="color: orange;"></i> <?= $commentaire->note_moto ?>/5</p>  
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
            </div>
          </div> -->


          <div class="mb-5 ">
            <p class="lead fw-normal mb-1">Evaluations</p>
            <div class="p-4 border border-solid  border-2 rounded d-flex flex-column justify-content-between">

              <?php foreach ($commentaires as $commentaire): ?>
                <div class="card border-0 ">
                  <?php
                  // var_dump($commentaire); ?>
                  <div class="card-body">

                    <a href="?controller=user&action=public_profile&id=<?= $commentaire->user_id ?>"
                      class="text-decoration-none link-dark fw-bold position-relative">
                      <div class="d-flex align-items-center ">
                        <img src="Public/img/user/<?= $commentaire->image_name ?>" alt=""
                          title="<?= $commentaire->image_name ?>" class="pp-commentaire me-2">
                        <h5 class="ms-3"><?= $commentaire->prenom ?>   <?= $commentaire->nom ?></h5>
                      </div>
                    </a>

                    <p class="card-text"><?= $commentaire->texte_moto ?></p>
                    <div class="d-flex justify-content-between">
                      <div>
                        <?php
                        if ($commentaire->note_moto > 0) {
                          $etoiles = str_repeat('<i class="fa-solid fa-star" style="color: orange;"></i>', $commentaire->note_moto);
                          echo $etoiles;
                        }
                        ?>
                      </div>
                      <em><?= date('d m Y', strtotime($commentaire->created_at)) ?></em>

                    </div>

                    <p>
                    </p>
                    <hr>
                  </div>
                </div>
              <?php endforeach ?>

            </div>
          </div>




        </div>
      </div>
    </div>
  </section>

</div>
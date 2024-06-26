<?php
// var_dump($moto);
// var_dump($commentaires);
// var_dump($moy_notes);
// var_dump($nbr_notes);
// var_dump($moy_notes_user);
// var_dump($nbr_notes_user);
// var_dump($is_favori);
// var_dump($reservations);

?>
<div id="moto_show_container">
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-md-12 col-lg-11 col-xl-9">
            <img src="./Public/img/moto/<?= $moto[0]->moto_image_name ?>" alt="Moto à louer, postée par un utilisateur, de marque <?= $moto[0]->marque_libelle?> et de modèle <?= $moto[0]->modele_libelle?>, de <?= $moto[0]->annee?> " class="card-img-show mt-4 mb-2">
                <div class="card border-0">
                    <div class="card-body p-md-4 ">
                        <div class="p-md-3 d-flex flex-xl-row flex-column justify-content-between">
                            <!-- ----------------------------- image et titre ----------------------------- -->
                            <div class="col-12 col-xl-9 rounded d-flex flex-column">
                                <div class="p-2">
                                        <h2><?= $moto[0]->marque_libelle ?> <?= $moto[0]->modele_libelle ?> </h2>
                                        <p class="card-text small text-muted mb-0 "><i class="fa-solid fa-star" style="color: orange;"></i> <?= $moy_notes[0]->moyenne ?> /5 (<?= $nbr_notes[0]->nbr_notes ?>)</p>
                                        <?php
                                            if($is_favori == 0) {echo '<a href="?controller=moto&action=favori&moto_id='. $moto[0]->moto_id .'" class="btn btn-danger btn-sm mt-3"><i class="fa-regular fa-heart"> Ajouter aux favoris</i></a>';} 
                                            elseif($is_favori == 1) {echo '<a href="?controller=moto&action=unfavori&moto_id='. $moto[0]->moto_id .'" class="btn btn-outline-danger btn-sm mt-3"><i class="fa-solid fa-check"></i></a>';}
                                        ?>
                                </div>
                            </div>
                            <!-- ------------------------- prix et bouton reserver ------------------------ -->
                            <div class="col-6 col-sm-5 col-md-4 col-xl-3 border border-solid border-2 border-black rounded p-2 d-grid text-center align-self-end align-self-xl-start ms-xl-3 mt-5">
                                <p class="mb-1 h3"><?= $moto[0]->prix_jour ?> €</p>
                                <p class="small text-muted mb-0">/ par jour</p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalDates">
                                    Reserver
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="ModalDates" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered ">
                                        <div class="modal-content">
                                            <form action="?controller=reservation&action=prereserver" method="POST">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Je veux reserver cette moto</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body ">
                                                    <div class="col-md-6 col-xl-6  d-flex flex-column mx-auto">
                                                        <div>
                                                            <label for="date-debut" class="form-label">Date début</label>
                                                            <input type="date" class="form-control" id="date_debut" name="date_debut">
                                                        </div>
                                                        <div>
                                                            <label for="date_fin" class="form-label">Date fin</label>
                                                            <input type="date" class="form-control" id="date_fin" name="date_fin">
                                                            <input type="hidden" class="form-control" id="moto_id" name="moto_id" value="<?= $moto[0]->moto_id?>">
                                                            <input type="hidden" class="form-control" id="prix_jour" name="prix_jour" value="<?= $moto[0]->prix_jour?>">
                                                        </div>
                                                        

                                                    </div>
                                                    <div style="overflow:hidden;">

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                                        <button type="submit" class="btn btn-primary">Confirmer</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Fin de la Modal -->

                                </div>
                                <!-- fin de la div Prix -->
                            </div>
                        </div>
                        <div class="text-black">
                            <div class="mb-5 col-xl-9 mt-5">
                                <p class="lead fw-normal mb-1"></p>
                                <div class="p-3 border border-solid border-2 rounded d-flex flex-row  justify-content-between">
                                    <div class="d-flex flex-row  p-3">
                                        <i class="fa-regular fa-handshake fa-2x"></i>
                                    </div>
                                    <div>
                                        <p class="font-italic mb-1 ms-3 fw-bold">Sur rendez-vous</p>
                                        <p class="font-italic mb-1 ms-3">Après avoir accepté votre demande de réservation, le propriétaire vous remettra les clés en main propre au début de la location.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-5 col-xl-9">
                                <p class="lead fw-normal mb-1">Adresse de départ et de retour</p>
                                <div class="p-4 border border-solid border-2 rounded d-flex flex-md-row flex-column justify-content-between">
                                    <div class="d-flex flex-row ">
                                        <i class="fa fa-map-marker fa-2x"></i>
                                        <!-- <p class="font-italic mb-1 ms-3"><?= (isset($moto[0]->ville_moto)) ? $moto[0]->ville_moto : $moto[0]->ville ?></p> -->
                                        <?php echo !empty($moto[0]->ville_moto) ? $moto[0]->ville_moto : $moto[0]->ville; ?>

                                    </div>
                                    <div class="mapouter col-4">
                                        <div class="gmap_canvas"><iframe id="gmap_canvas" src="https://maps.google.com/maps?q=<?= (!empty($moto[0]->ville_moto)) ? $moto[0]->ville_moto : $moto[0]->ville ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org"></a><br>
                                            <style>
                                                .mapouter {
                                                    position: relative;
                                                    text-align: right;
                                                    height: 200px;
                                                    width: 270px;
                                                }
                                            </style><a href="https://www.embedgooglemap.net"></a>
                                            <style>
                                                .gmap_canvas {
                                                    overflow: hidden;
                                                    background: none !important;
                                                    height: 200px;
                                                    width: 270px;
                                                }
                                            </style>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="mb-5 col-xl-9">
                                <p class="lead fw-normal mb-1">Propriétaire</p>
                                <div class="p-4 border border-solid border-2 rounded d-flex flex-row">
                                    <div>
                                        <img src="./Public/img/user/<?= $moto[0]->image_name ?>" alt="profile picture" class="rounded-circle img-fluid" style="width: 70px;">
                                    </div>
                                    <div class="d-flex flex-column ms-3">
                                        <a href="?controller=user&action=public_profile&id=<?= $moto[0]->user_id ?>&moto_id=<?= $moto[0]->moto_id ?>">
                                            <p class="font-italic mb-1 h5"><?= $moto[0]->prenom ?> <?= mb_substr($moto[0]->nom, 0, 1) ?>.</p>
                                        </a>
                                        <p><i class="fa-solid fa-star" style="color: orange;"></i> <?= $moy_notes_user[0]->moyenne ?>  /5 (<?= $nbr_notes_user[0]->nbr_notes ?>)</p>
                                        <p></p>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-5 col-xl-9">
                                <p class="lead fw-normal mb-1">Description du véhicule</p>
                                <div class="p-4 border border-solid border-2 rounded">
                                    <p class="font-italic mb-1"><?= $moto[0]->description ?></p>
                                </div>
                            </div>

                            <div class="mb-5 col-xl-9 ">
                                <p class="lead fw-normal mb-1">Caractéristiques techniques</p>
                                <div class="p-4 border border-solid  border-2 rounded d-flex flex-column flex-md-row  justify-content-between">
                                    <div class="p-3 border border-solid border-1 rounded border-dark"><strong>Cylindrée : <?= $moto[0]->cylindree ?> cm3</strong></div>
                                    <div class="p-3 border border-solid border-1 rounded border-dark mt-3 mt-md-0"><strong>Poids : <?= $moto[0]->poids ?> kg</strong></div>
                                    <div class="p-3 border border-solid border-1 rounded border-dark mt-3 mt-md-0"><strong>Puissance : <?= $moto[0]->puissance ?> ch</strong></div>
                                </div>
                            </div>
                            <div class="mb-5 col-xl-9">
                                <p class="lead fw-normal mb-1">Evaluations</p>
                                <div class="p-4 border border-solid  border-2 rounded d-flex flex-column justify-content-between">
                                    <?php foreach ($commentaires as $commentaire) : ?>
                                        <div class="card border-0 ">
                                        <?php
                                            // var_dump($commentaire); ?>
                                            <div class="card-body">
                                                    <a href="?controller=user&action=public_profile&id=<?= $commentaire->user_id ?>" class="text-decoration-none link-dark fw-bold position-relative">
                                                        <div class="d-flex align-items-center ">
                                                            <img src="Public/img/user/<?=$commentaire->image_name?>" alt="" title="<?=$commentaire->image_name?>" class="pp-commentaire me-2">
                                                            <h5 class="ms-3"><?= $commentaire->prenom ?> <?= $commentaire->nom ?></h5>
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
                            <div class="mb-5 col-xl-9">
                                <p class="lead fw-normal mb-1">Disponibilités</p>
                                <div class="p-4 border border-solid  border-2 rounded d-flex flex-md-row flex-column">
                                <div class="calendrier1 mb-3 me-3">
                                    <h2><?= $mois_du_jour ?> <?= $annee_du_jour ?></h2>
                                    <table>
                                        <thead>
                                        <tr>
                                            <th>Lun</th>
                                            <th>Mar</th>
                                            <th>Mer</th>
                                            <th>Jeu</th>
                                            <th>Ven</th>
                                            <th>Sam</th>
                                            <th>Dim</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            while ($mois_actuel <= $fin_mois_actuel) {
                                                echo "<tr>";

                                                for ($jour_semaine = 1; $jour_semaine <= 7; $jour_semaine++) {
                                                echo "<td";
                                                if (in_array($mois_actuel->format('Y-m-d'), $jours_reserves)) {
                                                    echo " class='jour-reserve'";
                                                }
                                                echo ">" . $mois_actuel->format('j') . "</td>";

                                                $mois_actuel->modify('+1 day');
                                                }
                                                echo "</tr>";
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                    </div>
                                    <div class="calendrier2">
                                    <h2><?= $mois_du_jour_suivant ?> <?= $annee_du_jour_suivante ?></h2>

                                    <table>
                                        <thead>

                                        <tr>
                                            <th>Lun</th>
                                            <th>Mar</th>
                                            <th>Mer</th>
                                            <th>Jeu</th>
                                            <th>Ven</th>
                                            <th>Sam</th>
                                            <th>Dim</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            while ($mois_suivant <= $fin_mois_suivant) {
                                                echo "<tr>";

                                                for ($jour_semaine = 1; $jour_semaine <= 7; $jour_semaine++) {
                                                echo "<td";
                                                if (in_array($mois_suivant->format('Y-m-d'), $jours_reserves)) {
                                                    echo " class='jour-reserve'";
                                                }
                                                echo ">" . $mois_suivant->format('j') . "</td>";

                                                $mois_suivant->modify('+1 day');
                                                }
                                                echo "</tr>";
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


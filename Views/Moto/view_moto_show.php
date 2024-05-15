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
<!-- <div class="modal-dialog modal-xl">
    <div class="modal-content">

        <div class="modal-body"> -->

            <div class="container">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col col-md-12 col-lg-11 col-xl-9 ">
                        <div class="card border-0">

                            <div class="card-body p-md-4 ">

                                <div class="p-md-3 d-flex flex-xl-row flex-column justify-content-between">

                                    <!-- ----------------------------- image et titre ----------------------------- -->
                                    <div class="col-xl-9 col-12 rounded d-flex flex-column">
                                        <div class="">
                                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                                <img src="./Public/img/moto/<?= $moto[0]->moto_image_name ?>" alt="Generic placeholder image" class="img-fluid  mt-4 mb-2" style="width: 400px; z-index: 1">
                                            </div>

                                            <div class="card-body">
                                                <h2><?= $moto[0]->modele_libelle ?> </h2>
                                                <p class="card-text small text-muted mb-0 "><i class="fa-solid fa-star" style="color: orange;"></i> <?= $moy_notes[0]->moyenne ?> /5 (<?= $nbr_notes[0]->nbr_notes ?>)</p>

                                                <?php
                                                    if($is_favori == 0) {
                                                    echo '
                                                    <a href="?controller=moto&action=favori&moto_id='. $moto[0]->moto_id .'" class="btn btn-danger btn-sm mt-3"><i class="fa-regular fa-heart"> Ajouter aux favoris</i></a>
                                                    ';
                                                    } 
                                                
                                                    elseif($is_favori == 1) {
                                                    echo '
                                                    <a href="?controller=moto&action=unfavori&moto_id='. $moto[0]->moto_id .'" class="btn btn-outline-danger btn-sm mt-3"><i class="fa-solid fa-check"></i></a>

                                                        ';
                                                    }
                                                
                                                ?>


                                            </div>

                                        </div>

                                    </div>

                                    <!-- ------------------------- prix et bouton reserver ------------------------ -->
                                    <div class="col-xl-3 col-md-4 col-sm-5 col-6 border border-solid border-2 border-black rounded p-2 d-grid gap-2 h-25  text-center align-self-end align-self-xl-start ms-xl-3">
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
                                                            <div class="col-xl-6 col-md-6 d-flex flex-column mx-auto">
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

                                    <div class="mb-5 col-xl-9">
                                        <p class="lead fw-normal mb-1">Adresse de départ et de retour</p>
                                        <div class="p-4 border border-solid border-2 rounded d-flex flex-md-row flex-column justify-content-between">
                                            <div class="d-flex flex-row justify-content-between">
                                                <i class="fa fa-map-marker fa-2x"></i>
                                                <!--  <p class="font-italic mb-1 ms-3">{{ moto.proprietaire.user.adresse ~ " " ~ moto.proprietaire.user.codepostal ~ " " ~ moto.proprietaire.user.ville}}</p>  -->
                                                <p class="font-italic mb-1 ms-3"><?= (isset($moto[0]->ville_moto)) ? $moto[0]->ville_moto : $moto[0]->ville ?></p>
                                            </div>
                                            <div class="mapouter col-4">
                                                <div class="gmap_canvas"><iframe id="gmap_canvas" src="https://maps.google.com/maps?q=<?= (isset($moto[0]->ville_moto)) ? $moto[0]->ville_moto : $moto[0]->ville ?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://123movies-to.org"></a><br>
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

                                    <!-- <div class="mb-5 w-75">
                                    <p class="lead fw-normal mb-1">Options et accessoires</p>
                                    <div class="p-4 border border-solid  border-2 rounded d-flex justify-content-between" >
                                        {# BOUCLER POUR LES OPTIONS
                                            <div class="p-3 border border-solid border-1 rounded border-dark"><strong>Cylindrée : {{ moto.cylindree }} cm3</strong></div>
                                        #}
                                    </div>
                                </div> -->

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

        <!-- </div>
    </div>
</div> -->

</div>


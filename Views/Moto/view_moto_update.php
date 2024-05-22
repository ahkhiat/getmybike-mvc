<?php
var_dump($moto);
?>
<div id="moto_update_container">

    <div class="mx-auto col-11 col-sm-10 col-md-8 col-xl-6">
        <h1>Modifier une moto</h1>
        <form action="?controller=moto&action=moto_picture" class="img-form" id="img_form"
                enctype="multipart/form-data" method="POST">
            <div class="upload-moto">
                <img src="Public/img/moto/<?= $moto[0]->moto_image_name ?>" width=125 height=125 alt=""
                title="<?= $moto[0]->moto_image_name ?>">

                <div class="round">
                <input type="hidden" name="moto_id" value="<?= $moto[0]->moto_id ?>">
                <input type="hidden" name="nom" value="<?= $moto[0]->nom ?>">
                <input type="file" name="img_input" id="img_input" accept="image/*" capture="camera" >
                <i class="fa fa-camera" style="color: #fff"></i>
                </div>
                </div>
                <!-- <button type="submit" class="btn">Mettre à jour</button> -->
        </form>

        <form action="?controller=moto&action=moto_update_request" method="POST">
            <div class="row mt-5">
                <div class="mb-3 col-xl-6">
                    <label for="dispo">Disponibilité</label>
                    <input type="checkbox" id="dispo" name="dispo" <?php echo ($moto[0]->dispo == 1) ? 'checked' : ''; ?>>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-xl-6">
                    <label for="modele" class="form-label">Modèle</label>
                    <select class="form-select" name="modele_id" id="modele">
                        <option selected>Choix du modèle</option>
                        <?php  foreach($modeles as $p ): ?>
                        <option value="<?=$p->modele_id?>" <?php if($moto[0]->modele_id==$p->modele_id) echo 'selected'; ?>> <?= $p->marque_libelle?> <?php str_repeat('&nbsp;', 1) ?><?=$p->modele_libelle?></option>
                        <?php endforeach; ?>
                    </select>  
                </div>
                <div class="mb-3 col-xl-6">
                    <label for="annee" class="form-label">Année</label>
                    <input type="text" class="form-control" id="annee" name="annee" value="<?= $moto[0]->annee ?>" >
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-xl-6">
                    <label for="couleur" class="form-label">Couleur</label>
                    <input type="text" class="form-control" id="couleur" name="couleur" value="<?= $moto[0]->couleur ?>">
                </div>
                <div class="mb-3 col-xl-6">
                    <label for="cylindree" class="form-label">Cylindrée</label>
                    <input type="text" class="form-control" id="cylindree" name="cylindree" placeholder="ccm3" value="<?= $moto[0]->cylindree ?>">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-xl-6">
                    <label for="poids" class="form-label">Poids</label>
                    <input type="text" class="form-control" id="poids" name="poids" placeholder="kgs" value="<?= $moto[0]->poids ?>">
                </div>
                <div class="mb-3 col-xl-6">
                    <label for="puissance" class="form-label">Puissance</label>
                    <input type="text" class="form-control" id="puissance" name="puissance" placeholder="ch" value="<?= $moto[0]->puissance ?>">
                </div>
            </div>
            <div class="row ">
                <div class="mb-3 col-xl-6">
                    <label for="prix_jour" class="form-label">Prix par jour</label>
                    <input type="text" class="form-control" id="prix_jour" name="prix_jour" placeholder="€ / jour" value="<?= $moto[0]->prix_jour ?>">
                </div>
            
            </div>

            <div id="adresse_moto_container">
                <div class="row mb-3 col-xl-12">
                    <label for="adresse_moto" class="form-label">Adresse moto</label>
                    <input type="text" class="form-control" id="adresse_moto" name="adresse_moto" value="<?= $moto[0]->adresse_moto ?>">
                </div>      
                <div class="row">
                    <div class="mb-3 col-xl-6">
                        <label for="code_postal_moto" class="form-label">Code postal</label>
                        <input type="text" class="form-control" id="code_postal_moto" name="code_postal_moto" value="<?= $moto[0]->code_postal_moto ?>">
                    </div>
                    <div class="mb-3 col-xl-6">
                        <label for="ville_moto" class="form-label">Ville</label>
                        <input type="text" class="form-control" id="ville_moto" name="ville_moto" value="<?= $moto[0]->ville_moto ?>">
                    </div>
                </div> 

            </div>

            <div class="form-check form-switch  mt-3 mb-3">
                    <!-- <input class="form-check-input" type="checkbox" id="bagagerie" name="bagagerie" checked> -->
                <input type="checkbox" id="bagagerie" name="bagagerie" <?php echo ($moto[0]->bagagerie == 1) ? 'checked' : ''; ?>>
                <label class="form-check-label" for="bagagerie">Bagagerie (Avez-vous un topcase / des valises latérales)</label>

            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea  class="form-control" id="description" name="description" rows="4"><?= $moto[0]->description ?></textarea>
            </div>
            <input type="hidden" name="moto_id" value="<?= $moto[0]->moto_id ?>">
            <button type="submit" class="btn btn-primary mb-3">Valider</button>
        </form>

        <!-- /* ------------------------- formulaire pour delete ------------------------- */ -->
        <form action="?controller=moto&action=moto_delete" method="POST" id="moto_delete_form">
            <input type="hidden" name="moto_id" class="form-control" id="hide2" value=<?= $moto[0]->moto_id  ?> >
            <button type="submit" class="btn btn-danger  delete-button mb-3">Supprimer la moto</button>
        </form>

    </div>
</div>
<?php
var_dump($modeles);
?>
<div id="moto_add_container">

    <div class="mx-auto col-xl-6 col-md-8 col-sm-10 col-11">
        <h1>Ajouter une moto</h1>

        <form action="?controller=moto&action=moto_add_request" method="POST">
            <div class="row">
                <div class="mb-3 col-xl-6">
                    <label for="modele" class="form-label">Modèle</label>
                    <select class="form-select" name="modele_id" id="modele">
                        <option selected>Choix du modèle</option>
                        <?php  foreach($modeles as $p ): ?>
                        <option value="<?=$p->modele_id?>"> <?= $p->marque_libelle?> <?php str_repeat('&nbsp;', 1) ?><?=$p->modele_libelle?></option>
                        <?php endforeach; ?>
                    </select>  
                </div>
                <div class="mb-3 col-xl-6">
                    <label for="annee" class="form-label">Année</label>
                    <input type="text" class="form-control" id="annee" name="annee" >
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-xl-6">
                    <label for="couleur" class="form-label">Couleur</label>
                    <input type="text" class="form-control" id="couleur" name="couleur">
                </div>
                <div class="mb-3 col-xl-6">
                    <label for="cylindree" class="form-label">Cylindrée</label>
                    <input type="text" class="form-control" id="cylindree" name="cylindree" placeholder="ccm3">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-xl-6">
                    <label for="poids" class="form-label">Poids</label>
                    <input type="text" class="form-control" id="poids" name="poids" placeholder="kgs">
                </div>
                <div class="mb-3 col-xl-6">
                    <label for="puissance" class="form-label">Puissance</label>
                    <input type="text" class="form-control" id="puissance" name="puissance" placeholder="ch">
                </div>
            </div>
            <div class="row ">
                <div class="mb-3 col-xl-6">
                    <label for="prix_jour" class="form-label">Prix par jour</label>
                    <input type="text" class="form-control" id="prix_jour" name="prix_jour" placeholder="€ / jour">
                </div>
            </div>

            <div id="adresse_moto_container">
                <div class="row mb-3 col-xl-12">
                    <label for="adresse_moto" class="form-label">Adresse moto</label>
                    <input type="text" class="form-control" id="adresse_moto" name="adresse_moto">
                </div>      
                <div class="row">
                    <div class="mb-3 col-xl-6">
                        <label for="code_postal_moto" class="form-label">Code postal</label>
                        <input type="text" class="form-control" id="code_postal_moto" name="code_postal_moto">
                    </div>
                    <div class="mb-3 col-xl-6">
                        <label for="ville_moto" class="form-label">Ville</label>
                        <input type="text" class="form-control" id="ville_moto" name="ville_moto">
                    </div>
                </div> 

            </div>

            <div class="form-check form-switch  mt-3 mb-3">
                    <label class="form-check-label" for="bagagerie">Bagagerie (Avez-vous un topcase / des valises latérales)</label>
                    <input class="form-check-input" type="checkbox" id="bagagerie" name="bagagerie" checked>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea  class="form-control" id="description" name="description" rows="4"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>
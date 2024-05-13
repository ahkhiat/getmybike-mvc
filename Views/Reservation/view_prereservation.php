<?php
// var_dump($_POST['prix_jour']);
?>
<div id="form_preresa">

    <form action="?controller=reservation&action=reserver" method="POST">
        <div class="">
            <h1 class="text-center">Confirmez vos dates !</h1>
        </div>
        <div class=" ">
            <div class="col-xl-6 col-md-6 d-flex flex-column mx-auto">
                <div>
                    <label for="date-debut" class="form-label">Date début</label>
                    <input type="date" class="form-control" id="date_debut" name="date_debut" value="<?= $_POST['date_debut']?>">
                </div>
                <div>
                    <label for="date_fin" class="form-label">Date fin</label>
                    <input type="date" class="form-control" id="date_fin" name="date_fin" value="<?= $_POST['date_fin']?>">
                    <input type="hidden" class="form-control" id="moto_id" name="moto_id" value="<?= $_POST['moto_id'] ?>">
                    <input type="hidden" class="form-control" id="prix_jour" name="prix_jour" value="<?= $_POST['prix_jour'] ?>">

                </div>
                <div class="mt-5 align-self-end ">
                    <p class="fs-5">Nombre de jours souhaités : <strong><span id="nb_jours"></span></strong></p>
                </div>
                <div class="mt-2 align-self-end ">

                    <p class="fs-4">Prix prévisionnel : <strong><span id="prix_prev"></span></strong></p>
                </div>
                <button type="submit" class="btn btn-primary">Confirmer</button>

            </div>

            </div>
        
        </div>
    </form>

</div>
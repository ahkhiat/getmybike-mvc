<?php
// include('./Utils/header_admin.php');
// var_dump($ventes);
var_dump($produits);

include('./Utils/header_admin.php')
?>
<div class="table-responsive">
    
    <h2 class="text-center">Ventes mensuelles par produit</h2>

        <div class="w-50 mx-auto mt-5">
            <form action="?controller=admin&action=ventes_mois_produit_request" method="POST">
                <select class="form-select" aria-label="Default select example" name="choix_produit">
                    <option selected>Choix du produit</option>
                    <?php foreach ($produits as $f): ?>
                        <option value="<?= $f->id ?>"><?= $f->name ?></option>
                    <?php endforeach; ?>
                </select>
                

                <button type="submit" class="btn btn-primary mt-3">Submit</button>

            </form>
        </div>

    

        
    
</div>       
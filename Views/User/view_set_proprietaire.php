<?php
// var_dump($modeles);
?>
<div id="set_proprietaire_container">

    <div class="mx-auto col-xl-6 col-md-8 col-sm-10 col-11">
        <h1>Créer une fiche propriétaire</h1>


        <form action="?controller=user&action=set_proprietaire_request" method="POST">
        <div class="mb-3">
            <label for="iban" class="form-label">IBAN</label>
            <input type="text" class="form-control" id="iban" name="iban">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<div class="commentaire_add_container">
    <div class="mx-auto col-xl-6 col-md-8 col-sm-10 col-11">

    <form action="?controller=commentaire&action=commentaire_add_request" method="POST">
        <div class="card-header">
            <h1>Je laisse un commentaire</h1>
        </div>
        <div class="card-body ">
        <?php 
        // var_dump($reservation_id)
        ?> 

            <div class="mb-3 col-xl-6">
                <div>
                    <label for="date-debut" class="form-label">Note moto</label>
                    <input type="number" class="form-control" id="note_moto" name="note_moto">
                </div>
                <div>
                    <label for="date-debut" class="form-label">Commentaire Moto</label>
                    <input type="text" class="form-control" id="texte_moto" name="texte_moto">
                </div>
                <div>
                    <label for="date-debut" class="form-label">Note proprietaire</label>
                    <input type="number" class="form-control" id="note_proprio" name="note_proprio">
                </div>
                <div>
                    <label for="date-debut" class="form-label">Commentaire Propriétaire</label>
                    <input type="text" class="form-control" id="texte_proprio" name="texte_proprio">
                </div>
                <div>
                    <input type="hidden" class="form-control" id="reservation_id" name="reservation_id" value="<?= $reservation_id ?>">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Laisser mon commentaire !</button>
            </div>

           
        </div>
        <!-- /* ----------------------------- fin modal body ----------------------------- */ -->
    </form>
    </div>
</div>
<!-- /* ---------------------------- fin modal content --------------------------- */ -->

<?php


public function action_moto_show()
{
    $m=Moto::get_model();
    $mc=Commentaire::get_model();

    $moto_id = $_GET['moto_id'];

    $data=['moto'=>$m->get_moto_show($moto_id),
           'moy_notes'=>$mc->get_moy_notes_recues_moto($moto_id),
           'nbr_notes'=>$mc->get_nbr_notes_recues_moto($moto_id)]
}


document.addEventListener("DOMContentLoaded", () => {
    const motoContainer = document.querySelector("#moto_update_container");
    if(motoContainer) {
        /* --------------------------- Alert before delete -------------------------- */
        let deleteButton = document.querySelector(".delete-button");
        deleteButton.addEventListener("click", (event) => {
        event.preventDefault();
        if (confirm("Êtes-vous sûr de vouloir supprimer la moto ? Cette action est irréversible")) {
            deleteButton.closest('form').submit();
        } 
        })
    };
});

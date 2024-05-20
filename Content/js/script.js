console.log("script standard chargé");

document.addEventListener("DOMContentLoaded", () => {

  const profileContainer = document.getElementById("profile_container");

  const motoContainer = document.querySelector("#moto_update_container");


  /* ------------------------- upload profile picture ------------------------- */

  // The form is automatically sended when the pic is changed
  if(profileContainer) {
    document.querySelector("#img_input").onchange = function() {
    document.querySelector("#img_form").submit();
    }
  }


  if(motoContainer) {
    console.log('moto update')
    document.querySelector("#img_input").onchange = function() {
    document.querySelector("#img_form").submit();
    }

    /* --------------------------- Alert before delete -------------------------- */
    let deleteButton = document.querySelector(".delete-button");
        deleteButton.addEventListener("click", (event) => {
        event.preventDefault();
        if (confirm("Êtes-vous sûr de vouloir supprimer la moto ? Cette action est irréversible")) {
          deleteButton.closest('form').submit();
        } 
    })

  }
 
});





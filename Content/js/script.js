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
  }
 
});



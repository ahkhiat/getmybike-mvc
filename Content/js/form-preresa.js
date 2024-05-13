document.addEventListener("DOMContentLoaded", () => {
  
    const formContainer = document.querySelector("#form_preresa");
  
  
  
    if(formContainer) {
        console.log('form preresa');

        let dateDebutInput = document.querySelector('#date_debut');
        let dateFinInput = document.querySelector('#date_fin');
        let prixJour = document.querySelector('#prix_jour');
        let nbJours = document.querySelector('#nb_jours');

        let prixPrev = document.querySelector('#prix_prev');
     
        dateDebutInput.addEventListener('change', calculerDuree);
        dateFinInput.addEventListener('change', calculerDuree);

        function calculerDuree() {
            let dateDebut = new Date(dateDebutInput.value);
            let dateFin = new Date(dateFinInput.value);
        
            let differenceEnTemps = dateFin.getTime() - dateDebut.getTime();
            let differenceEnJours = differenceEnTemps / (1000 * 3600 * 24);
        
            console.log("Durée en jours : " + differenceEnJours);

            nbJours.innerHTML = differenceEnJours
            prixPrev.innerHTML = differenceEnJours * prixJour.value
        }

        calculerDuree()






      }
    }
  
  
   
  );
  
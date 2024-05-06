document.addEventListener("DOMContentLoaded", () => {

    let registrationContainer = document.getElementById("user_registration_container");

    if(registrationContainer)
    {
        // console.log('registration_form_verify loaded');
     

        /* ---------------------------- Targeting messages containers ---------------------------- */
        let groupForm = document.getElementById("registration-form");

        let input = groupForm.password;
        let caractere = document.querySelector(".caractere");
        let majuscule = document.querySelector(".majuscule");
        let minuscule = document.querySelector(".minuscule");
        let generique = document.querySelector(".generique");
        let chiffre = document.querySelector(".chiffre");


        const uppercaseRegex = /[A-Z]{1}/;
        const lowercaseRegex = /[a-z]{1}/;
        const specialCharRegex = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]{1}/;
        const numbers = /[0-9]{1}/g;
        
        /* ---------------------- Listening the password input ---------------------- */
        input.addEventListener("input", function(){
            validation(this);
        
            if(!this.value){
                remove();
            }
        }) 
        
        function validation(password){
            
            if(password.value.length >= 11){
                generique.classList.remove("error");
                generique.classList.add("succes");
            }
            else{
                generique.classList.add("error");
                generique.classList.remove("succes");
            }
        
            if(uppercaseRegex.test(password.value)){
                input.classList.remove("invalide");
                majuscule.classList.remove("error");
        
                input.classList.add("succes");
                majuscule.classList.add("succes")
            }
            else{
                input.classList.remove("succes");
                majuscule.classList.remove("succes");
        
                input.classList.add("invalide");
                majuscule.classList.add("error");
            }
        
            if(lowercaseRegex.test(password.value)){
                input.classList.remove("invalide");
                minuscule.classList.remove("error");
        
                input.classList.add("succes");
                minuscule.classList.add("succes")
            }
            else{
                input.classList.remove("succes");
                minuscule.classList.remove("succes");
        
                input.classList.add("invalide");
                minuscule.classList.add("error");
            }
            
            if(specialCharRegex.test(password.value)){
                input.classList.remove("invalide");
                caractere.classList.remove("error");
        
                input.classList.add("succes");
                caractere.classList.add("succes");
            }
            else{
                input.classList.remove("succes");
                caractere.classList.remove("succes");
        
                input.classList.add("invalide");
                caractere.classList.add("error");
            }

            if(numbers.test(password.value)){
                input.classList.remove("invalide");
                chiffre.classList.remove("error");
        
                input.classList.add("succes");
                chiffre.classList.add("succes");
            }
            else{
                input.classList.remove("succes");
                chiffre.classList.remove("succes");
        
                input.classList.add("invalide");
                chiffre.classList.add("error");
            }
        } 

        function remove(){
        
            input.classList.remove("invalide");
            input.classList.remove("succes");
        
            caractere.classList.remove("error");
            caractere.classList.remove("succes");
        
            majuscule.classList.remove("succes");
            majuscule.classList.remove("error");
        
            minuscule.classList.remove("succes");
            minuscule.classList.remove("error")
        
            generique.classList.remove("succes")
            generique.classList.remove("error");

            chiffre.classList.remove("succes")
            chiffre.classList.remove("error");

        } 
        
        // .......Hide and show password.................
        const passwordInput = document.getElementById('current-password');
        // const eyeIcon = document.querySelector('#button i');
        const btn=document.getElementById('button');
        btn.addEventListener('click', function() {
            passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';

            //......................Change eye icon-----------
            const eyeIcon = document.querySelector('#button i');
            eyeIcon.classList.toggle('fa-eye');
            eyeIcon.classList.toggle('fa-eye-slash');
        }); 

    } // End of registrationContainer

}); // End of DOMContainerLoaded
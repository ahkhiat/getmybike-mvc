document.addEventListener("DOMContentLoaded", () => {

    let loginContainer = document.getElementById("user_login_container");
  
    if(loginContainer)
    {
  
        // .......pouvoir voir ou cacher le mot de passe tapperdans le formulaire de connecxion.................
        // console.log('login_form_verify loaded');
  
        const inputPassword = document.getElementById('pswd');
        const toggleButton = document.getElementById('btn');
        const iconEye = document.querySelector('#btn i');
  
        toggleButton.addEventListener('click',function(){
  
            inputPassword.type =  inputPassword.type === 'password' ? 'text' : 'password';
  
              //........................Changer l'icône de l'œil
            const iconEye = document.querySelector('#btn i');
            iconEye.classList.toggle('fa-eye');
            iconEye.classList.toggle('fa-eye-slash');
            
        });
    }
  
  });
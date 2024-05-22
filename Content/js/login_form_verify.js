document.addEventListener("DOMContentLoaded", () => {

    let loginContainer = document.getElementById("user_login_container");
  
    if(loginContainer)
    {
        const inputPassword = document.querySelector('#pswd');
        const toggleButton = document.querySelector('#btn');
        const iconEye = document.querySelector('#btn i');
  
        toggleButton.addEventListener('click',function(){
  
              /* --------------- change the input type to show the password --------------- */
            inputPassword.type =  inputPassword.type === 'password' ? 'text' : 'password';

              /* --------------------------- change the eye icon -------------------------- */
            iconEye.classList.toggle('fa-eye');
            iconEye.classList.toggle('fa-eye-slash');
        });
    }
  });
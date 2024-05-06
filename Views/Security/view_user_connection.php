<div id="user_login_container">


  <div class="bg-white rounded-top mx-auto mt-5 col-xl-4 col-md-6 col-sm-8 col-11">
    <h2 class="text-center"> Se connecter</h2>
    <form id="login-form" action="?controller=security&action=login" method="POST">
      <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
        <input id="email" type="text" class="form-control" name="email" placeholder="Entrer votre email" required>
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa fa-lock"></i></span>
        <input type="password" id='pswd' class="form-control" name="password" placeholder="Entrer votre mot de passe" required>
        <button type="button" id="btn" class="btn btn-outline-secondary"><i class="fa fa-eye"></i></button>
      </div>
      <div class="col-md-6 col-sm-6 ">
        <button type="submit" name="submit_connection" class="btn btn-primary">Se connecter</button>
        <p>Pas de compte? <a href="?controller=security&action=user_registration">s'enregistrer</a>.</p>

      </div>

    </form>
  </div>

</div>
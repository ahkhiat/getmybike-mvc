<div id="user_login_container">
  <div class="mx-auto mt-5 col-11 col-sm-8 col-md-6 col-xl-4">
    <h1 class="text-center">Se connecter</h1>
    <form id="login-form" action="?controller=security&action=login" method="POST">
      <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
        <label for="email" class="sr-only">Email</label>
        <input id="email" type="email" class="form-control" name="email" placeholder="Entrer votre email" required>
      </div>
      <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa fa-lock"></i></span>
        <label for="pswd" class="sr-only">Mot de passe</label>
        <input type="password" id='pswd' class="form-control" name="password" placeholder="Entrer votre mot de passe" required>
        <button type="button" id="btn" class="btn btn-outline-secondary"><i class="fa fa-eye"></i></button>
      </div>
      <div class="col-sm-6 col-md-6">
        <button type="submit" name="submit_connection" class="btn btn-primary">Se connecter</button>
        <p>Pas de compte? <a href="?controller=security&action=user_registration">s'enregistrer</a>.</p>
      </div>
    </form>
  </div>
</div>
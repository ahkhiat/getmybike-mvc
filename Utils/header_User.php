<ul class="navbar-nav ms-5 me-auto mb-2 mb-lg-0">
  
  <!-- <?php // ---------------------Display dashboard if user is ADMIN --------------------
    if (isset($_SESSION['email']) && $_SESSION['roles'] == 'admin') 
      {
        echo
          '
                <li class="nav-item">
                  <a href="?controller=admin&action=dashboard_admin" class="nav-link text-secondary">Dashboard</a>
                </li>
                    ';
      }
  ?> -->
</ul>

<!--------------------------- User badge and dropdown menu ------------------------>
<ul class="navbar-nav me-2 mb-2 mb-lg-0 align-items-center">
  <li class="nav-item">

 <!-- ----------------------- Display if user is ADMIN ------------------------- -->
    <?php    
      if(isset($_SESSION["roles"]) && $_SESSION["roles"]=="admin")  
      {echo "<a class='nav-link text-danger' id='admin'><span class='btn btn-outline-secondary rounded-pill disabled'>Mode Admin</span></a>";}  
    ?>
  </li>
  <li class="nav-item dropdown ">
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">

      <?php
      $border_color = (isset($_SESSION['notifications']) && $_SESSION['notifications'] > 0) ? 'pp-navbar-rouge' : 'pp-navbar-grise';
      if(isset($_SESSION['image_name']))
      {
        echo '
        <img src="Public/img/user/'.$_SESSION["image_name"].'" width=125 height=125 alt="" title="'.$_SESSION["image_name"].'" class="'. $border_color .' position-relative">
        ';
      } else {
        echo '
        <div class="user-badge"><strong>'.strtoupper(substr($_SESSION["prenom"], 0, 1)).'</strong></div>
        ';
      }
      ?>
      
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
      <li><p class=" text-muted fs-6 ms-3"><?= $_SESSION['prenom']. str_repeat('&nbsp;', 1) .$_SESSION['nom']; ?></p></li>
      <li>
        <hr class="dropdown-divider">
      <li><a class="dropdown-item" href="?controller=user&action=user_profile">Profil</a></li>
      <li><a class="dropdown-item" href="?controller=moto&action=motos_favorites">Motos favorites</a></li>
      <li>
        <hr class="dropdown-divider">
      </li>
      <li><a class="dropdown-item" href="?controller=reservation&action=mes_reservations" >Mes réservation 
            <?php if(isset($_SESSION['notifications']) && $_SESSION['notifications'] > 0 ): ?>
              <span class="badge text-bg-danger">  
                <?= $_SESSION['notifications']?>
              </span>
            <?php endif; ?>
          </a>
      </li>

      <li><a class="dropdown-item" href="?controller=reservation&action=reservations_mes_motos" >Réservations de mes motos</a></li>
      <li>
        <hr class="dropdown-divider">
      </li>
      <li><a class="dropdown-item" href="?controller=security&action=disconnection">Deconnexion</a></li>
    </ul>
  </li>
</ul>
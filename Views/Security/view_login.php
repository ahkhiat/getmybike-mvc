<?php
    // session_start(); on la declare juste dans le header
  

// var_dump($identification[0]);
// var_dump($proprietaire);

    // $_SESSION['email']  = $identification[0]->email;
    // $_SESSION['lastname']  = $identification[0]->lastname;
    // $_SESSION['firstname']  = $identification[0]->firstname;
    // $_SESSION['birthdate']  = $identification[0]->birthdate;
    // $_SESSION['roles']  = $identification[0]->roles;
    // $_SESSION['id']  = $identification[0]->user_id;


    $_SESSION['email'] = $user->email;
    $_SESSION['nom'] = $user->nom;
    $_SESSION['prenom'] = $user->prenom;
    $_SESSION['roles'] = $user->roles;
    $_SESSION['id'] = $user->user_id;
    $_SESSION['date_naissance'] = $user->date_naissance;
    $_SESSION['image_name'] = $user->image_name;

    $_SESSION['prop_id'] = $proprietaire[0]->proprietaire_id;
// var_dump($user);

    
    ?>
<script>window.location.href="?controller=moto&action=all_motos"</script>
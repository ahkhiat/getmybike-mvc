<?php 
// var_dump($user);
// var_dump($user['user_info']);
// var_dump($user['games_info']);
// var_dump($isFollowing);
// var_dump($_GET)
?>
<div class="row gutters-sm">
  <div class="profile-image-container upload container mb-3 mt-3 col-xl-8 col-md-8 col-sm-8 col-10">
    <img src="Public/img/<?= $user['user_info'][0]->image_name ?>" width=125 height=125 alt="" title="<?= $user['user_info'][0]->image_name ?>">
      <span class="badge-online-public-profile position-absolute p-2 <?= $user['user_info'][0]->active ? 'bg-success' : 'bg-danger';?> border border-light rounded-circle">
      <span class="visually-hidden">New alerts</span>
      </span>
    <form action="" class="img-form" id="img_form" enctype="multipart/form-data" method="POST">
      <div class="upload">
      </div>
    </form>


  </div>
<hr>
  <div class="mx-auto  col-xl-8 col-md-8 col-sm-8 col-10 ps-4">
    <div class="fw-bold fs-3">
      <?= $user['user_info'][0]->firstname ?>
    </div>
    <div class="fw-light fs-6 text-muted">
      <?= $user['user_info'][0]->username ?>
    </div>
    <div class="fw-light fs-6 text-muted">
    Membre depuis <?= (new DateTime($user['user_info'][0]->created_at))->format("F Y") ?>
    </div>

    <!-- --------------number of followers and followed------------------ -->
    <div class="d-flex justify-content-start mt-2">
      <a href="?controller=user&action=all_followers&id= <?=$user['user_info'][0]->user_id?>" ><p class="text-primary fw-bold me-3"><?= $followers[0]->total_followers ?> abonnés </p></a>
      <a href="?controller=user&action=all_followed&id= <?=$user['user_info'][0]->user_id?>" ><p class="text-primary fw-bold"><?php echo $followed[0]->total_followed ?> abonnements</p></a>
    </div>
    <div>
      <!-- --------------follow & unfollow buttons------------------------ -->
      <?php
        if($isFollowing == 0) {
        echo '
        <form action="?controller=user&action=follow&id='.$user["user_info"][0]->user_id.'" method="POST">
        <input type="hidden" name="followed_id" value="'.$user["user_info"][0]->user_id .'">
        <button type="submit" class="btn btn-outline-primary border-2"><i class="fa-solid fa-user-plus" style="color: #4268ff;"></i></button>
      </form>
        ';
        } 
      
        elseif($isFollowing == 1) {
          echo '
            <form action="?controller=user&action=unfollow&id='.$user["user_info"][0]->user_id.'" method="POST">
            <input type="hidden" name="followed_id" value="'.$user["user_info"][0]->user_id .'">
            <button type="submit" class="btn btn-outline-secondary border-2"><i class="fa-solid fa-user-check"></i></button>
          </form>
            ';
        }
      
      ?>

    </div>
  </div>
  <div class="col-sm-9 text-secondary">
  </div>
</div>

<hr>
<div class="container d-flex flex-wrap col-xl-8 col-md-9 col-sm-10 col-12 gap-xl-5 gap-md-5 gap-sm-5 gap-2 mx-auto">
    <div class="card-profile col-xl-3 col-md-3 col-sm-5 col-5">
      <div class="card " >
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              <i class="fa-solid fa-bolt fa-xl" style="color: rgb(255, 174, 0);"></i>
            </div>
            <div class="col ">
              <h5 class="card-profile-title fs-4"><?= $user['games_info'][0]->total_points ?></h5>
              <p class="card-profile-text  fw-light text-muted">points gagnés</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card-profile col-xl-3 col-md-3 col-sm-5 col-5">
      <div class="card ">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              <i class="fa-solid fa-gamepad fa-xl" style="color: #74C0FC;"></i>          
            </div>
            <div class="col ">
              <h5 class="card-profile-title fs-4"><?= $user['games_info'][0]->total_games ?></h5>
              <p class="card-profile-text  fw-light text-muted">parties jouées</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card-profile col-xl-3 col-md-3 col-sm-5 col-5">
      <div class="card">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
            <i class="fa-solid fa-bullseye fa-xl me-2" style="color: rgb(38, 192, 18, 0.664);" ></i>            
            </div>
            <div class="col">
              <h5 class="card-profile-title fs-4"><?= $user['games_info'][0]->success_rate ?> %</h5>
              <p class="card-profile-text  fw-light text-muted">réussite moyenne</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<?php
include('./Utils/header_admin.php');
// var_dump($users);
?>
<div class="table-responsive">
    <table id='table' class="table w-75 mx-auto">
    <h2 class="text-center">Liste des utilisateurs</h2>

        <thead>
            <th>Nom d'utilisateur</th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>role</th>
        </thead>
        <?php  foreach($users as $u ): ?>
        <tr>
            <td> 
                <a href="?controller=user&action=public_profile&id=<?= $u->user_id ?>" class="text-decoration-none link-dark fw-bold position-relative">
                <img src="Public/img/<?= $u->image_name ?>"  alt="" title="<?= $u->image_name ?>" class="pp-leaderboard me-2"> 
                    <span class="badge-online position-absolute p-1 <?= $u->active ? 'bg-success' : 'bg-danger';?> border border-light rounded-circle">
                    <span class="visually-hidden">New alerts</span>
                    </span>
                <?= $u->username ?>
                </a>
            </td>
            <td><?=$u->firstname?></td>
            <td><?=$u->lastname?></td>
            <td><?=$u->email?></td>
            <td><?=$u->roles?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>       
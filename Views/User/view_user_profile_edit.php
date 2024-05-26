
<?php
// var_dump($user)
?>
<div class="container py-5">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="Public/img/<?= $_SESSION['image_name'] ?>" width=125 height=125 alt="" title="<?= $_SESSION['image_name'] ?>">
                            <div class="mt-3">
                                <h4><?= $_SESSION['firstname'] ?> <?= $_SESSION['lastname'] ?></h4>
                                
                            </div>
                        </div>
                        <hr class="my-4">
                     
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        
                        <form action="?controller=user&action=user_profile_edit_request" method="POST">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                <p class="mb-0">Nom</p>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" id="nom" value="<?= $user[0]->nom ?>" name="nom">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                <p class="mb-0">Prenom</p>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" id="" value="<?= $user[0]->prenom ?>" name="prenom">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="email" class="form-control" value="<?= $user[0]->email ?>" name="email">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                <p class="mb-0">Date de naissance</p>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="date" class="form-control" id="" value="<?= $user[0]->date_naissance ?>" name="date_naissance">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                <p class="mb-0">Adresse</p>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" id="" value="<?= $user[0]->adresse ?>" name="adresse">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                <p class="mb-0">Code postal</p>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" id="" value="<?= $user[0]->code_postal ?>" name="code_postal">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                <p class="mb-0">Ville</p>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" id="" value="<?= $user[0]->ville ?>" name="ville">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                <p class="mb-0">Telephone</p>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" class="form-control" id="" value="<?= $user[0]->telephone ?>" name="telephone">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                <p class="mb-0">Bio</p>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <!-- <input type="text" class="form-control" id="" value="<?= $user[0]->bio ?>" name="bio"> -->
                                    <textarea class="form-control" name="bio" id="bio" rows="4"><?= $user[0]->bio ?></textarea>
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="hidden" name="" id="" value="<?php echo $_SESSION['id'] ?>">
                                    <button type="submit" class="btn btn-primary px-4" value="Save Changes">Valider</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
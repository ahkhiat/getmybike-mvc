<?php
// var_dump($ca_jour);
?>
<div id="dashboard_container">
<!------------------------ Admin navbar --------------------->
<?php
include('./Utils/header_admin.php')
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Row 1 -->
    <div class="row mt-5">
        <h2>Aujourd'hui, le 
            <?php
                $date_du_jour = new DateTime();
                echo $date_du_jour->format('d m Y'); // Format: Jour_de_la_semaine Numéro_du_jour Mois Année
            ?>

        </h2>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow  py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Nombre de ventes ce jour :
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $nb_ventes_total ?></div>
                        </div>
                        <div class="col-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow  py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                C.A. genéré H.T.:
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ca_jour[0]->total_ht ?> €</div>
                        </div>
                        <div class="col-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow  py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                C.A. genéré T.T.C:
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ca_jour[0]->total_ttc ?> €</div>
                        </div>
                        <div class="col-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

    </div>

    <!-- Row 2 -->
    <div class="row">

       
   
    </div>


    <!-- Action Container -->
    <div class="row">
        
    <div class="table-responsive">
    
    <table id='table' class="table w-75 mx-auto">
    <h2>
        Ventes du jour
    </h2>

    <!-- <div class="badge-nom text-center text-success fw-bold mb-5"> <?php if(isset($_SESSION)){echo $_SESSION['prenom'].str_repeat('&nbsp;', 1).$_SESSION['nom'];}?></div> -->
                

        <thead>
            <th>Id</th>
            <th>Date</th>
            <th>Prix HT</th>
            <th>Prix TTC</th>
            <th>Client</th>
            <th>Personnel</th>
            
        </thead>
        <?php  foreach($ventes as $u ): ?>
        <tr>
            <td><?= $u->id ?></td>
            <td><?=$u->date?></td>
            <td><?=$u->prix_ht?></td>
            <td><?=$u->prix_ttc?></td>
            <td><?=$u->client_prenom?> <?=$u->client_nom?></td>
            <td><?=$u->user_prenom?> <?=$u->user_nom?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>       


        
    </div>




<!-- End Container fluid -->
</div>
</div>
    


    








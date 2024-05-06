<?php
// include('./Utils/header_admin.php');
// var_dump($ventes);
// var_dump($ventes);

include('./Utils/header_admin.php')
?>

<div class="histo">

</div>
<table class="table w-75 mx-auto table-striped-columns">
    <tr>
        <td><?php foreach($ventes as $vente) echo ($vente->mois == '01') ? $vente->total_prix_ht : '' ?></td>
        <td><?php foreach($ventes as $vente) echo ($vente->mois == '02') ? $vente->total_prix_ht : '' ?></td>
        <td><?php foreach($ventes as $vente) echo ($vente->mois == '03') ? $vente->total_prix_ht : '' ?></td>
        <td><?php foreach($ventes as $vente) echo ($vente->mois == '04') ? $vente->total_prix_ht : '' ?></td>
        <td><?php foreach($ventes as $vente) echo ($vente->mois == '05') ? $vente->total_prix_ht : '' ?></td>
        <td><?php foreach($ventes as $vente) echo ($vente->mois == '06') ? $vente->total_prix_ht : '' ?></td>
        <td><?php foreach($ventes as $vente) echo ($vente->mois == '07') ? $vente->total_prix_ht : '' ?></td>
        <td><?php foreach($ventes as $vente) echo ($vente->mois == '08') ? $vente->total_prix_ht : '' ?></td>
        <td><?php foreach($ventes as $vente) echo ($vente->mois == '09') ? $vente->total_prix_ht : '' ?></td>
        <td><?php foreach($ventes as $vente) echo ($vente->mois == '10') ? $vente->total_prix_ht : '' ?></td>
        <td><?php foreach($ventes as $vente) echo ($vente->mois == '11') ? $vente->total_prix_ht : '' ?></td>
        <td><?php foreach($ventes as $vente) echo ($vente->mois == '12') ? $vente->total_prix_ht : '' ?></td>
       
        
    </tr>
    <tr>
        <td class="td-mois">Janvier</td>
        <td class="td-mois">Février</td>
        <td class="td-mois">Mars</td>
        <td class="td-mois">Avril</td>
        <td class="td-mois">Mai</td>
        <td class="td-mois">Juin</td>
        <td class="td-mois">Juillet</td>
        <td class="td-mois">Août</td>
        <td class="td-mois">Septembre</td>
        <td class="td-mois">Octobre</td>
        <td class="td-mois">Novembre</td>
        <td class="td-mois">Décembre</td>
    </tr>
    <tr>
       
    </tr>
</table>

</div>       
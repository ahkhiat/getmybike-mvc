<?php

class Controller_admin extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render('home');
    }
    public function action_dashboard_admin()
    {
        $m=Admin::get_model();
        $data=['nb_ventes_total'=>$m->get_nb_ventes_total_jour(),
               'ca_jour'=>$m->get_ca_jour(),
               'ventes'=>$m->get_ventes_jour_all()];
        $this->render("dashboard_admin", $data);
    }
    public function action_ventes_mois_produit()
    {
        $mp=Produit::get_model();
        $data=['produits'=>$mp->get_all_produits()];
        $this->render("ventes_produit", $data);
    }
    public function action_ventes_mois_produit_request()
    {
        $mp=Admin::get_model();
        $data=['ventes'=>$mp->get_ventes_mois_produit()];
        $this->render("ventes_produit_result", $data);
    }
    public function action_ventes_mois_ytd()
    {
        $m=Admin::get_model();
        $data=['nb_ventes_total'=>$m->get_nb_ventes_total_jour(),
               'ca_jour'=>$m->get_ca_jour(),
               'ventes'=>$m->get_ventes_jour_all()];
        $this->render("dashboard_admin", $data);
    }

    
    

    

    

    
}
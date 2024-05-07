<?php

class Controller_moto extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render('home');
    }
    public function action_all_motos()
    {
        $m=Moto::get_model();
        $data=['motos'=>$m->get_all_motos()];
        $this->render("all_motos",$data);
    }
    public function action_moto_show()
    {
        $m=Moto::get_model();
        $mc=Commentaire::get_model();
        $data=['moto'=>$m->get_moto_show(),
               'commentaires'=>$mc->get_commentaires_recus_moto()];
        $this->render("moto_show",$data);
    }

}
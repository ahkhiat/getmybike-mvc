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

        $user_id = $m->get_user_id();

        $data=['moto'=>$m->get_moto_show(),
               'commentaires'=>$mc->get_commentaires_recus_moto(),
               'moy_notes'=>$mc->get_moy_notes_recues_moto(),
               'nbr_notes'=>$mc->get_nbr_notes_recues_moto(),
               'moy_notes_user'=>$mc->get_moy_notes_recues_user($user_id),
               'nbr_notes_user'=>$mc->get_nbr_notes_recues_user($user_id)
            ];
        $this->render("moto_show",$data);
    }

}
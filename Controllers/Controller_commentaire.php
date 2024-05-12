<?php

class Controller_commentaire extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render('home');
    }
    public function action_commentaire_add()
    {
        // $moto_id = $_POST['moto_id'];
        $reservation_id = $_POST['reservation_id'];
        // var_dump($reservation_id);
        // var_dump($_POST);
        // die;

        $m=Commentaire::get_model();
        $m->set_commentaire_add($reservation_id);
        // $this->render("moto_add");
    }

}
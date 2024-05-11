<?php

class Controller_reservation extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render('home');
    }
    public function action_reserver()
    {
        $moto_id = $_POST['moto_id'];
        
        $m=Reservation::get_model();
        $m->set_reservation($moto_id);
        // $this->render("moto_add");
    }

}
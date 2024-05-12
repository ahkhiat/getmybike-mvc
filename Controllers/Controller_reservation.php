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
    public function action_mes_reservations()
    {
        $user_id = $_SESSION['id'];

        $date_now = new DateTime('now');
        // $date_now = $date->format('d m Y');
        

        $m=Reservation::get_model();
        $data=['reservations'=>$m->get_mes_reservations($user_id),
               'date_now'=>$date_now];
        $this->render("mes_reservations", $data);
    }

}
<?php

class Controller_reservation extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    // public function action_home()
    // {
    //     $this->render('home');
    // }

    public function action_prereserver()
    {
        $moto_id = $_POST['moto_id'];
        
        // $m=Reservation::get_model();
        // $m->get_reservation($moto_id);
        $this->render("prereservation");
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
        $m=Reservation::get_model();
        $mc=Commentaire::get_model();

        $user_id = $_SESSION['id'];

        $date_now = new DateTime('now');

        $reservations = $m->get_mes_reservations($user_id);
        foreach($reservations as $reservation){
            $reservation_id = $reservation->reservation_id;
            $reservation->is_commented = $mc->is_commentaire_exists($reservation_id);
        }

        $data=['reservations'=>$reservations,
               'date_now'=>$date_now];
        $this->render("mes_reservations", $data);
    }

    public function action_reservations_mes_motos()
    {
        $user_id = $_SESSION['id'];

        $date_now = new DateTime('now');
        // $date_now = $date->format('d m Y');
        

        $m=Reservation::get_model();
        $data=['reservations'=>$m->get_reservations_mes_motos($user_id),
               'date_now'=>$date_now];
        $this->render("reservations_mes_motos", $data);
    }

}
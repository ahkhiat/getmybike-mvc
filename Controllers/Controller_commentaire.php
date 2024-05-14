<?php

class Controller_commentaire extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    // public function action_home()
    // {
    //     $this->render('home');
    // }

    public function action_commentaire_add()
    {
        $reservation_id = $_POST['reservation_id'];

        $data = ['reservation_id' => $reservation_id];

        $this->render("commentaire_add", $data);        
    }

    public function action_commentaire_add_request()
    {
        $reservation_id = $_POST['reservation_id'];
        $user_id = $_SESSION['id'];

        $m=Commentaire::get_model();

        $m->set_commentaire_add($reservation_id);

        $nb_comments = $m->is_reservation_sans_commentaire($user_id);

        $_SESSION['notifications'] = $nb_comments;

        $data=['message'=>'Le commentaire a bien été enregistré !'];
        $this->render("commentaire_result", $data);
    }

}
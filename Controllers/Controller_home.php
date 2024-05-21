<?php

class Controller_home extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_faq()
    {
        $this->render("faq");
    }

}

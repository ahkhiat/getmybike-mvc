<?php

class Controller_user extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }
    public function action_home()
    {
        $this->render('home');
    }


    public function action_all_users()
    {
        $m=User::get_model();
        $data=['users'=>$m->get_all_users()];
        $this->render("all_users",$data);
    }
    // public function action_all_users()
    // {
    //     $m=User::get_model();
    //     $users = $m->get_all_users();
    //     foreach ($users as $user) {
    //         $lastActivityTimestamp = strtotime($user->lastActivityTime);
    //         $currentTimestamp = time();
    //         $timeDifference = $currentTimestamp - $lastActivityTimestamp;
    
    //         $user->active = ($timeDifference <= 300); // 5 minutes en secondes (5 * 60 = 300)
    //     }

    //     $data=['users'=> $users];
    //     $this->render("all_users",$data);
    // }


    public function action_user_profile()
    {
        $m=User::get_model();
        $data=['user'=>$m->get_user_profile(),
               'followers'=>$m->get_followers_number(),
               'followed'=>$m->get_followed_number()];
        $this->render("user_profile", $data);
    }

    public function action_user_profile_edit()
    {  
        $m=User::get_model();
        $data=['user'=>$m->get_user_profile()];
        $this->render("user_profile_edit", $data);
    }
    public function action_user_profile_edit_request()
    {  
        $m=User::get_model();
        $data=['users'=>$m->set_user_profile(),
               'user'=>$m->get_user_profile()];
        $this->render("user_profile", $data);
    }

    public function action_public_profile()
    {
        $m=User::get_model();
        $user = $m->get_public_profile();
        
        $lastActivityTimestamp = strtotime($user['user_info'][0]->lastActivityTime);
        $currentTimestamp = time();
        $timeDifference = $currentTimestamp - $lastActivityTimestamp;

        $user['user_info'][0]->active = ($timeDifference <= 300); // 5 minutes en secondes (5 * 60 = 300)


        $data=[
            // 'user'=>$m->get_public_profile(),
                'user'=>$user,
                'followers'=>$m->get_followers_number_public(),
               'followed'=>$m->get_followed_number_public(),
               'isFollowing'=>$m->get_is_following()];
        $this->
        render("public_profile", $data);
    }
    

    
    
   

   

    

 

}
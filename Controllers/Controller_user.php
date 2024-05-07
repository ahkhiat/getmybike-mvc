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
               'proprietaire'=>$m->get_proprietaire()];
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
        
        $lastActivityTimestamp = strtotime($user[0]->lastActivityTime);
        $currentTimestamp = time();
        $timeDifference = $currentTimestamp - $lastActivityTimestamp;

        $user[0]->active = ($timeDifference <= 300); // 5 minutes en secondes (5 * 60 = 300)


        $data=[
            // 'user'=>$m->get_public_profile(),
                'user'=>$user,
                'age'=>$m->get_age()
            //     'followers'=>$m->get_followers_number_public(),
            //    'followed'=>$m->get_followed_number_public(),
            //    'isFollowing'=>$m->get_is_following()
            ];
        $this->
        render("public_profile", $data);
    }
    
    public function action_profile_picture()
    {

        if(isset($_FILES["img_input"]["name"])){
            $user_id = $_POST["user_id"];
            $nom = $_POST["nom"];

            $imageName = $_FILES["img_input"]["name"];
            $imageSize = $_FILES["img_input"]["size"];
            $tmpName = $_FILES["img_input"]["tmp_name"];

            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimeType = finfo_file($finfo, $tmpName);

            //image validation by type & by MIME
            $validImageExtension = ['jpg', 'jpeg', 'png'];
            $validMimeType = ["image/jpeg", "image/jpg", "image/gif", "image/png", "image/svg+xml"];
            
            $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

            if(
                (
                !in_array($imageExtension, $validImageExtension) &&
                !in_array($mimeType, $validMimeType)
                ) || $mimeType == 'application/x-empty') {

                echo 
                "
                <script>
                    alert('Format d\'image invalide ! jpg jpeg et png acceptés !')
                    document.location.href = '?controller=user&action=user_profile'
                </script>
                ";

                /* ------------------------------- ancien code ------------------------------ */
            // } elseif ($imageSize > 1200000){
            //     echo 
            //     "
            //     <script>
            //         alert('Image trop lourde ! 1,2 Mo max !')
            //         document.location.href = '?controller=user&action=user_profile'
            //     </script>
            //     ";
            // } else {
                /* ------------------------------- ancien code ------------------------------ */

            } else {
                $maxFileSize = 1200000; // 1,2 Mo
    
                if ($imageSize > $maxFileSize) {
                    $image = new Imagick($tmpName);
                    // Imagick fonctionne si le site est déployé, ne fonctionne pas en local

                    if($this->isMobileImage($image)) {
                        $image->trimImage(0);
                    }
    
                    $compressionQuality = 80; // Qualité de compression (entre 0 et 100)
                    $image->setImageCompressionQuality($compressionQuality);
    
                    $newImageName = $nom."_".date('Y.m.d')."_".date('h.i.sa').".".$imageExtension;
                    $image->writeImage('Public/img/' . $newImageName);
    
                    $image->destroy();
                } else {
                    $newImageName = $nom."_".date('Y.m.d')."_".date('h.i.sa').".".$imageExtension;
                    move_uploaded_file($tmpName, 'Public/img/' . $newImageName);
                }

                $m=User::get_model();
                $oldImageName = $m->get_profile_picture($user_id);

                var_dump($oldImageName);
                

                // Delete old image if exists
                if($oldImageName !== null && $oldImageName !== 'noprofile.png' && file_exists('Public/img/' . $oldImageName)) {
                    unlink('Public/img/' . $oldImageName);
                }

                $newImageName = $nom."_".date('Y.m.d')."_".date('h.i.sa');
                $newImageName.=".".$imageExtension;
                $m=User::get_model();
                $m->set_profile_picture($newImageName);
                $_SESSION['image_name'] = $newImageName;
                move_uploaded_file($tmpName, 'Public/img/' . $newImageName);
                echo 
                "
                <script>
                    document.location.href = '?controller=user&action=user_profile'
                </script>
                ";

            }
            
        }
    }
    private function isMobileImage($image) {
        $width = $image->getImageWidth();
        $height = $image->getImageHeight();

        // Vous pouvez ajuster ces valeurs en fonction de votre expérience
        $mobileWidthThreshold = 1000;
        $mobileHeightThreshold = 1000;

        if($width <= $mobileWidthThreshold && $height <= $mobileHeightThreshold) {
            $size = min($width, $height);
            $image->cropImage($size, $size, 0, 0);
            return true;
        }

        return false;
    }
    
    
   

   

    

 

}
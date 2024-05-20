<?php

class Controller_moto extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    // public function action_home()
    // {
    //     $this->render('home');
    // }
    

    public function action_all_motos()
    {
        $m=Moto::get_model();
        $mc=Commentaire::get_model();

        $motos = $m->get_all_motos();
        foreach($motos as $moto){
            $moto_id = $moto->moto_id;
            $moto->moyenne_notes = $mc->get_moy_notes_recues_moto($moto_id);
            $moto->nbr_notes = $mc->get_nbr_notes_recues_moto($moto_id);
            $moto->is_favori = $m->get_is_favori($moto_id);
        }
        $data = array(
            'motos' => $motos
        );
        $this->render("all_motos",$data);
    }
    public function action_moto_show()
    {

        $m=Moto::get_model();
        $mc=Commentaire::get_model();
        $mr=Reservation::get_model();

        // Trouver le proprietaire de la moto
        $user_id = $m->get_user_id();
        $moto_id = $_GET['moto_id'];

        $date_actuelle = new DateTime();
        $mois_du_jour = $date_actuelle->format('F');
        $annee_du_jour = $date_actuelle->format('Y');

        $mois_actuel = new DateTime('first day of this month');
        $fin_mois_actuel = new DateTime('last day of this month');

        $date_suivante = clone $date_actuelle;
        $date_suivante->modify('+1 month');

        $mois_suivant = clone $mois_actuel;
        $mois_suivant->modify('+1 month');
        $fin_mois_suivant = new DateTime('last day of ' . $mois_suivant->format('F Y'));


        $mois_du_jour_suivant = $date_suivante->format('F'); 
        $annee_du_jour_suivante = $date_suivante->format('Y'); 

        $reservations = $mr->get_reservations($moto_id);

        $jours_reserves = [];

        foreach ($reservations as $reservation) {
            $date_debut = new DateTime($reservation->date_debut);
            $date_fin = new DateTime($reservation->date_fin);
            $date_fin->modify('+1 day');

            $interval = new DateInterval('P1D'); 
            $periode = new DatePeriod($date_debut, $interval, $date_fin);
            foreach ($periode as $jour) {
                $jours_reserves[] = $jour->format('Y-m-d');
            }
        }

        $data=['moto'=>$m->get_moto_show($moto_id),
               'commentaires'=>$mc->get_commentaires_recus_moto($moto_id),
               'moy_notes'=>$mc->get_moy_notes_recues_moto($moto_id),
               'nbr_notes'=>$mc->get_nbr_notes_recues_moto($moto_id),
               'moy_notes_user'=>$mc->get_moy_notes_recues_user($user_id),
               'nbr_notes_user'=>$mc->get_nbr_notes_recues_user($user_id),
               'is_favori'=>$m->get_is_favori($moto_id),
               'mois_du_jour'=>$mois_du_jour,
               'jours_reserves'=>$jours_reserves,
               'mois_actuel'=>$mois_actuel,
               'fin_mois_actuel'=>$fin_mois_actuel,
               'annee_du_jour'=>$annee_du_jour,
               'mois_du_jour_suivant'=>$mois_du_jour_suivant,
               'annee_du_jour_suivante'=>$annee_du_jour_suivante,
               'mois_suivant'=>$mois_suivant,
               'fin_mois_suivant'=>$fin_mois_suivant

            //    'reservations'=>$mr->get_reservations($moto_id)
            ];
        $this->render("moto_show",$data);
    }

    public function action_moto_add()
    {
        $m=Moto::get_model();
        $data=['modeles'=>$m->get_all_modeles(),
               'message'=> 'la moto a été ajoutée avec succès !'];
        $this->render("moto_add", $data);
    }
    public function action_moto_add_request()
    {
        $m=Moto::get_model();
        $data=[$m->set_moto_add_request(),
               'message' => 'La moto a été ajoutée !'];
        $this->render("moto_result", $data);
    }

    public function action_moto_update()
    {
        $moto_id = $_POST['moto_id'];

        $m=Moto::get_model();
        $data=['moto'=>$m->get_moto_show($moto_id),
               'modeles'=>$m->get_all_modeles()];
        $this->render("moto_update",$data);
    }
    public function action_moto_update_request()
    {
        $m=Moto::get_model();
        $data = [$m->get_moto_update_request(),
                 'message' => 'La moto a été mise à jour !'];
        $this->render("moto_result", $data);
    }
    public function action_moto_delete()
    {
        $moto_id = $_POST['moto_id'];

        $m=Moto::get_model();
        $data=[$m->set_moto_delete($moto_id),
               'message'=>'la moto a été supprimée'];
        $this->render("moto_result", $data);
    }

    public function action_favori()
    {
        $moto_id = $_GET['moto_id'];

        $m=Moto::get_model();
        $m->set_favori($moto_id);
        $this->action_moto_show();
    }
    public function action_unfavori()
    {
        $moto_id = $_GET['moto_id'];

        $m=Moto::get_model();
        $m->set_unfavori($moto_id);
        $this->action_moto_show();
    }

    public function action_motos_favorites()
    {
        $m=Moto::get_model();
        $data=['motos'=>$m->get_motos_favorites()];
        $this->render("motos_favorites",$data);
    }



    public function action_moto_picture()
    {

        if(isset($_FILES["img_input"]["name"])){
            $moto_id = $_POST["moto_id"];
            $nom = $_POST["nom"];

            $imageName = $_FILES["img_input"]["name"];
            $imageSize = $_FILES["img_input"]["size"];
            $tmpName = $_FILES["img_input"]["tmp_name"];

            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimeType = finfo_file($finfo, $tmpName);

            //image validation by type & by MIME
            $validImageExtension = ['jpg', 'jpeg', 'png', 'webp'];
            $validMimeType = ["image/jpeg", "image/jpg", "image/gif", "image/png", "image/svg+xml", "image/webp"];
            
            $imageExtension = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));

            if(
                (
                !in_array($imageExtension, $validImageExtension) &&
                !in_array($mimeType, $validMimeType)
                ) || $mimeType == 'application/x-empty') {

                echo 
                "
                <script>
                    alert('Format d\'image invalide ! jpg jpeg, png et webp acceptés !')
                    document.location.href = '?controller=user&action=user_profile'
                </script>
                ";


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
                    $image->writeImage('Public/img/moto/' . $newImageName);
    
                    $image->destroy();
                } else {
                    $newImageName = $nom."_".date('Y.m.d')."_".date('h.i.sa').".".$imageExtension;
                    move_uploaded_file($tmpName, 'Public/img/moto/' . $newImageName);
                }

                $m=Moto::get_model();
                $oldImageName = $m->get_moto_picture($moto_id);

                var_dump($oldImageName);
                

                // Delete old image if exists
                if($oldImageName !== null && $oldImageName !== 'noprofile.png' && file_exists('Public/img/moto/' . $oldImageName)) {
                    unlink('Public/img/moto/' . $oldImageName);
                }

                $newImageName = $nom."_".date('Y.m.d')."_".date('h.i.sa');
                $newImageName.=".".$imageExtension;
                $m=Moto::get_model();
                $m->set_moto_picture($newImageName);
                // $_SESSION['image_name'] = $newImageName;
                move_uploaded_file($tmpName, 'Public/img/moto/' . $newImageName);
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
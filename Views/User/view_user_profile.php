<div id="profile_container">

  <?php
  var_dump($user);
  var_dump($proprietaire);
  // var_dump($followers);
  // var_dump($followed);
  ?>




<section>
  <div class="container py-5">
    
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <!-- /* ----------------------------- image container ---------------------------- */ -->
            <form action="?controller=user&action=profile_picture" class="img-form" id="img_form" enctype="multipart/form-data" method="POST">
                <div class="upload">
                <img src="Public/img/<?= $user[0]->image_name ?>" width=125 height=125 alt="" title="<?= $user[0]->image_name ?>">

                  <div class="round">
                    <input type="hidden" name="user_id" value="<?= $user[0]->user_id ?>">
                    <input type="hidden" name="nom" value="<?= $user[0]->nom ?>">
                    <input type="file" name="img_input" id="img_input" accept="image/*" capture="camera">
                    <i class="fa fa-camera" style="color: #fff"></i>
                  </div>
                </div>
              </form>
                
            <h5 class="my-3"><?= $user[0]->prenom?> <?= $user[0]->nom?></h5>
            <p class="text-muted mb-1">
              <?php
            if (isset($_SESSION['email']) && $_SESSION['roles'] == 'admin') 
            {echo 'Administrateur';}
                 ?></p>
              <?php
              if(isset($proprietaire) && !empty($proprietaire)){
                echo "proprietaire";
              }
              ?>
              <p class="card-text small text-muted mb-3"><i class="fa-solid fa-star" style="color: orange;"></i> {{ proprietaire.average|number_format(2, '.', ',') }}/5 ({{ proprietaire.nombrecommentaires }})</p>
              {% endif %}          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
              
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                Nombre de reservations effectuées : <p class="text-muted mb-0">{{ user.nombrereservations }}</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                Membre depuis le : <p class="text-muted mb-0">{{ user.createdAt|date('d-m-Y') }}</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                {# <p class="mb-0"><a href="" target="_blank" style="text-decoration : none; color : inherit">{{ user.nombreReservations }}</a></p> #}
                Profil mis à jour le : <p class="text-muted mb-0">{% if user.updatedAt %}
                                                                    {{ user.updatedAt|date('d-m-Y H:i', "Europe/Paris") }}
                                                                  {% else %}
                                                                    {{ user.createdAt|date('d-m-Y') }}
                                                                  {% endif %}</p>
              </li>
            </ul>
          </div>
          <div class="d-flex justify-content-center mb-2">
              <a href="{{ path('app_user_edit', {'id': user.id}) }}"><button type="button" class="btn btn-outline-warning">Modifier</button></a>
              {# {{ include('user/_delete_form.html.twig') }} #}
        </div>
        </div>

        

      </div>
      
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nom</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $user[0]->nom?></p>
              </div>
            </div>

            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Prénom</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $user[0]->prenom?></p>
              </div>
            </div>

            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $user[0]->email?></p>
              </div>
            </div>
            
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Date de naissance</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $user[0]->date_naissance?></p>
              </div>
            </div>

            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Téléphone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $user[0]->telephone?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Addresse</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $user[0]->adresse?> <?= $user[0]->code_postal?> <?= $user[0]->ville?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Bio</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?= $user[0]->bio?></p>
              </div>
            </div>


          </div>
        </div>

        {# <div class="d-flex justify-content-center mb-2">
              <a href="{{ path('app_user_edit', {'id': user.id}) }}"><button type="button" class="btn btn-primary">Modifier</button></a>
              {{ include('user/_delete_form.html.twig') }}
        </div> #}

       {% if proprietaire and proprietaire.nombreMotos != 0 %}
        <div class="row">
          <div class="col-md-12">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="font-italic me-1 fw-bold">
                {% if proprietaire.nombreMotos == 1 %}
                Ma moto :
                {% else %}
                Mes motos :
                {% endif %}
                </span></p>
                  <div class="d-flex">
                  {% for moto in proprietaire.motos  %}
                  
                  <div class="card ms-1 me-1" style="width: 18rem;">
                    <!-- <img src={{ '/images/moto/' ~ moto.imageName }}
                                                    alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                                                    style="width: 400px; z-index: 1; "> -->
                    <div class="card-body">
                      <h5 class="card-title">{{ moto.modele.marque.libelle }} {{ moto.modele.libelle }}</h5>
                      <p class="card-text"><i class="fa-solid fa-star" style="color: orange;"></i> {{ moto.average|number_format(2, '.', ',') }}/5 ({{ moto.nombrenotes }})</p>
                      <div class="d-flex justify-content-between">
                        <a href="{{ path('app_moto_fiche', {'id': moto.id}) }}" class="btn btn-outline-warning btn-sm">Fiche moto</a>
                        <a href="{{ path('app_moto_edit', {'id': moto.id}) }}" class="btn btn-outline-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                      </div>
                    </div>
                  </div>

                  {% endfor %}
                </div>
               
              </div>
            </div>
          </div>
        </div>
        {% endif %} 

      </div>
    </div>
  </div>
</section>

</div>
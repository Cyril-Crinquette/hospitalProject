    <p>
        <?$error??''?>
    </p>
    <h6 class="text-center">
    <?=SessionFlash::display('message')?>
    </h6>
    <h4 class="text-center">Profil du patient</h4>

    <?php if (empty($error)) { ?>
    <div class="arrGd">
        <div class="gdparent">
            <div class="parent1">
                <div class="card-body">
                    <h5><?=$patient->lastname;?></h5>
                    <h5><?=$patient->firstname;?></h5>
                    <h5><?=$patient->birthdate;?></h5>
                    <h5><?=$patient->phone;?></h5>
                    <h5><?=$patient->mail;?></h5>
                    <h5><?=$patient->id;?></h5>
                </div>
            </div>
            <div class="parent2">
                <img src="/public/assets/img/iconfinder_12-Mask_5929232.png" alt="avatar représentant un patient de l'hôpital">
            </div>
        </div>
        <h4 class=" rdv text-center">Rendez-vous du patient</h4>
        <div class="rdvParent">
            <?php
                if (!empty($allInfo)) {
                    foreach ($allInfo as $value) {
                        echo '<p class="text-center"> Fixé pour le '.$value->dateHour.'</p>'
                        ?>
            <a class="linkProfil" href="/suppression?id=<?=$value->appId?>">
                <p class="text-center">Supprimer le rendez-vous </p>
            </a>
            <br>
            <?php }
                } else {
                    echo '<p class="text-center"> Aucun rendez-vous n\'est pris pour ce patient</p>';
                }
            }
            ?>
        </div>
        <a href="/modification?id=<?=$patient->id;?>"><h6>Modifier les informations du patient</h6></a> <br>
    </div>
    <a href="/liste-de-patients">
        <h5 class="text-center">Retour à la liste des patients</h5>
    </a> <br>
<?php
echo SessionFlash::display('message');
if (empty($error)) { ?>
    <div class="allCustomer">
    <?php
foreach ($appointmentList as $value) { ?>
            <div class="identyCard">
        <div class="topCard">
            <h3 class="titleCard">
                Rendez-vous La Manu-Amiens
            </h3>
        </div>
        <div class="contentCard">
            <div class="pictureCustomers">
                <img src="../../public/assets/img/theEvilWithin.jpg" alt="photo de profil" class="picture">
            </div>
            <div class="detailsCustomers">
                <p class="statusName">
                    Nom: <strong><?=$value -> lastname ?></strong> 
                </p>
                <p class="statusName">
                    Prénom: <strong><?=$value -> firstname?></strong> 
                </p>
                <p class="statusName">
                Rendez-vous le: <br> <strong><?=$value -> dateHour?></strong> 
                </p>
                <a class="linkProfil" href="/info-de-rendez-vous?id=<?=$value -> appId ?>">Informations &rarr;</a>
                <a class="linkProfil" href="/suppression?id=<?=$value -> appId ?>">Supprimer le rendez-vous &rarr;</a>
            </div>
        </div>
    </div>
<?php
}
?>
</div>
<?php
}
?>
<a href="/prise-de-rendez-vous"> <h5 class="text-center btnLink">&larr; Prendre un nouveau rendez-vous</h5></a> <br>
<a href="/accueil"> <h5 class="text-center">Retour à l'accueil</h5></a> <br>

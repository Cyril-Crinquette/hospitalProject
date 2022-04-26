<?php
if (empty($error)) { ?>
    <div class="allCustomer">
    <a href="/prise-de-rendez-vous" class="btnLink">&larr; Prendre un nouveau rendez-vous</a>
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
                <a class="linkProfil" href="/liste-de-rendez-vous?id=<?=$value -> appId ?>">Supprimer &rarr;</a>
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

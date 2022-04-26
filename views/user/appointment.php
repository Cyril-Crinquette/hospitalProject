<?php
if (empty($error)) { ?>
    <div class="allCustomer">
    <a href="/liste-de-rendez-vous" class="btnLink">&larr; Retour vers la liste des rendez-vous</a>
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
                    Nom: <strong><?=$oneAppointment -> lastname ?></strong> 
                </p>
                <p class="statusName">
                    Prénom: <strong><?=$oneAppointment-> firstname?></strong> 
                </p>
                <p class="statusName">
                    Rendez-vous le: <br> <strong><?=$oneAppointment-> dateHour?></strong> 
                </p>
                <p class="statusName">
                    Téléphone: <a class="linkMedia" href="tel:<?=$oneAppointment -> phone ?>"><?=$oneAppointment -> phone ?></a> 
                </p>
                <a class="linkProfil" href="/modification-de-rendez-vous?id=<?=$oneAppointment -> id?>">Modifier le rendez-vous</a>
            </div>
        </div>
    </div>
</div>
<?php
}
?>

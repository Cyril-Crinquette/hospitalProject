<h6 class="text-center">
    <?php
echo SessionFlash::display('message');
?>
</h6>
<h4 class="text-center">Détail du rendez-vous</h4>

<?php
if (empty($error)) { ?>
<div class="arrGd">
    <div class="gdparent">
        <div class="parent1">


            <div class="detailsCustomers">
                <p class="statusName">
                    Nom: <strong><?=$oneAppointment -> lastname ?></strong>
                </p>
                <p class="statusName">
                    Prénom: <strong><?=$oneAppointment-> firstname?></strong>
                </p>
                <p class="statusName">
                    Rendez-vous le: <strong><?=$oneAppointment-> dateHour?></strong>
                </p>
                <p class="statusName">
                    Téléphone: <a class="linkMedia"
                        href="tel:<?=$oneAppointment -> phone ?>"><?=$oneAppointment -> phone ?></a>
                </p>
                <p>
                <a class="linkProfil" href="/modification-de-rendez-vous?id=<?=$oneAppointment -> id?>">Modifier
                    le rendez-vous</a> 
                </p>
                <p>
                <a class="linkProfil" href="/suppression?id=<?=$oneAppointment -> id?>">Supprimer le
                    rendez-vous</a>
                </p>
            </div>


        </div>
        <div class="parent2">
            <img src="/public/assets/img/prendre-preparer-rendez-vous-hopital.jpg" alt="rendez-vous d'un patient avec son médecin" >
        </div>
    </div>
</div>
<?php
}
?>
<a href="/prise-de-rendez-vous">
    <h5 class="text-center btnLink"> Prendre un nouveau rendez-vous</h5>
</a> <br>
<a href="/liste-de-rendez-vous">
    <h5 class="text-center btnLink"> Retour vers la liste des rendez-vous</h5>
</a> <br>

<a href="/accueil">
    <h5 class="text-center">Retour à l'accueil</h5>
</a> <br>
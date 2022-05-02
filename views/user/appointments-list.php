<h6 class="text-center">
    <?php
echo SessionFlash::display('message'); 
?>
</h6>
<h4 class="text-center">Liste des rendez-vous</h4>

<?php
if (empty($error)) { ?>
<div class="allCustomer">
    <?php
foreach ($appointmentList as $value) { ?>
    <div class="arrGd">
        <div class="gdparent">
            <div class="parent1">
                <p class="statusName">
                    Nom: <strong><?=$value -> lastname ?></strong>
                </p>
                <p class="statusName">
                    Prénom: <strong><?=$value -> firstname?></strong>
                </p>
                <p class="statusName">
                    Rendez-vous le:  <strong><?=$value -> dateHour?></strong>
                </p>
                <p>
                <a class="linkProfil" href="/info-de-rendez-vous?id=<?=$value -> appId ?>">Informations </a>
                </p>
                <p>
                <a class="linkProfil" href="/suppression?id=<?=$value -> appId ?>">Supprimer le rendez-vous </a>
                </p>
            </div>
            <div class="parent2">
                <img src="/public/assets/img/Rdv-en-ligne-768x576.jpg" alt="agenda avec des accessoires de médecin">
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
<a href="/prise-de-rendez-vous">
    <h5 class="text-center btnLink"> Prendre un nouveau rendez-vous</h5>
</a> <br>
<a href="/accueil">
    <h5 class="text-center">Retour à l'accueil</h5>
</a> <br>
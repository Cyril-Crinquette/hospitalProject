<h4 class="text-center">Ajout d'un patient avec un rendez-vous</h4>
<div class="parent">
    <div class="main">
        <form method="post" id="formUser" enctype="multipart/form-data" novalidate>
            <!-- Message d'erreur -->
            <?php if (!empty($errorSentence) || !empty($sentence)) { ?>
            <small class="col-12 text-center fw-bold fst-italic p-3">
                <?= $errorSentence ?? '' ?>
                <?= $sentence ?? '' ?>
                <div>
                    <a href="/liste-de-rendez-vous"><button type="button" class="btn fw-bold m-3">Voir la liste des
                            rendez-vous</button></a>
                    <a href="/liste-de-patients"><button type="button" class="btn fw-bold m-3">Voir la liste des
                            patients</button></a>
                </div>
            </small>
            <?php } ?>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="mb-4">
                            <!-- Champ nom -->
                            <label for="lastname">Nom</label>
                            <input required aria-describedby="lastnameHelp" type="text" name="lastname" id="lastname"
                                title="Veuillez entrer un nom sans chiffres" placeholder="Entrez votre nom*"
                                class="form-control <?= isset($error['lastname']) ? 'errorField' : '' ?>"
                                autocomplete="family-name" value="<?= $lastname ?? '' ?>" minlength="2" maxlength="70"
                                pattern="<?=REG_EXP_NO_NUMBER?>">
                            <small id="lastnameHelp" class="form-text error"><?= $error['lastname'] ?? '' ?></small>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-4">
                            <!-- Champ prénom -->
                            <label for="firstname">Prénom</label>
                            <input required aria-describedby="firstnameHelp" type="text" name="firstname" id="firstname"
                                title="Veuillez entrer un prénom sans chiffres" placeholder="Entrez votre prénom*"
                                class="form-control <?= isset($error['firstname']) ? 'errorField' : '' ?>"
                                autocomplete="family-name" value="<?= $firstname ?? '' ?>" minlength="2" maxlength="70"
                                pattern="<?=REG_EXP_NO_NUMBER?>">
                            <small id="firstnameHelp" class="form-text error"><?= $error['firstname'] ?? '' ?></small>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-4">
                            <label for="birthdate">Date de naissance</label>
                            <!-- Champs date de naissance -->
                            <input required type="date" name="birthdate" placeholder="Entrez votre date de naissance*"
                                id="birthdate" value=<?= $birthdate ?? '' ?>
                                title="La date de naissance n'est pas au format attendu"
                                placeholder="Entrez votre date de naissance"
                                class="form-control <?= isset($error['birthdate']) ? 'errorField' : '' ?>"
                                autocomplete="bday" aria-describedby="birthdateHelp">
                            <small id="birthdateHelp" class="form-text error"><?= $error['birthdate'] ?? '' ?></small>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-4">
                            <label for="phone">Numéro de téléphone</label>
                            <!-- Champ numéro de mobile -->
                            <input required type="tel" class="form-control" name="phone" id="phone" aria-
                                describedby="phoneHelp" placeholder="Entrez votre numéro de téléphone*"
                                pattern="<?=REG_EXP_PHONE?>" value=<?= $phone?? '' ?>>
                            <small id="phoneHelp" class="form-text error"><?= $error['phone'] ?? '' ?></small>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-4">
                            <!-- Champs email -->
                            <label for="mail">Adresse mail</label>
                            <input required aria-describedby="mailHelp" type="email" name="mail" id="mail"
                                value="<?= $mail ?? '' ?>"
                                class="form-control <?= isset($error['mail']) ? 'errorField' : '' ?>"
                                placeholder="Entrez votre e-mail*" autocomplete="mail">
                            <small id="mailHelp" class="form-text error"><?= $error['mail'] ?? '' ?></small>
                        </div>
                    </div>
                </div>
                <?php
if (empty($errorDate)) { ?>
                <section class="appointment">
                    <div class="dateHour">
                    <label for="dateAppointment" class="labelAddPatient">Choisir une date</label>
                    <input class="inputAddPatient" type="date" name="dateAppointment" id="dateAppointment" required
                        pattern="<?=REG_EXP_DATE['numberDate']?>" value="<?=$dayD?>" min="<?=$dayD?>">
                    <p class="error"><?=$errorDate['dateAppointment']?? ''?></p>
                    </div>
                    <div class="dateHour">
                    <label for="timeAppointment" class="labelAddPatient">Choisir une heure</label>
                    <input class="inputAddPatient" type="time" id="timeAppointment" name="timeAppointment" required
                        pattern="<?=REG_EXP_TIME['numberDate']?>" value="09:00" min="09:00" max="18:00" required>
                    <p class="error"><?=$errorDate['dateAppointment']?? ''?></p>
                    </div>
                    <div class="valid">
                        <input type="submit" value="Enregistrer" class="btn btn-primary mt-3"
                            id="validForm">
                    </div>
                    <h4 class="text-center"><?=$addMsg??""?></h4>
                    </section>
        </form>
        </div>
    </div>
</div>

<?php
}
?>
<a href="/accueil">
    <h5 class="text-center">Retour à l'accueil</h5>
</a> <br>
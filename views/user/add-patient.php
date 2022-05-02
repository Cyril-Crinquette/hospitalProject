<h4 class="text-center">Inscription d'un nouveau patient</h4>
<div class="parent">
    <div class="main">
        <form method="post" id="formUser" enctype="multipart/form-data" novalidate>
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
            </div>
            <div class="valid">
                <input type="submit" value="Enregistrer le patient" class="btn btn-primary mt-3" id="validForm">
            </div>
            <h4 class="text-center"><?=$addMsg??""?></h4>
        </form>
    </div>
</div>
<a href="/accueil"> <h5 class="text-center">Retour à l'accueil</h5></a> <br>

    <p><?$error??''?></p>
    <?php if (empty($error)) { ?>
    <div class="card-deck ">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"></h5>
                <label for="lastname"><?=$patient->lastname;?></label>
                <input required aria-describedby="lastnameHelp" type="text" name="lastname" id="lastname"
                    title="Veuillez entrer un nom sans chiffres" placeholder="Entrez votre nom*"
                    class="form-control <?= isset($error['lastname']) ? 'errorField' : '' ?>" autocomplete="family-name"
                    value="<?= htmlentities($lastname ?? '') ?>" minlength="2" maxlength="70"
                    pattern="<?=REG_EXP_NO_NUMBER?>">
                <small id="lastnameHelp" class="form-text error"><?= $error['lastname'] ?? '' ?></small>
                <h4><?=$patient->firstname;?></h4>
                <h4><?=$patient->birthdate;?></h4>
                <h4><?=$patient->phone;?></h4>
                <h4><?=$patient->mail;?></h4>
            </div>
            <div class="card-footer">
                <small class="text-muted"><?=$patient->id;?></small>
            </div>
        </div>
    </div>
    <a href="/modification?id=<?=$patient->id;?>"><button>Modifier les informations du patient</button></a>
    <?php } ?>
<h4 class="text-center">Modification d'un rendez-vous</h4>
<div class="parent">
    <div class="main">
        <?php
if (empty($error)) { ?>
        <section class="appointment">
            <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" class="appointmentPatient">
                <!-- permet de deplacer l'id d'une page à l'autre -->
                <input type="hidden" value="<?=$_GET['id']?>" name="id">
                <div class="parentInput">
                <label for="dateAppointment" class="labelAddPatient">Choisir une date</label>
                <input class="inputAddPatient" type="date" name="dateAppointment" id="dateAppointment" required
                    pattern="<?=REG_EXP_DATE['numberDate']?>" value="<?=$dayD?>" min="<?=$dayD?>">
                <p class="error"><?=$errorMessage['dateAppointment']?? ''?></p>
                </div>

                <div class="parentInput">
                <label for="timeAppointment" class="labelAddPatient">Choisir une heure</label>
                <input class="inputAddPatient" type="time" id="timeAppointment" name="timeAppointment" required
                    pattern="<?=REG_EXP_TIME['numberDate']?>" value="09:00" min="09:00" max="18:00" required>
                <p class="error"><?=$errorMessage['dateAppointment']?? ''?></p>
                </div>

                <div class="parentInput">
                <label for="patientAppointment" class="labelAddPatient">Patient</label>
                <select name="patientAppointment" id="patientAppointment" class="inputAddPatient">
                    <option value="<?=$oneAppointment -> id?>"><?=$oneAppointment -> lastname?>
                        <?=$oneAppointment -> firstname?></option>
                </select>
                </div>

                <div class="valid">
                <input type="submit" value="Enregistrer" class="btn btn-primary mt-3" id="validForm">
                </div>
            </form>
        </section>
        <?php
} else {
    echo $error;
}
?>
    </div>
</div>
<a href="/accueil">
    <h5 class="text-center">Retour à l'accueil</h5>
</a> <br>
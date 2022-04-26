<?php
if (empty($errorDate)) { ?>
    <section class="appointment">
    <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" class="appointmentPatient">

        <label for="dateAppointment" class="labelAddPatient">Choisir une date</label>
        <input class="inputAddPatient" type="date" name="dateAppointment" id="dateAppointment" required
            pattern="<?=REG_EXP_DATE['numberDate']?>" value="<?=$dayD?>" min="<?=$dayD?>">
        <p class="error"><?=$errorDate['dateAppointment']?? ''?></p>

        <label for="timeAppointment" class="labelAddPatient">Choisir une heure</label>
        <input class="inputAddPatient" type="time" id="timeAppointment" name="timeAppointment" required
            pattern="<?=REG_EXP_TIME['numberDate']?>" value="09:00" min="09:00" max="18:00" required>
        <p class="error"><?=$errorDate['dateAppointment']?? ''?></p>

        <label for="patientAppointment" class="labelAddPatient">Choisir un patient</label>
        <select name="patientAppointment" id="patientAppointment" class="inputAddPatient">
            <option value="">--Choisir un patient--</option>
            <?php
            foreach ($patientSelect as $value) {?>
            <option value="<?=$value->id?>"> <?=$value->lastname?> <?=$value->firstname?></option>
            <?php
            }
            ?>
        </select>
        <input type="submit" value="Enregistrer le rendez-vous" class="btn btn-primary mt-3" id="validForm">
    </form>
</section>
<?php
}
?>


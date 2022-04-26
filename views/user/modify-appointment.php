<?php
if (empty($error)) { ?>
    <section class="appointment">
    <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" class="appointmentPatient">
        <!-- permet de deplacer l'id d'une page à l'autre -->
        <input type="hidden" value="<?=$_GET['id']?>" name="id">
        
        <label for="dateAppointment" class="labelAddPatient">Choisir une date</label>
        <input class="inputAddPatient" type="date" name="dateAppointment" id="dateAppointment" required
            pattern="<?=REG_EXP_DATE['numberDate']?>" value="<?=$dayD?>" min="<?=$dayD?>">
        <p class="error"><?=$errorMessage['dateAppointment']?? ''?></p>

        <label for="timeAppointment" class="labelAddPatient">Choisir une heure</label>
        <input class="inputAddPatient" type="time" id="timeAppointment" name="timeAppointment" required
            pattern="<?=REG_EXP_TIME['numberDate']?>" value="09:00" min="09:00" max="18:00" required>
        <p class="error"><?=$errorMessage['dateAppointment']?? ''?></p>

        <label for="patientAppointment" class="labelAddPatient">Patient</label>
        <select name="patientAppointment" id="patientAppointment" class="inputAddPatient">
            <option value="<?=$oneAppointment -> id?>"><?=$oneAppointment -> lastname?> <?=$oneAppointment -> firstname?></option>
        </select>
        <input type="submit" value="Modifier le rendez-vous" class="btn btn-primary mt-3" id="validForm">
    </form>
</section>
<?php
} else {
    echo $error;
}
?>


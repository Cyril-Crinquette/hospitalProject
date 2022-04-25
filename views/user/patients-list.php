
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Date de naissance</th>
            <th scope="col">Numéro de téléphone</th>
            <th scope="col">Mail</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
            <?php foreach ($patientTable as $patient) { ?>
        <tr>
            <td scope="col"><?=$patient->lastname;?> </th>
            <td scope="col"><?=$patient->firstname;?></td>
            <td scope="col"><?=$patient->birthdate;?></td>
            <td scope="col"><?=$patient->phone;?></td>
            <td scope="col"><?=$patient->mail;?></td>
            <td scope="col"><a href="/profil-patient?id=<?=$patient->id?>"> Profil</a></td>
        </tr>
        <?php } ?>
        </tr>
    </tbody>
</table>

<a href="/inscription"> <h5>Inscrire un nouveau patient</h5></a> <br>

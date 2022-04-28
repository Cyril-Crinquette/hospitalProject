<?php
echo SessionFlash::display('message');
?>
<form action="" method="GET" id="searchForm">
    <label for="searchForm" name="search">Rechercher sur la page:</label>
    <input type="search" name="search" id="searchForm" value="<?= $search ?? '' ?>">
    <button>Rechercher</button>
</form>
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
            <td scope="col"><a href="/suppression-du-patient?id=<?=$patient->id?>">Supprimer &rarr;</a>
        </tr>
        <?php } ?>
        </tr>
    </tbody>
</table>

<a href="/inscription">
    <h5 class="text-center">Inscrire un nouveau patient</h5>
</a> <br>
<a href="/accueil">
    <h5 class="text-center">Retour à l'accueil</h5>
</a> <br>
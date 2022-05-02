<h6 class="text-center"><?php
echo SessionFlash::display('message');
?>
</h6>
<h4 class="text-center">Liste des patients</h4>
<div class="parent">
    <div class="search">
        <form action="" method="GET" id="searchForm">
            <label for="searchForm" name="search">Rechercher un patient:</label>
            <input type="search" name="search" id="searchForm" value="<?= $search ?? '' ?>">
            <button id="validButton">Valider</button>
        </form>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Date de naissance</th>
                <th scope="col">Numéro de téléphone</th>
                <th scope="col">Mail</th>
                <th scope="col">Profil</th>
                <th scope="col">Suppression</th>
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
                <td scope="col"><a href="/suppression-du-patient?id=<?=$patient->id?>">Supprimer</a>
            </tr>
            <?php } ?>
            </tr>
        </tbody>
    </table>
</div>
<a href="/inscription">
    <h5 class="text-center">Inscrire un nouveau patient</h5>
</a> <br>
<a href="/accueil">
    <h5 class="text-center">Retour à l'accueil</h5>
</a> <br>
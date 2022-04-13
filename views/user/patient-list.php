<?php foreach ($patientTable as $patient) { ?>
<tr>
    <td scope="col"><?=$patient->lastname;?> </th>
    <td scope="col"><?=$patient->firstname;?></td>
    <td scope="col"><?=$patient->birthdate;?></td>
    <td scope="col"><?=$patient->phone;?></td>
    <td scope="col"><?=$patient->mail;?></td>
</tr>
<?php } ?>
<?php
//je modifie les informations de localisation
setlocale(LC_TIME, 'fr');

//je crée un tableau 'contact' contenant mes infos
$contact = [
    'Prénom' => 'David',
    'Nom' => 'Serhani',
    'Adresse' => 'One Infinite Loop',
    'Code Postal' => '95014',
    'Ville' => 'Cupertino',
    'Email' => 'david@webforce.com',
    'Téléphone' => '606-5775',
    'Date de naissance' => date_format(date_create('1985-02-04'),'d/m/Y') // je fais appelle a un objet de la classe DateTime

];

//je parcours mon tableau afin d'afficher les infos
foreach ($contact as $key => $value) {
    echo  '-' .$key. ' : ' .$value. '<br/>';
}


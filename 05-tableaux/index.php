<?php

$people = [
    'Jean',
    'Eric',
    'Jeanne',
    'John'
];

//    echo $people; impossible
echo '<br />';
echo '<pre>';
print_r($people);
echo '</pre>';

var_dump($people);
echo '<br />';
echo $people[1];
echo '<br /> ----- FOREACH ----- <br />';

foreach ($people as $index => $person) {
    echo $index . ':' . $person . '<br />';
}
echo '<br /> ----- END OF FOREACH ----- <br />';
$people = [
    'Jean',
    3 => 'Eric',
    'Jeanne'
];
var_dump($people);

$people = [
    [
        'name' => 'Serhani',
        'first_name' => 'David',
        'age' => 33,
        'phone' => [
            'cellular' => 06060606,
            'home_phone' => 032020202
        ]
    ],
    [
        'name' => 'Mota',
        'first_name' => 'Matthieu',
        'age' => 50,
        'phone' => [
            'cellular' => '07050203',
            'home_phone' => '0321200202'
        ]
    ]
];
//    var_dump($people);
echo '<br />';
foreach ($people as $person) {
    echo "{$person['first_name']} a {$person['age']} et est joignable au : ";
    foreach ($person['phone'] as $type => $number) {
        echo "{$type} - {$number} <br />";
    }
}

echo '<br />';

$students = [
    0 => [
        'nom' => 'Matthieu',
        'notes' => [10, 8, 16, 16, 15, 2]
    ],
    1 => [
        'nom' => 'Thomas',
        'notes' => [4, 8, 6, 5, 20]
    ],
    2 => [
        'nom' => 'Jean',
        'notes' => [10, 8, 15, 9]
    ]
];

foreach ($students as $student) {
    echo "Les notes de {$student['nom']} : ";
    foreach ($student['notes'] as $note) {
        echo "{$note}; ";
    }
    echo '<br />';
}


$average = 0;
foreach ($students as $student) {
    $total = 0;
    foreach ($student['notes'] as $note) {
        $total += $note;
    }
    $averages = $total / count($student['notes']);
    if ($averages > 10) {
        $average++;
        echo "{$student['nom']} a la moyenne !<br />";
    } else {
        echo "{$student['nom']} n'a pas la moyenne ...<br />";
    }
}
echo "Eleve(s) avec la moyenne : {$average} <br />";

$best = array();
$max = 0;
foreach ($students as $student) {
    $max = max($student['notes']);
    array_push($best, $max);
}
$bestNote = max($best);
//    var_dump($best);
foreach ($students as $student) {
    foreach ($student['notes'] as $note) {
        if ($note === $bestNote) {
            echo "{$student['nom']} a obtenu la meilleur note de {$bestNote}<br />";
            break;
        }
    }
}

$choice = 16;
foreach ($students as $student) {
    foreach ($student['notes'] as $note) {

        if ($note === $choice) {
            echo "{$student['nom']} a obtenu un {$choice}<br />";
            break;
        }
    }
}











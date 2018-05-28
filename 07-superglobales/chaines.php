<?php
//acronyme
function acro ($str) {
   $words = explode(' ', $str);
   $letters = array();
   foreach ($words as $word) {
      $letter = substr($word,0, 1);
      array_push($letters, $letter);
    }
   return strtoupper(implode('', $letters)) . '<br>';
}
echo acro('world of warcraft');

//conjugaison
function conjug($verb) {
    $root = substr($verb, 0, -2);
    $ending = substr($verb, -2);
    $subjects = [
        'je' => 'e',
        'tu' => 'es',
        'il' => 'e',
        'nous' => 'ons',
        'vous' => 'ez',
        'ils' => 'ent'
    ];
    foreach ($subjects as $subject => $ending) {
        echo $subject . ' ' . $root . $ending . '<br/>';
    }
}
conjug('chercher');

<?php
$string = 'L2, L3, L3, L4, R1, R2, L3, R3, R3, L1, L3, R2, R3, L3, R4, R3, R3, L1, L4, R4, L2, R5, R1, L5, R1, R3, L5, R2, L2, R2, R1, L1, L3, L3, R4, R5, R4, L1, L189, L2, R2, L5, R5, R45, L3, R4, R77, L1, R1, R194, R2, L5, L3, L2, L1, R5, L3, L3, L5, L5, L5, R2, L1, L2, L3, R2, R5, R4, L2, R3, R5, L2, L2, R3, L3, L2, L1, L3, R5, R4, R3, R2, L1, R2, L5, R4, L5, L4, R4, L2, R5, L3, L2, R4, L1, L2, R2, R3, L2, L5, R1, R1, R3, R4, R1, R2, R4, R5, L3, L5, L3, L3, R5, R4, R1, L3, R1, L3, R3, R3, R3, L1, R3, R4, L5, L3, L1, L5, L4, R4, R1, L4, R3, R3, R5, R4, R3, R3, L1, L2, R1, L4, L4, L3, L4, L3, L5, R2, R4, L2';
$values = explode(', ', $string);
$directions = ['north','east','south','west'];
$currentDirection = 'north';
$directionCounts = ['north' => 0,'east' => 0,'south' => 0,'west' => 0];
foreach($values as $value) {
    $direction = substr($value, 0, 1);
    $blocks = substr($value, 1);
    $i = array_search($currentDirection, $directions);
    switch($direction) {
        case 'L':
            $i = $i == 0 ? 3 : $i - 1;
            break;
        case'R':
            $i = $i == 3 ? 0 : $i + 1;
    }

    $currentDirection = $directions[$i];
    $directionCounts[$currentDirection]+=intval($blocks);
}
$blocks = abs($directionCounts['north'] - $directionCounts['south']) +  abs($directionCounts['east'] - $directionCounts['west']);
echo $blocks;

//North 10 blocks
//East 21 blocks
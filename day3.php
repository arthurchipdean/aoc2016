<?php
$lines = explode("\n", file_get_contents('input3.txt'));
$possibles = 0;
foreach($lines as $line) {
    list($a,$b,$c) = explode('  ', trim($line));
    if($a + $b > $c && $c + $a > $b && $c + $b > $a) {
        $possibles++;
    }
}
echo $possibles;
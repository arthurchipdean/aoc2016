<?php
$content = file_get_contents('input2.txt');
$lines = array_filter(explode("\n", $content));
$buttons = [
    [1,2,3],
    [4,5,6],
    [7,8,9]
];
$i = 1;
$k = 1;
$code = '';
foreach($lines as $line) {
    $parts = str_split($line);
    foreach($parts as $part) {
        switch($part) {
            case'R':
                $k = $k == 2 ? 2 : $k + 1;
                break;
            case'L':
                $k = $k == 0 ? 0 : $k - 1;
                break;
            case'D':
                $i = $i == 2 ? 2 : $i + 1;
                break;
            case'U':
                $i = $i == 0 ? 0 : $i - 1;
                break;
        }
    }
    $code.=strval($buttons[$i][$k]);
}
echo $code;
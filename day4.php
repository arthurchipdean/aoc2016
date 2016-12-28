<?php
$lines = array_filter(explode("\n", file_get_contents('input4.txt')));
$sum = 0;
foreach($lines as $line) {
    preg_match("/.+?(?=\-(\d+)\[(\w+)\])/", $line, $output_array);
    $letters = array_count_values(str_split(str_replace("-", "", $output_array[0])));
    $code = $output_array[1];
    $checkSum = $output_array[2];
    $k = array_keys($letters);
    $v = array_values($letters);
    array_multisort($v, SORT_DESC, $k, SORT_ASC);
    $letters = array_combine($k, $v);
    $tally = 0;
    $topFive = [];
    foreach($letters as $letter => $count) {
        $tally+=1;
        $topFive[]= $letter;
        if($tally === 5) {
            break;
        }
    }
    foreach(str_split($checkSum) as $i => $letter) {
        if($topFive[$i] !== $letter) {
            echo "{$topFive[$i]} !== $letter\n";
            continue 2;
        }
    }
    $sum+=intval($code);
}
echo $sum;
//409147
<?php
$data = file_get_contents('data9.txt');
//$data = 'A(1x5)BC';
$chars = str_split($data);
$inRepeat = false;
$inRepeatCharCount = false;
$inRepeatCount = false;
$repeatCharCount = '';
$repeatCount = '';
$output = "";
for($i = 0; $i < count($chars); $i++) {
    $char = $chars[$i];
    if($char == ' ' || $char == "\n") {
        continue;
    }
    if($inRepeat) {
        if($inRepeatCount && $char !== ')') {
            $repeatCount.=$char;
        }
        if($char == 'x') {
            $inRepeatCharCount = false;
            $inRepeatCount = true;
        }
        if($inRepeatCharCount) {
            $repeatCharCount.=$char;
        }
        if($char === ')') {

            $inRepeat = false;
            $inRepeatCharCount = false;
            $inRepeatCount = false;
            $originalSequence = array_slice($chars, $i+1, $repeatCharCount);
            $repeatSequence =[];
            for($k = 0; $k < (int)$repeatCount; $k++) {
                $repeatSequence = array_merge($repeatSequence, $originalSequence);
            }
            $output.=implode('',$repeatSequence);
            $i+=(int)$repeatCharCount;
            $repeatCharCount = '';
            $repeatCount = '';
            continue;
        }
    }
    if($char == '(') {
        $inRepeatCharCount = true;
        $inRepeat = true;
    } else if(!$inRepeat) {
        $output.=$char;
    }
}
echo strlen($output);
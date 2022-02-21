<?php

$data = file_get_contents('duplicatedata.json');
$data = json_decode($data, true);
function findDuplicate(string $value) {
    //find duplicate string in the givrn value
    if(strlen($value) <= 2) {
        return false;
    }
    $firstChar = $value[0];
    $duplicateFirstCharIndex = strpos(substr($value, 1), $firstChar);
    $duplicate = substr($value, 0, $duplicateFirstCharIndex);
    if(!isset($value[$duplicateFirstCharIndex + 1 + $duplicateFirstCharIndex])) {
        return false;
    }
    $control = substr($value, $duplicateFirstCharIndex + 1, $duplicateFirstCharIndex);
    if($duplicate == $control) {
        return $duplicate;
    } else {
        return false;
    }
}


foreach ($data as &$record) {
    foreach ($record as &$value) {
        $duplicate = findDuplicate($value);
        if($duplicate) {
            $value = str_replace($duplicate, '', $value);
        }
    }
}
var_dump($data);

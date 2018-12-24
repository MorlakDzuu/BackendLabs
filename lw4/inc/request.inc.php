<?php
function getNumberOfUpperCase($str) {
    if (preg_match("/[А-ЯA-Z]+/", $str,$matches)) {
        return iconv_strlen($matches[0]);
    }
    return 0;
}
function getNumberOfLowerCase($str) {
    if (preg_match("/[а-яa-z]+/", $str,$matches)) {
        return iconv_strlen($matches[0]);
    }
    return 0;
}
function getNumberOfDigits($str) {
    if (preg_match("/[0-9]+/", $str, $matches)) {
        return iconv_strlen($matches[0]);
    }
    return 0;
}
function includeOnlyLetters($str) {
    return preg_match("/[0-9]/", $str);
}
function includeOnlyDigits($str) {
    return preg_match("/[^0-9]/", $str);
}
function amountOfDuplicates($str) {
    $result = 0;
    $symbols = [];
    $strArray = preg_split('//u', $str,-1,PREG_SPLIT_NO_EMPTY);
    for ($i = 0; $i < count($strArray); $i++) {
        if (!in_array($strArray[$i], $symbols)) {
            array_push($symbols, $strArray[$i]);
        }
    }
    for ($i = 0; $i < count($str); $i++) {
        if (substr_count($str, $symbols[$i]) > 1) {
            $result += substr_count($str, $symbols[$i]);
        }
    }
    return $result;
}
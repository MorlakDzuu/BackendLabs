<?php
/**
 * Created by PhpStorm.
 * User: morlakdzuu
 * Date: 09.10.2018
 * Time: 18:21
 */
header('Content-Type: text/plain');
require_once 'inc/common.inc.php';
if (isset($_GET['str']) && $_GET['str'] != '') {
    $str = $_GET['str'];
    echo 'Lower ' . getNumberOfLowerCase($str) . PHP_EOL . 'Digits ' . getNumberOfDigits($str) . PHP_EOL . 'Upper ' . getNumberOfUpperCase($str) . PHP_EOL . 'Dup ' . amountOfDuplicates($str) . PHP_EOL . 'Only digits ' . includeOnlyDigits($str) . PHP_EOL . 'Only letters ' . includeOnlyLetters($str) . PHP_EOL;
    $result = 0;
    $result += 4 * iconv_strlen($str);
    $result += + 4 * getNumberOfDigits($str);
    if (getNumberOfUpperCase($str) > 0) {
        $result += (iconv_strlen($str) - getNumberOfUpperCase($str)) * 2;
    }
    if (getNumberOfLowerCase($str) > 0) {
        $result += (iconv_strlen($str) - getNumberOfLowerCase($str)) * 2;
    }
    if (includeOnlyLetters($str) || includeOnlyDigits($str)) {
        $result -= iconv_strlen($str);
    }
    $result -= amountOfDuplicates($str);
    echo $result;
}
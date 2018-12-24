<?php
/**
 * Created by PhpStorm.
 * User: morlakdzuu
 * Date: 27.10.2018
 * Time: 0:33
 */
$rulesFile = fopen('minifycss.txt', 'r');
$rules = [];
$result = [];
for ($i = 0; !feof($rulesFile); $i++) {
    $rules[$i] = trim(fgets($rulesFile));
}
fclose($rulesFile);
$resultFile = fopen('web/min.css/' . $rules[0], 'w');
for ($i = 1; $i < count($rules); $i++) {
    if (!file_exists($rules[$i])) {
        $tempFile = fopen( 'web/css/' . $rules[$i], 'r');
        while (!feof($tempFile)) {
            $str = trim(fgets($tempFile));
            if (!empty($str)) {
                fwrite($resultFile, $str . PHP_EOL);
            }
        }
        fclose($tempFile);
    }
}
fclose($resultFile);
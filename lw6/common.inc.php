<?php
function getAmountOfStrings($path, $format, $result) {
    foreach (glob($path) as $filename) {
        if (is_dir($filename)) {
            $result = getAmountOfFiles(mb_substr($path, 0, count($path) - 2) . basename($filename) . '/*', $format, $result);
        }
        if (strpos(basename($filename), $format)) {
            $file = fopen($filename, 'r');
            while (!feof($file)) {
                fgets($file);
                $result++;
            }
            fclose($file);
        }
    }
    return $result;
}
function getAmountOfFiles($path, $format, $result) {
    foreach (glob($path) as $filename) {
        if (is_dir($filename)) {
            $result = getAmountOfFiles(mb_substr($path, 0, count($path) - 2) . basename($filename) . '/*', $format, $result);
        }
        if (strpos(basename($filename), $format)) {
            $result += filesize($filename);
        }
    }
    return $result;
}

function roundAmountToKB($result) {
    return strval(round($result / 1024, PHP_ROUND_HALF_UP)) . ' KB' . PHP_EOL;
}

function printAmountsOfString($formats) {
    foreach ($formats as $format) {
        print($format[0] . ' - ' . getAmountOfStrings('../lw5/*', $format[1], 0) . PHP_EOL);
    }
}

function printAmountOfFiles($formats) {
    foreach ($formats as $format) {
        print($format[0] . ' - ' . roundAmountToKB(getAmountOfFiles('../lw5/*', $format[1], 0)));
    }
}
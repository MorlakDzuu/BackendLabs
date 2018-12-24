<?php
function last($str) {
    return mb_substr($str,-1,1);
}

function withoutLast($str) {
    return mb_substr($str,0,count($str) - 2);
}

function reverse($str) {
    $result = null;
    $str = preg_split('//u', $str,-1,PREG_SPLIT_NO_EMPTY);
    for ($i = count($str) - 1; $i >= 0; $i--) {
        $result = $result . $str[$i];
    }
    return $result;
}

function removeExtraBlanks($str){
    $result = null;
    for ($i = 0; $i < iconv_strlen($str); $i ++) {
        if ($result == null) {
            if ($str[$i] != ' ') {
                $result = $str[$i];
            }
        } elseif ($result[iconv_strlen($result) - 1] == ' ' && $str[$i] != ' ') {
            $result = $result . $str[$i];
        } elseif ($result[iconv_strlen($result) - 1] != ' ' && $str[$i] == ' ') {
            $result = $result . ' ';
        }
    }
    if ($result[iconv_strlen($result) - 1] == ' ') {
        $result = withoutLast($result);
    }
    return $result;
}

function isIdentifier($str) {
    if (is_numeric($str[0])) {
        return false;
    }
    for ($i = 0; $i < iconv_strlen($str); $i++) {
        if (!is_numeric($str[$i]) && !ctype_alpha($str[$i])) {
            return false;
        }
    }
    return true;
}
<?php
require_once 'inc/common.inc.php';
if (!empty($_GET['str'])) {
    if(isIdentifier($_GET['str'])) {
        echo 'yes';
    } else {
        echo 'no';
    }
}
<?php
require_once 'inc/common.inc.php';
if (!empty($_GET['str'])) {
    echo removeExtraBlanks($_GET['str']);
}

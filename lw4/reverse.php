<?php
require_once 'inc/common.inc.php';
if (!empty($_GET['str'])) {
    echo reverse($_GET['str']);
}
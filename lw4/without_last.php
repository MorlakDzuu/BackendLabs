<?php
require_once 'inc/common.inc.php';
if (isset($_GET['str']) && $_GET['str'] != '') {
    echo withoutLast($_GET['str']);
}
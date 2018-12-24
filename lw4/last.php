<?php
require_once 'inc/common.inc.php';
if (!isset($_GET['str'])) {
    $result = 'String is not exist';
} elseif ($_GET['str'] == '') {
    $result = 'String is empty';
} else {
    $result = last($_GET['str']);
}
echo $result;
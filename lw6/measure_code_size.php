<?php
require_once 'common.inc.php';
$formats = [
    ['PHP', '.php'],
    ['Twig', '.twig'],
    ['JS', '.js'],
    ['CSS', '.css']
];
printAmountOfFiles($formats);

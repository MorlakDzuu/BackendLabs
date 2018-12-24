<?php
function getView($templateName, $vars)
{
    require_once $_SERVER['DOCUMENT_ROOT'] . "/lw5/lib/vendor/twig/Autoloader.php";
    Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem($_SERVER['DOCUMENT_ROOT'] . '/lw5/lib/template/');

    $twig = new Twig_Environment($loader);
    return $twig -> render($templateName, $vars);
}
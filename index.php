<?php

function __autoload($className)
{

    $class = str_replace('\\',DIRECTORY_SEPARATOR,$className);
    $file = "$class.php";
    include_once $file;
}

$control = 'bezoeker';
if(isset($_REQUEST['control'])&&!empty($_REQUEST['control']))
{
    $control = $_REQUEST['control'];
}

$action = 'default';
if(isset($_REQUEST['action'])&&!empty($_REQUEST['action']))
{
    $action = $_REQUEST['action'];
}  

$controllerName = 'nl\mondriaan\ict\ao\barningEvents\controls'.'\\'.ucfirst($control).'Controller';
$myControl = new $controllerName($control, $action);
$myControl->execute();
    
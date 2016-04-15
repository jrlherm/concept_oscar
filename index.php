<?php

require_once "controller/PageController.php";
require_once "controller/AdminController.php";
require_once "model/DbRepository.php";
require_once "Config.php";

$PageController  = new \Controller\PageController($pdo);
$AdminController = new \Controller\AdminController($pdo);

if( isset( $_GET['p'] ) && isset( $route[$_GET['p']] )) {
    $controllerName = $route[$_GET['p']]['controller'];
    $methodName     = $route[$_GET['p']]['method'];
} else {
    $controllerName = $route[$defaultRoute]['controller'];
    $methodName     = $route[$defaultRoute]['method'];
}

$$controllerName->$methodName();
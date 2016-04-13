<?php

require_once "Controller/PageController.php";
require_once "Model/DbRepository.php";
require_once "Config.php";

$PageController = new \Controller\PageController($pdo);

if( isset( $_GET['p'] ) && isset( $route[$_GET['p']] )) {
    $controllerName = $route[$_REQUEST['p']]['controller'];
    $methodName     = $route[$_REQUEST['p']]['method'];
} else {
    $controllerName = $route[$defaultRoute]['controller'];
    $methodName     = $route[$defaultRoute]['method'];
}

$$controllerName->$methodName();
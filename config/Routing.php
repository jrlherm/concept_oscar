<?php

$route = [
    'home' => [ 'controller' => 'PageController' , 'method' => 'homeAction'],
    'spent' => [ 'controller' => 'PageController' , 'method' => 'spentAction'],
    'delete' => [ 'controller' => 'PageController' , 'method' => 'deleteAction'],
    'update' => [ 'controller' => 'PageController' , 'method' => 'updateAction'],
];

$defaultRoute = 'home';
<?php

$route = [
    'loader' => [ 'controller' => 'PageController' , 'method' => 'loaderAction'],
    'home' => [ 'controller' => 'PageController' , 'method' => 'homeAction'],
    'date' => [ 'controller' => 'PageController' , 'method' => 'dateAction'],
    'global' => [ 'controller' => 'PageController' , 'method' => 'globalAction'],
];

$defaultRoute = 'loader';
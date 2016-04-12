<?php

$route = [
    'loader' => [ 'controller' => 'PageController' , 'method' => 'loaderAction'],
    'home' => [ 'controller' => 'PageController' , 'method' => 'homeAction'],
    'date' => [ 'controller' => 'PageController' , 'method' => 'dateAction'],
    'global' => [ 'controller' => 'PageController' , 'method' => 'globalAction'],
    'actor' => [ 'controller' => 'PageController' , 'method' => 'actorAction'],
    'movie' => [ 'controller' => 'PageController' , 'method' => 'movieAction'],
];

$defaultRoute = 'loader';
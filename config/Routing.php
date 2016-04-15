<?php

$route = [
    'loader' => [ 'controller' => 'PageController' , 'method' => 'loaderAction'],
    'home' => [ 'controller' => 'PageController' , 'method' => 'homeAction'],
    'date' => [ 'controller' => 'PageController' , 'method' => 'dateAction'],
    'global' => [ 'controller' => 'PageController' , 'method' => 'globalAction'],
    'credits' => [ 'controller' => 'PageController' , 'method' => 'creditsAction'],

    'parse' => [ 'controller' => 'AdminController' , 'method' => 'parsingAction'],
    'graph1' => [ 'controller' => 'AdminController' , 'method' => 'graph1Action'],
    'graph2' => [ 'controller' => 'AdminController' , 'method' => 'graph2Action'],
    'graph3' => [ 'controller' => 'AdminController' , 'method' => 'graph3Action'],
];

$defaultRoute = 'loader';
<?php

/*
 * Elijah Maret
 * index.php
 * Index page
 */

//This is our controller!

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file
require_once('vendor/autoload.php');

//Create an instance of the base class
$f3 = Base::instance();

//Define a default route
$f3->route('GET /', function() {
    $view = new Template();
    echo $view->render('views/home.html');
});

//Define a breakfast route
$f3->route('GET /breakfast', function() {
    $view = new Template();
    echo $view->render('views/breakfast.html');
});

$f3->route('GET /breakfast/buffet', function() {
    $view = new Template();
    echo $view->render('views/breakfast-buffet.html');
});

$f3->route('GET /second-breakfast', function() {
    $view = new Template();
    echo $view->render('views/second-breakfast.html');
});

$f3->route('GET /lunch', function() {
    $view = new Template();
    echo $view->render('views/lunch.html');
});

$f3->route('GET /order', function() {
    $view = new Template();
    echo $view->render('views/form1.html');
});

$f3->route('GET /order2', function() {
    $view = new Template();
    echo $view->render('views/form2.html');
});


$f3->route('GET /@item', function($f3, $params) {
    //var_dump($params);
    $item = $params['item'];
    echo "<p>You ordered $item</p>";

    $foodsWeServe = array("tacos", "ramen", "saimin", "bagels");
    if (!in_array($item, $foodsWeServe)) {
        echo "<p>You'll never take our $item!";
        $f3->error(403);

    }

    if($item === "bagels"){
        $f3->reroute("/breakfast");
    }
});

//Run fat free
$f3->run();
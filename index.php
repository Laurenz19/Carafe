<?php

use Events\Carafe,
    Events\Events;

require __DIR__.'/vendor/autoload.php';

$carafe1 = new Carafe(4);
$carafe2 = new Carafe(3);
$events = new Events(
    $carafe1, $carafe2, 2
);


$events->start();




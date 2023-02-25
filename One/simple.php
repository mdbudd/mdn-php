<?php

declare(strict_types=1);

namespace One;

use One\Simple\SimpleClass;
use One\Simple\SimpleManualAssignment;
use One\Simple\SimpleWithGetter;

// assuming this is connected to a framework and loads all classes
// require __DIR__ . '/../../../vendor/autoload.php'; 
require_once "Simple\SimpleClass.php";


$instance = new SimpleClass();
$instance2 = new SimpleClass('Sally');
echo "\n" . $instance->name; // Simon
echo "\n" . $instance2->name; //Sally

$instance3 = new SimpleWithGetter('Lilly');
echo "\n" . $instance3->getName(); //Lilly

$instance4 = new SimpleManualAssignment('Molly');
echo "\n" . $instance4->getName(); //Molly


// header('Content-Type: application/json; charset=utf-8');
// $data = ['instance1' => $instance->name, 'instance2' => $instance2->name];
// echo json_encode($data);
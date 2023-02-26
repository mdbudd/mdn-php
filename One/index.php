<?php

declare(strict_types=1);

namespace One;

use One\Simple\SimpleClass;
use One\Simple\SimpleManualAssignment;
use One\Simple\SimpleWithGetter;
use One\Simple\SimplePropertyAssignment;
use One\Simple\GetsSomethingClass;

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

$instance4 = new SimplePropertyAssignment();
// dynamic property is public
echo "\n" . $instance4->dynamicProperty;
// dynamic property is untyped and can be anything
$instance->dynamicProperty = 123;
echo "\n" . $instance->dynamicProperty;


echo "\n" . (new GetsSomethingClass())->getSomething();

// header('Content-Type: application/json; charset=utf-8');
// $data = ['instance1' => $instance->name, 'instance2' => $instance2->name, 'instance3' => $instance3->getName(), 'instance4' => $instance4->getName()];
// echo json_encode($data);

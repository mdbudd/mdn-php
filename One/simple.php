<?php

declare(strict_types=1);

namespace One;

use One\Simple\SimpleClass;

// assuming this is connected to a framework and loads all classes
// require __DIR__ . '/../../../vendor/autoload.php'; 
require_once "Simple\SimpleClass.php";

$instance = new SimpleClass();
echo "\n" . $instance->name; // Simon
$instance2 = new SimpleClass('Sally');
echo "\n" . $instance2->name; //Sally
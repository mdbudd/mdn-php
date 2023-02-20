<?php
// requires can't be over the namespaces declaration
namespace main;

require_once "globalClasses/Gc1.php";
require_once "globalClasses/Gc2.php";
// This one doesn't use namespace
$object1 = new \Gc1();  // Without \   you wil get an error: Fatal error: Class 'main\Gc1' not found
require_once "nameSpace1/Ns1.php";
require_once "nameSpace2/Ns2.php";

use nameSpace1;
use nameSpace2;

$object3 = new nameSpace1\Ns1();
$object4 = new nameSpace2\Ns2();

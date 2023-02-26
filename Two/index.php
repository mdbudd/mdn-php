<?php

declare(strict_types=1);

namespace Two;

use Two\Inheritance\MyChildClass;
use Two\Inheritance\MultipleInterfaces;

require_once "Inheritance\InheritanceClass.php";
require_once "Inheritance\InterfaceClass.php";

$inheritance = new MyChildClass();
$interface = new MultipleInterfaces();

echo "\n" . $inheritance->getFoo();
echo "\n" . $interface->getFoo();

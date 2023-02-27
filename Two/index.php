<?php

declare(strict_types=1);

namespace Two;

use Two\Inheritance\MyChildClass;
use Two\Inheritance\MultipleInterfaces;
use Two\Inheritance\MyClass;

require_once "Inheritance\InheritanceClass.php";
require_once "Inheritance\InterfaceClass.php";
require_once "Inheritance\InheritanceGrandParentClass.php";

use Two\ForceInheritance\AdminPermission;
use Two\ForceInheritance\AdminUser;
use Two\ForceInheritance\FrontEndUser;

require_once "ForceInheritance\PersonClass.php";

$inheritance = new MyChildClass();
$interface = new MultipleInterfaces();
$class = new MyClass();

echo "\n" . $inheritance->getFoo();
echo "\n" . $interface->getFoo();
echo "\n" . $interface->getBar();
echo "\n" . $class->getBar();

$frontEndUser = new FrontEndUser(
    2,
    'Steve',
    'http://php.com',
    'http://something.com'
);

echo "\n" . $frontEndUser;

$adminUser = new AdminUser(
    1,
    'Joseph',
    new class() extends AdminPermission
    {
        public function getPermName(): string
        {
            return self::CAN_VIEW;
        }
        public function isAllowed(): bool
        {
            return true;
        }
    },
    new class() extends AdminPermission
    {
        public function getPermName(): string
        {
            return self::CAN_EDIT;
        }
        public function isAllowed(): bool
        {
            return false;
        }
    },
);

echo "\n" . $adminUser;

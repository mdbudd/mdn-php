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

use Two\ForceInheritance\ShinyNew;

require_once "ForceInheritance\ConstructVis.php";

use Two\StaticAccess\ParentClass;
use Two\StaticAccess\ChildClass;

require_once "StaticAccess\AccessClass.php";

header("Content-Type: text/plain");

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

// $adminRef = new AdminPermission(permName: AdminPermission::CAN_VIEW, can: true);
// echo "\n" . $adminRef;

(static function (string ...$numbers): void {
    echo implode("\n", $numbers);
})(...['one', 'two', 'three']);


/*
* array_filter ( array $array , callable|null $callback = null
, int $mode = 0 ) : array
*/
echo "\n";
print_r(array_filter(
    array: [
        true,
        false,
        true,
    ],
    callback: static function ($item): bool {
        return $item === true;
    }
));
/*
    * array_map ( callable|null $callback , array $array , array
    ...$arrays ) : array
    */
print_r(array_map(
    array: [
        true,
        false,
        true,
    ],
    callback: static function ($item): bool {
        return !$item;
    }
));


echo "\n\nParentClass::getStringSelf = " .
    ParentClass::getStringSelf();
echo "\n\nParentClass::getStringStatic = " .
    ParentClass::getStringStatic();
echo "\n\nChildClass::getStringSelf = " .
    ChildClass::getStringSelf();
echo "\n\nChildClass::getStringStatic = " .
    ChildClass::getStringStatic();

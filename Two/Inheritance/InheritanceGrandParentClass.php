<?php

declare(strict_types=1);

namespace Two\Inheritance;

abstract class MyGrandParentClass
{
    protected int $foo = 1;
}

class MyParentClass extends MyGrandParentClass
{
    protected int $bar = 2;
}

interface GetsBarInterface
{
    public function getBar(): int;
}

interface GetsFooInterface
{
    public function getFoo(): int;
}

final class MyClass extends MyParentClass implements GetsBarInterface, GetsFooInterface
{
    public function getFoo(): int
    {
        return $this->foo;
    }
    public function getBar(): int
    {
        return $this->bar;
    }
}

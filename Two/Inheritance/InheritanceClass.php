<?php

declare(strict_types=1);

namespace Two\Inheritance;

class MyParentalClass
{
    protected int $foo = 1;
    private string $private = 'hidden';
}

class MyChildClass extends MyParentalClass
{
    private int $bar = 2;
    public function getFoo(): int
    {
        // access parent class property
        return $this->foo;
    }
    public function getBar(): int
    {
        // access this class property
        return $this->bar;
    }
    public function getPrivate(): string
    {
        // THIS IS NOT POSSIBLE
        // return $this->private;
        return 'NOT POSSIBLE';
    }
}

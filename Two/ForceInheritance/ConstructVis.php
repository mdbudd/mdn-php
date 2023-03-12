<?php

declare(strict_types=1);

namespace Two\ForceInheritance;

class OldBoilerMaker
{
    private string $foo;
    private int $bar;
    public function __construct(string $foo, int $bar)
    {
        $this->foo = $foo;
        $this->bar = $bar;
    }
}
class ShinyNew
{
    public function __construct(
        private string $foo,
        private int $bar
    ) {
    }
}

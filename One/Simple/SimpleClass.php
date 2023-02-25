<?php

declare(strict_types=1);

namespace One\Simple;

class SimpleClass
{
    public function __construct(public string $name = 'Simon')
    {
    }
}

class SimpleWithGetter
{
    public function __construct(private string $name = 'Simon')
    {
    }
    public function getName(): string
    {
        return $this->name;
    }
}

class SimpleManualAssignment
{
    private string $name;
    public function __construct(string $name = 'Simon')
    {
        // take the constructor param and manually assign to class property
        $this->name = $name;
    }
    public function getName(): string
    {
        return $this->name;
    }
}

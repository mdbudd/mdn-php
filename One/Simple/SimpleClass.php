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



class SimplePropertyAssignment
{
    private string $defined = 'defaultValue';
    public function __construct(private string $constructorParam = 'constructorValue')
    {
        // this is a bad idea, dynamicProperty is untyped and public
        $this->dynamicProperty = 'dynamicallyAdded';
    }
}




interface GetsSomethingInterface
{
    /**
     * This interface defines one method.
     * It must be called "getSomething" and it must return a string
     */
    public function getSomething(): string;
}


class GetsSomethingClass implements GetsSomethingInterface
{
    public function getSomething(): string
    {
        return 'something';
    }
}

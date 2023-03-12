<?php

declare(strict_types=1);

namespace Two\StaticAccess;

class ParentClass
{
    private const ZIP = '123';
    private static string $foo = 'bar';
    public static function getStringSelf(): string
    {
        return self::$foo . self::ZIP;
    }
    public static function getStringStatic(): string
    {
        return static::$foo . static::ZIP;
    }
}


final class ChildClass extends ParentClass
{
    protected const ZIP = '567';
    protected static string $foo = 'boo';
}

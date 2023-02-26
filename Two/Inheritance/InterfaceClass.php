<?php

declare(strict_types=1);

namespace Two\Inheritance;

interface GetsFoo
{
    public function getFoo(): string;
}

interface GetsBar
{
    public function getBar(): string;
}

final class MultipleInterfaces implements GetsFoo, GetsBar
{
    public function getFoo(): string
    {
        return 'foo';
    }
    public function getBar(): string
    {
        return 'bar';
    }
}

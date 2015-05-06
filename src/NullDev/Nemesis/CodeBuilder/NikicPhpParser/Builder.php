<?php

namespace NullDev\Nemesis\CodeBuilder\NikicPhpParser;

use PhpParser;

class Builder
{
    protected $factory;

    protected $data;

    public function __construct()
    {
        $this->factory = new PhpParser\BuilderFactory();
    }
}

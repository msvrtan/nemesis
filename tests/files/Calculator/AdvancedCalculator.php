<?php

namespace Calculator;
use stdClass;

require 'AbstractCalculator.php';

class AdvancedCalculator extends AbstractCalculator
{
    protected $engine;

    public function __construct(stdClass $engine)
    {
        $this->engine = $engine;
    }

    public function doSomething()
    {
        return 1 + 2;
    }

    protected function doSomethingProtected()
    {
        return $this->doSomethingPrivate();
    }

    private function doSomethingPrivate()
    {
        return 3 - 2;
    }
}

<?php

namespace Calculator;

use DateTime;

final class FinalCalculator
{
    protected $varA='a';
    protected $varB='b';
    protected $varC='c';

    /**
     * @return mixed
     */
    public function getVarA()
    {
        return $this->varA;
    }

    /**
     * @param mixed $varA
     */
    public function setVarA($varA)
    {
        $this->varA = $varA;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVarB()
    {
        return $this->varB;
    }

    /**
     * @param mixed $varB
     */
    public function setVarB(DateTime $varB)
    {
        $this->varB = $varB;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVarC()
    {
        return $this->varC;
    }

    /**
     * @param mixed $varC
     */
    public function setVarC($varC)
    {
        $this->varC = $varC;

        return $this;
    }
}

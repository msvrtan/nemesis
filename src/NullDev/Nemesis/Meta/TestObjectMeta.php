<?php

namespace NullDev\Nemesis\Meta;

class TestObjectMeta
{
    protected $targetFilePath;
    protected $targetFqcn;
    protected $targetClassName;
    protected $resultNameSpace;
    protected $resultClassName;
    protected $resultFilePath;

    protected $reflectionClass;

    /**
     * @return mixed
     */
    public function getTargetFilePath()
    {
        return $this->targetFilePath;
    }

    /**
     * @param mixed $filePath
     */
    public function setTargetFilePath($filePath)
    {
        $this->targetFilePath = $filePath;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTargetFqcn()
    {
        return $this->targetFqcn;
    }

    /**
     * @param mixed $targetFqcn
     */
    public function setTargetFqcn($targetFqcn)
    {
        $this->targetFqcn = $targetFqcn;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTargetClassName()
    {
        return $this->targetClassName;
    }

    /**
     * @param mixed $targetClassName
     */
    public function setTargetClassName($targetClassName)
    {
        $this->targetClassName = $targetClassName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getResultNameSpace()
    {
        return $this->resultNameSpace;
    }

    /**
     * @param mixed $resultNameSpace
     */
    public function setResultNameSpace($resultNameSpace)
    {
        $this->resultNameSpace = $resultNameSpace;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getResultClassName()
    {
        return $this->resultClassName;
    }

    /**
     * @param mixed $resultClassName
     */
    public function setResultClassName($resultClassName)
    {
        $this->resultClassName = $resultClassName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getResultFilePath()
    {
        return $this->resultFilePath;
    }

    /**
     * @param mixed $resultFilePath
     */
    public function setResultFilePath($resultFilePath)
    {
        $this->resultFilePath = $resultFilePath;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReflectionClass()
    {
        if (null === $this->reflectionClass) {
            $this->reflectionClass = new \ReflectionClass($this->getTargetFqcn());
        }

        return $this->reflectionClass;
    }
}

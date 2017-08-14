<?php

declare(strict_types=1);

namespace tests\MyCompany\ValueObject;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use MyCompany\ValueObject\Latitude;
use PHPUnit_Framework_TestCase;

/**
 * @covers \MyCompany\ValueObject\Latitude
 * @group  todo
 */
class LatitudeTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var float */
    private $value;
    /** @var Latitude */
    private $latitude;

    public function setUp()
    {
        $this->value    = 2.0;
        $this->latitude = new Latitude($this->value);
    }

    public function testGetValue()
    {
        self::assertEquals($this->value, $this->latitude->getValue());
    }
}
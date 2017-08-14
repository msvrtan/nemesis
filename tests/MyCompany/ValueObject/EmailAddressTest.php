<?php

declare(strict_types=1);

namespace tests\MyCompany\ValueObject;

use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use MyCompany\ValueObject\EmailAddress;
use PHPUnit_Framework_TestCase;

/**
 * @covers \MyCompany\ValueObject\EmailAddress
 * @group  todo
 */
class EmailAddressTest extends PHPUnit_Framework_TestCase
{
    use MockeryPHPUnitIntegration;
    /** @var string */
    private $email;
    /** @var EmailAddress */
    private $emailAddress;

    public function setUp()
    {
        $this->email        = 'email';
        $this->emailAddress = new EmailAddress($this->email);
    }

    public function testGetEmail()
    {
        self::assertEquals($this->email, $this->emailAddress->getEmail());
    }
}
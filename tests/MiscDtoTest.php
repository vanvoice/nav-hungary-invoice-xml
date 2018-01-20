<?php
/**
 * Contains the MiscDtoTest class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-20
 *
 */

namespace Vanvo\NavInvoiceXml\Tests;

use PHPUnit\Framework\TestCase;
use Vanvo\NavInvoiceXml\Dto\Misc;

class MiscDtoTest extends TestCase
{
    /** @var Misc */
    private $misc;

    protected function setUp()
    {
        $this->misc = new Misc(
            new \DateTime(),
            'cash',
            null,
            'HUF12345'
        );
    }

    /**
     * @test
     */
    public function it_can_be_created()
    {
        $this->assertInstanceOf(Misc::class, $this->misc);
    }

    /**
     * @test
     */
    public function it_has_all_necessary_fields()
    {
        $this->assertObjectHasAttribute('dueOn', $this->misc);
        $this->assertObjectHasAttribute('paymentMethod', $this->misc);
        $this->assertObjectHasAttribute('bankAccountNumber', $this->misc);
        $this->assertObjectHasAttribute('currency', $this->misc);
    }

    /**
     * @test
     */
    public function it_returns_the_proper_types()
    {
        $this->assertTrue(get_class($this->misc->getDueOn()) == \DateTime::class || is_null($this->misc->getDueOn()));
        $this->assertTrue(is_string($this->misc->getPaymentMethod()) || is_null($this->misc->getPaymentMethod()));
        $this->assertTrue(is_string($this->misc->getBankAccountNumber()) || is_null($this->misc->getBankAccountNumber()));
        $this->assertTrue(is_string($this->misc->getCurrency()) || is_null($this->misc->getCurrency()));
    }
}

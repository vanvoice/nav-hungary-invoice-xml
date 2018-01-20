<?php

/**
 * Contains the PartnerDtoTest class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-19
 *
 */

namespace Vanvo\NavInvoiceXml\Tests;

use PHPUnit\Framework\TestCase;
use Vanvo\NavInvoiceXml\Dto\Partner;

class PartnerDtoTest extends TestCase
{
    /** @var Partner */
    private $partner;

    protected function setUp()
    {
        $this->partner = new Partner(
            'Artkonekt',
            'J/1234'
        );
    }

    /**
     * @test
     */
    public function it_can_be_created()
    {
        $this->assertInstanceOf(Partner::class, $this->partner);
    }

    /**
     * @test
     */
    public function it_has_all_necessary_fields()
    {
        $this->assertObjectHasAttribute('name', $this->partner);
        $this->assertObjectHasAttribute('taxNumber', $this->partner);
        $this->assertObjectHasAttribute('taxNumberIntl', $this->partner);
    }

    /**
     * @test
     */
    public function it_returns_the_proper_types()
    {
        $this->assertInternalType('string', $this->partner->getName());
        $this->assertInternalType('string', $this->partner->getTaxNumber());
        $this->assertTrue(is_string($this->partner->getTaxNumberIntl()) || is_null($this->partner->getTaxNumberIntl()));
    }
}

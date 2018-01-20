<?php

/**
 * Contains the VatSummaryDtoTest class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-19
 *
 */

namespace Vanvo\NavInvoiceXml\Tests;

use Vanvo\NavInvoiceXml\Dto\VatSummary;
use PHPUnit\Framework\TestCase;

class VatSummaryDtoTest extends TestCase
{
    /** @var VatSummary */
    private $vatSummary;

    /**
     * @test
     */
    public function it_can_be_created()
    {
        $this->assertInstanceOf(VatSummary::class, $this->vatSummary);
    }

    /**
     * @test
     */
    public function it_has_all_necessary_fields()
    {
        $this->assertObjectHasAttribute('netTotal', $this->vatSummary);
        $this->assertObjectHasAttribute('taxTotal', $this->vatSummary);
        $this->assertObjectHasAttribute('grossTotal', $this->vatSummary);
        $this->assertObjectHasAttribute('vatRate', $this->vatSummary);
    }

    /**
     * @test
     */
    public function it_returns_the_proper_types()
    {
        $this->assertInternalType('float', $this->vatSummary->getNetTotal());
        $this->assertInternalType('float', $this->vatSummary->getTaxTotal());
        $this->assertInternalType('float', $this->vatSummary->getGrossTotal());
        $this->assertInternalType('int', $this->vatSummary->getVatRate());
    }

    protected function setUp()
    {
        $this->vatSummary = new VatSummary(
            10,
            15,
            1.5,
            16.5
        );
    }
}

<?php

/**
 * Contains the InvoiceItemDtoTest class.
 *
 * @copyright   Copyright (c) 2018 Storm Storez Srl-d
 * @author      Hunor Kedves
 * @license     MIT
 * @since       2018-01-19
 *
 */

namespace Konekt\NavInvoiceXml\Tests;

use Konekt\NavInvoiceXml\Dto\InvoiceItem;
use PHPUnit\Framework\TestCase;

class InvoiceItemDtoTest extends TestCase
{
    /** @var InvoiceItem */
    private $invoiceItem;

    /**
     * @test
     */
    public function it_can_be_created()
    {
        $this->assertInstanceOf(InvoiceItem::class, $this->invoiceItem);
    }

    /**
     * @test
     */
    public function it_has_all_necessary_fields()
    {
        $this->assertObjectHasAttribute('name', $this->invoiceItem);
        $this->assertObjectHasAttribute('statisticalCode', $this->invoiceItem);
        $this->assertObjectHasAttribute('quantity', $this->invoiceItem);
        $this->assertObjectHasAttribute('unit', $this->invoiceItem);
        $this->assertObjectHasAttribute('isMediated', $this->invoiceItem);
        $this->assertObjectHasAttribute('unitPrice', $this->invoiceItem);
        $this->assertObjectHasAttribute('netTotal', $this->invoiceItem);
        $this->assertObjectHasAttribute('taxTotal', $this->invoiceItem);
        $this->assertObjectHasAttribute('grossTotal', $this->invoiceItem);
        $this->assertObjectHasAttribute('vatRate', $this->invoiceItem);
    }

    /**
     * @test
     */
    public function it_returns_the_proper_types()
    {
        $this->assertInternalType('string', $this->invoiceItem->getName());
        $this->assertInternalType('string', $this->invoiceItem->getStatisticalCode());
        $this->assertInternalType('float', $this->invoiceItem->getQuantity());
        $this->assertInternalType('string', $this->invoiceItem->getUnit());
        $this->assertInternalType('bool', $this->invoiceItem->isMediated());
        $this->assertInternalType('float', $this->invoiceItem->getUnitPrice());
        $this->assertInternalType('float', $this->invoiceItem->getNetTotal());
        $this->assertInternalType('float', $this->invoiceItem->getTaxTotal());
        $this->assertInternalType('float', $this->invoiceItem->getGrossTotal());
        $this->assertInternalType('int', $this->invoiceItem->getVatRate());
    }

    protected function setUp()
    {
        $this->invoiceItem = new InvoiceItem(
            'Kakaos csiga',
            '25',
            1.5,
            'kg',
            false,
            13,
            19.5,
            0.97,
            20.475,
            5
        );
    }
}
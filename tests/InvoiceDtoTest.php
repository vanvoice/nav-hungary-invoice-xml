<?php
/**
 * Contains the InvoiceDtoTest class.
 *
 * @copyright   Copyright (c) 2017 Attila Fulop
 * @author      Attila Fulop
 * @license     MIT
 * @since       2018-01-19
 *
 */

namespace Vanvo\NavInvoiceXml\Tests;

use DateTime;
use PHPUnit\Framework\TestCase;
use Vanvo\NavInvoiceXml\Dto\Invoice;
use Vanvo\NavInvoiceXml\Dto\InvoiceType;

class InvoiceDtoTest extends TestCase
{
    /** @var Invoice */
    private $invoice;

    protected function setUp()
    {
        $this->invoice = new Invoice(
            'HUF-00000001',
            InvoiceType::INVOICE(),
            new DateTime(),
            new DateTime()
        );
    }

    /**
     * @test
     */
    public function it_can_be_created()
    {
        $this->assertInstanceOf(Invoice::class, $this->invoice);
    }

    /**
     * @test
     */
    public function it_has_all_necessary_fields()
    {
        $this->assertObjectHasAttribute('number', $this->invoice);
        $this->assertObjectHasAttribute('type', $this->invoice);
        $this->assertObjectHasAttribute('issuedOn', $this->invoice);
        $this->assertObjectHasAttribute('fulfillmentOn', $this->invoice);
    }

    /**
     * @test
     */
    public function it_returns_the_proper_types()
    {
        $this->assertInternalType('string', $this->invoice->getNumber());
        $this->assertInstanceOf(InvoiceType::class, $this->invoice->getType());
        $this->assertInstanceOf(DateTime::class, $this->invoice->getIssuedOn());
        $this->assertInstanceOf(DateTime::class, $this->invoice->getFulfillmentOn());
    }
}

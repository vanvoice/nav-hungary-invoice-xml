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
use Vanvo\NavInvoiceXml\Dto\Address;
use Vanvo\NavInvoiceXml\Dto\Invoice;
use Vanvo\NavInvoiceXml\Dto\InvoiceItem;
use Vanvo\NavInvoiceXml\Dto\InvoiceType;
use Vanvo\NavInvoiceXml\Dto\Misc;
use Vanvo\NavInvoiceXml\Dto\Partner;
use Vanvo\NavInvoiceXml\Dto\PriceSummary;
use Vanvo\NavInvoiceXml\Dto\VatSummary;
use Vanvo\NavInvoiceXml\InvoiceItemCollection;
use Vanvo\NavInvoiceXml\VatSummaryCollection;

class InvoiceDtoTest extends TestCase
{
    /** @var Invoice */
    private $invoice;

    protected function setUp()
    {
        $issuer = new Partner(
            'Test Elek',
            'JH1234',
            null,
            new Address(
                '11111',
                'Siofok',
                '1',
                'Uj utca',
                'negyed',
                '1',
                '1',
                '2',
                '1',
                '1'
            )
        );

        $customer = new Partner(
            'Artkonekt',
            'J/1234',
            null,
            new Address(
                '535500',
                'Budapest',
                'V',
                'Petofi Sandor',
                'lakopark',
                '12',
                '1',
                '2',
                '3',
                '25'
            )
        );

        $invoiceItem = new InvoiceItem(
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

        $vatSummary = new VatSummary(
            10,
            15,
            1.5,
            16.5
        );

        $this->invoice = new Invoice(
            '1234',
            InvoiceType::INVOICE(),
            new DateTime(),
            new DateTime(),
            $issuer,
            $customer,
            new InvoiceItemCollection($invoiceItem, $invoiceItem),
            new VatSummaryCollection($vatSummary, $vatSummary),
            new PriceSummary(13,10.27,23.27),
            new Misc(new \DateTime(),'cash',null,'HUF12345')
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
        $this->assertObjectHasAttribute('customer', $this->invoice);
        $this->assertObjectHasAttribute('issuer', $this->invoice);
        $this->assertObjectHasAttribute('invoiceItems', $this->invoice);
        $this->assertObjectHasAttribute('vatSummaries', $this->invoice);
        $this->assertObjectHasAttribute('priceSummary', $this->invoice);
        $this->assertObjectHasAttribute('misc', $this->invoice);
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
